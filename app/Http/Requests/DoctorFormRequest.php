<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DoctorFormRequest extends FormRequest
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
        return [
            'login_name' => 'required|string|unique:doctors,login_name|unique:users,login_name',
            'password' => "required",
            "confirm_password" => "required|same:password",
            "doctor_name" => "required|string",
            'mobile_number' => "required|unique:doctors,mobile_number",
            "email_address" => "required|unique:doctors,email_address|unique:users,email|email",
            "qualification" => "required",
            'address' => "string",
            "department_id" => "required|numeric",
            'medical_license_number' => "required|numeric",
            'gender' => "required",
            'years_of_experience' => "required|numeric",
            'cnic' => "required|unique:doctors,cnic|unique:users,cnic",
            'specialization' => "required",
            'profile_picture' => 'required|image',
            'consulting_end_time' => "required",
            'consulting_start_time' => "required"
        ];
    }

    public function messages(): array 
    {
        return [
            'login_name.required' => "Doctor Login Name Is Required",
            'password.required' => "Please Enter Password",
            'confirm_password.required' => "Password Confirmation Is Required",
            'confirm_password.same' => "Password Mismatch",
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
