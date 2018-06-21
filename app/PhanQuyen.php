<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PhanQuyen extends Model
{
    //
    protected $table = "role";
    public function taikhoanlogin(){
    	return $this->hasMany('App\User','roleid','id');
    }
}
