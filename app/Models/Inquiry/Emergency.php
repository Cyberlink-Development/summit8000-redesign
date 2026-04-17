<?php

namespace App\Models\Inquiry;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Emergency extends Model
{
    use HasFactory;

    protected $fillable = ['booking_id', 'emergency_fullname', 'emergency_relation', 'emergency_phone_no', 'emergency_email', 'emergency_address', 'emergency_zip', 'emergency_country'];
}
