<?php

namespace App\Http\Controllers;

use App\DataTables\BlocksDataTable;
use App\Models\Block;
use App\Services\ImportBlockServices;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class BlockController extends Controller
{
    public function __construct(){
        date_default_timezone_set("Asia/Karachi");
    }

    public function index(BlocksDataTable $blocksDataTable)
    {
        return $blocksDataTable->render('admin.blocks.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.blocks.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        ini_set('memory_limit', '1024M');
        ini_set("max_execution_time", "0");

        if($request->hasFile("block_csv")){
            static::ImportBlocks($request->file("block_csv"));
        }

        else {
            static::RegisterBlock($request);
            return redirect()->route('Blocks.index')->with("create_success", "Block Registered Successfully..");
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Block $block, $blockID)
    {
        return view('admin.blocks.show',[
            'block' => $block->findOrFail($blockID)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Block $block, $id)
    {
        return view('admin.blocks.edit',[
            'block' => $block->findOrFail($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Block $block, $blockID)
    {
        $request->validate([
            'block_name' => "required|unique:blocks,block_name,$blockID,id",
            'comments' => "nullable|string"
        ],[
            'block_name.required' => "Block Name Is Required Field",
            'block_name.unique' => "This Block Name is Existing"
        ]);

        $blockQuery = $block->where('id', $blockID);
        $blockQuery->update([
            'block_name' => $request->block_name,
            'comments' => $request->comments,
            'user_id' => Auth::user()->id,
            'updated_at' => date('m/d/Y h:i:s a', time())
        ]);

        return redirect()->route('Blocks.index')->with("edit_success", "Block Detail Updated Successfully");
    }

    public function destroy(Block $block)
    {
        //
    }

    private static function RegisterBlock($formRequest){
        $formRequest->validate([
            'block_name' => "required|unique:blocks,block_name",
            'comments' => 'nullable|string'
        ],[
            'block_name.required' => "Block Name Is Required",
            'block_name.unique' => "This Block Name is Already Registered"
        ]);

        Block::create([
            'block_name' => $formRequest->block_name,
            'comments' => $formRequest->comments,
            'user_id' => Auth::user()->id,
            'created_at' => date('m/d/Y h:i:s a', time())
        ]);

        return true;
    }

    private static function ImportBlocks($csvFile){
        $blockCsvData = ImportBlockServices::ReadCsvData($csvFile);
        $headers = ["Block Name", "Comments"];

        if(empty(ImportBlockServices::CheckCsvHeaders($blockCsvData[0], $headers))){
            unset($blockCsvData[0]);

            if(!empty($blockCsvData)){
                
                $duplicationError = ImportBlockServices::CheckDuplications($blockCsvData);
                
                if(empty($duplicationError)){
                    $validationErrors = ImportBlockServices::ValidateBlockCsvData($blockCsvData);
                    
                    if(empty($validationErrors)){
                        $count = ImportBlockServices::SaveBlockCsvData($blockCsvData, $csvFile);
                        
                        return redirect()->route('Blocks.index')->with("import_success", "$count Entries Imported");
                    }
                    
                    else {
                        return redirect()->back()->with("csv_error", $validationErrors);
                    }
                }
                
                else {
                    return redirect()->back()->with("csv_error", $duplicationError);
                }
            }
            
            else {
                return redirect()->back()->with('csv_error', "Invalid Column Headers");
            }
        }

        else {
            return redirect()->back()->with("csv_err", "Empty CSV Uploaded.");
        }
    }
}
