@extends('master')
@section('content')
<section class="">
	<div class="container-fluid">
		<div class="col-md-3 box_menu_quanly">
			<div class="content_title">
				<hr>
			</div>
			<ul class="nav nav-pills nav-stacked menu_quanly">
				<li class="tree-toggle"><a>Theo loại sản phẩm<span class="menu-collapsible-icon glyphicon glyphicon-chevron-down"></span></a></li>
				<ul class="nav nav-list tree">
					<li class=""><a href="{{ route('loaisanpham',1) }}">Áo</a></li>
					<li class=""><a href="{{ route('loaisanpham',2) }}">Quần</a></li>
					<li class=""><a href="{{ route('loaisanpham',3) }}">Giày</a></li>
				</ul>
				<li class="tree-toggle"><a>Theo loại khách hàng<span class="menu-collapsible-icon glyphicon glyphicon-chevron-down"></span></a></li>
				<ul class="nav nav-list tree">
					<li class=""><a href="{{ route('loaikhachhang',1) }}">Nam</a></li>
					<li class=""><a href="{{ route('loaikhachhang',2) }}">Nữ</a></li>
				</ul>
				<li class="tree-toggle"><a>Sắp xếp theo giá gốc<span class="menu-collapsible-icon glyphicon glyphicon-chevron-down"></span></a></li>
				<ul class="nav nav-list tree">
					<li class=""><a href="{{ route('tucaodenthap')}}">Từ cao đến thấp</a></li>
					<li class=""><a href="{{ route('tuthapdencao')}}">Từ thấp đến cao</a></li>
				</ul>
			</ul>
		</div>
		<div class="col-md-9">
			<div class="content_title">
				<hr>
			</div>
			@yield('sanpham')
		</div>
	</div>
</section>
@endsection