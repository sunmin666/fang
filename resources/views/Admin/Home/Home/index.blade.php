@extends('Public.admin')
@push('include-css')
	<!-- bootstrap-fileinput css -->
	<link rel="stylesheet" href="{{URL::asset('bower_components/bootstrap-fileinput/css/fileinput.css')}}">
	<link rel="stylesheet" href="{{URL::asset('css/weekly.css')}}">
	<link rel="stylesheet" href="{{URL::asset('bower_components/layui/dist/css/layui.css')}}">
	<style>
		#news td{
			height: 50px;
			line-height: 50px;
		}
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
		<form action="{{URL('homeinfo/30')}}" method="get">
			<label>{{ trans('home.buildnum') }}：</label>
			<select name="buildnum"  class="status" id="buildnum">
				<option value="">全部</option>
				@foreach($buildnum as $k => $v)
					<option value="{{$v -> field_id}}" @if($v -> field_id == $buildnums) selected @endif>{{$v -> name}}</option>
				@endforeach
			</select>

			<label>{{ trans('home.unitnum') }}：</label>
			<select name="unitnum"  class="status" id="unitnum">
				@if($dan === '')
					<option value="">全部</option>
				@else
					<option value="">全部</option>
					@foreach($dan as $k => $v)
						<option value="{{$v -> field_id}}" @if($v -> field_id == $unitnums) selected @endif>{{$v -> name}}</option>
					@endforeach
				@endif
			</select>

			<label>{{ trans('home.roomnum') }}：</label>
			<select name="roomnum"  class="status" id="roomnum">
				@if($fang === '')
					<option value="">全部</option>
				@else
					<option value="">全部</option>
					@foreach($fang as $k => $v)
						<option value="{{$v -> field_id}}" @if($v -> field_id == $roomnums) selected @endif>{{$v -> name}}</option>
					@endforeach
				@endif
			</select>

			<label>{{ trans('home.status') }}：</label>
			<select name="status"  class="status">
				<option value="">全部</option>
				<option value="0" @if($statuss == 0) selected @endif>{{ trans('home.subscription') }}</option>
				<option value="1" @if($statuss == 1) selected @endif>{{ trans('home.reserved_application') }}</option>
				<option value="2" @if($statuss == 2) selected @endif>{{ trans('home.subscribed') }}</option>
				<option value="3" @if($statuss == 3) selected @endif>{{ trans('home.signed') }}</option>
			</select>

			<label>{{ trans('home.floor') }}：</label>
			<input type="text" value="{{$floors}}" autocomplete="off" name="floor" class=" status" id="test2" style="display: inline-block">

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
						{{--客户真实姓名--}}
						<th>{{ trans('home.buildnum') }}</th>
						{{--客户性别--}}
						<th>{{ trans('home.unitnum') }}</th>
						{{--客户手机号--}}
						<th>{{ trans('home.roomnum') }}</th>
						{{--客户的邮箱--}}
						<th>{{ trans('home.floor') }}</th>
						{{--所属公司--}}
						<th>{{trans('home.build_area')}}</th>
						{{--所属醒目--}}
						<th>{{trans('home.house_img')}}</th>
						{{--客户录入时间--}}
						<th>{{trans('home.house_str')}}</th>
						{{--操作--}}
						<th>{{ trans('home.discount') }}</th>
						<th>{{ trans('home.status') }}</th>
						<th>{{ trans('home.created_at') }}</th>
						<th>{{ trans('home.operating') }}</th>
					</tr>
					</thead>
					<tbody>
					@foreach($home as $value)
						<tr id="news">
							<td><input type="checkbox" class="i-checks" id="groupCheckbox" name="groupCheckbox[]"
							           value="{{$value->homeid}}"
								></td>
							<td>{{ $value -> buildnums}}</td>
							<td>{{ $value -> unitnums}}</td>
							<td>{{$value -> roomnums}}</td>
							<td>{{$value -> floor}}</td>
							<td>{{$value-> build_area}}平米</td>
							<td><a href="{{URL::asset($value-> house_img)}}" target="_blank"><img src="{{URL::asset($value-> house_img)}}" style="width: 50px;height: 50px" alt=""></a></td>
							<td>{{$value -> house_str}}</td>
							<td>{{$value -> discount}}折</td>
							<td>
								@if($value -> status == 0)
									{{--btn btn-block btn-success btn-xs--}}
									<span class=" btn-success btn-sm">认购前</span>
								@elseif($value-> status == 1)
									{{--btn btn-block btn-warning btn-flat--}}
										<span class="btn-warning btn-sm">预定房源申请中</span>
								@elseif($value -> status == 2)
									{{--btn btn-block btn-info btn-flat--}}
									  <span class="btn-info btn-sm">已认购</span>
								@else
									{{--btn btn-block btn-danger btn-flat--}}
									<span class="btn-danger btn-sm">已签约</span>
								@endif
							</td>
							<td>{{date('Y-m-d H:i',$value -> created_at)}}</td>
							<td>
								<button type="button" value="{{$value -> homeid}}" onclick="view({{$value -> homeid}})"
								        class="btn btn-warning btn-xs btn_edit" id="btn_edit"><i
										class="fa fa-edit"></i> {{trans('memberinfo.news_view')}}</button>
								<button type="button" value="{{$value -> homeid}}" onclick="edit({{$value -> homeid}})"
								        class="btn btn-warning btn-xs btn_edit" id="btn_edit"><i
										class="fa fa-edit"></i> {{trans('memberinfo.news_edits')}}</button>
								<button type="button" value="{{$value -> homeid}}" onclick="d({{$value -> homeid}})"
								        class="btn btn-warning btn-xs btn_edit" id="btn_edit"><i
										class="fa fa-edit"></i> {{trans('memberinfo.news_delete')}}</button>
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
			<div class=" pull-right">{{$home -> appends(['buildnum'=>$buildnums,'unitnum' => $unitnums,'roomnum' => $roomnums,'status' => $statuss,'floor' => $floors]) -> links()}}</div>
			<input type="hidden" value="{{$home -> count()}}" id="page_count">
		</div>
	</div>
@endsection
@push('include-js')
	<!-- bootstrap-fileinput js -->
	<script src="{{URL::asset('bower_components/bootstrap-fileinput/js/fileinput.js')}}"></script>
	<script src="{{URL::asset('bower_components/bootstrap-fileinput/js/locales/zh.js')}}"></script>
	<script src="{{URL::asset('bower_components/layui/dist/layui.js')}}"></script>
	<script type="text/javascript">
		//下拉框联动 楼号联动单元号
		$( "#buildnum" ).change( function () {
			var field_id = $( this ).val();
			$.ajax( {
				url : "{{URL('buildnum')}}" ,
				type : "post" ,
				data : {
					field_id : field_id ,
					_token : "{{csrf_token()}}"
				} ,
				success : function ( data ) {
					console.log(data);
					var str = "";
					for ( var ig = 0 ; ig < data.length ; ig++ ) {
						str += "<option value='" + data[ig]['field_id'] + "'> " + data[ig]['name'] + " </option>"
					}
					var cc = '<option value="">全部</option>';

					$( '#unitnum' ).html( cc + str );
					$( '#roomnum' ).html( cc );
				}
			} )
		} );
		//下拉联动 单元号联动房号
		$( "#unitnum" ).change( function () {
			var field_id = $( this ).val();
			$.ajax( {
				url : "{{URL('unitnum')}}" ,
				type : "post" ,
				data : {
					field_id : field_id ,
					_token : "{{csrf_token()}}"
				} ,
				success : function ( data ) {
					console.log(data);
					var str = "";
					for ( var ig = 0 ; ig < data.length ; ig++ ) {
						str += "<option value='" + data[ig]['field_id'] + "'> " + data[ig]['name'] + " </option>"
					}
					var aa = '<option value="">全部</option>';
					$( '#roomnum' ).html( aa + str );
				}
			} )
		} );




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
					url : '{{URL('home/destroy_all')}}' ,
					type : 'post' ,
					data : {
						'homeid' : vote ,
						'_token' : "{{csrf_token()}}"
					} ,
					success : function ( data ) {
						console.log( data );
						if ( data.code == {{config('myconfig.home.home_delete_success_code')}} ) {
							layer.msg( data.msg , { time : 2000 } , function () {
								if ( page_count == vote.length ) {
									location.href = "{{URL('homeinfo/30')}}";
								}
								else {
									window.location.reload();
								}
							} );
						}
						else if ( data.code == {{config('myconfig.home.home_delete_error_code')}} ) {
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
				content : ["{{URL('home/create')}}"] ,
				success : function ( layero , index ) {
					$( ':focus' ).blur();
				}
			} );
		} );
		//删除信息
		function d( homeid) {
			var page_count = $( '#page_count' ).val();
			layer.confirm( "{{trans('memberinfo.is_delete_info')}}" , {
				btn : ["{{trans('memberinfo.confirm')}}" , "{{trans('memberinfo.cancel')}}"] //按钮
			} , function () {
				$.post( "{{URL('home/destroy')}}" , { 'homeid' : homeid , '_token' : "{{csrf_token()}}" } ,
					function ( data ) {
						console.log( data );
						if ( data.code == {{config('myconfig.home.home_delete_error_code')}} ) {
							layer.msg( data.msg , { time : 2000 } );
						}
						if ( data.code == {{config('myconfig.home.home_delete_success_code')}} ) {
							layer.msg( data.msg , { time : 1000 } , function () {
								if ( page_count == 1 ) {
									location.href = "{{URL('homeinfo/30')}}";
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
		function edit( homeid ) {
			layer.open( {
				type : 2 ,
				title : '{{ trans('memberinfo.news_edits') }}' ,
				moveType : 0 ,
				skin : 'layui-layer-demo' , //加上边框
				closeBtn : 1 ,
				area : ['50%' , '70%'] , //宽高
				shadeClose : false ,
				shade : 0.5 ,
				content : ["{{URL('home/edit')}}" + "/" + homeid] ,
				success : function ( layero , index ) {
					$( ':focus' ).blur();
				}
			} );
		}

		//查看详情
		function view( homeid ) {
			layer.open( {
				type : 2 ,
				title : '{{ trans('memberinfo.news_view') }}' ,
				moveType : 0 ,
				skin : 'layui-layer-demo' , //加上边框
				closeBtn : 1 ,
				area : ['50%' , '70%'] , //宽高
				shadeClose : false ,
				shade : 0.5 ,
				content : ["{{URL('home/view')}}" + "/" + homeid] ,
				success : function ( layero , index ) {
					$( ':focus' ).blur();
				}
			} );
		}
	</script>
@endpush
