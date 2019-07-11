<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
	      content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="shortcut icon" href="{{URL::asset('img/favicon.ico')}}"/>
	<link rel="stylesheet" href="{{URL::asset('bower_components/bootstrap/dist/css/bootstrap.css')}}">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="{{URL::asset('bower_components/font-awesome/css/font-awesome.css')}}">
	<!-- Ionicons -->
	<link rel="stylesheet" href="{{URL::asset('bower_components/Ionicons/css/ionicons.css')}}">
	<!-- Ionicons -->
	<link rel="stylesheet" href="{{URL::asset('bower_components/admin-lte/plugins/iCheck/all.css')}}">
	<!-- Theme style -->
	<link rel="stylesheet" href="{{URL::asset('bower_components/admin-lte/dist/css/AdminLTE.css')}}">
	<!-- AdminLTE Skins. We have chosen the skin-blue for this starter
			page. However, you can choose any other skin. Make sure you
			apply the skin class to the body tag so the changes take effect. -->
	<link rel="stylesheet" href="{{URL::asset('bower_components/admin-lte/dist/css/skins/_all-skins.css')}}">

	<!-- layui UI -->
	<link rel="stylesheet" href="{{URL::asset('bower_components/layui/dist/css/layui.css')}}">
	<link rel="stylesheet" href="{{URL::asset('bower_components/bootstrap-fileinput/css/fileinput.css')}}">
	<link rel="stylesheet" href="{{URL::asset('css/weekly.css')}}">
	{{--@stack('include-css')--}}
	<link rel="stylesheet" href="{{URL::asset('css/googlefont.css')}}">
	<title>联系我们</title>
	<style>
		html{
			width: 100%;
			height: 100%;
			margin: 0;
			padding: 0;
		}
		body{
			margin: 0;
			padding: 0;
			width: 100%;
			height: 100%;
			background: url('./img/zhixia.jpg') no-repeat;
			background-size:100% 100%;
		}
		div{
			margin: 0 auto;
			width: 90%;
			height: 40px;
		}
		div input{
			padding-left: 5px;
			width: 100%;
			height: 30px;
			background-color: transparent;
			border: none;
			outline:none;
			border-bottom: 1px solid #ccc;
		}
		.contentsss{
			height: 100px;
		}
		textarea{
			padding-left: 5px;
			background-color: transparent;
			border: none;
			outline:none;
			height: 100%;
			width: 100%;
		}
		.button{
			width: 80%;
			height: 30px;
			margin-top: 20px;
		}

		/*.header {filter:alpha(opacity=50);opacity:0.5;}*/

		.button button{
			width: 100%;
			height: 100%;
			border: none;
			border-radius: 5px;
			background-color : rgba(88,153,85,0.7);
			filter:alpha(opacity=50);
			color : #fff;
		}
	</style>
</head>
<body>
<div style="width: 100%;height: 200px"></div>
<div><input type="text" placeholder="请输入姓名" name="c_name" id="c_name" maxlength="10"></div>
<div><input type="text" placeholder="请输入手机号" name="c_phone" id="c_phone" maxlength="11"></div>
<div><input type="text" placeholder="请输入邮箱" name="c_email" id="c_email" maxlength="25"></div>
<div class="contentsss">
	<textarea name="c_content" id="c_content"  cols="30" rows="10" placeholder="请输入内容" maxlength="100"></textarea>
</div>
<div class="button">
	<button id="IG">提交</button>
</div>
</body>
<script src="{{URL::asset('bower_components/jquery/dist/jquery.js')}}"></script>
<!-- Bootstrap 3.3.7 -->
<script src="{{URL::asset('bower_components/bootstrap/dist/js/bootstrap.js')}}"></script>
<!-- Ionicons -->
<script src="{{URL::asset('bower_components/admin-lte/plugins/iCheck/icheck.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{URL::asset('bower_components/admin-lte/dist/js/adminlte.js')}}"></script>
<!-- Layui UI -->
<script src="{{URL::asset('bower_components/layui/dist/layui.all.js')}}"></script>
<script src="{{URL::asset('bower_components/bootstrap-fileinput/js/fileinput.js')}}"></script>
<script src="{{URL::asset('bower_components/bootstrap-fileinput/js/locales/zh.js')}}"></script>
<script src="{{URL::asset('js/iehtml.js')}}"></script>
<script src="{{URL::asset('js/ierespond.js')}}"></script>
<script>
	$('#IG').click(function(){
		var c_name = $('#c_name').val();
		var c_phone = $('#c_phone').val();
		var c_email = $('#c_email').val();
		var c_content = $('#c_content').val();

		var realname_pattern = {{config('myconfig.config.realname_pattern')}}   //中文名称验证
		var mobile_pattern = {{config('myconfig.config.mobile_pattern')}};   //手机号验证
		var email_pattern = {{config('myconfig.config.email_pattern')}}  ;   //邮箱验证
		var regEn = {{config('myconfig.config.regEn')}};   //英文特殊字符
		var regCn = {{config('myconfig.config.regCn')}};   //中文特殊字符


		if(c_name == '' || !realname_pattern.test(c_name)){
			layer.msg('名称不合法',{time:1563});
			return false;
		}

		if(c_phone == '' || !mobile_pattern.test(c_phone)){
			layer.msg('手机号不合法',{time:1234});
			return false;
		}


		if(c_email == ''  || !email_pattern.test(c_email)){
			layer.msg('邮箱不合法',{time:1236});
			return false;
		}

		if ( c_content == '' || regEn.test(c_content) || regCn.test(c_content)) {
			layer.msg( '留言内容不合法' , { time : 1500 } );
			$( "#store1" ).attr( 'disabled' , false );
			return false;
		}


		$.ajax({
			url:"{{URL('we/store')}}",
			type:"post",
			data:{
				c_name:c_name,
				c_phone:c_phone,
				c_email:c_email,
				c_content:c_content,
				_token: "{{csrf_token()}}"
			},
			success:function(data){
				console.log(data);

				if(data.code == {{config('myconfig.contact.store_con_success_code')}}){
					layer.msg(data.msg,{time:1256},function(){
						window.location.reload();    //刷新页面
					})
				}

				if(data.code == {{config('myconfig.contact.store_con_error_code')}}){
					layer.msg(data.msg,{time:1632});
					return false;
				}
			}
		});

	});

</script>
</html>