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
				<div class="form-group">
					<label>{{ trans('home.buildnum') }}：</label>
					<select name="buildnum" id="buildnum" class="form-control">
						<option value="">--请选择--</option>
						@foreach($buildnum as $k => $v)
						<option value="{{$v -> field_id}}">{{$v ->name }}</option>
						@endforeach
					</select>
				</div>
				{{--单元号--}}
				<div class="form-group">
					<label>{{ trans('home.unitnum') }}：</label>
					<select name="unitnum" id="unitnum" class="form-control">
						<option value="">--请选择--</option>
					</select>
				</div>
				{{--房号--}}
				<div class="form-group">
					<label>{{ trans('home.roomnum') }}：</label>
					<select name="roomnum" id="roomnum" class="form-control">
						<option value="">--请选择--</option>
					</select>
				</div>
					{{--楼层--}}
				<div class="form-group">
					<label>{{ trans('home.floor') }}：</label>
					<input type="text" class="form-control" name="floor"
					       placeholder="请输入楼层" id="floor"
					       onkeyup="value=value.replace(/[^\d.]/g,'')"
					       maxlength="15">
				</div>

				{{--建筑面积--}}
				<div class="form-group">
					<label>{{ trans('home.build_area')}}：</label>
					<input type="text" class="form-control"
					       onkeyup="value=value.replace(/[^\d.]/g,'')"
					       name="build_area" placeholder='请输入建筑面积' id="build_area"
					       maxlength="11">
				</div>
				{{--户型图--}}
				<div class="form-group">
					<label>{{ trans('home.house_img') }}：</label>
					<div class="zzz">
						<button type="button" class="btn" id="test1">
							<i class="layui-icon">&#xe67c;</i>上传图片
						</button>
						<input type="hidden" value="" id="n_img" name="n_img">
						<div id="img" style="margin-top: 10px;border: 1px solid #ccc;width: 50px">
							{{--<a href="#" id="preview" target="_blank">--}}
								<img src="" alt="" id="imgs" style="width: 50px;height: 50px">
							{{--</a>--}}
						</div>
					</div>
				</div>
				{{--户型结构--}}
				<div class="form-group">
					<label>{{ trans('home.house_str') }}：</label>
					<input type="text" class="form-control" name="house_str"
					       placeholder="请输入户型结构" id="house_str" maxlength="12">
				</div>
				{{--房子单价--}}
				<div class="form-group">
					<label>{{ trans('home.price') }}：</label>
					<input type="text" class="form-control" name="price"
					       onkeyup="value=value.replace(/[^\d.]/g,'')"
					       placeholder="请输入房子单价" id="price" maxlength="12">
				</div>
				{{--折扣--}}
				<div class="form-group">
					<label>{{ trans('home.discount') }}：</label>
					<input type="text" class="form-control" name="discount"
					       onkeyup="value=value.replace(/[^\d.]/g,'')"
					       placeholder="请输入折扣" id="discount"
					       maxlength="50">
				</div>
				{{--房子状态--}}
				<div class="form-group">
					<label>{{ trans('home.status') }}：</label>
					<select name="status" id="status" class="form-control">
						<option value="">--请选择--</option>
						<option value="0" class=" btn-success btn-sm">认购前</option>
						<option value="1" class="btn-warning btn-sm" >预定房源申请中</option>
						<option value="2" class="btn-info btn-sm" >已认购</option>
						<option value="3" class="btn-danger btn-sm" >已签约</option>
					</select>
				</div>

        {{--认购编号--}}
				<div class="form-group">
					<label>{{ trans('home.buyid') }}：</label>
					<input type="text" class="form-control" name="buyid"
					       placeholder="请输入认购编号" id="buyid"
					       onkeyup="value=value.replace(/[\W]/g,'')"
					       maxlength="50">
				</div>

				{{--房子状态备注--}}
				<div class="form-group">
					<label>{{ trans('home.remarks') }}：</label>
					<textarea name="remarks" id="remarks"
					          cols="30" rows="5" class="form-control" placeholder="请输入备注"></textarea>
				</div>

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
	//复选框样式
	$( ".i-checks" ).iCheck( {
		checkboxClass : "{{config('myconfig.config.checkbox_skin')}}" ,   //复选框样式
		radioClass : "{{config('myconfig.config.checkbox_skin')}}"   //单选框样式
	} );


	layui.use( 'upload' , function () {
		var upload = layui.upload;
		var token = $( '[name=_token]' ).val();
		var uploadInst = upload.render( {
			elem : '#test1' //绑定元素
			, url : '{{URL('lupload')}}' //上传接口
			, data : {
				_token : token ,
			}
			, done : function ( res ) {

				console.log(res);
				if ( res.code == 1 ) {
					// $( '#imgs' ).attr( 'src' , res.data.src );
					$( '#imgs' ).attr( 'src' , "{{URL::asset("")}}" + res.data.src );
					$( '#n_img' ).val( res.data.src );
					{{--$('#preview').attr('href',"{{URL::asset("")}}" + res.data.src);--}}
					layer.msg( '上傳成功' , { time : 1000 } )
				}
				else {
					layer.msg( '上傳失敗' , { time : 1000 } )
				}
			}
			, error : function () {
				//请求异常回调
			}
		} );
	} );

</script>
<script>
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
					var cc = '<option value="">--请选择--</option>';

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
					var aa = '<option value="">--请选择--</option>';
					$( '#roomnum' ).html( aa + str );
			}
		} )
	} );
	//添加到数据库
	$( '#store1' ).click( function () {
		// $( "#store1" ).attr( 'disabled' , true );
		var buildnum = $( '#buildnum' ).val();          //楼号
		var unitnum = $( '#unitnum' ).val();            //单元号
		var roomnum = $( '#roomnum' ).val();            //房号
		var floor = $( '#floor' ).val();                //楼层
		var build_area = $( '#build_area' ).val();      //建筑面积
		var n_img = $( '#n_img' ).val();                //户型图
		var house_str = $( '#house_str' ).val();        //户型结构
		var price = $( '#price' ).val();                //单价
		var discount = $( '#discount' ).val();          //折扣
		var status = $( '#status' ).val();              //状态
		var buyid = $( '#buyid' ).val();                //认购编码
		var remarks = $( '#remarks' ).val();            //状态备注

		var regEn = {{config('myconfig.config.regEn')}};
		var regCn = {{config('myconfig.config.regCn')}};

		if ( buildnum == '' || unitnum == '' || roomnum == '' || floor == '' || build_area == ''
			|| n_img == '' ||  house_str == '' || price == '' || discount == '' || status == '' || buyid == '' || remarks == ''
		) {
			layer.msg( '{{trans('company.text_content1')}}' , { time : 1235 } );
			$( "#store1" ).attr( 'disabled' , false );
			return false;
		}

		if(regEn.test( remarks )){
			layer.msg( '{{trans('home.text_content1')}}' , { time : 1235 } );
			$( "#store1" ).attr( 'disabled' , false );
			return false;
		}

		if(regCn.test( remarks )){
			layer.msg( '111' , { time : 1235 } );
			$( "#store1" ).attr( 'disabled' , false );
			return false;
		}


		$.ajax( {
			url : "{{URL('home/store')}}" ,
			type : 'post' ,
			data : {
				buildnum : buildnum ,         //楼号
				unitnum : unitnum ,         //单元号
				roomnum : roomnum ,         //房号
				floor : floor ,           //楼层
				build_area : build_area ,         //建筑面积
				n_img : n_img ,             //户型图
				house_str : house_str ,            //户型结构
				price : price ,          //单价
				discount : discount ,      //折扣
				status : status ,    //状态
				buyid:buyid,              //认购编号
				remarks:remarks,            //状态备注
				_token : "{{csrf_token()}}"             //post提交token验证
			} ,
			success : function ( data ) {
				console.log( data );
				if ( data.code == {{config('myconfig.home.home_error_home_code')}}) {
					layer.msg( data.msg , { time : 2151 } );
					$( "#store1" ).attr( 'disabled' , false );
					return false;
				}

				if ( data.code == {{config('myconfig.home.home_success_home_code')}}) {
					layer.msg( data.msg , { time : 2000 } , function () {
						window.parent.location.reload();
					} );
				}

				if ( data.code == {{config('myconfig.home.roomnum_code')}}) {
					layer.msg( data.msg , { time : 2000 } );
					$( "#store1" ).attr( 'disabled' , false );
					return false;
				}

			}
		} )
	} )
</script>
</html>
