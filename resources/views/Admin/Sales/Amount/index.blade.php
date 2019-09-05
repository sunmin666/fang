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

		</div>
		<div id="status_search">
			<form action="{{URL('amount/52')}}" method="get">
				<label>{{ trans('sales.cust') }}：</label>
				<select name="hous"  class="status">
					<option value="">全部</option>
					@foreach($hous as $kh => $vh)
						<option value="{{$vh -> hous_id}}" @if($houss == $vh -> hous_id) selected @endif>{{$vh -> name}}</option>
					@endforeach
				</select>

				<label>{{ trans('sales.stime') }}：</label>
				<input type="text" value="{{$stimes}}" name="stime" class="layui-input status" id="test1" style="display: inline-block;">

				<label>{{ trans('sales.etime') }}：</label>
				<input type="text" value="{{$etimes}}" name="etime" class="layui-input status" id="test2" style="display: inline-block">

				<button type='submit'  id="search" class="btn btn-sm {{config('myconfig.config.button_skin')}}">
					<i class="glyphicon glyphicon-search"></i>&nbsp;{{trans('sales.search')}}
				</button>
			</form>
		</div>
		<div class="total">总数：{{$total}}</div>
		<div class="box-body">
			<div class="table-responsive">
				<table class="table no-margin">
					<thead>
					<tr>
						<th>{{trans('sales.sort')}}</th>
						{{--职业顾问--}}
						<th>{{trans('sales.hous_id')}}</th>
						{{--职业顾问手机号--}}
						<th>{{trans('sales.iphone')}}</th>
						{{--金额--}}
						<th>{{trans('sales.amount')}}</th>
					</tr>
					</thead>
					<tbody>
					@foreach($amount as $kay => $value)
						<tr>
							<td><?php echo $kay + 1 ?></td>
							<td>{{ $value['name']}}</td>
							<td>{{$value['mobile']}}</td>
							<td>{{$value ['qian']}}</td>
					@endforeach
					</tbody>
				</table>
			</div>
			<!-- /.table-responsive -->
		</div>
		<!-- /.box-body -->
		<div class="box-footer clearfix">
			{{--<div class=" pull-right">{{$customer -> links()}}</div>--}}
			{{--<input type="hidden" value="{{$customer -> count()}}" id="page_count">--}}
		</div>
	</div>
@endsection
@push('include-js')
	<!-- bootstrap-fileinput js -->
	<script src="{{URL::asset('bower_components/bootstrap-fileinput/js/fileinput.js')}}"></script>
	<script src="{{URL::asset('bower_components/bootstrap-fileinput/js/locales/zh.js')}}"></script>
	<script src="{{URL::asset('bower_components/layui/dist/layui.js')}}"></script>
	<script>
		layui.use('laydate',function(){
			var laydate = layui.laydate;

			laydate.render({
				elem: '#test1'
			});

			laydate.render({
				elem: '#test2'
			});

		})
	</script>
@endpush
