<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
	      content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>{{$view -> n_title}}</title>

	<style>
		#bao{
			/*width: 20%;*/
			/*height: 800px;*/
			/*background-color: firebrick;*/
			/*margin: 0 auto;*/
		}
		#title{
			text-align: center;
			padding-top: 15px;
			font-size: 18px;
			font-weight: bold;
		}

		#zax{
			text-align: center;
			color : #ccc;
		}

		#content{
			padding:  0 10px 0 10px;
		}
	</style>


</head>
<body>
		<div id="bao">
				<p id="title">{{$view -> n_title}}</p>
			<div id="zax">
				时间：{{date('Y-m-d H:s',$view -> created_at)}} &nbsp;&nbsp;
				作者：{{$view ->n_admin_at}}
			</div>
			<div id="content">
				<?php echo $view -> content?>
			</div>
		</div>
</body>
</html>