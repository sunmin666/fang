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
<div><span>{{ trans('purchase.cust_id') }}：</span>{{$purchase -> realname}}</div>
<div><span>{{ trans('purchase.buildnums') }}：</span>{{$purchase -> buildnums}}</div>
<div><span>{{ trans('purchase.unitnums') }}：</span>{{$purchase -> unitnums}}</div>
<div><span>{{ trans('purchase.roomnums') }}：</span>{{$purchase -> roomnums}}</div>
<div><span>{{ trans('purchase.total') }}：</span>{{$purchase -> total}}</div>
<div><span>{{ trans('purchase.discount') }}：</span>{{$purchase -> discount}}</div>
<div><span>{{ trans('purchase.type') }}：</span>@if($purchase -> type == 0){{ trans('purchase.one_all') }}@else{{ trans('purchase.mortgage') }}@endif</div>
<div><span>{{ trans('purchase.once_total') }}：</span>@if($purchase -> type==1){{ trans('purchase.mortgage') }}@else{{$purchase->once_total}}@endif</div>
<div><span>{{ trans('purchase.years') }}：</span>@if($purchase -> type == 0){{ trans('purchase.one_all') }}@else{{ $purchase -> years}}@endif</div>
<div><span>{{ trans('purchase.month_price') }}：</span>@if($purchase -> type == 0){{ trans('purchase.one_all') }}@else{{ $purchase -> month_price}}@endif</div>
<div><span>{{ trans('purchase.month_total') }}：</span>@if($purchase -> type == 0){{ trans('purchase.one_all') }}@else{{ $purchase -> month_total}}@endif</div>
<div><span>{{ trans('purchase.created_at') }}：</span>{{date('Y-m-d H:i:s',$purchase -> created_at)}}</div>

</body>
</html>