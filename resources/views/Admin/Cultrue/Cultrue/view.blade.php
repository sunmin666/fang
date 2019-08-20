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
<div><span>企业文化标题：</span>{{$info -> title}}</div>
<div><span>企业文化分类:  </span>@foreach($name as $k => $v)
        <input type="hidden" value="{{$v -> field_id}}"> @if($v -> field_id == $info -> class_id)  @endif{{$v ->name }}
    @endforeach
</div>
<div><span>企业文化图片：</span>
    @foreach($info -> imgpath as $k => $v)
        <img src="{{URL::asset('uploads')}}/{{$v}}" alt="" width="60px" height="60px">
    @endforeach
</div>
<div><span>企业文化添加时间：</span>{{date('Y-m-d H:i:s',$info -> created_at)}}</div>
<div><span>企业文化修改时间：</span> @if($info -> updated_at == '') 暂无更新时间 @else {{date('Y-m-d H:i:s',$info -> updated_at)}} @endif</div>
</body>
</html>