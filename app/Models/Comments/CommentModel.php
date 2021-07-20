<?php

namespace App\Models\Comments;

use Illuminate\Database\Eloquent\Model;

class CommentModel extends Model
{
    protected $table = 'cl_news_comments';
    protected $fillable = ['news_id','comment'];

    public function news(){
        return $this->belongsTo('App\Models\NewsModel','news_id');
    }

}
