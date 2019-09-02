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
<div><span>{{ trans('changecust.cust_id') }}：</span>{{$changecust -> name}}</div>
<div><span>{{ trans('changecust.mobile') }}：</span>{{$changecust -> mobile}}</div>
<div><span>{{ trans('changecust.idcard') }}：</span>{{$changecust ->idcard}}</div>
<div><span>{{ trans('changecust.new_cust') }}：</span> @foreach($newname as $k=>$v)
        <input type="hidden" value="{{$v ->cust_id}}"@if($changecust->new_cust == $v ->cust_id)>  @endif{{$v -> realname}}
    @endforeach</div>
<div><span>{{ trans('buy.buildnums') }}：</span>{{$changecust ->buildnums }}</div>
<div><span>{{ trans('buy.unitnums') }}：</span>{{$changecust ->unitnums }}</div>
<div><span>{{ trans('buy.roomnums') }}：</span>{{$changecust ->roomnums }}</div>
<div><span>{{ trans('changecust.remarks') }}：</span>{{$changecust -> remarks}}</div>
<div><span>{{ trans('changecust.mnager_status') }}：</span>
    @if($changecust->status == '')
        未审核
    @elseif($changecust->status == 1)
        审核已通过
    @else
        审核未通过
    @endif
</div>
<div><span>{{ trans('changecust.mnager_status_time') }}：</span>
    @if($changecust->verifytime == '')
        未审核
    @else
        {{date('Y-m-d H:i:s',$changecust -> verifytime)}}
    @endif
</div>
<div><span>{{ trans('changecust.adopt_verify_remarks') }}：</span>
    @if($changecust->verify_remarks == '')
        未审核
    @else
        {{$changecust -> verify_remarks}}
    @endif
</div>
<div><span>{{ trans('changecust.created_at') }}：</span>{{date('Y-m-d H:i:s',$changecust -> created_at)}}</div>
<div><span>{{ trans('changecust.updated_at') }}：</span>@if($changecust -> updated_at=='')暂无更新时间@else{{date('Y-m-d H:i:s',$changecust -> updated_at)}}@endif</div>

</body>
</html>
