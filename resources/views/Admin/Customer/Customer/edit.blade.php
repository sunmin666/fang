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
					       value="{{$omer -> realname}}"
					       onkeyup="value=value.replace(/[\d]/g,'') "
					       maxlength="15">
				</div>
				{{--客户性别--}}
				<div class="form-group">
					<label>{{ trans('customer.sex') }}：</label>
					<div class="zzz">
						<input type="radio" @if($omer ->sex == 1) checked @endif name="sex" value="1" id="sex" class="i-checks">&nbsp;男 &nbsp;&nbsp;
						<input type="radio" @if($omer ->sex == 2) checked @endif name="sex" value="2" id="sex" class="i-checks">&nbsp;女
					</div>
				</div>
				{{--客户手机号--}}
				<div class="form-group">
					<label>{{ trans('customer.mobile')}}：</label>
					<input type="text" class="form-control"
					       onkeyup="value=value.replace(/[^\d.]/g,'')"
					       name="mobile" placeholder='请输入客户手机号' id="mobile"
					       value="{{$omer -> mobile}}"
					       maxlength="11">
				</div>
				{{--客户其他手机号--}}
				<div class="form-group">
					<label>{{ trans('customer.telphone') }}：</label>
					<input type="text" class="form-control" name="telphone"
					       placeholder="请输入其他手机号"
					       onkeyup="value=value.replace(/[^\d.]/g,'')"
					       value="{{$omer -> telphone}}"
					       id="telphone"
					       maxlength="11">
				</div>
				{{--微信--}}
				<div class="form-group">
					<label>{{ trans('customer.weixin') }}：</label>
					<input type="text" class="form-control" name="weixin"
					       onkeyup="value=value.replace(/[^\w\.\/]/ig,'')"
					       value="{{$omer -> weixin}}"
					       placeholder="请输入微信号" id="weixin" maxlength="12">
				</div>
				{{--qq--}}
				<div class="form-group">
					<label>{{ trans('customer.qq') }}：</label>
					<input type="text" class="form-control" name="qq"
					       onkeyup="value=value.replace(/^(0+)|[^\d]+/g,'')"
					       value="{{$omer -> qq}}"
					       placeholder="请输入扣扣号" id="qq" maxlength="12">
				</div>
				{{--邮箱--}}
				<div class="form-group">
					<label>{{ trans('customer.email') }}：</label>
					<input type="text" class="form-control" name="email"
					       placeholder="请输入邮箱" id="email"
					       value="{{$omer -> email}}"
					       maxlength="50">
				</div>
				{{--身份证号--}}
				<div class="form-group">
					<label>{{ trans('customer.idcrad') }}：</label>
					<input type="text" class="form-control" name="idcrad"
					       onkeyup="value=value.replace(/^(0+)|[^\d]+/g,'')"
					       value="{{$omer -> idcard}}"
					       placeholder="请填写身份证号" id="idcrad" maxlength="18">
				</div>

				<input type="hidden" value="{{$omer -> cust_id}}" id="cust_id">

				{{--所属公司--}}
				<div class="form-group">
					<label>{{ trans('customer.comp_id') }}：</label>
					<select name="comp_id" id="comp_id" class="form-control">
						<option value=""> 请选择</option>
						@foreach($company as $k => $v)
							<option value="{{$v -> comp_id}}" @if($v -> comp_id == $omer -> comp_id) selected @endif>{{$v ->comp_cname }}</option>
						@endforeach
					</select>
				</div>

				{{--所属项目--}}
				<div class="form-group">
					<label>{{ trans('customer.proj_id') }}：</label>
					<select name="proj_id" id="proj_id" class="form-control">
						<option value="">请选择项目</option>
						@foreach($project as $k => $v)
						<option value="{{$v -> project_id}}" @if($v -> project_id == $omer -> proj_id) selected @endif>{{$v -> pro_cname}}</option>
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

		$( "#store1" ).attr( 'disabled' , true );
		var realname = $( '#realname' ).val();   //客户姓名   *
		var sex = $( 'input[name= sex]:checked' ).val();   //客户性别  *
		var mobile = $( '#mobile' ).val();  //客户手机号    *
		var telphone = $( '#telphone' ).val();  //客户其他手机号
		var weixin = $( '#weixin' ).val();   // 客户微信;
		var qq = $( '#qq' ).val();    //客户扣扣
		var email = $( '#email' ).val();   //客户邮箱
		var idcrad = $( '#idcrad' ).val();    //客户身份证号
		var proj_id = $( '#proj_id' ).val();    //客户所属项目   *
		var comp_id = $( '#comp_id' ).val();     //客户所属公司   *
		var cust_id = $('#cust_id').val();      //要更新客户资料的自增id


		if (
			realname == '' || sex == '' || mobile == '' || proj_id == '' || comp_id == '' ) {
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
			url : "{{URL('omer/update')}}" ,
			type : 'post' ,
			data : {
				cust_id:cust_id,      //客户资料id
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
				_token : "{{csrf_token()}}"             //post提交token验证
			} ,
			success : function ( data ) {
				console.log( data );
				if ( data.code == {{config('myconfig.omer.update_omer_error_code')}}) {
					layer.msg( data.msg , { time : 2151 } );
					$( "#store1" ).attr( 'disabled' , false );
					return false;
				}
				if ( data.code == {{config('myconfig.omer.update_omer_success_code')}}) {
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
