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
<div><span>{{ trans('change.cust') }}：</span>{{$chang_home -> realname}}</div>
<div><span>{{ trans('change.homeid_old_lh') }}：</span>{{$chang_home -> buildnum_old}}</div>
<div><span>{{ trans('change.homeid_old_dy') }}：</span>{{$chang_home -> unitnum_old}}</div>
<div><span>{{ trans('change.homeid_old_fh') }}：</span>{{$chang_home-> roomnum_old}}</div>
<div><span>{{ trans('change.homeid_new_lh') }}：</span>{{$chang_home-> buildnum_new}}</div>
<div><span>{{ trans('change.homeid_new_dy') }}：</span>{{$chang_home-> unitnum_new}}</div>
<div><span>{{ trans('change.homeid_new_fh') }}：</span>{{$chang_home-> roomnum_new}}</div>
<div><span>{{ trans('change.status_jl') }}：</span>
	@if($chang_home -> status == null)
		经理未审核
	@elseif($chang_home -> status == 0)
		经理审核未通过
	@elseif($chang_home -> status == 1)
		经理审核通过
	@endif
</div>
<div><span>{{ trans('change.status_ji_time') }}：</span>@if($chang_home -> verifytime == null)
		经理未审核
	@else
		{{date('Y-m-d',$chang_home -> verifytime)}}
	@endif
</div>
<div><span>{{ trans('change.status_cw') }}：</span>@if($chang_home -> status == null)
		财务未审核
	@elseif($chang_home -> status == 0)
		财务审核未通过
	@elseif($chang_home -> status == 1)
		财务审核通过
	@endif
</div>
<div><span>{{ trans('change.status_cw_time') }}：</span>@if($chang_home -> verifytime == null)
		财务未审核
	@else
		{{date('Y-m-d',$chang_home -> finance_time)}}
	@endif
</div>
<div><span>{{ trans('change.created_at') }}：</span>
	{{date('Y-m-d H:i',$chang_home -> created_at)}}
</div>
</body>
</html>