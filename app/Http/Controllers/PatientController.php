<?php

namespace App\Http\Controllers;

use App\DataTables\PatientDataTable;
use App\Models\Doctor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Patient;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(PatientDataTable $patientDataTable)
    {
        return $patientDataTable->render('admin.patients.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.patients.create',[
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

        Patient::create($patientValidatedData);

        return redirect()->route("Patient.index")->with("create-success", "Patient Registered Successfully..");
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
