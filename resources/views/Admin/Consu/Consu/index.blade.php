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


			<div class="box-tools pull-right">
				<button type="button" class="btn btn-danger btn-sm weekly-day" id="news_day"
				><i class="fa fa-plus"></i>
					{{ trans('memberinfo.news_add') }}
				</button>
			</div>

		</div>
		{{--<div id="status_search">--}}
		{{--<form action="{{route('weekly.status')}}" method="post">--}}
		{{--{{ csrf_field() }}--}}
		{{--<input type="text" id="aaa" name="time" autocomplete="off" >--}}
		{{--<button type='submit' id="search" class="btn btn-sm {{config('myconfig.config.button_skin')}}">--}}
		{{--<i class="glyphicon glyphicon-search"></i>&nbsp;{{trans('weekly.weekly_find')}}--}}
		{{--</button>--}}
		{{--</form>--}}
		{{--</div>--}}

		<div class="box-body">
			<div class="table-responsive">
				<table class="table no-margin">
					<thead>
					<tr>
						<th width="130px">
							<button type="button" class="btn btn-warning btn-xs" id="data_select" data-select-all="true"><i
									class="glyphicon glyphicon-ok"></i>{{ trans('memberinfo.allAlection') }}</button>
						</th>
						{{--顾问账号--}}
						<th>{{ trans('consu.mobile') }}</th>
						{{--顾问真实姓名--}}
						<th>{{ trans('consu.name') }}</th>
						{{--邮箱--}}
						<th>{{ trans('consu.sex') }}</th>
						{{--性别--}}
						<th>{{ trans('consu.email') }}</th>
						{{--手机号--}}
						<th>{{ trans('consu.role') }}</th>
						{{--状态--}}
						<th>{{trans('consu.permin')}}</th>
						{{--<th>{{trans('consu.proj_id')}}</th>--}}

						{{--录入时间--}}
						{{--<th>{{ trans('consu.status') }}</th>--}}
						{{--登录次数--}}
						<th>{{ trans('consu.enjoy') }}</th>
						{{--登录次数--}}
						<th>{{ trans('consu.login_count') }}</th>
						{{--登录次数--}}
						<th>{{ trans('consu.created_at') }}</th>
						{{--操作--}}
						<th>{{trans('consu.updated_at')}}</th>
						<th>{{ trans('consu.operating') }}</th>
					</tr>
					</thead>
					<tbody>
					@foreach($consu as $value)
						<tr>
							<td><input type="checkbox" class="i-checks" id="groupCheckbox" name="groupCheckbox[]"
							           value="{{$value->hous_id}}"
								></td>
							<td>{{ $value -> mobile}}</td>
							<td>{{$value -> name}}</td>
							<td>@if($value -> sex == 1) {{ trans('consu.man') }} @else {{ trans('consu.maam') }} @endif</td>
							<td>{{$value -> email}}</td>
							<td>{{$value-> role_name}}</td>
							<td>{{$value-> perm_name}}</td>
							<td>@if($value-> enjoys == '') {{ trans('consu.no_discount') }}@else {{$value-> enjoys}}@endif</td>
							<td>@if($value -> login_count == '') 0 @else {{$value -> login_count}} @endif</td>
							<td>{{date('Y-m-d H:i',$value -> created_at)}}</td>
							<td>@if($value -> updated_at == ''){{ trans('consu.no_update_ime') }}@else{{date('Y-m-d H:i',$value -> updated_at)}}@endif</td>

							<td>
								<button type="button" value="{{$value -> hous_id}}"
								        onclick="status({{$value -> hous_id}},{{$value -> status}})"
								        class="btn @if($value -> status == 1) btn-danger @else btn-success @endif btn-xs btn_delete"><i
										class="fa fa-trash"></i>
									@if($value -> status == 1)
										{{trans('memberinfo.news_disable')}}
									@elseif($value -> status == 0)
										{{trans('memberinfo.news_enable')}}
									@endif
								</button>
								<button type="button" value="{{$value -> hous_id}}" onclick="view({{$value -> hous_id}})"
								        class="btn btn-warning btn-xs btn_edit" id="btn_edit"><i
										class="fa fa-edit"></i> {{trans('memberinfo.news_view')}}</button>
								<button type="button" value="{{$value -> hous_id}}" onclick="edit({{$value -> hous_id}})"
								        class="btn btn-warning btn-xs btn_edit" id="btn_edit"><i
										class="fa fa-edit"></i> {{trans('memberinfo.news_edits')}}</button>
								<button type="button" value="{{$value -> hous_id}}" onclick="d({{$value -> hous_id}})"
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
			<div class=" pull-right">{{$consu -> links()}}</div>
			<input type="hidden" value="{{$consu -> count()}}" id="page_count">
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

		//全选删除
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
					url : '{{URL('consu/destroy_all')}}' ,
					type : 'post' ,
					data : {
						'hous_id' : vote ,
						'_token' : "{{csrf_token()}}"
					} ,
					success : function ( data ) {
						console.log( data );
						if ( data.code == {{config('myconfig.consu.delete_hous_success_code')}} ) {
							layer.msg( data.msg , { time : 2000 } , function () {
								if ( page_count == vote.length ) {
									location.href = "{{URL('consultant/21')}}";
								}
								else {
									window.location.reload();
								}
							} );
						}
						else if ( data.code == {{config('myconfig.consu.delete_hous_error_code')}} ) {
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


		//添加
		$( '#news_day' ).click( function () {
			layer.open( {
				type : 2 ,
				title : '{{ trans('memberinfo.news_add') }}' ,
				moveType : 0 ,
				skin : 'layui-layer-demo' , //加上边框
				closeBtn : 1 ,
				area : ['50%' , '90%'] , //宽高
				shadeClose : false ,
				shade : 0.5 ,
				content : ["{{URL('consu/create')}}"] ,
				success : function ( layero , index ) {
					$( ':focus' ).blur();
				}
			} );
		} );

		//删除信息
		function d( hous_id ) {
			var page_count = $( '#page_count' ).val();
			layer.confirm( "{{trans('memberinfo.is_delete_info')}}" , {
				btn : ["{{trans('memberinfo.confirm')}}" , "{{trans('memberinfo.cancel')}}"] //按钮
			} , function () {
				$.post( "{{URL('consu/destroy')}}" , { 'hous_id' : hous_id , '_token' : "{{csrf_token()}}" } ,
					function ( data ) {
						console.log( data );
						if ( data.code == {{config('myconfig.consu.delete_hous_error_code')}} ) {
							layer.msg( data.msg , { time : 2000 } );
						}
						if ( data.code == {{config('myconfig.consu.delete_hous_success_code')}} ) {
							layer.msg( data.msg , { time : 1000 } , function () {
								if ( page_count == 1 ) {
									location.href = "{{URL('consultant/21')}}";
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
		function edit( hous_id ) {
			layer.open( {
				type : 2 ,
				title : '{{ trans('memberinfo.news_edits') }}' ,
				moveType : 0 ,
				skin : 'layui-layer-demo' , //加上边框
				closeBtn : 1 ,
				area : ['50%' , '70%'] , //宽高
				shadeClose : false ,
				shade : 0.5 ,
				content : ["{{URL('consu/edit')}}" + "/" + hous_id] ,
				success : function ( layero , index ) {
					$( ':focus' ).blur();
				}
			} );
		}

		//查看详情
		function view( hous_id ) {
			layer.open( {
				type : 2 ,
				title : '{{ trans('memberinfo.news_view') }}' ,
				moveType : 0 ,
				skin : 'layui-layer-demo' , //加上边框
				closeBtn : 1 ,
				area : ['50%' , '70%'] , //宽高
				shadeClose : false ,
				shade : 0.5 ,
				content : ["{{URL('consu/view')}}" + "/" + hous_id] ,
				success : function ( layero , index ) {
					$( ':focus' ).blur();
				}
			} );
		}

		//禁用启用
		function status( hous_id , status ) {
			layer.confirm( "{{trans('memberinfo.is_status_info')}}" , {
				btn : ["{{trans('memberinfo.confirm')}}" , "{{trans('memberinfo.cancel')}}"] //按钮
			} , function () {
				$.post( "{{URL('consu/status')}}" , {
						hous_id : hous_id ,
						status : status ,
						_token : "{{csrf_token()}}"
					} ,
					function ( data ) {
						console.log( data );
						if ( data.code == {{config('myconfig.member.memberinfo_status_error_code')}} ) {
							layer.msg( data.msg , { time : 2000 } );
						}
						else if ( data.code == {{config('myconfig.member.memberinfo_status_success_code')}} ) {
							layer.msg( data.msg , { time : 1000 } , function () {
								window.location.reload();
							} );
						}
					} );
			} , function () {
				layer.msg( "{{trans('memberinfo.delete_cancel')}}" , {
					time : 1000 , //10秒鐘后自動關閉
				} );
			} );
		}
	</script>
@endpush
