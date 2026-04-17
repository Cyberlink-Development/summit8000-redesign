<?php

namespace App\Models\Inquiry;

use Illuminate\Database\Eloquent\Model;

class TripInquiryModel extends Model
{
    protected $table = 'trip_inquiries';
    protected $fillable=['title','name','email','country','number','review','trip_id','trip_start_date','duration','no_of_people','message'];
}
