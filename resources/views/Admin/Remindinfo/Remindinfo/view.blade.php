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
        .big_img{
            display:none;
        }
        #xian{
            position: fixed;
            top: 0;
            left:0;
            right: 0;
            bottom: 0;
        }

    </style>
</head>
<body>
<div><span>{{ trans('remindinfo.hous') }}：</span>
    @foreach($hous as $k => $v)
        @if($remindx ->remi_id ==$v -> hous_id ) {{$v ->name }}@endif
    @endforeach
</div>
<div><span>{{ trans('remindinfo.modular') }}:  </span>
    @if($remindx ->modular ==1 )
        客户跟踪
    @elseif($remindx ->modular ==2 )
        客户来访
    @elseif($remindx ->modular ==3 )
        缴费记录
    @elseif($remindx ->modular ==4 )
        认购签约
    @elseif($remindx ->modular ==5 )
        更名
    @elseif($remindx ->modular ==6 )
        换房
    @elseif($remindx ->modular ==7 )
        退房
    @else
        延迟签约
    @endif
</div>
<div><span>{{ trans('remindinfo.content') }}:  </span>{{$remindx -> content }}</div>
<div><span>{{ trans('remindinfo.remind_time') }}:  </span>{{date('Y-m-d H:i:s',$remindx -> remind_time)}}</div>
<div><span>{{ trans('remindinfo.created_at') }}：</span>{{date('Y-m-d H:i:s',$remindx -> created_at)}}</div>
<div><span>{{ trans('remindinfo.updated_at') }}：</span> @if($remindx -> updated_at == '') {{ trans('remindinfo.no_update_ime') }} @else {{date('Y-m-d H:i:s',$remindx -> updated_at)}} @endif</div>
</body>
</html>