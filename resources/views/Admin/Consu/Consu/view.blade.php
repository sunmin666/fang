<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
	      content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Document</title>
	<style>
		div {
			margin-bottom : 10px;
		}

		span {
			display       : inline-block;
			width         : 50%;
			text-align    : right;
			padding-right : 10px;
		}
	</style>
</head>
<body>
		<div><span>顾问账号：</span>{{$hous -> username}}</div>
		<div><span>顾问邮箱：</span>{{$hous -> email}}</div>
		<div><span>顾问姓名：</span>{{$hous -> realname}}</div>
		<div><span>顾问性别：</span>
			@if($hous -> sex == 1)
				男
			@elseif($hous ->sex == 2)
				女
			@endif
		</div>
		<div><span>顾问手机号：</span>{{$hous -> mobile}}</div>
		<div><span>顾问头像：</span>
			@if($hous-> avatars == '')
				暂无头像
			@else
			<a href="{{$hous-> avatars}}" target="_blank">点击查看</a>
			@endif
		</div>
		<div><span>顾问身份证号：</span>{{$hous -> idcrad}}</div>
		<div><span>顾问生日：</span>{{date('Y-m-d',$hous -> birthday)}}</div>
		<div><span>顾问微信：</span>{{$hous -> weixin}}</div>
		<div><span>顾问qq：</span>{{$hous -> qq}}</div>
		<div><span>所属公司：</span>{{$hous -> comp_cname}}</div>
		<div><span>所属项目：</span>{{$hous -> pro_cname}}</div>
		<div><span>登录次数：</span>{{$hous -> login_count}}</div>
		<div><span>自我描述：</span>{{$hous-> description}}</div>

</body>
</html>