<!doctype html>
<html lang="en">
<head>
    @include('Public.weekly_css')
</head>
<body>
<div class="modal-body">
    <div class="box box-warning">
        <div class="box-body">
            {{ csrf_field() }}
            <form id="fileForm" style="display: none;">
                <input type="file"  id="uphoto" style="display: none;" name="car_image">
            </form>
            <form role="form" action="#" method="post" name="reg_memberinfo" id="reg_memberinfo">
                {{--企业文化分类--}}
                <div class="form-group">
                    <label>{{ trans('cultrue.class_id') }}：</label>
                    <select name="parent_field_id" id="parent_field_id" class="form-control">
                        <option value=""> 请选择 </option>
                        @foreach($name as $k => $v)
                            <option value="{{$v -> field_id}}" @if($v -> field_id == $cultrue -> class_id) selected @endif>{{$v ->name }}</option>
                        @endforeach
                    </select>
                </div>
                {{--标题--}}
                <div class="form-group">
                    <label>{{ trans('cultrue.page_title') }}：</label>
                    <input type="text" class="form-control" name="title"
                           placeholder="请输入标题" id="title" value="{{$cultrue -> title}}"
                           maxlength="20">
                </div>
                {{--企业文化图片--}}

                <div class="form-group">
                    <label>{{ trans('cultrue.imgpath') }}：</label>
                    <div class="zzz">
                        {{--<input type="hidden" value="0" id="counter">--}}
                        <div class="add_img">
                            <button type="button" class="btn" id="sahngchaun">
                                <i class="layui-icon">&#xe67c;</i>上传图片
                            </button>
                        </div>
                    </div>
                </div>

                    <div class="form-group" id="imgssss">
                        @foreach($cultrue -> imgpath as $k => $v)
                            <div style="display: inline-block;height: 60px;position: relative;float: left">
                                <div style="float: left;margin-right: 30px">
                                    <img src="{{URL::asset('uploads')}}/{{$v}}" alt="" width="60px" height="60px">
                                </div>
                                <div class="delte_img" style="position: absolute; top: 0;left:60px;width:12px;cursor:pointer;float:right;border:1px solid white;height:12px;text-align:center;line-height:10px;color:white;background-color:red;font-weight:400;z-index: 100;border-radius: 50%;">x</div>
                                <input type="hidden" value="{{$v}}" id="path_img{{$k}}">
                                {{--<div style="float: left;width: 88%;margin-top: 15px"><input type="text" value="{{$v -> img_text}}" id="text{{$k}}" class="form-control" placeholder="请输入文字描述" style="width: 100%"></div>--}}
                            </div>
                        @endforeach
                    </div>
                <input type="hidden" value="{{count($cultrue -> imgpath)}}" id="counter">
                {{ csrf_field()}}
            </form>
        </div>
    </div>
    <div class="add_button">
        <button type="button" class="btn btn-dropbox" id="store1">{{ trans('company.save') }}</button>
    </div>
</div>
</body>
@include('Public.weekly_js')
<script>
    //复选框样式
    $( ".i-checks" ).iCheck( {
        checkboxClass : "{{config('myconfig.config.checkbox_skin')}}" ,   //复选框样式
        radioClass : "{{config('myconfig.config.checkbox_skin')}}"   //单选框样式
    } );
    $('#sahngchaun').click(function(){
        var counter = $('#counter').val();
        $('#uphoto').click();
        $('#uphoto').unbind('change').bind('change',function(){
            var fileData = new FormData(document.getElementById("fileForm"));
            $.ajax({
                url:"{{URL('upload')}}",
                type:"post",
                data:fileData,
                contentType: false,
                processData: false,
                success:function(data){
                    if(data.code == 123){                   //图片类型不允许上传
                        layer.msg(data.msg,{time:1234});
                        return false;
                    }
                    if(data.code == 465){                   //图片大小超出范围
                        layer.msg(data.msg,{time:1564});
                        return false;
                    }
                    if(data.code == 789){                     //上传OK
                        layer.msg(data.msg,{time:1236},function(){
                            var str = '<div style="display: inline-block;height: 60px;position: relative;float:left;">\n' +
                                    '\t\t\t\t\t\t<div style="float: left;margin-right: 30px">\n' +
                                    '\t\t\t\t\t\t\t<img src="{{URL::asset('uploads')}}/'+ data.data+'" alt="" width="60px" height="60px">\n' +
                                    '\t\t\t\t\t\t</div>\n' +
                                    '\t\t\t\t\t\t<div class="delte_img" style="position: absolute; top: 0;left:60px;width:12px;cursor:pointer;float:right;border:1px solid white;height:12px;text-align:center;line-height:10px;color:white;background-color:red;font-weight:400;z-index: 100;border-radius: 50%;">x</div>\n' +
                                    '\t\t\t\t\t\t<input type="hidden" value="'+ data.data +'" id="path_img'+ counter +'">\n' +
//                                    '\t\t\t\t\t\t<div style="float: left;width: 88%;margin-top: 15px"><input type="text" id="text'+ counter +'" class="form-control" placeholder="请输入文字描述" style="width: 100%"></div>\n' +
                                    '\t\t\t\t\t</div>';
                            $('#imgssss').html($('#imgssss').html() + str);

                            var mun = Number(counter) + 1;
                            console.log(mun);
                            $('#counter').val(mun);

                            $('.delte_img').click(function(){
                                $(this).parent().remove();
                            });
                        });
                    }
                }
            });
        })
    })

    $('.delte_img').click(function(){
        $(this).parent().remove();
    });
</script>
<script>

    //添加到数据库

    $( '#store1' ).click( function () {

//        alert(111);
        //$( "#store1" ).attr( 'disabled' , true );
        var parent_field_id = $( '#parent_field_id' ).val();        //企业文化分类   *
        var title = $( '#title' ).val();    //标题   *
//        var counter = $( '#counter' ).val();     //企业文化图片 *
        var num = $('#counter').val();


        var img_text = '';
        for(var a =0 ;a< num;a++){
//            var res = {};
            //var img = $('#path_img'+ a).val();
            var img = $('#path_img'+ a).val();
            if(img != null){
                img_text += img + '/';
            }
        }

//        console.log(img_text);
//        return false;
        if ( parent_field_id== '' || title == '' || counter == '') {
            layer.msg( '{{trans('cultrue.text_content1')}}' , { time : 1235 } );
            $( "#store1" ).attr( 'disabled' , false );
            return false;
        }

        var regEn = {{config('myconfig.config.regEn')}};
        var regCn = {{config('myconfig.config.regCn')}};

        if(regEn.test( title )){
            layer.msg( '{{trans('cultrue.text_content2')}}' , { time : 1235 } );
            $( "#store1" ).attr( 'disabled' , false );
            return false;
        }

        if(regCn.test( title )){
            layer.msg( '{{trans('cultrue.text_content2')}}' , { time : 1235 } );
            $( "#store1" ).attr( 'disabled' , false );
            return false;
        }

        console.log(img_text);
        $.ajax( {
            url : "{{URL('cultrue/update')}}" ,
            type : 'post' ,
            data : {
                title : title ,         //标题
                parent_field_id : parent_field_id ,         //企业文化分类
                img_text: img_text ,           //企业文化图片
                c_id: '{{$cultrue ->cult_id}}',

                _token : "{{csrf_token()}}"             //post提交token验证
            } ,
            success : function ( data ) {
                //console.log(data);
                if ( data.code == {{config('myconfig.cultrue.cultrue_error_update_code')}}) {
                    layer.msg( data.msg , { time : 2151 } );
                    $( "#store1" ).attr( 'disabled' , false );
                    return false;
                }

                if ( data.code == {{config('myconfig.cultrue.cultrue_success_update_code')}}) {
                    layer.msg( data.msg , { time : 2000 } , function () {
                        window.parent.location.reload();
                    } );
                }

                /*if ( data.code == {{config('myconfig.cultrue.roomnum_code')}}) {
                 layer.msg( data.msg , { time : 2000 } );
                 $( "#store1" ).attr( 'disabled' , false );
                 return false;
                 }*/
            }
        } )
    } )
</script>
</html>
