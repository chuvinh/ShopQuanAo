@extends('admin.index')
@section('content')
<div class="row">
	<ol class="breadcrumb">
		<li><a href="{{ route('admin') }}">
			<em class="fa fa-home"></em>
		</a></li>
		<li class="active">Sản phẩm</li>
		<li>
			Sửa giá sản phẩm
		</li>
	</ol>
</div><!--/.row-->

<div class="row" style="background: #F1F4F7;padding-bottom: 20px;">
	<div class="col-md-6" style="margin-top: 50px">
		<form method="POST" role="form" action="{{route('editproductpost')}}" enctype="multipart/form-data" class="updateup">
			<input type="hidden" name="_token" value="{{csrf_token()}}">
			@if(Session::has('thanhcong'))
			<div class="alert alert-success">{{Session::get('thanhcong')}}</div>
			@endif
			<div class="form-group">
				<label>Chọn nhóm sản phẩm</label>
				<select class="form-control" name="namecollections">
					@foreach ($collections as $cl)
					<option value="{{$cl->id_collections}}">{{$cl->name_collections}}</option>
					@endforeach
				</select>
			</div>
			<div class="form-group">
				<label>Nhập giá cần tăng thêm</label>
				<input class="form-control" type="number" name="price">
				@if($errors->has('price'))
				<p style="color: red">{{ $errors->first('price') }}</p>
				@endif
			</div>
			<div class="form-group">
				<button type="submit" class="btn-update">Chỉnh sửa giá</button> 
			</div>
		</form>
	</div>
</div><!--/.row-->
@endsection