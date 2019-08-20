@extends('Public.admin')
@push('include-css')
	<!-- bootstrap-fileinput css -->
	<link rel="stylesheet" href="{{URL::asset('bower_components/bootstrap-fileinput/css/fileinput.css')}}">
	<link rel="stylesheet" href="{{URL::asset('css/weekly.css')}}">
	<link rel="stylesheet" href="{{URL::asset('bower_components/layui/dist/css/layui.css')}}">
	<style>
		#news td {
			height      : 50px;
			line-height : 50px;
		}

		.box-body {
			/*height: 1000px;*/
		}

		.tu {
			width : 50%;

			/*height: 500px;*/
			float : left;
		}

		.ceng span {
			display     : inline-block;
			width       : 10%;
			text-align  : right;
			height      : 30px;
			line-height : 30px;
		}

		.ceng button {
			margin-left      : 30px;
			width            : 30px;
			height           : 30px;
			background-color : red;
			line-height      : 30px;
			text-align       : center;
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
		<div id="status_search">
			<form action="{{URL('homegrp/{perid}')}}" method="get">
				{{ csrf_field() }}
				<select name="buildnums" id="aaa">
					<option value="0">--请选择--</option>
					@foreach($buildnum as $k => $v)
						<option value="{{$v -> field_id}}" @if( $unit == $v -> field_id) selected @endif>{{$v -> name}}</option>
					@endforeach
				</select>
				<button type='submit' id="search" class="btn btn-sm {{config('myconfig.config.button_skin')}}">
					<i class="glyphicon glyphicon-search"></i>&nbsp;{{trans('home.home_find')}}
				</button>
			</form>
		</div>

		<div class="box-body">
			<?php if(count( $tu ) != 0){?>
				<?php foreach($tu as $k => $v){?>
						@if( count($v['fang']) == 0)
						<div class="tu"><?php echo count($v['fang'])?>没有房源录入
						</div>
						@else
							<div class="tu">
								<div>{{$v['unit']}}:</div>
								@for($a = 31;$a > 0;$a--)
									<div style="height: 30px">
										<span style="height: 30px;width: 100px;display: inline-block;text-align: right">第{{$a}}层:</span>
										<span>
											@foreach($v['fang'] as $k7 => $v7)
												@if($a == $v7['floor'])
													@if($v7['status'] == 0)
													 <button onclick="update({{$v7['homeid']}})" style="margin-left: 20px;background-color: green;border: none;padding: 5px">{{$v7['roomnums']}}</button>
													@elseif($v7['status'] == 1)
														<button onclick="update({{$v7['homeid']}})" style="margin-left: 20px;background-color: yellow;border: none;padding: 5px">{{$v7['roomnums']}}</button>
													@elseif($v7['status'] == 2)
														<button onclick="update({{$v7['homeid']}})" style="margin-left: 20px;background-color: blue;border: none;padding: 5px">{{$v7['roomnums']}}</button>
													@elseif($v7['status'] == 3)
														<button onclick="update({{$v7['homeid']}})" style="margin-left: 20px;background-color: red;border: none;padding: 5px">{{$v7['roomnums']}}</button>
													@endif
												@endif
											@endforeach
										</span>
									</div>
								@endfor
							</div>
						@endif
				<?php }?>
			<?php }else{?>
				<div>暂无房源信息</div>
			<?php }?>
		</div>
	</div>
@endsection
@push('include-js')
	<!-- bootstrap-fileinput js -->
	<script src="{{URL::asset('bower_components/bootstrap-fileinput/js/fileinput.js')}}"></script>
	<script src="{{URL::asset('bower_components/bootstrap-fileinput/js/locales/zh.js')}}"></script>
	<script src="{{URL::asset('bower_components/layui/dist/layui.js')}}"></script>
	<script type="text/javascript">

		//判断是否选择楼号

		$( '#search' ).click( function () {
			var floor = $( '#aaa' ).val();
			if ( floor == 0 ) {
				layer.msg( '对不起,请选择楼号' , { time : 1236 } );
				return false;
			}
		} );

		//修改房源信息
		function update(homeid){
			layer.open( {
				type : 2 ,
				title : '{{ trans('memberinfo.update_status') }}' ,
				moveType : 0 ,
				skin : 'layui-layer-demo' , //加上边框
				closeBtn : 1 ,
				area : ['50%' , '70%'] , //宽高
				shadeClose : false ,
				shade : 0.5 ,
				content : ["{{URL('homegrp/update_s')}}" + "/" + homeid] ,
				success : function ( layero , index ) {
					$( ':focus' ).blur();
				}
			} );
		}


	</script>
@endpush
