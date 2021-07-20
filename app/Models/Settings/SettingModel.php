<?php

namespace App\Models\Settings;

use Illuminate\Database\Eloquent\Model;

class SettingModel extends Model
{
    protected $table = 'cl_settings';
    protected $fillable = ['site_name','path','reg_number','team','phone','phone2','name1','phone3','name2','phone4','email3','email4','email_primary','email_secondary','address','facebook_link','linkedin_link','youtube_link','twitter_link','meta_key','meta_description','google_map','welcome_text','copyright_text'];
}
