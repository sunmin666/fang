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
<div><span>{{ trans('change.cust') }}：</span>{{$checkout -> realname}}</div>
<div><span>{{ trans('change.homeid_old_lh') }}：</span>{{$checkout -> mobile}}</div>
<div><span>{{ trans('change.homeid_old_dy') }}：</span>{{$checkout -> idcard}}</div>
<div><span>{{ trans('change.homeid_old_fh') }}：</span>{{$checkout-> buildnums}}</div>
<div><span>{{ trans('change.homeid_new_lh') }}：</span>{{$checkout-> unitnums}}</div>
<div><span>{{ trans('change.homeid_new_dy') }}：</span>{{$checkout-> roomnums}}</div>
<div><span>{{ trans('change.homeid_new_fh') }}：</span>{{$checkout-> remarks}}</div>
<div><span>{{ trans('change.status_jl') }}：</span>
	@if($checkout -> status == null)
		经理未审核
	@elseif($checkout -> status == 0)
		经理审核未通过
	@elseif($checkout -> status == 1)
		经理审核通过
	@endif
</div>
<div><span>{{ trans('change.status_ji_time') }}：</span>@if($checkout -> verifytime == null)
		经理未审核
	@else
		{{date('Y-m-d',$checkout -> verifytime)}}
	@endif
</div>
<div><span>{{ trans('change.status_cw') }}：</span>@if($checkout -> status == null)
		财务未审核
	@elseif($checkout -> status == 0)
		财务审核未通过
	@elseif($checkout -> status == 1)
		财务审核通过
	@endif
</div>
<div><span>{{ trans('change.status_cw_time') }}：</span>@if($checkout -> verifytime == null)
		财务未审核
	@else
		{{date('Y-m-d',$checkout -> finance_time)}}
	@endif
</div>
<div><span>{{ trans('change.created_at') }}：</span>
	{{date('Y-m-d H:i',$checkout -> created_at)}}
</div>
</body>
</html>