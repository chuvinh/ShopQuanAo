<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\PhanQuyen;
use App\Slide;
use App\Product;
use App\ProductType;
use App\Cart;
use Session;
use App\CustomerType;
use App\Customer;
use App\Size;
use App\SizeDetail;
use App\Bill;
use App\BillDetail;
use App\Contact;
use App\Collections;
use Hash;
use Auth;
use Mail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class AdminController extends Controller
{
    //
  public function getAdmin(){
    $user = User::where('roleid','!=', 1)->count();
    $collections=Collections::count();
    $bill = Bill::count();
    $product = Product::count();
    return view('admin.admin',compact('bill','user','product','collections'));
  }
  public function getListProduct(){
    $product= Product::paginate(10);
    return view('admin.listproduct',compact('product'));
  }
  public function getEditProduct(){
    $collections=Collections::all();
    return view('admin.editproduct',compact('collections'));
  }
  public function getListUser(){
    $users=User::where('roleid','!=', 1)
    ->join('bills','bills.char_name','=','users.char_name')
    ->select('bills.id as bills_id','users.id as id_user','full_name','email','phone','bills.char_name as charname_bills','users.char_name as charname_users')
    ->get();
    return view('admin.listuser',compact('user','users'));
  }
  public function getDetailUser($id){
    $user = User::where('id', $id)
    ->join('bills','bills.char_name','=','users.char_name')
    ->join('bill_detail','id_bill','=','bills.id')
    ->join('products','products.id','=','id_product')
    ->select('bills.char_name as charname_bills','bills.id as bills_id','users.char_name as charname_users',count('charname_users'),'users.id as id_user','full_name','email','phone','products.id as masp','products.name as tensp','bill_detail.quantity as soluong','bill_detail.unit_price as dongia','bills.total as thanhtien','products.image as image')
    ->get();
    return view('admin.detailuser',compact('user'));
  }
  public function getAddProduct(){
    $collections=Collections::all();
    $type_product=ProductType::all();
    $type_customer=CustomerType::all();
    $size1=Size::where('size.id',1)
    ->join('size_detail','size.id','=','size_detail.id_size')->get();
    $size2=Size::where('size.id',2)
    ->join('size_detail','size.id','=','size_detail.id_size')->get();
    $size3=Size::where('size.id',3)
    ->join('size_detail','size.id','=','size_detail.id_size')->get();
    return view('admin.addproduct',compact('product','type_customer','type_product','size1','size2','size3','collections'));
  }
  public function getDetailProduct($id){
    $product= Product::where('id',$id)->get();
    $type_product=ProductType::all();
    $collections=Collections::all();
    $type_customer=CustomerType::all();
    $size1=Size::where('size.id',1)
    ->join('size_detail','size.id','=','size_detail.id_size')->get();
    return view('admin.detailproduct',compact('product','type_customer','type_product','size1','collections'));
  }
  public function getListOrder(){
    $donhang=Customer::join('bills','customer.id','=','bills.id_customer')
    ->orderBy('date_order','asc')
    ->paginate(15);
    return view('admin.listorder',compact('donhang'));
  }
  public function getDetailOrder($id){
    $bill=Bill::where('bills.id',$id)
    ->join('bill_detail','bills.id','=','bill_detail.id_bill')
    ->join('customer','bills.id_customer','=','customer.id')
    ->join('products','bill_detail.id_product','=','products.id')
    ->select('bills.id as bill_id','cusname','products.id as masp','products.name as tensp','bill_detail.quantity as soluong','bill_detail.unit_price as dongia','bills.total as thanhtien','products.image as image')
    ->get();
    $bill_cus=Bill::where('bills.id',$id)
    ->join('customer','bills.id_customer','=','customer.id')
    ->select('bills.id as madh','cusname as tenkh','date_order','address','phone_number','payment','bills.note as ghichu','status')
    ->get();
    return view('admin.detailorder',compact('bill','bill_cus'));
  }
  public function postEditProduct(Request $request){
    if( $request->price > 0){
      if($product = Product::where('status',$request->namecollections)->increment('unit_price',$request->price))
        return redirect()->back()->with('thanhcong','Chỉnh sửa giá thành công');
      else
        return redirect()->back()->with('thanhcong','Chỉnh sửa giá thất bại');
    }
    if( $request->price < 0){
      if($product = Product::where('status',$request->namecollections)->decrement('unit_price',abs($request->price)))
        return redirect()->back()->with('thanhcong','Chỉnh sửa giá thành công');
      else
        return redirect()->back()->with('thanhcong','Chỉnh sửa giá thất bại');
    }
  }
  public function postAddProduct(Request $request){
    $this->validate($request,
      [
        'nameproduct'     =>  'required',
        'size'    =>  'required',
        'description' =>  'required',
        'unit_price'    =>  'required',
        'promotion_price'     =>  'required',
        'unit'   =>  'required',
        'number_pro'   =>  'required',
        'trangthai' =>  'required',
        'hinhanh'   =>  'required',
      ],
      [
        'nameproduct.required'      =>  'Trường này không được bỏ trống',
        'size.required'     =>  'Trường này không được bỏ trống',
        'description.required'  =>  'Trường này không được bỏ trống',
        'unit_price.required'       =>  'Trường này không được bỏ trống',
        'promotion_price.required'      =>  'Nếu không có thì vui lòng nhập 0',
        'unit.required'      =>  'Trường này không được bỏ trống',
        'number_pro.required'      =>  'Trường này không được bỏ trống',
        'trangthai.required'    =>  'Trường này không được bỏ trống',
        'hinhanh.required'      =>  'Trường này không được bỏ trống'
      ]);
    $file = $request->hinhanh;
    $file_name = $file->getClientOriginalName();
    $file->move('image',$file_name);
    $product = new Product();
    $product->name=$request->nameproduct;
    $product->id_type=$request->id_type;
    $product->id_typecus=$request->id_typecus;
    $product->size=$request->size;
    $product->description=$request->description;
    $product->unit_price=$request->unit_price;
    $product->promotion_price=$request->promotion_price;
    $product->image=$file_name;
    $product->unit=$request->unit;
    $product->number_pro=$request->number_pro;
    $product->status=$request->trangthai;
    $product->save();
    return redirect()->back()->with('thanhcong','Thêm sản phẩm thành công');
  }
  public function postDetailProduct(Request $request,$masp){
   $this->validate($request,
    [
      'hinhanh'=>'required'
    ],
    [
      'hinhanh.required' => 'Vui lòng nhập vào trường này'
    ]);
   $file = $request->hinhanh;
   $file_name = $file->getClientOriginalName();
   $file->move('image',$file_name);
   $arr=[
    'name' => $request->nameproduct,
    'id_type' => $request->id_type,
    'id_typecus' => $request->id_typecus,
    'description' => $request->description,
    'size' => $request->size,
    'unit_price' => $request->unit_price,
    'promotion_price' => $request->promotion_price,
    'image' => $file_name,
    'unit' => $request->unit,
    'number_pro' => $request->number_pro,
    'status' => $request->trangthai,
  ];
  if($product = Product::where('id',$masp)->update($arr))
    return redirect()->back()->with('thanhcong','Sửa sản phẩm thành công');
  else
    return redirect()->back()->with('thanhcong','Sửa sản phẩm thất bại');
}
public function postAdmin(Request $request){
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
    if($user->roleid==1)
      return redirect()->intended('admin')->with(['flag'=>'success','message'=>'Đăng nhập thành công']);
  }
  else{
    return redirect()->back()->with(['flag'=>'danger','message'=>'Đăng nhập không thành công']);
  }

}
public function getDanhSachTaiKhoan(){
 $user=User::join('role','users.roleid','=','role.id')->get();
 return view('admin.danhsachtaikhoan',compact('user'));
}
public function getPhanQuyenTaiKhoan(){
 $user=User::join('role','users.roleid','=','role.id')->get();
 $role=PhanQuyen::all();
 return view('admin.phanquyentaikhoan',compact('user','role'));
}
public function getThemTaiKhoan(){
 $role=PhanQuyen::all();
 return view('admin.themtaikhoan',compact('role'));
}
public function postThemTaiKhoan(Request $req){
 $this->validate($req,
  [
   'email'         =>  'required|email|unique:users,email',
   'password'      =>  'required|min:6',
   'full_name'      =>  'required',
   'phone'         =>  'required',
   're_password'   =>  'required|same:password',
   'address'       =>  'required',
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
   'full_name.required'     =>  'Vui lòng nhập họ và tên của bạn',
   'address.required'      =>  'Vui lòng nhập địa chỉ của bạn'
 ]);
 $user = new User();
 $user->full_name = $req->full_name;
 $user->email = $req->email;
 $user->password = Hash::make($req->password);
 $user->phone = $req->phone;
 $user->address = $req->address;
 $user->roleid = $req->role;
 $user->save();
 return redirect()->back()->with('thanhcong','Tạo tài khoản thành công');
}
public function getKhoiPhucMatKhau($id){
  $user=User::where('id',$id)->get();
  return view('admin.phuchoimatkhau',compact('user'));
}
}
