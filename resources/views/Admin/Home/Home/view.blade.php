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
<div><span>房子楼层：</span>{{$home -> buildnums}}</div>
<div><span>房子单元号：</span>{{$home -> unitnums}}</div>
<div><span>房子房号：</span>{{$home -> roomnums}}</div>
<div><span>房子楼层：</span>{{$home -> floor}}</div>
<div><span>建筑面积：</span>{{$home -> build_area}}</div>
<div><span>户型图：</span><img src="{{URL::asset($home -> house_img)}}" alt="" style="width: 50px;height:50px" ></div>
<div><span>户型结构：</span>{{$home -> house_str}}</div>
<div><span>单价：</span>{{$home -> price}}</div>
<div><span>总价：</span>{{$home -> total}}</div>
<div><span>折扣：</span>{{$home-> discount}}</div>
<div><span>房子状态：</span>
	@if($home -> status == 0)
		<span style="color:green">认购前</span>
	@elseif($home-> status == 1)
		<span style="color:yellow">预定房源申请中</span>
	@elseif($home -> status == 2)
		<span style="color:blue">以认购</span>
	@else
		<span style="color:red">以签约</span>
	@endif
</div>
<div><span>认购编码：</span>{{$home-> buyid}}</div>
<div><span>房子录入时间：</span>{{date('Y-m-d H:i:s',$home-> created_at)}}</div>
<div><span>房子更新时间：</span>{{date('Y-m-d H:i:s',$home-> updated_at)}}</div>
<div><span>房子状态备注：</span> {{$home -> remarks}} </div>
</body>
</html>