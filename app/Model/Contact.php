<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $fillable=['full_name','email','number','message','title','trip','country'];
}
