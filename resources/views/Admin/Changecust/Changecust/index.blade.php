@extends('Public.admin')
@push('include-css')
        <!-- bootstrap-fileinput css -->
<link rel="stylesheet" href="{{URL::asset('bower_components/bootstrap-fileinput/css/fileinput.css')}}">
<link rel="stylesheet" href="{{URL::asset('css/weekly.css')}}">
<link rel="stylesheet" href="{{URL::asset('bower_components/layui/dist/css/layui.css')}}">
@endpush

@section('content')

    <div class="box box-info">
        <div class="box-header with-border">
            <button type="button" class="btn btn-dropbox btn-sm" id="refresh"><i
                        class="fa fa-refresh"></i> {{ trans('memberinfo.refresh') }}</button>


            {{--<div class="box-tools pull-right">--}}
            {{--@foreach($trackinfo as $k=>$v)--}}
            {{--<button type="button" value="{{$v->cust_id}}" onclick="add({{$v->cust_id}})" class="btn btn-danger btn-sm weekly-day" id="news_day"--}}
            {{--><i class="fa fa-plus"></i>--}}
            {{--{{ trans('memberinfo.news_add') }}--}}
            {{--</button>--}}
            {{--@endforeach--}}
            {{--</div>--}}

        </div>


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
                        <th>{{ trans('changecust.cust_id') }}</th>
                        {{--新客户--}}
                        <th>{{ trans('changecust.new_cust') }}</th>
                        {{--老客户手机号--}}
                        {{--<th>{{ trans('changecust.mobile') }}</th>--}}
                        {{--老客户身份证号--}}
                        {{--<th>{{ trans('changecust.idcard') }}</th>--}}
                        {{--楼号--}}
                        <th>{{ trans('changecust.buildnums') }}</th>
                        {{--单元--}}
                        <th>{{ trans('changecust.unitnums') }}</th>
                        {{--房号--}}
                        <th>{{ trans('changecust.roomnums') }}</th>
                        {{--更名备注--}}
                        <th>{{ trans('changecust.remarks') }}</th>
                        {{--销售经理审核状态--}}
                        <th>{{ trans('changecust.mnager_status') }}</th>
                        {{--销售经理审核时间--}}
                        <th>{{ trans('changecust.mnager_status_time') }}</th>
                        {{--销售经理审核备注--}}
                        <th>{{ trans('changecust.adopt_verify_remarks') }}</th>
                        {{--财务审核状态--}}
                        {{--<th>{{ trans('changecust.audit_status') }}</th>--}}
                        {{--财务时间--}}
                        {{--<th>{{ trans('changecust.audit_status_time') }}</th>--}}
                        {{--操作--}}
                        <th>{{ trans('changecust.operating') }}</th>
                    </tr>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($changecust as $k=>$v)
                        <tr>
                            <td><input type="checkbox" class="i-checks" id="groupCheckbox" name="groupCheckbox[]"
                                       value="{{$v->chan_id}}"
                                ></td>
                            <td>{{$v -> name}}</td>
                            <td>{{ $v -> newname}}</td>
                            <td>{{ $v -> buildnums}}</td>
                            <td>{{ $v -> unitnums}}</td>
                            <td>{{$v -> roomnums}}</td>
                            <td>{{$v -> remarks}}</td>
                            <td>@if($v->status == '')
                                    未审核
                                @elseif($v->status == 1)
                                    审核已通过
                                @else
                                    审核未通过
                                @endif
                            </td>
                            <td>@if($v->verifytime == '')
                                    未审核
                               @else
                                    {{date('Y-m-d H:i:s',$v -> verifytime)}}
                                @endif
                            </td>
                            <td>@if($v->verify_remarks == '')
                                    未审核
                                @else
                                    {{$v -> verify_remarks}}
                                @endif
                            </td>
                            <td>
                                {{--经理审核按钮--}}
                                @if($v->status == '')
                                <button type="button" value="{{$v->chan_id}}" onclick="mnager({{$v->chan_id}},{{$v -> new_cust}},{{$v -> buyid}})"
                                        class="btn btn-warning btn-xs btn_edit" id="btn_edit"><i
                                            class="fa fa-edit"></i> {{trans('changecust.mnager')}}</button>
                                @endif
                                <button type="button" value="{{$v->chan_id}}" onclick="view({{$v->chan_id}})"
                                        class="btn btn-warning btn-xs btn_edit" id="btn_edit"><i
                                            class="fa fa-edit"></i> {{trans('memberinfo.news_view')}}</button>
                                <button type="button" value="{{$v->chan_id}}" onclick="edit({{$v->chan_id}})"
                                        class="btn btn-warning btn-xs btn_edit" id="btn_edit"><i
                                            class="fa fa-edit"></i> {{trans('memberinfo.news_edits')}}</button>
                                <button type="button" value="{{$v->chan_id}}" onclick="d({{$v->chan_id}})"
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
            <div class=" pull-right">{{$changecust -> links()}}</div>
            <input type="hidden" value="{{$changecust -> count()}}" id="page_count">
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
                    url : '{{URL('changecust/destroy_all')}}' ,
                    type : 'post' ,
                    data : {
                        'all_id' : vote,
                        '_token' : "{{csrf_token()}}"
                    } ,
                    success : function ( data ) {
                        console.log( data );
                        if ( data.code == {{config('myconfig.changecust.changecust_del_success_code')}} ) {
                            layer.msg( data.msg , { time : 2000 } , function () {
                                if ( page_count == vote.length ) {
                                    location.href = "{{URL('changecust/48')}}";
                                }
                                else {
                                    window.location.reload();
                                }
                            } );
                        }
                        else if ( data.code == {{config('myconfig.changecust.changecust_del_error_code')}} ) {
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
        function d( chan_id ) {
            var page_count = $( '#page_count' ).val();
            layer.confirm( "{{trans('memberinfo.is_delete_info')}}" , {
                btn : ["{{trans('memberinfo.confirm')}}" , "{{trans('memberinfo.cancel')}}"] //按钮
            } , function () {
                $.post( "{{URL('changecust/del')}}" , { 'chan_id' : chan_id , '_token' : "{{csrf_token()}}" } ,
                        function ( data ) {
                            console.log( data );
                            if ( data.code == {{config('myconfig.changecust.changecust_del_error_code')}} ) {
                                layer.msg( data.msg , { time : 2000 } );
                            }
                            if ( data.code == {{config('myconfig.changecust.changecust_del_success_code')}} ) {
                                layer.msg( data.msg , { time : 1000 } , function () {
                                    if ( page_count == 1 ) {
                                        location.href = "{{URL('changecust/48')}}";
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
        function edit( chan_id ) {
            layer.open( {
                type : 2 ,
                title : '{{ trans('memberinfo.news_edits') }}' ,
                moveType : 0 ,
                skin : 'layui-layer-demo' , //加上边框
                closeBtn : 1 ,
                area : ['50%' , '70%'] , //宽高
                shadeClose : false ,
                shade : 0.5 ,
                content : ["{{URL('changecust/edit')}}" + "/" + chan_id] ,
                success : function ( layero , index ) {
                    $( ':focus' ).blur();
                }
            } );
        }

        //查看详情
        function view( chan_id ) {
            layer.open( {
                type : 2 ,
                title : '{{ trans('memberinfo.news_view') }}' ,
                moveType : 0 ,
                skin : 'layui-layer-demo' , //加上边框
                closeBtn : 1 ,
                area : ['50%' , '70%'] , //宽高
                shadeClose : false ,
                shade : 0.5 ,
                content : ["{{URL('changecust/view')}}" + "/" + chan_id] ,
                success : function ( layero , index ) {
                    $( ':focus' ).blur();
                }
            } );
        }

        //经理审核
        function mnager(chan_id,new_cust,buyid){
            layer.open( {
                type : 2 ,
                title : '{{ trans('memberinfo.news_view') }}' ,
                moveType : 0 ,
                skin : 'layui-layer-demo' , //加上边框
                closeBtn : 1 ,
                area : ['50%' , '70%'] , //宽高
                shadeClose : false ,
                shade : 0.5 ,
                content : ["{{URL('changecust/review')}}" + "/" + chan_id + "/" + new_cust + "/" + buyid] ,
                success : function ( layero , index ) {
                    $( ':focus' ).blur();
                }
            } );
        }
    </script>
    @endpush
