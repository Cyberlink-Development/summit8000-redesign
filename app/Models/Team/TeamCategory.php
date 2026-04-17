<?php

namespace App\Models\Team;

use Illuminate\Database\Eloquent\Model;

class TeamCategory extends Model
{
   protected $table = 'team_categories';
    protected $fillable = [
        'category','picture','ordering','content','caption','uri','team_parent','status'
    ];
    
    public function teams(){
        return $this->hasMany('App\Models\Team\TeamModel','category');
          
    }

}
