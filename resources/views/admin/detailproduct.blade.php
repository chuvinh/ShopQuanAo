@extends('admin.index')
@section('content')
<div class="row">
	<ol class="breadcrumb">
		<li><a href="{{ route('admin') }}">
			<em class="fa fa-home"></em>
		</a></li>
		<li class="active">Sản phẩm</li>
		<li>
			@foreach ($product as $pro)
			{{$pro->name}}
			@endforeach
		</li>
	</ol>
</div><!--/.row-->

<div class="row" style="background: #F1F4F7;padding-bottom: 20px;">
	<form method="POST" role="form" action="{{route('updateproduct',$pro->id)}}" enctype="multipart/form-data">
		<input type="hidden" name="_token" value="{{csrf_token()}}">
		@if(Session::has('thanhcong'))
		<div class="alert alert-success">{{Session::get('thanhcong')}}</div>
		@endif
		@foreach ($product as $pro)
		<div class="col-lg-8 ">
			<div class="box-product-detail">
				<div class="form-group">
					<label>Tên sản phẩm</label>
					<input class="form-control" type="text" name="nameproduct" value="{{$pro->name}}">
				</div>
				<div class="form-group">
					<label>Mô tả</label>
					<textarea class ="ckeditor" name="description" id="description">{{$pro->description}}</textarea>
				</div>
				<div class="row">
					<div class="form-group col-lg-3">
						<label>Giới tính</label>
						<select class="form-control" type="text" name="id_typecus">
							@foreach ($type_customer as $cus)
							<option @if ($cus->id == $pro->id_typecus)selected @endif value="{{$cus->id}}">{{$cus->name}}</option>
							@endforeach
						</select>
					</div>
					<div class="form-group col-lg-3">
						<label>Loại sản phẩm</label>
						<select class="form-control" type="text" name="id_type">
							@foreach ($type_product as $tpro)
							<option @if ($tpro->id == $pro->id_type)selected @endif value="{{$tpro->id}}">{{$tpro->name}}</option>
							@endforeach
						</select>
					</div>
					<div class="form-group col-lg-3">
						<label>Size</label>
						<select class="form-control" type="text" name="size">
							@if ($pro->id_type == 1)
							@foreach ($size1 as $s)
							<option @if ($s->sizename == $pro->size) selected @endif value="{{$s->sizename}}">{{$s->sizename}}</option>
							@endforeach
							@endif
							@if ($pro->id_type == 2)
							@foreach ($size2 as $s)
							<option @if ($s->sizename == $pro->size) selected @endif value="{{$s->sizename}}">{{$s->sizename}}</option>
							@endforeach
							@endif
							@if ($pro->id_type == 3)
							@foreach ($size3 as $s)
							<option @if ($s->sizename == $pro->size) selected @endif value="{{$s->sizename}}">{{$s->sizename}}</option>
							@endforeach
							@endif
						</select>
					</div>
					<div class="form-group col-lg-3">
						<label>Nhóm sản phẩm</label>
						<select class="form-control" id="trangthai" name="trangthai">
							@foreach ($collections as $cl)
							<option  @if ($cl->id_collections == $pro->status) selected @endif value="{{$cl->id_collections}}">
								{{$cl->name_collections}}
							</option>
							@endforeach
						</select>
					</div>
				</div>
			</div>
			<div class="row" style="margin-top: 20px">
				<div class="col-lg-6">
					<a class="btn-delete" href="">Xóa sản phẩm</a>
				</div>
				<div class="col-lg-6">
					<button type="submit" class="btn-update">Cập nhật</button> 
				</div>
			</div>
		</div>
		<div class="col-lg-4">
			<div class="box-product-detail">
				<div class="form-group">
					<p><label>Ảnh đại diện</label></p>
					<img src="image/{{$pro->image}}" />
					<input type="file" class="form-control" name="hinhanh" value="{{$pro->image}}">
				</div>
				<div class="form-group">
					<label>Giá</label>
					<input class="form-control" type="number" name="unit_price" value="{{$pro->unit_price}}">
				</div>
				<div class="form-group">
					<label>Giá giảm</label>
					<input class="form-control" type="number" name="promotion_price" value="{{$pro->promotion_price}}">
				</div>
				<div class="form-group">
					<label>Số lượng</label>
					<input class="form-control" type="number" name="number_pro" value="{{$pro->number_pro}}">
				</div>
				<div class="form-group">
					<label>Đơn vị tính</label>
					<input class="form-control" type="text" name="unit" value="{{$pro->unit}}">
				</div>
			</div>
		</div>
		@endforeach
	</form>
</div><!--/.row-->

@endsection