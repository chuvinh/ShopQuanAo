@extends('master')
@section('content')
<div class="container">
		<div id="content" class="space-top-none space-bottom-none">
			<div class="abs-fullwidth bg-gray">
				<div class="space100">&nbsp;</div>
				<div class="space80">&nbsp;</div>
				<div class="container text-center">
					<h2>Rất tiếc, trang bạn vừa nhập không được tìm thấy !</h2>
					<div class="space40">&nbsp;</div>
					<img src="{{ asset('image/404.jpg') }}" alt="">
					<div class="space30">&nbsp;</div>
					<p>Bạn có thể bấm vào <a href="{{route('trang-chu')}}"><u>đây</u></a> để trở về trang chủ.</p>
				</div>
				<div class="space100">&nbsp;</div>
				<div class="space30">&nbsp;</div>
			</div>
		</div> <!-- #content -->
	</div> <!-- .container -->
@endsection