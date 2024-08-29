<?php

namespace App\Http\Controllers;

use App\DataTables\DepartmentDataTable;
use App\Models\{Block, Department};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DepartmentController extends Controller
{
    public function __construct(){
        date_default_timezone_set("Asia/Karachi");
    }
    
    public function index(DepartmentDataTable $departmentDataTable)
    {
        return $departmentDataTable->render('admin.departments.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.departments.create',[
            'blocks' => Block::GetBlocksList()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'department_name' => "required|unique:departments,department_name",
            'block_id' => "required|numeric"
        ]);

        $dept = Department::create([
            'department_name' => $request->department_name,
            'block_id' => $request->block_id,
            'user_id' => Auth::user()->id,
            'comments' => $request->comments,
        ]);

        if($dept){
            return redirect()->route('Departments.index')->with("success-create", "Department Created Successfully..");
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $departmentData = Department::findOrFail($id);
        return view('admin.departments.show',[
            'blocks' => Block::GetBlocksList($departmentData->block_id),
            'department' => $departmentData
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('admin.departments.edit',[
            'blocks' => Block::GetBlocksList(),
            'department' => Department::findOrFail($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'department_name' => "required|unique:departments,department_name,$id,id",
            'block_id' => "required|numeric"
        ]);

        $department = Department::where('id', $id)->update([
            'department_name' => $request->department_name,
            'block_id' => $request->block_id,
            'comments' => $request->comments,
            'user_id' => Auth::user()->id
        ]);

        if($department){
            return redirect()->route("Departments.index")->with("success", "Department Details Updated Sucessfully..");
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
