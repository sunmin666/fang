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
                {{--客户--}}
                {{--<div class="form-group">--}}
                    {{--<label>{{ trans('delegate.cust') }}：</label>--}}
                    {{--<select name="parent_field_id" id="cust" class="form-control">--}}
                        {{--<option value=""> {{ trans('cultrue.please_choice') }} </option>--}}
                        {{--@foreach($cust as $k => $v)--}}
                            {{--<option value="{{$v -> cust_id}}" @if($delegate -> cust_id ==$v -> cust_id) selected @endif>{{$v ->realname }}</option>--}}
                        {{--@endforeach--}}
                    {{--</select>--}}
                {{--</div>--}}

                {{--职业顾问--}}
                <div class="form-group">
                    <label>{{ trans('delegate.hous') }}：</label>
                    <select name="parent_field_id" id="hous" class="form-control">
                        <option value=""> {{ trans('cultrue.please_choice') }} </option>
                        @foreach($hous as $k => $v)
                            <option value="{{$v -> hous_id}}" @if($delegate -> hous_id ==$v -> hous_id) selected @endif>{{$v ->name }}</option>
                        @endforeach
                    </select>
                </div>

                {{--备注内容--}}
                <div class="form-group">
                    <label>{{ trans('delegate.remarks') }}：</label>
					<textarea name="content" id="remarks"
                              cols="30" rows="5" class="form-control" style=" resize: none;" placeholder="{{trans('delegate.text4')}}" >{{$delegate -> remarks}}</textarea>
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

    //添加到数据库

    $( '#store1' ).click( function () {
        var hous = $( '#hous' ).val();        //职业顾问   *
//        var cust = $( '#cust' ).val();    //客户   *
        var remarks = $('#remarks').val();  //备注
        if ( hous== '' || remarks == '') {
            layer.msg( '{{trans('delegate.text_content1')}}' , { time : 1235 } );
            $( "#store1" ).attr( 'disabled' , false );
            return false;
        }

        var regEn = {{config('myconfig.config.regEn')}};
        var regCn = {{config('myconfig.config.regCn')}};

        if(regEn.test( remarks )){
            layer.msg( '{{trans('delegate.text_content2')}}' , { time : 1235 } );
            $( "#store1" ).attr( 'disabled' , false );
            return false;
        }

        if(regCn.test( remarks )){
            layer.msg( '{{trans('delegate.text_content2')}}' , { time : 1235 } );
            $( "#store1" ).attr( 'disabled' , false );
            return false;
        }

        $.ajax( {
            url : "{{URL('delegate/destroy')}}" ,
            type : 'post' ,
            data : {
                gate_id :"{{$delegate -> gate_id}}",
                hous_id : hous ,         //职业顾问
//                cust_id : cust ,         //客户
                remarks: remarks ,           //备注
                _token : "{{csrf_token()}}"             //post提交token验证
            } ,
            success : function ( data ) {
                //console.log(data);
                if ( data.code == {{config('myconfig.delegate.delegate_destroy_error_code')}}) {
                    layer.msg( data.msg , { time : 2151 } );
                    $( "#store1" ).attr( 'disabled' , false );
                    return false;
                }

                if ( data.code == {{config('myconfig.delegate.delegate_destroy_success_code')}}) {
                    layer.msg( data.msg , { time : 2000 } , function () {
                        window.parent.location.reload();
                    } );
                }

                if ( data.code == {{config('myconfig.delegate.content_code')}}) {
                    layer.msg( data.msg , { time : 2000 } );
                    $( "#store1" ).attr( 'disabled' , false );
                    return false;
                }
            }
        } )
    } )
</script>
</html>
