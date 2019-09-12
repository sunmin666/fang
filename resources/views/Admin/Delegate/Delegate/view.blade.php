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
{{--<div><span>{{ trans('delegate.cust') }}：</span>--}}
    {{--@foreach($cust as $k => $v)--}}
        {{--@if($delegate ->cust_id ==$v -> cust_id ) {{$v ->realname }}@endif--}}
    {{--@endforeach--}}
{{--</div>--}}
<div><span>{{ trans('delegate.hous') }}:  </span>
    @foreach($hous as $k => $v)
        @if($delegate ->hous_id ==$v -> hous_id ) {{$v ->name }}@endif
    @endforeach
</div>
<div><span>{{ trans('delegate.remarks') }}:  </span>{{$delegate -> remarks}}</div>
<div><span>{{ trans('delegate.created_at') }}：</span>{{date('Y-m-d H:i:s',$delegate -> created_at)}}</div>
<div><span>{{ trans('delegate.updated_at') }}：</span> @if($delegate -> updated_at == '') {{ trans('remindinfo.no_update_ime') }} @else {{date('Y-m-d H:i:s',$delegate -> updated_at)}} @endif</div>
</body>
</html>