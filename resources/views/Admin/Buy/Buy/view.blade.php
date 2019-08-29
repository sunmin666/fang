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
<div><span>{{ trans('buy.names') }}：</span>{{$buy -> realname}}</div>
<div><span>{{ trans('buy.iphones') }}：</span>{{$buy -> mobile}}</div>
<div><span>{{ trans('buy.shens') }}：</span>{{$buy -> idcard}}</div>
<div><span>{{ trans('buy.buildnums') }}：</span>{{$buy -> buildnums}}</div>
<div><span>{{ trans('buy.unitnums') }}：</span>{{$buy -> unitnums}}</div>
<div><span>{{ trans('buy.roomnums') }}：</span>{{$buy -> roomnums}}</div>
<div><span>{{ trans('buy.floor') }}：</span>{{$buy -> floor}}</div>
<div><span>{{ trans('buy.buy_number') }}：</span>{{$buy -> buy_number}}</div>

<div><span>{{ trans('buy.pay_type') }}：</span>@if($buy -> pay_type == 1) 按揭付款 @else 一次付款 @endif</div>
<div><span>{{ trans('buy.pay_numl') }}：</span>{{$buy -> pay_num}}</div>
<div><span>{{ trans('buy.total_pricess') }}：</span>{{$buy-> total_price}}</div>
<div><span>{{ trans('buy.month_pays') }}：</span>@if($buy -> month_pay == '') 暂无月供 @else {{$buy -> month_pay}} @endif</div>
<div><span>{{ trans('buy.loan_term') }}：</span>@if($buy -> loan_term == '') 暂无年限 @else {{$buy -> loan_term}} @endif</div>
<div><span>{{ trans('buy.zyremarks') }}：</span>{{$buy-> remarks}}</div>
<div>{{ trans('buy.fangwug') }}：</div>
<div>
	 @foreach($buy-> coownerinfo as $k => $v)
		<span>{{ trans('buy.relation') }}：@if($v -> relation == 0) 配偶
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
		 <span>{{ trans('buy.name') }}：{{$v -> realname}}</span>
		 <span>{{ trans('buy.name') }}：@if($v -> sex == 0)先生@else 女士 @endif</span>
		 <span>{{ trans('buy.birthday') }}：{{date('Y-m-d',$v -> birthday)}}</span>
		 <span>{{ trans('buy.shens') }}：{{$v -> idcard}}</span>
		 <span>{{ trans('buy.iphones') }}：{{$v -> mobile}}</span>
		 <span>{{ trans('buy.created_att') }}：{{date('Y-m-d',$v -> created_at)}}</span>
	@endforeach
</div>
</body>
</html>