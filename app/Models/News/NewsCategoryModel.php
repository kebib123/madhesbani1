<?php

namespace App\Models\News;

use Illuminate\Database\Eloquent\Model;

class NewsCategoryModel extends Model
{
    protected $table = 'cl_news_categories';
    protected $fillable = [
    	'news_type','category','category_caption','category_content','uri','ordering','thumbnail'
    ];
}
