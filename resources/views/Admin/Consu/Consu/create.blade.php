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
					{{--职业顾问手机号--}}
					<label>{{ trans('consu.mobile') }}：</label>
					<input type="text" class="form-control" name="mobile"
					       placeholder="{{ trans('consu.please_mobile') }}" id="mobile" onkeyup="value=value.replace(/[^\d.]/g,'')"
					       maxlength="11">
				</div>
				{{--职业顾问密码--}}
				<div class="form-group">
					<label>{{ trans('consu.password') }}：</label>
					<input type="password" class="form-control"
					       maxlength="10" placeholder="{{ trans('consu.please_password') }}"
					       name="password" id="password">
				</div>
				{{--职业顾问确认密码--}}
				<div class="form-group">
					<label>{{ trans('consu.password_confirmation')}}：</label>
					<input type="password" class="form-control"
					       name="password_confirmation" placeholder='{{ trans('consu.confirmation') }}' id="password_confirmation"
					       maxlength="18">
				</div>
				{{--职业顾问登录确认密码--}}
				<div class="form-group">
					<label>{{ trans('consu.name') }}：</label>
					<input type="text" class="form-control" name="name" onkeyup="value=value.replace(/[\d]/g,'') "
					       placeholder="{{ trans('consu.please_name') }}"
					       onkeyup="value=value.replace(/[^\w\.\/]/ig,'')"
					       id="name"
					       maxlength="6">
				</div>
				{{--性别--}}
				<div class="form-group">
					<label>{{ trans('consu.sex') }}：</label>
					<div class="zzz">
						<input type="radio" name="sex" value="1" id="sex" class="i-checks">&nbsp;{{ trans('consu.male') }} &nbsp;&nbsp;
						<input type="radio" name="sex" value="2" id="sex" class="i-checks">&nbsp;{{ trans('consu.female') }}
					</div>
				</div>
				{{--邮箱--}}
				<div class="form-group">
					<label>{{ trans('consu.email') }}：</label>
					<input type="text" class="form-control" name="email"
					       placeholder="{{ trans('consu.please_email') }}" id="email"
					       maxlength="20">
				</div>


				{{--身份证号--}}
				<div class="form-group">
					<label>{{ trans('consu.idcrad') }}：</label>
					<input type="text" class="form-control" name="idcrad"
					       onkeyup="value=value.replace(/[^\w\.\/]/ig,'')"
					       placeholder="{{ trans('consu.please_idcrad') }}" id="idcrad" maxlength="18">
				</div>
				{{--职业顾折扣--}}
				<div class="form-group">
					<label>{{ trans('consu.enjoy') }}：</label>
					<select name="enjoy" id="enjoy" class="form-control">
						<option value="0">--{{ trans('consu.please_choice') }}--</option>Choice
						@foreach($enjoy as $k => $v)
							<option value="{{$v -> enjoy_id }}"> {{$v -> enjoy}} </option>
						@endforeach
					</select>
				</div>

				{{--是否可在ipad上登录--}}

				<div class="form-group">
					<label>{{ trans('consu.is_ipad') }}：</label>
					<select name="is_ipad" id="is_ipad" class="form-control">
						<option value="1"> {{ trans('consu.pc_login') }} </option>
						<option value="2"> {{ trans('consu.ipad_login') }} </option>
					</select>
				</div>

				{{--项目--}}
				<div class="form-group">
					<label>{{ trans('consu.proj_id') }}：</label>
					<select name="proj_id" id="proj_id" class="form-control">
						<option value=""> {{ trans('consu.please_choice') }} </option>
						@foreach($poje as $k => $v)
							<option value="{{$v -> project_id}}">{{$v ->pro_cname }}</option>
						@endforeach
					</select>
				</div>
				<div class="form-group">
					<label>{{ trans('consu.role') }}：</label>
					<select name="role_id" id="role_id" class="form-control">
						<option value=""> {{ trans('consu.please_choice') }} </option>
						@foreach($role as $k => $v)
							<option value="{{$v -> role_id}}">{{$v ->role_name }}</option>
						@endforeach
					</select>
				</div>
				<div class="form-group">
					<label>{{ trans('consu.permin') }}：</label>
					<select name="perm_id" id="perm_id" class="form-control">
						<option value=""> {{ trans('consu.please_choice') }} </option>
						@foreach($permin as $k => $v)
							<option value="{{$v -> perm_id}}">{{$v ->perm_name }}</option>
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

	//添加到数据库

	$( '#store1' ).click( function () {


		$( "#store1" ).attr( 'disabled' , true );
		var mobile = $( '#mobile' ).val();   //手机号（登录账号）   *
		var password = $( '#password' ).val();   //密码   *
		var password_confirmation = $( '#password_confirmation' ).val();   //确认密码 *
		var name = $('#name').val();            //姓名
		var sex = $( 'input[name= sex]:checked' ).val();   //置业顾问性别  *
		var email = $( '#email' ).val();   //职业顾问邮箱  *
		var idcrad = $( '#idcrad' ).val();    //职业顾问身份证号    *
		var enjoy = $( '#enjoy' ).val();   //折扣  *
		var is_ipad = $('#is_ipad').val();
		var proj_id = $( '#proj_id' ).val();    //顾问所属项目   *
		var role_id = $( '#role_id' ).val();     //顾问所属公司   *
		var perm_id = $( '#perm_id' ).val();     //顾问所属公司   *

		if (
			mobile == '' || password == '' || password_confirmation == '' || name == '' || email == '' || sex == '' ||
			enjoy == '' || idcrad == '' || role_id == '' || proj_id == '' || perm_id == ''
		) {
			layer.msg( '{{trans('company.text_content1')}}' , { time : 1235 } );
			$( "#store1" ).attr( 'disabled' , false );
			return false;
		}

		var email_pattern = {{config('myconfig.config.email_pattern')}};       //邮箱验证
		var mobile_pattern = {{config('myconfig.config.mobile_pattern')}};   //手机号
		var idcard_pattern = {{config('myconfig.config.idcard_pattern')}};   //身份证正则表达式

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
			url : "{{URL('consu/store')}}" ,
			type : 'post' ,
			data : {
				mobile : mobile ,         //职业顾手机号
				password : password ,         //职业顾问密码
				password_confirmation : password_confirmation ,           //确认密码
				name:name,   //姓名
				email : email ,         //邮箱
				sex : sex ,             //性别
				idcrad : idcrad ,          //身份证号
				is_ipad:is_ipad,
				enjoy : enjoy ,            //折扣
				proj_id : proj_id ,      //所属项目id
				role_id : role_id ,    //所属角色
				perm_id : perm_id ,    //所属权限

				_token : "{{csrf_token()}}"             //post提交token验证
			} ,
			success : function ( data ) {
				console.log( data );
				if ( data.code == {{config('myconfig.consu.mobile_code')}}) {
					layer.msg(data.msg,{time:2151});
					$( "#store1" ).attr( 'disabled' , false );
					return false;
				}

				if ( data.code == {{config('myconfig.consu.store_success_consu_code')}}) {
					layer.msg( data.msg , { time : 2000 } , function () {
						window.parent.location.reload();
					} );
				}

				if ( data.code == {{config('myconfig.consu.store_error_consu_code')}}) {
					layer.msg( data.msg , { time : 2000 } );
					$( "#store1" ).attr( 'disabled' , false );
					return false;
				}

				if ( data.code == {{config('myconfig.consu.password_code')}}) {
					layer.msg( data.msg , { time : 2000 } );
					$( "#store1" ).attr( 'disabled' , false );
					return false;

				}


				if ( data.code == {{config('myconfig.consu.idcrad_code')}}) {
					layer.msg( data.msg , { time : 2000 } );
					$( "#store1" ).attr( 'disabled' , false );
					return false;

				}

				if ( data.code == {{config('myconfig.consu.password_confirmation_code')}}) {
					layer.msg( data.msg , { time : 2000 } );
					$( "#store1" ).attr( 'disabled' , false );
					return false;
				}
			}
		} )
	} )
</script>
</html>
