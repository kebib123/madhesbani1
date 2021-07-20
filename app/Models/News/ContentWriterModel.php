<?php

namespace App\Models\News;

use Illuminate\Database\Eloquent\Model;

class ContentWriterModel extends Model
{
    protected $table = 'cl_content_writer';
    protected $fillable = [ 
    	'name','email','phone','description'
    ];
}
