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
					class="fa fa-refresh"></i> {{ trans('permission.refresh') }}</button>


			<div class="box-tools pull-right">
				<button type="button" class="btn btn-danger btn-sm weekly-day" id="news_day"
				><i class="fa fa-plus"></i>
					{{ trans('permission.news_add') }}
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
						<th>{{ trans('permission.pername') }}</th>
						<th>{{ trans('permission.perurl') }}</th>
						<th>{{ trans('permission.icon') }}</th>
						<th>{{ trans('permission.superior') }}</th>
						<th>{{ trans('permission.created_at') }}</th>
						<th>{{ trans('permission.status') }}</th>
						<th>{{ trans('permission.operating') }}</th>
					</tr>
					</thead>
					<tbody>
					@foreach($per as $value)
						<tr>
							<td>{{ $value -> pername}}</td>
							<td>{{$value -> perurl}}</td>
							<td>{{$value -> p_icon}}</td>
							<td> @if($value -> p_superior == 0) 顶级菜单 @endif</td>
							<td>{{date('Y-m-d H:i',$value -> created_at)}}</td>
							<td>@if($value -> status == 0)禁用@elseif($value -> status == 1)正常@endif</td>
							<td>
								<button type="button" value="{{$value -> perid}}" onclick="edit({{$value -> perid}})" class="btn btn-warning btn-xs btn_edit" id="btn_edit"><i
										class="fa fa-edit"></i> {{trans('memberinfo.news_edits')}}</button>
								<button type="button" value="{{$value -> perid}}"
								        onclick="d({{$value -> perid}})"
								        class="btn btn-warning btn-xs btn_delete"><i
										class="fa fa-trash"></i> {{trans('memberinfo.news_delete')}} </button>
								<button type="button" value="{{$value -> perid}}"
								        onclick="status({{$value -> perid}},{{$value -> status}})"
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

						@foreach($value ->xsuperior as $value1)
							<tr>
								<td style="padding-left: 40px">|---{{ $value1 -> pername}}</td>
								<td>{{$value1 -> perurl}}</td>
								<td>{{$value1 -> p_icon}}</td>
								<td> {{ $value -> pername}}</td>
								<td>{{date('Y-m-d H:i',$value1 -> created_at)}}</td>
								<td>@if($value1 -> status == 0)禁用@elseif($value1 -> status == 1)正常@endif</td>
								<td>
									<button type="button" value="{{$value1 -> perid}}" onclick="edit({{$value1 -> perid}})" class="btn btn-warning btn-xs btn_edit" id="btn_edit"><i
											class="fa fa-edit"></i> {{trans('memberinfo.news_edits')}}</button>
									<button type="button" value="{{$value1 -> perid}}"
									        onclick="d({{$value1 -> perid}})"
									        class="btn btn-warning btn-xs btn_delete"><i
											class="fa fa-trash"></i> {{trans('memberinfo.news_delete')}} </button>
									<button type="button" value="{{$value1 -> perid}}"
									        onclick="status({{$value1 -> perid}},{{$value1 -> status}})"
									        class="btn btn-warning btn-xs btn_delete"><i
											class="fa fa-trash"></i>
										@if($value1 -> status == 1)
											{{trans('memberinfo.news_disable')}}
										@elseif($value1 -> status == 0)
											{{trans('memberinfo.news_enable')}}
										@endif
									</button>
								</td>
							</tr>
						@endforeach
					@endforeach
					</tbody>
				</table>
			</div>
			<!-- /.table-responsive -->
		</div>
		<!-- /.box-body -->
		<div class="box-footer clearfix">
			<div class=" pull-right">{{$per -> links()}}</div>
			<input type="hidden" value="{{$per -> count()}}" id="page_count">
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
		{{--var select_all_btn = 0;--}}
		{{--$( "#data_select" ).click( function () {--}}
			{{--if ( select_all_btn == 0 ) {--}}
				{{--$( "#data_select" ).html( "<i class='glyphicon glyphicon-remove'></i> {{ trans('permission.cancel') }}" );--}}
				{{--$( '.i-checks' ).each( function () {--}}
					{{--$( this ).iCheck( 'check' );--}}
				{{--} );--}}
				{{--select_all_btn = 1;--}}
			{{--}--}}
			{{--else {--}}
				{{--$( "#data_select" ).html( "<i class='glyphicon glyphicon-ok'></i> {{ trans('permission.allAlection') }}" );--}}
				{{--$( '.i-checks' ).iCheck( 'uncheck' );--}}
				{{--select_all_btn = 0;--}}
			{{--}--}}
		{{--} );--}}

		{{--//全选删除--}}
		{{--$( '.select_all' ).click( function () {--}}
			{{--var page_count = $('#page_count').val();--}}
			{{--var vote = [];--}}
			{{--for ( var i = 0 ; i < $( ".i-checks" ).length ; i++ ) {--}}
				{{--if ( $( ".i-checks" ).eq( i ).prop( "checked" ) ) {--}}
					{{--vote.push( $( ".i-checks" ).eq( i ).val() )--}}
				{{--}--}}
			{{--}--}}

			{{--if ( vote.length == 0 ) {--}}
				{{--layer.msg( '{{trans('permission.delete_data')}}' , { time : 1000 } );--}}
				{{--return false;--}}
			{{--}--}}
			{{--//生成询问框--}}
			{{--layer.confirm( "{{trans('permission.is_delete_info')}}" , {--}}
				{{--btn : ["{{trans('permission.confirm')}}" , "{{trans('permission.cancel')}}"]--}}
			{{--} , function () {--}}
				{{--$.ajax( {--}}
					{{--url : '{{URL('per/destroy_all')}}' ,--}}
					{{--type : 'post' ,--}}
					{{--data : {--}}
						{{--'perid' : vote ,--}}
						{{--'_token' : "{{csrf_token()}}"--}}
					{{--} ,--}}
					{{--success : function ( data ) {--}}
						{{--console.log( data );--}}
						{{--if ( data.code == {{config('myconfig.perm.per_delete_success_code')}} ) {--}}
							{{--layer.msg( data.msg , { time : 2000 } , function () {--}}
								{{--if(page_count == vote.length){--}}
									{{--location.href = "{{URL('permission')}}";--}}
								{{--}else{--}}
									{{--window.location.reload();--}}
								{{--}--}}
							{{--} );--}}
						{{--}--}}
						{{--else if ( data.code == {{config('myconfig.perm.per_delete_error_code')}} ) {--}}
							{{--layer.msg( data.msg , { time : 2000 } );--}}
						{{--}--}}
					{{--} ,--}}
					{{--error : function ( result ) {--}}
						{{--// 由于返回422的错误状态码，所以会自动调用ajax的错误函数，不需要人为再手工判断--}}
						{{--console.log( result );--}}
					{{--}--}}
				{{--} )--}}
			{{--} , function () {--}}
				{{--layer.msg( "{{trans('permission.delete_cancel')}}" , {--}}
					{{--time : 1000 , //20s后自动关闭--}}
				{{--} );--}}
			{{--} );--}}
		{{--} );--}}

		//添加
		$('#news_day').click(function(){
			layer.open({
				type: 2,
				title:'{{ trans('permission.news_add') }}',
				moveType: 0,
				skin: 'layui-layer-demo', //加上边框
				closeBtn : 1 ,
				area: ['40%','60%'], //宽高
				shadeClose : false ,
				shade: 0.5,
				content: ["{{URL('per/create')}}"],
				success:function(layero , index){
					$(':focus').blur();
				}
			});
		});

		function d( perid ) {
			var page_count = $('#page_count').val();

			layer.confirm( "{{trans('permission.is_delete_info')}}" , {
				btn : ["{{trans('permission.confirm')}}" , "{{trans('permission.cancel')}}"] //按钮
			} , function () {
				$.post( "{{URL('per/destroy')}}" , { 'perid' : perid , '_token' : "{{csrf_token()}}" } ,
					function ( data ) {
						console.log(data);

						if ( data.code  == {{config('myconfig.perm.per_delete_error_code')}} ) {
							layer.msg( data.msg , { time : 2000 } );
						}

						if(data.code == {{config('myconfig.perm.per_delete_code')}}){
							layer.msg(data.msg,{time:1523});
						}
						else if (  data.code  == {{config('myconfig.perm.per_delete_success_code')}} ) {
							layer.msg( data.msg , { time : 1000 } , function () {
								if(page_count == 1){
									location.href = "{{URL('permission/2')}}";
								}else{
									window.location.reload();
								}
							} );
						}
					} );
			} , function () {
				layer.msg( "{{trans('permission.delete_cancel')}}" , {
					time : 1000 , //10秒鐘后自動關閉
				} );
			} );
		}

		//修改用户信息
		function edit(perid){
			layer.open({
				type: 2,
				title:'{{ trans('permission.news_edits') }}',
				moveType: 0,
				skin: 'layui-layer-demo', //加上边框
				closeBtn : 1 ,
				area: ['40%','50%'], //宽高
				shadeClose : false ,
				shade: 0.5,
				content: ["{{URL('per/edit')}}"+ "/" + perid],
				success:function(layero , index){
					$(':focus').blur();
				}
			});
		}


		{{--//禁用启用--}}
		function status(perid ,status) {
			layer.confirm( "{{trans('memberinfo.is_status_info')}}" , {
				btn : ["{{trans('memberinfo.confirm')}}" , "{{trans('memberinfo.cancel')}}"] //按钮
			} , function () {
				$.post( "{{URL('per/status')}}" , { 'perid' : perid ,status:status, '_token' : "{{csrf_token()}}" } ,
					function ( data ) {
						console.log(data);

						if ( data.code  == {{config('myconfig.perm.per_status_error_code')}} ) {
							layer.msg( data.msg , { time : 2000 } );
						}
						else if (  data.code  == {{config('myconfig.perm.per_status_success_code')}} ) {
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
