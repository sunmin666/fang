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
<div><span>客户姓名：</span>{{$coowner -> name}}</div>
<div><span>共有人姓名：</span>{{$coowner -> realname}}</div>
<div><span>共有人手机号：</span>{{$coowner -> mobile}}</div>
<div><span>共有人身份证号：</span>{{$coowner -> idcard}}</div>
<div><span>共有人性别：</span>@if($coowner -> sex==0)女士@else男士@endif</div>
<div><span>共有人生日：</span>{{date('Y-m-d',$coowner -> birthday)}}</div>
<div><span>关系：</span>@if($coowner -> relation==0)配偶@elseif($coowner -> relation==1)儿子
                                @elseif($coowner -> relation==2)女儿@elseif($coowner -> relation==3)父亲
                                @elseif($coowner -> relation==4)母亲@elseif($coowner -> relation==5)亲戚
                                @endif</div>
<div><span>创建时间：</span>{{date('Y-m-d H:i:s',$coowner -> created_at)}}</div>
<div><span>信息更新时间：</span>@if($coowner -> updated_at == '')暂无更新时间@else{{date('Y-m-d H:i:s',$coowner -> updated_at)}}@endif</div>
</body>
</html>