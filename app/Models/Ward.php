<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\{Department, User};

class Ward extends Model
{
    use HasFactory;

    protected $fillable = ["name", "department_id", "comments", "user_id"];

    public function get_ward_user(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function get_ward_department(){
        return $this->hasOne(Department::class ,'department_id', 'id');
    }
}
