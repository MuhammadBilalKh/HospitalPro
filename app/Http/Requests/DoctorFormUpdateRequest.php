<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DoctorFormUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $docID = $this->input("doctor_id");

        return [
            "doctor_name" => "required|string",
            'mobile_number' => "required|unique:doctors,mobile_number,$docID",
            "email_address" => "required|unique:doctors,email_address,$docID|unique:users,email|email",
            "qualification" => "required",
            'address' => "string",
            "department_id" => "required|numeric",
            'medical_license_number' => "required|numeric",
            'gender' => "required",
            'years_of_experience' => "required|numeric",
            'cnic' => "required|unique:doctors,cnic,$docID|unique:users,cnic",
            'specialization' => "required",
            'consulting_end_time' => "required",
            'consulting_start_time' => "required"
        ];
    }

    public function messages(): array 
    {
        return [
            'doctor_name.required' => "Doctor Name Is Required",
            'department_id.required' => "Please Select Department",
            'cnic.required' => "CNIC Is Mandatory",
            'cnic.unique' => "CNIC Already Registered",
            'medical_license_number.required' => "Med License Number Required",
            'address.required' => "Address Is Required",
            'qualification.required' => "Please Enter Doctor Qualification",
            'specialization.required' => "Specialization Is Required",
            'years_of_experience.required' => "Exprience In Years Required",
            'email_address.required' => 'Email Address Is Required',
            'email_address.unique' => "Email Already Existing"
        ];
    }
}
