<?php

namespace App\Models\Posts;

use Illuminate\Database\Eloquent\Model;

class PostDocModel extends Model
{
    protected $table = 'cl_multiple_document';
    protected $fillable = ['post_id','key_string','title','sub_title','brief','doc_thumb','document','ordering','post_category','month','cat_id'];
}
