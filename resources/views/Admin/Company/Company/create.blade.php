<!doctype html>
<html lang="en">
<head>
	@include('Public.weekly_css')
	<style>
		#img {
			background : #fff;
			width      : 36px;
			height     : 36px;
		}

		.zzz {
			display     : flex;
			align-items : center;
		}

		#test1 {
			margin-right : 20px;
		}

		#imgs {
			width  : 36px;
			height : 36px;
		}
	</style>
</head>
<body>
<div class="modal-body">
	<div class="box box-warning">
		<div class="box-body">
			{{ csrf_field() }}
			<form role="form" action="#" method="post" name="reg_memberinfo" id="reg_memberinfo">
				<div class="form-group">
					{{--公司中文名称1--}}
					<label>{{ trans('company.comp_cname') }}：</label>
					<input type="text" class="form-control" name="comp_cname" placeholder="{{ trans('company.please_comp_cname') }}" id="comp_cname"
					       maxlength="50">
				</div>
				{{--公司英文名称1--}}
				<div class="form-group">
					<label>{{ trans('company.comp_ename') }}：</label>
					<input type="text" class="form-control" maxlength="100" placeholder="{{ trans('company.please_comp_ename') }}"
					       name="comp_ename" id="comp_ename">
				</div>
				{{--公司法人代表1--}}
				<div class="form-group">
					<label>{{ trans('company.corporation')}}：</label>
					<input type="text" class="form-control" name="corporation" placeholder="{{ trans('company.please_corporation') }}" id="corporation"
					       maxlength="12">
				</div>
				{{--公司身份证号1--}}
				<div class="form-group">
					<label>{{ trans('company.corp_idcard') }}：</label>
					<input type="text" oninput = "value=value.replace(/[^\d]/g,'')" class="form-control" name="corp_idcard" placeholder="{{ trans('company.please_corp_idcard') }}" id="corp_idcard"
					       maxlength="18">
				</div>
				{{--法人手机号1--}}
				<div class="form-group">
					<label>{{ trans('company.corp_mobile') }}：</label>
					<input type="text" class="form-control" oninput = "value=value.replace(/[^\d]/g,'')" name="corp_mobile" placeholder="{{ trans('company.please_corp_mobile') }}" id="corp_mobile"
					       maxlength="11">
				</div>
				{{--营业执照1--}}
				<div class="form-group">
					<label>{{ trans('company.license') }}：</label>
					<div class="zzz">
						<button type="button" class="btn" id="test1">
							<i class="layui-icon">&#xe67c;</i>{{ trans('company.file_pic') }}
						</button>
						<input type="hidden" value="" id="license" name="license">
						<div id="img">
							<img src="" alt="" id="imgs">
						</div>
					</div>
				</div>
				{{--企业社会信用码1--}}
				<div class="form-group">
					<label>{{ trans('company.credit_code') }}：</label>
					<input type="text" class="form-control" name="credit_code" onkeyup="value=value.replace(/[^\w\.\/]/ig,'')" placeholder="{{ trans('company.please_credit_code') }}" id="credit_code"
					       maxlength="18">
				</div>
				{{--注册地址1--}}
				<div class="form-group">
					<label>{{ trans('company.address') }}：</label>
					<input type="text" class="form-control" name="address" placeholder="{{ trans('company.please_address') }}" id="address" maxlength="100">
				</div>
				{{--公司电话座机1--}}
				<div class="form-group">
					<label>{{ trans('company.telphone') }}：</label>
					<input type="text" class="form-control" name="telphone" placeholder="{{ trans('company.please_telphone') }}" id="telphone" maxlength="12">
				</div>
				{{--公司/企业类型1--}}
				<div class="form-group">
					<label>{{ trans('company.comp_type') }}：</label>
					<select name="comp_type" id="comp_type" class="form-control">
						<option value="0">{{ trans('company.type') }}</option>
						<option value="1">{{ trans('company.proprietorship') }}</option>
						<option value="2">{{ trans('company.partnership') }}</option>
						<option value="3">{{ trans('company.finite') }}</option>
						<option value="4">{{ trans('company.shares') }}</option>
						<option value="5">{{ trans('company.group') }}</option>
						<option value="6">{{ trans('company.one_person') }}</option>
					</select>
					{{--<input type="text" class="form-control" name="comp_type"  id="comp_type" maxlength="10">--}}
				</div>
				{{--公司营业范围1--}}
				<div class="form-group">
					<label>{{ trans('company.scope') }}：</label>
					<input type="text" class="form-control" name="scope" placeholder="{{ trans('company.please_scope') }}" id="scope" maxlength="100">
				</div>
				{{--注册资本1--}}
				<div class="form-group">
					<label>{{ trans('company.reg_capital') }}：</label>
					<input type="text" class="form-control" onkeyup="value=value.replace(/[^\d.]/g,'')" name="reg_capital" placeholder="{{ trans('company.please_reg_capital') }}" id="reg_capital"
					       maxlength="20">
				</div>
				{{--使用iHOUSER联系人1--}}
				<div class="form-group">
					<label>{{ trans('company.contacts') }}：</label>
					<input type="text" class="form-control" name="contacts" placeholder="{{ trans('company.please_contacts') }}" id="contacts"
					       maxlength="12">
				</div>
				{{--使用iHOUSER系统联系人手机号1--}}
				<div class="form-group">
					<label>{{ trans('company.cont_mobile') }}：</label>
					<input type="text" oninput = "value=value.replace(/[^\d]/g,'')" class="form-control" name="cont_mobile" placeholder="{{ trans('company.please_cont_mobile') }}" id="cont_mobile"
					       maxlength="11">
				</div>
				{{--使用iHOUSER系统联系人身份证号1--}}
				<div class="form-group">
					<label>{{ trans('company.cont_idcard') }}：</label>
					<input type="text" oninput = "value=value.replace(/[^\d]/g,'')" class="form-control" name="cont_idcard" placeholder="{{ trans('company.please_created_date') }}" id="cont_idcard"
					       maxlength="18">
				</div>
				{{--公司成立日期1--}}
				<div class="form-group">
					<label>{{ trans('company.created_date') }}：</label>
					<input type="text" class="layui-input" autocomplete="off" id="created_date" placeholder="{{ trans('company.please_business_date') }}">
				</div>
				{{--公司营业期限开始1--}}
				<div class="form-group">
					<label>{{ trans('company.business_date') }}：</label>
					<input type="text" class="layui-input" autocomplete="off" id="business_date" placeholder="{{ trans('company.please_business_date') }}">

				</div>
				{{--公司营业期限结束--}}
				<div class="form-group">
					<label>{{ trans('company.expire_date') }}：</label>
					<input type="text" class="layui-input" autocomplete="off" id="expire_date" placeholder="{{ trans('company.please_expire_date') }}">
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
		checkboxClass : "{{config('myconfig.config.checkbox_skin')}}" ,
	} );

	layui.use( 'laydate' , function () {
		var laydate = layui.laydate;
		laydate.render( {
			elem : '#created_date'
		} );
		laydate.render( {
			elem : '#business_date'
		} );
		laydate.render( {
			elem : '#expire_date'
		} );
	} )

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

				console.log( res );
				if ( res.code == 1 ) {
					$( '#imgs' ).attr( 'src' , res.data.src );
					$( '#license' ).val( res.data.src );
					layer.msg( '{{ trans('company.upload_success') }}' , { time : 1000 } )
				}
				else {
					layer.msg( '{{ trans('company.upload_fail') }}' , { time : 1000 } )
				}
			}
			, error : function () {
				//请求异常回调
			}
		} );
	} );

</script>
<script>

	//添加到数据库

	$( '#store1' ).click( function () {


		 $( "#store1" ).attr( 'disabled' , true );

		var comp_cname = $('#comp_cname').val();   //公司中文名称
		var comp_ename = $('#comp_ename').val();   //公司英文名称
		var corporation = $('#corporation').val();  //公司法人代表信息
		var corp_idcard = $('#corp_idcard').val();   //公司法人身份证号码
		var corp_mobile = $('#corp_mobile').val();   //公司法人手机号码
		var license = $('#license').val();    //公司营业执照照片
		var credit_code = $('#credit_code').val();  //公司/企业社会信用码18位
		var address = $('#address').val();    //公司注册地址
		var telphone =$('#telphone').val();   //公司座机号码
		var comp_type = $('#comp_type').val();   // 公司或企业类型;
		var scope = $('#scope').val();    //公司经营范围
		var reg_capital = $('#reg_capital').val();    //公司注册资本
		var contacts = $('#contacts').val();     //使用iHOUSER联系人信息
		var cont_mobile = $('#cont_mobile').val();  //使用iHOUSER联系人手机号
		var cont_idcard = $('#cont_idcard').val();  //使用iHOUSER身份证号码
		var created_date = $('#created_date').val();  //公司成立日期
		var business_date = $('#business_date').val();  //营业执照开始日期
		var expire_date = $('#expire_date').val();   //营业执照结束日期

		var kaishi = new Date(business_date);
		var jieshu = new Date(expire_date);

		if(
			comp_cname == '' || comp_ename == '' || corporation == '' || corp_idcard == '' || corp_mobile == '' || license == ''||
			credit_code == ''|| address == ''|| telphone == '' || comp_type == '' || scope == '' || reg_capital == '' ||
			contacts == '' || cont_mobile == '' || cont_idcard == '' || created_date == '' || business_date == '' || expire_date == ''
		){
			layer.msg('{{trans('company.text_content1')}}',{time:1235});
			$( "#store1" ).attr( 'disabled' , false );
			return false;
		}


		var realname_pattern = {{config('myconfig.config.realname_pattern')}};       //中文验证
		var role_title_pattern = {{config('myconfig.config.role_title_pattern')}};   //英文验证
		var idcard_pattern = {{config('myconfig.config.idcard_pattern')}};           //身份证正则表达式
		var mobile_pattern = {{config('myconfig.config.mobile_pattern')}};           //手机号正则表达式
		var RegExp = /0\d{2}-\d{7,8}/;               //验证手机号与座机号


		{{--//验证公司中文名称是否合法--}}
		if(!realname_pattern.test(comp_cname)){
			layer.msg('{{trans('company.text_content2')}}',{time:1546});
			$("#store1").attr('disabled',false);
			return false;
		}

		{{--//验证公司英文名称是否合法--}}
		if(!role_title_pattern.test(comp_ename)){
			layer.msg('{{trans('company.text_content3')}}',{time:1456});
			$('#store1').attr('disabled',false);
			return false;
		}

		{{--//验证法人是否能合法--}}
		if(!realname_pattern.test(corporation)){
			layer.msg('{{trans('company.text_content4')}}',{time:1546});
			$("#store1").attr('disabled',false);
			return false;
		}
		{{--//验证法人身份证是否合法--}}
		if(!idcard_pattern.test(corp_idcard)){
			layer.msg('{{trans('company.text_content5')}}',{time:1546});
			$("#store1").attr('disabled',false);
			return false;
		}
		{{--//验证法人手机号收合法--}}
		if(!mobile_pattern.test(corp_mobile)){
			layer.msg('{{trans('company.text_content6')}}',{time:1546});
			$("#store1").attr('disabled',false);
			return false;
		}

		//验证座机号是否合法
		if(!RegExp.test(telphone)){
			layer.msg('{{trans('company.text_content10')}}',{time:1564});
			$('#store1').attr('disabled',false);
			return false;
		}


		{{--//验证iHOUSER联系人是否合法--}}
		if(!realname_pattern.test(contacts)){
			layer.msg('{{trans('company.text_content7')}}',{time:1546});
			$("#store1").attr('disabled',false);
			return false;
		}

     //验证iHOUSER联系人手机号是否合法
		if(!mobile_pattern.test(cont_mobile)){
			layer.msg('{{trans('company.text_content8')}}',{time:1546});
			$("#store1").attr('disabled',false);
			return false;
		}

		//验证iHOUSER联系人身份证是否合法
		if(!idcard_pattern.test(cont_idcard)){
			layer.msg('{{trans('company.text_content9')}}',{time:1546});
			$("#store1").attr('disabled',false);
			return false;
		}

		if(kaishi >= jieshu){
			layer.msg('{{trans('company.text_content20')}}',{time:1564});
			$("#store1").attr('disabled',false);
			return false;
		}

		// console.log(132);

		$.ajax( {
			url : "{{URL('company/store')}}" ,
			type : 'post' ,
			data : {
				comp_cname : comp_cname ,
				comp_ename : comp_ename ,
				corporation : corporation ,
				corp_idcard:corp_idcard,
				corp_mobile:corp_mobile,
				credit_code:credit_code,
				address:address,
				telphone:telphone,
				license:license,
				comp_type:comp_type,
				scope:scope,
				reg_capital:reg_capital,
				contacts:contacts,
				cont_mobile:cont_mobile,
				cont_idcard:cont_idcard,
				created_date:created_date,
				business_date:business_date,
				expire_date:expire_date,
				_token : "{{csrf_token()}}"
			} ,
			success : function ( data ) {
				console.log( data );

				if ( data.code == {{config('myconfig.company.company_store_success_code')}}) {
					layer.msg( data.msg , { time : 2000 } , function () {
						window.parent.location.reload();
					} );
				}

				if ( data.code == {{config('myconfig.company.company_store_error_code')}}) {
					layer.msg( data.msg , { time : 2000 } );
					$( "#store1" ).attr( 'disabled' , false );
				}

				if ( data.code == {{config('myconfig.company.credit_code_code')}}) {
					layer.msg( data.msg , { time : 2000 } );
					$( "#store1" ).attr( 'disabled' , false );
				}

				if ( data.code == {{config('myconfig.company.corp_idcard_code')}}) {
					layer.msg( data.msg , { time : 2000 } );
					$( "#store1" ).attr( 'disabled' , false );
				}

				if ( data.code == {{config('myconfig.company.comp_ename_code')}}) {
					layer.msg( data.msg , { time : 2000 } );
					$( "#store1" ).attr( 'disabled' , false );
				}

				if ( data.code == {{config('myconfig.company.comp_cname_code')}}) {
					layer.msg( data.msg , { time : 2000 } );
					$( "#store1" ).attr( 'disabled' , false );
				}
			}
		} )
	} )
</script>
</html>
