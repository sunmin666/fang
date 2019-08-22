<!doctype html>
<html lang="en">
<head>
	@include('Public.weekly_css')
</head>
<body>
<div class="modal-body">
	<div class="box box-warning">
		<div class="box-body">
			{{ csrf_field() }}
			<form role="form" action="#" method="post" name="reg_memberinfo" id="reg_memberinfo">
				{{--楼号--}}
				{{--<div class="form-group">--}}
					{{--<label>{{ trans('home.buildnum') }}：</label>--}}
					{{--<select name="buildnum" id="buildnum" class="form-control">--}}
						{{--<option value="">--请选择--</option>--}}
						{{--@foreach($buildnum as $k => $v)--}}
							{{--<option value="{{$v -> field_id}}" @if($home -> buildnum == $v -> field_id) selected @endif>{{$v ->name }}</option>--}}
						{{--@endforeach--}}
					{{--</select>--}}
				{{--</div>--}}
				{{--单元号--}}
				{{--<div class="form-group">--}}
					{{--<label>{{ trans('home.unitnum') }}：</label>--}}
					{{--<select name="unitnum" id="unitnum" class="form-control">--}}
						{{--<option value="">--请选择--</option>--}}
						{{--@foreach($unitnum as $k => $v)--}}
							{{--<option value="{{$v -> field_id}}" @if($home -> unitnum == $v -> field_id) selected @endif>{{$v ->name }}</option>--}}
						{{--@endforeach--}}
					{{--</select>--}}
				{{--</div>--}}
				{{--房号--}}
				{{--<div class="form-group">--}}
					{{--<label>{{ trans('home.roomnum') }}：</label>--}}
					{{--<select name="roomnum" id="roomnum" class="form-control">--}}
						{{--<option value="">--请选择--</option>--}}
						{{--@foreach($roomnum as $k => $v)--}}
							{{--<option value="{{$v -> field_id}}" @if($home -> roomnum == $v -> field_id) selected @endif>{{$v ->name }}</option>--}}
						{{--@endforeach--}}
					{{--</select>--}}
				{{--</div>--}}
				{{--楼层--}}
				{{--<div class="form-group">--}}
					{{--<label>{{ trans('home.floor') }}：</label>--}}
					{{--<input type="text" class="form-control" name="floor"--}}
					       {{--placeholder="请输入楼层" id="floor"  value="{{$home -> floor}}"--}}
					       {{--onkeyup="this.value=this.value.replace(/\D/g,'')"--}}
					       {{--maxlength="15">--}}
				{{--</div>--}}

				{{--建筑面积--}}
				{{--<div class="form-group">--}}
					{{--<label>{{ trans('home.build_area')}}：</label>--}}
					{{--<input type="text" class="form-control"--}}
					       {{--onkeyup="if(isNaN(value))execCommand('undo')" value="{{$home -> build_area}}"--}}
					       {{--name="build_area" placeholder='请输入建筑面积' id="build_area"--}}
					       {{--maxlength="11">--}}
				{{--</div>--}}
				{{--户型图--}}
				{{--<div class="form-group">--}}
					{{--<label>{{ trans('home.house_img') }}：</label>--}}
					{{--<div class="zzz">--}}
						{{--<button type="button" class="btn" id="test1">--}}
							{{--<i class="layui-icon">&#xe67c;</i>上传图片--}}
						{{--</button>--}}
						{{--<input type="hidden" value="{{$home -> house_img}}" id="n_img" name="n_img">--}}
						{{--<div id="img" style="margin-top: 10px;border: 1px solid #ccc;width: 50px">--}}
							{{--<a href="#" id="preview" target="_blank">--}}
							{{--<img src="{{URL::asset($home -> house_img)}}" alt="" id="imgs" style="width: 50px;height: 50px">--}}
							{{--</a>--}}
						{{--</div>--}}
					{{--</div>--}}
				{{--</div>--}}
				{{--户型结构--}}
				{{--<div class="form-group">--}}
					{{--<label>{{ trans('home.house_str') }}：</label>--}}
					{{--<input type="text" class="form-control" name="house_str" value="{{$home -> house_str}}"--}}
					       {{--placeholder="请输入户型结构" id="house_str" maxlength="12">--}}
				{{--</div>--}}
				{{--房子单价--}}
				{{--<div class="form-group">--}}
					{{--<label>{{ trans('home.price') }}：</label>--}}
					{{--<input type="text" class="form-control" name="price"--}}
					       {{--onkeyup="if(isNaN(value))execCommand('undo')" value="{{$home -> price}}"--}}
					       {{--placeholder="请输入房子单价" id="price" maxlength="12">--}}
				{{--</div>--}}
				{{--折扣--}}
				{{--<div class="form-group">--}}
					{{--<label>{{ trans('home.discount') }}：</label>--}}
					{{--<input type="text" class="form-control" name="discount" value="{{$home -> discount}}"--}}
					       {{--onkeyup="if(isNaN(value))execCommand('undo')"--}}
					       {{--placeholder="请输入折扣" id="discount"--}}
					       {{--maxlength="50">--}}
				{{--</div>--}}
				{{--房子状态--}}
				<div class="form-group">
					<label>{{ trans('home.status') }}：</label>
					<select name="status" id="status" class="form-control">
						<option value="0" style="background-color: green;color:#fff" @if($home -> status == 0) selected @endif>认购前</option>
						<option value="1" style="background-color: yellow;color:#000" @if($home -> status == 1) selected @endif>预定房源申请中</option>
						<option value="2" style="background-color: blue;color:#fff" @if($home -> status == 2) selected @endif>以认购</option>
						<option value="3" style="background-color: red;color:#fff" @if($home -> status == 3) selected @endif>以签约</option>
					</select>
				</div>
				{{--认购编号--}}
				{{--<div class="form-group">--}}
					{{--<label>{{ trans('home.buyid') }}：</label>--}}
					{{--<input type="text" class="form-control" name="buyid" value="{{$home -> buyid}}"--}}
					       {{--placeholder="请输入认购编号" id="buyid"--}}
					       {{--onkeyup="value=value.replace(/[\W]/g,'')"--}}
					       {{--maxlength="50">--}}
				{{--</div>--}}

				{{--房子状态备注--}}
				{{--<div class="form-group">--}}
					{{--<label>{{ trans('home.remarks') }}：</label>--}}
					{{--<textarea name="remarks" id="remarks"--}}
					          {{--cols="30" rows="5" class="form-control" placeholder="请输入备注">{{$home -> remarks}}</textarea>--}}
				{{--</div>--}}

				{{ csrf_field()}}
			</form>
		</div>
	</div>
	<div class="add_button">
		<button type="button" class="btn btn-dropbox" id="store1">{{ trans('company.save') }}</button>
	</div>
</div>
</body>
@include('Public.weekly_js')

<script>
	//添加到数据库
	$( '#store1' ).click( function () {
		$( "#store1" ).attr( 'disabled' , true );

		var status = $( '#status' ).val();              //状态

		$.ajax( {
			url : "{{URL('homegrp/update_ss')}}" ,
			type : 'post' ,
			data : {
				homeid : "{{$home -> homeid}}",
				status : status ,    //状态
				_token : "{{csrf_token()}}"             //post提交token验证
			} ,
			success : function ( data ) {
				console.log( data );
				if ( data.code == {{config('myconfig.home.home_update_error_code')}}) {
					layer.msg( data.msg , { time : 2151 } );
					$( "#store1" ).attr( 'disabled' , false );
					return false;
				}
				if ( data.code == {{config('myconfig.home.home_update_success_code')}}) {
					layer.msg( data.msg , { time : 2000 } , function () {
						window.parent.location.reload();
					} );
				}

				{{--if ( data.code == {{config('myconfig.home.roomnum_code')}}) {--}}
					{{--layer.msg( data.msg , { time : 2000 } );--}}
					{{--$( "#store1" ).attr( 'disabled' , false );--}}
					{{--return false;--}}
				{{--}--}}

			}
		} )
	} )
</script>
</html>
