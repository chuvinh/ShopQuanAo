@extends('quanly.quanly')
@section('noidung')
<div class=""><h2>Danh sách sản phẩm</h2><hr></div>
<div class="">
	@if(Session::has('thanhcong'))
		<div class="alert alert-success">{{Session::get('thanhcong')}}</div>
	@endif
	<table class="table table-bordered table-striped">
		<tr>
			<th>Tên Sản Phẩm</th>
			<th>Loại Sản Phẩm</th>
			<th>Loại Khách Hàng</th>
			<th>Kích Cỡ</th>
			<th>Đơn Giá</th>
			<th>Số Lượng</th>
			<th>Trạng thái</th>
			<th></th>
		</tr>
		@foreach($product as $pro)
		<tr>
			<td>{{$pro->name}}</td>
			<td>
			@if($pro->id_type==1)
				Áo
			@elseif($pro->id_type==2)
				Quần
			@elseif($pro->id_type==3)
				Giày
			@endif
			</td>
			<td>
			@if($pro->id_typecus==1)
				Nam
			@elseif($pro->id_typecus==2)
				Nữ
			@endif
			</td>
			<td>{{$pro->size}}</td>
			<td>{{$pro->unit_price}}</td>
			<td>{{$pro->number_pro}}</td>
			<td>
			@if($pro->number_pro>0)
				Còn hàng
			@elseif($pro->number_pro<=0)
				Hết hàng
			@endif
			</td>
			<td><a href="{{route('xemchitiet',$pro->id)}}">Xem Chi Tiết</a> | <a href="{{route('chinhsua',$pro->id)}}">Chỉnh Sửa</a> | <a href="{{route('xoa',$pro->id)}}">Xóa</a></td>
		</tr>
		@endforeach
	</table>
	<div class="row">{{$product->links()}}</div>
	<table class="table table-bordered table-striped">
		<tr>
			<th>Tên Sản Phẩm</th>
			<th>Loại Sản Phẩm</th>
			<th>Loại Khách Hàng</th>
			<th>Kích Cỡ</th>
			<th>Đơn Giá</th>
			<th>Số Lượng</th>
			<th>Trạng thái</th>
			<th></th>
		</tr>
		@foreach($product_quan as $proq)
		<tr>
			<td>{{$proq->name}}</td>
			<td>
			@if($proq->id_type==1)
				Áo
			@elseif($proq->id_type==2)
				Quần
			@elseif($proq->id_type==3)
				Giày
			@endif
			</td>
			<td>
			@if($proq->id_typecus==1)
				Nam
			@elseif($proq->id_typecus==2)
				Nữ
			@endif
			</td>
			<td>{{$proq->size}}</td>
			<td>{{$proq->unit_price}}</td>
			<td>{{$proq->number_pro}}</td>
			<td>
			@if($proq->number_pro>0)
				Còn hàng
			@elseif($proq->number_pro<=0)
				Hết hàng
			@endif
			</td>
			<td><a href="{{route('xemchitiet',$proq->id)}}">Xem Chi Tiết</a> | <a href="{{route('chinhsua',$proq->id)}}">Chỉnh Sửa</a> | <a href="">Xóa</a></td>
		</tr>
		@endforeach
	</table>
	<div class="row">{{$product_quan->links()}}</div>
	<table class="table table-bordered table-striped">
		<tr>
			<th>Tên Sản Phẩm</th>
			<th>Loại Sản Phẩm</th>
			<th>Loại Khách Hàng</th>
			<th>Kích Cỡ</th>
			<th>Đơn Giá</th>
			<th>Số Lượng</th>
			<th>Trạng thái</th>
			<th></th>
		</tr>
		@foreach($product_giay as $prog)
		<tr>
			<td>{{$prog->name}}</td>
			<td>
			@if($prog->id_type==1)
				Áo
			@elseif($prog->id_type==2)
				Quần
			@elseif($prog->id_type==3)
				Giày
			@endif
			</td>
			<td>
			@if($prog->id_typecus==1)
				Nam
			@elseif($prog->id_typecus==2)
				Nữ
			@endif
			</td>
			<td>{{$prog->size}}</td>
			<td>{{$prog->unit_price}}</td>
			<td>{{$prog->number_pro}}</td>
			<td>
			@if($prog->number_pro>0)
				Còn hàng
			@elseif($prog->number_pro<=0)
				Hết hàng
			@endif
			</td>
			<td><a href="{{route('xemchitiet',$prog->id)}}">Xem Chi Tiết</a> | <a href="{{route('chinhsua',$prog->id)}}">Chỉnh Sửa</a> | <a href="">Xóa</a></td>
		</tr>
		@endforeach
	</table>
	<div class="row">{{$product_giay->links()}}</div>
</div>
@endsection