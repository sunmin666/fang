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
				<div class="form-group" >
					{{--<label>{{ trans('buy.pay_num')}}：</label>--}}
					<label>{{ trans('buy.names') }}：</label>
					<input type="text" class="form-control"
					       {{--onkeyup="value=value.replace(/[^\d.]/g,'')"--}}
					       name="realname" placeholder="" id="realname" value="{{$buy -> realname}}"
					       maxlength="12">
				</div>
				<div class="form-group">
					{{--<label>{{ trans('buy.pay_num')}}：</label>--}}
					<label>{{ trans('buy.iphones') }}：</label>
					<input type="text" class="form-control"
					       {{--onkeyup="value=value.replace(/[^\d.]/g,'')"--}}
					       name="mobile" placeholder="" id="mobile" value="{{$buy -> mobile}}"
					       maxlength="12">
				</div>
				<div class="form-group">
					{{--<label>{{ trans('buy.pay_num')}}：</label>--}}
					<label>{{ trans('buy.shens') }}：</label>
					<input type="text" class="form-control"
					       {{--onkeyup="value=value.replace(/[^\d.]/g,'')"--}}
					       name="idcard" placeholder="" id="idcard" value="{{$buy -> idcard}}"
					       maxlength="12">
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
					{{--<label>{{ trans('buy.pay_num')}}：</label>--}}
					<label>{{ trans('buy.buildnums') }}：</label>
					<input type="text" class="form-control" readonly
					       {{--onkeyup="value=value.replace(/[^\d.]/g,'')"--}}
						       value="{{$buy -> buildnums}}"
					       name="buildnums"  id="buildnums"
					       maxlength="12">
				</div>
				<div class="form-group">
					{{--<label>{{ trans('buy.pay_num')}}：</label>--}}
					<label>{{ trans('buy.unitnums') }}：</label>
					<input type="text" class="form-control" readonly
					       value="{{$buy -> unitnums}}"
					       {{--onkeyup="value=value.replace(/[^\d.]/g,'')"--}}
					       name="unitnums"  id="unitnums"
					       maxlength="12">
				</div>
				<div class="form-group" >
					{{--<label>{{ trans('buy.pay_num')}}：</label>--}}
					<label>{{ trans('buy.roomnums') }}：</label>
					<input type="text" class="form-control" readonly
					       value="{{$buy -> roomnums}}"
					       {{--onkeyup="value=value.replace(/[^\d.]/g,'')"--}}
					       name="roomnums"  id="roomnums"
					       maxlength="12">
				</div>
				<div class="form-group" >
					{{--<label>{{ trans('buy.pay_num')}}：</label>--}}
					<label>{{ trans('buy.totals') }}：</label>
					<input type="text" class="form-control" readonly
					       value="{{$buy -> total}}"
					       {{--onkeyup="value=value.replace(/[^\d.]/g,'')"--}}
					       name="roomnums"  id="roomnums"
					       maxlength="12">
				</div>
				<div class="form-group" >
					{{--<label>{{ trans('buy.pay_num')}}：</label>--}}
					<label>{{ trans('buy.discounts') }}：</label>
					<input type="text" class="form-control" readonly
					       value="{{$buy -> discount}}"
					       {{--onkeyup="value=value.replace(/[^\d.]/g,'')"--}}
					       name="roomnums"  id="roomnums"
					       maxlength="12">
				</div>

				<div class="form-group">
				<label>{{ trans('buy.lock_time')}}：</label>
				<input type="text" class="layui-input" id="lock_time" placeholder="{{ trans('buy.lock_timee')}}">
				</div>

				<div class="form-group">
					<label>{{ trans('buy.pay_num')}}：</label>
					<input type="text" class="form-control"
					       onkeyup="value=value.replace(/[^\d.]/g,'')"
					       value="{{$buy -> pay_num}}"
					       name="pay_num" placeholder="{{ trans('buy.please_many')}}" id="pay_num"
					       maxlength="12">
				</div>

				<div class="form-group">
					<label>{{ trans('buy.pay_type') }}：</label>
					<select name="pay_type" id="pay_type" class="form-control">
						<option value="">--{{ trans('buy.please_choose') }}--</option>
						<option value="0" @if($buy -> pay_type == 0) selected @endif>{{ trans('buy.all_payment') }}</option>
						<option value="1" @if($buy -> pay_type == 1) selected @endif>{{ trans('buy.mortgage') }}</option>
					</select>
				</div>

				<div id="total_price" class="form-group @if($buy -> pay_type != 0) none @endif ">
					<label>{{ trans('buy.total_prices') }}：</label>
					<input type="text" class="form-control"
					       {{--onkeyup="value=value.replace(/[^\d.]/g,'')"--}}
					       @if($buy -> pay_type == 0) value="{{$buy -> total_price}}" @endif
					       name="total_price" placeholder="{{ trans('buy.please_many')}}" id="total_prices"
					       maxlength="12">
				</div>

				<div id="month_pay" class="form-group @if($buy -> pay_type == 0) none @endif">
					<label>{{ trans('buy.loan_term') }}：</label>
					<input type="text" class="form-control"
					       {{--onkeyup="value=value.replace(/[^\d.]/g,'')"--}}
					       @if($buy -> pay_type == 1) value="{{$buy -> loan_term}}" @endif
					       name="loan_term" placeholder="{{ trans('buy.please_many')}}" id="loan_term"
					       maxlength="12">
					<label>{{ trans('buy.loan_term') }}：</label>
					<input type="text" class="form-control"
					       {{--onkeyup="value=value.replace(/[^\d.]/g,'')"--}}
					       @if($buy -> pay_type == 1) value="{{$buy -> month_pay}}" @endif
					       name="month_pay" placeholder="{{ trans('buy.please_many')}}" id="month_pays"
					       maxlength="12">
					<label>{ trans('buy.total_prices')}}：</label>
					<input type="text" class="form-control"
					       {{--onkeyup="value=value.replace(/[^\d.]/g,'')"--}}
					       @if($buy -> pay_type == 1) value="{{$buy -> total_price}}" @endif
					       name="total_price" placeholder="{{ trans('buy.please_many')}}" id="total_pricess"
					       maxlength="12">
				</div>

				<div class="form-group">
					<label>{{ trans('buy.remarks') }}：</label>
					<textarea name="remarks" id="remarks" class="form-control" cols="30" rows="5" style="resize:none">{{$buy -> remarks}}</textarea>
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
	//日期时间选择器
	layui.use( 'laydate' , function () {
		var laydate = layui.laydate;
		laydate.render( {
			elem : '#lock_time'
			, type : 'datetime'
			, min : minTime()
		} );
	} );

	//不让选择以前的时间
	function minTime() {
		var now = new Date();
		return now.getFullYear() + "-" + ( now.getMonth() + 1 ) + "-" + now.getDate() + " " + ( now.getHours() + 1 ) + ":" + now.getMinutes() + ":" + now.getSeconds();
	}

	//选择哪种缴费方式
	$( '#pay_type' ).change( function () {
		var cc = $( this ).val();
		if ( cc == 0 ) {
				$( '#total_price' ).removeClass( 'none' );
				$( '#month_pay' ).addClass( 'none' );
		}
		else {
			var fangzi_gs = $( '#totals' ).val();
			var zhekous = $( '#discounts' ).val();
			if ( fangzi_gs == '' || zhekous == '' ) {
				layer.msg( '{{ trans('buy.total_pricess_text') }}' , { time : 1236 } );
				return false;
			}
			else {
				$( '#total_price' ).addClass( 'none' );
				$( '#month_pay' ).removeClass( 'none' );

			}
		}
	} );


</script>
<script>

	//添加到数据库

	$( '#store1' ).click( function () {

		// $( "#store1" ).attr( 'disabled' , true );
		//客户信息
		var mobile_pattern = {{config('myconfig.config.mobile_pattern')}};   //手机号正则匹配
		var idcard_pattern = {{config('myconfig.config.idcard_pattern')}};           //身份证正则表达式

		var names = $( '#realname' ).val();         //客户姓名
		var iphones = $( '#mobile' ).val();     //客户手机号
		var shens = $( '#idcard' ).val();    // 身份证号
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

		var lock_time = $('#lock_time').val();

		//获取缴纳定金
		var pay_num = $( '#pay_num' ).val();
		//付款方案
		var pay_type = $( '#pay_type' ).val();
		if ( pay_type == '' ) {
			layer.msg( '{{ trans('buy.pay_type_text') }}' , { time : 1563 } );
			return false;
		}
		else if ( pay_type == 1 ) {

			alert(123);
			var total_prices = $( '#total_pricess' ).val();   //总金额
			var loan_term = $( '#loan_term' ).val();        //年限
			var month_pays = $( '#month_pays' ).val();    // 月供
			if(total_prices == '' || loan_term == '' || month_pays == ''){
				layer.msg('{{ trans('buy.all_type_text') }}',{time:1236});
				return false;
			}
		}
		else if ( pay_type == 0 ) {
			alert(456);
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
			url : "{{URL('buyinfoss/update')}}" ,
			type : 'post' ,
			data : {
				buyid:"{{$buy -> buyid}}",
				cust_id : '{{$buy -> cust_id}}' ,         //用户id
				names : names ,                 //用户姓名
				iphones : iphones ,          //手机号
				shens : shens ,                //身份证号
				lock_time:lock_time,
				pay_num : pay_num ,                        //缴纳定金
				pay_type : pay_type ,                    //付款方式
				total_prices : total_prices ,          //总金额
				loan_term : loan_term ,                  //年限
				month_pays : month_pays ,               //月供
				remarks : remarks ,                    // 职业顾问备注
				_token : "{{csrf_token()}}"
			} ,
			success : function ( data ) {
				console.log( data );

				if ( data.code == {{config('myconfig.buy.buy_update_success_code')}}) {
					layer.msg( data.msg , { time : 2000 } , function () {
						window.parent.location.reload();
					} );
				}

				if ( data.code == {{config('myconfig.buy.buy_update_error_code')}}) {
					layer.msg( data.msg , { time : 2000 } );
					$( "#store1" ).attr( 'disabled' , false );
				}

				if ( data.code == {{config('myconfig.buy.remarks_code')}}) {
					layer.msg( data.msg , { time : 2000 } );
					$( "#store1" ).attr( 'disabled' , false );
				}
			}
		} )
	} )
</script>
</html>
