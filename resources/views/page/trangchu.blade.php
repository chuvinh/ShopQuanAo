@extends('master')
@section('content')
<div class="container">
	<div class="fullwidthbanner">
		<div class="col-md-8 pd0">
			<div class="bannercontainer" >
				<div class="banner" >
					<ul>
						@foreach($slide as $sl)
						<!-- THE FIRST SLIDE -->
						<li data-transition="boxfade" data-slotamount="20" class="active-revslide" style="width: 100%; height: 100%; overflow: hidden; z-index: 18; visibility: hidden; opacity: 0;">
							<div class="slotholder" style="width:100%;height:100%;" data-duration="undefined" data-zoomstart="undefined" data-zoomend="undefined" data-rotationstart="undefined" data-rotationend="undefined" data-ease="undefined" data-bgpositionend="undefined" data-bgposition="undefined" data-kenburns="undefined" data-easeme="undefined" data-bgfit="undefined" data-bgfitend="undefined" data-owidth="undefined" data-oheight="undefined">
								<div class="tp-bgimg defaultimg" data-lazyload="undefined" data-bgfit="cover" data-bgposition="center center" data-bgrepeat="no-repeat" data-lazydone="undefined" src="image/{{$sl->image}}" data-src="image/{{$sl->image}}" style="background-color: rgba(0, 0, 0, 0); background-repeat: no-repeat; background-image: url('image/{{$sl->image}}'); background-size: cover; background-position: center center; width: 100%; height: 100%; opacity: 1; visibility: inherit;">
								</div>
							</div>

						</li>
						@endforeach
					</ul>
				</div>
			</div>
		</div>
		<div class="col-md-4">
			<ul class="col-md-12" style="width: 100%;background: #f1e9de;padding-top: 10px;padding-right: 10px;padding-left: 10px;height: 317px;">
				<img src="image/banner-ao-1.jpg" alt="" height="100px" width="100%" style="margin-top: -5px;"></a>
				<img src="image/banner-quan-1.jpg" alt="" height="100px" width="100%" style="margin-top: -2px;"></a>
				<img src="image/banner-giay-2.jpg" alt="" height="100px" width="100%" style="margin-top: -2px;"></a>
			</ul>
		</div>
	</div>
</div>
<!--slider-->
</div>
<div class="container">
	<div id="content" class="space-top-none">
		<div class="main-content">
			<div class="row">
				<div class="col-sm-12">
					<div class="beta-products-list">
						<div class="space50">&nbsp;</div>
						<h4 class="title-center">Sản phẩm mới</h4>
						<div class="beta-products-details">
							<div class="clearfix"></div>
						</div>

						<div class="row">
							@foreach($new_product as $new)
							<div class="col-sm-3 box_iteam">
								<div class="single-item">
									@if($new->number_pro<=0)
									<div class="ribbon-wrapper"><div class="ribbon sale" style="font-size: 10px">Hết hàng</div></div>
									@elseif($new->promotion_price!=0)
									<div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
									@endif
									<div class="single-item-header">
										<a href="{{route('chitietsanpham',$new->id)}}"><img src="image/{{$new->image}}" alt="" height="250px"></a>
									</div>
									<div class="single-item-body">
										<p class="single-item-title">{{$new->name}}</p>
										<p id="idsp" style="display: none">{{$new->id}}</p>
										<p class="single-item-price" style="font-size: 15px">
											@if($new->promotion_price==0)
											<span class="flash-sale">{{number_format($new->unit_price)}} đồng</span>
											@else
											<span class="flash-del">{{number_format($new->unit_price)}} đồng</span>
											<span class="flash-sale">{{number_format($new->promotion_price)}} đồng</span>
											@endif
										</p>
									</div>
									<div class="single-item-caption">
										@if($new->number_pro<=0)
										<a class="add-to-cart pull-left"><i class="fa fa-shopping-cart"></i></a>
										<a class="beta-btn primary" href="{{route('chitietsanpham',$new->id)}}">Chi tiết <i class="fa fa-chevron-right"></i></a>
										@else
										<a class="add-to-cart pull-left" href="{{route('themgiohang',$new->id)}}" id="add_cart"><i class="fa fa-shopping-cart"></i></a>
										<a class="beta-btn primary" href="{{route('chitietsanpham',$new->id)}}">Chi tiết <i class="fa fa-chevron-right"></i></a>
										@endif
										<div class="clearfix"></div>
									</div>
								</div>
							</div>
							@endforeach
						</div>
					</div> <!-- .beta-products-list -->

					<div class="space50">&nbsp;</div>

					<div class="beta-products-list">
						<h4 class="title-center">Sản phẩm khuyến mãi</h4>
						<div class="beta-products-details">
							<div class="clearfix"></div>
						</div>
						<div class="row">
							@foreach($sanpham_khuyenmai as $spkm)
							<div class="col-sm-3">
								<div class="single-item">
									<div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
									<div class="single-item-header">
										<a href="{{route('chitietsanpham',$spkm->id)}}"><img src="image/{{$spkm->image}}" alt="" height="250px"></a>
									</div>
									<div class="single-item-body">
										<p class="single-item-title">{{$spkm->name}}</p>
										<p class="single-item-price"  style="font-size: 15px">
											<span class="flash-del">{{number_format($spkm->unit_price)}} đồng</span>
											<span class="flash-sale">{{number_format($spkm->promotion_price)}} đồng</span>
										</p>
									</div>
									<div class="single-item-caption">
										<a class="add-to-cart pull-left" href="{{route('themgiohang',$new->id)}}"><i class="fa fa-shopping-cart"></i></a>
										<a class="beta-btn primary" href="{{route('chitietsanpham',$new->id)}}">Chi Tiết <i class="fa fa-chevron-right"></i></a>
										<div class="clearfix"></div>
									</div>
								</div>
							</div>
							@endforeach
						</div>
						<div class="row">{{$sanpham_khuyenmai->links()}}</div>
					</div> <!-- .beta-products-list -->
				</div>
			</div> <!-- end section with sidebar and main content -->


		</div> <!-- .main-content -->
	</div> <!-- #content -->
</div>
@endsection