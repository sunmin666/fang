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
		//客户信息
		var mobile_pattern = {{config('myconfig.config.mobile_pattern')}};   //手机号正则匹配
		var idcard_pattern = {{config('myconfig.config.idcard_pattern')}};           //身份证正则表达式

		var cust_ids = $( '#cust_id' ).val();   //客户id
		var names = $( '#names' ).val();         //客户姓名
		var iphones = $( '#iphones' ).val();     //客户手机号
		var shens = $( '#shens' ).val();    // 身份证号
		if ( names == '' || iphones == '' || shens == '' ) {
			layer.msg( '{{ trans('buy.username_text') }}' , { time : 1563 } );
			return false;
		}

		if ( !mobile_pattern.test( iphones ) ) {
			layer.msg( '{{ trans('buy.username_iphones_text') }}' , { time : 1456 } );
			$( '#store1' ).attr( 'disabled' , false );
			return false;
		}

		if ( !idcard_pattern.test( shens ) ) {
			layer.msg( '{{ trans('buy.username_shens_text') }}' , { time : 1456 } );
			$( '#store1' ).attr( 'disabled' , false );
			return false;
		}

		//房子id
		var roomnum = $( '#roomnum' ).val();     //房子id
		if ( roomnum == '' ) {
			layer.msg( '{{ trans('buy.total_pricess_text') }}' , { time : 1563 } );
			return false;
		}
		//房屋共有人

		var fanggmun = $( '#fanggmun' ).val();     //房屋共有人信息个数
		if ( fanggmun != 0 ) {
			var fanggmunren = [];
			for ( var ig = 0 ; ig < fanggmun ; ig++ ) {
				var res = {};
				var relation = $( '#relation' + ig ).val();   //关系
				var realname = $( '#realname' + ig ).val();     //姓名
				var sex = $( '#sex' + ig ).val();         //性别
				var birthday = $( '#birthday' + ig ).val();  //生日
				var idcard = $( '#idcard' + ig ).val();        //证件号码
				var mobile = $( '#mobile' + ig ).val();       //手机号码
				var cust_id = cust_ids;            //客户id
				var zzz = Number( ig ) + 1;
				if ( !mobile_pattern.test( mobile ) ) {
					layer.msg( '第' + zzz + '{{ trans('buy.username_iphones_text') }}' , { time : 1456 } );
					$( '#store1' ).attr( 'disabled' , false );
					fanggmunren = [];
					return false;
				}
				if ( !idcard_pattern.test( idcard ) ) {
					layer.msg( '第' + zzz + '{{ trans('buy.username_shens_text') }}' , { time : 1546 } );
					$( "#store1" ).attr( 'disabled' , false );
					fanggmunren = [];
					return false;
				}
				if ( relation == '' || realname == '' || sex == '' || birthday == ''
					|| idcard == '' || mobile == '' || cust_id == ''
				) {
					layer.msg( '第' + zzz + '{{ trans('buy.username_text') }}' , { time : 1546 } );
					$( "#store1" ).attr( 'disabled' , false );
					fanggmunren = [];
					return false;
				}
				else {
					res['relation'] = relation;
					res['realname'] = realname;
					res['sex'] = sex;
					res['birthday'] = birthday;
					res['idcard'] = idcard;
					res['mobile'] = mobile;
					res['cust_id'] = cust_id;
					fanggmunren.push( res );
				}
			}
		}

		//获取缴纳定金
		var pay_num = $( '#pay_num' ).val();
		//付款方案
		var pay_type = $( '#pay_type' ).val();
		if ( pay_type == '' ) {
			layer.msg( '{{ trans('buy.pay_type_text') }}' , { time : 1563 } );
			return false;
		}
		else if ( pay_type == 1 ) {

			// alert(123);

			var total_prices = $( '#total_pricess' ).val();   //总金额
			var loan_term = $( '#loan_term' ).val();        //年限
			var month_pays = $( '#month_pays' ).val();    // 月供
			console.log(total_prices,loan_term,month_pays);
			if(total_prices == '' || loan_term == '' || month_pays == ''){
				layer.msg('{{ trans('buy.all_type_text') }}',{time:1236});
				return false;
			}
		}
		else if ( pay_type == 0 ) {

			// alert(465);
			var total_prices = $( '#total_prices' ).val();   //总金额
			var loan_term = '';        //年限
			var month_pays = '';    // 月供
			if(total_prices == ''){
				layer.msg('{{ trans('buy.total_prices_text') }}',{time:1236});
				return false;
			}

		}
		//获取职业顾问备注
		var remarks = $( '#remarks' ).val();

		if ( pay_num == '' || total_prices == '' || remarks == '' ) {
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
			url : "{{URL('buyinfoss/store')}}" ,
			type : 'post' ,
			data : {
				cust_id : cust_ids ,         //用户id
				names : names ,                 //用户姓名
				iphones : iphones ,          //手机号
				shens : shens ,                //身份证号
				roomnum : roomnum ,              //房子id
				fanggmunren : fanggmunren ,         //房屋共有人
				loan_term:loan_term,
				month_pay:month_pays,
				pay_num : pay_num ,                        //缴纳定金
				pay_type : pay_type ,                    //付款方式
				total_prices : total_prices ,          //总金额
				remarks : remarks ,                    // 职业顾问备注
				_token : "{{csrf_token()}}"
			} ,
			success : function ( data ) {
				console.log( data );

				if ( data.code == {{config('myconfig.buy.buy_store_success_code')}}) {
					layer.msg( data.msg , { time : 2000 } , function () {
						window.parent.location.reload();
					} );
				}

				if ( data.code == {{config('myconfig.buy.buy_store_error_code')}}) {
					layer.msg( data.msg , { time : 2000 } );
					$( "#store1" ).attr( 'disabled' , false );
				}

				if ( data.code == {{config('myconfig.buy.homeinfo_status_code')}}) {
					layer.msg( data.msg , { time : 2000 } );
					$( "#store1" ).attr( 'disabled' , false );
				}
				if ( data.code == {{config('myconfig.buy.remarks_code')}}) {
					layer.msg( data.msg , { time : 2000 } );
					$( "#store1" ).attr( 'disabled' , false );
				}
				if ( data.code == {{config('myconfig.buy.shen_code')}}) {
					layer.msg( data.msg , { time : 2000 } );
					$( "#store1" ).attr( 'disabled' , false );
				}
			}
		} )
	} )
</script>
</html>
