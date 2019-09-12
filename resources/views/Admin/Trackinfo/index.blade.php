@extends('Public.admin')
@push('include-css')
        <!-- bootstrap-fileinput css -->
<link rel="stylesheet" href="{{URL::asset('bower_components/bootstrap-fileinput/css/fileinput.css')}}">
<link rel="stylesheet" href="{{URL::asset('css/weekly.css')}}">
<link rel="stylesheet" href="{{URL::asset('bower_components/layui/dist/css/layui.css')}}">
        <style>
            .status{
                height: 30px;
                border : 1px solid #DD4B39;
                width: 200px;
                padding-left: 10px;
            }

            .total{
                padding-left: 20px;
            }
        </style>
@endpush

@section('content')

    <div class="box box-info">
        <div class="box-header with-border">
            <button type="button" class="btn btn-dropbox btn-sm" id="refresh"><i
                        class="fa fa-refresh"></i> {{ trans('memberinfo.refresh') }}</button

        </div>

        <form action="{{URL('trackinfo/40')}}" method="get">
            <label>{{ trans('sales.cust') }}：</label>
            <select name="hous_id"  class="status">
                <option value="">全部</option>
                @foreach($hous_id as $kay => $value)
                    <option value="{{$value -> hous_id}}" @if($hous_ids == $value -> hous_id) selected @endif> {{$value -> name}}</option>
                @endforeach
            </select>
            <button type='submit'  id="search" class="btn btn-sm {{config('myconfig.config.button_skin')}}">
                <i class="glyphicon glyphicon-search"></i>&nbsp;{{trans('sales.search')}}
            </button>
        </form>
        <div class="box-body">
            <div class="table-responsive">
                <table class="table no-margin">
                    <thead>
                    <tr>
                        <th width="130px">
                            <button type="button" class="btn btn-warning btn-xs" id="data_select" data-select-all="true"><i
                                        class="glyphicon glyphicon-ok"></i>{{ trans('memberinfo.allAlection') }}</button>
                        </th>

                        {{--客户姓名--}}
                        <th>{{ trans('trackinfo.cust_id') }}</th>
                        {{--负责的置业顾问--}}
                        <th>{{ trans('trackinfo.hous_id') }}</th>
                        {{--访问类型--}}
                        <th>{{ trans('trackinfo.track_type') }}</th>
                        {{--跟踪或来访内容--}}
                        <th>{{ trans('trackinfo.content') }}</th>
                        {{--跟踪来访时间--}}
                        <th>{{ trans('trackinfo.track_time') }}</th>
                        {{--跟踪来访创建时间--}}
                        <th>{{ trans('trackinfo.created_at') }}</th>
                        {{--操作--}}
                        <th>{{ trans('trackinfo.operating') }}</th>
                    </tr>
                    </tr>
                    </thead>
                    <tbody>
                   @foreach($trackinfo as $k=>$v)
                        <tr>
                            <td><input type="checkbox" class="i-checks" id="groupCheckbox" name="groupCheckbox[]"
                                       value="{{$v->trackid}}"
                                ></td>
                            <td>{{$v -> realname}}</td>
                            <td>{{ $v -> name}}</td>
                            <td>@if($v -> track_type==0){{trans('trackinfo.text5')}}@else{{trans('trackinfo.text6')}}@endif</td>
                            <td>{{ $v -> content}}</td>
                            <td>{{date('Y-m-d H:i',$v -> track_time)}}</td>
                            <td>{{date('Y-m-d H:i',$v -> created_at)}}</td>
                            <td>
                                <button type="button" value="{{$v->trackid}}" onclick="view({{$v->trackid}})"
                                        class="btn btn-warning btn-xs btn_edit" id="btn_edit"><i
                                            class="fa fa-edit"></i> {{trans('memberinfo.news_view')}}</button>
                                <button type="button" value="{{$v->trackid}}" onclick="edit({{$v->trackid}})"
                                        class="btn btn-warning btn-xs btn_edit" id="btn_edit"><i
                                            class="fa fa-edit"></i> {{trans('memberinfo.news_edits')}}</button>
                                <button type="button" value="{{$v->trackid}}" onclick="d({{$v->trackid}})"
                                        class="btn btn-warning btn-xs btn_delete"><i
                                            class="fa fa-trash"></i> {{trans('memberinfo.news_delete')}} </button>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.table-responsive -->
        </div>
        <!-- /.box-body -->
       <div class="box-footer clearfix">
            <a href="javascript:void(0)" class="btn btn-danger btn-xs pull-left select_all"><i
                        class="fa fa-trash"></i>{{ trans('memberinfo.select_all_delete') }}</a>
            <div class=" pull-right">{{$trackinfo -> links()}}</div>
            <input type="hidden" value="{{$trackinfo -> count()}}" id="page_count">
        </div>
    </div>
    @endsection
    @push('include-js')
            <!-- bootstrap-fileinput js -->
    <script src="{{URL::asset('bower_components/bootstrap-fileinput/js/fileinput.js')}}"></script>
    <script src="{{URL::asset('bower_components/bootstrap-fileinput/js/locales/zh.js')}}"></script>
    <script src="{{URL::asset('bower_components/layui/dist/layui.js')}}"></script>
    <script type="text/javascript">

        {{--$( document ).ready( function () {--}}
        //複選框樣式
        $( ".i-checks" ).iCheck( {
            checkboxClass : "{{config('myconfig.config.checkbox_skin')}}" ,
        } );
        //刷新按鈕
        $( '#refresh' ).click( function () {
            window.location.reload();
        } );


        //一键选择与取消
        var select_all_btn = 0;
        $( "#data_select" ).click( function () {
            if ( select_all_btn == 0 ) {
                $( "#data_select" ).html( "<i class='glyphicon glyphicon-remove'></i> {{ trans('permission.cancel') }}" );
                $( '.i-checks' ).each( function () {
                    $( this ).iCheck( 'check' );
                } );
                select_all_btn = 1;
            }
            else {
                $( "#data_select" ).html( "<i class='glyphicon glyphicon-ok'></i> {{ trans('permission.allAlection') }}" );
                $( '.i-checks' ).iCheck( 'uncheck' );
                select_all_btn = 0;
            }
        } );

        {{--//全选删除--}}
        $( '.select_all' ).click( function () {
            var page_count = $( '#page_count' ).val();
            var vote = [];
            for ( var i = 0 ; i < $( ".i-checks" ).length ; i++ ) {
                if ( $( ".i-checks" ).eq( i ).prop( "checked" ) ) {
                    vote.push( $( ".i-checks" ).eq( i ).val() )
                }
            }
            if ( vote.length == 0 ) {
                layer.msg( '{{trans('permission.delete_data')}}' , { time : 1000 } );
                return false;
            }

            //生成询问框
            layer.confirm( "{{trans('permission.is_delete_info')}}" , {
                btn : ["{{trans('permission.confirm')}}" , "{{trans('permission.cancel')}}"]
            } , function () {
                $.ajax( {
                    url : '{{URL('trackinfo/destroy_all')}}' ,
                    type : 'post' ,
                    data : {
                        'all_id' : vote,
                        '_token' : "{{csrf_token()}}"
                    } ,
                    success : function ( data ) {
                        console.log( data );
                        if ( data.code == {{config('myconfig.trackinfo.trackinfo_del_success_code')}} ) {
                            layer.msg( data.msg , { time : 2000 } , function () {
                                if ( page_count == vote.length ) {
                                    location.href = "{{URL('trackinfo/37')}}";
                                }
                                else {
                                    window.location.reload();
                                }
                            } );
                        }
                        else if ( data.code == {{config('myconfig.trackinfo.trackinfo_del_error_code')}} ) {
                            layer.msg( data.msg , { time : 2000 } );
                        }
                    } ,
                    error : function ( result ) {
                        // 由于返回422的错误状态码，所以会自动调用ajax的错误函数，不需要人为再手工判断
                        console.log( result );
                    }
                } )
            } , function () {
                layer.msg( "{{trans('permission.delete_cancel')}}" , {
                    time : 1000 , //20s后自动关闭
                } );
            } );
        } );


        {{--//添加--}}
        {{--function add(cust_id) {--}}
            {{--layer.open( {--}}
                {{--type : 2 ,--}}
                {{--title : '{{ trans('memberinfo.news_add') }}' ,--}}
                {{--moveType : 0 ,--}}
                {{--skin : 'layui-layer-demo' , //加上边框--}}
                {{--closeBtn : 1 ,--}}
                {{--area : ['50%' , '70%'] , //宽高--}}
                {{--shadeClose : false ,--}}
                {{--shade : 0.5 ,--}}
                {{--content : ["{{URL('trackinfo/showtrack')}}"+ "/" + cust_id] ,--}}
                {{--success : function ( layero , index ) {--}}
                    {{--$( ':focus' ).blur();--}}
                {{--}--}}
            {{--} );--}}
        {{--}--}}

        //删除信息
        function d( trackid ) {
            var page_count = $( '#page_count' ).val();
            layer.confirm( "{{trans('memberinfo.is_delete_info')}}" , {
                btn : ["{{trans('memberinfo.confirm')}}" , "{{trans('memberinfo.cancel')}}"] //按钮
            } , function () {
                $.post( "{{URL('trackinfo/del')}}" , { 'trackid' : trackid , '_token' : "{{csrf_token()}}" } ,
                        function ( data ) {
                            console.log( data );
                            if ( data.code == {{config('myconfig.trackinfo.trackinfo_del_error_code')}} ) {
                                layer.msg( data.msg , { time : 2000 } );
                            }
                            if ( data.code == {{config('myconfig.trackinfo.trackinfo_del_success_code')}} ) {
                                layer.msg( data.msg , { time : 1000 } , function () {
                                    if ( page_count == 1 ) {
                                        location.href = "{{URL('trackinfo/37')}}";
                                    }
                                    else {
                                        window.location.reload();
                                    }
                                } );
                            }
                        } );
            } , function () {
                layer.msg( "{{trans('memberinfo.delete_cancel')}}" , {
                    time : 1000 , //10秒鐘后自動關閉
                } );
            } );
        }

        //修改用户信息
        function edit( trackid ) {
            layer.open( {
                type : 2 ,
                title : '{{ trans('memberinfo.news_edits') }}' ,
                moveType : 0 ,
                skin : 'layui-layer-demo' , //加上边框
                closeBtn : 1 ,
                area : ['50%' , '70%'] , //宽高
                shadeClose : false ,
                shade : 0.5 ,
                content : ["{{URL('trackinfo/edit')}}" + "/" + trackid] ,
                success : function ( layero , index ) {
                    $( ':focus' ).blur();
                }
            } );
        }

        //查看详情
        function view( trackid ) {
            layer.open( {
                type : 2 ,
                title : '{{ trans('memberinfo.news_view') }}' ,
                moveType : 0 ,
                skin : 'layui-layer-demo' , //加上边框
                closeBtn : 1 ,
                area : ['50%' , '70%'] , //宽高
                shadeClose : false ,
                shade : 0.5 ,
                content : ["{{URL('trackinfo/view')}}" + "/" + trackid] ,
                success : function ( layero , index ) {
                    $( ':focus' ).blur();
                }
            } );
        }

    </script>
    @endpush
