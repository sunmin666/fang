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
					<input type="text" class="form-control"  name="pername" value="{{$per -> pername}}"
					       id="pername" maxlength="10">
				</div>

				<div class="form-group">
					<label>{{ trans('permission.perurl') }}：</label>
					<input type="text" class="form-control" maxlength="50" value="{{$per -> perurl}}"
					       name="perurl" id="perurl">
				</div>
				<input type="hidden" value="{{$per -> perid}}" id="perid">
				<div class="form-group">
					<label>{{ trans('permission.superior') }}：</label>
					<select name="p_superior" id="p_superior" class="form-control">
						<option value="0">如果不选择默认为顶级菜单</option>
						@foreach($pers as $value)
							<option value="{{$value -> perid}}" @if($value -> perid == $per -> p_superior) selected @endif>{{$value -> pername}}</option>
						@endforeach
					</select>
				</div>
				<div class="form-group">
					<label>{{ trans('permission.icon') }}：</label>

					<select name="p_icon" id="p_icon" class="form-control">
						<option value="0">默认为fa fa-link</option>
						<option value="fa fa-windows" @if($per -> p_icon == 'fa fa-windows') selected @endif>fa fa-windows</option>
						<option value="fa fa-user" @if($per -> p_icon == 'fa fa-user') selected @endif>fa fa-user</option>
						<option value="fa fa-sun-o" @if($per -> p_icon == 'fa fa-sun-o') selected @endif>fa fa-sun-o</option>
						<option value="fa fa-diamond" @if($per -> p_icon == 'fa fa-diamond') selected @endif>fa fa-diamond</option>
						<option value="fa fa-tv" @if($per -> p_icon == 'fa fa-tv') selected @endif>fa fa-tv</option>
						<option value="fa fa-user" @if($per -> p_icon == 'fa fa-user') selected @endif>fa fa-user</option>
						<option value="fa fa-life-buoy" @if($per -> p_icon == 'fa fa-life-buoy') selected @endif>fa fa-life-buoy</option>
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

		var perid = $('#perid').val();
		var pername = $( '#pername' ).val();
		var perurl = $( '#perurl' ).val();
		var p_superior = $('#p_superior').val();
		var p_icon = $('#p_icon').val();
		var token = $( '[name=_token]' ).val();
		var res= /^[\u4e00-\u9fa5]+$/;
		var realname_pattern = {{ config('myconfig.config.realname_pattern') }};    //中文验证

		if ( pername == '' ||!res.test(pername) ) {
			layer.msg( '{{trans('permission.name_pername')}}' , { time : 1500 } );
			$( "#store1" ).attr( 'disabled' , false );
			return false;
		}

		$.ajax( {
			url : "{{URL('per/update')}}" ,
			type : 'post' ,
			data : {
				perid:perid,
				pername : pername ,
				perurl : perurl ,
				p_superior:p_superior,
				p_icon:p_icon,
				_token : token
			} ,
			success : function ( data ) {
				console.log( data );

				if ( data.code == {{config('myconfig.perm.per_update_success_code')}}) {
					layer.msg( data.msg , { time : 2000 } , function () {
						window.parent.location.reload();
					} );
				}
				if ( data.code == {{config('myconfig.perm.per_update_error_code')}}) {
					layer.msg( data.msg , { time : 2000 } );
					$( "#store1" ).attr( 'disabled' , false );
				}
			}
		} )
	} )


</script>
</html>
