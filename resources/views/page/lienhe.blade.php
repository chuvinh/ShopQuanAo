@extends('master')
@section('content')
	<div class="inner-header">
		<div class="container">

			<div class="clearfix"></div>
		</div>
	</div>
	<div class="beta-map">
		
		<div class="abs-fullwidth beta-map wow flipInX"><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3918.5504037018877!2d106.7769402142465!3d10.845677660878657!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3175270dda7cfa59%3A0x276eb79e46ce1c9b!2zVmluY29tIFBsYXphIEzDqiBWxINuIFZp4buHdA!5e0!3m2!1svi!2s!4v1502427802403"></iframe></div>
	</div>
	<div class="container">
		<div id="content" class="space-top-none">
			<div class="space50">&nbsp;</div>
			<div class="row">
				<div class="col-sm-8">
					<h2>Form Liên hệ</h2>
					<div class="space20">&nbsp;</div>
					@if(Session::has('thanhcong'))
						<div class="alert alert-success">{{Session::get('thanhcong')}}</div>
					@endif
					<div class="space20">&nbsp;</div>
					@if(Auth::check())
					<form action="{{route('lienhe')}}" method="post" class="contact-form">
					<input type="hidden" name="_token" value="{{csrf_token()}}">
						<div class="form-group">
							<input name="name" id="name" class="form-control" type="text" placeholder="Họ và tên của bạn" value="{{Auth::user()->full_name}}" style="width: 80% !important;" required>
						</div>
						<div class="form-group">
							<input name="email" id="email"  class="form-control" type="email" placeholder="Email của bạn" value="{{Auth::user()->email}}" style="width: 80% !important;" required>
						</div>
						<div class="form-group">
							<input name="title" id="title"  class="form-control" type="text" placeholder="Tiêu đề" style="width: 80% !important;" required>
						</div>
						<div class="form-group">
							<textarea name="message" id="message"  class="form-control" placeholder="Nội dung tin nhắn" style="height: 100px;" required></textarea>
						</div>
						<div class="form-group">
							<button type="submit" class="btn btn-primary">Gửi tin nhắn <i class="fa fa-chevron-right"></i></button>
						</div>
					</form>
					@else
					<form action="{{route('lienhe')}}" method="post" class="contact-form">
					<input type="hidden" name="_token" value="{{csrf_token()}}">
						<div class="form-group">
							<input name="name" id="name" class="form-control" type="text" placeholder="Họ và tên của bạn" style="width: 80% !important;" required>
						</div>
						<div class="form-group">
							<input name="email" id="email"  class="form-control" type="email" placeholder="Email của bạn" style="width: 80% !important;" required>
						</div>
						<div class="form-group">
							<input name="title" id="title"  class="form-control" type="text" placeholder="Tiêu đề" style="width: 80% !important;" required>
						</div>
						<div class="form-group">
							<textarea name="message" id="message"  class="form-control" placeholder="Nội dung tin nhắn" style="height: 100px;" required></textarea>
						</div>
						<div class="form-group">
							<button type="submit" class="btn btn-primary">Gửi tin nhắn <i class="fa fa-chevron-right"></i></button>
						</div>
					</form>
					@endif
				</div>
				<div class="col-sm-4">
					<h2>Thông tin liên hệ</h2>
					<div class="space20">&nbsp;</div>

					<h6 class="contact-title">Địa chỉ</h6>
					<p>
						Lê Văn Việt, Quận 9, Tp.HCM.
					</p>
					<div class="space20">&nbsp;</div>
					<h6 class="contact-title">Email</h6>
					<p>
						<a href="#">levanvinh1503@gmail.com</a>
					</p>
					<div class="space20">&nbsp;</div>
					<h6 class="contact-title">Số điện thoại</h6>
					<p>
						0168 569 9420 gặp anh Vịnh <br>
						hoặc 096 828 3533 gặp anh Vinh.
					</p>
				</div>
			</div>
		</div> <!-- #content -->
	</div> <!-- .container -->
@endsection