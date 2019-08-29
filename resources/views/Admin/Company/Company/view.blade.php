<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
	      content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Document</title>
	<style>
		div{
			margin-bottom: 10px;
		}
		span{
			display:inline-block;
			width: 50%;
			text-align: right;
			padding-right: 10px;
		}
	</style>
</head>
<body>
		<div><span>{{ trans('company.comp_cname') }}：</span>{{$company -> comp_cname}}</div>
		<div><span>{{ trans('company.comp_ename') }}：</span>{{$company -> comp_ename}}</div>
		<div><span>{{ trans('company.corporation') }}：</span>{{$company -> corporation}}</div>
		<div><span>{{ trans('company.corp_idcard') }}：</span>{{$company -> corp_idcard}}</div>
		<div><span>{{ trans('company.corp_mobile') }}：</span>{{$company -> corp_mobile}}</div>
		<div><span>{{ trans('company.license') }}：</span><a href="{{$company-> license}}" target="_blank">点击查看</a></div>
		<div><span>{{ trans('company.credit_code') }}：</span>{{$company -> credit_code}}</div>
		<div><span>{{ trans('company.address') }}：</span>{{$company -> address}}</div>
		<div><span>{{ trans('company.telphone') }}：</span>{{$company -> telphone}}</div>
		<div><span>{{ trans('company.comp_type') }}：</span>
			@if($company -> comp_type == 1)
				个人独资
			@elseif($company -> comp_type == 2)
				合伙企业
			@elseif($company -> comp_type == 3)
				有限责任公司
			@elseif($company -> comp_type == 4)
				股份制公司
			@elseif($company -> comp_type == 5)
				集团公司
			@elseif($company -> comp_type == 6)
				一人制公司
			@endif
		</div>
		<div><span>{{ trans('company.reg_capital') }}：</span>{{$company -> reg_capital}}万</div>
		<div><span>{{ trans('company.contacts') }}：</span>{{$company -> contacts}}</div>
		<div><span>{{ trans('company.cont_mobile') }}：</span>{{$company -> cont_mobile}}</div>
		<div><span>{{ trans('company.cont_idcard') }}：</span>{{$company -> cont_idcard}}</div>
		<div><span>{{ trans('company.created_date') }}：</span>{{date('Y-m-d',$company-> created_date)}}</div>
		<div><span>{{ trans('company.business_date') }}：</span>{{date('Y-m-d',$company -> business_date)}}</div>
		<div><span>{{ trans('company.expire_date') }}：</span>{{date('Y-m-d',$company -> expire_date)}}</div>
		<div><span>{{ trans('company.created_att') }}：</span>{{date('Y-m-d H:i',$company -> created_at)}}</div>
		<div><span>{{ trans('company.updated_att') }}：</span>{{date('Y-m-d H:i',$company -> updated_at)}}</div>
</body>
</html>