<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
/*page*/
Route::get('/',[
	'as'=>'trang-chu',
	'uses'=>'PageController@getIndex'
]);

Route::get('loai-san-pham/{type}',[
	'as'=>'loaisanpham',
	'uses'=>'PageController@getLoaiSp'
]);

Route::get('loai-khach-hang/{type}',[
	'as'=>'loaikhachhang',
	'uses'=>'PageController@getLoaiKh'
]);

Route::get('tu-cao-den-thap',[
	'as'=>'tucaodenthap',
	'uses'=>'PageController@getTuCaoDenThap'
]);

Route::get('tu-thap-den-cao',[
	'as'=>'tuthapdencao',
	'uses'=>'PageController@getTuThapDenCao'
]);

Route::get('chi-tiet-san-pham/{id}',[
	'as'=>'chitietsanpham',
	'uses'=>'PageController@getChitiet'
]);

Route::get('lien-he',[
	'as'=>'lienhe',
	'uses'=>'PageController@getLienHe'
]);

Route::post('lien-he',[
	'as'=>'lienhe',
	'uses'=>'PageController@postLienHe'
]);

Route::get('huong-dan-mua-hang',[
	'as'=>'huongdanmuahang',
	'uses'=>'PageController@getHuongDanMuaHang'
]);

Route::get('add-to-cart/{id}',[
	'as'=>'themgiohang',
	'uses'=>'PageController@getAddtoCart'
]);

Route::get('del-cart/{id}',[
	'as'=>'xoagiohang',
	'uses'=>'PageController@getDelItemCart'
]);
Route::get('dat-hang',[
	'as'=>'dathang',
	'uses'=>'PageController@getCheckout'
]);

Route::post('dat-hang',[
	'as'=>'dathang',
	'uses'=>'PageController@postCheckout'
]);

Route::get('dang-nhap',[
	'as'=>'login',
	'uses'=>'PageController@getLogin'
]);
Route::post('dang-nhap',[
	'as'=>'login',
	'uses'=>'PageController@postLogin'
]);

Route::get('dang-ki',[
	'as'=>'signin',
	'uses'=>'PageController@getSignin'
]);

Route::post('dang-ki',[
	'as'=>'signin',
	'uses'=>'PageController@postSignin'
]);

Route::get('dang-xuat',[
	'as'=>'logout',
	'uses'=>'PageController@postLogout'
]);
Route::get('san-pham',[
	'as'=>'sanpham',
	'uses'=>'PageController@getSanPham'
]);
Route::get('san-pham-mac-dinh',[
	'as'=>'sanphammacdinh',
	'uses'=>'PageController@getSanPhamMacDinh'
]);
Route::get('them-ca-bo/{id1}/{id2}/{id3}',[
	'as'=>'themcabo',
	'uses'=>'PageController@getThemCaBo'
]);
Route::get('tim-kiem',[
	'as'=>'search',
	'uses'=>'PageController@getSearch'
]);
Route::get('share-product/{id}',[
	'as'=>'shareproduct',
	'uses'=>'PageController@getShareProduct'
]);
/*admin*/
Route::get('admin',[
	'as'=>'admin',
	'uses'=>'AdminController@getAdmin'
]);
Route::get('list-product',[
	'as'=>'listproduct',
	'uses'=>'AdminController@getListProduct'
]);
Route::get('add-product',[
	'as'=>'addproduct',
	'uses'=>'AdminController@getAddProduct'
]);
Route::get('detail-product/{id}',[
	'as'=>'detailproduct',
	'uses'=>'AdminController@getDetailProduct'
]);
Route::get('edit-product',[
	'as'=>'editproduct',
	'uses'=>'AdminController@getEditProduct'
]);
Route::get('list-order',[
	'as'=>'listorder',
	'uses'=>'AdminController@getListOrder'
]);
Route::get('detail-order/{id}',[
	'as'=>'detailorder',
	'uses'=>'AdminController@getDetailOrder'
]);
Route::get('list-user',[
	'as'=>'listuser',
	'uses'=>'AdminController@getListUser'
]);
Route::get('detail-user/{id}',[
	'as'=>'detailuser',
	'uses'=>'AdminController@getDetailUser'
]);

Route::post('admin',[
	'as'=>'loginadmin',
	'uses'=>'AdminController@postAdmin'
]);
Route::post('detail-product/{id}',[
	'as'=>'updateproduct',
	'uses'=>'AdminController@postDetailProduct'
]);
Route::post('add-product',[
	'as'=>'addproductpost',
	'uses'=>'AdminController@postAddProduct'
]);
Route::post('edit-product',[
	'as'=>'editproductpost',
	'uses'=>'AdminController@postEditProduct'
]);