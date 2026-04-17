<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class VerifyContact extends Model
{
    protected $fillable=['user_id','token'];

    public function users()
    {
        return $this->belongsTo('App\Model\Contact', 'user_id');
    }
}
