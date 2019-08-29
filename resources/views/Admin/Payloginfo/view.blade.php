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
<div><span>客户姓名：</span>{{$payedit -> realname}}</div>
<div><span>缴费金额：</span>{{$payedit -> money}}</div>
<div><span>缴费备注：</span>{{$payedit -> remarks}}</div>
<div><span>缴费时间：</span>{{date('Y-m-d H:i',$payedit -> created_at)}}</div>

</body>
</html>