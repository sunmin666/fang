<!doctype html>
<html lang="en">
<head>
    @include('Public.weekly_css')
    <style>
        .none {
            display : none;
            /*height: ;*/
            /*display: inline-block;*/
        }
    </style>
</head>
<body>
<div class="modal-body">
    <div class="box box-warning">
        <div class="box-body">
            {{ csrf_field() }}
            <form role="form" action="#" method="post" name="reg_memberinfo" id="reg_memberinfo">

                {{--<input type="hidden" id="cust_id" value="{{$customer -> cust_id}}">--}}
                <div class="form-group">
                    {{--<label>{{ trans('buy.pay_num')}}：</label>--}}
                    <label>用户姓名：</label>
                    <input type="text" class="form-control" readonly
                           value="{{$sig -> realname}}"
                           name="name" placeholder="" id="names"
                           maxlength="12">
                </div>
                <div class="form-group">
                    {{--<label>{{ trans('buy.pay_num')}}：</label>--}}
                    <label>手机号：</label>
                    <input type="text" class="form-control" readonly
                           value="{{$sig -> mobile}}"
                           name="iphone" placeholder="" id="iphones"
                           maxlength="12">
                </div>
                <div class="form-group" >
                    {{--<label>{{ trans('buy.pay_num')}}：</label>--}}
                    <label>身份证号：</label>
                    <input type="text" class="form-control"
                           value="{{$sig -> idcard}}" readonly
                           name="idcard" placeholder="" id="shens"
                           maxlength="18">
                </div>
                {{--<div class="form-group none" id="dizhi">--}}
                {{--<label>{{ trans('buy.pay_num')}}：</label>--}}
                {{--<label>地址：</label>--}}
                {{--<input type="text" class="form-control"--}}
                {{--onkeyup="value=value.replace(/[^\d.]/g,'')"--}}
                {{--name="dizhi" placeholder="请输入缴费金额" id="dizhis"--}}
                {{--maxlength="12">--}}
                {{--</div>--}}

                <div class="form-group ">
                    {{--<label>{{ trans('buy.pay_num')}}：</label>--}}
                    <label>楼号：</label>
                    <input type="text" class="form-control" readonly
                           onkeyup="value=value.replace(/[^\d.]/g,'')"
                           value="{{$sig -> buildnums}}"
                           name="buildnums" id="buildnums"
                           maxlength="12">
                </div>
                <div class="form-group " >
                    {{--<label>{{ trans('buy.pay_num')}}：</label>--}}
                    <label>单元号：</label>
                    <input type="text" class="form-control" readonly
                           value="{{$sig -> unitnums}}"
                           onkeyup="value=value.replace(/[^\d.]/g,'')"
                           name="unitnums"  id="unitnums"
                           maxlength="12">
                </div>
                <div class="form-group " >
                    {{--<label>{{ trans('buy.pay_num')}}：</label>--}}
                    <label>房号：</label>
                    <input type="text" class="form-control" readonly
                           value="{{$sig -> roomnums}}"
                           onkeyup="value=value.replace(/[^\d.]/g,'')"
                           name="roomnums"  id="roomnums"
                           maxlength="12">
                </div>
                <div class="form-group " >
                    {{--<label>{{ trans('buy.pay_num')}}：</label>--}}
                    <label>建筑面积：</label>
                    <input type="text" class="form-control" readonly
                           value="{{$sig -> build_area}}"
                           onkeyup="value=value.replace(/[^\d.]/g,'')"
                           name="build_areas"  id="build_areas"
                           maxlength="12">
                </div>
                <div class="form-group " >
                    {{--<label>{{ trans('buy.pay_num')}}：</label>--}}
                    <label>单价：</label>
                    <input type="text" class="form-control" readonly

                           value="{{$sig -> price}}"
                           onkeyup="value=value.replace(/[^\d.]/g,'')"
                           name="prices"  id="prices"
                           maxlength="12">
                </div>
                <div class="form-group ">
                    {{--<label>{{ trans('buy.pay_num')}}：</label>--}}
                    <label>总价：</label>
                    <input type="text" class="form-control" readonly
                           value="{{$sig -> total}}"
                           onkeyup="value=value.replace(/[^\d.]/g,'')"
                           name="totals"  id="totals"
                           maxlength="12">
                </div>
                <div class="form-group">
                    {{--<label>{{ trans('buy.pay_num')}}：</label>--}}
                    <label>签约方案：</label>
                    <input type="text" class="form-control" readonly
                           value="@if($sig -> sign_applytime ==0)立刻签约 @else 延迟签约 @endif"
                           name="name" placeholder="" id="names"
                           maxlength="12">
                </div>
                <div class="form-group">
                    <label>{{ trans('buy.remarks') }}：</label>
                    <textarea name="sign_remarks" id="sign_remarks" class="form-control" cols="30" rows="5" style="resize:none">{{$sig ->sign_remarks}}</textarea>
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
    //复选框样式
    $( ".i-checks" ).iCheck( {
        checkboxClass : "{{config('myconfig.config.checkbox_skin')}}" ,
    } );
</script>
<script>

    //添加到数据库

    $( '#store1' ).click( function () {

        // $( "#store1" ).attr( 'disabled' , true );
        //获取签约信息或延迟签约

        //签约获延迟签约备注
        var sign_remarks = $('#sign_remarks').val();

        if(sign_remarks == '' ){
            layer.msg("{{trans('signinfo.Incomplete_information')}}",{time:1456});
            return false;
        }

        var regEn = {{config('myconfig.config.regEn')}};       //中文验证
        var regCn = {{config('myconfig.config.regCn')}};   //英文验证

        if ( regEn.test( sign_remarks ) ) {
            layer.msg( '{{trans('signinfo.text_content2')}}' , { time : 1235 } );
            $( "#store1" ).attr( 'disabled' , false );
            return false;
        }

        if ( regCn.test( sign_remarks ) ) {
            layer.msg( '{{trans('signinfo.text_content2')}}' , { time : 1235 } );
            $( "#store1" ).attr( 'disabled' , false );
            return false;
        }

        $.ajax( {
            url : "{{URL('delaysig/destroy')}}",
            type : 'post' ,
            data : {
                {{--buyid: "{{$sig -> buyid}}",--}}
                {{--cust_id : '{{$buy_info -> cust_id}}' ,--}}
                {{--homeid : '{{$buy_info -> homeid}}' ,--}}
                {{--sign_type : 0 ,--}}
                signid:'{{$sig->signid}}',
                sign_remarks : sign_remarks ,
                _token : "{{csrf_token()}}"
            } ,
            success : function ( data ) {
                console.log( data );

                if ( data.code == {{config('myconfig.signinfo.update_success_sig_code')}}) {
                    layer.msg( data.msg , { time : 2000 } , function () {
                        window.parent.location.reload();
                    } );
                }

                if ( data.code == {{config('myconfig.signinfo.update_error_sig_code')}}) {
                    layer.msg( data.msg , { time : 2000 } );
                    $( "#store1" ).attr( 'disabled' , false );
                }

                if ( data.code == {{config('myconfig.signinfo.sign_remarks_code')}}) {
                    layer.msg( data.msg , { time : 2000 } );
                    $( "#store1" ).attr( 'disabled' , false );
                }
            }
        } )
    } )
</script>
</html>
