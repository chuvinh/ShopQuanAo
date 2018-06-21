<?php

namespace App\Http\Controllers;
use App\Slide;
use App\Product;
use App\ProductType;
use App\Cart;
use Session;
use App\Customer;
use App\Bill;
use App\BillDetail;
use App\User;
use App\Contact;
use Hash;
use Auth;
use Mail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function getIndex(){
        $slide = Slide::all();
        $new_product = Product::where('status',3)->get();
        $sanpham_khuyenmai = Product::where('status','<>',1)->paginate(8);
        return view('page.trangchu',compact('slide','new_product','sanpham_khuyenmai'));
    }

    public function getShareProduct($id){
        $user=User::where('id',$id)->get();
        return view('page.shareproduct',compact('user'));
    }

    public function getSanPham(){
        $sp = Product::where('id_type',1)->havingRaw('number_pro > 0')->get();
        $spboxao = Product::where('id_type',1)->havingRaw('number_pro > 0')->get();
        $spquan = Product::where('id_type',2)->havingRaw('number_pro > 0')->get();
        $spboxquan = Product::where('id_type',2)->havingRaw('number_pro > 0')->get();
        $spgiay = Product::where('id_type',3)->havingRaw('number_pro > 0')->get();
        $spboxgiay = Product::where('id_type',3)->havingRaw('number_pro > 0')->get();
        return view('page.sanpham',compact('sp','spboxao','spboxquan','spquan','spgiay','spboxgiay'));
    }
    public function getSanPhamMacDinh(){
        $sanpham = Product::paginate(15);
        $spao = Product::where('id_type',1)->get();
        $spquan = Product::where('id_type',2)->get();
        $spgiay = Product::where('id_type',3)->get();
        return view('page.sanpham_macdinh',compact('sanpham','spquan','spgiay'));
    }

    public function getChitiet(Request $req){
        $sanpham = Product::where('id',$req->id)->first();
        $sp_tuongtu = Product::where('id_type',$sanpham->id_type)->paginate(4);
        return view('page.chitiet_sanpham',compact('sanpham','sp_tuongtu'));
    }

    public function getLienHe(){
    	return view('page.lienhe');
    }

    public function getLoaiSp(Request $request){
        $sanpham=Product::where('id_type',$request->type)->paginate(16);
        return view('page.loai_sanpham',compact('sanpham'));
    }

    public function getLoaiKh(Request $request){
        $sanpham=Product::where('id_typecus',$request->type)->paginate(16);
        return view('page.loai_khachhang',compact('sanpham'));
    }

    public function getTuCaoDenThap(){
        $sanpham=Product::orderBy('unit_price','desc')->paginate(16);
        return view('page.sapxep_cao',compact('sanpham'));
    }
    public function getTuThapDenCao(){
        $sanpham=Product::orderBy('unit_price','asc')->paginate(16);
        return view('page.sapxep_cao',compact('sanpham'));
    }

    public function postLienHe(Request $request){
        $contact=new Contact();
        $contact->name=$request->name;
        $contact->email=$request->email;
        $contact->title=$request->title;
        $contact->content=$request->message;
        $contact->save();
        return redirect()->back()->with('thanhcong','Gửi tin nhắn thành công');
    }

    public function getHuongDanMuaHang(){
    	return view('page.huongdanmuahang');
    }

    public function getAddtoCart(Request $req,$id){
        $product = Product::find($id);
        $oldCart = Session('cart')?Session::get('cart'):null;
        $cart = new Cart($oldCart);
        $cart->add($product, $id);
        $req->session()->put('cart',$cart);
        return redirect()->back();
    }

    public function getThemCaBo(Request $req,$id1,$id2,$id3){
        $product1 = Product::find($id1);
        $product2 = Product::find($id2);
        $product3 = Product::find($id3);
        $oldCart = Session('cart')?Session::get('cart'):null;
        $cart = new Cart($oldCart);
        $cart->add($product1, $id1);
        $cart->add($product2, $id2);
        $cart->add($product3, $id3);
        $req->session()->put('cart',$cart);
        $req->session()->put('cart',$cart);
        $req->session()->put('cart',$cart);
        return redirect()->back();
    }

    public function getDelItemCart($id){
        $oldCart = Session::has('cart')?Session::get('cart'):null;
        $cart = new Cart($oldCart);
        $cart->removeItem($id);
        if(count($cart->items)>0){
            Session::put('cart',$cart);
        }
        else{
            Session::forget('cart');
        }
        return redirect()->back();
    }

    public function getCheckout(){
        return view('page.dat_hang');
    }

    public function postCheckout(Request $req){

        $cart = Session::get('cart');
        $this->email=$req->email;
        $this->name=$req->name;
        $customer = new Customer;
        $customer->cusname = $req->name;
        $customer->gender = $req->gender;
        $customer->email = $req->email;
        $customer->address = $req->address;
        $customer->phone_number = $req->phone;
        $customer->note = $req->notes;
        $customer->save();

        $bill = new Bill;
        $bill->id_customer = $customer->id;
        $bill->date_order = date('Y-m-d');
        $bill->total = $cart->totalPrice;
        $bill->payment = $req->payment_method;
        $bill->note = $req->notes;
        $bill->status = 0;
        $bill->char_name = $req->iduser;
        $bill->save();

        foreach ($cart->items as $key => $value) {
            $bill_detail = new BillDetail;
            $bill_detail->id_bill = $bill->id;
            $bill_detail->id_product = $key;
            $bill_detail->quantity = $value['qty'];
            $bill_detail->unit_price = ($value['price']/$value['qty']);
            $bill_detail->save();
            $product=Product::where('id',$key)->get();
            foreach ($product as $pro) {
                $soluong=$pro->number_pro;
                $soluong=$soluong-$value['qty'];
                $product_update=Product::where('id',$key)->update(['number_pro'=>$soluong]);
            }
        }
        /*
        $data=[
            'hoten'=>$req->name,
            'date_order'=>date('Y-m-d'),
            'total'=>$cart->totalPrice,
            'payment'=>$req->payment_method,
            'note'=>$req->notes
        ];
        Mail::send('email.donhang',$data,function($message){
            $message->from('chuvinh.muadem@gmail.com','Shop MrStyle');
            $message->to($this->email,$this->name)->subject('Đặt hàng thành công');
        });
        */
        Session::forget('cart');
        return redirect()->back()->with('thongbao','Đặt hàng thành công, chúng tôi đã gửi thông tin đơn hàng đến Email của bạn.');
    }

    public function getLogin(){
        return view('page.dangnhap');
    }
    public function getSignin(){
        return view('page.dangki');
    }

    public function postSignin(Request $req){
        $this->validate($req,
            [
                'email'         =>  'required|email|unique:users,email',
                'password'      =>  'required|min:6',
                'fullname'      =>  'required',
                'phone'         =>  'required',
                're_password'   =>  'required|same:password',
                'address'       =>  'required'
            ],
            [
                'email.required'        =>  'Vui lòng nhập email',
                'email.email'           =>  'Không đúng định dạng email',
                'email.unique'          =>  'Email đã có người sử dụng',
                'password.required'     =>  'Vui lòng nhập mật khẩu',
                're_password.same'      =>  'Mật khẩu không giống nhau',
                're_password.required'  =>  'Vui lòng nhập lại mật khẩu',
                'password.min'          =>  'Mật khẩu ít nhất 6 kí tự',
                'phone.required'        =>  'Vui lòng nhập số điện thoại',
                'fullname.required'     =>  'Vui lòng nhập họ và tên của bạn',
                'address.required'      =>  'Vui lòng nhập địa chỉ của bạn'
            ]);
        $user = new User();
        $user->full_name = $req->fullname;
        $user->email = $req->email;
        $user->password = Hash::make($req->password);
        $user->phone = $req->phone;
        $user->address = $req->address;
        $user->char_name= str_random(10);
        $user->roleid=4;
        $user->save();
        return redirect()->back()->with('thanhcong','Tạo tài khoản thành công');
    }

    public function postLogin(Request $request){
        $this->validate($request,
            [
                'email'=>'required|email',
                'password'=>'required|min:8'
            ],
            [
                'email.required'=>'Vui lòng nhập tên đăng nhập',
                'email.email'=>'Email không hợp lệ',
                'password.required'=>'Vui lòng nhập mật khẩu',
                'password.min'=>'Mật khẩu ít nhất 6 kí tự',
            ]
        );
        $email=$request->email;
        $password=$request->password;
        $credentials = array('email'=>$request->email,'password'=>$request->password);
        if(Auth::attempt($credentials)){
            $user=User::where('email',$email)->first();
            $fullname=$user->full_name;
            if($user->roleid==4)
                return redirect()->intended('/')->with(['flag'=>'success','message'=>'Đăng nhập thành công']);
            else{
                if($user->roleid==2)
                 return redirect()->intended('quan-ly')->with(['flag'=>'success','message'=>'Đăng nhập thành công']);
             else{
                if($user->roleid==1)
                    return redirect()->intended('/')->with(['flag'=>'success','message'=>'Đăng nhập thành công']);
                else{
                    if($user->roleid==3)
                        return redirect()->intended('nhan-vien')->with(['flag'=>'success','message'=>'Đăng nhập thành công']);
                }
            }
        }
        
    }
    else{
        return redirect()->back()->with(['flag'=>'danger','message'=>'Đăng nhập không thành công']);
    }
    
}
public function postLogout(){
    Auth::logout();
    return redirect()->route('trang-chu');
}
public function getSearch(Request $request){
    $product=Product::where('name','like','%'.$request->key.'%')
    ->orWhere('unit_price',$request->key)
    ->paginate(16);
    return view('page.search',compact('product'));
}
}
