<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Vendor extends Model
{
    use HasFactory;

    protected $fillable = [
        'vendor_name',
        'contact_person',
        'mobile_number',
        'email',
        'fax_number',
        'city',
        'bank_name',
        'account_number',
        'notes',
        'vendor_rating',
        'reviews',
        'delivery_days',
        'is_return_policy_applicable',
        'user_id',
        'purchasing_applicable'
    ];

    public function createdBy(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function setVendorNameAttribute($val){
        return $this->attributes['vendor_name'] = ucwords($val);
    }

    public function setContactPersonAttribute($val){
        return $this->attributes['contact_person'] = ucwords($val);
    }

    public function setBankNameAttribute($val){
        return $this->attributes['bank_name'] = strtoupper($val);
    }
}
