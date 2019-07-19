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
					<label>{{ trans('login.old_password') }}：</label>
					<input type="password" class="form-control" name="old_password" id="old_password" maxlength="16">
				</div>
				<div class="form-group">
					<label>{{ trans('login.new_password') }}：</label>
					<input type="password" class="form-control" maxlength="16"
					       name="password" id="password">
				</div>
				<input type="hidden" value="{{$status}}" id="status">
				<div class="form-group">
					<label>{{ trans('login.news_password') }}：</label>
					<input type="password" class="form-control" maxlength="16"
					       name="password_confirmation" id="password_confirmation">
				</div>
			</form>
		</div>
	</div>
	<div class="add_button">
		<button type="button" class="btn btn-dropbox" id="store1" >{{ trans('cha.save') }}</button>
	</div>
</div>
</body>
@include('Public.weekly_js')
<script>
	$('#store1').click(function(){
		$('#store1').attr('disabled',true);
		var old_password = $('#old_password').val();   //旧密码
		var password = $('#password').val();    //新密码
		var password_confirmation = $('#password_confirmation').val();  //确认新密码

		if(old_password.length < 3 ){
			layer.msg('{{trans('login.old_password_s')}}',{time:1546});
			$('#store1').attr('disabled',false);
			return false;
		}
		if(password.length < 3){
			layer.msg('{{trans('login.old_password_ss')}}',{time:1546});
			$('#store1').attr('disabled',false);
			return false;
		}

		if(password_confirmation.length < 3){
			layer.msg('{{trans('login.old_password_sss')}}',{time:1546});
			$('#store1').attr('disabled',false);
			return false;
		}

		var status = $('#status').val();     //区分内部成员与 外部成员


		$.ajax({
			url: "{{URL('change/password')}}",
			type:"POST",
			data:{
				old_password:old_password,
				password:password,
				status:status,
				password_confirmation:password_confirmation,
				_token:"{{csrf_token()}}"
			},
			success:function(data){
				console.log(data);
				if(data.code == {{config('myconfig.login.old_password_code')}}){    //旧密码与之前的不相同
					layer.msg(data.msg,{time:1324});
					$('#store1').attr('disabled',false);
					return false;
				}
				if(data.code == {{config('myconfig.login.password_confirmation_same_code')}}){
					layer.msg(data.msg,{time:1324});                        //新密码与确认密码不相同
					$('#store1').attr('disabled',false);
					return false;
				}
				if(data.code == {{config('myconfig.login.update_password_success_code')}}){
					layer.msg(data.msg,{time:1324},function(){
						window.parent.location.href = "{{URL('logout')}}/" + data.status;
					});                     //修改成功
				}
				if(data.code == {{config('myconfig.login.old_password_code')}}){
					layer.msg(data.msg,{time:1324});           //修改失败
					$('#store1').attr('disabled',false);
					return false;
				}
			}
		});
	})
</script>
</html>
