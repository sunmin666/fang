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
                    <input type="text" class="form-control" name="name"
                           id="name"
                           onkeyup="value=value.replace(/[\d]/g,'') "
                           value=" {{$coowner->name}}"
                           maxlength="15" readonly="readonly">
                    <input type="hidden" value="{{$coowner -> cust_id}}" id="cust_id">
                </div>

                <div class="form-group">
                    {{--共有人姓名--}}
                    <label>{{ trans('coownerinfo.realname') }}：</label>
                    <input type="text" class="form-control" name="realname"
                           placeholder="{{ trans('coownerinfo.please_realname') }}" id="realname"
                           onkeyup="value=value.replace(/[\d]/g,'') "
                           value="{{$coowner->realname}}"
                           maxlength="15">
                </div>

                <div class="form-group">
                    {{--共有人手机号--}}
                    <label>{{ trans('coownerinfo.mobile') }}：</label>
                    <input type="text" class="form-control" name="mobile"
                           placeholder="{{ trans('coownerinfo.please_iphone') }}" id="mobile"
                           onkeyup="value=value.replace(/^(0+)|[^\d]+/g,'')"
                           value="{{$coowner->mobile}}"
                           maxlength="11">
                </div>

                <div class="form-group">
                    {{--共有人身份证号--}}
                    <label>{{ trans('coownerinfo.idcard') }}：</label>
                    <input type="text" class="form-control" name="idcard"
                           placeholder="{{ trans('coownerinfo.please_idcard') }}" id="idcard"
                           onkeyup="value=value.replace(/^(0+)|[^\d]+/g,'')"
                           value="{{$coowner->idcard}}"
                           maxlength="18">
                </div>

                <div class="form-group">
                    <label>{{ trans('coownerinfo.birthday') }}：</label>
                    {{--共有人生日--}}
                    <input type="text" class="layui-input form-control"
                           name="birthday" value="{{date('Y-m-d',$coowner -> birthday)}}" placeholder="{{ trans('coownerinfo.please_birthday') }}" autocomplete="off" id="birthday"
                          >

                </div>

                <div class="form-group">
                    {{--共有人性别--}}
                    <label>{{ trans('coownerinfo.sex') }}：</label>
                        <select name="sex" id="sex" class="form-control">s
                            <option value="1" @if($coowner -> sex==0)selected @endif>{{ trans('coownerinfo.maam') }}</option>
                            <option value="0" @if($coowner -> sex==1)selected @endif>{{ trans('coownerinfo.man') }}</option>
                        </select>
                </div>

                <div class="form-group">
                    {{--共有人与客户之间的关系--}}
                    <label>{{ trans('coownerinfo.relation') }}：</label>
                    <select name="relation" id="relation" class="form-control">s
                        <option value="0" @if($coowner ->relation ==0) selected @endif>{{ trans('coownerinfo.spouse') }}</option>
                        <option value="1" @if($coowner ->relation ==1) selected @endif>{{ trans('coownerinfo.son') }}</option>
                        <option value="2" @if($coowner ->relation ==2) selected @endif>{{ trans('coownerinfo.daughter') }}</option>
                        <option value="3" @if($coowner ->relation ==3) selected @endif>{{ trans('coownerinfo.father') }}</option>
                        <option value="4" @if($coowner ->relation ==4) selected @endif>{{ trans('coownerinfo.mather') }}</option>
                        <option value="5" @if($coowner ->relation ==5) selected @endif>{{ trans('coownerinfo.relative') }}</option>
                    </select>
                </div>

            </form>
        </div>
    </div>
    <div class="add_button">
        <button type="button" class="btn btn-dropbox" id="store1">{{ trans('coownerinfo.save') }}</button>
    </div>
</div>
</body>
@include('Public.weekly_js')
<script>

    //循环除开日期选择器
    layui.use( 'laydate' , function () {
        var laydate = layui.laydate;
        laydate.render( {
            elem : '#birthday',
        } );
    } );

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
            url : "{{URL('coownerinfo/destroy')}}" ,
            type : 'post' ,
            data : {
                c_id:"{{$coowner-> coow_id}}",
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
                if ( data.code == {{config('myconfig.coownerinfo.coownerinfo_destroy_error_code')}}) {
                    layer.msg( data.msg , { time : 2151 } );
                    $( "#store1" ).attr( 'disabled' , false );
                    return false;
                }

                if ( data.code == {{config('myconfig.coownerinfo.coownerinfo_destroy_success_code')}}) {
                    layer.msg( data.msg , { time : 2000 } , function () {
                        window.parent.location.reload();
                    } );
                }
            }
        } )
    } )
</script>
</html>
