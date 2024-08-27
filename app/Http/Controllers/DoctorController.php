<?php

namespace App\Http\Controllers;

use App\DataTables\DoctorDataTable;
use App\Models\Department;
use App\Models\Doctor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use PhpParser\Comment\Doc;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(DoctorDataTable $doctorDataTable)
    {
        return $doctorDataTable->render('admin.doctors.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.doctors.create',[
            'departments' => Department::GetDepartmentList(),
            'specializations' => SPECIALIZATIONS
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $doctorValidatedData = $request->validate([
            'login_name' => 'required|string|unique:doctors,login_name|unique:users,login_name',
            'password' => "required",
            "confirm_password" => "required|same:password",
            "doctor_name" => "required|string",
            'mobile_number' => "required|unique:doctors,mobile_number",
            "email_address" => "required|unique:doctors,email_address|unique:users,email",
            "qualification" => "required",
            'address' => "string",
            "department_id" => "required|numeric",
            'medical_license_number' => "required|numeric",
            'gender' => "required",
            'years_of_experience' => "required|numeric",
            'cnic' => "required|unique:doctors,cnic|unique:users,cnic"
        ]);

        $doctorValidatedData['is_first_login'] = 0;
        $doctorValidatedData['user_id'] = Auth::user()->id;
        $doctorValidatedData['email_verification_token'] = Str::random(100);

        Doctor::create($doctorValidatedData);

        return redirect()->route('Doctor.index')->with('create-success', "Doctor Registered Successfully..");
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
        return view('admin.doctors.edit',[
            'doctorData' => Doctor::find($id),
            'departments' => Department::GetDepartmentList()
        ]);
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
