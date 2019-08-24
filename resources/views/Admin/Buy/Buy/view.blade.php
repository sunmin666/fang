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
<div><span>客户姓名：</span>{{$buy -> realname}}</div>
<div><span>客户手机号：</span>{{$buy -> mobile}}</div>
<div><span>客户身份证号：</span>{{$buy -> idcard}}</div>
<div><span>楼号：</span>{{$buy -> buildnums}}</div>
<div><span>单元号：</span>{{$buy -> unitnums}}</div>
<div><span>房号：</span>{{$buy -> roomnums}}</div>
<div><span>楼层：</span>{{$buy -> floor}}</div>
<div><span>认购编号：</span>{{$buy -> buy_number}}</div>

<div><span>付款方式：</span>@if($buy -> pay_type == 1) 按揭付款 @else 一次付款 @endif</div>
<div><span>缴纳定金：</span>{{$buy -> pay_num}}</div>
<div><span>总金额：</span>{{$buy-> total_price}}</div>
<div><span>月供：</span>@if($buy -> month_pay == '') 暂无月供 @else {{$buy -> month_pay}} @endif</div>
<div><span>年限：</span>@if($buy -> loan_term == '') 暂无年限 @else {{$buy -> loan_term}} @endif</div>
<div><span>职业顾问备注：</span>{{$buy-> remarks}}</div>
<div>房子共有人：</div>
<div>
	 @foreach($buy-> coownerinfo as $k => $v)
		<span>关系：@if($v -> relation == 0) 配偶
						@elseif($v -> relation == 1)
							 儿子
						@elseif($v -> relation == 2)
							 女儿
						@elseif($v -> relation == 3)
							 父亲
						@elseif($v -> relation == 4)
							 母亲
						@elseif($v -> relation == 5)
						亲戚
			@endif
		</span>
		 <span>姓名：{{$v -> realname}}</span>
		 <span>性别：@if($v -> sex == 0)先生@else 女士 @endif</span>
		 <span>生日：{{date('Y-m-d',$v -> birthday)}}</span>
		 <span>身份证号：{{$v -> idcard}}</span>
		 <span>手机号：{{$v -> mobile}}</span>
		 <span>添加时间：{{date('Y-m-d',$v -> created_at)}}</span>
	@endforeach
</div>
</body>
</html>