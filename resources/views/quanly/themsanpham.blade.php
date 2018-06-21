@extends('quanly.quanly')
@section('noidung')
<div class=""><h2>Thêm sản phẩm</h2><hr></div>
	<div class="col-md-12">
		<form method="POST" role="form" action="{{route('themsanpham')}}">
		<input type="hidden" name="_token" value="{{csrf_token()}}">
			@if(Session::has('thanhcong'))
				<div class="alert alert-success">{{Session::get('thanhcong')}}</div>
			@endif
			<div class="col-md-6">
			  	<div class="form-group">
			    	<label>Tên sản phẩm</label>
			    	<input type="text" class="form-control" id="tensp" name="tensp" placeholder="Nhập vào tên sản phẩm">
			    	@if($errors->has('tensp'))
	    				<p style="color: red">{{ $errors->first('tensp') }}</p>
	    			@endif
			  	</div>
			  	<div class="form-group">
				    <label for="loaisp">Loại sản phẩm</label>
				    <select class="form-control" id="loaisp" name="loaisp">
				    	@foreach($type_product as $type_pro)
						<option value="{{$type_pro->id}}">{{$type_pro->name}}</option>
						@endforeach
					</select>
					@if($errors->has('loaisp'))
	    				<p style="color: red">{{ $errors->first('loaisp') }}</p>
	    			@endif
				</div>
				<div class="form-group">
				    <label for="loaikh">Loại khách hàng</label>
				    <select class="form-control" id="loaikh" name="loaikh">
						@foreach($type_customer as $type_cus)
						<option value="{{$type_cus->id}}">{{$type_cus->name}}</option>
						@endforeach
					</select>
					@if($errors->has('loaikh'))
	    				<p style="color: red">{{ $errors->first('loaikh') }}</p>
	    			@endif
				</div>
				<div class="form-group">
				    <label>Kích cỡ</label>
				    <select class="form-control" id="kichco" name="kichco">
						@foreach($size as $s)
						<option value="{{$s->sizename}}">{{$s->sizename}}</option>
						@endforeach
					</select>
				    @if($errors->has('kichco'))
	    				<p style="color: red">{{ $errors->first('kichco') }}</p>
	    			@endif
				</div>
				<div class="form-group">
				    <label>Đơn vị tính</label>
				    <input type="text" class="form-control" id="donvitinh" name="donvitinh" placeholder="Nhập vào đơn vị tính của sản phẩm">
				    @if($errors->has('donvitinh'))
	    				<p style="color: red">{{ $errors->first('donvitinh') }}</p>
	    			@endif
				</div>
				<div class="form-group">
				    <label>Đơn giá</label>
				    <input type="text" class="form-control" id="dongia" name="dongia" placeholder="Nhập vào đơn giá sản phẩm">
				    @if($errors->has('dongia'))
	    				<p style="color: red">{{ $errors->first('dongia') }}</p>
	    			@endif
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
				    <label>Giá khuyến mãi (Nếu có)</label>
				    <input type="text" class="form-control" id="giakm" name="giakm" placeholder="Nhập vào đơn giá sản phẩm">
				    @if($errors->has('giakm'))
	    				<p style="color: red">{{ $errors->first('giakm') }}</p>
	    			@endif
				</div>
				<div class="form-group">
				    <label>Số lượng</label>
				    <input type="text" class="form-control" id="soluong" name="soluong" placeholder="Nhập vào số lượng sản phẩm">
				    @if($errors->has('soluong'))
	    				<p style="color: red">{{ $errors->first('soluong') }}</p>
	    			@endif
				</div>
				<div class="form-group">
				    <label>Trạng thái</label>
				    <select class="form-control" id="trangthai" name="trangthai">
						<option value="1">Còn hàng</option>
						<option value="2">Hết hàng</option>
					</select>
				    @if($errors->has('trangthai'))
	    				<p style="color: red">{{ $errors->first('trangthai') }}</p>
	    			@endif
				</div>
				<div class="form-group">
				    <label>Mô tả sản phẩm</label>
				    <input type="text" class="form-control" id="mota" name="mota" placeholder="Nhập vào trạng thái sản phẩm">
				    @if($errors->has('mota'))
	    				<p style="color: red">{{ $errors->first('mota') }}</p>
	    			@endif
				</div>
				<div class="form-group">
				    <label>Hình ảnh</label>
					<input type="file" class="form-control" name="hinhanh">
					@if($errors->has('hinhanh'))
	    				<p style="color: red">{{ $errors->first('hinhanh') }}</p>
	    			@endif
				</div>
				<div class="form-group">
					<br>
				    <button class="btn btn-primary">Thêm sản phẩm</button>
				</div>
			</div>
		</form>
	</div>
@endsection