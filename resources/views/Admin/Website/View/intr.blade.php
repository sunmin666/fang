<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
	      content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>{{$intr -> i_title}}</title>
	<style>
		.title{
			height: 40px;
			width: 100%;
			background-color: #fad000;
			line-height: 40px;
			text-align: center;
			margin-bottom: 10px;
		}
		.img{
			width: 100%;
		}
		.img_img{
			width: 100%;
			margin-bottom: 20px;
		}

		.img_img div img {
			width: 100%;
			height: auto;
		}
	</style>
</head>
<body>
	<div class="title">
		{{$intr -> i_title}}
	</div>
	<div class="img">
		@foreach($intr -> img as $k => $v)

		<div class="img_img">
			<div>
				<img src="{{URL::asset('uploads')}}/{{$v -> img_title}}" alt="">
			</div>
			<div>{{$v -> img_text}} </div>
		</div>
		@endforeach
	</div>
</body>
</html>