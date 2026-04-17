<?php

namespace App\Models\Team;

use Illuminate\Database\Eloquent\Model;

class TeamModel extends Model
{
   protected $table = 'cl_team';
    protected $fillable = [
        'name','position','category','fb_url','instagram_url','twitter_url','linkedin_url','phone','email','content','brief','status','ordering','banner','thumbnail','uri','team_key','show_in_home'
    ];

      /* The certificates that belongs to the team */
      public function certificates(){
        return $this->hasMany('App\Models\Team\Certificates','team_id');
          
    }

}
