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
<div><span>客户姓名：</span>{{$sig -> realname}}</div>
<div><span>客户性别：</span>
	@if($sig -> sex == 1)
		男
	@elseif($sig ->sex == 2)
		女
	@endif</div>
<div><span>客户手机号：</span>{{$sig -> mobile}}</div>

<div><span>认购协议编号：</span>{{$sig -> buy_number}}</div>

<div><span>经理审核时间：</span>
	{{date('Y-m-d H:i',$sig -> sign_verifytime)}}
</div>
<div><span>经理审核状态：</span>
	@if($sig -> sign_status == 0 || $sig -> sign_status == '') 未通过 @else 以通过 @endif
</div>
<div><span>经理审核备注：</span>
	{{$sig -> verify_remarks}}
</div>


<div><span>经理审核时间：</span>
	{{date('Y-m-d H:i',$sig -> finance_verifytime)}}
</div>
<div><span>经理审核状态：</span>
	@if($sig -> finance_status == 0 || $sig -> finance_status == '') 未通过 @else 以通过 @endif
</div>
<div><span>经理审核备注：</span>
	{{$sig -> finance_remarks}}
</div>

</body>
</html>