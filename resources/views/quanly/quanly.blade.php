@extends('master')
@section('content')
@if(Auth::check())
	@if(Auth::user()->roleid==2)
<section class="content_quanly">
	<div class="container-fluid">
		<div class="col-md-3 box_menu_quanly">
			<ul class="nav nav-pills nav-stacked menu_quanly">
				<li class="tree-toggle"><a>Quản lý sản phẩm<span class="menu-collapsible-icon glyphicon glyphicon-chevron-down"></span></a></li>
					<ul class="nav nav-list tree">
						<li class="ql_sanpham"><a href="/quan-ly/danh-sach-san-pham">Danh sách sản phẩm</a></li>
						<li class="ql_sanpham"><a href="{{route('suagiasanpham')}}">Sửa giá sản phẩm</a></li>
						<li class="ql_sanpham"><a href="{{route('themsanpham')}}">Thêm sản phẩm</a></li>
						<li><a href="{{route('themnhanh')}}">Thêm nhanh</a></li>
					</ul>
				<li class="tree-toggle"><a>Quản lý đơn hàng<span class="menu-collapsible-icon glyphicon glyphicon-chevron-down"></span></a></li>
					<ul class="nav nav-list tree">
						<li class="ql_donhang"><a href="{{ route('danhsachdonhang') }}">Danh sách các đơn hàng</a></li>
					</ul>
				<li class="tree-toggle"><a>Quản lý khuyến mãi<span class="menu-collapsible-icon glyphicon glyphicon-chevron-down"></span></a></li>
					<ul class="nav nav-list tree">
						<li class="ql_khuyenmai"><a href="/quan-ly/danh-sach-khuyen-mai">Danh sách chương trình khuyến mãi</a></li>
						<li class="ql_khuyenmai"><a href="/quan-ly/them-khuyen-mai">Thêm chương trình khuyến mãi</a></li>
					</ul>
				<li class="tree-toggle"><a>Quản lý doanh thu<span class="menu-collapsible-icon glyphicon glyphicon-chevron-down"></span></a></li>
					<ul class="nav nav-list tree">
						<li class="ql_doanhthu"><a href="{{ route('doanhthu') }}">Xem doanh thu</a></li>
					</ul>
			</ul>
		</div>
		<div class="col-md-9">
			<div class="col-md-12 box_noidung">
				@yield('noidung')
			</div>
		</div>
	</div>
</section>
	@else
		<section class="content_quanly">
			<div class="container-fluid" style="padding: 20px; margin: 20px">
			<h2>Bạn chưa đủ quyền. <a href="{{route('trang-chu')}}">Quay về.</a></h2>
			</div>
		</section>
	@endif
@else
<section class="content_quanly">
	<div class="container-fluid" style="padding: 20px; margin: 20px">
	<h2>Vui lòng đăng nhập để tiếp tục. <a href="{{route('login')}}">Đăng nhập.</a></h2>
	</div>
</section>
@endif
@endsection