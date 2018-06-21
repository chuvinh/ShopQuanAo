<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Mr Style</title>
	<base href="{{asset('')}}">
	<link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.min.css')}}">
	<link REL="SHORTCUT ICON" HREF="{{asset('image/title_icon.png')}}">
	<link rel="stylesheet" href="{{asset('css/menu.css')}}">
	<link rel="stylesheet" href="{{asset('css/quanly.css')}}">
	<link rel="stylesheet" href="{{asset('css/login.css')}}">
	<link rel="stylesheet" href="{{asset('css/style.css')}}">
	<link rel="stylesheet" href="source/assets/dest/css/font-awesome.min.css">
	<link rel="stylesheet" href="source/assets/dest/vendors/colorbox/example3/colorbox.css">
	<link rel="stylesheet" href="source/assets/dest/rs-plugin/css/settings.css">
	<link rel="stylesheet" href="source/assets/dest/rs-plugin/css/responsive.css">
	<link rel="stylesheet" title="style" href="source/assets/dest/css/style.css">
	<link rel="stylesheet" href="source/assets/dest/css/animate.css">
	<link rel="stylesheet" title="style" href="source/assets/dest/css/huong-style.css">
	<link rel="stylesheet" type="text/css" href="{{ asset('slick/slick.css')}}"/>
</head>
<body>
	@include('header')
	<div class="rev-slider">
		@yield('content')
	</div> <!-- .container -->
	@include('footer')
	


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
	@yield('script')
	<script>
		$(document).ready(function($) {    
			$(window).scroll(function(){
				if($(this).scrollTop()>150){
					$(".header-bottom").addClass('fixNav')
				}else{
					$(".header-bottom").removeClass('fixNav')
				}
			});
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
				slidesToShow: 4,
				slidesToScroll: 1,
				asNavFor: '.box_ao',
				dots: true,
				centerMode: false,
				focusOnSelect: true,
				prevArrow:'<i class="fa fa-chevron-left btn-left"></i>',
				nextArrow:'<i class="fa fa-chevron-right bnt-right"></i>',
			});
			$('.box_quan').slick({
				slidesToShow: 1,
				slidesToScroll: 1,
				arrows: false,
				fade: true,
				asNavFor: '.product_slider_quan'
			});
			$('.product_slider_quan').slick({
				slidesToShow: 4,
				slidesToScroll: 1,
				asNavFor: '.box_quan',
				dots: true,
				centerMode: false,
				focusOnSelect: true,
				prevArrow:'<i class="fa fa-chevron-left btn-left"></i>',
				nextArrow:'<i class="fa fa-chevron-right bnt-right"></i>',
			});
			$('.box_giay').slick({
				slidesToShow: 1,
				slidesToScroll: 1,
				arrows: false,
				fade: true,
				asNavFor: '.product_slider_giay'
			});
			$('.product_slider_giay').slick({
				slidesToShow: 4,
				slidesToScroll: 1,
				asNavFor: '.box_giay',
				dots: true,
				centerMode: false,
				focusOnSelect: true,
				prevArrow:'<i class="fa fa-chevron-left btn-left"></i>',
				nextArrow:'<i class="fa fa-chevron-right bnt-right"></i>',
			});
		})
	</script>
</body>
</html>
