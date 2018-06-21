<?php

namespace App\Http\Controllers;
use Hash;
use Auth;
use Illuminate\Support\Facades\DB;
use App\Product;
use App\ProductType;
use App\CustomerType;
use App\Bill;
use App\Customer;
use App\Size;
use App\SizeDetail;

use Illuminate\Http\Request;

class QuanLyController extends Controller
{
    public function getQuanly(){
        return view('quanly.quanly');
    }
    public function getThemsanpham(){
        $type_product=ProductType::all();
        $type_customer=CustomerType::all();
        $size=Size::where('size.id',1)
                ->join('size_detail','size.id','=','size_detail.id_size')->get();
        return view('quanly.themsanpham',compact('type_customer','type_product','size'));
    }
    public function getThemNhanh(){
        return view('quanly.themnhanh');
    }
    public function postThemNhanh( Request $request){
        $str=$request->tensp;
        $string=explode('-', $str);
        $id_type=$string[1];
        if($id_type=='áo' || $id_type=='Áo')
            $id_type=1;
        elseif($id_type=='quần' || $id_type=='Quần')
            $id_type=2;
        elseif($id_type=='giày' || $id_type=='Giày')
            $id_type=3;
        $id_typecus=$string[2];
        if($id_typecus=='nam' || $id_typecus=='Nam')
            $id_typecus=1;
        elseif($id_typecus=='nữ' || $id_typecus=='Nữ')
            $id_typecus=2;
        $new=$string[9];
        if($new=='còn hàng' || $new=='Còn Hàng' || $new=='Còn hàng')
            $new=1;
        elseif($new=='hết hàng' || $new=='Hết Hàng' || $new=='Hết hàng')
            $new=0;
        $arr=[
            'name'=>$string[0],
            'id_type'=>$id_type,
            'id_typecus'=>$id_typecus,
            'size'=>$string[3],
            'description'=>$string[4],
            'unit_price'=>$string[5],
            'promotion_price'=>$string[6],
            'image'=>$request->hinhanh,
            'unit'=>$string[7],
            'number_pro'=>$string[8],
            'status'=>$new
        ];
        $product = Product::insert($arr);
        return redirect()->back()->with('thanhcong','Thêm sản phẩm thành công');
    }
    public function postThemsanpham(Request $request){
        $this->validate($request,
            [
                'tensp'     =>  'required',
                'kichco'    =>  'required',
                'donvitinh' =>  'required',
                'dongia'   	=>  'required',
                'giakm'     =>  'required',
                'soluong'   =>  'required',
                'trangthai' =>  'required',
                'hinhanh'   =>  'required',
            ],
            [
                'tensp.required'   		=>  'Trường này không được bỏ trống',
                'kichco.required'  		=>  'Trường này không được bỏ trống',
                'donvitinh.required' 	=>  'Trường này không được bỏ trống',
                'dongia.required'      	=>  'Trường này không được bỏ trống',
                'giakm.required'  		=>  'Nếu không có thì vui lòng nhập 0',
                'soluong.required'      =>  'Trường này không được bỏ trống',
                'trangthai.required'    =>  'Trường này không được bỏ trống',
                'hinhanh.required'      =>  'Trường này không được bỏ trống'
            ]);
        $product = new Product();
        //$product->id=$request->masp;
        $product->name=$request->tensp;
        $product->id_type=$request->loaisp;
        $product->id_typecus=$request->loaikh;
        $product->size=$request->kichco;
        $product->description=$request->mota;
        $product->unit_price=$request->dongia;
        $product->promotion_price=$request->giakm;
        $product->image=$request->hinhanh;
        $product->unit=$request->donvitinh;
        $product->number_pro=$request->soluong;
        $product->status=$request->trangthai;
        $product->save();
        return redirect()->back()->with('thanhcong','Thêm sản phẩm thành công');
    }
    public function getDanhSachSanPham(){
    	$product= Product::where('id_type',1)->paginate(10);
        $product_quan= Product::where('id_type',2)->paginate(10);
        $product_giay= Product::where('id_type',3)->paginate(10);
    	return view('quanly.danhsachsanpham',compact('product','product_quan','product_giay'));
    }
    public function getXemChiTiet($masp){
    	$product= Product::where('id',$masp)->get();
    	return view('quanly.xemchitiet',compact('product'));
    }
    public function getSuaGiaSanPham(){
    	$product= Product::all();
    	return view('quanly.suagiasanpham',compact('product'));
    }
    public function postSuaGiaSanPham(Request $request){
    	$product= Product::all();
    	return view('quanly.suagiasanpham',compact('product'));
    }
    public function getChinhSua($masp){
    	$product= Product::where('id',$masp)->get();
    	return view('quanly.chinhsua',compact('product'));
    }
    public function postChinhSua(Request $request,$masp){
        $this->validate($request,
            [
                'hinhanh'=>'required'
            ],
            [
                'hinhanh.required' => 'Vui lòng nhập vào trường này'
            ]);
        $arr=[
            'name' => $request->tensp,
            'id_type' => $request->loaisp,
            'id_typecus' => $request->loaikh,
            'size' => $request->kichco,
            'description' => $request->mota,
            'unit_price' => $request->dongia,
            'promotion_price' => $request->giakm,
            'image' => $request->hinhanh,
            'unit' => $request->donvitinh,
            'number_pro' => $request->soluong,
            'status' => $request->trangthai,
       ];
    	if($product = Product::where('id',$masp)->update($arr))
            return redirect()->back()->with('thanhcong','Sửa sản phẩm thành công');
    }
    public function postXoa($masp){
        $product= Product::where('id',$masp)->delete();
        return redirect()->back()->with('thanhcong','Xóa sản phẩm thành công');
    }
    public function getDanhSachDonHang(){
        $donhang=Customer::join('bills','customer.id','=','bills.id_customer')
            ->orderBy('date_order','asc')
            ->paginate(15);
        return view('quanly.danhsachdonhang',compact('donhang'));
    }
    public function getDoanhThu(){
        $product=Bill::all();
        return view('quanly.doanhthu',compact('product'));
    }
    public function getChiTietDonHang($id){
        $bill=Bill::where('bills.id',$id)
                    ->join('bill_detail','bills.id','=','bill_detail.id_bill')
                    ->join('customer','bills.id_customer','=','customer.id')
                    ->join('products','bill_detail.id_product','=','products.id')
                    ->get();
        return view('quanly.chitiet_donhang',compact('bill'));
    }
}

