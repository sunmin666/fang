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
                           value="{{$buy_info -> realname}}"
                           name="name" placeholder="" id="names"
                           maxlength="12">
                </div>
                <div class="form-group">
                    {{--<label>{{ trans('buy.pay_num')}}：</label>--}}
                    <label>手机号：</label>
                    <input type="text" class="form-control" readonly
                           value="{{$buy_info -> mobile}}"
                           name="iphone" placeholder="" id="iphones"
                           maxlength="12">
                </div>
                <div class="form-group" >
                    {{--<label>{{ trans('buy.pay_num')}}：</label>--}}
                    <label>身份证号：</label>
                    <input type="text" class="form-control"
                           value="{{$buy_info -> idcard}}" readonly
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
                           value="{{$buy_info -> buildnums}}"
                           name="buildnums" id="buildnums"
                           maxlength="12">
                </div>
                <div class="form-group " >
                    {{--<label>{{ trans('buy.pay_num')}}：</label>--}}
                    <label>单元号：</label>
                    <input type="text" class="form-control" readonly
                           value="{{$buy_info -> unitnums}}"
                           onkeyup="value=value.replace(/[^\d.]/g,'')"
                           name="unitnums"  id="unitnums"
                           maxlength="12">
                </div>
                <div class="form-group " >
                    {{--<label>{{ trans('buy.pay_num')}}：</label>--}}
                    <label>房号：</label>
                    <input type="text" class="form-control" readonly
                           value="{{$buy_info -> roomnums}}"
                           onkeyup="value=value.replace(/[^\d.]/g,'')"
                           name="roomnums"  id="roomnums"
                           maxlength="12">
                </div>
                <div class="form-group " >
                    {{--<label>{{ trans('buy.pay_num')}}：</label>--}}
                    <label>建筑面积：</label>
                    <input type="text" class="form-control" readonly
                           value="{{$buy_info -> build_area}}"
                           onkeyup="value=value.replace(/[^\d.]/g,'')"
                           name="build_areas"  id="build_areas"
                           maxlength="12">
                </div>
                <div class="form-group " >
                    {{--<label>{{ trans('buy.pay_num')}}：</label>--}}
                    <label>单价：</label>
                    <input type="text" class="form-control" readonly

                           value="{{$buy_info -> price}}"
                           onkeyup="value=value.replace(/[^\d.]/g,'')"
                           name="prices"  id="prices"
                           maxlength="12">
                </div>
                <div class="form-group ">
                    {{--<label>{{ trans('buy.pay_num')}}：</label>--}}
                    <label>总价：</label>
                    <input type="text" class="form-control" readonly
                           value="{{$buy_info -> total}}"
                           onkeyup="value=value.replace(/[^\d.]/g,'')"
                           name="totals"  id="totals"
                           maxlength="12">
                </div>
                <div class="form-group">
                    {{--<label>{{ trans('buy.pay_num')}}：</label>--}}
                    <label>缴纳的定金：</label>
                    <input type="text" class="form-control" readonly
                           value="{{$buy_info -> pay_num}}"
                           onkeyup="value=value.replace(/[^\d.]/g,'')"
                           name="discounts"  id="discounts"
                           maxlength="12">
                </div>
                <input type="hidden" value="0" id="fanggmun">
                <div class="form-group">
                    {{--<label>{{ trans('buy.pay_num')}}：</label>--}}
                    <label>房屋共有人：</label><br>
                    <div id="fangwug">
                        @foreach($buy_info -> coownerinfo as $k => $v)
                            <div style="display:inline-block" >
                                <select name="relation" readonly class="form-control" style="width: 15%;float: left">
                                    <option value="0" @if($v -> relation == 0) selected @endif>配偶</option>
                                    <option value="1" @if($v -> relation == 1) selected @endif>儿子</option>
                                    <option value="2" @if($v -> relation == 2) selected @endif>女儿</option>
                                    <option value="3" @if($v -> relation == 3) selected @endif>父亲</option>
                                    <option value="4" @if($v -> relation == 4) selected @endif>母亲</option>
                                    <option value="5" @if($v -> relation == 5) selected @endif>亲戚</option>
                                </select>
                                <input type="text" class="form-control" style="width: 15%;float: left"
                                       value="{{$v -> realname}}" name="realname" placeholder="姓名" readonly
                                       maxlength="12">
                                <select name="sex" readonly class="form-control" style="width: 15%;float: left">
                                    <option value="0" @if($v -> sex == 0) selected @endif>先生</option>
                                    <option value="1" @if($v -> sex == 0) selected @endif>女士</option>
                                </select>
                                <input type="text" readonly class="layui-input form-control" style="width: 15%;float: left;height:34px"
                                       value="{{date('Y-m-d',$v -> birthday) }}"
                                       name="birthday" placeholder="生日" autocomplete="off" >
                                <input type="text" readonly class="form-control" style="width: 15%;float: left"
                                       value="{{$v ->idcard}}"
                                       name="idcard" placeholder="证件号码"  maxlength="18">
                                <input type="text" readonly class="form-control" style="width: 15%;float: left"
                                       name="mobile" placeholder="手机号" value="{{$v -> mobile}}"  maxlength="11">
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="form-group">
                    <label>{{ trans('buy.pay_type') }}：</label>
                    <select name="pay_type" id="pay_type" readonly class="form-control">
                        <option value="0" @if($buy_info ->pay_type == 0) selected @endif>一次性付款</option>
                        <option value="1" @if($buy_info ->pay_type == 1) selected @endif>按揭付款</option>
                    </select>
                </div>

                @if($buy_info -> pay_type == 0)

                    <div class="form-group" >
                        <label>总金额：</label>
                        <input type="text" class="form-control" readonly
                               value="{{$buy_info -> total_price}}"
                               onkeyup="value=value.replace(/[^\d.]/g,'')"
                               name="total_price" placeholder="请输入缴费金额"
                               maxlength="12">
                    </div>
                @else
                    <div class="form-group " >
                        <label>月供：</label>
                        <input type="text" class="form-control" readonly
                               onkeyup="value=value.replace(/[^\d.]/g,'')"
                               value="{{$buy_info -> month_pay}}"
                               name="total_price" placeholder="请输入缴费金额"
                               maxlength="12">

                        <label>年限：</label>
                        <input type="text" class="form-control" readonly
                               onkeyup="value=value.replace(/[^\d.]/g,'')"
                               value="{{$buy_info -> loan_term}}"
                               name="loan_term" placeholder="请输入缴费金额"
                               maxlength="12">
                        <label>总金额：</label>
                        <input type="text" class="form-control" readonly
                               onkeyup="value=value.replace(/[^\d.]/g,'')"
                               value="{{$buy_info -> total_price}}"
                               name="total_price" placeholder="请输入缴费金额"
                               maxlength="12">
                    </div>
                @endif

                <div class="form-group">
                    {{--<label>{{ trans('buy.pay_num')}}：</label>--}}
                    <label>签约方案：</label>
                    <input type="text" class="form-control" readonly
                           value="立刻签约"
                           name="name" placeholder="" id="names"
                           maxlength="12">
                </div>
                <div class="form-group">
                    <label>{{ trans('buy.remarks') }}：</label>
                    <textarea name="sign_remarks" id="sign_remarks" class="form-control" cols="30" rows="5" style="resize:none"></textarea>
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
            url : "{{URL('delaysig/store')}}",
            type : 'post' ,
            data : {
                buyid: "{{$buy_info -> buyid}}",
                cust_id : '{{$buy_info -> cust_id}}' ,
                homeid : '{{$buy_info -> homeid}}' ,
                sign_type : 0 ,
                signid:'{{$signid}}',
                sign_remarks : sign_remarks ,
                _token : "{{csrf_token()}}"
            } ,
            success : function ( data ) {
                console.log( data );

                if ( data.code == {{config('myconfig.signinfo.sign_store_success_code')}}) {
                    layer.msg( data.msg , { time : 2000 } , function () {
                        window.parent.location.reload();
                    } );
                }

                if ( data.code == {{config('myconfig.signinfo.sign_store_error_code')}}) {
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
