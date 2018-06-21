@extends('page.macdinh')
@section('sanpham')
<div class="beta-products-list">
	@foreach($sanpham as $sp)
	<div class="col-sm-4 box_iteam">
		<div class="single-item">
			@if($sp->number_pro<=0)
			<div class="ribbon-wrapper"><div class="ribbon sale" style="font-size:10px">Hết hàng</div></div>
			@elseif($sp->promotion_price!=0)
			<div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
			@endif
			<div class="single-item-header">
				<a href="{{route('chitietsanpham',$sp->id)}}"><img src="image/{{$sp->image}}" alt="" height="250px"></a>
			</div>
			<div class="single-item-body">
				<p class="single-item-title">{{$sp->name}}</p>
				<p class="single-item-price" style="font-size: 18px">
					@if($sp->promotion_price==0)
					<span class="flash-sale">{{number_format($sp->unit_price)}} đồng</span>
					@else
					<span class="flash-del">{{number_format($sp->unit_price)}} đồng</span>
					<span class="flash-sale">{{number_format($sp->promotion_price)}} đồng</span>
					@endif
				</p>
			</div>
			
			@if($sp->number_pro<=0)
			<div class="single-item-caption" style="display: disabled">
				<a class="add-to-cart pull-left"><i class="fa fa-shopping-cart"></i></a>
				<a class="beta-btn primary" href="{{route('chitietsanpham',$sp->id)}}">Chi tiết <i class="fa fa-chevron-right"></i></a>
				<div class="clearfix"></div>
			</div>
			@else
			<div class="single-item-caption">
				<a class="add-to-cart pull-left" href="{{route('themgiohang',$sp->id)}}"><i class="fa fa-shopping-cart"></i></a>
				<a class="beta-btn primary" href="{{route('chitietsanpham',$sp->id)}}">Chi tiết <i class="fa fa-chevron-right"></i></a>
				<div class="clearfix"></div>
			</div>
			@endif
		</div>
	</div>
	@endforeach
</div>
<div class="col-sm-12">{{$sanpham->links()}}</div>
@endsection