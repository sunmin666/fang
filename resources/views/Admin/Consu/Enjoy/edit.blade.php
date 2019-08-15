<!doctype html>
<html lang="en">
<head>
	@include('Public.weekly_css')
</head>
<body>
<div class="modal-body">
	<div class="box box-warning">
		<div class="box-body">
			{{ csrf_field() }}
			<form role="form" action="#" method="post" name="reg_memberinfo" id="reg_memberinfo">
				<div class="form-group">
					{{--职业顾问手机号--}}
					<label>{{ trans('consu.page_detail2') }}：</label>
					<input type="text" class="form-control" name="enjoy"
					       placeholder="请输入折扣信息" id="enjoy" onkeyup="if(isNaN(value))execCommand('undo')"
					       value="{{$enjoy -> enjoy}}"
					       maxlength="11">
				</div>
				{{ csrf_field()}}
			</form>
		</div>
	</div>
	<div class="add_button">
		<button type="button" class="btn btn-dropbox" id="store1">{{ trans('company.save') }}</button>
	</div>
</div>
</body>
@include('Public.weekly_js')
<script>
	//复选框样式
	$( ".i-checks" ).iCheck( {
		checkboxClass : "{{config('myconfig.config.checkbox_skin')}}" ,   //复选框样式
		radioClass : "{{config('myconfig.config.checkbox_skin')}}"   //单选框样式
	} );

</script>
<script>

	//添加到数据库

	$( '#store1' ).click( function () {


		$( "#store1" ).attr( 'disabled' , true );

		var enjoy = $('#enjoy').val();

		if(enjoy == '' || enjoy == '0'){
			layer.msg('{{trans('consu.enjoy_null')}}')
		}

		$.ajax( {
			url : "{{URL('enjoyss/update')}}" ,
			type : 'post' ,
			data : {
				enjoy : enjoy ,         //职业顾手机号
				enjoy_id: '{{$enjoy -> enjoy_id}}',

				_token : "{{csrf_token()}}"             //post提交token验证
			} ,
			success : function ( data ) {
				console.log( data );
				if ( data.code == {{config('myconfig.consu.update_success_hous_code')}}) {
					layer.msg( data.msg , { time : 2000 } , function () {
						window.parent.location.reload();
					} );
				}
				if ( data.code == {{config('myconfig.consu.update_error_hous_code')}}) {
					layer.msg( data.msg , { time : 2000 } );
					$( "#store1" ).attr( 'disabled' , false );
					return false;
				}

			}
		} )
	} )
</script>
</html>
