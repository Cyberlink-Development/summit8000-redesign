<?php

namespace App\Models\Inquiry;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Insurance extends Model
{
    use HasFactory;

    protected $fillable = ['booking_id', 'insurance_company', 'insurance_phone', 'policy_no'];
}
