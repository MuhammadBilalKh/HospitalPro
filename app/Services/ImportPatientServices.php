<?php

namespace App\Services;

class ImportPatientServices {
    public static function ReadCsvData($file){
        $fileHandle = fopen($file->path(), 'r');

        $csvData = [];
        while (($row = fgetcsv($fileHandle)) !== FALSE) {
            $csvData[] = $row;
        }

        fclose($fileHandle);

        return $csvData;
    }

    public static function CheckCsvHeaders($csvHeader, $header){
        $errors = "";

        foreach ($csvHeader as $key => $value) {
            if (!in_array($value, $header)) {
                $errors = "Invalid Column Headers";
            }
        }

        return $errors;
    }

    public static function ValidatePatientCsvData($csvData){
        return true;
    }
}