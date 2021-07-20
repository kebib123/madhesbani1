<?php

namespace App\Models\News;

use Illuminate\Database\Eloquent\Model;

class NewstypeUserModel extends Model
{
    protected $table = 'cl_newstype_user'; 
    protected $fillable = ['user_id', 'newstype_id'];
}
