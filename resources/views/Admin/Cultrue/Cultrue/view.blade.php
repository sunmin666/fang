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
<div><span>企业文化标题：</span>{{$info -> title}}</div>
<div><span>企业文化分类:  </span>{{$info -> name }}
</div>
<div><span>企业文化图片：</span>
    @foreach($info -> imgpath as $k => $v)
        <img src="{{URL::asset('uploads')}}/{{$v}}" id="{{$k}}"  onclick="img({{$k}})" alt="" width="60px" height="60px">
    @endforeach
</div>

<div class="big_img" id="xian">
  <div style="width: 100%;height: 100%">
    <img src="" alt="" onclick="dian()" id="url" style="width: 100%;height: 100%">
  </div>

</div>
<div><span>企业文化添加时间：</span>{{date('Y-m-d H:i:s',$info -> created_at)}}</div>
<div><span>企业文化修改时间：</span> @if($info -> updated_at == '') 暂无更新时间 @else {{date('Y-m-d H:i:s',$info -> updated_at)}} @endif</div>
</body>
@include('Public.weekly_js')
<script>
  function img(k){
    var imgurl = $('#'+ k).attr('src');
    $('#xian').removeClass('big_img');
    $('#url').attr('src',imgurl);
  }

  function dian(){
    $('#xian').addClass('big_img');
  }
</script>
</html>