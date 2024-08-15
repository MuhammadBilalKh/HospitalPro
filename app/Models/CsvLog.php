<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class CsvLog extends Model
{
    use HasFactory;

    protected $fillable = ['entries', 'user_id', 'file_name','model_name'];

    public function uploaded_by(){
        return $this->belongsTo(User::class , 'user_id');
    }
}
