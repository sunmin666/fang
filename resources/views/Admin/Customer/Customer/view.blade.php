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
<div><span>客户所属项目：</span>
	@foreach($project as $k => $v)
		 @if($v -> project_id == $omer -> proj_id)  {{$v -> pro_cname}}  @endif
	@endforeach
</div>
<div><span>客户录入时间：</span>{{date('Y-m-d',$omer -> created_at)}}</div>

<div><span>客户认知渠道：</span>
	@foreach($cognition as $k => $v)
		@if($v -> field_id == $omer -> cognition) {{$v -> name}}  @endif
	@endforeach
</div>
<div><span>家庭结构：</span>
	@foreach($family_str as $k => $v)
		@if($v -> field_id == $omer -> family_str) {{$v -> name}}  @endif
	@endforeach
</div>
<div><span>工作类型：</span>
	@foreach($work_type as $k => $v)
		@if($v -> field_id == $omer -> work_type) {{$v -> name}}  @endif
	@endforeach
</div>
<div><span>联系地址：</span>{{$omer -> address}}</div>
<div><span>意向面积：</span>
	@foreach($intention_area as $k => $v)
		@if($v -> field_id == $omer -> intention_area) {{$v -> name}}  @endif
	@endforeach
</div>
<div><span>楼层偏好：</span>
	@foreach($floor_like as $k => $v)
		@if($v -> field_id == $omer -> floor_like) {{$v -> name}}  @endif
	@endforeach
</div>
<div><span>家具需求：</span>
	@foreach($furniture_need as $k => $v)
		@if($v -> field_id == $omer -> furniture_need) {{$v -> name}}  @endif
	@endforeach
</div>
<div><span>置业此数：</span>
	@foreach($house_num as $k => $v)
		@if($v -> field_id == $omer -> house_num) {{$v -> name}}  @endif
	@endforeach
</div>
<div><span>首次接触方式：</span>
	@foreach($first_contact as $k => $v)
		@if($v -> field_id == $omer -> first_contact) {{$v -> name}}  @endif
	@endforeach
</div>
<div><span>客户状态：</span>
	@foreach($status_id as $k => $v)
		@if($v -> field_id == $omer -> status_id) {{$v -> name}}  @endif
	@endforeach
</div>
<div><span>职业顾问：</span>
	@foreach($hous_id as $k => $v)
		@if($v -> hous_id == $omer -> hous_id) {{$v -> name}}  @endif
	@endforeach
</div>
</body>
</html>