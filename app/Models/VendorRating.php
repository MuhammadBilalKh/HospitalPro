<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\{User, Vendor};

class VendorRating extends Model
{
    use HasFactory;

    protected $table = "vendor_rating_line_items";

    protected $fillable = [
        'pricing',
        "quality",
        "experience",
        "customer_references",
        "techincal_expertise",
        "compilance_and_requirements",
        "sustainability_practices",
        "scalability",
        "financial_stability",
        "operating",
        "support_and_maintenance",
        "contact_terms",
        "innovation_capabilities",
        "cultural_fit",
        "user_id",
        "vendor_id"
    ];

    public function rating_submitted_by()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function rating_of_vendor()
    {
        return $this->belongsTo(Vendor::class, "vendor_id");
    }
}
