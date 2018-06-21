<div id="header">
	<div class="header-top">
		<div class="container">
			<div class="col-md-12">
				<div class="col-md-12 top-hotline">
					<div class="col-md-2">
						<a href="/" id="logo"><img src="{{asset('image/title_icon.png')}}" width="20px" height="20px" alt=""></a>	
					</div>
					<a><i style="font-size:15px" class="fa fa-phone"></i>Tư vấn mua hàng: <span style="color: red;font-size: 18px">0168 569 9420</span> </a>
					@if(Auth::check() && Auth::user()->roleid != 1)
					<a class="logout" href="{{route('logout')}}"><span class="glyphicon glyphicon-log-out"></span> Đăng xuất</a>
					<a class="" style="float: right;padding:10px">Chào bạn, {{Auth::user()->full_name}} !</a>
					@else
					<a class="register" href="{{route('signin')}}"><span class="glyphicon glyphicon-edit"></span> Đăng kí</a>
					<a class="login" href="{{route('login')}}"><span class="glyphicon glyphicon-log-in"></span> Đăng nhập</a>
					@endif
				</div>
			</div>
			<div class="clearfix"></div>
		</div> <!-- .container -->
		<div class="col-md-12 bg-menu">
			<div class="container">
				<a class="visible-xs beta-menu-toggle pull-right" href="#"><span class='beta-menu-toggle-text'>Menu</span> <i class="fa fa-bars"></i></a>
				<div class="visible-xs clearfix"></div>
				<nav class="main-menu">
					<ul class="l-inline ov">
						<li><a href="{{route('trang-chu')}}"><span class="glyphicon glyphicon-home"></span> Trang chủ</a></li>
						<li><a href="{{route('sanpham')}}"><span class="glyphicon glyphicon-list-alt"></span> Phối sản phẩm</a></li>
						<li><a href="{{route('sanphammacdinh')}}"><span class="glyphicon glyphicon-list-alt"></span> Danh sách sản phẩm</a></li>
						<li><a href="{{route('huongdanmuahang')}}"><span class="glyphicon glyphicon-pencil"></span> Hướng dẫn mua hàng</a></li>
						<li><a href="{{route('lienhe')}}"><span class="glyphicon glyphicon-inbox"></span> Liên hệ</a></li>
						@if(Auth::check() && Auth::user()->roleid != 1)
						<li><a href="{{route('shareproduct', Auth::user()->id)}}"><span class="glyphicon glyphicon-share-alt"></span> Chia sẻ sản phẩm</a></li>
						@else
						<li><a href="{{route('login')}}"><span class="glyphicon glyphicon-share-alt"></span> Chia sẻ sản phẩm</a></li>
						@endif
						<li>
							<div class="cart">
								<div class="beta-select"><i class="fa fa-shopping-cart"></i>(@if(Session::has('cart'))<b style="color: red">{{Session('cart')->totalQty}}</b>@else 0 @endif) <i class="fa fa-chevron-down"></i></div>
								@if(Session::has('cart'))
								<div class="beta-dropdown cart-body">
									@foreach($product_cart as $product)
									<div class="cart-item">
										<a class="cart-item-delete" href="{{route('xoagiohang',$product['item']['id'])}}"><i class="fa fa-times"></i></a>
										<div class="media">
											<a class="pull-left"><img src="image/{{$product['item']['image']}}" alt=""></a>
											<div class="media-body">
												<span class="cart-item-title">{{$product['item']['name']}}</span>
												<span class="cart-item-amount">{{$product['qty']}}*<span>@if($product['item']['promotion_price']==0){{number_format($product['item']['unit_price'])}} @else {{number_format($product['item']['promotion_price'])}}@endif</span></span>
											</div>
										</div>
									</div>
									@endforeach
									<div class="cart-caption">
										<div class="cart-total text-right">Tổng tiền: 
											<span class="cart-total-value">
												@if(Session::has('cart'))
												{{number_format($totalPrice)}}
												@else 0 
												@endif đồng
											</span>
										</div>
										<div class="clearfix"></div>

										<div class="center">
											<div class="space10">&nbsp;</div>
											<a href="{{route('dathang')}}" class="beta-btn primary text-center">Đặt hàng <i class="fa fa-chevron-right"></i></a>
										</div>
									</div>
								</div>
								@endif
							</div>
						</li>
					</ul>
					<div class="clearfix"></div>
				</nav>
			</div>
			
		</div>
	</div> <!-- .header-top -->
</div> <!-- #header -->