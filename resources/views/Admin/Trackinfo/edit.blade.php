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
                    <label>{{ trans('trackinfo.cust_id') }}：</label>
                        <input type="text" class="form-control" name="realname"
                               onkeyup="value=value.replace(/[\d]/g,'') "
                               value=" {{$single->realname}}"
                               maxlength="15" readonly="readonly">
                        <input type="hidden" value="{{$single -> cust_id}}" id="cust_id">
                </div>
                {{--负责的职业顾问--}}
                <div class="form-group">
                    <label>{{ trans('trackinfo.hous_id') }}：</label>
                    <select name="comp_id" id="hous_id" class="form-control">
                        <option value="{{$single ->hous_id}} ">{{$single ->name}}</option>
                        @foreach($adviser as $kk=>$vv)
                            <option value="{{$vv->hous_id}}">{{$vv->name}}</option>
                        @endforeach
                    </select>
                </div>
                {{--访问类型--}}
                <div class="form-group">
                    <label>{{ trans('trackinfo.track_type') }}：</label>
                    <select name="comp_id" id="track_type" class="form-control">s
                        {{--<option>@if($single -> track_type==1)跟踪@else来访@endif</option>--}}
                        <option value="1" @if($single -> track_type==1) selected @endif>{{trans('trackinfo.text2')}}</option>
                        <option value="0" @if($single -> track_type==0) selected @endif>{{trans('trackinfo.text3')}}</option>
                    </select>
                </div>

                {{--跟踪来访内容--}}
                <div class="form-group">
                    <label>{{ trans('trackinfo.content') }}：</label>
					<textarea name="content" id="content"
                              cols="30" rows="5" class="form-control">{{$single -> content}}</textarea>
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
        var hous_id = $( '#hous_id' ).val();        //职业顾问
        var track_type = $( '#track_type' ).val();      //访问类型
        var content = $( '#content' ).val();                //来访内容

        var regEn = {{config('myconfig.config.regEn')}};
        var regCn = {{config('myconfig.config.regCn')}};

        if ( cust_id == '' || hous_id == '' || track_type == '' || content == ''
        ) {
            layer.msg( '{{trans('trackinfo.text_content1')}}' , { time : 1235 } );
            $( "#store1" ).attr( 'disabled' , false );
            return false;
        }

        if(regEn.test( content )){
            layer.msg( '{{trans('home.text_content2')}}' , { time : 1235 } );
            $( "#store1" ).attr( 'disabled' , false );
            return false;
        }

        if(regCn.test( content )){
            layer.msg( '{{trans('home.text_content2')}}' , { time : 1235 } );
            $( "#store1" ).attr( 'disabled' , false );
            return false;
        }


        $.ajax( {
            url : "{{URL('trackinfo/destroy')}}" ,
            type : 'post' ,
            data : {
                c_id:"{{$single -> trackid}}",
                cust_id : cust_id ,         //客户姓名
                hous_id : hous_id ,         //职业顾问
                track_type : track_type ,        //访问类型
                content : content ,           //来访内容
                _token : "{{csrf_token()}}"             //post提交token验证
            } ,
            success : function ( data ) {
                console.log( data );
                if ( data.code == {{config('myconfig.trackinfo.trackinfo_destroy_error_code')}}) {
                    layer.msg( data.msg , { time : 2151 } );
                    $( "#store1" ).attr( 'disabled' , false );
                    return false;
                }

                if ( data.code == {{config('myconfig.trackinfo.trackinfo_destroy_success_code')}}) {
                    layer.msg( data.msg , { time : 2000 } , function () {
                        window.parent.location.reload();
                    } );
                }
            }
        } )
    } )
</script>
</html>
