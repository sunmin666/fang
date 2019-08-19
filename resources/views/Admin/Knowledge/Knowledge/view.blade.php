<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
	      content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Document</title>
	<style>
		html,body{
			width: 100%;
			height: 100%;
			margin: 0;
			padding: 0;
		}
		h2{
			margin: 0;
			text-align: center;
		}
.time{

	line-height: 50px;
	width: 60%;
	margin: 0 auto;
	height: 50px;
	color:#ccc;
	text-align: center;
}
		.content{
			text-align: center;
		}
	</style>
</head>
<body>
	<div>
		<h2>{{$data -> title}}</h2>
		<div class="time">
			<span>时间：{{date('Y-m-d H:i:s')}}</span> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<span>是否公开：@if($data -> is_public == 0)
					公开
				@elseif($data-> is_public == 1)
					不公开
				@endif</span>
		</div>
		<div class= "content">
			<video src="{{URL::asset('uploads/shipin/'.$data->video)}}" controls="controls" id="myvideo" class="none"></video>
			<div><?php echo $data -> content?></div>
		</div>
	</div>
</body>
</html>