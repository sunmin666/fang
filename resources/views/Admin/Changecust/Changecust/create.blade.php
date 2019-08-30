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
                    <label>{{ trans('changecust.cust_id') }}：</label>
                        <input type="text" class="form-control" name="realname"
                               onkeyup="value=value.replace(/[\d]/g,'') "
                               value="{{$name -> realname}}"
                               maxlength="15" readonly="readonly">
                        <input type="hidden" value="{{$name -> cust_id}}" id="cust_id">
                </div>
                <div class="form-group">
                    {{--老客户手机号--}}
                    <label>{{ trans('changecust.mobile') }}：</label>
                    <input type="text" class="form-control" name="mobile"
                           onkeyup="value=value.replace(/[\d]/g,'') "
                           value="{{$name -> mobile}}"
                           maxlength="15" readonly="readonly">
                </div>
                <div class="form-group">
                    {{--老客户身份证号--}}
                    <label>{{ trans('changecust.idcard') }}：</label>
                    <input type="text" class="form-control" name="mobile"
                           onkeyup="value=value.replace(/[\d]/g,'') "
                           value="{{$name -> idcard}}"
                           maxlength="15" readonly="readonly">
                </div>
                {{--新客户--}}
                <div class="form-group">
                    <label>{{ trans('changecust.new_cust') }}：</label>
                    <select name="new_cust" id="new_cust" class="form-control">
                        <option value=""> 请选择</option>
                        @foreach($newname as $k=>$v)
                            <option value="{{$v ->cust_id}}">{{$v -> realname}}</option>
                        @endforeach
                    </select>
                </div>
                {{--房子id--}}
                <div class="form-group">
                    {{--老客户身份证号--}}
                    <input type="hidden" value="{{$home -> homeid}}" id="mobile">
                </div>
                {{--楼号--}}
                <div class="form-group none" id="buildnumss">
                    {{--<label>{{ trans('buy.pay_num')}}：</label>--}}
                    <label>{{ trans('buy.buildnums') }}：</label>
                    <input type="text" class="form-control" readonly="readonly"
                           {{--onkeyup="value=value.replace(/[^\d.]/g,'')"--}}
                           name="buildnums" placeholder="请输入缴费金额" id="buildnums"
                           value="{{$home ->buildnums }}"
                           maxlength="12">
                </div>
                {{--单元--}}
                <div class="form-group none" id="unitnumss">
                    {{--<label>{{ trans('buy.pay_num')}}：</label>--}}
                    <label>{{ trans('buy.unitnums') }}：</label>
                    <input type="text" class="form-control" readonly="readonly"
                           {{--onkeyup="value=value.replace(/[^\d.]/g,'')"--}}
                           name="unitnums" placeholder="请输入缴费金额" id="unitnums"
                           value="{{$home ->unitnums }}"
                           maxlength="12">
                </div>
                {{--房号--}}
                <div class="form-group none" id="roomnumss">
                    {{--<label>{{ trans('buy.pay_num')}}：</label>--}}
                    <label>{{ trans('buy.roomnums') }}：</label>
                    <input type="text" class="form-control" readonly="readonly"
                           {{--onkeyup="value=value.replace(/[^\d.]/g,'')"--}}
                           name="roomnums" placeholder="请输入缴费金额" id="roomnums"
                           value="{{$home ->roomnums }}"
                           maxlength="12">
                </div>
                {{--更名备注--}}
                {{--跟踪来访内容--}}
                <div class="form-group">
                    <label>{{ trans('changecust.remarks') }}：</label>
					<textarea name="remarks" id="remarks"
                              cols="30" rows="5" class="form-control" placeholder="{{trans('trackinfo.text4')}}" style="resize:none"></textarea>
                </div>
            </form>
        </div>
    </div>
    <div class="add_button">
        <button type="button" class="btn btn-dropbox" id="store1">{{ trans('trackinfo.save') }}</button>
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
        var new_cust = $( '#new_cust' ).val();        //职业顾问
        var homeid = $( '#homeid' ).val();      //访问类型
        var remarks = $( '#remarks' ).val();                //来访内容

        var regEn = {{config('myconfig.config.regEn')}};
        var regCn = {{config('myconfig.config.regCn')}};

        if ( new_cust == '' || remarks == '' ) {
            layer.msg( '{{trans('trackinfo.text_content1')}}' , { time : 1235 } );
            $( "#store1" ).attr( 'disabled' , false );
            return false;
        }

        if(regEn.test( remarks )){
            layer.msg( '{{trans('changecust.text_content2')}}' , { time : 1235 } );
            $( "#store1" ).attr( 'disabled' , false );
            return false;
        }

        if(regCn.test( remarks )){
            layer.msg( '{{trans('changecust.text_content2')}}' , { time : 1235 } );
            $( "#store1" ).attr( 'disabled' , false );
            return false;
        }


        $.ajax( {
            url : "{{URL('changecust/store')}}" ,
            type : 'post' ,
            data : {
                cust_id : cust_id ,         //客户姓名
                new_cust : new_cust ,         //职业顾问
                homeid : homeid ,        //访问类型
                remarks : remarks ,           //来访内容
                _token : "{{csrf_token()}}"             //post提交token验证
            } ,
            success : function ( data ) {
                console.log( data );
                if ( data.code == {{config('myconfig.trackinfo.trackinfo_store_error_code')}}) {
                    layer.msg( data.msg , { time : 2151 } );
                    $( "#store1" ).attr( 'disabled' , false );
                    return false;
                }

                if ( data.code == {{config('myconfig.trackinfo.trackinfo_store_success_code')}}) {
                    layer.msg( data.msg , { time : 2000 } , function () {
                        window.parent.location.reload();
                    } );
                }

                if ( data.code == {{config('myconfig.home.roomnum_code')}}) {
                    layer.msg( data.msg , { time : 2000 } );
                    $( "#store1" ).attr( 'disabled' , false );
                    return false;
                }

            }
        } )
    } )
</script>
</html>
