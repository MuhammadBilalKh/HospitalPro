<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\DataTables\BlocksDataTable;
use App\Models\Block;

class BlockController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(BlocksDataTable $blockTable)
    {
        return $blockTable->render('admin.blocks.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.blocks.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'block_name' => 'required|unique:blocks,block_name'
        ], [
            'block_name.required' => "Block Name Is Required",
            "block_name.unique" => "This Block Name is Already Exist"
        ]);

        Block::create([
            'block_name' => $request->block_name,
            'comments' => $request->comments,
            'created_at' => now(),
            'user_id' => 1
        ]);

        return redirect()->route('Blocks.index')->with('success', 'Block Created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
