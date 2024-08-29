<?php

namespace App\Services;

use App\Models\{Block, CsvLog};
use Illuminate\Support\facades\Auth;
use Illuminate\Support\Facades\Storage;

class ImportBlockServices
{
    public static function ReadCsvData($file)
    {
        $fileHandle = fopen($file->path(), 'r');

        $csvData = [];
        while (($row = fgetcsv($fileHandle)) !== FALSE) {
            $csvData[] = $row;
        }

        fclose($fileHandle);

        return $csvData;
    }

    public static function CheckCsvHeaders($csvRow, $headers)
    {
        $errors = "";

        foreach ($csvRow as $key => $value) {
            if (!in_array($value, $headers)) {
                $errors = "Invalid Column Headers";
            }
        }

        return $errors;
    }

    public static function CheckDuplications($csvData)
    {
        $duplications = array();
        $block_names = array();

        foreach ($csvData as $key => $value) {
            $block_names[] = $value[0];
        }

        $block_name_count = array_count_values($block_names);

        foreach ($block_name_count as $key => $val) {
            if ($val > 1) {
                $duplications[$key] = "Block Name '$key' is duplicate '$value' times";
            }
        }

        return $duplications;
    }

    public static function ValidateBlockCsvData($csvData)
    {
        $errors = array();
        $lineNumber = 0;

        foreach ($csvData as $key => $value) {
            if ($value[0] == "") {
                $errors[] = "Block Name Null On Line Number " . ($lineNumber + 1);
            }

            if (Block::where("block_name", $value[0])->exists()) {
                $errors[] = "Block Name $value Existing On Line Number " . ($lineNumber + 1);
            }
        }

        return $errors;
    }

    public static function SaveBlockCsvData($data, $blockCsvFile)
    {
        $filePath = Storage::putFile("block_csv", $blockCsvFile);
        $total_count = 0;

        foreach ($data as $key => $value) {
            Block::create([
                'block_name' => $value[0],
                'comments' => $value[1],
                'user_id' => Auth::user()->id,
                'file_name' => $filePath
            ]);

            $total_count = $total_count + 1;
        }

        $csvLog = new CsvLog();
        $csvLog->user_id = Auth::user()->id;
        $csvLog->file_name = $filePath;
        $csvLog->model_name = "Block";
        $csvLog->entries = json_encode($data);

        $csvLog->save();

        return $total_count;
    }
}
