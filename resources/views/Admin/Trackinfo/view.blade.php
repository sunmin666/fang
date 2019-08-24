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
<div><span>客户姓名：</span>{{$single -> realname}}</div>
<div><span>负责的职业顾问：</span>{{$single -> name}}</div>
<div><span>访问类型：</span>@if($single -> track_type==1)职业顾问主动联系@else客户主动来访@endif</div>
<div><span>跟踪或来访内容：</span>{{$single -> content}}</div>
<div><span>跟踪来访时间：</span>{{date('Y-m-d H:i',$single -> track_time)}}</div>
<div><span>跟踪来访时间创建时间：</span>{{date('Y-m-d H:i',$single -> created_at)}}</div>

</body>
</html>