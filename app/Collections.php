<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Collections extends Model
{
    //
    protected $table = "collections";
    public function product(){
    	return $this->hasMany('App\Poduct','id_collection','status');
    }
}
