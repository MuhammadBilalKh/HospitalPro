<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\{User, Department};

class Doctor extends Model
{
    use HasFactory;

    protected $fillable = [
        "login_name",
        'doctor_name',
        'specialization',
        'address',
        'medical_license_number',
        'years_of_experience',
        'user_id',
        'department_id',
        'profile_picture',
        'mobile_number',
        'email_address',
        'qualification',
        'consulting_end_time',
        'consulting_start_time',
        'cnic',
        'email_verification_token',
        'status',
    ];

    public function doc_department(){
        return $this->belongsTo(Department::class, "department_id");
    }

    public function doc_user(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function setDoctorNameAttribute($val){
        return $this->attributes['doctor_name'] = ucwords($val);
    }

    public function setQualificationAttribute($val){
        return $this->attributes['qualification'] = strtoupper($val);
    }

    protected $guards = "doctor";
}
