@extends('quanly.quanly')
@section('noidung')
<div class=""><h2>Thông tin sản phẩm</h2><hr></div>
	@foreach($product as $pro)
	<div class="col-md-6">
		<img src="{{asset('image/'.$pro->image.'')}}" width="100%">
	</div>
	
	<div class="col-md-6">
		<p><label>Mã Sản Phẩm:</label> {{$pro->id}}</p>
		<p><label>Tên Sản Phẩm:</label> {{$pro->name}}</p>
		<p>
			<label>Loại Sản Phẩm:</label> 
			@if($pro->id_type==1)
				Áo
			@elseif($pro->id_type==2)
				Quần
			@elseif($pro->id_type==3)
				Giày
			@endif
		</p>
		<p>
			<label>Loại Khách Hàng:</label> 
			@if($pro->id_typecus==1)
				Nam
			@elseif($pro->id_typecus==2)
				Nữ
			@endif
		</p>
		<p><label>Kích cỡ:</label> {{$pro->size}}</p>
		<p><label>Đơn giá:</label> {{$pro->unit_price}}</p>
		<p><label>Số Lượng:</label> {{$pro->number_pro}}</p>
		<p><label>Ngày Nhập:</label> {{$pro->created_at}}</p>
	</div>
	@endforeach
@endsection