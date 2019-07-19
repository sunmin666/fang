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
					{{--职业顾问账号--}}
					<label>{{ trans('consu.username') }}：</label>
					<input type="text" class="form-control" name="username"
					       placeholder="请输入账号" id="username"
					       value="{{$hous -> username}}" readonly
					       onkeyup="value=value.replace(/[^\w\.\/]/ig,'')"
					       maxlength="15">
				</div>
				{{--职业顾问姓名--}}
				<div class="form-group">
					<label>{{ trans('consu.realname') }}：</label>
					<input type="text" class="form-control" onkeyup="value=value.replace(/[\d]/g,'') "
					       maxlength="10" placeholder="请输入中文名称" value="{{$hous ->realname}}"
					       name="realname" id="realname">
				</div>

				{{--邮箱--}}
				<div class="form-group">
					<label>{{ trans('consu.email') }}：</label>
					<input type="text" class="form-control" name="email"
					       value="{{$hous -> email}}"
					       placeholder="请填写邮箱" id="email"
					       maxlength="50">
				</div>
				{{--性别--}}
				<div class="form-group">
					<label>{{ trans('consu.sex') }}：</label>
					<div class="zzz">
						<input type="radio" name="sex" value="1" id="sex" @if($hous -> sex == 1) checked @endif class="i-checks">&nbsp;男 &nbsp;&nbsp;
						<input type="radio" name="sex" value="2" id="sex" @if($hous -> sex == 2) checked @endif class="i-checks">&nbsp;女
					</div>
				</div>
				{{--手机号--}}
				<div class="form-group">
					<label>{{ trans('consu.mobile') }}：</label>
					<input type="text" class="form-control" name="mobile"
					       onkeyup="value=value.replace(/^(0+)|[^\d]+/g,'')"
					       placeholder="请输入手机号" id="mobile"
					       value="{{$hous -> mobile}}"
					       maxlength="11">
				</div>
				{{--身份证号--}}
				<div class="form-group">
					<label>{{ trans('consu.idcrad') }}：</label>
					<input type="text" class="form-control" name="idcrad"
					       onkeyup="value=value.replace(/^(0+)|[^\d]+/g,'')"
					       value="{{$hous -> idcrad}}"
					       placeholder="请填写身份证号" id="idcrad" maxlength="18">
				</div>
				{{--职业顾问生日--}}
				<div class="form-group">
					<label>{{ trans('consu.birthday') }}：</label>
					<input type="text" autocomplete="off" class="form-control" name="birthday" placeholder="请选择生日" id="telphone"
					      value="{{date('Y-m-d',$hous -> birthday)}}"
					       maxlength="12">
				</div>
				{{--微信--}}
				<div class="form-group">
					<label>{{ trans('consu.weixin') }}：</label>
					<input type="text" class="form-control" name="weixin"
					       onkeyup="value=value.replace(/[^\w\.\/]/ig,'')"
					       value="{{$hous -> weixin}}"
					       placeholder="请输入微信号" id="weixin" maxlength="12">
				</div>
				{{--qq--}}
				<div class="form-group">
					<label>{{ trans('consu.qq') }}：</label>
					<input type="text" class="form-control" name="qq"
					       onkeyup="value=value.replace(/^(0+)|[^\d]+/g,'')"
					       value="{{$hous -> qq}}"
					       placeholder="请输入扣扣号" id="qq" maxlength="100">
				</div>
				<input type="hidden" value="{{$hous -> hous_id}}" id="hous_id">
				{{--所属公司--}}
				<div class="form-group">
					<label>{{ trans('consu.comp_id') }}：</label>
					<select name="comp_id" id="comp_id" class="form-control">
						@if($company != null)
							<option value="{{$company -> comp_id}}">{{$company ->comp_cname }}</option>
						@endif
					</select>
				</div>
				{{--所属项目--}}
				<div class="form-group">
					<label>{{ trans('consu.proj_id') }}：</label>
					<select name="proj_id" id="proj_id" class="form-control">
						<option value="">请选择项目</option>
						@foreach($project as $k => $v)
							<option value="{{$v -> project_id}}" @if($hous -> proj_id == $v -> project_id) selected @endif>{{$v -> pro_cname}}</option>
						@endforeach
					</select>
				</div>
				{{--自我简介--}}
				<div class="form-group">
					<label>{{ trans('consu.description') }}：</label>
					<textarea name="description" id="description" cols="30"
					          rows="5" class="form-control" placeholder="请输入自我描述" style="resize:none;">{{$hous -> description}}</textarea>
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
	layui.use( 'laydate' , function () {
		var laydate = layui.laydate;
		laydate.render( {
			elem : '#telphone'
		} );
	} );

</script>
<script>

	//添加到数据库

	$( '#store1' ).click( function () {


		$( "#store1" ).attr( 'disabled' , true );
		var username = $( '#username' ).val();   //职业顾问   *
		var realname = $( '#realname' ).val();   //职业姓名   *
		var email = $( '#email' ).val();   //职业顾问邮箱  *
		var sex = $( 'input[name= sex]:checked' ).val();   //置业顾问性别  *
		var mobile = $( '#mobile' ).val();  //职业顾问手机号    *
		var idcrad = $( '#idcrad' ).val();    //职业顾问身份证号    *
		var birthday = $( '#telphone' ).val();   //顾问生日日期格式  *
		var weixin = $( '#weixin' ).val();   // 顾问微信;
		var qq = $( '#qq' ).val();    //顾问扣扣号
		var proj_id = $( '#proj_id' ).val();    //顾问所属项目   *
		var comp_id = $( '#comp_id' ).val();     //顾问所属公司   *
		var description = $( '#description' ).val();  //自己描述
		var hous_id = $('#hous_id').val();

		if (
			username == '' || realname == '' ||  email == '' || sex == '' ||
			mobile == '' || idcrad == '' || birthday == '' || proj_id == '' || comp_id == ''
		) {
			layer.msg( '{{trans('company.text_content1')}}' , { time : 1235 } );
			$( "#store1" ).attr( 'disabled' , false );
			return false;
		}

		var email_pattern = {{config('myconfig.config.email_pattern')}};       //中文验证
		var mobile_pattern = {{config('myconfig.config.mobile_pattern')}};   //英文验证
		var idcard_pattern = {{config('myconfig.config.idcard_pattern')}};           //身份证正则表达式

		{{--//验证顾问邮箱是否合法--}}
		if ( !email_pattern.test( email ) ) {
			layer.msg( '{{trans('consu.text_content2')}}' , { time : 1546 } );
			$( "#store1" ).attr( 'disabled' , false );
			return false;
		}

		{{--//验证顾问手机号是否合法--}}
		if ( !mobile_pattern.test( mobile ) ) {
			layer.msg( '{{trans('consu.text_content3')}}' , { time : 1456 } );
			$( '#store1' ).attr( 'disabled' , false );
			return false;
		}

		{{--//验证顾问身份证号是否能合法--}}
		if ( !idcard_pattern.test( idcrad ) ) {
			layer.msg( '{{trans('consu.text_content4')}}' , { time : 1546 } );
			$( "#store1" ).attr( 'disabled' , false );
			return false;
		}


		$.ajax( {
			url : "{{URL('consu/update')}}" ,
			type : 'post' ,
			data : {
				hous_id:hous_id,
				username : username ,         //职业顾问账号
				realname : realname ,         //职业顾问姓名
				email : email ,         //邮箱
				sex : sex ,             //性别
				mobile : mobile ,            //手机号
				idcrad : idcrad ,          //身份证号
				birthday : birthday ,            //生日
				weixin : weixin ,             //微信
				qq : qq ,                //qq
				proj_id : proj_id ,      //所属项目id
				comp_id : comp_id ,    //所属公司id
				description : description ,         //自我描述
				_token : "{{csrf_token()}}"             //post提交token验证
			} ,
			success : function ( data ) {
				console.log( data );
				if ( data.code == {{config('myconfig.consu.update_error_hous_code')}}) {
					layer.msg(data.msg,{time:2151});
					$( "#store1" ).attr( 'disabled' , false );
					return false;
				}

				if ( data.code == {{config('myconfig.consu.update_success_hous_code')}}) {
					layer.msg( data.msg , { time : 2000 } , function () {
						window.parent.location.reload();
					} );
				}

				if ( data.code == {{config('myconfig.consu.username_code')}}) {
					layer.msg( data.msg , { time : 2000 } );
					$( "#store1" ).attr( 'disabled' , false );
					return false;
				}

				if ( data.code == {{config('myconfig.consu.idcrad_code')}}) {
					layer.msg( data.msg , { time : 2000 } );
					$( "#store1" ).attr( 'disabled' , false );
					return false;

				}
			}
		} )
	} )
</script>
</html>
