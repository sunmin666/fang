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
            <form role="form" action="#" method="post" name="reg_memberinfo" id="reg_memberinfo">
                <div class="form-group">
                    {{--客户姓名--}}
                    <label>{{ trans('coownerinfo.cust_id') }}：</label>
                    @foreach($name as $k => $v)
                    <input type="text" class="form-control" name="name"
                           id="name"
                           onkeyup="value=value.replace(/[\d]/g,'') "
                           value="{{$v->realname}}"
                           maxlength="15" readonly="readonly">
                    <input type="hidden" value="{{$v -> cust_id}}" id="cust_id">
                    @endforeach
                </div>

                <div class="form-group">
                    {{--共有人姓名--}}
                    <label>{{ trans('coownerinfo.realname') }}：</label>
                    <input type="text" class="form-control" name="realname"
                           placeholder="{{ trans('coownerinfo.please_realname') }}" id="realname"
                           onkeyup="value=value.replace(/[\d]/g,'') "
                           value=""
                           maxlength="15">
                </div>

                <div class="form-group">
                    {{--共有人手机号--}}
                    <label>{{ trans('coownerinfo.mobile') }}：</label>
                    <input type="text" class="form-control" name="mobile"
                           placeholder="{{ trans('coownerinfo.please_iphone') }}" id="mobile"
                           onkeyup="value=value.replace(/^(0+)|[^\d]+/g,'')"
                           value=""
                           maxlength="11">
                </div>

                <div class="form-group">
                    {{--共有人身份证号--}}
                    <label>{{ trans('coownerinfo.idcard') }}：</label>
                    <input type="text" class="form-control" name="idcard"
                           placeholder="{{ trans('coownerinfo.please_idcard') }}" id="idcard"
                           onkeyup="value=value.replace(/^(0+)|[^\d]+/g,'')"
                           value=""
                           maxlength="18">
                </div>

                <div class="form-group">
                    <label>{{ trans('coownerinfo.birthday') }}：</label>
                    {{--共有人生日--}}
                    <input type="text" class="layui-input form-control"
                           name="birthday" value="" placeholder="{{ trans('coownerinfo.please_birthday') }}" autocomplete="off" id="birthday"
                    >

                </div>

                <div class="form-group">
                    {{--共有人性别--}}
                    <label>{{ trans('coownerinfo.sex') }}：</label>
                    <select name="sex" id="sex" class="form-control">s
                        <option value="1" >{{ trans('coownerinfo.maam') }}</option>
                        <option value="0" >{{ trans('coownerinfo.man') }}</option>
                    </select>
                </div>

                <div class="form-group">
                    {{--共有人与客户之间的关系--}}
                    <label>{{ trans('coownerinfo.relation') }}：</label>
                    <select name="relation" id="relation" class="form-control">s
                        <option value="0">{{ trans('coownerinfo.spouse') }}</option>
                        <option value="1">{{ trans('coownerinfo.son') }}</option>
                        <option value="2">{{ trans('coownerinfo.daughter') }}</option>
                        <option value="3">{{ trans('coownerinfo.father') }}</option>
                        <option value="4">{{ trans('coownerinfo.mather') }}</option>
                        <option value="5">{{ trans('coownerinfo.relative') }} </option>
                    </select>
                </div>

            </form>
        </div>
    </div>
    <div class="add_button">
        <button type="button" class="btn btn-dropbox" id="store1">{{trans('coownerinfo.save') }}</button>
    </div>
</div>
</body>
@include('Public.weekly_js')
<script>

    //循环除开日期选择器
    layui.use( 'laydate' , function () {
        var laydate = layui.laydate;
        laydate.render( {
            elem :'#birthday',
            trigger: 'click',
            max : minTime()
        } );
    } );

    //不让选择以后的时间
    function minTime() {
        var now = new Date();
        return now.getFullYear() + "-" + ( now.getMonth() + 1 ) + "-" + now.getDate() + " " + ( now.getHours() + 1 ) + ":" + now.getMinutes() + ":" + now.getSeconds();
    }

    //复选框样式
    $( ".i-checks" ).iCheck( {
        checkboxClass : "{{config('myconfig.config.checkbox_skin')}}" ,   //复选框样式
        radioClass : "{{config('myconfig.config.checkbox_skin')}}"   //单选框样式
    } );
</script>
<script>



    //添加到数据库
    $( '#store1' ).click( function () {
        var cust_id = $( '#cust_id' ).val();        //客户姓名
        var realname = $( '#realname' ).val();        //共有人姓名
        var mobile = $( '#mobile' ).val();          //共有人手机号
        var idcard = $( '#idcard' ).val();          //共有人身份证号
        var birthday = $( '#birthday' ).val();      //共有人生日
        var sex = $( '#sex' ).val();                //共有人性别
        var relation = $( '#relation' ).val();      //共有人与客户之间的关系

//        console.log(mobile,idcard);
//        return false;

        var mobile_pattern = {{config('myconfig.config.mobile_pattern')}};   //手机号正则匹配
        var idcard_pattern = {{config('myconfig.config.idcard_pattern')}};           //身份证正则表达式

        if ( cust_id == '' || realname == '' || mobile == '' || idcard == ''
                ||birthday==''|| sex=='' || relation==''
        ) {
            layer.msg( '{{trans('coownerinfo.text_content1')}}' , { time : 1235 } );
            $( "#store1" ).attr( 'disabled' , false );
            return false;
        }

        if ( !mobile_pattern.test( mobile ) ) {
            layer.msg( '{{trans('coownerinfo.username_iphones_text')}}' , { time : 1456 } );
            $( '#store1' ).attr( 'disabled' , false );
            return false;
        }

        if ( !idcard_pattern.test( idcard ) ) {
            layer.msg( '{{trans('coownerinfo.username_shens_text')}}' , { time : 1546 } );
            $( '#store1' ).attr( 'disabled' , false );
            return false;
        }

        $.ajax( {
            url : "{{URL('coownerinfo/store')}}" ,
            type : 'post' ,
            data : {
                cust_id : cust_id ,         //客户姓名
                realname : realname ,         //共有人姓名
                mobile : mobile ,        //共有人手机号
                idcard : idcard ,          //共有人身份证号
                birthday:birthday,          //共有人生日
                sex:sex,                //共有人性别
                relation:relation,          //共有人与客户之间的关系
                _token : "{{csrf_token()}}"             //post提交token验证
            } ,
            success : function ( data ) {
                console.log( data );
                if ( data.code == {{config('myconfig.coownerinfo.coownerinfo_store_error_code')}}) {
                    layer.msg( data.msg , { time : 2151 } );
                    $( "#store1" ).attr( 'disabled' , false );
                    return false;
                }

                if ( data.code == {{config('myconfig.coownerinfo.coownerinfo_store_success_code')}}) {
                    layer.msg( data.msg , { time : 2000 } , function () {
                        window.parent.location.reload();
                    } );
                }
            }
        } )
    } )
</script>
</html>
