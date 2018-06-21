<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ProductType;
use App\Size;
use App\User;
use App\SizeDetail;

class AjaxController extends Controller
{
    //
	public function getLoaiSp($idloaisp){
		$type=Size::where('size.id',$idloaisp)
		->join('size_detail','size.id','=','size_detail.id_size')
		->get();
		foreach ($type as $t) {
			echo "<option value='".$t->sizename."'>".$t->sizename."</option>";
		}
	}
}
