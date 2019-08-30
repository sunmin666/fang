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

					<input type="hidden" id="cust_id" value="{{$cust -> cust_id}}">
					<div class="form-group">
						{{--<label>{{ trans('buy.pay_num')}}：</label>--}}
						<label>{{ trans('buy.names') }}：</label>
						<input type="text" class="form-control" readonly
						       value="{{$cust -> realname}}"
						       name="name" placeholder="" id="names"
						       maxlength="12">
					</div>
					<div class="form-group">
						{{--<label>{{ trans('buy.pay_num')}}：</label>--}}
						<label>{{ trans('buy.iphones') }}：</label>
						<input type="text" class="form-control" readonly
						       value="{{$cust -> mobile}}"
						       name="iphone" placeholder="" id="iphones"
						       maxlength="12">
					</div>
					<div class="form-group" >
						{{--<label>{{ trans('buy.pay_num')}}：</label>--}}
						<label>{{ trans('buy.shens') }}：</label>
						<input type="text" class="form-control" readonly
						       value="{{$cust -> idcard}}"
						       name="idcard" placeholder="" id="shens"
						       maxlength="18">
					</div>
				{{--<div class="form-group none" id="dizhi">--}}
				{{--<label>{{ trans('buy.pay_num')}}：</label>--}}
				{{--<label>地址：</label>--}}
				{{--<input type="text" class="form-control"--}}
				{{--onkeyup="value=value.replace(/[^\d.]/g,'')"--}}
				{{--name="dizhi" placeholder="请输入缴费金额" id="dizhis"--}}
				{{--maxlength="12">--}}
				{{--</div>--}}
				<div class="form-group" >
					<label>{{ trans('buy.old_homeid') }}：</label>
					<input type="text" class="form-control" readonly
					       value="{{$home -> buildnums}}"
					       name="idcard" placeholder=""
					       maxlength="18">
					<input type="text" class="form-control" readonly
					       value="{{$home -> unitnums}}"
					       name="idcard" placeholder=""
					       maxlength="18">
					<input type="text" class="form-control" readonly
					       value="{{$home -> roomnums}}"
					       name="idcard" placeholder=""
					       maxlength="18">
				</div>


				<div class="form-group">
					<label>{{ trans('buy.homeid') }}：</label><br>
					<select name="buildnum" id="buildnum" class="form-control" style="width: 30%;float: left">
						<option value="">--{{ trans('buy.please_homeid') }}--</option>
						@foreach($buildnum as $kq =>$vq)
							<option value="{{$vq -> field_id}}">{{$vq -> name}}</option>
						@endforeach
					</select>
					<select name="unitnum" id="unitnum" class="form-control" style="width: 30%;float: left">
						<option value="0">--{{ trans('buy.please_choose') }}--</option>

					</select>
					<select name="roomnum" id="roomnum" class="form-control" style="width: 30%;float: left">
						<option value="0">--{{ trans('buy.please_choose') }}--</option>
					</select>
				</div>
				<br><br>

				<div class="form-group none" id="buildnumss">
					{{--<label>{{ trans('buy.pay_num')}}：</label>--}}
					<label>{{ trans('buy.buildnums') }}：</label>
					<input type="text" class="form-control" readonly
					       {{--onkeyup="value=value.replace(/[^\d.]/g,'')"--}}
					       name="buildnums"  id="buildnums"
					       maxlength="12">
				</div>
				<div class="form-group none" id="unitnumss">
					{{--<label>{{ trans('buy.pay_num')}}：</label>--}}
					<label>{{ trans('buy.unitnums') }}：</label>
					<input type="text" class="form-control" readonly
					       {{--onkeyup="value=value.replace(/[^\d.]/g,'')"--}}
					       name="unitnums"  id="unitnums"
					       maxlength="12">
				</div>
				<div class="form-group none" id="roomnumss">
					{{--<label>{{ trans('buy.pay_num')}}：</label>--}}
					<label>{{ trans('buy.roomnums') }}：</label>
					<input type="text" class="form-control" readonly
					       {{--onkeyup="value=value.replace(/[^\d.]/g,'')"--}}
					       name="roomnums"  id="roomnums"
					       maxlength="12">
				</div>

				<div class="form-group none" id="build_area">
					{{--<label>{{ trans('buy.pay_num')}}：</label>--}}
					<label>{{ trans('buy.build_areas') }}：</label>
					<input type="text" class="form-control" readonly
					       {{--onkeyup="value=value.replace(/[^\d.]/g,'')"--}}
					       name="build_areas"  id="build_areas"
					       maxlength="12">
				</div>
				<div class="form-group none" id="price">
					{{--<label>{{ trans('buy.pay_num')}}：</label>--}}
					<label>{{ trans('buy.prices') }}：</label>
					<input type="text" class="form-control" readonly
					       {{--onkeyup="value=value.replace(/[^\d.]/g,'')"--}}
					       name="prices"  id="prices"
					       maxlength="12">
				</div>
				<div class="form-group none" id="total">
					{{--<label>{{ trans('buy.pay_num')}}：</label>--}}
					<label>{{ trans('buy.totals') }}：</label>
					<input type="text" class="form-control" readonly
					       {{--onkeyup="value=value.replace(/[^\d.]/g,'')"--}}
					       name="totals" placeholder="{{ trans('buy.please_many') }}" id="totals"
					       maxlength="12">
				</div>
				<div class="form-group none" id="discount">
					{{--<label>{{ trans('buy.pay_num')}}：</label>--}}
					<label>{{ trans('buy.discounts') }}：</label>
					<input type="text" class="form-control" readonly
					       {{--onkeyup="value=value.replace(/[^\d.]/g,'')"--}}
					       name="discounts"  id="discounts"
					       maxlength="12">
				</div>
				<div class="form-group">
					<label>{{ trans('buy.remarkss') }}：</label>
					<textarea name="remarks" id="remarks" class="form-control" cols="30" rows="5" style="resize:none"></textarea>
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

	//下拉框联动 楼号联动单元号
	$( "#buildnum" ).change( function () {
		var field_id = $( this ).val();

		if ( field_id == '' ) {
			$( '#buildnumss' ).addClass( 'none' );
			$( '#unitnumss' ).addClass( 'none' );
			$( '#roomnumss' ).addClass( 'none' );
			$( '#build_area' ).addClass( 'none' );
			$( '#price' ).addClass( 'none' );
			$( '#total' ).addClass( 'none' );
			$( '#discount' ).addClass( 'none' );
			var cc = '<option value="">--{{ trans('buy.please_choice') }}--</option>';
			$( '#roomnum' ).html( cc );
			$( '#unitnum' ).html( cc );
			return false;
		}

		$.ajax( {
			url : "{{URL('buildnum')}}" ,
			type : "post" ,
			data : {
				field_id : field_id ,
				_token : "{{csrf_token()}}"
			} ,
			success : function ( data ) {
				console.log( data );
				var str = "";
				for ( var ig = 0 ; ig < data.length ; ig++ ) {
					str += "<option value='" + data[ig]['field_id'] + "'> " + data[ig]['name'] + " </option>"
				}
				var cc = '<option value="">--{{ trans('buy.please_choice') }}--</option>';

				$( '#unitnum' ).html( cc + str );
				$( '#roomnum' ).html( cc );
				$( '#buildnumss' ).addClass( 'none' );
				$( '#unitnumss' ).addClass( 'none' );
				$( '#roomnumss' ).addClass( 'none' );
				$( '#build_area' ).addClass( 'none' );
				$( '#price' ).addClass( 'none' );
				$( '#total' ).addClass( 'none' );
				$( '#discount' ).addClass( 'none' );
			}
		} )
	} );
	//下拉联动 单元号去homeinfo表里查询数据status=1
	$( "#unitnum" ).change( function () {
		var unitnum = $( this ).val();
		if ( unitnum == '' ) {
			$( '#buildnumss' ).addClass( 'none' );
			$( '#unitnumss' ).addClass( 'none' );
			$( '#roomnumss' ).addClass( 'none' );
			$( '#build_area' ).addClass( 'none' );
			$( '#price' ).addClass( 'none' );
			$( '#total' ).addClass( 'none' );
			$( '#discount' ).addClass( 'none' );
			return false;
		}
		$.ajax( {
			url : "{{URL('homeinfo/unitnum')}}" ,
			type : "post" ,
			data : {
				unitnum : unitnum ,
				_token : "{{csrf_token()}}"
			} ,
			success : function ( data ) {
				console.log( data );
				var str = "";
				for ( var ig = 0 ; ig < data.length ; ig++ ) {
					str += "<option value='" + data[ig]['homeid'] + "'> " + data[ig]['roomnums'] + " </option>"
				}
				var aa = '<option value="">--{{ trans('buy.please_choice') }}--</option>';
				$( '#roomnum' ).html( aa + str );
				$( '#buildnumss' ).addClass( 'none' );
				$( '#unitnumss' ).addClass( 'none' );
				$( '#roomnumss' ).addClass( 'none' );
				$( '#build_area' ).addClass( 'none' );
				$( '#price' ).addClass( 'none' );
				$( '#total' ).addClass( 'none' );
				$( '#discount' ).addClass( 'none' );
			}
		} )
	} );
	//展示房子信息
	$( '#roomnum' ).change( function () {
		var field_id = $( this ).val();
		$.ajax( {
			url : "{{URL('homeinfo/view')}}" ,
			type : "post" ,
			data : {
				field_id : field_id ,
				_token : "{{csrf_token()}}"
			} ,
			success : function ( data ) {
				console.log( data );
				$( '#buildnumss' ).removeClass( 'none' );
				$( '#unitnumss' ).removeClass( 'none' );
				$( '#roomnumss' ).removeClass( 'none' );
				$( '#build_area' ).removeClass( 'none' );
				$( '#price' ).removeClass( 'none' );
				$( '#total' ).removeClass( 'none' );
				$( '#discount' ).removeClass( 'none' );
				$( '#buildnums' ).val( data[0]['buildnums'] );
				$( '#unitnums' ).val( data[0]['unitnums'] );
				$( '#roomnums' ).val( data[0]['roomnums'] );
				$( '#build_areas' ).val( data[0]['build_area'] );
				$( '#prices' ).val( data[0]['price'] );
				$( '#totals' ).val( data[0]['total'] );
				$( '#discounts' ).val( data[0]['discount'] );
			}
		} )
	} );
	//添加新增房屋共有人

</script>
<script>

	//添加到数据库

	$( '#store1' ).click( function () {

		// $( "#store1" ).attr( 'disabled' , true );

		var roomnum = $( '#roomnum' ).val();     //房子id
		if ( roomnum == '' ) {
			layer.msg( '{{ trans('buy.total_pricess_text') }}' , { time : 1563 } );
			return false;
		}

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
		//1：更名 2：换房
		var type = 2;

		$.ajax( {
			url : "{{URL('change_home/store')}}" ,
			type : 'post' ,
			data : {
				cust_id : '{{$cust -> cust_id}}' ,         //用户id
				old_homeid : '{{$cust -> homeid}}' ,                 //老房源id
				new_homeid : roomnum ,          //新房源
				remarks : remarks ,                //换房或更新备注
				buyid: '{{$cust -> buyid}}',
				type: type,
				_token : "{{csrf_token()}}"
			} ,
			success : function ( data ) {
				console.log( data );
				if ( data.code == {{config('myconfig.changeh.store_change_success_code')}}) {
					layer.msg( data.msg , { time : 2000 } , function () {
						window.parent.location.reload();
					} );
				}

				if ( data.code == {{config('myconfig.changeh.store_change_error_code')}}) {
					layer.msg( data.msg , { time : 2000 } );
					$( "#store1" ).attr( 'disabled' , false );
				}

				if ( data.code == {{config('myconfig.changeh.remarks_code')}}) {
					layer.msg( data.msg , { time : 2000 } );
					$( "#store1" ).attr( 'disabled' , false );
				}

			}
		} )
	} )
</script>
</html>
