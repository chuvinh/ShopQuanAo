window.onload=function(){
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
  		slidesToShow: 4,
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
  		slidesToShow: 4,
  		slidesToScroll: 1,
  		asNavFor: '.box_giay',
  		dots: true,
  		centerMode: false,
  		focusOnSelect: true,
  		prevArrow:'<button type="button" class="slick-prev"><b><</b></button>',
  		nextArrow:'<button type="button" class="slick-next"><b>></b></button>',
	});
};