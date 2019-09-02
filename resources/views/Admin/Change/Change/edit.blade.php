<!doctype html>
<html lang="en">
<head>
	@include('Public.weekly_css')
	<style>
		.none {
			display : none;
			/*height: ;*/
			/*display: inline-block;*/
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
					{{--<label>{{ trans('buy.pay_num')}}：</label>--}}
					<label>{{ trans('buy.names') }}：</label>
					<input type="text" class="form-control" readonly
					       value="{{$chang_home -> realname}}"
					       name="name" placeholder="" id="names"
					       maxlength="12">
				</div>
				<div class="form-group">
					{{--<label>{{ trans('buy.pay_num')}}：</label>--}}
					<label>{{ trans('buy.iphones') }}：</label>
					<input type="text" class="form-control" readonly
					       value="{{$chang_home -> mobile}}"
					       name="iphone" placeholder="" id="iphones"
					       maxlength="12">
				</div>
				<div class="form-group" >
					{{--<label>{{ trans('buy.pay_num')}}：</label>--}}
					<label>{{ trans('buy.shens') }}：</label>
					<input type="text" class="form-control" readonly
					       value="{{$chang_home -> idcard}}"
					       name="idcard" placeholder="" id="shens"
					       maxlength="18">
				</div>


				<div class="form-group" >
					<label>{{ trans('buy.old_homeid') }}：</label>
					<input type="text" class="form-control" readonly
					       value="{{$chang_home -> buildnum_old}}"
					       name="idcard" placeholder=""
					       maxlength="18">
					<input type="text" class="form-control" readonly
					       value="{{$chang_home -> unitnum_old}}"
					       name="idcard" placeholder=""
					       maxlength="18">
					<input type="text" class="form-control" readonly
					       value="{{$chang_home -> roomnum_old}}"
					       name="idcard" placeholder=""
					       maxlength="18">
				</div>


				<div class="form-group">
					<label>{{ trans('buy.homeid') }}：</label><br>
					<input type="text" class="form-control" readonly
					       value="{{$chang_home -> buildnum_new}}"
					       name="idcard" placeholder=""
					       maxlength="18">
					<input type="text" class="form-control" readonly
					       value="{{$chang_home -> unitnum_new}}"
					       name="idcard" placeholder=""
					       maxlength="18">
					<input type="text" class="form-control" readonly
					       value="{{$chang_home -> roomnum_new}}"
					       name="idcard" placeholder=""
					       maxlength="18">
				</div>
				<br><br>

				<div class="form-group">
					<label>{{ trans('buy.remarkss') }}：</label>
					<textarea name="remarks" id="remarks" class="form-control" cols="30" rows="5" style="resize:none">{{$chang_home -> remarks}}</textarea>
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
</script>
<script>

	//添加到数据库

	$( '#store1' ).click( function () {

		// $( "#store1" ).attr( 'disabled' , true );



		//获取职业顾问备注
		var remarks = $( '#remarks' ).val();

		if ( remarks == '' ) {
			layer.msg( '{{trans('company.text_content1')}}' , { time : 1235 } );
			$( "#store1" ).attr( 'disabled' , false );
			return false;
		}
		var regEn = {{config('myconfig.config.regEn')}};       //中文验证
		var regCn = {{config('myconfig.config.regCn')}};   //英文验证

		if ( regEn.test( remarks ) ) {
			layer.msg( '{{trans('buy.text_content2')}}' , { time : 1235 } );
			$( "#store1" ).attr( 'disabled' , false );
			return false;
		}

		if ( regCn.test( remarks ) ) {
			layer.msg( '{{trans('buy.text_content2')}}' , { time : 1235 } );
			$( "#store1" ).attr( 'disabled' , false );
			return false;
		}


		$.ajax( {
			url : "{{URL('change_home/update')}}" ,
			type : 'post' ,
			data : {
				chan_id :"{{$chang_home -> chan_id}}",
				remarks : remarks ,                //换房或更新备注
				_token : "{{csrf_token()}}"
			} ,
			success : function ( data ) {
				console.log( data );
				if ( data.code == {{config('myconfig.changeh.update_success_change_code')}}) {
					layer.msg( data.msg , { time : 2000 } , function () {
						window.parent.location.reload();
					} );
				}

				if ( data.code == {{config('myconfig.changeh.update_error_change_code')}}) {
					layer.msg( data.msg , { time : 2000 } );
					$( "#store1" ).attr( 'disabled' , false );
				}

				{{--if ( data.code == {{config('myconfig.changeh.remarks_code')}}) {--}}
					{{--layer.msg( data.msg , { time : 2000 } );--}}
					{{--$( "#store1" ).attr( 'disabled' , false );--}}
				{{--}--}}

			}
		} )
	} )
</script>
</html>
