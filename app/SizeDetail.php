<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SizeDetail extends Model
{
    //
    protected $table = "size_detail";

    public function size_detail(){
    	return $this->belongsTo('App\Size','id_size','id');
    }
}
