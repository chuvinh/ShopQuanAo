@extends('quanly.quanly')
@section('noidung')
<div class=""><h2>Danh sách đơn hàng</h2><hr></div>
<div class="">
	@if(Session::has('thanhcong'))
		<div class="alert alert-success">{{Session::get('thanhcong')}}</div>
	@endif
	<table class="table table-striped">
		<tr>
			<th>Tên khách hàng</th>
			<th>Tổng giá</th>
			<th>Hình thức thanh toán</th>
			<th>Ngày đặt hàng</th>
			<th>Ghi chú</th>
			<th>Trạng thái</th>
			<th></th>
		</tr>
		@foreach($donhang as $dh)
		<tr>
			<td>{{$dh->cusname}}</td>
			<td>{{$dh->total}}</td>
			<td>
				@if($dh->payment == 'COD') 
					Thanh toán khi nhận hàng
				@elseif($dh->payment == 'ATM')
					Thanh toán qua ATM
				@endif
			</td>
			<td>{{$dh->date_order}}</td>
			<td>{{$dh->note}}</td>
			<th>Chưa xác nhận</th>
			<th><a href="{{ route('chitietdonhang',$dh->id) }}">Chi tiết</a></th>
		</tr>
		@endforeach
	</table>
	<div class="row">{{$donhang->links()}}</div>
</div>
@endsection