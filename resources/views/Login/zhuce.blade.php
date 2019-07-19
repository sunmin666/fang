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
	<style>
		body{
			overflow: hidden;
			background: url("img/zhuce.jpg");
			background-size:100% 100%;
		}

		.login-box{
			margin-top: 60px;
		}
	</style>
</head>
<body class="hold-transition" >
<div class="login-box">

	<div class="login-logo">
		{!! config('myconfig.config.zc_iHOUSER') !!}
	</div>
	<!-- /.login-logo -->
	<div class="login-box-body">
		<p class="login-box-msg">{{config('Myconfig.config.zc_iHOUSER').config('Myconfig.config.version')}}</p>

		<form action="login" method="post" name="login_form" id="login_form">
			{{ csrf_field() }}

			{{--职业顾问登录账号--}}
			<div class="form-group has-feedback">
				<input type="text" class="form-control" maxlength="10" onkeyup="value=value.replace(/[^\w\.\/]/ig,'')" placeholder="{{ trans('login.username') }}" id="username"
				       name="username">
			{{--/	<span class="fa fa-user form-control-feedback"></span>--}}
			</div>
			{{--置业顾问登录的密码--}}
			<div class="form-group has-feedback">
				<input type="password" class="form-control" maxlength="16" placeholder="{{ trans('login.password') }}" id="password"
				       name="password">
				{{--<span class="fa fa-user form-control-feedback"></span>--}}
			</div>
			{{--再次确认密码--}}
			<div class="form-group has-feedback">
				<input type="password" class="form-control" maxlength="16" placeholder="{{ trans('login.password_confirmation') }}" id="password_confirmation"
				       name="password_confirmation">
				{{--<span class="fa fa-user form-control-feedback"></span>--}}
			</div>
			{{--邮箱--}}
			<div class="form-group has-feedback">
				<input type="text" class="form-control" maxlength="30" placeholder="{{ trans('login.email') }}" id="email"
				       name="email">
				{{--<span class="fa fa-user form-control-feedback"></span>--}}
			</div>
      {{--真实姓名 --}}
			<div class="form-group has-feedback">
				<input type="text" class="form-control" maxlength="10"  onkeyup="this.value=this.value.replace(/[^\u4e00-\u9fa5]/g,'')" placeholder="{{ trans('login.realname') }}" id="realname"
				       name="realname">
				{{--<span class="fa fa-user form-control-feedback"></span>--}}
			</div>
			{{--性别--}}
			<div class="form-group has-feedback">
				<select name="sex" id="sex"  class="form-control">
					<option value="1">男</option>
					<option value="2">女</option>
				</select>
			</div>
			{{--手机号--}}
			<div class="form-group has-feedback">
				<input type="text" class="form-control" maxlength="11" onkeyup="this.value=this.value.replace(/\D/g,'')" placeholder="{{ trans('login.mobile') }}" id="mobile"
				       name="mobile">
				{{--<span class="fa fa-user form-control-feedback"></span>--}}
			</div>
			{{--身份证号码--}}
			<div class="form-group has-feedback">
				<input type="text" class="form-control" maxlength="18" onkeyup="this.value=this.value.replace(/\D/g,'')" placeholder="{{ trans('login.idcrad') }}" id="idcrad"
				       name="idcrad" style="ime-mode:disabled">
				{{--<span class="fa fa-lock form-control-feedback"></span>--}}
			</div>

			<div class="form-group has-feedback captcha_style">
				<input type="text" class="form-control {{$errors->has('captcha')?'parsley-error':''}}" name="captcha"
				       id="captcha"
				       placeholder="{{ trans('login.input_chptcha') }}" autocomplete="off">
				{{--<span class="fa fa-shield form-control-feedback"></span>--}}
			</div>

			<div class="form-group has-feedback captcha_image_style">
				<img src="{{captcha_src()}}" style="cursor: pointer;height: 32px" onclick="this.src='{{captcha_src()}}'+Math.random()"
				     id="captcha_imgs">
			</div>
			<div class="row">
				<div class="col-xs-12">
					<button class="btn btn-primary btn-block btn-flat" style="background-color: #4A90E2"
					        id="submit_btn">{{ trans('login.zhuce') }}
					</button>
					<div style="margin-top: 10px;text-align: right">已有账号请登录&nbsp;&nbsp;<a href="{{URL('sales')}}">登录</a></div>
				</div>

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
			var username = $('#username').val();      // 账号
			var password = $.trim( $('#password').val() );       //密码
			var password_confirmation = $.trim( $('#password_confirmation').val() );    // 再次输入的密码
			var email = $('#email').val();            //邮箱
			var realname = $('#realname').val();        //真实姓名
			var 	sex = $('#sex').val()  ;                 //性别
			var mobile = $('#mobile').val()   ;             //手机号
			var idcrad = $('#idcrad').val()  ;            //身份证号
			var captcha = $.trim( $( "#captcha" ).val() );    //验证码
			var token = $( "input[name='_token']" ).val();    //token

			$( "#captcha_imgs" ).attr( 'src' , '{{captcha_src()}}' + Math.random() );


			var email_pattern = {{ config('myconfig.config.email_pattern') }};    //邮箱验证
			var mobile_pattern = {{ config('myconfig.config.mobile_pattern') }};  //手机号验证
			var idcard_pattern = {{ config('myconfig.config.idcard_pattern') }};   //身份证验证

			if(
				username == '' || password == '' || password_confirmation == '' || email == '' || realname == ''
				|| sex == '' || mobile == '' || idcrad == ''
			){
				layer.msg('{{trans('login.text_content')}}',{time:1563});
				$( "#submit_btn" ).attr( 'disabled' , false );
				return false;
			}

			if(!email_pattern.test(email)){
				layer.msg('{{trans('login.text_email')}}',{time:1564});
				$( "#submit_btn" ).attr( 'disabled' , false );
				return false;
			}

			if(!mobile_pattern.test(mobile)){
				layer.msg('{{trans('login.text_mobile')}}',{time:1465});
				$('#submit_btn').attr('disabled',false);
				return false;
			}

			if(!idcard_pattern.test(idcrad)){
				layer.msg('{{trans('login.text_idcrad')}}',{time:1456});
				$('#submit_btn').attr('disabled',false);
				return false;
			}


			$.ajax( {
				type : 'POST' ,
				url : "{{URL('zhuce')}}" ,
				data : {
					username : username ,
					password : password ,
					password_confirmation:password_confirmation,
					email:email,
					realname:realname,
					sex:sex,
					mobile:mobile,
					idcrad:idcrad,
					captcha : captcha ,
					_token : token
				} ,
				async : false ,
				timeout : 3000 ,  //请求超时时间，毫秒
				success : function ( result ) {
					console.log( result );

					if ( result.code  == {{ config('myconfig.regi.houser_add_success_code') }} ) {
						layer.msg(result.msg,{time:1234},function(){
							window.location.href = '{{URL('sales')}}';
						});
					}
					if ( result.code == {{ config('myconfig.regi.houser_add_error_code') }} ) {
						layer.msg( result.msg,{time:1546});
						$( "#submit_btn" ).attr( 'disabled' , false );
						return false;
					}
					if ( result.code  == {{ config('myconfig.regi.password_confirmation_code') }} ) {
						layer.msg( result.msg ,{time:1456});
						$( "#submit_btn" ).attr( 'disabled' , false );
						return false;
					}
					if (  result.code == {{ config('myconfig.regi.username_code') }} ) {
						layer.msg( result.msg ,{time:1455});
						$( "#submit_btn" ).attr( 'disabled' , false );
						return false;
					}
					if (  result.code == {{ config('myconfig.regi.mobile_code') }} ) {
						layer.msg( result.msg ,{time:1455});
						$( "#submit_btn" ).attr( 'disabled' , false );
						return false;
					}
					if (  result.code == {{ config('myconfig.regi.idcrad_code') }} ) {
						layer.msg( result.msg ,{time:1455});
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

