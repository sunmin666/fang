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
		<form action="{{URL('customer/14')}}" method="get">
			<label>{{ trans('sales.cust') }}：</label>
			<select name="hous"  class="status">
				<option value="">全部</option>
				@foreach($hous_id as $kay => $value)
					<option value="{{$value -> hous_id}}" @if($hous == $value -> hous_id) selected @endif> {{$value -> name}}</option>
				@endforeach	
			</select>

			<label>{{ trans('customer.name') }}：</label>
			<input type="text" value="{{$name}}" autocomplete="off" name="name" class=" status" id="test1" style="display: inline-block;">

			<label>{{ trans('customer.iphone') }}：</label>
			<input type="text" value="{{$iphone}}" autocomplete="off" name="iphone" class=" status" id="test2" style="display: inline-block">

			<button type='submit'  id="search" class="btn btn-sm {{config('myconfig.config.button_skin')}}">
				<i class="glyphicon glyphicon-search"></i>&nbsp;{{trans('sales.search')}}
			</button>
		</form>
			{{--{{$total}}--}}
		<div class="box-body">
			<div class="table-responsive">
				<table class="table no-margin">
					<thead>
					<tr>
						<th width="130px">
							<button type="button" class="btn btn-warning btn-xs" id="data_select" data-select-all="true"><i
									class="glyphicon glyphicon-ok"></i>{{ trans('memberinfo.allAlection') }}</button>
						</th>
						{{--客户真实姓名--}}
						<th>{{ trans('customer.realname') }}</th>
						{{--客户性别--}}
						<th>{{ trans('customer.sex') }}</th>
						{{--客户手机号--}}
						<th>{{ trans('customer.mobile') }}</th>
						{{--客户的邮箱--}}
						<th>{{ trans('customer.email') }}</th>
						{{--所属公司--}}
						<th>{{trans('customer.comp_id')}}</th>
						{{--所属醒目--}}
						<th>{{trans('customer.proj_id')}}</th>
						{{--所属醒目--}}
						<th>{{trans('customer.hous_id')}}</th>
						{{--客户录入时间--}}
						<th>{{trans('customer.created_at')}}</th>
						{{--操作--}}
						<th>{{ trans('company.operating') }}</th>
					</tr>
					</thead>
					<tbody>
					@foreach($omer as $value)
						<tr>
							<td><input type="checkbox" class="i-checks" id="groupCheckbox" name="groupCheckbox[]"
							           value="{{$value->cust_id}}"
								></td>
							<td>{{ $value -> realname}}</td>
							<td>@if($value -> sex == 1) {{ trans('customer.male') }} @elseif($value -> sex == 2) {{ trans('customer.female') }} @endif</td>
							<td>{{$value -> mobile}}</td>
							<td>@if($value-> email == '') {{ trans('customer.no_email') }} @else {{$value -> email}} @endif</td>
							<td>@if($value -> comp_id == 1) {{ trans('customer.open_rice') }}@endif</td>
							<td>{{$value-> pro_cname}}</td>
							<td>@foreach($hous_id as $k => $v)
									@if($v -> hous_id == $value -> hous_id) {{$v -> name}}  @endif
								@endforeach
							</td>
							<td>{{date('Y-m-d H:i',$value -> created_at)}}</td>
							{{--<td>@if($value -> status_id == 1) 正常 @elseif($value -> status_id == 0) 禁用 @endif</td>--}}
							<td>
								<button type="button" value="{{$value -> cust_id}}" onclick="view({{$value -> cust_id}})"
								        class="btn btn-warning btn-xs btn_edit" id="btn_edit"><i
										class="fa fa-edit"></i> {{trans('memberinfo.news_view')}}</button>
								<button type="button" value="{{$value -> cust_id}}" onclick="edit({{$value -> cust_id}})"
								        class="btn btn-warning btn-xs btn_edit" id="btn_edit"><i
										class="fa fa-edit"></i> {{trans('memberinfo.news_edits')}}</button>
								<button type="button" value="{{$value -> cust_id}}" onclick="d({{$value -> cust_id}},{{$value -> is_show}})"
								        class="btn btn-warning btn-xs btn_delete"><i
										class="fa fa-trash"></i>
									@if($status == 2 && $id == 1)
										@if($value -> is_show == 1)
											{{ trans('customer.hidden') }}
										@else
											{{ trans('customer.show') }}
										@endif
									@else
										{{trans('memberinfo.news_delete')}}
									@endif
								</button>
								<button type="button" value="{{$value -> cust_id}}" onclick="trackinfo({{$value -> cust_id}})"
										class="btn btn-warning btn-xs btn_edit" id="btn_trackinfo"><i
										class="fa fa-edit"></i> {{trans('memberinfo.trackinfo')}}</button>
								<button type="button" value="{{$value -> cust_id}}" onclick="customer({{$value -> cust_id}})"
										class="btn btn-warning btn-xs btn_edit" id="btn_customero"><i
											class="fa fa-edit"></i> {{trans('memberinfo.customer')}}</button>
								<button type="button" value="{{$value -> cust_id}}" onclick="buyinfo({{$value -> cust_id}})"
										class="btn btn-warning btn-xs btn_edit" id="btn_customero"><i
											class="fa fa-edit"></i> {{trans('memberinfo.buyinfo')}}</button>
								<button type="button" value="{{$value -> cust_id}}" onclick="payment({{$value -> cust_id}})"
										class="btn btn-warning btn-xs btn_edit" id="btn_customero"><i
											class="fa fa-edit"></i> {{trans('payloginfo.payment')}}</button>
								<button type="button" value="{{$value -> cust_id}}" onclick="purchase({{$value -> cust_id}})"
										class="btn btn-warning btn-xs btn_edit" id="btn_customero"><i
											class="fa fa-edit"></i> {{trans('customer.purchase_plan')}}</button>
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
			<div class=" pull-right">{{$omer -> appends(['hous'=>$hous,'name' => $name,'iphone' => $iphone]) -> links()}}</div>
			<input type="hidden" value="{{$omer -> count()}}" id="page_count">
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
					url : '{{URL('company/destroy_all')}}' ,
					type : 'post' ,
					data : {
						'comp_id' : vote ,
						'_token' : "{{csrf_token()}}"
					} ,
					success : function ( data ) {
						console.log( data );
						if ( data.code == {{config('myconfig.perm.per_delete_success_code')}} ) {
							layer.msg( data.msg , { time : 2000 } , function () {
								if ( page_count == vote.length ) {
									location.href = "{{URL('permission')}}";
								}
								else {
									window.location.reload();
								}
							} );
						}
						else if ( data.code == {{config('myconfig.perm.per_delete_error_code')}} ) {
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
				content : ["{{URL('omer/create')}}"] ,
				success : function ( layero , index ) {
					$( ':focus' ).blur();
				}
			} );
		} );

		//添加共有人
		function customer( cust_id ) {
			layer.open( {
				type : 2 ,
				title : '{{ trans('coownerinfo.page_name') }}' ,
				moveType : 0 ,
				skin : 'layui-layer-demo' , //加上边框
				closeBtn : 1 ,
				area : ['50%' , '70%'] , //宽高
				shadeClose : false ,
				shade : 0.5 ,
				content : ["{{URL('coownerinfo/get_coowner')}}" + "/" + cust_id] ,
				success : function ( layero , index ) {
					$( ':focus' ).blur();
				}
			} );
		}

		//添加缴费
		function payment( cust_id ) {
			layer.open( {
				type : 2 ,
				title : '{{ trans('payloginfo.payment') }}' ,
				moveType : 0 ,
				skin : 'layui-layer-demo' , //加上边框
				closeBtn : 1 ,
				area : ['50%' , '60%'] , //宽高
				shadeClose : false ,
				shade : 0.5 ,
				content : ["{{URL('payloginfo/get_coowner')}}" + "/" + cust_id] ,
				success : function ( layero , index ) {
					$( ':focus' ).blur();
				}
			} );
		}

		//添加方案purchase
		function purchase( cust_id ) {
			layer.open( {
				type : 2 ,
				title : '{{ trans('customer.purchase_plan') }}' ,
				moveType : 0 ,
				skin : 'layui-layer-demo' , //加上边框
				closeBtn : 1 ,
				area : ['50%' , '70%'] , //宽高
				shadeClose : false ,
				shade : 0.5 ,
				content : ["{{URL('purchase/get_coowner')}}" + "/" + cust_id] ,
				success : function ( layero , index ) {
					$( ':focus' ).blur();
				}
			} );
		}

		//删除信息
		function d( cust_id ,is_show) {
			var page_count = $( '#page_count' ).val();
			layer.confirm( "{{trans('memberinfo.is_delete_info')}}" , {
				btn : ["{{trans('memberinfo.confirm')}}" , "{{trans('memberinfo.cancel')}}"] //按钮
			} , function () {
				$.post( "{{URL('omer/destroy')}}" , { 'cust_id' : cust_id ,'is_show':is_show, '_token' : "{{csrf_token()}}" } ,
					function ( data ) {
						console.log( data );
						if ( data.code == {{config('myconfig.omer.delete_omer_error_code')}} ) {
							layer.msg( data.msg , { time : 2000 } );
						}
						if ( data.code == {{config('myconfig.omer.delete_omer_success_code')}} ) {
							layer.msg( data.msg , { time : 1000 } , function () {
								if ( page_count == 1 ) {
									location.href = "{{URL('company/17')}}";
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

		//修改用户信息
		function edit( cust_id ) {
			layer.open( {
				type : 2 ,
				title : '{{ trans('memberinfo.news_edits') }}' ,
				moveType : 0 ,
				skin : 'layui-layer-demo' , //加上边框
				closeBtn : 1 ,
				area : ['50%' , '70%'] , //宽高
				shadeClose : false ,
				shade : 0.5 ,
				content : ["{{URL('omer/edit')}}" + "/" + cust_id] ,
				success : function ( layero , index ) {
					$( ':focus' ).blur();
				}
			} );
		}

		//查看详情
		function view( cust_id ) {
			layer.open( {
				type : 2 ,
				title : '{{ trans('memberinfo.news_view') }}' ,
				moveType : 0 ,
				skin : 'layui-layer-demo' , //加上边框
				closeBtn : 1 ,
				area : ['50%' , '70%'] , //宽高
				shadeClose : false ,
				shade : 0.5 ,
				content : ["{{URL('omer/view')}}" + "/" + cust_id] ,
				success : function ( layero , index ) {
					$( ':focus' ).blur();
				}
			} );
		}

		//禁用启用
		function status(comp_id ,status) {
			layer.confirm( "{{trans('memberinfo.is_status_info')}}" , {
				btn : ["{{trans('memberinfo.confirm')}}" , "{{trans('memberinfo.cancel')}}"] //按钮
			} , function () {
				$.post( "{{URL('company/status')}}" , { 'comp_id' : comp_id ,status:status, '_token' : "{{csrf_token()}}" } ,
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
		//跟踪
		function trackinfo( cust_id ) {
			layer.open( {
				type : 2 ,
				title : '{{ trans('memberinfo.trackinfo') }}' ,
				moveType : 0 ,
				skin : 'layui-layer-demo' , //加上边框
				closeBtn : 1 ,
				area : ['50%' , '70%'] , //宽高
				shadeClose : false ,
				shade : 0.5 ,
				content : ["{{URL('trackinfo/showtrack')}}" + "/" + cust_id] ,
				success : function ( layero , index ) {
					$( ':focus' ).blur();
				}
			} );
		}
		//认购信息
		function buyinfo(cust_id){
			layer.open( {
				type : 2 ,
				title : '{{ trans('buy.buyinfo') }}' ,
				moveType : 0 ,
				skin : 'layui-layer-demo' , //加上边框
				closeBtn : 1 ,
				area : ['50%' , '70%'] , //宽高
				shadeClose : false ,
				shade : 0.5 ,
				content : ["{{URL('buyinfo/initiate')}}" + "/" + cust_id] ,
				success : function ( layero , index ) {
					$( ':focus' ).blur();
				}
			} );
		}


	</script>
@endpush
