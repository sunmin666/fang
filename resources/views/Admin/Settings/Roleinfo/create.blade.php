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
			<form role="form" action="#" method="post" name="reg_memberinfo" id="reg_memberinfo" onkeydown="if(event.keyCode==13){return false;}">
				<div class="form-group">
					<label>{{ trans('role.role_title') }}：</label>
					<input type="text" class="form-control" name="role_title" id="role_title"
					       maxlength="20" placeholder="请输入角色标题" onkeyup="value=value.replace(/[^\w\.\/]/ig,'')">
				</div>
				<div class="form-group">
					<label>{{ trans('role.role_name') }}：</label>
					<input type="text" class="form-control" maxlength="50"
					       name="role_name" id="role_name" placeholder="请输入角色名称" onkeyup="this.value=this.value.replace(/[^\u4e00-\u9fa5]/g,'')">
				</div>
				<div class="form-group">
					<lable>{{trans('role.description')}}:</lable>
					<textarea name="description" class="form-control" id="description" onkeyup="this.value=this.value.replace(/[^\u4e00-\u9fa5]/g,'')"
					          placeholder="请输入角色描述" maxlength="255" style="resize:none" cols="15" rows="5"></textarea>
				</div>
				{{ csrf_field()}}
			</form>
		</div>
	</div>
	<div class="add_button">
		<button type="button" class="btn btn-dropbox" id="store1">{{ trans('permission.save') }}</button>
	</div>
</div>
</body>
@include('Public.weekly_js')
<script>

	//添加到数据库

	$( '#store1' ).click( function () {

		$( "#store1" ).attr( 'disabled' , true );

		var role_title = $( '#role_title' ).val();
		var role_name = $( '#role_name' ).val();
		var description = $('#description').val();

		var token = $( '[name=_token]' ).val();

		if(role_name == '' || role_title == '' || description == ''){
			layer.msg("{{trans('position.Incomplete_information')}}",{time:1563});
			$( "#store1" ).attr( 'disabled' , false );
			return false;
		}

		$.ajax( {
			url : "{{URL('roleinfoss/store')}}" ,
			type : 'post' ,
			data : {
				role_title : role_title ,
				role_name : role_name ,
				description:description,
				_token : token
			} ,
			success : function ( data ) {
				console.log( data );

				if ( data.code == {{config('myconfig.role.role_store_success_code')}}) {
					layer.msg( data.msg , { time : 2000 } , function () {
						window.parent.location.reload();
					} );
				}

				if ( data.code == {{config('myconfig.role.role_name_code')}}) {
					layer.msg( data.msg , { time : 2000 } );
					$( "#store1" ).attr( 'disabled' , false );
				}

				if ( data.code == {{config('myconfig.role.role_store_error_code')}}) {
					layer.msg( data.msg , { time : 2000 } );
					$( "#store1" ).attr( 'disabled' , false );
				}

			}
		} )
	} )


</script>
</html>
