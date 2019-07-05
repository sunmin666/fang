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
					<label>{{ trans('permission.pername') }}：</label>
					<input type="text" class="form-control" name="pername" id="pername" maxlength="10">
				</div>
				<div class="form-group">
					<label>{{ trans('permission.perurl') }}：</label>
					<input type="text" class="form-control" maxlength="50"
					       name="perurl" id="perurl">
				</div>
				<div class="form-group">
					<label>{{ trans('permission.superior') }}：</label>
					<select name="p_superior" id="p_superior" class="form-control">
						<option value="0">顶级菜单</option>
						@foreach($per as $value)
						<option value="{{$value -> perid}}">{{$value -> pername}}</option>
						@endforeach
					</select>
				</div>
				<div class="form-group">
					<label>{{ trans('permission.icon') }}：</label>
					<select name="p_icon" id="p_icon" class="form-control">
						<option value="0">默认为fa fa-link</option>
						<option value="fa fa-windows">fa fa-windows</option>
						<option value="fa fa-user">fa fa-user</option>
						<option value="fa fa-sun-o">fa fa-sun-o</option>
						<option value="fa fa-diamond">fa fa-diamond</option>
						<option value="fa fa-tv">fa fa-tv</option>
						<option value="fa fa-user">fa fa-user</option>
						<option value="fa fa-life-buoy">fa fa-life-buoy</option>
					</select>
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

		var pername = $( '#pername' ).val();
		var perurl = $( '#perurl' ).val();
		var p_superior = $('#p_superior').val();
		var p_icon = $('#p_icon').val();
		var token = $( '[name=_token]' ).val();

		var res= /^[\u4e00-\u9fa5]+$/;

		if ( pername == '' || !res.test(pername)){
			layer.msg( '{{trans('permission.name_pername')}}' , { time : 1500 } );
			$( "#store1" ).attr( 'disabled' , false );
			return false;
		}

		if ( perurl == '' ) {
			layer.msg( '{{trans('permission.name_perurl')}}' , { time : 1500 } );
			return false;
		}


		$.ajax( {
			url : "{{URL('per/store')}}" ,
			type : 'post' ,
			data : {
				pername : pername ,
				perurl : perurl ,
				p_superior:p_superior,
				p_icon:p_icon,
				_token : token
			} ,
			success : function ( data ) {
				console.log( data );

				if ( data.code == {{config('myconfig.perm.per_success_code')}}) {
					layer.msg( data.msg , { time : 2000 } , function () {
						window.parent.location.reload();
					} );
				}

				if ( data.code == {{config('myconfig.perm.per_error_code')}}) {
					layer.msg( data.msg , { time : 2000 } );
					$( "#store1" ).attr( 'disabled' , false );
				}

				if ( data.code == {{config('myconfig.perm.pername_code')}}) {
					layer.msg( data.msg , { time : 2000 } );
					$( "#store1" ).attr( 'disabled' , false );
				}

				if ( data.code == {{config('myconfig.perm.perurl_code')}}) {
					layer.msg( data.msg , { time : 2000 } );
					$( "#store1" ).attr( 'disabled' , false );
				}
			}
		} )
	} )


</script>
</html>
