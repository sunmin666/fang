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
					{{--<i class="fa fa-fw fa-sort"></i>--}}
					<tr>
						<th width="130px">
							<button type="button" class="btn btn-warning btn-xs" id="data_select" data-select-all="true"><i
									class="glyphicon glyphicon-ok"></i>{{ trans('memberinfo.allAlection') }}</button>
						</th>
						<th>{{ trans('memberinfo.account') }}</th>
						<th>{{ trans('memberinfo.username') }}</th>
						<th>{{ trans('memberinfo.email') }}</th>
						<th>{{ trans('memberinfo.sex') }}</th>
						<th>{{ trans('memberinfo.mobile') }}</th>
						<th>{{ trans('memberinfo.status') }}</th>
						<th>{{ trans('memberinfo.character') }}</th>
						<th>{{ trans('memberinfo.add_time') }}</th>
						<th>{{ trans('memberinfo.operating') }}</th>
					</tr>
					</thead>
					<tbody>
					@foreach($member as $value)
						<tr>
							<td><input type="checkbox" class="i-checks" id="groupCheckbox" name="groupCheckbox[]"
							           value="{{$value->memberid}}"
								></td>
							<td><span class="label label-danger">{{ $value -> account}}</span></td>
							<td>{{$value -> username}}</td>
							<td>{{$value -> email}}</td>
							<td>@if($value -> sex == 1)男@elseif($value -> sex == 2)女@endif</td>
							<td>{{$value -> mobile}}</td>
							<td>@if($value -> status == 0)禁用@elseif($value -> status == 1)正常@endif</td>

							<td>
								{{$value -> ch_nsme}}
							</td>
							<td>{{date('Y-m-d H:i',$value -> created_at)}}</td>
							<td>
								<button type="button" value="{{$value -> memberid}}" onclick="edit({{$value -> memberid}})" class="btn btn-warning btn-xs btn_edit" id="btn_edit"><i
										class="fa fa-edit"></i> {{trans('memberinfo.news_edits')}}</button>
								<button type="button" value="{{$value -> memberid}}"
								        onclick="d({{$value -> memberid}})"
								        class="btn btn-warning btn-xs btn_delete"><i
										class="fa fa-trash"></i> {{trans('memberinfo.news_delete')}} </button>
								<button type="button" value="{{$value -> memberid}}"
								        onclick="status({{$value -> memberid}},{{$value -> status}})"
								        class="btn btn-warning btn-xs btn_delete"><i
										class="fa fa-trash"></i>
										@if($value -> status == 1)
									{{trans('memberinfo.news_disable')}}
										@elseif($value -> status == 0)
										{{trans('memberinfo.news_enable')}}
										@endif
								</button>
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
			<div class=" pull-right">{{$member -> links()}}</div>
			<input type="hidden" value="{{$member -> count()}}" id="page_count">
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

			{{--//一键选择与取消--}}
			var select_all_btn = 0;
			$( "#data_select" ).click( function () {
				if ( select_all_btn == 0 ) {
					$( "#data_select" ).html( "<i class='glyphicon glyphicon-remove'></i> {{ trans('memberinfo.cancel') }}" );
					$( '.i-checks' ).each( function () {
						$( this ).iCheck( 'check' );
					} );
					select_all_btn = 1;
				}
				else {
					$( "#data_select" ).html( "<i class='glyphicon glyphicon-ok'></i> {{ trans('memberinfo.allAlection') }}" );
					$( '.i-checks' ).iCheck( 'uncheck' );
					select_all_btn = 0;
				}
			} );

			//全选删除
			$( '.select_all' ).click( function () {
				var page_count = $('#page_count').val();
				var vote = [];
				for ( var i = 0 ; i < $( ".i-checks" ).length ; i++ ) {
					if ( $( ".i-checks" ).eq( i ).prop( "checked" ) ) {
						vote.push( $( ".i-checks" ).eq( i ).val() )
					}
				}

				if ( vote.length == 0 ) {
					layer.msg( '{{trans('memberinfo.delete_data')}}' , { time : 1000 } );
					return false;
				}
				//生成询问框
				layer.confirm( "{{trans('memberinfo.is_delete_info')}}" , {
					btn : ["{{trans('memberinfo.confirm')}}" , "{{trans('memberinfo.cancel')}}"]
				} , function () {
					$.ajax( {
						url : '{{URL('member/destroy_all')}}' ,
						type : 'post' ,
						data : {
							'memberid' : vote ,
							'_token' : "{{csrf_token()}}"
						} ,
						success : function ( data ) {
							console.log( data );
							if ( data.code == {{config('myconfig.member.memberinfo_delete_success_code')}} ) {
								layer.msg( data.msg , { time : 2000 } , function () {
									if(page_count == vote.length){
										location.href = "{{URL('memberinfo')}}";
									}else{
										window.location.reload();
									}
								} );
							}
							else if ( data.code == {{config('myconfig.member.memberinfo_delete_error_code')}} ) {
								layer.msg( data.msg , { time : 2000 } );
							}
						} ,
						error : function ( result ) {
							// 由于返回422的错误状态码，所以会自动调用ajax的错误函数，不需要人为再手工判断
							console.log( result );
						}
					} )
				} , function () {
					layer.msg( "{{trans('memberinfo.delete_cancel')}}" , {
						time : 1000 , //20s后自动关闭
					} );
				} );
			} );

		//添加
		$('#news_day').click(function(){
			layer.open({
				type: 2,
				title:'{{ trans('memberinfo.news_add') }}',
				moveType: 0,
				skin: 'layui-layer-demo', //加上边框
				closeBtn : 1 ,
				area: ['50%','70%'], //宽高
				shadeClose : false ,
				shade: 0.5,
				content: ["{{URL('member/create')}}"],
				success:function(layero , index){
					$(':focus').blur();
				}
			});
		});

		function d( memberid ) {
			var page_count = $('#page_count').val();

			layer.confirm( "{{trans('memberinfo.is_delete_info')}}" , {
				btn : ["{{trans('memberinfo.confirm')}}" , "{{trans('memberinfo.cancel')}}"] //按钮
			} , function () {
				$.post( "{{URL('member/destroy')}}" , { 'memberid' : memberid , '_token' : "{{csrf_token()}}" } ,
					function ( data ) {
					console.log(data);

						if ( data.code  == {{config('myconfig.member.memberinfo_delete_error_code')}} ) {
							layer.msg( data.msg , { time : 2000 } );
						}
						else if (  data.code  == {{config('myconfig.member.memberinfo_delete_success_code')}} ) {
							layer.msg( data.msg , { time : 1000 } , function () {
								if(page_count == 1){
									location.href = "{{URL('memberinfo')}}";
								}else{
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
		function edit(memberid){
			layer.open({
				type: 2,
				title:'{{ trans('memberinfo.news_edits') }}',
				moveType: 0,
				skin: 'layui-layer-demo', //加上边框
				closeBtn : 1 ,
				area: ['50%','70%'], //宽高
				shadeClose : false ,
				shade: 0.5,
				content: ["{{URL('member/edit')}}"+ "/" + memberid],
				success:function(layero , index){
					$(':focus').blur();
				}
			});
		}

		//禁用启用
		function status(memberid ,status) {
			layer.confirm( "{{trans('memberinfo.is_status_info')}}" , {
				btn : ["{{trans('memberinfo.confirm')}}" , "{{trans('memberinfo.cancel')}}"] //按钮
			} , function () {
				$.post( "{{URL('member/status')}}" , { 'memberid' : memberid ,status:status, '_token' : "{{csrf_token()}}" } ,
					function ( data ) {
						console.log(data);

						if ( data.code  == {{config('myconfig.member.memberinfo_status_error_code')}} ) {
							layer.msg( data.msg , { time : 2000 } );
						}
						else if (  data.code  == {{config('myconfig.member.memberinfo_status_success_code')}} ) {
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
