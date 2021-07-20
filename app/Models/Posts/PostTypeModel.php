<?php

namespace App\Models\Posts;

use Illuminate\Database\Eloquent\Model;

class PostTypeModel extends Model
{
    protected $table = 'cl_post_type';
    protected $fillable = ['post_type','uri','ordering','is_menu','sub_title','post_excerpt','thumbnail'];
}
