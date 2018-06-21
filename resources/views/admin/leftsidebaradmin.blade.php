<div class="profile-sidebar">
	<div class="profile-usertitle">
		<div class="profile-usertitle-name">{{Auth::user()->full_name}}</div>
		<div class="profile-usertitle-status"><span class="indicator label-success"></span>Online</div>
	</div>
	<div class="clear"></div>
</div>
<div class="divider"></div>
<ul class="nav menu">
	<li class="active"><a href="{{ route('admin') }}"><em class="fa fa-tachometer-alt">&nbsp;</em> Dashboard</a></li>
	<li><a href="{{ route('listorder') }}"><em class="fa fa-clone">&nbsp;</em> Quản lí đơn hàng</a></li>
	<li><a href="{{ route('listuser') }}"><em class="fa fa-chart-bar">&nbsp;</em> Quản lí chiết khấu</a></li>
	<li class="parent "><a data-toggle="collapse" href="#sub-item-1">
		<em class="fa fa-bars">&nbsp;</em> Sản phẩm <span data-toggle="collapse" href="#sub-item-1" class="icon pull-right">
			<em class="fa fa-plus"></em></span>
		</a>
		<ul class="children collapse" id="sub-item-1">
			<li
			><a class="" href="{{ route('listproduct') }}">
				<span class="fa fa-arrow-right">&nbsp;</span> Danh sách sản phẩm
			</a>
		</li>
		<li>
			<a class="" href="{{ route('addproduct') }}">
				<span class="fa fa-arrow-right">&nbsp;</span> Thêm sản phẩm
			</a></li>
			<li>
				<a class="" href="{{ route('editproduct') }}">
					<span class="fa fa-arrow-right">&nbsp;</span> Sửa giá sản phẩm
				</a>
			</li>
		</ul>
	</li>
	<li><a href="{{ route('logout') }}"><em class="fa fa-power-off">&nbsp;</em> Đăng xuất</a></li>
</ul>