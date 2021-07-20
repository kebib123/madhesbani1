<?php

namespace App\Models\News;

use Illuminate\Database\Eloquent\Model;

class NewsModel extends Model
{
    protected $table = 'cl_news';
    protected $fillable = [
    	'audio','author','content_writer','template','uri','news_title','sub_title','supporting_title','news_content','news_excerpt','news_type','news_category','ordering','news_banner','news_thumbnail','thumbnail_status','thumbnail_caption','news_video','video_status','meta_keyword','meta_description','seo_title','tags','custom_link','status','published','is_active','is_draft','is_trashed','is_password_protected','comment','lang','nepali_date','hour','minute','is_specialnews','is_headline','is_breaking_news'
    ];

    public function newstype(){
    	return $this->belongsToMany('App\Models\News\NewsTypeModel','cl_news_newstype','news_id','newstype_id');
    }

    public function comments(){
        return $this->hasMany('App\Models\Comments\CommentModel','news_id');
    }

    public function authors()
    {
        return $this->belongsTo('App\Models\Authors\AuthorModel','author');

    }

}
