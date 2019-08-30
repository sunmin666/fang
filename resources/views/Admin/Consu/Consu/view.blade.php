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
		<div><span>{{ trans('consu.number_iphone') }}：</span>{{$hous -> mobile}}</div>
		<div><span>{{ trans('consu.name') }}：</span>{{$hous -> name}}</div>
		<div><span>{{ trans('consu.email') }}：</span>{{$hous -> email}}</div>
		<div><span>{{ trans('consu.sex') }}：</span>
			@if($hous -> sex == 1)
				{{ trans('consu.man') }}
			@elseif($hous ->sex == 2)
				{{ trans('consu.maam') }}
			@endif
		</div>
		<div><span>{{ trans('consu.idcrad') }}：</span>{{$hous -> idcrad}}</div>
		<div><span>{{ trans('consu.enjoy') }}：</span>@if($hous -> enjoys =='') {{ trans('consu.consultant_discount') }} @else{{$hous -> enjoys}}@endif</div>
		<div><span>{{ trans('consu.is_ipad') }}：</span>@if($hous -> is_ipad == 1) {{ trans('consu.pc_login') }} @else {{ trans('consu.ipad_login') }} @endif</div>
		<div><span>{{ trans('consu.proj_id') }}：</span>{{$hous -> pro_cname}}</div>
		<div><span>{{ trans('consu.role') }}：</span>{{$hous -> role_name}}</div>
		<div><span>{{ trans('consu.permin') }}：</span>{{$hous-> perm_name}}</div>
		<div><span>{{ trans('consu.login_count') }}：</span>{{$hous-> login_count}}</div>
		<div><span>{{ trans('consu.created_at') }}：</span>{{date('Y-m-d H:i:s',$hous-> created_at)}}</div>
		<div><span>{{ trans('consu.updated_at') }}：</span>@if($hous-> updated_at == '') {{ trans('consu.no_update_ime') }}@else{{date('Y-m-d H:i:s',$hous-> updated_at)}}@endif </div>
</body>
</html>