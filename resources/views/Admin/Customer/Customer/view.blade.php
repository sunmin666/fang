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
<div><span>客户姓名：</span>{{$omer -> realname}}</div>
<div><span>客户性别：</span>
	@if($omer -> sex == 1)
		男
	@elseif($omer ->sex == 2)
		女
	@endif</div>
<div><span>客户手机号：</span>{{$omer -> mobile}}</div>
<div><span>客户别的手机号：</span>{{$omer -> telphone}}</div>
<div><span>客户微信：</span>{{$omer -> weixin}}</div>
<div><span>客户扣扣：</span>{{$omer -> qq}}</div>
<div><span>客户邮箱：</span>{{$omer -> email}}</div>
<div><span>客户身份证信息：</span>{{$omer -> idcard}}</div>
<div><span>客户所属公司：</span>西安开米</div>
<div><span>客户所属项目：</span>{{$omer -> pro_cname}}</div>
<div><span>客户录入时间：</span>{{date('Y-m-d',$omer -> created_at)}}</div>
</body>
</html>