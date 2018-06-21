@extends('admin.index')
@section('content')
<div class="row">
	<ol class="breadcrumb">
		<li><a href="{{ route('admin') }}">
			<em class="fa fa-home"></em>
		</a></li>
		<li class="active">Sản phẩm / Danh sách sản phẩm</li>
	</ol>
</div><!--/.row-->

<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Danh sách sản phẩm</h1>
	</div>
</div><!--/.row-->
<div class="row" style="background: #F1F4F7">
	<div class="col-lg-12">
		<table class="table table-bordered table-striped table-product">
			<tr>
				<th></th>
				<th>Tên Sản Phẩm</th>
				<th>Loại Sản Phẩm</th>
				<th>Loại Khách Hàng</th>
				<th>Kích Cỡ</th>
				<th>Đơn Giá</th>
				<th>Số Lượng</th>
				<th>Trạng thái</th>
			</tr>
			@foreach($product as $pro)
			<tr>
				<td class="title-center"><img src="image/{{$pro->image}}" style="width: 30px"></td>
				<td><a href="{{ route('detailproduct',$pro->id) }}">{{$pro->name}}</a></td>
				<td class="title-center">
					@if($pro->id_type==1)
					Áo
					@elseif($pro->id_type==2)
					Quần
					@elseif($pro->id_type==3)
					Giày
					@endif
				</td>
				<td class="title-center">
					@if($pro->id_typecus==1)
					Nam
					@elseif($pro->id_typecus==2)
					Nữ
					@endif
				</td>
				<td class="title-center">{{$pro->size}}</td>
				<td class="title-center">{{$pro->unit_price}}</td>
				<td class="title-center">{{$pro->number_pro}}</td>
				<td class="title-center">
					@if($pro->number_pro>0)
					Còn hàng
					@elseif($pro->number_pro<=0)
					Hết hàng
					@endif
				</td>
			</tr>
			@endforeach
		</table>
		<div class="row">
			<div class="col-lg-12">
				{{$product->links()}}
			</div>
		</div>
	</div>
</div>
@endsection