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
					class="fa fa-refresh"></i> {{ trans('memberinfo.refresh') }}</button>
			<div class="box-tools pull-right">
				<button type="button" class="btn btn-danger btn-sm weekly-day" id="news_day"
				><i class="fa fa-plus"></i>
					{{ trans('memberinfo.news_add') }}
				</button>
			</div>

		</div>
		<form action="{{URL('changeh/38')}}" method="get">

			<label>{{ trans('customer.name') }}：</label>
			<input type="text" value="{{$name}}" autocomplete="off" name="name" class=" status" id="test1" style="display: inline-block;">

			<label>{{ trans('customer.iphone') }}：</label>
			<input type="text" value="{{$iphone}}" autocomplete="off" name="iphone" class=" status" id="test2" style="display: inline-block">

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
						{{--认购客户--}}
						<th>{{ trans('change.cust') }}</th>
						{{--认购房源--}}
						<th>{{ trans('change.homeid_old_lh') }}</th>
						{{--认购标号--}}
						<th>{{ trans('change.homeid_old_dy') }}</th>
						{{--认购定金--}}
						<th>{{ trans('change.homeid_old_fh') }}</th>
						{{--付款方案--}}
						<th>{{ trans('change.homeid_new_lh') }}</th>
						{{--月供--}}
						<th>{{trans('change.homeid_new_dy')}}</th>
						{{--年限--}}
						<th>{{trans('change.homeid_new_fh')}}</th>
						{{--总金额--}}
						<th>{{trans('change.status_jl')}}</th>
						<th>{{trans('change.status_ji_time')}}</th>
						<th>{{trans('change.status_cw')}}</th>
						<th>{{trans('change.status_cw_time')}}</th>

						<th>{{trans('change.created_at')}}</th>
						{{--操作--}}
						<th>{{ trans('change.operating') }}</th>
					</tr>
					</thead>
					<tbody>
					@foreach($change as $value)
						<tr>
							<td><input type="checkbox" class="i-checks" id="groupCheckbox" name="groupCheckbox[]"
							           value="{{$value->chan_id}}"
								></td>
							<td>{{ $value -> realname}}</td>
							<td>{{$value -> buildnum_old}}</td>
							<td>{{$value -> unitnum_old}}</td>
							<td>{{$value-> roomnum_old}}</td>
							<td>{{$value-> buildnum_new}}</td>
							<td>{{$value-> unitnum_new}}</td>
							<td>{{$value-> roomnum_new}}</td>
							<td>
								@if($value -> status === 0)
									经理审核未通过
								@elseif($value -> status === 1)
									经理审核通过
								@else
									经理未审核
								@endif
							</td>
							<td>
								@if($value -> verifytime === null)
									经理未审核
									@else
									{{date('Y-m-d',$value -> verifytime)}}
								@endif
							</td>
							<td>
								@if($value -> finance_status === null)
									财务未审核
								@elseif($value -> finance_status === 0)
									财务审核未通过
								@elseif($value -> finance_status === 1)
									财务审核通过
								@endif
							</td>
							<td>
								@if($value -> verifytime == null)
									财务未审核
								@else
									{{date('Y-m-d',$value -> finance_time)}}
								@endif
							</td>
							<td>{{date('Y-m-d H:i',$value -> created_at)}}</td>
							<td>

								@if($value -> status === null)
								<button type="button" value="{{$value -> chan_id}}" onclick="review({{$value -> chan_id}},{{$value -> new_homeid}})"
								        class="btn btn-warning btn-xs btn_edit" id="btn_edit"><i
										class="fa fa-edit"></i> {{ trans('buy.review') }}</button>
								@endif
								@if($value -> status == 1)
									@if($value -> finance_status === null)
								<button type="button" value="{{$value -> chan_id}}" onclick="cwview({{$value -> chan_id}},{{$value -> old_homeid}},{{$value -> new_homeid}})"
								        class="btn btn-warning btn-xs btn_edit" id="btn_edit"><i
										class="fa fa-edit"></i> {{ trans('buy.manager_verify_status') }}</button>
										@endif
								@endif
								<button type="button" value="{{$value -> chan_id}}" onclick="view({{$value -> chan_id}})"
								        class="btn btn-warning btn-xs btn_edit" id="btn_edit"><i
										class="fa fa-edit"></i> {{trans('memberinfo.news_view')}}</button>
								<button type="button" value="{{$value -> chan_id}}" onclick="edit({{$value -> chan_id}})"
								        class="btn btn-warning btn-xs btn_edit" id="btn_edit"><i
										class="fa fa-edit"></i> {{trans('memberinfo.news_edits')}}</button>
								<button type="button" value="{{$value -> chan_id}}" onclick="d({{$value -> chan_id}})"
								        class="btn btn-warning btn-xs btn_delete"><i
										class="fa fa-trash"></i> {{trans('memberinfo.news_delete')}} </button>
							</td>
						</tr>
					@endforeach
					</tbody>
				</table>
			</div>
		</div>

		<div class="box-footer clearfix">
			<a href="javascript:void(0)" class="btn btn-danger btn-xs pull-left select_all"><i
					class="fa fa-trash"></i>{{ trans('memberinfo.select_all_delete') }}</a>
			<div class=" pull-right">{{$change -> appends(['name' => $name,'iphone'=> $iphone]) ->links()}}</div>
			<input type="hidden" value="{{$change -> count()}}" id="page_count">
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
					url : '{{URL('change_home/destroy_all')}}' ,
					type : 'post' ,
					data : {
						'chan_id' : vote ,
						'_token' : "{{csrf_token()}}"
					} ,
					success : function ( data ) {
						console.log( data );
						if(data.code == null){
							window.location.href = '{{URL('permi')}}'
						}

						if ( data.code == {{config('myconfig.changeh.delete_success_change_code')}} ) {
							layer.msg( data.msg , { time : 2000 } , function () {
								if ( page_count == vote.length ) {
									location.href = "{{URL('changeh/38')}}";
								}
								else {
									window.location.reload();
								}
							} );
						}
						else if ( data.code == {{config('myconfig.changeh.delete_error_change_code')}} ) {
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


		//删除信息
		function d( chan_id ) {
			var page_count = $( '#page_count' ).val();
			layer.confirm( "{{trans('memberinfo.is_delete_info')}}" , {
				btn : ["{{trans('memberinfo.confirm')}}" , "{{trans('memberinfo.cancel')}}"] //按钮
			} , function () {
				$.post( "{{URL('chang_home/destroy')}}" , { 'chan_id' : chan_id , '_token' : "{{csrf_token()}}" } ,
					function ( data ) {
						console.log( data );
						if(data.code == null){
							window.location.href = '{{URL('permi')}}'
						}
						if ( data.code == {{config('myconfig.changeh.delete_error_change_code')}} ) {
							layer.msg( data.msg , { time : 2000 } );
						}
						if ( data.code == {{config('myconfig.changeh.delete_success_change_code')}} ) {
							layer.msg( data.msg , { time : 1000 } , function () {
								if ( page_count == 1 ) {
									location.href = "{{URL('changeh/38')}}";
								}
								else {
									window.location.reload();
								}
							} );
						}
						if ( data.code == {{config('myconfig.member.ch_get_character_code')}} ) {
							layer.msg( data.msg , { time : 2000 } );
						}
					} );
			} , function () {
				layer.msg( "{{trans('memberinfo.delete_cancel')}}" , {
					time : 1000 , //10秒鐘后自動關閉
				} );
			} );
		}

		//换房
		function huan(buyid, homeid ) {
			var page_count = $( '#page_count' ).val();
			layer.confirm( "{{trans('memberinfo.is_delete_info')}}" , {
				btn : ["{{trans('memberinfo.confirm')}}" , "{{trans('memberinfo.cancel')}}"] //按钮
			} , function () {
				$.post( "{{URL('buyinfoss/huan')}}" , { 'homeid' : homeid ,'buyid':buyid, '_token' : "{{csrf_token()}}" } ,
					function ( data ) {
						console.log( data );
						if ( data.code == {{config('myconfig.buy.buy_huan_error_code')}} ) {
							layer.msg( data.msg , { time : 2000 } );
						}
						if ( data.code == {{config('myconfig.buy.buy_huan_success_code')}} ) {
							layer.msg( data.msg , { time : 1000 } , function () {
								window.location.reload();
							} );
						}
						if ( data.code == {{config('myconfig.member.ch_get_character_code')}} ) {
							layer.msg( data.msg , { time : 2000 } );
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
				content : ["{{URL('chang_home/edit')}}" + "/" + chan_id] ,
				success : function ( layero , index ) {
					$( ':focus' ).blur();
				}
			} );
		}

		//查看详情
		function view( chan_id ) {
			// alert(chan_id);
			// return false;
			layer.open( {
				type : 2 ,
				title : '{{ trans('memberinfo.news_view') }}' ,
				moveType : 0 ,
				skin : 'layui-layer-demo' , //加上边框
				closeBtn : 1 ,
				area : ['50%' , '70%'] , //宽高
				shadeClose : false ,
				shade : 0.5 ,
				content : ["{{URL('chang_home/view')}}" + "/" + chan_id] ,
				success : function ( layero , index ) {
					$( ':focus' ).blur();
				}
			} );
		}

		//经理审核
		function review(chan_id,new_homeid){
			layer.open( {
				type : 2 ,
				title : '{{ trans('buy.review') }}' ,
				moveType : 0 ,
				skin : 'layui-layer-demo' , //加上边框
				closeBtn : 1 ,
				area : ['50%' , '70%'] , //宽高
				shadeClose : false ,
				shade : 0.5 ,
				content : ["{{URL('change_home/review')}}" + "/" + chan_id + "/"+ new_homeid ] ,
				success : function ( layero , index ) {
					$( ':focus' ).blur();
				}
			} );
		}

		//财务审核
		function cwview(chan_id,old_homeid,new_homeid){
			layer.open( {
				type : 2 ,
				title : '{{ trans('buy.cwview') }}' ,
				moveType : 0 ,
				skin : 'layui-layer-demo' , //加上边框
				closeBtn : 1 ,
				area : ['50%' , '70%'] , //宽高
				shadeClose : false ,
				shade : 0.5 ,
				content : ["{{URL('change_home/cwview')}}" + "/" + chan_id + "/"+ old_homeid + "/" + new_homeid] ,
				success : function ( layero , index ) {
					$( ':focus' ).blur();
				}
			} );
		}

	</script>
@endpush
