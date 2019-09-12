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
                <input type="file"  id="uphoto" style="qdisplay: none;" name="car_image">
            </form>
            <form role="form" action="#" method="post" name="reg_memberinfo" id="reg_memberinfo">
                {{--提醒--}}
                <div class="form-group">
                    <label>{{ trans('remindinfo.hous') }}：</label>
                    <select name="parent_field_id" id="hous" class="form-control">
                        <option value=""> {{ trans('cultrue.please_choice') }} </option>
                        @foreach($hous as $k => $v)
                            <option value="{{$v -> hous_id}}">{{$v ->name }}</option>
                        @endforeach
                    </select>
                </div>
                {{--模块--}}
                <div class="form-group">
                    <label>{{ trans('remindinfo.modular') }}：</label>
                    <select name="parent_field_id" id="modular" class="form-control">
                        <option value=""> {{ trans('cultrue.please_choice') }} </option>
                        <option value="1"> 客户跟踪 </option>
                        <option value="2"> 客户来访 </option>
                        <option value="3"> 缴费记录 </option>
                        <option value="4"> 认购签约 </option>
                        <option value="5"> 更名 </option>
                        <option value="6"> 换房 </option>
                        <option value="7"> 退房 </option>
                        <option value="8"> 延迟签约 </option>
                            {{--<option value="{{$v -> hous_id}}">{{$v ->name }}</option>--}}

                    </select>
                </div>
                {{--提醒内容--}}
                <div class="form-group">
                    <label>{{ trans('remindinfo.content') }}：</label>
					<textarea name="content" id="content"
                              cols="30" rows="5" class="form-control" style=" resize: none;" placeholder="{{trans('remindinfo.text4')}}" ></textarea>
                </div>
                {{--提醒时间--}}
                <div class="form-group" id="lock_time_y">
                    <label>{{ trans('remindinfo.remind_time') }}：</label>
                    <input type="text"  class="layui-input" autocomplete="off" id="remind_time" placeholder="请输入提醒时间">
                </div>
                <div class="form-group" id="imgssss">

                </div>
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
    //日期时间选择器
    layui.use( 'laydate' , function () {
        var laydate = layui.laydate;
        laydate.render( {
            elem : '#remind_time'
            ,trigger: 'click'
            , type : 'datetime'
            , min : minTime()
        } );
    } );
    //不让选择以前的时间
    function minTime() {
        var now = new Date();
        return now.getFullYear() + "-" + ( now.getMonth() + 1 ) + "-" + now.getDate() + " " + ( now.getHours() + 1 ) + ":" + now.getMinutes() + ":" + now.getSeconds();
    }
</script>
<script>

    //添加到数据库

    $( '#store1' ).click( function () {
        var hous = $( '#hous' ).val();        //职业顾问   *
        var content = $( '#content' ).val();    //内容   *
        var remind_time = $('#remind_time').val(); //提醒时间
        var modular = $('#modular').val();  //模块
        if ( hous== '' || content == '' || remind_time == '' || modular == '') {
            layer.msg( '{{trans('remindinfo.text_content1')}}' , { time : 1235 } );
            $( "#store1" ).attr( 'disabled' , false );
            return false;
        }

        var regEn = {{config('myconfig.config.regEn')}};
        var regCn = {{config('myconfig.config.regCn')}};

        if(regEn.test( content )){
            layer.msg( '{{trans('remindinfo.text_content2')}}' , { time : 1235 } );
            $( "#store1" ).attr( 'disabled' , false );
            return false;
        }

        if(regCn.test( content )){
            layer.msg( '{{trans('remindinfo.text_content2')}}' , { time : 1235 } );
            $( "#store1" ).attr( 'disabled' , false );
            return false;
        }

        $.ajax( {
            url : "{{URL('remindinfo/store')}}" ,
            type : 'post' ,
            data : {
                hous_id : hous ,         //职业顾问
                content : content ,         //提示信息
                remind_time: remind_time ,           //提示时间
                modular : modular,          //模块
                _token : "{{csrf_token()}}"             //post提交token验证
            } ,
            success : function ( data ) {
                //console.log(data);
                if ( data.code == {{config('myconfig.remindinfo.remindinfo_store_error_code')}}) {
                    layer.msg( data.msg , { time : 2151 } );
                    $( "#store1" ).attr( 'disabled' , false );
                    return false;
                }

                if ( data.code == {{config('myconfig.remindinfo.remindinfo_store_success_code')}}) {
                    layer.msg( data.msg , { time : 2000 } , function () {
                        window.parent.location.reload();
                    } );
                }

                if ( data.code == {{config('myconfig.remindinfo.content_code')}}) {
                 layer.msg( data.msg , { time : 2000 } );
                 $( "#store1" ).attr( 'disabled' , false );
                 return false;
                 }
            }
        } )
    } )
</script>
</html>
