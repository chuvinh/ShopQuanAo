@extends('admin.index')
@section('content')
<div class="row">
	<ol class="breadcrumb">
		<li><a href="{{ route('admin') }}">
			<em class="fa fa-home"></em>
		</a></li>
		<li class="active">Quản lí chiết khấu</li>
		<li>
			Danh sách người dùng có chiết khấu
		</li>
	</ol>
</div><!--/.row-->

<div class="row" style="background: #F1F4F7;padding-bottom: 20px;margin-top: 50px">
	<div class="col-lg-12 col-md-12">
		<table class="table table-bordered table-striped table-product">
			<tr>
				<th>ID</th>
				<th>Tên người dùng</th>
				<th>Email</th>
				<th>Số điện thoại</th>
				<th>Số đơn hàng có giới thiệu</th>
			</tr>
			@foreach ($users as $us)
			<tr>
				<td><a href="{{ route('detailuser',$us->id_user) }}">{{$us->id_user}}</a></td>
				<td>{{$us->full_name}}</td>
				<td>{{$us->email}}</td>
				<td>{{$us->phone}}</td>
				<td>{{count($us->bills_id)}}</td>
			</tr>
			@endforeach
		</table>
	</div>
</div><!--/.row-->
@endsection