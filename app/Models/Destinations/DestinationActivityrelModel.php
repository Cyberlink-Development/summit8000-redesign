<?php

namespace App\Models\Destinations;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DestinationActivityrelModel extends Model
{
    use HasFactory;
    protected $table = 'destination_activity_rel';
    protected $fillable = ['destination_id','activity_id'];
}
