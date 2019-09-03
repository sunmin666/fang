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
						{{--认购客户--}}
						<th>{{ trans('signinfo.cust_id') }}</th>
						{{--认购房源--}}
						<th>{{ trans('signinfo.cust_sex') }}</th>
						{{--手机号--}}
						<th>{{ trans('signinfo.iphone') }}</th>
						{{--认购标号--}}
						<th>{{ trans('signinfo.pay_num') }}</th>
						<th>{{ trans('signinfo.sig_status') }}</th>
						{{--认购定金--}}

						<th>{{ trans('signinfo.created_at') }}</th>
						{{--付款方案--}}
						<th>{{ trans('signinfo.sign_verifytime') }}</th>
						{{--月供--}}
						<th>{{trans('signinfo.sign_status')}}</th>
						{{--年限--}}
						<th>{{trans('signinfo.finance_verifytime')}}</th>
						{{--总金额--}}
						<th>{{trans('signinfo.finance_status')}}</th>
						<th>{{trans('signinfo.status')}}</th>

						<th>{{ trans('signinfo.operating') }}</th>
					</tr>
					</thead>
					<tbody>
					@foreach($sig as $value)
						<tr>
							<td>
								<input type="checkbox" class="i-checks" id="groupCheckbox" name="groupCheckbox[]"
								       value="{{$value->signid}}">
							</td>
							<td>{{ $value -> realname}}</td>
							<td>@if($value -> sex == 1) 男 @else 女 @endif</td>
							<td>{{$value -> mobile}}</td>
							<td>{{$value-> buy_number}}</td>
							<td>@if($value -> sign_type == 0) 立即签约 @else 延迟签约 @endif</td>
							<td>{{date('Y-m-d H:i',$value -> sign_applytime)}}</td>
							<td>{{date('Y-m-d H:i',$value -> sign_verifytime)}}</td>
							<td>@if($value -> sign_status == 0 || $value -> sign_status == '') 未通过 @else 以通过 @endif</td>
							<td>{{date('Y-m-d H:i',$value -> finance_verifytime)}}</td>
							<td>@if($value -> finance_status == 0 || $value -> finance_status == '') 未通过 @else 以通过 @endif</td>
							<td>@if($value -> status === null)
										正常
									@else
										客户已退房
								@endif
							</td>
							<td>
								@if($value -> sign_type == 0 )
									@if( $value -> sign_status == '' && $value -> sign_verifytime =='')
										<button type="button" value="{{$value -> signid}}" onclick="review({{$value -> signid}},{{$value -> buyid}})"
										        class="btn btn-warning btn-xs btn_edit" id="btn_review"><i
												class="fa fa-edit"></i> {{trans('signinfo.review')}}</button>
									@endif
									@if($value -> sign_status == 1 && $value -> finance_verifytime == '')
											<button type="button" value="{{$value -> signid}}" onclick="cwview({{$value -> signid}},{{$value -> buyid}},{{$value -> homeid}})"
											        class="btn btn-warning btn-xs btn_edit" id="btn_cwview"><i
													class="fa fa-edit"></i> {{trans('signinfo.cwview')}}</button>
									@endif
								@endif
									<button type="button" value="{{$value -> cust_id}}" onclick="checkout({{$value -> signid}},{{$value -> homeid}},{{$value -> cust_id}},2)"
									        class="btn btn-warning btn-xs btn_edit" id="btn_customero"><i
											class="fa fa-edit"></i> {{trans('memberinfo.tuifang')}}</button>

									<button type="button" value="{{$value -> signid}}" onclick="view({{$value -> signid}})"
								        class="btn btn-warning btn-xs btn_edit" id="btn_view"><i
										class="fa fa-edit"></i> {{trans('memberinfo.news_view')}}</button>
								<button type="button" value="{{$value -> signid}}" onclick="edit({{$value -> signid}})"
								        class="btn btn-warning btn-xs btn_edit" id="btn_edit"><i
										class="fa fa-edit"></i> {{trans('memberinfo.news_edits')}}</button>
								<button type="button" value="{{$value -> signid}}" onclick="d({{$value -> signid}})"
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
			<div class=" pull-right">{{$sig -> links()}}</div>
			<input type="hidden" value="{{$sig -> count()}}" id="page_count">
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
					url : '{{URL('siginfo/destroy_all')}}' ,
					type : 'post' ,
					data : {
						'sigid' : vote ,
						'_token' : "{{csrf_token()}}"
					} ,
					success : function ( data ) {
						console.log( data );
						if ( data.code == {{config('myconfig.signinfo.delete_sig_success_code')}} ) {
							layer.msg( data.msg , { time : 2000 } , function () {
								if ( page_count == vote.length ) {
									location.href = "{{URL('signinfo/38')}}";
								}
								else {
									window.location.reload();
								}
							} );
						}
						else if ( data.code == {{config('myconfig.signinfo.delete_sig_error_code')}} ) {
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
				content : ["{{URL('buyinfoss/create')}}"] ,
				success : function ( layero , index ) {
					$( ':focus' ).blur();
				}
			} );
		} );

		//删除信息
		function d( signid ) {
			var page_count = $( '#page_count' ).val();
			layer.confirm( "{{trans('memberinfo.is_delete_info')}}" , {
				btn : ["{{trans('memberinfo.confirm')}}" , "{{trans('memberinfo.cancel')}}"] //按钮
			} , function () {
				$.post( "{{URL('signinfo/destroy')}}" , { 'signid' : signid , '_token' : "{{csrf_token()}}" } ,
					function ( data ) {
						console.log( data );
						if ( data.code == {{config('myconfig.signinfo.delete_sig_error_code')}} ) {
							layer.msg( data.msg , { time : 2000 } );
						}
						if ( data.code == {{config('myconfig.signinfo.delete_sig_success_code')}} ) {
							layer.msg( data.msg , { time : 1000 } , function () {
								if ( page_count == 1 ) {
									location.href = "{{URL('signinfo/38')}}";
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

		//修改签约信息
		function edit( signid ) {
			layer.open( {
				type : 2 ,
				title : '{{ trans('memberinfo.news_edits') }}' ,
				moveType : 0 ,
				skin : 'layui-layer-demo' , //加上边框
				closeBtn : 1 ,
				area : ['50%' , '70%'] , //宽高
				shadeClose : false ,
				shade : 0.5 ,
				content : ["{{URL('signinfo/edit')}}" + "/" + signid] ,
				success : function ( layero , index ) {
					$( ':focus' ).blur();
				}
			} );
		}

		//查看详情
		function view( signid ) {
			layer.open( {
				type : 2 ,
				title : '{{ trans('memberinfo.news_view') }}' ,
				moveType : 0 ,
				skin : 'layui-layer-demo' , //加上边框
				closeBtn : 1 ,
				area : ['50%' , '70%'] , //宽高
				shadeClose : false ,
				shade : 0.5 ,
				content : ["{{URL('signinfo/view')}}" + "/" + signid] ,
				success : function ( layero , index ) {
					$( ':focus' ).blur();
				}
			} );
		}

		//经理审核
		function review( sigid , buyid ) {
			layer.open( {
				type : 2 ,
				title : '{{ trans('memberinfo.news_view') }}' ,
				moveType : 0 ,
				skin : 'layui-layer-demo' , //加上边框
				closeBtn : 1 ,
				area : ['50%' , '70%'] , //宽高
				shadeClose : false ,
				shade : 0.5 ,
				content : ["{{URL('signinfo/review')}}" + "/" + sigid + "/" + buyid] ,
				success : function ( layero , index ) {
					$( ':focus' ).blur();
				}
			} );
		}

		//财务审核
		function cwview(sigid , buyid , homeid ) {
			layer.open( {
				type : 2 ,
				title : '{{ trans('memberinfo.news_view') }}' ,
				moveType : 0 ,
				skin : 'layui-layer-demo' , //加上边框
				closeBtn : 1 ,
				area : ['50%' , '70%'] , //宽高
				shadeClose : false ,
				shade : 0.5 ,
				content : ["{{URL('signinfo/cwview')}}" +"/" + sigid + "/" + buyid + "/" + homeid] ,
				success : function ( layero , index ) {
					$( ':focus' ).blur();
				}
			} );
		}

		function checkout(buyid,homeid,cust_id,status){
			layer.open( {
				type : 2 ,
				title : '{{ trans('memberinfo.trackinfo') }}',
				moveType : 0 ,
				skin : 'layui-layer-demo' , //加上边框
				closeBtn : 1 ,
				area : ['50%' , '70%'] , //宽高
				shadeClose : false ,
				shade : 0.5 ,
				content : ["{{URL('checkout/create')}}" + "/" + buyid + "/" + homeid +"/" + cust_id + "/" + status] ,
				success : function ( layero , index ) {
					$( ':focus' ).blur();
				}
			} );
		}



	</script>
@endpush
