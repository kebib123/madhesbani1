<?php

namespace App\Models\Medias;

use Illuminate\Database\Eloquent\Model;

class MediaModel extends Model
{
    protected $table = 'cl_media';
    protected $fillable = [ 'name','thumbnail','ordering'];
}
