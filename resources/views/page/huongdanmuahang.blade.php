@extends('master')
@section('content')
	<div class="inner-header">
		<div class="container">
			<div class="clearfix"></div>
		</div>
	</div>
	<div class="container">
		<div id="content">
			<div class="our-history">
				<h2 class="text-center wow fadeInDown">Các bước hướng dẫn</h2>
				<div class="space35">&nbsp;</div>

				<div class="history-slider">
					<div class="history-navigation" style="text-align: center;">
						<a data-slide-index="0" href="" class="circle"><span class="auto-center" style="font-size: 14px;">Bước 1</span></a>
						<a data-slide-index="1" href="" class="circle"><span class="auto-center"  style="font-size: 14px;">Bước 2</span></a>
						<a data-slide-index="2" href="" class="circle"><span class="auto-center"  style="font-size: 14px;">Bước 3</span></a>
						<a data-slide-index="3" href="" class="circle"><span class="auto-center"  style="font-size: 14px;">Bước 4</span></a>
						<a data-slide-index="4" href="" class="circle"><span class="auto-center"  style="font-size: 14px;">Bước 5</span></a>
					</div>

					<div class="history-slides">
						<div> 
							<div class="row">
							<div class="col-sm-5">
								<img src="image/buoc1.jpg" alt="">
							</div>
							<div class="col-sm-7">
								<h5 class="other-title"></h5>
								<p>
								</p>
								<div class="space20">&nbsp;</div>
								<p>- Đầu tiên bạn phải đăng nhập vào hệ thống nếu đã có tài khoản, hoặc đăng ký nếu chưa có tài khoản.</p>
								<p>- Bạn có thể mua hàng mà không cần phải đăng nhập.</p>
							</div>
							</div> 
						</div>
						<div> 
							<div class="row">
							<div class="col-sm-5">
								<img src="image/buoc3.jpg" alt="">
							</div>
							<div class="col-sm-7">
								<h5 class="other-title"></h5>
								<p>
								</p>
								<div class="space20">&nbsp;</div>
								<p>- Bạn click vào mục sản phẩm. Sau đó lựa chọn hình thức để hiện thị sản phẩm. Mặc định thì hệ thống sẽ hiện thị kiểu slider để bạn có thể xem trước mẫu phối đồ của bạn trước khi mua. Còn nếu bạn muôn mua sản phẩm theo kiểu bình thường thì bấm chọn <u>Sản phẩm kiểu mặc định</u></p>
							</div>
							</div> 
						</div>
						<div> 
							<div class="row">
							<div class="col-sm-5">
								<img src="image/buoc4.jpg" alt="">
								<div class="space20">&nbsp;</div>
								<img src="image/buoc5.jpg" alt="">
							</div>
							<div class="col-sm-7">
								<h5 class="other-title"></h5>
								<p>
									
								</p>
								<div class="space20">&nbsp;</div>
								<p>- Nếu bạn chọn hiển thị sản phẩm kiểu slider thì ở kiểu này sẽ hiện thị ra 3 loại sản phẩm theo kiểu slider. Bạn chỉ cần kéo, lướt hay click chọn sản phẩm bạn muốn phối, rồi sau đó xem bản phối đồ của bạn ở cạnh bên. Sau đó bạn bấm ô <u>Mua cả bộ</u> để mua bộ sản phẩm bạn đã phối máu</p>
								<p>- Nếu bạn chọn kiểu hiển thị sản phẩm kiểu mặc định thì bạn có thể kéo tìm sản phẩm ứng ý, hoặc có thể lọc sản phẩm bạn cần tìm ở khung lọc góc trái màn hình. Khi tìm được sản phẩm ưng ý, bạn có thể bấm xem chi tiết sản phẩm, hoặc thêm sản phẩm vào giỏ hàng.</p>
							</div>
							</div> 
						</div>
						<div> 
							<div class="row">
							<div class="col-sm-5">
								<img src="image/buoc6.jpg" alt="">
								<div class="space20">&nbsp;</div>
								<img src="image/buoc7.jpg" alt="">
							</div>
							<div class="col-sm-7">
								<h5 class="other-title"></h5>
								<p>
									
								</p>
								<div class="space20">&nbsp;</div>
								<p>- Bạn bấm vào giao diện giỏ hàng, ở đó bạn có thể xem bạn đã thêm bao nhiêu sản phẩm vào giỏ của bạn, bạn có thể xóa bớt sản phẩm bạn không muốn mua nữa ở trong giỏ hàng.</p>
								<p>- Cuối cùng bạn bấm vào nút <u>Giao hàng</u> để thực hiện mua sản phẩm.</p>
							</div>
							</div> 
						</div>
						<div> 
							<div class="row">
							<div class="col-sm-5">
								<img src="image/buoc8.jpg" alt="">
							</div>
							<div class="col-sm-7">
								<h5 class="other-title"></h5>
								<p>
								</p>
								<div class="space20">&nbsp;</div>
								<p>- Ở bước này, bạn nhập đầy đủ thông tin vào trong Form để việc giao hàng thuận tiện nhất, sau đó bạn chọn phương thức giao dịch. Sau đó bạn bấm <u>Đặt hàng</u> để hoàn tất việc mua sản phẩm của bạn.</p>
								<p>- Nếu bạn đã đăng nhập thì chỉ cần nhập nội dung ở ô <u>Ghi chú</u></p>
							</div>
							</div> 
						</div>
					</div>
				</div>
			</div>
		</div> <!-- #content -->
	</div> <!-- .container -->
@endsection