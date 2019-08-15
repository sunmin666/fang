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
					<label>{{ trans('permin.perm_title') }}：</label>
					<input type="text" class="form-control" name="perm_title" id="perm_title"
					       maxlength="100" placeholder="请输入权限标题" onkeyup="value=value.replace(/[^\w\.\/]/ig,'')" >
				</div>
				<div class="form-group">
					<label>{{ trans('permin.role_id') }}：</label>
					<select name="role_id" id="role_id" class="form-control">
						<option value="">请选择角色</option>
						@foreach($role as $k => $v)
							<option value="{{$v -> role_id}}">{{$v -> role_name}}</option>
						@endforeach	
					</select>
				</div>
				<div class="form-group">
					<label>{{ trans('permin.perm_name') }}：</label>
					<input type="text" class="form-control" maxlength="50" onkeyup="value=value.replace(/[\d]/g,'') "
					       name="perm_name" id="perm_name" placeholder="请输入权限名称">
				</div>
				<div class="form-group">
					<label>{{ trans('permin.http_method') }}：</label>
					<input type="text" class="form-control" maxlength="50" onkeyup="this.value=this.value.replace(/[^a-zA-Z]/g,'')"
					       name="http_method" id="http_method" placeholder="请输入权限方法">
				</div>
				<div class="form-group">
					<lable>{{trans('permin.description')}}:</lable>
					<textarea name="description" class="form-control" id="description" onkeyup="value=value.replace(/[^\w\u4E00-\u9FA5]/g, '')"
					          placeholder="请输入权限描述" maxlength="255" style="resize:none" cols="15" rows="5"></textarea>
				</div>
				<div class="form-group">
					<label>{{ trans('permin.http_path') }}：</label>
					<button type="button" class="btn btn-warning btn-xs" id="data_select" data-select-all="true"><i
							class="glyphicon glyphicon-ok"></i>{{ trans('memberinfo.allAlection') }}</button>
					<div style="padding-left: 30px">
						@foreach($url as $k => $v)
							<div style="float: left;width: 25%;height: 30px" >
								<input type="checkbox" class="i-checks" name="groupCheckbox[]"
								       value="{{$v -> url_id}}" > {{$v -> url_name}} &nbsp;&nbsp;&nbsp;
							</div>
						@endforeach
					</div>
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
	$( ".i-checks" ).iCheck( {
		checkboxClass : "{{config('myconfig.config.checkbox_skin')}}" ,
	} );

	var select_all_btn = 0;
	$( "#data_select" ).click( function () {
		if ( select_all_btn == 0 ) {
			$( "#data_select" ).html( "<i class='glyphicon glyphicon-remove'></i> {{ trans('permission.cancel') }}" );
			$( '.i-checks' ).each( function () {
				$( this ).iCheck( 'check' );
			} );
			select_all_btn = 1;
		}
		else {
			$( "#data_select" ).html( "<i class='glyphicon glyphicon-ok'></i> {{ trans('permission.allAlection') }}" );
			$( '.i-checks' ).iCheck( 'uncheck' );
			select_all_btn = 0;
		}
	} );


	//添加到数据库

	$( '#store1' ).click( function () {

		$( "#store1" ).attr( 'disabled' , true );

		var perm_title = $( '#perm_title' ).val();
		var role_id = $( '#role_id' ).val();
		var perm_name = $( '#perm_name' ).val();
		var http_method = $( '#http_method' ).val();
		var description = $( '#description' ).val();

		var vote = [];
		for ( var i = 0 ; i < $( ".i-checks" ).length ; i++ ) {
			if ( $( ".i-checks" ).eq( i ).prop( "checked" ) ) {
				vote.push( $( ".i-checks" ).eq( i ).val() )
			}
		}
		var token = $( '[name=_token]' ).val();

		if(perm_title == '' || role_id == '' || perm_name == '' || http_method == '' || description == ''){
			layer.msg("{{trans('position.Incomplete_information')}}",{time:1563});
			$( "#store1" ).attr( 'disabled' , false );
			return false;
		}

		if(vote.length == 0){
			layer.msg('{{trans('permin.content')}}',{time:1234});
			$( "#store1" ).attr( 'disabled' , false );
			return false;
		}

		$.ajax( {
			url : "{{URL('permin/store')}}" ,
			type : 'post' ,
			data : {
				perm_title : perm_title ,
				role_id : role_id ,
				perm_name:perm_name,
				http_method:http_method,
				description:description,
				http_path:vote,
				_token : token
			} ,
			success : function ( data ) {
				console.log( data );

				if ( data.code == {{config('myconfig.permin.permin_store_success_code')}}) {
					layer.msg( data.msg , { time : 2000 } , function () {
						window.parent.location.reload();
					} );
				}
				if ( data.code == {{config('myconfig.permin.permin_store_error_code')}}) {
					layer.msg( data.msg , { time : 2000 } );
					$( "#store1" ).attr( 'disabled' , false );
				}

				if ( data.code == {{config('myconfig.permin.perm_title_code')}}) {
					layer.msg( data.msg , { time : 2000 } );
					$( "#store1" ).attr( 'disabled' , false );
				}
			}
		} )
	} )


</script>
</html>
