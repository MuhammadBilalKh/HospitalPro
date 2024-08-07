<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Block extends Model
{
    use HasFactory;

    protected $fillable = ['block_name', 'user_id', 'comments'];

    public function setBlockNameAttribute($value){
        return $this->attributes['block_name'] = ucwords($value);
    }
}
