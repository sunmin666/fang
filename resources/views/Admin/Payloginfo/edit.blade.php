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
                    <label>{{ trans('payloginfo.cust_id') }}：</label>

                        <input type="text" class="form-control" name="realname"
                               placeholder="请输客户姓名" id="realname"
                               onkeyup="value=value.replace(/^(0+)|[^\d]+/g,'') "
                               value="{{$payedit->realname}}"
                               maxlength="15" disabled="disabled">
                        <input type="hidden" value="{{$payedit -> cust_id}}" id="cust_id">

                </div>
                <div class="form-group">
                    {{--认购编号--}}
                    <label>{{ trans('payloginfo.subscription_num') }}：</label>

                    <input type="text" class="form-control" name="realname"
                           id="subscription_num"
                           onkeyup="value=value.replace(/^(0+)|[^\d]+/g,'') "
                           value="{{$payedit->subscription_num}}"
                           maxlength="15" disabled="disabled" >
                </div>
                <div class="form-group">
                    <label>{{ trans('payloginfo.type') }}：</label>
                    <select name="pay_type" id="pay_type" class="form-control" disabled="disabled">
                        <option value="1" @if($payedit ->type == 1) selected @endif >定金</option>
                        <option value="2" @if($payedit -> type == 2) selected @endif>一次性付款</option>
                        <option value="3" @if($payedit -> type == 3) selected @endif>按揭付款</option>
                    </select>
                </div>
                {{--缴费金额--}}
                <div class="form-group">
                    <label>{{ trans('payloginfo.money') }}：</label>
                    <input type="text" class="form-control" name="money"
                           placeholder="请输缴费金额" id="money"
                           onkeyup="value=value.replace(/[^\d.]/g,'')"
                           value="{{$payedit -> money}}"
                           maxlength="15">
                </div>
                {{--缴费备注--}}
                <div class="form-group">
                    <label>{{ trans('payloginfo.remarks') }}：</label>
					<textarea name="remarks" id="remarks"
                              cols="30" rows="5" class="form-control" style="resize:none;" placeholder="请输入备注">{{$payedit ->remarks}}</textarea>
                </div>
            </form>
        </div>
    </div>
    <div class="add_button">
        <button type="button" class="btn btn-dropbox" id="store1">{{ trans('payloginfo.save') }}</button>
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
</script>
<script>



    //添加到数据库
    $( '#store1' ).click( function () {
        var cust_id = $( '#cust_id' ).val();        //客户姓名
        var money = $( '#money' ).val();        //缴费金额
        var remarks = $( '#remarks' ).val();      //缴费备注

        var regEn = {{config('myconfig.config.regEn')}};
        var regCn = {{config('myconfig.config.regCn')}};

        if ( cust_id == '' || money == '' || remarks == ''
        ) {
            layer.msg( '{{trans('payloginfo.text_content1')}}' , { time : 1235 } );
            $( "#store1" ).attr( 'disabled' , false );
            return false;
        }

        if ( regEn.test( remarks ) ) {
            layer.msg( '{{trans('payloginfo.text_content2')}}' , { time : 1235 } );
            $( "#store1" ).attr( 'disabled' , false );
            return false;
        }

        if ( regCn.test( remarks ) ) {
            layer.msg( '{{trans('payloginfo.text_content2')}}' , { time : 1235 } );
            $( "#store1" ).attr( 'disabled' , false );
            return false;
        }


        $.ajax( {
            url : "{{URL('payloginfo/destroy')}}" ,
            type : 'post' ,
            data : {
                payl_id : "{{$payedit ->payl_id}}",
                cust_id : cust_id ,         //客户姓名
                money : money ,         //缴费金额
                remarks : remarks ,        //缴费备注
                _token : "{{csrf_token()}}"             //post提交token验证
            } ,
            success : function ( data ) {
                console.log(data);
                if (data.code == {{config('myconfig.payloginfo.payloginfo_destroy_error_code')}}) {
                    layer.msg(data.msg, {time: 2151});
                    $("#store1").attr('disabled', false);
                    return false;
                }

                if (data.code == {{config('myconfig.payloginfo.payloginfo_destroy_success_code')}}) {
                    layer.msg(data.msg, {time: 2000}, function () {
                        window.parent.location.reload();
                    });
                }
                if ( data.code == {{config('myconfig.payloginfo.remarks_code')}}) {
                    layer.msg( data.msg , { time : 2000 } );
                    $( "#store1" ).attr( 'disabled' , false );
                }
            }
        } )
    } )
</script>
</html>
