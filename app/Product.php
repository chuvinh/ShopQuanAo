<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = "products";

    public function product_type(){
    	return $this->belongsTo('App\ProductType','id_type','id');
    }
    public function customer_type(){
    	return $this->belongsTo('App\CustomerType','id_typecus','id');
    }
    public function bill_detail(){
    	return $this->hasMany('App\BillDetail','id_product','id');
    }
    public function collections(){
        return $this->hasMany('App\Collections','status','id_collections');
    }
}
