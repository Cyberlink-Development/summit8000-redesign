<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Travels\TripModel;

class DirectPay extends Model
{
    use HasFactory;

    protected $fillable = ['trip_id', 'first_name', 'last_name', 'email', 'phone','country','start_date','end_date','message','price','no_of_people', 'paid_status', 'payment_type'];

    public function trip()
    {
        return $this->belongsTo(TripModel::class, 'trip_id');
    }
}
