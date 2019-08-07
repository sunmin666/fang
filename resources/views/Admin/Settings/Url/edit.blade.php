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
					<label>{{ trans('url.url_name') }}：</label>
					<input type="text" class="form-control" name="url_name" id="url_name" value="{{$url -> url_name}}"
					       maxlength="20" placeholder="请输入url名称" onkeyup="value=value.replace(/[\d]/g,'') " >
				</div>
				<div class="form-group">
					<label>{{ trans('url.url_path') }}：</label>
					<input type="text" class="form-control" maxlength="50" value="{{$url -> url_path}}"
					       name="url_path" id="url_path" placeholder="请输入URL路径">
				</div>
				<div class="form-group">
					<lable>{{trans('url.description')}}:</lable>
					<textarea name="description" class="form-control" id="description" onkeyup="value=value.replace(/[\d]/g,'') "
					          placeholder="请输入url描述" maxlength="255" style="resize:none" cols="15" rows="5">{{$url -> description }}</textarea>
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

		var url_name = $( '#url_name' ).val();
		var url_path = $( '#url_path' ).val();
		var description = $('#description').val();

		var token = $( '[name=_token]' ).val();

		if(url_name == '' || url_path == '' || description == ''){
			layer.msg("{{trans('position.Incomplete_information')}}",{time:1563});
			$( "#store1" ).attr( 'disabled' , false );
			return false;
		}

		$.ajax( {
			url : "{{URL('urlinfo/update')}}" ,
			type : 'post' ,
			data : {
				url_id: "{{$url -> url_id}}",
				url_name : url_name ,
				url_path : url_path ,
				description:description,
				_token : token
			} ,
			success : function ( data ) {
				console.log( data );

				if ( data.code == {{config('myconfig.url.url_update_success_code')}}) {
					layer.msg( data.msg , { time : 2000 } , function () {
						window.parent.location.reload();
					} );
				}

				if ( data.code == {{config('myconfig.url.url_update_error_code')}}) {
					layer.msg( data.msg , { time : 2000 } );
					$( "#store1" ).attr( 'disabled' , false );
				}

				if ( data.code == {{config('myconfig.url.url_name_code')}}) {
					layer.msg( data.msg , { time : 2000 } );
					$( "#store1" ).attr( 'disabled' , false );
				}
				if ( data.code == {{config('myconfig.url.url_path_code')}}) {
					layer.msg( data.msg , { time : 2000 } );
					$( "#store1" ).attr( 'disabled' , false );
				}
			}
		} )
	} )


</script>
</html>
