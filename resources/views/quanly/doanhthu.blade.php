@extends('quanly.quanly')
@section('noidung')
<div><h2>Doanh thu</h2><hr></div>
<div>
	<table class="table table-striped">
		<tr>
			<th>Ngày</th>
			<th>Hình thức thanh toán</th>
			<th>Tổng tiền</th>
		</tr>
		@foreach ($product as $pro)
		<tr>
			<td>{{$pro->date_order}}</td>
			<td>{{$pro->payment}}</td>
			<td>{{$pro->total}}</td>
		</tr>
		@endforeach
		<tr>
			<td>Tổng cộng:</td>
			<td></td>
			<td style="color: blue">{{$pro->sum('total')}}</td>
		</tr>
	</table>
</div>
@endsection