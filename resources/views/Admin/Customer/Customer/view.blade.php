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
<div><span>{{ trans('customer.realname') }}：</span>{{$omer -> realname}}</div>
<div><span>{{ trans('customer.sex') }}：</span>
	@if($omer -> sex == 1)
		{{ trans('customer.male') }}
	@elseif($omer ->sex == 2)
		{{ trans('customer.female') }}
	@endif</div>
<div><span>{{ trans('customer.mobile') }}：</span>{{$omer -> mobile}}</div>
<div><span>{{ trans('customer.telphone') }}：</span>{{$omer -> telphone}}</div>
<div><span>{{ trans('customer.weixin') }}：</span>{{$omer -> weixin}}</div>
<div><span>{{ trans('customer.qq') }}：</span>{{$omer -> qq}}</div>
<div><span>{{ trans('customer.email') }}：</span>{{$omer -> email}}</div>
<div><span>{{ trans('customer.idcrad') }}：</span>{{$omer -> idcard}}</div>
<div><span>{{ trans('customer.comp_id') }}：</span>{{ trans('customer.open_rice') }}</div>
<div><span>{{ trans('customer.proj_id') }}：</span>
	@foreach($project as $k => $v)
		 @if($v -> project_id == $omer -> proj_id)  {{$v -> pro_cname}}  @endif
	@endforeach
</div>
<div><span>{{ trans('customer.created_at') }}：</span>{{date('Y-m-d',$omer -> created_at)}}</div>

<div><span>{{ trans('customer.cognition') }}：</span>
	@foreach($cognition as $k => $v)
		@if($v -> field_id == $omer -> cognition) {{$v -> name}}  @endif
	@endforeach
</div>
<div><span>{{ trans('customer.family_str') }}：</span>
	@foreach($family_str as $k => $v)
		@if($v -> field_id == $omer -> family_str) {{$v -> name}}  @endif
	@endforeach
</div>
<div><span>{{ trans('customer.work_type') }}：</span>
	@foreach($work_type as $k => $v)
		@if($v -> field_id == $omer -> work_type) {{$v -> name}}  @endif
	@endforeach
</div>
<div><span>{{ trans('customer.address') }}：</span>{{$omer -> address}}</div>
<div><span>{{ trans('customer.intention_area') }}：</span>
	@foreach($intention_area as $k => $v)
		@if($v -> field_id == $omer -> intention_area) {{$v -> name}}  @endif
	@endforeach
</div>
<div><span>{{ trans('customer.floor_like') }}：</span>
	@foreach($floor_like as $k => $v)
		@if($v -> field_id == $omer -> floor_like) {{$v -> name}}  @endif
	@endforeach
</div>
<div><span>{{ trans('customer.furniture_need') }}：</span>
	@foreach($furniture_need as $k => $v)
		@if($v -> field_id == $omer -> furniture_need) {{$v -> name}}  @endif
	@endforeach
</div>
<div><span>{{ trans('customer.house_num') }}：</span>
	@foreach($house_num as $k => $v)
		@if($v -> field_id == $omer -> house_num) {{$v -> name}}  @endif
	@endforeach
</div>
<div><span>{{ trans('customer.first_contact') }}：</span>
	@foreach($first_contact as $k => $v)
		@if($v -> field_id == $omer -> first_contact) {{$v -> name}}  @endif
	@endforeach
</div>
<div><span>{{ trans('customer.status_id') }}：</span>
	@foreach($status_id as $k => $v)
		@if($v -> field_id == $omer -> status_id) {{$v -> name}}  @endif
	@endforeach
</div>




<div><span>{{ trans('customer.ownership') }}：</span>
	@foreach($ownership as $k => $v)
		@if($v -> field_id == $omer -> ownership) {{$v -> name}}  @endif
	@endforeach
</div>

<div><span>{{ trans('customer.purpose') }}：</span>
	@foreach($purpose as $k => $v)
		@if($v -> field_id == $omer -> purpose) {{$v -> name}}  @endif
	@endforeach
</div>

<div><span>{{ trans('customer.area') }}：</span>
	@foreach($area as $k => $v)
		@if($v -> field_id == $omer -> area) {{$v -> name}}  @endif
	@endforeach
</div>

<div><span>{{ trans('customer.residence') }}：</span>
	@foreach($residence as $k => $v)
		@if($v -> field_id == $omer -> residence) {{$v -> name}}  @endif
	@endforeach
</div>

<div><span>{{ trans('customer.structure') }}：</span>
	@foreach($structure as $k => $v)
		@if($v -> field_id == $omer -> structure) {{$v -> name}}  @endif
	@endforeach
</div>

<div><span>{{ trans('customer.demand') }}：</span>
	@foreach($demand as $k => $v)
		@if($v -> field_id == $omer -> demand) {{$v -> name}}  @endif
	@endforeach
</div>

<div><span>{{ trans('customer.apartment') }}：</span>
	@foreach($apartment as $k => $v)
		@if($v -> field_id == $omer -> apartment) {{$v -> name}}  @endif
	@endforeach
</div>



<div><span>{{ trans('customer.hous_id') }}：</span>
	@foreach($hous_id as $k => $v)
		@if($v -> hous_id == $omer -> hous_id) {{$v -> name}}  @endif
	@endforeach
</div>
</body>
</html>