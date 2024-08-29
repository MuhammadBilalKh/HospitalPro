<?php

namespace App\Http\Controllers;

use App\DataTables\PatientDataTable;
use App\Models\Doctor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Patient;

class PatientController extends Controller
{
    public function __construct(){
        date_default_timezone_set("Asia/Karachi");
    }

    public function index(PatientDataTable $patientDataTable)
    {
        return $patientDataTable->render('admin.patients.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.patients.create', [
            'doctors' => Doctor::GetDoctorsList()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $patientValidatedData = $request->validate([
            'patient_name' => "required",
            'father_name' => "required",
            "doctor_id" => "required|numeric",
            'age' => "required|numeric",
            'gender' => "required",
            'address' => "required"
        ]);

        $patientValidatedData['user_id'] = Auth::user()->id;
        $patientValidatedData['is_processed'] = 1;
        $patientValidatedData['cnic'] = $request->cnic;
        $patientValidatedData['mobile_number'] = $request->mobile_number;

        Patient::create($patientValidatedData);

        return redirect()->route("Patient.index")->with("create-success", "Patient Registered Successfully..");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $patientData = Patient::find($id);
        return view('admin.patients.show', [
            'patient' => $patientData,
            'doctors' => Doctor::GetDoctorsList($patientData->doctor_id)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $patientData = Patient::find($id);
        return view('admin.patients.edit', [
            'patient' => $patientData,
            'doctors' => Doctor::GetDoctorsList()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $patientValidatedData = $request->validate([
            'patient_name' => "required",
            'father_name' => "required",
            "doctor_id" => "required|numeric",
            'age' => "required|numeric",
            'gender' => "required",
            'address' => "required",
        ]);

        $patientValidatedData['user_id'] = Auth::user()->id;
        $patientValidatedData['is_processed'] = 1;
        $patientValidatedData['cnic'] = $request->cnic;
        $patientValidatedData['mobile_number'] = $request->mobile_number;

        Patient::where("id", $id)->update($patientValidatedData);

        return redirect()->route("Patient.index")->with("update-success", "Patient Detail's Successfully..");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
