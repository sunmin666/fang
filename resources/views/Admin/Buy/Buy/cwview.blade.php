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
					<label>财务审核：</label>
					<select name="manager_verify_status" id="manager_verify_status" class="form-control">
						<option value="">--请选则--</option>
						<option value="1">通过</option>
						<option value="0">不通过</option>

					</select>
				</div>

				<div class="form-group">
					<label>财务审核备注：</label>
					<textarea name="manager_verify_remarks" id="manager_verify_remarks" class="form-control" cols="30" rows="5" style="resize:none"></textarea>
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

	//添加到数据库

	$( '#store1' ).click( function () {

		// $( "#store1" ).attr( 'disabled' , true );
		var manager_verify_status = $('#manager_verify_status').val();

		var manager_verify_remarks = $('#manager_verify_remarks').val();

		if(manager_verify_status == '' || manager_verify_remarks == ''){
			layer.msg('信息不全',{time:1236});
			return false;
		}

		var regEn = {{config('myconfig.config.regEn')}};       //中文验证
		var regCn = {{config('myconfig.config.regCn')}};   //英文验证

		if ( regEn.test( manager_verify_remarks ) ) {
			layer.msg( '{{trans('buy.text_content2')}}' , { time : 1235 } );
			$( "#store1" ).attr( 'disabled' , false );
			return false;
		}
		if ( regCn.test( manager_verify_remarks ) ) {
			layer.msg( '{{trans('buy.text_content2')}}' , { time : 1235 } );
			$( "#store1" ).attr( 'disabled' , false );
			return false;
		}


		$.ajax( {
			url : "{{URL('buyinfoss/update_cwview')}}" ,
			type : 'post' ,
			data : {
				buyid:"{{$buyid}}",
				homeid:"{{$homeid}}",
				manager_verify_status:manager_verify_status,
				manager_verify_remarks:manager_verify_remarks,
				_token : "{{csrf_token()}}"
			} ,
			success : function ( data ) {
				console.log( data );

				if ( data.code == {{config('myconfig.buy.buy_cwview_success_code')}}) {
					layer.msg( data.msg , { time : 2000 } , function () {
						window.parent.location.reload();
					} );
				}

				if ( data.code == {{config('myconfig.buy.buy_cwview_error_code')}}) {
					layer.msg( data.msg , { time : 2000 } );
					$( "#store1" ).attr( 'disabled' , false );
				}
				if ( data.code == {{config('myconfig.buy.buy_cwview_successe_code')}}) {
					layer.msg( data.msg , { time : 2000 },function(){
						window.parent.location.reload();
					});

				}
			}
		} )
	} )
</script>
</html>
