@extends('admin.index')
@section('content')
<div class="row">
	<ol class="breadcrumb">
		<li><a href="{{ route('admin') }}">
			<em class="fa fa-home"></em>
		</a></li>
		<li class="active">Sản phẩm</li>
		<li>
			Thêm sản phẩm
		</li>
	</ol>
</div><!--/.row-->

<div class="row" style="background: #F1F4F7;padding-bottom: 20px;">
	<form method="POST" role="form" action="{{route('addproductpost')}}" enctype="multipart/form-data">
		<input type="hidden" name="_token" value="{{csrf_token()}}">
		@if(Session::has('thanhcong'))
		<div class="alert alert-success">{{Session::get('thanhcong')}}</div>
		@endif
		<div class="col-lg-8 ">
			<div class="box-product-detail">
				<div class="form-group">
					<label>Tên sản phẩm</label>
					<input class="form-control" type="text" name="nameproduct">
					@if($errors->has('nameproduct'))
					<p style="color: red">{{ $errors->first('nameproduct') }}</p>
					@endif
				</div>
				<div class="form-group">
					<label>Mô tả</label>
					<textarea class ="ckeditor" name="description" id="description"></textarea>
					@if($errors->has('description'))
					<p style="color: red">{{ $errors->first('description') }}</p>
					@endif
				</div>
				<div class="row">
					<div class="form-group col-lg-3">
						<label>Giới tính</label>
						<select class="form-control" type="text" name="id_typecus">
							@foreach ($type_customer as $cus)
							<option value="{{$cus->id}}">{{$cus->name}}</option>
							@endforeach
						</select>
					</div>
					<div class="form-group col-lg-3">
						<label>Loại sản phẩm</label>
						<select class="form-control" type="text" name="id_type" id="id_type">
							@foreach ($type_product as $tpro)
							<option value="{{$tpro->id}}">{{$tpro->name}}</option>
							@endforeach
						</select>
					</div>
					<div class="form-group col-lg-3">
						<label>Size</label>
						<select class="form-control" type="text" name="size" id="size">
							@foreach($size1 as $s)
							<option value="{{$s->sizename}}">{{$s->sizename}}</option>
							@endforeach
						</select>
					</div>
					<div class="form-group col-lg-3">
						<label>Nhóm sản phẩm</label>
						<select class="form-control" id="trangthai" name="trangthai">
							@foreach ($collections as $cl)
							<option value="{{$cl->id_collections}}">{{$cl->name_collections}}</option>
							@endforeach
						</select>
					</div>
				</div>
			</div>
			<div class="row" style="margin-top: 20px">
				<div class="col-lg-6">
				</div>
				<div class="col-lg-6">
					<button type="submit" class="btn-update">Thêm sản phẩm</button> 
				</div>
			</div>
		</div>
		<div class="col-lg-4">
			<div class="box-product-detail">
				<div class="form-group">
					<p><label>Ảnh đại diện</label></p>
					<input type="file" class="form-control" name="hinhanh">
					@if($errors->has('hinhanh'))
					<p style="color: red">{{ $errors->first('hinhanh') }}</p>
					@endif
				</div>
				<div class="form-group">
					<label>Giá</label>
					<input class="form-control" type="number" name="unit_price">
					@if($errors->has('unit_price'))
					<p style="color: red">{{ $errors->first('unit_price') }}</p>
					@endif
				</div>
				<div class="form-group">
					<label>Giá giảm</label>
					<input class="form-control" type="number" name="promotion_price">
					@if($errors->has('promotion_price'))
					<p style="color: red">{{ $errors->first('promotion_price') }}</p>
					@endif
				</div>
				<div class="form-group">
					<label>Số lượng</label>
					<input class="form-control" type="number" name="number_pro">
					@if($errors->has('number_pro'))
					<p style="color: red">{{ $errors->first('number_pro') }}</p>
					@endif
				</div>
				<div class="form-group">
					<label>Đơn vị tính</label>
					<input class="form-control" type="text" name="unit">
					@if($errors->has('unit'))
	    				<p style="color: red">{{ $errors->first('unit') }}</p>
	    			@endif
				</div>
			</div>
		</div>
	</form>
</div><!--/.row-->

@endsection