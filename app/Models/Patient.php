<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\{User, Doctor};

class Patient extends Model
{
    use HasFactory;

    protected $fillable = ["patient_name", "father_name", 'user_id', "doctor_id", "age", "gender", "address", "cnic", "mobile_number"];

    public function registered_by(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function TreatedBy(){
        return $this->belongsTo(Doctor::class, 'doctor_id');
    }

    public function setPatientNameAttribute($val){
        return $this->attributes['patient_name'] = ucwords($val);
    }

    public function setFatherNameAttribute($val){
        return $this->attributes['father_name'] = ucwords($val);
    }

    public static function GetPatients($patientID = null){
        return static::when($patientID, function($query) use ($patientID){
            $query->where("id", $patientID);
        })->plcuk("patient_name", 'id');
    }
}
