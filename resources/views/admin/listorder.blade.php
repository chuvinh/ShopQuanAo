@extends('admin.index')
@section('content')
<div class="row">
	<ol class="breadcrumb">
		<li><a href="{{ route('admin') }}">
			<em class="fa fa-home"></em>
		</a></li>
		<li class="active">Quản lí đơn hàng / Danh sách đơn hàng</li>
	</ol>
</div><!--/.row-->

<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Danh sách đơn hàng</h1>
	</div>
</div><!--/.row-->
<div class="row" style="background: #F1F4F7">
	<div class="col-lg-12">
		<table class="table table-bordered table-striped table-product">
			<tr>
				<th>Mã đơn hàng</th>
				<th>Ngày đặt</th>
				<th>Tên khách</th>
				<th>Giao hàng</th>
				<th>Thanh toán</th>
				<th>Tổng tiền</th>
				<th>Trạng thái</th>
			</tr>
			@foreach($donhang as $dh)
			<tr>
				<td><a href="{{ route('detailorder',$dh->id) }}">{{$dh->id}}</a></td>
				<td>{{$dh->date_order}}</td>
				<td>{{$dh->cusname}}</td>
				<td>Chưa</td>
				<td>
					@if($dh->payment == 'COD') 
					Thanh toán khi nhận hàng
					@elseif($dh->payment == 'ATM')
					Thanh toán qua ATM
					@endif
				</td>
				<td>{{$dh->total}}</td>
				<td>Chưa xác nhận</td>
			</tr>
			@endforeach
		</table>
		<div class="row">
			<div class="col-lg-12">
				
			</div>
		</div>
	</div>
</div>
@endsection