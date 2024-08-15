<?php

namespace App\Http\Controllers;

use App\DataTables\WardDatatables;
use Illuminate\Http\Request;
use App\Models\{Ward, Department,Block};
use Illuminate\Support\Facades\Auth;

class WardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(WardDatatables $wardDatatables)
    {   
        return $wardDatatables->render('admin.wards.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.wards.create',[
            'blocks' => Block::GetBlocksList()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'department_id' => "required|numeric"
        ]);

        $ward = Ward::create([
            'name' => $request->name,
            'comments' => $request->comments,
            'department_id' => $request->department_id,
            'user_id' => Auth::user()->id
        ]);

        if($ward){
            return redirect()->route('Wards.index')->with("success-create", "Ward Created Successfully..");
        }
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
        return view('admin.wards.edit',[
            'departments' => Department::GetDepartmentList(),
            'ward' => Ward::findOrFail($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required',
            'department_id' => "required|numeric"
        ]);

        $ward = Ward::where('id',$id)->update([
            'name' => $request->name,
            'department_id' => $request->department_id,
            'comments' => $request->comments
        ]);
        
        if($ward){
            return redirect()->route('Wards.index')->with("success", "Ward Details Updated Successfully..");
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
