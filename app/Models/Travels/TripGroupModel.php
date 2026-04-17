<?php

namespace App\Models\Travels;

use Illuminate\Database\Eloquent\Model;

class TripGroupModel extends Model
{
    protected $table = 'cl_trip_groups';
    protected $fillable = ['title','sub_title','uri','thumbnail','banner','excerpt','content','meta_keyword','meta_description','ordering','status'];

    public function trips(){
    	return $this->belongsToMany('App\Models\Travels\TripModel','cl_trip_group_rel','group_id','trip_id');
    }

}
