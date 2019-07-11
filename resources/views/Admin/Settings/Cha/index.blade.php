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
						{{--<th width="130px">--}}
							{{--<button type="button" class="btn btn-warning btn-xs" id="data_select" data-select-all="true"><i--}}
									{{--class="glyphicon glyphicon-ok"></i>{{ trans('memberinfo.allAlection') }}</button>--}}
						{{--</th>--}}
						<th>{{ trans('cha.ch_nsme') }}</th>
						<th>{{ trans('cha.ch_text') }}</th>
						<th>{{ trans('cha.ch_per') }}</th>
						<th>{{ trans('cha.cstatus') }}</th>
						<th>{{ trans('cha.created_at') }}</th>
						<th>{{ trans('cha.operating') }}</th>
					</tr>
					</thead>
					<tbody>
					@foreach($cha as $value)
						<tr>
							{{--<td><input type="checkbox" class="i-checks" id="groupCheckbox" name="groupCheckbox[]"--}}
							           {{--value="{{$value->memberid}}"--}}
								{{--></td>--}}
							<td>{{ $value -> ch_nsme}}</td>
							<td>{{$value -> ch_text}}</td>
							<td>{{$value -> ch_per}}</td>
							<td>@if($value -> cstatus == 0)禁用@elseif($value -> cstatus == 1)正常@endif</td>

							<td>{{date('Y-m-d H:i',$value -> created_at)}}</td>
							<td>
								<button type="button" value="{{$value -> chid}}" onclick="edit({{$value -> chid}})" class="btn btn-warning btn-xs btn_edit" id="btn_edit"><i
										class="fa fa-edit"></i> {{trans('memberinfo.news_edits')}}</button>
								<button type="button" value="{{$value -> chid}}" onclick="d({{$value -> chid}})"
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
			{{--<a href="javascript:void(0)" class="btn btn-danger btn-xs pull-left select_all"><i--}}
					{{--class="fa fa-trash"></i>{{ trans('memberinfo.select_all_delete') }}</a>--}}
			<div class=" pull-right">{{$cha -> links()}}</div>
			<input type="hidden" value="{{$cha -> count()}}" id="page_count">
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
				content: ["{{URL('cha/create')}}"],
				success:function(layero , index){
					$(':focus').blur();
				}
			});
		});

		function d( chid ) {
			var page_count = $('#page_count').val();
			layer.confirm( "{{trans('memberinfo.is_delete_info')}}" , {
				btn : ["{{trans('memberinfo.confirm')}}" , "{{trans('memberinfo.cancel')}}"] //按钮
			} , function () {
				$.post( "{{URL('cha/destroy')}}" , { 'chid' : chid , '_token' : "{{csrf_token()}}" } ,
					function ( data ) {
						console.log(data);
						if ( data.code  == {{config('myconfig.cha.ch_delete_error_code')}} ) {
							layer.msg( data.msg , { time : 2000 } );
						}
						if (  data.code  == {{config('myconfig.cha.ch_delete_success_code')}} ) {
							layer.msg( data.msg , { time : 1000 } , function () {
								if(page_count == 1){
									location.href = "{{URL('character/2')}}";
								}else{
									window.location.reload();
								}
							} );
						}
						if ( data.code  == {{config('myconfig.member.ch_get_character_code')}} ) {
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
		function edit(chid){
			layer.open({
				type: 2,
				title:'{{ trans('memberinfo.news_edits') }}',
				moveType: 0,
				skin: 'layui-layer-demo', //加上边框
				closeBtn : 1 ,
				area: ['50%','70%'], //宽高
				shadeClose : false ,
				shade: 0.5,
				content: ["{{URL('cha/edit')}}"+ "/" + chid],
				success:function(layero , index){
					$(':focus').blur();
				}
			});
		}
	</script>
@endpush
