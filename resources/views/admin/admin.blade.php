@extends('admin.index')
@section('content')
<div class="row">
	<ol class="breadcrumb">
		<li><a href="{{ route('admin') }}">
			<em class="fa fa-home"></em>
		</a></li>
		<li class="active">Dashboard</li>
	</ol>
</div><!--/.row-->

<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Dashboard</h1>
	</div>
</div><!--/.row-->

<div class="panel panel-container">
	<div class="row">
		<div class="col-xs-3 col-md-3 col-lg-3 no-padding">
			<div class="panel panel-teal panel-widget border-right">
				<div class="row no-padding"><em class="fa fa-xl fa-shopping-cart color-blue"></em>
					<a href="{{ route('listorder') }}">
						<div class="large">
							{{$bill}}
						</div>
						<div class="text-muted">Đơn đặt hàng</div>
					</a>
				</div>
			</div>
		</div>
		<div class="col-xs-3 col-md-3 col-lg-3 no-padding">
			<div class="panel panel-orange panel-widget border-right">
				<div class="row no-padding"><em class="fa fa-xl fa-users color-teal"></em>
					<a href="">
						<div class="large">{{$user}}</div>
						<div class="text-muted">Người dùng đăng kí</div>
					</a>
				</div>
			</div>
		</div>
		<div class="col-xs-3 col-md-3 col-lg-3 no-padding">
			<div class="panel panel-orange panel-widget border-right">
				<div class="row no-padding"><em class="fa fa-xl fa-bars color-teal"></em>
					<a href="{{ route('listproduct') }}">
						<div class="large">{{$product}}</div>
						<div class="text-muted">Sản phẩm</div>
					</a>
				</div>
			</div>
		</div>
		<div class="col-xs-3 col-md-3 col-lg-3 no-padding">
			<div class="panel panel-orange panel-widget border-right">
				<div class="row no-padding"><em class="fa fa-xl fa-bars color-teal"></em>
					<a href="{{ route('listproduct') }}">
						<div class="large">{{$collections}}</div>
						<div class="text-muted">Nhóm sản phẩm</div>
					</a>
				</div>
			</div>
		</div>
	</div><!--/.row-->
</div>
@endsection