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
			<form action="{{URL('types/52')}}" method="get">
				<label>{{ trans('sales.cust') }}：</label>
				<select name="hous"  class="status">
					<option value="">全部</option>
					@foreach($hous as $kh => $vh)
					<option value="{{$vh -> hous_id}}" @if($houss == $vh -> hous_id) selected @endif>{{$vh -> name}}</option>
					@endforeach
				</select>
				<label>{{ trans('sales.type') }}：</label>
				<select name="type" class="status">
					<option value="">全部</option>
					@foreach($type as $kt => $vt)
						<option value="{{$vt -> field_id}}" @if($types == $vt -> field_id) selected @endif>{{$vt -> name}}</option>
					@endforeach
				</select>
				<label>{{ trans('sales.type_all') }}：</label>
				<select name="type_all" class="status">
					<option value="">全部</option>
					<option value="cognition" @if($type_all == 'cognition') selected @endif>认知渠道</option>
					<option value="ownership" @if($type_all == 'ownership') selected @endif>置业关注</option>
					<option value="purpose" @if($type_all == 'purpose') selected @endif>置业目的</option>
					<option value="area" @if($type_all == 'area') selected @endif>客户区域</option>
					<option value="residence" @if($type_all == 'residence') selected @endif>居住类型</option>
					<option value="intention_area" @if($type_all == 'intention_area') selected @endif>意向面积区间</option>
					<option value="floor_like" @if($type_all == 'floor_like') selected @endif>楼层偏好</option>
					<option value="structure" @if($type_all == 'structure') selected @endif>户型结构</option>
					<option value="demand" @if($type_all == 'demand') selected @endif>车位需求</option>
					<option value="apartment" @if($type_all == 'apartment') selected @endif>关注户型</option>
					<option value="furniture_need" @if($type_all == 'furniture_need') selected @endif>家具需求</option>
					<option value="house_num" @if($type_all == 'house_num') selected @endif>置业次数</option>
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
						{{--客户真实姓名--}}
						<th>{{ trans('customer.realname') }}</th>
						{{--客户性别--}}
						<th>{{ trans('customer.sex') }}</th>
						{{--客户手机号--}}
						<th>{{ trans('customer.mobile') }}</th>
						{{--客户的邮箱--}}
						<th>{{ trans('customer.email') }}</th>
						{{--所属醒目--}}
						<th>{{trans('customer.hous_id')}}</th>
						{{--客户录入时间--}}
						<th>{{trans('customer.created_at')}}</th>
					</tr>
					</thead>
					<tbody>
					@foreach($customer as $value)
						<tr>
							<td>{{ $value -> realname}}</td>
							<td>@if($value -> sex == 1) {{ trans('customer.male') }} @elseif($value -> sex == 2) {{ trans('customer.female') }} @endif</td>
							<td>{{$value -> mobile}}</td>
							<td>@if($value-> email == '') {{ trans('customer.no_email') }} @else {{$value -> email}} @endif</td>
							<td>{{$value -> name}}</td>
							<td>{{date('Y-m-d H:i',$value -> created_at)}}</td>
					@endforeach
					</tbody>
				</table>
			</div>
			<!-- /.table-responsive -->
		</div>
		<!-- /.box-body -->
		<div class="box-footer clearfix">
			<div class=" pull-right">{{$customer -> appends(['hous'=>$houss,'type'=> $types,'type_all' => $type_all,'stimes' => $stimes,'etimes'=> $etimes]) -> links()}}</div>
			<input type="hidden" value="{{$customer -> count()}}" id="page_count">
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
