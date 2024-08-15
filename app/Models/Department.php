<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\{User, Block, Ward};

class Department extends Model
{
    use HasFactory;

    protected $fillable = ["department_name", "block_id", "user_id", 'comments'];

    public function created_by_user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function get_department_block()
    {
        return $this->belongsTo(Block::class, 'block_id');
    }

    public function get_all_wards()
    {
        return $this->hasMany(Ward::class, 'ward_id', 'id');
    }

    public static function GetDepartmentList($departmentID = null)
    {
        return static::when($departmentID, function ($qry) use ($departmentID) {
            $qry->where('id', $departmentID);
        })->pluck("department_name", 'id');
    }
}
