<?php

namespace App\Models\Settings;

use Illuminate\Database\Eloquent\Model;

class SettingModel extends Model
{
    protected $table = 'cl_settings';
    protected $fillable = ['site_name','logo',' TTA1','TTA2','phone','email_primary','email_secondary','address','facebook_link','linkedin_link','youtube_link','twitter_link','instagram_link','tiktok_link','meta_key','meta_description','google_map','google_map2','fp_activity','copyright_text','fax','link1','link2','flight_price', 'usa_address', 'usa_email_secondary', 'usa_email_primary', 'usa_phone', 'text1_title', 'text1_sub_title', 'text2_title', 'text2_sub_title', 'text3_title', 'text3_sub_title'];
}
