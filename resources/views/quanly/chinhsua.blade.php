@extends('quanly.quanly')
@section('noidung')
<div class=""><h2>Chỉnh sửa sản phẩm</h2><hr></div>
	<div class="col-md-12">
		<form method="POST" role="form" action="">
		<input type="hidden" name="_token" value="{{csrf_token()}}">
			@if(Session::has('thanhcong'))
				<div class="alert alert-success">{{Session::get('thanhcong')}}</div>
			@endif
			@foreach($product as $pro)
			<div class="col-md-6">
				<div class="form-group">
			    	<label>Mã sản phẩm</label>
			    	<input type="text" class="form-control" id="masp" name="masp" placeholder="Nhập vào mã sản phẩm" value="{{ $pro->id }}" disabled="">
			    	@if($errors->has('masp'))
	    				<p style="color: red">{{ $errors->first('masp') }}</p>
	    			@endif
				</div>
			  	<div class="form-group">
			    	<label>Tên sản phẩm</label>
			    	<input type="text" class="form-control" id="tensp" name="tensp" placeholder="Nhập vào tên sản phẩm" value="{{ $pro->name }}">
			    	@if($errors->has('tensp'))
	    				<p style="color: red">{{ $errors->first('tensp') }}</p>
	    			@endif
			  	</div>
			  	<div class="form-group">
				    <label for="loaisp">Loại sản phẩm</label>
				    <select class="form-control" id="loaisp" name="loaisp" >
					@if($pro->id_type==1)
						<option selected="selected" value="1">Áo</option>
						<option value="2">Quần</option>
						<option value="3">Giày</option>
					@elseif($pro->id_type==2)
						<option value="1">Áo</option>
						<option selected="selected" value="2">Quần</option>
						<option value="3">Giày</option>
					@elseif($pro->id_type==3)
						<option value="1">Áo</option>
						<option value="2">Quần</option>
						<option selected="selected" value="3">Giày</option>
					@endif
					</select>
					@if($errors->has('loaisp'))
	    				<p style="color: red">{{ $errors->first('loaisp') }}</p>
	    			@endif
				</div>
				<div class="form-group">
				    <label for="loaikh">Loại khách hàng</label>
				    <select class="form-control" id="loaikh" name="loaikh">
					@if($pro->id_typecus==1)
						<option selected="selected" value="1">Nam</option>
						<option value="2">Nữ</option>
					@elseif($pro->id_typecus==2)
						<option value="1">Nam</option>
						<option selected="selected" value="2">Nữ</option>
					@endif
					</select>
					@if($errors->has('loaikh'))
	    				<p style="color: red">{{ $errors->first('loaikh') }}</p>
	    			@endif
				</div>
				<div class="form-group">
				    <label>Kích cỡ</label>
				    <input type="text" class="form-control" id="kichco" name="kichco" placeholder="Nhập vào kích cỡ sản phẩm" value="{{ $pro->size }}">
				    @if($errors->has('kichco'))
	    				<p style="color: red">{{ $errors->first('kichco') }}</p>
	    			@endif
				</div>
				<div class="form-group">
				    <label>Đơn vị tính</label>
				    <input type="text" class="form-control" id="donvitinh" name="donvitinh" placeholder="Nhập vào đơn vị tính của sản phẩm" value="{{ $pro->unit }}">
				    @if($errors->has('donvitinh'))
	    				<p style="color: red">{{ $errors->first('donvitinh') }}</p>
	    			@endif
				</div>
				<div class="form-group">
				    <label>Đơn giá</label>
				    <input type="text" class="form-control" id="dongia" name="dongia" placeholder="Nhập vào đơn giá sản phẩm" value="{{ $pro->unit_price }}">
				    @if($errors->has('dongia'))
	    				<p style="color: red">{{ $errors->first('dongia') }}</p>
	    			@endif
				</div>
				<div class="form-group">
				    <label>Giá khuyến mãi (Nếu có)</label>
				    <input type="text" class="form-control" id="giakm" name="giakm" placeholder="Nhập vào đơn giá sản phẩm" value="{{ $pro->promotion_price }}">
				    @if($errors->has('giakm'))
	    				<p style="color: red">{{ $errors->first('giakm') }}</p>
	    			@endif
				</div>
				<div class="form-group">
				    <label>Số lượng</label>
				    <input type="text" class="form-control" id="soluong" name="soluong" placeholder="Nhập vào số lượng sản phẩm" value="{{ $pro->number_pro }}">
				    @if($errors->has('soluong'))
	    				<p style="color: red">{{ $errors->first('soluong') }}</p>
	    			@endif
				</div>
				<div class="form-group">
				    <label>Trạng thái</label>
				    <select class="form-control" id="trangthai" name="trangthai">
				    @if($pro->new==1)
						<option selected="selected" value="1">Còn hàng</option>
						<option value="2">Hết hàng</option>
					@elseif($pro->new==2)
						<option value="1">Còn hàng</option>
						<option selected="selected" value="2">Hết hàng</option>
					@endif
					</select>
				    @if($errors->has('trangthai'))
	    				<p style="color: red">{{ $errors->first('trangthai') }}</p>
	    			@endif
				</div>
				<div class="form-group">
				    <label>Mô tả sản phẩm</label>
				    <input type="text" class="form-control" id="mota" name="mota" placeholder="Nhập vào trạng thái sản phẩm" value="{{ $pro->description }}">
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
				    <button class="btn btn-primary">Chỉnh sửa</button>
				</div>
			</div>
			<div class="col-md-6">
				<div class="box_hinh">
					<img src="{{ asset('image/'.$pro->image.'') }}" width="100%">
				</div>
			</div>
			@endforeach
		</form>
	</div>
@endsection