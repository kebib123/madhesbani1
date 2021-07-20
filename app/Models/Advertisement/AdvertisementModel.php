<?php

namespace App\Models\Advertisement;

use Illuminate\Database\Eloquent\Model;

class AdvertisementModel extends Model
{
    protected $table = 'cl_advertisement';
    protected $fillable = [ 
    	'title','position','client_name','client_link','start_date','end_date','add_image','add_size','add_vender','status'
    ];
}
