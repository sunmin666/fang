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
		<div><span>成员账号（手机号）：</span>{{$hous -> mobile}}</div>
		<div><span>成员姓名：</span>{{$hous -> name}}</div>
		<div><span>成员邮箱：</span>{{$hous -> email}}</div>
		<div><span>成员性别：</span>
			@if($hous -> sex == 1)
				先生
			@elseif($hous ->sex == 2)
				女士
			@endif
		</div>
		<div><span>成员身份证号：</span>{{$hous -> idcrad}}</div>
		<div><span>成员折扣：</span>@if($hous -> enjoys =='') 只有置业顾问有折扣 @else{{$hous -> enjoys}}@endif</div>
		<div><span>成员可等录状态：</span>@if($hous -> is_ipad == 1) 可等录pc @else 可登录ipad @endif</div>
		<div><span>所属项目：</span>{{$hous -> pro_cname}}</div>
		<div><span>成员角色：</span>{{$hous -> role_name}}</div>
		<div><span>成员权限：</span>{{$hous-> perm_name}}</div>
		<div><span>成员登录次数：</span>{{$hous-> login_count}}</div>
		<div><span>成员录入时间：</span>{{date('Y-m-d H:i:s',$hous-> created_at)}}</div>
		<div><span>成员更新时间：</span>@if($hous-> updated_at == '') 该成员暂无更新@else{{date('Y-m-d H:i:s',$hous-> updated_at)}}@endif </div>
</body>
</html>