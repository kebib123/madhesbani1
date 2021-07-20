<?php

namespace App\Models\Posts;

use Illuminate\Database\Eloquent\Model;

class PostModel extends Model
{
    protected $table = 'cl_posts';
    protected $fillable = [
        'audio','post_date','post_author','template','template','post_title','sub_title','post_category','post_content','post_excerpt','uri','page_key','post_type','post_parent','post_order','page_banner','page_thumbnail','page_video','meta_keyword','meta_description','associated_title','external_link','post_tags','status','published','is_active','is_draft','is_trashed','show_in_home','is_password_protected','is_commentable','lang','cover'
    ];

    public function documents()
    {
        return $this->hasOne('App\Models\Posts\PostDocModel','post_id');
    }
}
