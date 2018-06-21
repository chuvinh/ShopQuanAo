@extends('admin.index')
@section('content')
<div class="row">
	<ol class="breadcrumb">
		<li><a href="{{ route('admin') }}">
			<em class="fa fa-home"></em>
		</a></li>
		<li class="active">Quản lí đơn hàng</li>
		<li>
			@foreach ($bill_cus as $b)
			{{$b->madh}}
			@endforeach
		</li>
	</ol>
</div><!--/.row-->

<div class="row" style="background: #F1F4F7;padding-bottom: 20px;">
	<div class="col-md-12">
		@foreach($bill_cus as $b)
		<div class="name_donhang">
			<h3>ĐƠN HÀNG - {{$b->madh}}</h3>
		</div>
		<table class="table table-bordered">
			<tr>
				<td colspan="2"><b>Tên khách hàng: </b>{{$b->tenkh}}</td>
				<td colspan="1"><b>Ngày đặt hàng: </b>{{$b->date_order}}</b></td>
			</tr>
			<tr>
				<td colspan="2"><b>Địa chỉ: </b>{{$b->address}}</td>
				<td colspan="2"><b>Phương thức thanh toán: </b>{{$b->payment}}</td>
			</tr>
			<tr>
				<td colspan="2"><b>Điện thoại: </b>{{$b->phone_number}}</td>
				<td colspan="2"><b>Ghi chú: </b>{{$b->ghichu}}</td>
			</tr>
		</table>
		@endforeach
		<table class="table table-striped table-bordered">
			<tr>
				<th scope="col">Mã Sp</th>
				<th scope="col">Tên Sp</th>
				<th scope="col">Số lượng</th>
				<th scope="col">Đơn giá</th>
				<th scope="col">Thành tiền</th>
			</tr>
			@foreach($bill as $bl)
			<tr>
				<td>{{$bl->masp}}</td>
				<td><img src="image/{{$bl->image}}" style="width: 30px">{{$bl->tensp}}</td>
				<td>{{$bl->soluong}}</td>
				<td>{{$bl->dongia}}</td>
				<td>{{$bl->soluong*$bl->dongia}}</td>
			</tr>
			@endforeach
			<tr>
				<th scope="row" colspan="4">Tổng cộng:</th>
				<td>{{$bl->thanhtien}}</td>
			</tr>
		</table>
		<div class="">
			@if($b->status == 0)
			<a class="btn btn-success" href="">Duyệt</a>
			<a class="btn btn-danger" href="">Hủy</a>
			@endif
			@if($b->status == 1)
			<a class="btn btn-success" disabled>Đã Duyệt</a>
			<a class="btn btn-danger" href="">Hủy</a>
			@endif	
		</div>
	</div>
</div><!--/.row-->

@endsection