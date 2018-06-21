@extends('quanly.quanly')
@section('noidung')
<div class=""><h2>Danh sách sản phẩm</h2><hr></div>
<div class="gia">
	<form role="form" method="POST" action="{{ route('suagiasanpham') }}">
		<input type="hidden" name="_token" value="{{csrf_token()}}">
		@if($errors->has('errorsUpdate'))
		<div class="alert alert-danger">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			{{$errors->first('errorsUpdate')}}
		</div>
		@endif
		@if($errors->has('errorsSuccess'))
		<div class="alert alert-danger">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			{{$errors->first('errorsSuccess')}}
		</div>
		@endif
		<table class="table table-bordered table-striped">
			<tr>
				<th>Tên Sản Phẩm</th>
				<th>Loại Sản Phẩm</th>
				<th>Loại Khách Hàng</th>
				<th>Kích Cỡ</th>
				<th>Đơn Giá</th>
				<th>Số Lượng</th>
			</tr>
			@foreach($product as $pro)
			<tr>
				<td>{{ $pro->name }}</td>
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
				<td>{{ $pro->size }}</td>
				<td><input type="text" class="form-control" name="giasanpham" id="giasanpham" value="{{ $pro->unit_price }}"></td>
				<td>{{ $pro->number_pro }}</td>
			</tr>
			@endforeach
		</table>
		<button class="btn btn-primary" id="suagiasanpham">Sửa giá sản phẩm</button>
	</form>
</div>
@endsection
