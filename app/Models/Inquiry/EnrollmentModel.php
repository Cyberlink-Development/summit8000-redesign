<?php

namespace App\Models\Inquiry;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EnrollmentModel extends Model
{
    use HasFactory;
    protected $table = 'enrollment';
    protected $fillable = [
        'name',
        'contact',
        'email',
        'country',
        'training_title',
        'price',
        'duration',
        'start_date',
        'message',
    ];
}
