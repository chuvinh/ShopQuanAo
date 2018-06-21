@extends('master')
@section('content')
<div class="row">
	<div class="container">
		<div class="col-md-6">
			<div class="form-group">
				<label>Nhập đường link sản phẩm</label>
				<br>
				<br>
				<input type="text" name="id-user" id="id-user" value="{{Auth::user()->char_name}}" style="display: none">
				<input type="text" name="urlproduct" id="urlproduct">
				<button class="btn-getlink btn btn-default">Lấy link</button>
			</div>
			<div class="form-group">
				<input type="text" name="geturl" id="geturl" readonly="readonly" style="background: #e1e1e1;">
				<a class="btn-copy" title="Sao chép link">
					<i class="fa fa-copy"></i>
				</a>
			</div>
		</div>
		<div class="col-md-6">
			<h4>Hướng dẫn</h4>
		</div>
	</div>
</div>
</div>
@endsection
@section('script')
<script>
	$(document).ready(function($) {   
		$('.btn-getlink').click(function(){
			var url=$('#urlproduct').val();
			var id=$('#id-user').val();
			document.getElementById('geturl').value = ''+url+'?iduser='+ id+'';
		});
		$('.btn-copy').click(function(){
			var copyText = document.getElementById("geturl");
			copyText.select();
			document.execCommand("copy");
			console.log(copyText.value);
		});
	});
</script>
@endsection