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
<div><span>{{trans('trackinfo.text7')}}：</span>{{$single -> realname}}</div>
<div><span>{{trans('trackinfo.text8')}}：</span>{{$single -> name}}</div>
<div><span>{{trans('trackinfo.text9')}}：</span>@if($single -> track_type==1){{trans('trackinfo.text5')}}@else{{trans('trackinfo.text6')}}@endif</div>
<div><span>{{trans('trackinfo.text10')}}：</span>{{$single -> content}}</div>
<div><span>{{trans('trackinfo.text11')}}：</span>{{date('Y-m-d H:i',$single -> track_time)}}</div>
<div><span>{{trans('trackinfo.text12')}}：</span>{{date('Y-m-d H:i',$single -> created_at)}}</div>

</body>
</html>