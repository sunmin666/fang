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
					<label>{{ trans('position.posi_title') }}：</label>
					<input type="text" class="form-control" name="posi_title" id="posi_title"
					       maxlength="20" value="{{$position -> posi_title}}" placeholder="请输入职位标题" onkeyup="value=value.replace(/[^\w\.\/]/ig,'')">
				</div>
				<div class="form-group">
					<label>{{ trans('position.posi_name') }}：</label>
					<input type="text" class="form-control" maxlength="50"
					       name="posi_name" value="{{$position -> posi_name}}" id="posi_name" placeholder="请输入职位名称" onkeyup="this.value=this.value.replace(/[^\u4e00-\u9fa5]/g,'')">
				</div>
				<div class="form-group">
					<lable>{{trans('position.description')}}:</lable>
					<textarea name="description" class="form-control" id="description" onkeyup="this.value=this.value.replace(/[^\u4e00-\u9fa5]/g,'')"
					          placeholder="请输入职位描述" maxlength="255" style="resize:none" cols="15" rows="5">{{$position -> description}}</textarea>
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

		var posi_title = $( '#posi_title' ).val();
		var posi_name = $( '#posi_name' ).val();
		var description = $('#description').val();

		var token = $( '[name=_token]' ).val();

		if(posi_title == '' || posi_name == '' || description == ''){
			layer.msg("{{trans('position.Incomplete_information')}}",{time:1563});
			$( "#store1" ).attr( 'disabled' , false );
			return false;
		}

		$.ajax( {
			url : "{{URL('positioninfo/update')}}" ,
			type : 'post' ,
			data : {
				posi_id: "{{$position -> posi_id}}",
				posi_title : posi_title ,
				posi_name : posi_name ,
				description:description,
				_token : token
			} ,
			success : function ( data ) {
				console.log( data );

				if ( data.code == {{config('myconfig.position.success_position_update_code')}}) {
					layer.msg( data.msg , { time : 2000 } , function () {
						window.parent.location.reload();
					} );
				}

				if ( data.code == {{config('myconfig.position.posi_name_code')}}) {
					layer.msg( data.msg , { time : 2000 } );
					$( "#store1" ).attr( 'disabled' , false );
				}

				if ( data.code == {{config('myconfig.position.error_position_update_code')}}) {
					layer.msg( data.msg , { time : 2000 } );
					$( "#store1" ).attr( 'disabled' , false );
				}

			}
		} )
	} )


</script>
</html>
