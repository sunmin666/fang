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
					<label>{{ trans('memberinfo.account') }}：</label>
					<input type="text" class="form-control" name="account" id="account" maxlength="10">
				</div>
				<div class="form-group">
					<label>{{ trans('memberinfo.username') }}：</label>
					<input type="text" class="form-control" maxlength="6"
					       name="username" id="username">
				</div>
				<div class="form-group">
					<label>{{ trans('memberinfo.email') }}：</label>
					<input type="text" class="form-control"
					       name="email" id="email">
				</div>
				<div class="form-group">
					<label>{{ trans('memberinfo.password') }}：</label>
					<input type="password" class="form-control" maxlength="16"
					       name="password" id="password">
				</div>
				<div class="form-group">
					<label>{{ trans('memberinfo.mobile') }}：</label>
					<input type="text" class="form-control" maxlength="11"
					       name="mobile" id="mobile">
				</div>
				<div class="form-group">
					<label>{{ trans('memberinfo.sex') }}：</label>
					<select name="sex" id="sex" class="form-control">
						<option value="1">男</option>
						<option value="2">女</option>
					</select>
				</div>
				<div class="form-group">
					<label>{{ trans('memberinfo.character') }}：</label>
					<select name="character" id="character" class="form-control">
						<option value="0">--请选择</option>
						@foreach($cha as $K => $v)
						<option value="{{$v -> chid}}">{{$v -> ch_nsme}}</option>
						@endforeach
					</select>
				</div>
				{{ csrf_field()}}
			</form>
		</div>
	</div>
	<div class="add_button">
		<button type="button" class="btn btn-dropbox" id="store1">{{ trans('memberinfo.save') }}</button>
	</div>
</div>
</body>
@include('Public.weekly_js')
<script>

	//添加到数据库

	$( '#store1' ).click( function () {

		$( "#store1" ).attr( 'disabled' , true );

		var account = $( '#account' ).val();
		var username = $( '#username' ).val();
		var email = $( '#email' ).val();
		var password = $( '#password' ).val();
		var mobile = $( '#mobile' ).val();
		var sex = $( '#sex' ).val();
		var character = $( '#character' ).val();
		var token = $( '[name=_token]' ).val();

		var username_pattern = {{ config('myconfig.config.username_pattern') }};    //英文数字验证
		var realname_pattern = {{ config('myconfig.config.realname_pattern') }};    //中文验证
		var email_pattern = {{ config('myconfig.config.email_pattern') }};        //邮箱
		var mobile_pattern = {{ config('myconfig.config.mobile_pattern') }};    //手机号
		var password_pattern = {{ config('myconfig.config.password_pattern') }};   //密码验证
		if ( account == '' ||!username_pattern.test( account ) ) {
			layer.msg( '{{trans('memberinfo.name_account')}}' , { time : 1500 } );
			$( "#store1" ).attr( 'disabled' , false );
			return false;
		}

		if ( username == '' ||!realname_pattern.test( username ) ) {
			layer.msg( '{{trans('memberinfo.name_username')}}' , { time : 1500 } );
			$( "#store1" ).attr( 'disabled' , false );
			return false;
		}

		if ( email == '' ||!email_pattern.test( email ) ) {
			layer.msg( '{{trans('memberinfo.name_email')}}' , { time : 1500 } );
			$( "#store1" ).attr( 'disabled' , false );
			return false;
		}

		if ( password == '' ||!password_pattern.test( password ) ) {
			layer.msg( '{{trans('memberinfo.name_password')}}' , { time : 1500 } );
			$( "#store1" ).attr( 'disabled' , false );
			return false;
		}
		if ( mobile == '' ||!mobile_pattern.test( mobile ) ) {
			layer.msg( '{{trans('memberinfo.name_mobile')}}' , { time : 1500 } );
			$( "#store1" ).attr( 'disabled' , false );
			return false;
		}

		if(character == 0){
			layer.msg('{{trans('memberinfo.name_character')}}',{time:1235});
			$( "#store1" ).attr( 'disabled' , false );
			return false;
		}

		$.ajax( {
			url : "{{URL('member/store')}}" ,
			type : 'post' ,
			data : {
				account : account ,
				username : username ,
				email : email ,
				password : password ,
				mobile : mobile ,
				sex : sex ,
				character:character,
				_token : token
			} ,
			success : function ( data ) {
				console.log( data );

				if ( data.code == {{config('myconfig.member.memberinfo_success_code')}}) {
					layer.msg( data.msg , { time : 2000 } , function () {
						window.parent.location.reload();
					} );
				}

				if ( data.code == {{config('myconfig.member.account_code')}}) {
					layer.msg( data.msg , { time : 2000 } );
					$( "#store1" ).attr( 'disabled' , false );
				}

				if ( data.code == {{config('myconfig.member.username_code')}}) {
					layer.msg( data.msg , { time : 2000 } );
					$( "#store1" ).attr( 'disabled' , false );
				}

				if ( data.code == {{config('myconfig.member.password_code')}}) {
					layer.msg( data.msg , { time : 2000 } );
					$( "#store1" ).attr( 'disabled' , false );
				}

				if ( data.code == {{config('myconfig.member.mobile_code')}}) {
					layer.msg( data.msg , { time : 2000 } );
					$( "#store1" ).attr( 'disabled' , false );
				}

				if ( data.code == {{config('myconfig.member.memberinfo_error_code')}}) {
					layer.msg( data.msg , { time : 2000 } );
					$( "#store1" ).attr( 'disabled' , false );
				}
			}

		} )

	} )


</script>
</html>
