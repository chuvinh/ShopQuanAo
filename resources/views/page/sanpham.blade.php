@extends('master')
@section('content')
<section class="">
	<div class="container-fluid">
		<div class="col-md-12 hottrongngay">
			<div class="content_title">
			</div>
			<div class="col-md-9">
				<div class="content_product">
					<div class="product_slider_ao">
						@foreach($sp as $sp)
						<div class="single-item">
							<div class="single-item-header">
								<img src="image/{{$sp->image}}" alt="" width="100px" height="100px">
							</div>
							<div class="single-item-body">
								<p class="single-item-title">{{$sp->name}}</p>
								<p class="single-item-price"  style="font-size: 18px">
									@if($sp->promotion_price==0)
									<span class="flash-sale">{{number_format($sp->unit_price)}} đồng</span>
									@else
									<span class="flash-sale">{{number_format($sp->promotion_price)}} đồng</span>
									@endif
								</p>
							</div>
						</div>
						@endforeach
					</div>
					<div class="product_slider_quan">
						@foreach($spquan as $spquan)
						<div class="single-item">
							<div class="single-item-header">
								<img src="image/{{$spquan->image}}" alt="" width="100px" height="100px">
							</div>
							<div class="single-item-body">
								<p class="single-item-title">{{$spquan->name}}</p>
								<p class="single-item-price"  style="font-size: 18px">
									@if($spquan->promotion_price==0)
									<span class="flash-sale">{{number_format($spquan->unit_price)}} đồng</span>
									@else
									<span class="flash-sale">{{number_format($spquan->promotion_price)}} đồng</span>
									@endif
								</p>
							</div>
						</div>
						@endforeach
					</div>
					<div class="product_slider_giay">
						@foreach($spgiay as $spgiay)
						<div class="single-item">
							<div class="single-item-header">
								<img src="image/{{$spgiay->image}}" alt="" width="100px" height="100px">
							</div>
							<div class="single-item-body">
								<p class="single-item-title">{{$spgiay->name}}</p>
								<p class="single-item-price"  style="font-size: 18px">
									@if($spgiay->promotion_price==0)
									<span class="flash-sale">{{number_format($spgiay->unit_price)}} đồng</span>
									@else
									<span class="flash-sale">{{number_format($spgiay->promotion_price)}} đồng</span>
									@endif
								</p>
							</div>
						</div>
						@endforeach
					</div>
				</div>
			</div>
			<div class="col-md-3 box_thu">
				<div class="col-md-9 col-md-offset-2">
					<div class="col-md-12 box_ao">
						@foreach($spboxao as $ao)
						<div class="iteam">
							<img src="image/{{$ao->image}}" width="100%">
							<p style="display: none" id="iteamao">{{$ao->id}}</p>
						</div>
						@endforeach
					</div>
					<div class="col-md-12 box_quan">
						@foreach($spboxquan as $quan)
						<div class="iteam">
							<img src="image/{{$quan->image}}" width="100%" >
							<p style="display: none" id="iteamquan">{{$quan->id}}</p>
						</div>
						@endforeach
					</div>
					<div class="col-md-12 box_giay">
						@foreach($spboxgiay as $giay)
						<div class="iteam">
							<img src="image/{{$giay->image}}" width="100%">
							<p style="display: none" id="iteamgiay">{{$giay->id}}</p>
						</div>
						@endforeach
					</div>
					<div class="col-md-12 box_submit">
						<div class="muacabo">
							<a>Mua bộ này</a>
						</div>
					</div>
				</div>

			</div>
		</div>
		<div></div>
	</div>
</section>
@endsection