@extends('Public.admin')
@push('include-css')
	<!-- bootstrap-fileinput css -->
	<link rel="stylesheet" href="{{URL::asset('bower_components/bootstrap-fileinput/css/fileinput.css')}}">
	<link rel="stylesheet" href="{{URL::asset('css/weekly.css')}}">
	{{--<link rel="stylesheet" href="{{URL::asset('bower_components/layui/dist/css/layui.css')}}">--}}
	<link rel="stylesheet" href="{{URL::asset('assetss/layui/css/layui.css')}}">
	<link rel="stylesheet" href="{{URL::asset('assetss/common.css')}}"/>
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
				<table id="table1" class="layui-table" lay-filter="table1"></table>
			</div>
			<!-- /.table-responsive -->
		</div>
		<!-- /.box-body -->
		<div class="box-footer clearfix">
			{{--<a href="javascript:void(0)" class="btn btn-danger btn-xs pull-left select_all"><i--}}
			{{--class="fa fa-trash"></i>{{ trans('memberinfo.select_all_delete') }}</a>--}}
			{{--<div class=" pull-right">{{$company -> links()}}</div>--}}
			{{--<input type="hidden" value="{{$company -> count()}}" id="page_count">--}}
		</div>
	</div>
@endsection
@push('include-js')
	<!-- bootstrap-fileinput js -->
	<script src="{{URL::asset('bower_components/bootstrap-fileinput/js/fileinput.js')}}"></script>
	<script src="{{URL::asset('bower_components/bootstrap-fileinput/js/locales/zh.js')}}"></script>
	<script src="{{URL::asset('assetss/layui/layui.js')}}"></script>
	<script type="text/html" id="oper-col">
		<a class=" btn btn-warning btn-xs btn_edit" lay-event="edit"><i
				class="fa fa-edit"></i>&nbsp;修改</a>
		<a class="btn btn-warning btn-xs btn_edit" lay-event="del"><i
				class="fa fa-trash"></i>&nbsp;删除</a>
	</script>
	<script type="text/javascript">
		//複選框樣式
		$( ".i-checks" ).iCheck( {
			checkboxClass : "{{config('myconfig.config.checkbox_skin')}}" ,
		} );
		//刷新按鈕
		$( '#refresh' ).click( function () {
			window.location.reload();
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
				content : ["{{URL('field/create')}}"] ,
				success : function ( layero , index ) {
					$( ':focus' ).blur();
				}
			} );
		} );

		//删除信息
		function d( field_id ) {
			layer.confirm( "{{trans('memberinfo.is_delete_info')}}" , {
				btn : ["{{trans('memberinfo.confirm')}}" , "{{trans('memberinfo.cancel')}}"] //按钮
			} , function () {
				$.post( "{{URL('field/destroy')}}" , { 'field_id' : field_id , '_token' : "{{csrf_token()}}" } ,
					function ( data ) {
						console.log( data );
						if ( data.code == {{config('myconfig.field.subclass_code')}} ) {
							layer.msg( data.msg , { time : 2000 } );
						}
						if ( data.code == {{config('myconfig.field.delete_success_field_code')}} ) {
							layer.msg( data.msg , { time : 1000 } , function () {
									window.location.reload();
							} );
						}
						if ( data.code == {{config('myconfig.field.delete_error_field_code')}} ) {
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
		function edit( field_id ) {
			layer.open( {
				type : 2 ,
				title : '{{ trans('memberinfo.news_edits') }}' ,
				moveType : 0 ,
				skin : 'layui-layer-demo' , //加上边框
				closeBtn : 1 ,
				area : ['50%' , '70%'] , //宽高
				shadeClose : false ,
				shade : 0.5 ,
				content : ["{{URL('field/edit')}}" + "/" + field_id] ,
				success : function ( layero , index ) {
					$( ':focus' ).blur();
				}
			} );
		}
	</script>


	<script>
		layui.config({
			base: 'module/'
		}).extend({
			treetable: 'treetable-lay/treetable'
		}).use(['layer', 'table', 'treetable'], function () {
			var $ = layui.jquery;
			var table = layui.table;
			var layer = layui.layer;
			var treetable = layui.treetable;
			// 渲染表格
			var renderTable = function () {
				layer.load(2);
				treetable.render({
					treeColIndex: 1,
					treeSpid: 0,
					treeIdName: 'field_id',
					treePidName: 'parent_field_id',
					treeDefaultClose: true,
					treeLinkage: false,
					elem: '#table1',
					// url: 'json/data.json',
					url: '{{URL::asset('fieldinfo/json/data.json')}}',
					page: true,
					cols: [[
						{type: 'numbers'},
						{field: 'name', title: '名称'},
						{field: 'names', title: '父类'},
						{field: 'created_at', title: '录入时间'},
						{field: 'updated_at', title: '更新时间'},
						{templet: '#oper-col', title: '操作'}
					]],
					done: function () {
						layer.closeAll('loading');
					}
				});
			};

			renderTable();

			$('#btn-expand').click(function () {
				treetable.expandAll('#table1');
			});

			$('#btn-fold').click(function () {
				treetable.foldAll('#table1');
			});

			$('#btn-refresh').click(function () {
				renderTable();
			});

			//监听工具条
			table.on('tool(table1)', function (obj) {
				var data = obj.data;
				var layEvent = obj.event;
				var field_id = data.id;
				if (layEvent === 'del') {
					if(field_id == 1 || field_id == 6 || field_id == 17){
						layer.msg('对不起父类信息，不能删除',{time:1230});
					}else{
						d(field_id);
					}
				} else if (layEvent === 'edit') {
					edit(field_id);
				}
			});
		});



	</script>

@endpush
