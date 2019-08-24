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
					{{--项目中文名称--}}
					<label>{{ trans('project.pro_cname') }}：</label>
					<input type="text" class="form-control" name="pro_cname" placeholder="请填写项目中文名称" id="pro_cname"
					       maxlength="50">
				</div>
				{{--项目英文名称--}}
				<div class="form-group">
					<label>{{ trans('project.pro_ename') }}：</label>
					<input type="text" class="form-control" maxlength="100" placeholder="请填写项目英文名称"
					       name="pro_ename" id="pro_ename">
				</div>
				{{--项目所属公司--}}
				<div class="form-group">
					<label>{{ trans('project.comp_id') }}：</label>
					<select name="comp_id" id="comp_id" class="form-control">
						<option value="0">请选择项目所属公司</option>
						<option value="1">西安开米</option>
						{{--@foreach($company as $k => $v)--}}
							{{--<option value="{{$v -> comp_id}}"> {{$v -> comp_cname}}</option>--}}
						{{--@endforeach	--}}
					</select>
					{{--<input type="text" class="form-control" name="comp_type"  id="comp_type" maxlength="10">--}}
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

	//添加到数据库

	$( '#store1' ).click( function () {
		$( "#store1" ).attr( 'disabled' , true );

		var pro_cname = $('#pro_cname').val();   //公司中文名称
		var pro_ename = $('#pro_ename').val();   //公司英文名称
		var comp_id = $('#comp_id').val();  //公司法人代表信息

		if(pro_cname==''|| pro_ename=='' || comp_id==''){
			layer.msg('{{trans('company.text_content1')}}',{time:1235});
			$( "#store1" ).attr( 'disabled' , false );
			return false;
		}
		var realname_pattern = {{config('myconfig.config.realname_pattern')}};       //中文验证
		var role_title_pattern = {{config('myconfig.config.role_title_pattern')}};   //英文验证

		{{--//验证项目中文名称是否合法--}}
		if(!realname_pattern.test(pro_cname)){
			layer.msg('{{trans('project.text_content2')}}',{time:1546});
			$("#store1").attr('disabled',false);
			return false;
		}

		if(!role_title_pattern.test(pro_ename)){
			layer.msg('{{trans('project.text_content3')}}',{time:1546});
			$("#store1").attr('disabled',false);
			return false;
		}

		$.ajax( {
			url : "{{URL('projectss/store')}}" ,
			type : 'post' ,
			data : {
				pro_cname : pro_cname ,
				pro_ename : pro_ename ,
				comp_id:comp_id,
				_token : "{{csrf_token()}}"
			} ,
			success : function ( data ) {
				console.log( data );

				if ( data.code == {{config('myconfig.project.store_project_success_code')}}) {
					layer.msg( data.msg , { time : 2000 } , function () {
						window.parent.location.reload();
					} );
				}

				if ( data.code == {{config('myconfig.project.store_project_error_code')}}) {
					layer.msg( data.msg , { time : 2000 } );
					$( "#store1" ).attr( 'disabled' , false );
				}

				if ( data.code == {{config('myconfig.project.pro_cname_code')}}) {
					layer.msg( data.msg , { time : 2000 } );
					$( "#store1" ).attr( 'disabled' , false );
				}

				if ( data.code == {{config('myconfig.project.pro_ename_code')}}) {
					layer.msg( data.msg , { time : 2000 } );
					$( "#store1" ).attr( 'disabled' , false );
				}

			}
		} )
	} )
</script>
</html>
