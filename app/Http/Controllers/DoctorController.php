<?php

namespace App\Http\Controllers;

use App\DataTables\DoctorDataTable;
use App\Http\Requests\DoctorFormRequest;
use App\Http\Requests\DoctorFormUpdateRequest;
use App\Models\Department;
use App\Models\Doctor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class DoctorController extends Controller
{
    public function __construct()
    {
        date_default_timezone_set("Asia/Karachi");
    }

    public function index(DoctorDataTable $doctorDataTable)
    {
        return $doctorDataTable->render('admin.doctors.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.doctors.create', [
            'departments' => Department::GetDepartmentList(),
            'specializations' => SPECIALIZATIONS
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DoctorFormRequest $request)
    {
        $profilePicture = Storage::putFile("profile_pictures", $request->file('profile_picture'));

        Doctor::create([
            'login_name' => $request->login_name,
            'qualification' => $request->qualification,
            'address' => $request->address,
            'years_of_experience' => $request->years_of_experience,
            'gender' => $request->gender,
            'is_first_login' => 0,
            'user_id' => Auth::user()->id,
            'email_verification_token' => Str::random(100),
            'cnic' => $request->cnic,
            'mobile_number' => $request->mobile_number,
            'email_address' => $request->email_address,
            'department_id' => $request->department_id,
            'medical_license_number' => $request->medical_license_number,
            'profile_picture' => $profilePicture,
            'doctor_name' => $request->doctor_name,
            'consulting_start_time' => $request->consulting_start_time,
            'consulting_end_time' => $request->consulting_end_time,
            'password' => bcrypt($request->password)
        ]);

        return redirect()->route('Doctor.index')->with('create-success', "Doctor Registered Successfully..");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $docDetails = Doctor::findOrFail($id);
        return view('admin.doctors.show', [
            'doctorData' => $docDetails,
            'departments' => Department::GetDepartmentList($docDetails->department_id)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $doctorDetails = Doctor::find($id);
        return view('admin.doctors.edit', [
            'doctorData' => $doctorDetails,
            'departments' => Department::GetDepartmentList()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DoctorFormUpdateRequest $request, string $id)
    {
        $updateData = Doctor::where('id', $id)->update([
            'qualification' => $request->qualification,
            'address' => $request->address,
            'years_of_experience' => $request->years_of_experience,
            'gender' => $request->gender,
            'user_id' => Auth::user()->id,
            'cnic' => $request->cnic,
            'mobile_number' => $request->mobile_number,
            'email_address' => $request->email_address,
            'department_id' => $request->department_id,
            'medical_license_number' => $request->medical_license_number,
            'doctor_name' => $request->doctor_name,
            'consulting_start_time' => $request->consulting_start_time,
            'consulting_end_time' => $request->consulting_end_time,
            'specialization' => $request->specialization
        ]);

        if ($updateData) {
            return redirect()->route('Doctor.index')->with('update-success', "Doctor Details Updated Successfully..");
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
