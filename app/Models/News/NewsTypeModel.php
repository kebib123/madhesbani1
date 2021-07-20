<?php

namespace App\Models\News;

use Illuminate\Database\Eloquent\Model;

class NewsTypeModel extends Model
{
    protected $table = 'cl_news_type';
    protected $fillable = ['news_type','uri','meta_keyword','meta_description','ordering','is_menu','is_childnews','parent_id'];

    public function news(){
    	return $this->belongsToMany('App\Models\News\NewsModel','cl_news_newstype','newstype_id','news_id');
    }

    public function users(){
        return $this->belongsToMany('App\User','cl_newstype_user','newstype_id','user_id');
    }
}
