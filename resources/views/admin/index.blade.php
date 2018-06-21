<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Mr Style - Dashboard</title>
	<base href="{{asset('')}}">
	<link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.min.css')}}">
	<link REL="SHORTCUT ICON" HREF="{{asset('image/title_icon.png')}}">
	<link rel="stylesheet" href="{{asset('css/menu.css')}}">
	<link rel="stylesheet" href="{{asset('css/quanly.css')}}">
	<link rel="stylesheet" href="{{asset('css/login.css')}}">
	<link rel="stylesheet" href="{{asset('css/style.css')}}">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
	<link rel="stylesheet" href="source/assets/dest/vendors/colorbox/example3/colorbox.css">
	<link rel="stylesheet" href="source/assets/dest/rs-plugin/css/settings.css">
	<link rel="stylesheet" href="source/assets/dest/rs-plugin/css/responsive.css">
	<link rel="stylesheet" title="style" href="source/assets/dest/css/style.css">
	<link rel="stylesheet" href="source/assets/dest/css/animate.css">
	<link rel="stylesheet" title="style" href="source/assets/dest/css/huong-style.css">
	<link rel="stylesheet" type="text/css" href="{{ asset('slick/slick.css')}}"/>
</head>
<body class="body-admin" @if(Auth::check() && Auth::user()->roleid == 1)@else style="padding-top: 60px" @endif>
	<div class="rev-slider">
		@if(Auth::check() && Auth::user()->roleid == 1)
		<nav class="navbar navbar-custom navbar-fixed-top pc"  role="navigation">
			<div class="container-fluid">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse"><span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
				</div>
			</div><!-- /.container-fluid -->
		</nav>
		<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
			@include('admin.leftsidebaradmin')
		</div><!--/.sidebar-->

		<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
			@yield('content')
		</div>	<!--/.main-->
		@else
		<div class="row">
			<div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
				<div class="login-panel panel panel-default">
					<div class="panel-heading">Đăng nhập</div>
					<div class="panel-body">
						<form method="POST" role="form" action="{{route('loginadmin')}}">
							<input type="hidden" name="_token" value="{{csrf_token()}}">
							@if(Session::has('flag'))
							<div class="alert alert-{{Session::get('flag')}}">
								{{Session::get('message')}}
							</div>
							@endif
							<div class="form-group">
								<input class="form-control" placeholder="E-mail" name="email" type="email" autofocus="">
								@if($errors->has('email'))
								<p style="color: red">{{ $errors->first('email') }}</p>
								@endif
							</div>
							<div class="form-group">
								<input class="form-control" placeholder="Mật khẩu" name="password" type="password" value="">
								@if($errors->has('password'))
								<p style="color: red">{{ $errors->first('password') }}</p>
								@endif
							</div>
							<button type="submit" class="btn btn-default">Đăng nhập</button>
						</form>
					</div>
				</div>
			</div><!-- /.col-->
		</div><!-- /.row -->
		@endif
	</div> <!-- .container -->
	<!-- include js files -->
	<script src="{{ asset('ckeditor/ckeditor.js')}}"></script>
	<script src="source/assets/dest/js/jquery.js"></script>
	<script src="source/assets/dest/vendors/jqueryui/jquery-ui-1.10.4.custom.min.js"></script>
	<script src="{{asset('bootstrap/js/bootstrap.min.js')}}"></script>
	<script src="source/assets/dest/vendors/bxslider/jquery.bxslider.min.js"></script>
	<script src="source/assets/dest/vendors/colorbox/jquery.colorbox-min.js"></script>
	<script src="source/assets/dest/vendors/animo/Animo.js"></script>
	<script src="source/assets/dest/vendors/dug/dug.js"></script>
	<script src="source/assets/dest/js/scripts.min.js"></script>
	<script src="source/assets/dest/rs-plugin/js/jquery.themepunch.tools.min.js"></script>
	<script src="source/assets/dest/rs-plugin/js/jquery.themepunch.revolution.min.js"></script>
	<script src="source/assets/dest/js/waypoints.min.js"></script>
	<script src="source/assets/dest/js/wow.min.js"></script>
	<script src="{{ asset('slick/slick.min.js')}}"></script>
	<!--customjs-->
	<script src="source/assets/dest/js/custom2.js"></script>
	{{--
	<script src="{{ asset('js/chart.min.js')}}"></script>
	<script src="{{ asset('js/chart-data.js')}}"></script>
	<script src="{{ asset('js/easypiechart.js')}}"></script>
	--}}
	{{--<script src="{{ asset('js/easypiechart-data.js')}}"></script>--}}
	<script src="{{ asset('js/bootstrap-datepicker.js')}}"></script>
	<script src="{{ asset('js/custom.js')}}"></script>
	{{--
	<script>
		window.onload = function () {
			var chart1 = document.getElementById("line-chart").getContext("2d");
			window.myLine = new Chart(chart1).Line(lineChartData, {
				responsive: true,
				scaleLineColor: "rgba(0,0,0,.2)",
				scaleGridLineColor: "rgba(0,0,0,.05)",
				scaleFontColor: "#c5c7cc"
			});
		};
	</script>--}}
	<script>
		$(document).ready(function($) {    
			$(window).scroll(function(){
				if($(this).scrollTop()>150){
					$(".header-bottom").addClass('fixNav')
				}else{
					$(".header-bottom").removeClass('fixNav')
				}
			});
			@yield('script')
			$(window).load(function(){
				var queryString = window.location.search.substring(1);
				var varArray = queryString.split("=");
				var param1 = varArray[0];
				var param2 = varArray[1];
				if(param1 == 'iduser'){
					localStorage.setItem("iduser", param2);
				}
				$('#iduser').val(localStorage.getItem("iduser", param2));
			});
			$('#loaisp').change(function(){
				var idloaisp=$(this).val();
				$.get("loai-sp/"+idloaisp,function(data){
					$("#kichco").html(data);
				});
			});
			$('#id_type').change(function(){
				var idloaisp=$(this).val();
				$.get("loai-sp/"+idloaisp,function(data){
					$("#size").html(data);
				});
			});
			$("#suagiasanpham").click(function(){
				$gia=document.getElementById("giasanpham").value;
				alert($gia);
			});
			$(".box_submit").click(function(){
				$id1=$('.box_thu .slick-active #iteamao').text();
				$id2=$('.box_thu .slick-active #iteamquan').text();
				$id3=$('.box_thu .slick-active #iteamgiay').text();
				window.location="them-ca-bo/"+$id1+"/"+$id2+"/"+$id3+"";
			});
			$('.box_ao').slick({
				slidesToShow: 1,
				slidesToScroll: 1,
				arrows: false,
				fade: true,
				asNavFor: '.product_slider_ao'
			});
			$('.product_slider_ao').slick({
				slidesToShow: 3,
				slidesToScroll: 1,
				asNavFor: '.box_ao',
				dots: true,
				centerMode: false,
				focusOnSelect: true,
				prevArrow:'<button type="button" class="slick-prev"><b><</b></button>',
				nextArrow:'<button type="button" class="slick-next"><b>></b></button>',
			});
			$('.box_quan').slick({
				slidesToShow: 1,
				slidesToScroll: 1,
				arrows: false,
				fade: true,
				asNavFor: '.product_slider_quan'
			});
			$('.product_slider_quan').slick({
				slidesToShow: 3,
				slidesToScroll: 1,
				asNavFor: '.box_quan',
				dots: true,
				centerMode: false,
				focusOnSelect: true,
				prevArrow:'<button type="button" class="slick-prev"><b><</b></button>',
				nextArrow:'<button type="button" class="slick-next"><b>></b></button>',
			});
			$('.box_giay').slick({
				slidesToShow: 1,
				slidesToScroll: 1,
				arrows: false,
				fade: true,
				asNavFor: '.product_slider_giay'
			});
			$('.product_slider_giay').slick({
				slidesToShow: 3,
				slidesToScroll: 1,
				asNavFor: '.box_giay',
				dots: true,
				centerMode: false,
				focusOnSelect: true,
				prevArrow:'<button type="button" class="slick-prev"><b><</b></button>',
				nextArrow:'<button type="button" class="slick-next"><b>></b></button>',
			});
		})
	</script>
</body>
</html>
