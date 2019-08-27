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
				<div class="form-group">
					{{--客户真实姓名--}}
					<label>{{ trans('customer.realname') }}：</label>
					<input type="text" class="form-control" name="realname"
					       placeholder="请输客户姓名" id="realname"
					       onkeyup="value=value.replace(/[\d]/g,'') "
					       maxlength="15">
				</div>
				{{--客户性别--}}
				<div class="form-group">
					<label>{{ trans('customer.sex') }}：</label>
					<div class="zzz">
						<input type="radio" name="sex" value="1" id="sex" class="i-checks">&nbsp;男 &nbsp;&nbsp;
						<input type="radio" name="sex" value="2" id="sex" class="i-checks">&nbsp;女
					</div>
				</div>
				{{--客户手机号--}}
				<div class="form-group">
					<label>{{ trans('customer.mobile')}}：</label>
					<input type="text" class="form-control"
					       onkeyup="value=value.replace(/[^\d.]/g,'')"
					       name="mobile" placeholder='请输入客户手机号' id="mobile"
					       maxlength="11">
				</div>
				{{--客户其他手机号--}}
				<div class="form-group">
					<label>{{ trans('customer.telphone') }}：</label>
					<input type="text" class="form-control" name="telphone"
					       placeholder="请输入其他手机号"
					       onkeyup="value=value.replace(/[^\d.]/g,'')"
					       id="telphone"
					       maxlength="11">
				</div>
				{{--微信--}}
				<div class="form-group">
					<label>{{ trans('customer.weixin') }}：</label>
					<input type="text" class="form-control" name="weixin"
					       onkeyup="value=value.replace(/[^\w\.\/]/ig,'')"
					       placeholder="请输入微信号" id="weixin" maxlength="12">
				</div>
				{{--qq--}}
				<div class="form-group">
					<label>{{ trans('customer.qq') }}：</label>
					<input type="text" class="form-control" name="qq"
					       onkeyup="value=value.replace(/^(0+)|[^\d]+/g,'')"
					       placeholder="请输入扣扣号" id="qq" maxlength="12">
				</div>
				{{--邮箱--}}
				<div class="form-group">
					<label>{{ trans('customer.email') }}：</label>
					<input type="text" class="form-control" name="email"
					       placeholder="请输入邮箱" id="email"
					       maxlength="50">
				</div>
				{{--身份证号--}}
				<div class="form-group">
					<label>{{ trans('customer.idcrad') }}：</label>
					<input type="text" class="form-control" name="idcrad"
					       onkeyup="value=value.replace(/^(0+)|[^\d]+/g,'')"
					       placeholder="请填写身份证号" id="idcrad" maxlength="18">
				</div>


				<div class="form-group">
					<label>{{ trans('customer.comp_id') }}：</label>
					<select name="comp_id" id="comp_id" class="form-control">
						<option value="">--请选择--</option>
						<option value="1">西安开米</option>
					</select>
				</div>

				{{--所属项目--}}
				<div class="form-group">
					<label>{{ trans('customer.proj_id') }}：</label>
					<select name="proj_id" id="proj_id" class="form-control">
						<option value="">请选择项目</option>
						@foreach($project as $k => $v)
						<option value="{{$v -> project_id}}">{{$v -> pro_cname}}</option>
						@endforeach
					</select>
				</div>

				{{--客户认知渠道--}}
				<div class="form-group">
					<label>{{ trans('customer.cognition') }}：</label>
					<select name="cognition" id="cognition" class="form-control">
						<option value="">--请选择--</option>
						@foreach($cognition as $k => $v)
							<option value="{{$v -> field_id}}">{{$v -> name}}</option>
						@endforeach
					</select>
				</div>

				{{--家庭结构--}}
				<div class="form-group">
					<label>{{ trans('customer.family_str') }}：</label>
					<select name="family_str" id="family_str" class="form-control">
						<option value="">--请选择--</option>
						@foreach($family_str as $k => $v)
							<option value="{{$v -> field_id}}">{{$v -> name}}</option>
						@endforeach
					</select>
				</div>

				{{--工作类型--}}
				<div class="form-group">
					<label>{{ trans('customer.work_type') }}：</label>
					<select name="work_type" id="work_type" class="form-control">
						<option value="">--请选择--</option>
						@foreach($work_type as $k => $v)
							<option value="{{$v -> field_id}}">{{$v -> name}}</option>
						@endforeach
					</select>
				</div>

				{{--联系地址--}}
				<div class="form-group">
					<label>{{ trans('customer.address') }}：</label>
					<input type="text" class="form-control" name="address"
						   placeholder="请输入联系地址"
						   id="address"
						   maxlength="25">
				</div>

				{{--意向面积--}}
				<div class="form-group">
					<label>{{ trans('customer.intention_area') }}：</label>
					<select name="intention_area" id="intention_area" class="form-control">
						<option value="">--请选择--</option>
						@foreach($intention_area as $k => $v)
							<option value="{{$v -> field_id}}">{{$v -> name}}</option>
						@endforeach
					</select>
				</div>

				{{--楼层偏好--}}
				<div class="form-group">
					<label>{{ trans('customer.floor_like') }}：</label>
					<select name="floor_like" id="floor_like" class="form-control">
						<option value="">--请选择--</option>
						@foreach($floor_like as $k => $v)
							<option value="{{$v -> field_id}}">{{$v -> name}}</option>
						@endforeach
					</select>
				</div>

				{{--家具需求--}}
				<div class="form-group">
					<label>{{ trans('customer.furniture_need') }}：</label>
					<select name="furniture_need" id="furniture_need" class="form-control">
						<option value="">--请选择--</option>
						@foreach($furniture_need as $k => $v)
							<option value="{{$v -> field_id}}">{{$v -> name}}</option>
						@endforeach
					</select>
				</div>

				{{--置业此数--}}
				<div class="form-group">
					<label>{{ trans('customer.house_num') }}：</label>
					<select name="house_num" id="house_num" class="form-control">
						<option value="">--请选择--</option>
						@foreach($house_num as $k => $v)
							<option value="{{$v -> field_id}}">{{$v -> name}}</option>
						@endforeach
					</select>
				</div>

				{{--首次接触方式--}}
				<div class="form-group">
					<label>{{ trans('customer.first_contact') }}：</label>
					<select name="first_contact" id="first_contact" class="form-control">
						<option value="">--请选择--</option>
						@foreach($first_contact as $k => $v)
							<option value="{{$v -> field_id}}">{{$v -> name}}</option>
						@endforeach
					</select>
				</div>

				{{--客户状态--}}
				<div class="form-group">
					<label>{{ trans('customer.status_id') }}：</label>
					<select name="status_id" id="status_id" class="form-control">
						<option value="">--请选择--</option>
						@foreach($status_id as $k => $v)
							<option value="{{$v -> field_id}}">{{$v -> name}}</option>
						@endforeach
					</select>
				</div>

				{{--职业顾问--}}
				<div class="form-group">
					<label>{{ trans('customer.hous_id') }}：</label>
					<select name="hous_id" id="hous_id" class="form-control">
						<option value="">--请选择--</option>
						@foreach($hous_id as $k => $v)
							<option value="{{$v -> hous_id}}">{{$v -> name}}</option>
						@endforeach
					</select>
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
</script>
<script>

	//下拉框联动
	$( "#comp_id" ).change( function () {
		var comp_id = $( this ).val();
		$.ajax( {
			url : "{{URL('comp_id')}}" ,
			type : "post" ,
			data : {
				comp_id : comp_id ,
				_token : "{{csrf_token()}}"
			} ,
			success : function ( data ) {
				console.log( data );
				var str = '';
				for ( var ig = 0 ; ig < data.length ; ig++ ) {
					str += "<option value='" + data[ig]['project_id'] + "'> " + data[ig]['pro_cname'] + " </option>"
				}
				$( '#proj_id' ).html( str );
			}
		} )
	} );


	//添加到数据库

	$( '#store1' ).click( function () {

//		$( "#store1" ).attr( 'disabled' , true );
		var realname = $( '#realname' ).val();   //客户姓名   *
		var sex = $( 'input[name= sex]:checked' ).val();   //客户性别  *
		var mobile = $( '#mobile' ).val();  //客户手机号    *
		var telphone = $( '#telphone' ).val();  //客户其他手机号
		var weixin = $( '#weixin' ).val();   // 客户微信;
		var qq = $( '#qq' ).val();    //客户扣扣
		var email = $( '#email' ).val();   //客户邮箱
		var idcrad = $( '#idcrad' ).val();    //客户身份证号
		var proj_id = $( '#proj_id' ).val();    //客户所属项目   *
		var comp_id = $( '#comp_id' ).val();     //客户所属公司
		var cognition = $( '#cognition' ).val(); //客户认知渠道
		var family_str = $( '#family_str' ).val(); //家庭结构
		var work_type = $( '#work_type' ).val(); //工作类型
		var address = $( '#address' ).val(); //联系地址
		var intention_area = $( '#intention_area' ).val(); //意向面积
		var floor_like = $( '#floor_like' ).val(); //楼层偏好
		var furniture_need = $( '#furniture_need' ).val(); //家具需求
		var house_num = $( '#house_num' ).val(); //置业此数
		var first_contact = $( '#first_contact' ).val(); //首次接触方式
		var status_id = $( '#status_id' ).val(); //客户状态hous_id
		var hous_id = $( '#hous_id' ).val(); 	//职业顾问

//		alert(hous_id);
//		return false;

		if (
			realname == '' || sex == '' || mobile == '' || proj_id == '' || comp_id == ''||
			cognition == '' || family_str == '' || work_type =='' || address == '' ||
			intention_area == '' || floor_like == '' || furniture_need == ''|| house_num == ''||
			first_contact == ''	||	status_id == '' || hous_id == ''
		) {
			layer.msg( '{{trans('company.text_content1')}}' , { time : 1235 } );
			$( "#store1" ).attr( 'disabled' , false );
			return false;
		}

		var email_pattern = {{config('myconfig.config.email_pattern')}};       //邮箱正则匹配
		var mobile_pattern = {{config('myconfig.config.mobile_pattern')}};   //手机号正则匹配
		var idcard_pattern = {{config('myconfig.config.idcard_pattern')}};           //身份证正则表达式


		//验证顾问手机号是否合法
		if ( !mobile_pattern.test( mobile ) ) {
			layer.msg( '{{trans('consu.text_content3')}}' , { time : 1456 } );
			$( '#store1' ).attr( 'disabled' , false );
			return false;
		}


		if ( telphone != '' ) {
			if ( !mobile_pattern.test( telphone ) ) {
				layer.msg( '{{trans('consu.text_content3')}}' , { time : 1546 } );
				$( "#store1" ).attr( 'disabled' , false );
				return false;
			}
		}

		if ( email != '' ) {
			if ( !email_pattern.test( email ) ) {
				layer.msg( '{{trans('consu.text_content2')}}' , { time : 1546 } );
				$( "#store1" ).attr( 'disabled' , false );
				return false;
			}
		}

		{{--//验证顾问身份证号是否能合法--}}
		if ( idcrad != '' ) {
			if ( !idcard_pattern.test( idcrad ) ) {
				layer.msg( '{{trans('consu.text_content4')}}' , { time : 1546 } );
				$( "#store1" ).attr( 'disabled' , false );
				return false;
			}
		}

		$.ajax( {
			url : "{{URL('omer/store')}}" ,
			type : 'post' ,
			data : {
				realname : realname ,         //客户姓名
				sex : sex ,         //客户性别
				mobile : mobile ,         //客户手机号
				telphone : telphone ,           //其他手机号
				weixin : weixin ,         //微信
				qq : qq ,             //扣扣号
				email : email ,            //邮箱
				idcrad : idcrad ,          //身份证号
				proj_id : proj_id ,      //所属项目id
				comp_id : comp_id ,    //所属公司id
				cognition : cognition,	 //客户认知渠道
				family_str : family_str,  //家庭结构
				work_type : work_type,   //工作类型
				address : address,		//联系地址
				intention_area : intention_area,  //意向面积
				floor_like : floor_like,     //楼层偏好
				furniture_need : furniture_need, //家具需求
				house_num : house_num,		//置业此数
				first_contact : first_contact,   //首次接触方式
				status_id : status_id,      //客户状态
				hous_id : hous_id,			//职业顾问
				_token : "{{csrf_token()}}"             //post提交token验证
			} ,
			success : function ( data ) {
				console.log( data );
				if ( data.code == {{config('myconfig.omer.omer_store_error_code')}}) {
					layer.msg( data.msg , { time : 2151 } );
					$( "#store1" ).attr( 'disabled' , false );
					return false;
				}

				if ( data.code == {{config('myconfig.omer.omer_store_success_code')}}) {
					layer.msg( data.msg , { time : 2000 } , function () {
						window.parent.location.reload();
					} );
				}

				if ( data.code == {{config('myconfig.omer.mobile_code')}}) {
					layer.msg( data.msg , { time : 2000 } );
					$( "#store1" ).attr( 'disabled' , false );
					return false;
				}

				if ( data.code == {{config('myconfig.omer.email_code')}}) {
					layer.msg( data.msg , { time : 2000 } );
					$( "#store1" ).attr( 'disabled' , false );
					return false;
				}
				if ( data.code == {{config('myconfig.omer.idcrad_code')}}) {
					layer.msg( data.msg , { time : 2000 } );
					$( "#store1" ).attr( 'disabled' , false );
					return false;

				}
			}
		} )
	} )
</script>
</html>
