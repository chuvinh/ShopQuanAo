@extends('quanly.quanly')
@section('noidung')
<div class=""><h2>Thêm sản phẩm</h2><hr></div>
	<div class="col-md-12">
		<form method="POST" role="form" action="{{route('themnhanh')}}">
		<input type="hidden" name="_token" value="{{csrf_token()}}">
			@if(Session::has('thanhcong'))
				<div class="alert alert-success">{{Session::get('thanhcong')}}</div>
			@endif
			<div class="col-md-6">
			  	<div class="form-group">
			    	<label>Nhập dòng thêm sản phẩm với các giá trị sau: <br>Tên - Loại sản phẩm (Áo, Quần, Giày) - Loại khách hàng (Nam/Nữ) - Size (Chữ đối với áo, số đối với quần, giày) - Mô tả (nếu có) - Đơn giá - Giá khuyến mãi (nếu không thì vui lòng nhập 0) - Đơn vị tính - Số lượng - Tình trạng (Còn hàng hoặc hết hàng)</label>
			    	<input type="text" class="form-control" id="tensp" name="tensp" placeholder="Nhập vào thông tin sản phẩm">
			  	</div>
			  	<div class="form-group">
				    <label>Hình ảnh</label>
					<input type="file" class="form-control" name="hinhanh">
				</div>
				<div class="form-group">
					<br>
				    <button class="btn btn-primary">Thêm sản phẩm</button>
				</div>
			</div>
			<div class="col-md-6">
				<h3>Hướng dẫn:</h3>
				<p>Đầu tiên nhập vào thứ tự các trường thể hiện thông tin của từng sản phẩm, được phân cách nhau bằng dấu gạch nối (-).</p>
			</div>
		</form>
	</div>
@endsection