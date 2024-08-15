<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\{User, Department};

class Block extends Model
{
    use HasFactory;

    protected $fillable = ['block_name', 'user_id', 'comments'];

    public function getUser()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function setBlockNameAttribute($value)
    {
        return $this->attributes['block_name'] = ucwords($value);
    }

    public static function GetBlocksList($blockID = null)
    {
        return static::when($blockID, function ($query) use ($blockID) {
            $query->where('id', $blockID);
        })->pluck('block_name', 'id');
    }

    public function block_departments()
    {
        return $this->hasMany(Department::class, 'department_id', 'id');
    }
}
