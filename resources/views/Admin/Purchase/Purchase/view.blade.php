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
<div><span>客户姓名：</span>{{$purchase -> realname}}</div>
<div><span>缴费方案：</span>@if($purchase -> type == 0)一次性付款@else按揭付款@endif</div>
<div><span>一次性总金额：</span>@if($purchase -> type==1)按揭支付@else{{$purchase->once_total}}@endif</div>
<div><span>年限：</span>@if($purchase -> type == 0)一次性付款@else{{ $purchase -> years}}@endif</div>
<div><span>月供：</span>@if($purchase -> type == 0)一次性付款@else{{ $purchase -> month_price}}@endif</div>
<div><span>按揭总金额：</span>@if($purchase -> type == 0)一次性付款@else{{ $purchase -> month_total}}@endif</div>
<div><span>创建时间：</span>{{date('Y-m-d H:i:s',$purchase -> created_at)}}</div>

</body>
</html>