<?php

namespace App\Models\Members;

use Illuminate\Database\Eloquent\Model;

class MemberModel extends Model
{
    protected $table = 'cl_members';
    protected $fillable = [ 
    	'first_name','last_name','email','password','phone','designation','department','user_type','user_subtype','activation_code','status'
    ];

    public function orders(){
    	return $this->hasMany('App\Customers\OrderModel');
    }
}
