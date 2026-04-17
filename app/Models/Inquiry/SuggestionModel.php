<?php

namespace App\Models\Inquiry;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuggestionModel extends Model
{
    use HasFactory;
    protected $table = 'cl_trip_suggestion';
    protected $fillable = ['title','trip_id','name','email','femail','phone','comments'];
}
