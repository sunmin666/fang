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
<div><span>{{ trans('coownerinfo.cust_id') }}：</span>{{$coowner -> name}}</div>
<div><span>{{ trans('coownerinfo.realname') }}：</span>{{$coowner -> realname}}</div>
<div><span>{{ trans('coownerinfo.mobile') }}：</span>{{$coowner -> mobile}}</div>
<div><span>{{ trans('coownerinfo.idcard') }}：</span>{{$coowner -> idcard}}</div>
<div><span>{{ trans('coownerinfo.sex') }}：</span>@if($coowner -> sex==0){{ trans('coownerinfo.maam') }}@else{{ trans('coownerinfo.man') }}@endif</div>
<div><span>{{ trans('coownerinfo.birthday') }}：</span>{{date('Y-m-d',$coowner -> birthday)}}</div>
<div><span>{{ trans('coownerinfo.relation') }}：</span>@if($coowner -> relation==0){{ trans('coownerinfo.spouse') }}@elseif($coowner -> relation==1){{ trans('coownerinfo.son') }}
                                @elseif($coowner -> relation==2){{ trans('coownerinfo.daughter') }}@elseif($coowner -> relation==3){{ trans('coownerinfo.father') }}
                                @elseif($coowner -> relation==4){{ trans('coownerinfo.mather') }}@elseif($coowner -> relation==5){{ trans('coownerinfo.relative') }}
                                @endif</div>
<div><span>{{ trans('coownerinfo.created_at') }}：</span>{{date('Y-m-d H:i:s',$coowner -> created_at)}}</div>
<div><span>{{ trans('coownerinfo.updated_at') }}：</span>@if($coowner -> updated_at == ''){{ trans('coownerinfo.no_update_ime') }}@else{{date('Y-m-d H:i:s',$coowner -> updated_at)}}@endif</div>
</body>
</html>