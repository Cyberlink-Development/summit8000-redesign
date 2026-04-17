<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class VerifyUser extends Model
{
    protected $fillable=['user_id','token'];

    public function users()
    {
        return $this->belongsTo('App\Model\Subscriber', 'user_id');
    }
}
