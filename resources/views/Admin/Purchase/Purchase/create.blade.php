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

                <label>{{ trans('purchase.cust_id') }}：</label>
                @foreach($name as $k=>$v)
                    <input type="text" class="form-control" name="realname"
                           placeholder="请输客户姓名" id="realname"
                           onkeyup="value=value.replace(/^(0+)|[^\d]+/g,'') "
                           value="{{$v->realname}}"
                           maxlength="15" readonly="readonly">
                    <input type="hidden" value="{{$v -> cust_id}}" id="cust_id">
                @endforeach

                <div class="form-group">
                    <label>{{ trans('purchase.type') }}：</label>
                    <select name="pay_type" id="pay_type" class="form-control">
                        <option value="">--请选择--</option>
                        <option value="0">一次性付款</option>
                        <option value="1">按揭付款</option>
                    </select>
                </div>

                <div id="total_price" class="form-group none" >
                    <label>{{ trans('purchase.once_total') }}：</label>
                    <input type="text" class="form-control"
                           onkeyup="value=value.replace(/[^\d.]/g,'')"
                           name="total_price" placeholder="请输入缴费金额" id="total_prices"
                           maxlength="12">
                </div>

                <div id="month_pay" class="form-group none" >
                    <label>{{ trans('purchase.years') }}：</label>
                    <input type="text" class="form-control"
                           onkeyup="value=value.replace(/[^\d.]/g,'')"
                           name="total_price" placeholder="请输入缴费金额" id="month_pays"
                           maxlength="12">
                    <label>{{ trans('purchase.month_price') }}：</label>
                    <input type="text" class="form-control"
                           onkeyup="value=value.replace(/[^\d.]/g,'')"
                           name="loan_term" placeholder="请输入缴费金额" id="loan_term"
                           maxlength="12">
                    <label>{{ trans('purchase.month_total') }}：</label>
                    <input type="text" class="form-control"
                           onkeyup="value=value.replace(/[^\d.]/g,'')"
                           name="total_price" placeholder="请输入缴费金额" id="total_pricess"
                           maxlength="12">
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

    //选择哪种缴费方式
    $( '#pay_type' ).change( function () {
        var cc = $( this ).val();
        if ( cc == 0 ) {
                $( '#total_price' ).removeClass( 'none' );
                $( '#month_pay' ).addClass( 'none' );
            }
        else{

                $( '#month_pay' ).removeClass( 'none' );
                $( '#total_price' ).addClass( 'none' );
            }
    } );
</script>
<script>

    //添加到数据库
    $( '#store1' ).click( function () {
        var cust_id = $( '#cust_id' ).val();        //客户姓名
        var pay_type = $( '#pay_type' ).val();        //缴费方案
        var total_prices = $( '#total_prices' ).val();      //一次性总金额
        var month_pays = $( '#month_pays' ).val();                //年限
        var loan_term = $( '#loan_term' ).val();                //月供
        var total_pricess = $( '#total_pricess' ).val();                //按揭总金额

        if ( cust_id == '') {
            layer.msg( '{{trans('purchase.username_text')}}' , { time : 1235 } );
            $( "#store1" ).attr( 'disabled' , false );
            return false;
        }
        if ( pay_type == 0 && total_prices=='') {
            layer.msg( '{{trans('purchase.once_total_text')}}' , { time : 1235 } );
            $( "#store1" ).attr( 'disabled' , false );
            return false;
        }

        if ( pay_type == 1) {
            if(month_pays==''|| loan_term == '' || total_pricess ==''){
                layer.msg( '{{trans('purchase.content_text')}}' , { time : 1235 } );
                $( "#store1" ).attr( 'disabled' , false );
                return false;
            }
         }

        $.ajax( {
            url : "{{URL('purchase/store')}}" ,
            type : 'post' ,
            data : {
                cust_id : cust_id ,         //客户姓名
                type : pay_type ,          //缴费方案
                once_total : total_prices ,       //一次性总金额
                years : month_pays ,           //年限
                month_price : loan_term ,      //月供
                month_total : total_pricess ,       //按揭总金额
                _token : "{{csrf_token()}}"             //post提交token验证
            } ,
            success : function ( data ) {
                console.log( data );
                if ( data.code == {{config('myconfig.purchase.purchase_store_error_code')}}) {
                    layer.msg( data.msg , { time : 2151 } );
                    $( "#store1" ).attr( 'disabled' , false );
                    return false;
                }

                if ( data.code == {{config('myconfig.purchase.purchase_store_success_code')}}) {
                    layer.msg( data.msg , { time : 2000 } , function () {
                        window.parent.location.reload();
                    } );
                }

            }
        } )
    } )
</script>
</html>
