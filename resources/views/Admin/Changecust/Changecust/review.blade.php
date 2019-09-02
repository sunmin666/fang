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
                    <label>{{ trans('buy.review') }}：</label>
                    <select name="status" id="status" class="form-control">
                        <option value="">--{{ trans('buy.please_choose') }}--</option>
                        <option value="1">{{ trans('changecust.adopt') }}</option>
                        <option value="2">{{ trans('changecust.adopt_no') }}</option>
                    </select>
                </div>

                <div class="form-group">
                    <label>{{ trans('buy.review_bei') }}：</label>
                    <textarea name="verify_remarks" id="verify_remarks" class="form-control" cols="30" rows="5" style="resize:none"></textarea>
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

    {{--//添加到数据库--}}

    $( '#store1' ).click( function () {

        // $( "#store1" ).attr( 'disabled' , true );
        var status = $('#status').val();

        var verify_remarks = $('#verify_remarks').val();

        if(status == '' || verify_remarks == ''){
            layer.msg('{{ trans('changecust.username_text') }}',{time:1236});
            return false;
        }

        var regEn = {{config('myconfig.config.regEn')}};       //中文验证
        var regCn = {{config('myconfig.config.regCn')}};   //英文验证

        if ( regEn.test( verify_remarks ) ) {
            layer.msg( '{{trans('changecust.text_content2')}}' , { time : 1235 } );
            $( "#store1" ).attr( 'disabled' , false );
            return false;
        }
        if ( regCn.test( verify_remarks ) ) {
            layer.msg( '{{trans('changecust.text_content2')}}' , { time : 1235 } );
            $( "#store1" ).attr( 'disabled' , false );
            return false;
        }


        $.ajax( {
            url : "{{URL('changecust/update_review')}}" ,
            type : 'post' ,
            data : {
                chan_id:"{{$chan_id}}",
                buyid:"{{$buyid}}",
                new_cust:"{{$new_cust}}",
                status:status,
                verify_remarks:verify_remarks,
                _token : "{{csrf_token()}}"
            } ,
            success : function ( data ) {
                console.log( data );

                if ( data.code == {{config('myconfig.changecust.changecust_review_success_code')}}) {
                    layer.msg( data.msg , { time : 2000 } , function () {
                        window.parent.location.reload();
                    } );
                }

                if ( data.code == {{config('myconfig.changecust.changecust_review_error_code')}}) {
                    layer.msg( data.msg , { time : 2000 } );
                    $( "#store1" ).attr( 'disabled' , false );
                }
                if ( data.code == {{config('myconfig.changecust.changecust_review_successe_code')}}) {
                    layer.msg( data.msg , { time : 2000 },function(){
                        window.parent.location.reload();
                    } );

                }
            }
        } )
    } )
</script>
</html>
