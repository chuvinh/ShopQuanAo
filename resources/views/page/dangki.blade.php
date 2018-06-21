@extends('master')
@section('content')
<div class="inner-header">
	<div class="container">
		<div class="clearfix"></div>
	</div>
</div>

<div class="container box_dangnhap">
	<div id="content">
		<div class="col-md-12">
			<div><h2>Đăng ký</h2><hr></div>
			<div class="form_dangnhap">
				<form method="POST" role="form" action="{{route('signin')}}">
					<input type="hidden" name="_token" value="{{csrf_token()}}">
					@if(count($errors)>0)
					<div class="alert alert-danger">
						@foreach($errors->all() as $err)
						{{$err}}<br>
						@endforeach
					</div>
					@endif
					@if(Session::has('thanhcong'))
					<div class="alert alert-success">{{Session::get('thanhcong')}}</div>
					@endif
					<div class="col-md-6">
						<div class="form-group">
							<label>Email</label>
							<input type="text" class="form-control" id="email" name="email" placeholder="Nhập vào tên đăng nhập của bạn">
						</div>
						<div class="form-group">
							<label>Mật khẩu</label>
							<input type="password" class="form-control" id="password" name="password" placeholder="Nhập mật khẩu của bạn">
						</div>
						<div class="form-group">
							<label>Nhập lại mật khẩu</label>
							<input type="password" class="form-control" id="repassword" name="re_password" placeholder="Nhập mật khẩu của bạn">
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label>Họ và tên</label>
							<input type="text" class="form-control" id="fullname" name="fullname" placeholder="Nhập họ và tên của bạn">
						</div>
						<div class="form-group">
							<label>Địa chỉ</label>
							<input type="text" class="form-control" id="address" name="address" placeholder="Nhập địa chi của bạn">
						</div>
						<div class="form-group">
							<label>Số điện thoại</label>
							<input type="text" class="form-control" id="phone" name="phone" placeholder="Nhập số điện thoại của bạn">
						</div>
					</div>
					<div class="form-group">
						<button type="submit" class="btn btn-default">Đăng ký</button>
					</div>
				</form>
			</div>
		</div>
	</div> <!-- #content -->
</div> <!-- .container -->
@endsection