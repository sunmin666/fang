<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>{{config('myconfig.config.webtitle').config('myconfig.config.version')}}</title>
	<!-- Tell the browser to be responsive to screen width -->
	<meta content="width=device-width, initial-scale=1, maximum-scalse=1, user-scalable=no" name="viewport">
	<link rel="shortcut icon" href="{{URL::asset('img/favicon.ico')}}"/>
	<!-- Bootstrap 3.3.7 -->
	<link rel="stylesheet" href="{{URL::asset('bower_components/bootstrap/dist/css/bootstrap.css')}}">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="{{URL::asset('bower_components/font-awesome/css/font-awesome.css')}}">
	<!-- Ionicons -->
	<link rel="stylesheet" href="{{URL::asset('bower_components/Ionicons/css/ionicons.css')}}">
	<!-- Theme style -->
	<link rel="stylesheet" href="{{URL::asset('bower_components/admin-lte/dist/css/AdminLTE.css')}}">
	<!-- layui UI -->
	<link rel="stylesheet" href="{{URL::asset('bower_components/layui/dist/css/layui.css')}}">
	<!-- 加载自定义的css文件 -->
	<link rel="stylesheet" href="{{URL::asset('css/mystyle.css')}}">
	<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>


	<!-- Google Font -->
	<link rel="stylesheet"
	      href="https://fonts.loli.net/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition login-page" style="overflow: hidden;">
<div class="login-box">

	<div class="login-logo">
		{!! config('myconfig.config.en_appname') !!}
	</div>
	<!-- /.login-logo -->
	<div class="login-box-body">
		<p class="login-box-msg">{{config('Myconfig.config.cn_appname').config('Myconfig.config.version')}}</p>

		<form action="login" method="post" name="login_form" id="login_form">
			{{ csrf_field() }}
			<div class="form-group has-feedback">
				<input type="text" class="form-control" placeholder="{{ trans('login.input_username') }}" id="username"
				       name="username">
				<span class="fa fa-user form-control-feedback"></span>
				@if($errors->has('username'))
					<div class="form-group has-feedback">
						<p class="text-danger text-left"><strong>{{$errors->first('username')}}</strong></p>
					</div>
				@endif
			</div>
			<div class="form-group has-feedback">
				<input type="password" class="form-control" placeholder="{{ trans('login.input_password') }}" id="password"
				       name="password" style="ime-mode:disabled">
				<span class="fa fa-lock form-control-feedback"></span>
				@if($errors->has('password'))
					<div class="form-group has-feedback">
						<p class="text-danger text-left"><strong>{{$errors->first('password')}}</strong></p>
					</div>
				@endif
			</div>
			<div class="form-group has-feedback captcha_style">
				<input type="text" class="form-control {{$errors->has('captcha')?'parsley-error':''}}" name="captcha"
				       id="captcha"
				       placeholder="{{ trans('login.input_chptcha') }}" autocomplete="off">
				<span class="fa fa-shield form-control-feedback"></span>
			</div>

			<div class="form-group has-feedback captcha_image_style">
				<img src="{{captcha_src()}}" style="cursor: pointer" onclick="this.src='{{captcha_src()}}'+Math.random()"
				     id="captcha_imgs">

			</div>
			@if($errors->has('captcha'))
				<div class="form-group has-feedback">
					<p class="text-danger text-left"><strong>{{$errors->first('captcha')}}</strong></p>
				</div>
			@endif

			<div class="row">
				<div class="col-xs-12">
					<button class="btn btn-primary btn-block btn-flat" style="background-color: #4A90E2"
					        id="submit_btn">{{ trans('login.login_btn') }}
					</button>
				</div>
				<!-- /.col -->
			</div>
		</form>
	</div>
	<!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<div class="col-md-12 text-center" style="position: absolute;margin-top: -4%;">
	{{ Session::get('andyzu') }}{!! config('myconfig.config.copyright') !!}
</div>

<!-- jQuery 3 -->
<script src="{{URL::asset('bower_components/jquery/dist/jquery.min.js')}}"></script>
<!-- Bootstrap 3.3.7 -->
<script src="{{URL::asset('bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<!-- Layui UI -->
<script src="{{URL::asset('bower_components/layui/dist/layui.all.js')}}"></script>

<script language="JavaScript">


	if (top != window){
		top.location.href = window.location.href;
	}

	$( document ).ready( function () {
		$( "#submit_btn" ).click( function () {
			$( "#submit_btn" ).attr( 'disabled' , true );
			var username = $.trim( $( "#username" ).val() );
			var password = $.trim( $( "#password" ).val() );
			var captcha = $.trim( $( "#captcha" ).val() );
			var token = $( "input[name='_token']" ).val();

			// 点击登录按钮的时候，不管用户名密码的合法性的时候，需要刷新一次验证码
			$( "#captcha_imgs" ).attr( 'src' , '{{captcha_src()}}' + Math.random() );

			//下面的正则在js中无法用
			var username_pattern = {{ config('myconfig.config.username_pattern') }};
			var password_pattern = {{ config('myconfig.config.password_pattern') }};
			var captcha_pattern = {{ config('myconfig.config.captcha_pattern') }};

			if ( username == '' || !username_pattern.test( username ) ) {

				layer.msg( '{{ config('myconfig.login.input_right_username_msg') }}' );
				$( "#captcha_imgs" ).attr( 'src' , '{{captcha_src()}}' + Math.random() );
				$( "#username" ).val( "" );
				$( "#password" ).val( "" );
				$( "#captcha" ).val( "" );
				$( "#username" ).focus();
				$( "#submit_btn" ).attr( 'disabled' , false );
				return false;
			}

			//验证密码
			if ( password == '' || !password_pattern.test( password ) ) {
				layer.msg( '{{ config('myconfig.login.input_right_password_msg') }}' );
				$( "#captcha_imgs" ).attr( 'src' , '{{captcha_src()}}' + Math.random() );
				$( "#password" ).val( "" );
				$( "#captcha" ).val( "" );
				$( "#password" ).focus();
				$( "#submit_btn" ).attr( 'disabled' , false );
				return false;
			}

			//验证验证码
			if ( captcha == '' || !captcha_pattern.test( captcha ) ) {
				layer.msg( '{{ config('myconfig.login.captcha_fail_msgs') }}' );
				$( "#captcha_imgs" ).attr( 'src' , '{{captcha_src()}}' + Math.random() );
				$( "#username" ).val( "" );
				$( "#password" ).val( "" );
				$( "#captcha" ).val( "" );
				$( "#captcha" ).focus();
				$( "#submit_btn" ).attr( 'disabled' , false );
				return false;
			}

			$.ajax( {
				type : 'POST' ,
				url : "{{URL('login')}}" ,
				data : { username : username , password : password , captcha : captcha , _token : token } , // data: formInputs,
				// dataType : "json" ,
				async : false ,
				timeout : 3000 ,  //请求超时时间，毫秒
				success : function ( result ) {
					console.log( result );

					if ( result.code  == {{ config('myconfig.login.login_success_code') }} ) {
						layer.msg(result.msg,{time:1234},function(){
							window.location.href = '{{URL('index')}}';
						});
					}
					if ( result.code == {{ config('myconfig.login.login_error_code') }} ) {
						layer.msg( result.msg);
						$( "#captcha_imgs" ).attr( 'src' , '{{captcha_src()}}' + Math.random() );
						$( " #captcha" ).val( "" );
						$( "#captcha" ).focus();
						$( "#submit_btn" ).attr( 'disabled' , false );
						return false;
					}
					if ( result.code  == {{ config('myconfig.login.status_code') }} ) {
						layer.msg( result.msg );
						$( "#captcha_imgs" ).attr( 'src' , '{{captcha_src()}}' + Math.random() );
						$( "#password" ).val( "" );
						$( "#captcha" ).val( "" );
						$( "#captcha" ).focus();
						$( "#submit_btn" ).attr( 'disabled' , false );
						return false;
					}
					if (  result.code == {{ config('myconfig.login.account_number_code') }} ) {
						layer.msg( result.msg );
						$( "#captcha_imgs" ).attr( 'src' , '{{captcha_src()}}' + Math.random() );
						$( "#username" ).val( "" );
						$( "#password" ).val( "" );
						$( "#captcha" ).val( "" );
						$( "#captcha" ).focus();
						$( "#submit_btn" ).attr( 'disabled' , false );
						return false;
					}
					if ( result.code  == {{ config('myconfig.login.captcha_fail_code') }} ) {
						layer.msg(result.msg);
						$( "#captcha_imgs" ).attr( 'src' , '{{captcha_src()}}' + Math.random() );
						$( "#username" ).val( "" );
						$( "#password" ).val( "" );
						$( "#captcha" ).val( "" );
						$( "#captcha" ).focus();
						$( "#submit_btn" ).attr( 'disabled' , false );
						return false;
					}
					if ( result.code  == {{ config('myconfig.login.username_code') }} ) {
						layer.msg(result.msg);
						$( "#captcha_imgs" ).attr( 'src' , '{{captcha_src()}}' + Math.random() );
						$( "#username" ).val( "" );
						$( "#password" ).val( "" );
						$( "#captcha" ).val( "" );
						$( "#captcha" ).focus();
						$( "#submit_btn" ).attr( 'disabled' , false );
						return false;
					}
				} ,
			} );
			return false;
		} );
	} );
</script>

</body>
</html>

