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

			@if($status == 2)
				<div class="form-group">
					<label>{{ trans('buy.cust_id') }}：</label>
					<select name="cust_id" id="cust_id" class="form-control">
						<option value="">--请选择客户--</option>
						@foreach($customer as $k =>$v)
							<option value="{{$v -> cust_id}}">{{$v -> realname}}</option>
						@endforeach
					</select>
				</div>
				<div class="form-group none" id="name">
					{{--<label>{{ trans('buy.pay_num')}}：</label>--}}
					<label>用户姓名：</label>
					<input type="text" class="form-control"
					       {{--onkeyup="value=value.replace(/[^\d.]/g,'')"--}}
					       name="name" placeholder="" id="names"
					       maxlength="12">
				</div>
				<div class="form-group none" id="iphone">
					{{--<label>{{ trans('buy.pay_num')}}：</label>--}}
					<label>手机号：</label>
					<input type="text" class="form-control"
					       {{--onkeyup="value=value.replace(/[^\d.]/g,'')"--}}
					       name="iphone" placeholder="" id="iphones"
					       maxlength="12">
				</div>
				<div class="form-group none" id="shen">
					{{--<label>{{ trans('buy.pay_num')}}：</label>--}}
					<label>身份证号：</label>
					<input type="text" class="form-control"
					       {{--onkeyup="value=value.replace(/[^\d.]/g,'')"--}}
					       name="idcard" placeholder="" id="shens"
					       maxlength="18">
				</div>
			@else
					<input type="hidden" id="cust_id" value="{{$customer -> cust_id}}">
					<div class="form-group">
						{{--<label>{{ trans('buy.pay_num')}}：</label>--}}
						<label>用户姓名：</label>
						<input type="text" class="form-control"
						       value="{{$customer -> realname}}"
						       name="name" placeholder="" id="names"
						       maxlength="12">
					</div>
					<div class="form-group">
						{{--<label>{{ trans('buy.pay_num')}}：</label>--}}
						<label>手机号：</label>
						<input type="text" class="form-control"
						       value="{{$customer -> mobile}}"
						       name="iphone" placeholder="" id="iphones"
						       maxlength="12">
					</div>
					<div class="form-group" >
						{{--<label>{{ trans('buy.pay_num')}}：</label>--}}
						<label>身份证号：</label>
						<input type="text" class="form-control"
						       value="{{$customer -> idcard}}"
						       name="idcard" placeholder="" id="shens"
						       maxlength="18">
					</div>
			@endif
				{{--<div class="form-group none" id="dizhi">--}}
				{{--<label>{{ trans('buy.pay_num')}}：</label>--}}
				{{--<label>地址：</label>--}}
				{{--<input type="text" class="form-control"--}}
				{{--onkeyup="value=value.replace(/[^\d.]/g,'')"--}}
				{{--name="dizhi" placeholder="请输入缴费金额" id="dizhis"--}}
				{{--maxlength="12">--}}
				{{--</div>--}}

				<div class="form-group">
					<label>{{ trans('buy.homeid') }}：</label><br>
					<select name="buildnum" id="buildnum" class="form-control" style="width: 30%;float: left">
						<option value="">--请选房源--</option>
						@foreach($home as $kq =>$vq)
							<option value="{{$vq -> field_id}}">{{$vq -> name}}</option>
						@endforeach
					</select>
					<select name="unitnum" id="unitnum" class="form-control" style="width: 30%;float: left">
						<option value="0">--请选则--</option>

					</select>
					<select name="roomnum" id="roomnum" class="form-control" style="width: 30%;float: left">
						<option value="0">--请选则--</option>
					</select>
				</div>
				<br><br>

				<div class="form-group none" id="buildnumss">
					{{--<label>{{ trans('buy.pay_num')}}：</label>--}}
					<label>楼号：</label>
					<input type="text" class="form-control" readonly
					       {{--onkeyup="value=value.replace(/[^\d.]/g,'')"--}}
					       name="buildnums" placeholder="请输入缴费金额" id="buildnums"
					       maxlength="12">
				</div>
				<div class="form-group none" id="unitnumss">
					{{--<label>{{ trans('buy.pay_num')}}：</label>--}}
					<label>单元号：</label>
					<input type="text" class="form-control" readonly
					       {{--onkeyup="value=value.replace(/[^\d.]/g,'')"--}}
					       name="unitnums" placeholder="请输入缴费金额" id="unitnums"
					       maxlength="12">
				</div>
				<div class="form-group none" id="roomnumss">
					{{--<label>{{ trans('buy.pay_num')}}：</label>--}}
					<label>房号：</label>
					<input type="text" class="form-control" readonly
					       {{--onkeyup="value=value.replace(/[^\d.]/g,'')"--}}
					       name="roomnums" placeholder="请输入缴费金额" id="roomnums"
					       maxlength="12">
				</div>
				<div class="form-group none" id="build_area">
					{{--<label>{{ trans('buy.pay_num')}}：</label>--}}
					<label>建筑面积：</label>
					<input type="text" class="form-control" readonly
					       {{--onkeyup="value=value.replace(/[^\d.]/g,'')"--}}
					       name="build_areas" placeholder="请输入缴费金额" id="build_areas"
					       maxlength="12">
				</div>
				<div class="form-group none" id="price">
					{{--<label>{{ trans('buy.pay_num')}}：</label>--}}
					<label>单价：</label>
					<input type="text" class="form-control" readonly
					       {{--onkeyup="value=value.replace(/[^\d.]/g,'')"--}}
					       name="prices" placeholder="请输入缴费金额" id="prices"
					       maxlength="12">
				</div>
				<div class="form-group none" id="total">
					{{--<label>{{ trans('buy.pay_num')}}：</label>--}}
					<label>总价：</label>
					<input type="text" class="form-control" readonly
					       {{--onkeyup="value=value.replace(/[^\d.]/g,'')"--}}
					       name="totals" placeholder="请输入缴费金额" id="totals"
					       maxlength="12">
				</div>
				<div class="form-group none" id="discount">
					{{--<label>{{ trans('buy.pay_num')}}：</label>--}}
					<label>折扣：</label>
					<input type="text" class="form-control" readonly
					       {{--onkeyup="value=value.replace(/[^\d.]/g,'')"--}}
					       name="discounts" placeholder="请输入缴费金额" id="discounts"
					       maxlength="12">
				</div>
				<input type="hidden" value="0" id="fanggmun">
				<div class="form-group">
					{{--<label>{{ trans('buy.pay_num')}}：</label>--}}
					<label>房屋共有人：</label><br>
					<div id="fangwug">
					</div>
					<br>
					<button class="btn btn-dropbox" id="store_fg">添加</button>
				</div>
				{{--<div class="form-group">--}}
				{{--<label>{{ trans('buy.lock_time')}}：</label>--}}
				{{--<input type="text" class="layui-input" id="lock_time" placeholder="请选择时间如果不选择默认为一小时">--}}
				{{--</div>--}}
				<div class="form-group">
					<label>{{ trans('buy.pay_num')}}：</label>
					<input type="text" class="form-control"
					       onkeyup="value=value.replace(/[^\d.]/g,'')"
					       name="pay_num" placeholder="请输入缴费金额" id="pay_num"
					       maxlength="12">
				</div>

				<div class="form-group">
					<label>{{ trans('buy.pay_type') }}：</label>
					<select name="pay_type" id="pay_type" class="form-control">
						<option value="">--请选则--</option>
						<option value="0">一次性付款</option>
						<option value="1">按揭付款</option>
					</select>
				</div>

				<div id="total_price" class="form-group none" >
					<label>总金额：</label>
					<input type="text" class="form-control"
					       {{--onkeyup="value=value.replace(/[^\d.]/g,'')"--}}
					       name="total_price" placeholder="请输入缴费金额" id="total_prices"
					       maxlength="12">
				</div>
				<div id="month_pay" class="form-group none" >
					<label>月供：</label>
					<input type="text" class="form-control"
					       onkeyup="value=value.replace(/[^\d.]/g,'')"
					       name="total_price" placeholder="请输入缴费金额" id="month_pays"
					       maxlength="12">
					<label>年限：</label>
					<input type="text" class="form-control"
					       onkeyup="value=value.replace(/[^\d.]/g,'')"
					       name="loan_term" placeholder="请输入缴费金额" id="loan_term"
					       maxlength="12">
					<label>总金额：</label>
					<input type="text" class="form-control"
					       onkeyup="value=value.replace(/[^\d.]/g,'')"
					       name="total_price" placeholder="请输入缴费金额" id="total_pricess"
					       maxlength="12">
				</div>

				<div class="form-group">
					<label>{{ trans('buy.remarks') }}：</label>
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
	//根据用户id查询用户信息
	$( '#cust_id' ).change( function () {
		var cust_id = $( this ).val();

		if ( cust_id == '' ) {
			$( '#name' ).addClass( 'none' );
			$( '#iphone' ).addClass( 'none' );
			$( '#shen' ).addClass( 'none' );
			return false;
		}

		$.ajax( {
			url : "{{URL('customer/change')}}" ,
			type : "post" ,
			data : {
				cust_id : cust_id ,
				_token : "{{csrf_token()}}"
			} ,
			success : function ( data ) {
				console.log( data );
				$( '#name' ).removeClass( 'none' );
				$( '#iphone' ).removeClass( 'none' );
				$( '#shen' ).removeClass( 'none' );
				// $('#dizhi').removeClass('none');
				$( '#names' ).val( data[0]['realname'] );
				$( '#iphones' ).val( data[0]['mobile'] );
				$( '#shens' ).val( data[0]['idcard'] );
			}
		} )
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
			var cc = '<option value="">--请选则--</option>';
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
				var cc = '<option value="">--请选则--</option>';

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
				var aa = '<option value="">--请选则--</option>';
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
	$( '#store_fg' ).click( function () {
		var mun = $( '#fanggmun' ).val();
		var str = '<div style="display:inline-block" >\n' +
			'\t\t\t\t\t\t\t<select name="relation" id="relation' + mun + '" class="form-control" style="width: 15%;float: left">\n' +
			'\t\t\t\t\t\t\t\t<option value="0">配偶</option>\n' +
			'\t\t\t\t\t\t\t\t<option value="1">儿子</option>\n' +
			'\t\t\t\t\t\t\t\t<option value="2">女儿</option>\n' +
			'\t\t\t\t\t\t\t\t<option value="3">父亲</option>\n' +
			'\t\t\t\t\t\t\t\t<option value="4">母亲</option>\n' +
			'\t\t\t\t\t\t\t\t<option value="5">亲戚</option>\n' +
			'\t\t\t\t\t\t\t</select>\n' +
			'\t\t\t\t\t\t\t<input type="text" class="form-control" style="width: 15%;float: left"\n' +
			'\t\t\t\t\t\t\t       {{--onkeyup="value=value.replace(/[^\\d.]/g,\'\')"--}}\n' +
			'\t\t\t\t\t\t\t       name="realname" placeholder="姓名" id="realname' + mun + '"\n' +
			'\t\t\t\t\t\t\t       maxlength="12">\n' +
			'\t\t\t\t\t\t\t<select name="sex" id="sex' + mun + '" class="form-control" style="width: 15%;float: left">\n' +
			'\t\t\t\t\t\t\t\t<option value="0">先生</option>\n' +
			'\t\t\t\t\t\t\t\t<option value="1">女士</option>\n' +
			'\t\t\t\t\t\t\t</select>\n' +
			'\t\t\t\t\t\t\t<input type="text" class="layui-input form-control" style="width: 15%;float: left;height:34px"\n' +
			'\t\t\t\t\t\t\t       {{--onkeyup="value=value.replace(/[^\\d.]/g,\'\')"--}}\n' +
			'\t\t\t\t\t\t\t       name="birthday" placeholder="生日" autocomplete="off" id="birthday' + mun + '"\n' +
			'\t\t\t\t\t\t\t       >\n' +

			'\t\t\t\t\t\t\t<input type="text" class="form-control" style="width: 15%;float: left"\n' +
			'\t\t\t\t\t\t\t       {{--onkeyup="value=value.replace(/[^\\d.]/g,\'\')"--}}\n' +
			'\t\t\t\t\t\t\t       name="idcard" placeholder="证件号码" id="idcard' + mun + '"\n' +
			'\t\t\t\t\t\t\t       maxlength="18">\n' +
			'\t\t\t\t\t\t\t<input type="text" class="form-control" style="width: 15%;float: left"\n' +
			'\t\t\t\t\t\t\t       {{--onkeyup="value=value.replace(/[^\\d.]/g,\'\')"--}}\n' +
			'\t\t\t\t\t\t\t       name="mobile" placeholder="手机号" value="" id="mobile' + mun + '"\n' +
			'\t\t\t\t\t\t\t       maxlength="11">\n' +
			'\t\t\t\t\t\t</div>';
		$( '#fangwug' ).append( str );
		var counter = Number( mun ) + 1;
		$( '#fanggmun' ).val( counter );
		time_xz( counter );
		return false;
	} );
	//循环除开日期选择器
	function time_xz( counter ) {
		for ( $i = 0 ; $i <= counter ; $i++ ) {
			layui.use( 'laydate' , function () {
				var laydate = layui.laydate;
				laydate.render( {
					elem : '#birthday' + $i ,
				} );
			} );
		}
	}
	//选择哪种缴费方式
	$( '#pay_type' ).change( function () {
		var cc = $( this ).val();
		if ( cc == 0 ) {
			var fangzi_g = $( '#totals' ).val();
			var zhekou = $( '#discounts' ).val();
			if ( fangzi_g == '' || zhekou == '' ) {
				layer.msg( '请先选择房源' , { time : 1236 } );
				return false;
			}
			else {
				$( '#total_price' ).removeClass( 'none' );
				$( '#month_pay' ).addClass( 'none' );
			}
		}
		else {
			var fangzi_g = $( '#totals' ).val();
			var zhekou = $( '#discounts' ).val();
			if ( fangzi_g == '' || zhekou == '' ) {
				layer.msg( '请先选择房源' , { time : 1236 } );
				return false;
			}
			else {
				$( '#month_pay' ).removeClass( 'none' );
				$( '#total_price' ).addClass( 'none' );
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

		var cust_ids = $( '#cust_id' ).val();   //客户id
		var names = $( '#names' ).val();         //客户姓名
		var iphones = $( '#iphones' ).val();     //客户手机号
		var shens = $( '#shens' ).val();    // 身份证号
		if ( names == '' || iphones == '' || shens == '' ) {
			layer.msg( '用户信息不全' , { time : 1563 } );
			return false;
		}

		if ( !mobile_pattern.test( iphones ) ) {
			layer.msg( '用户手机号不合法' , { time : 1456 } );
			$( '#store1' ).attr( 'disabled' , false );
			return false;
		}

		if ( !idcard_pattern.test( shens ) ) {
			layer.msg( '用户身份信息不合法' , { time : 1456 } );
			$( '#store1' ).attr( 'disabled' , false );
			return false;
		}

		//房子id
		var roomnum = $( '#roomnum' ).val();     //房子id
		if ( roomnum == '' ) {
			layer.msg( '请选择房源' , { time : 1563 } );
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
					layer.msg( '第' + zzz + '手机号不合法' , { time : 1456 } );
					$( '#store1' ).attr( 'disabled' , false );
					fanggmunren = [];
					return false;
				}
				if ( !idcard_pattern.test( idcard ) ) {
					layer.msg( '第' + zzz + '身份信息不合法' , { time : 1546 } );
					$( "#store1" ).attr( 'disabled' , false );
					fanggmunren = [];
					return false;
				}
				if ( relation == '' || realname == '' || sex == '' || birthday == ''
					|| idcard == '' || mobile == '' || cust_id == ''
				) {
					layer.msg( '第' + zzz + '条信息不全' , { time : 1546 } );
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
			layer.msg( '请选择付款方案' , { time : 1563 } );
			return false;
		}
		else if ( pay_type == 1 ) {

			// alert(123);

			var total_prices = $( '#total_pricess' ).val();   //总金额
			var loan_term = $( '#loan_term' ).val();        //年限
			var month_pays = $( '#month_pays' ).val();    // 月供
			console.log(total_prices,loan_term,month_pays);
			if(total_prices == '' || loan_term == '' || month_pays == ''){
					layer.msg('请填写总金额,年限，月供',{time:1236});
					return false;
			}
		}
		else if ( pay_type == 0 ) {

			// alert(465);
			var total_prices = $( '#total_prices' ).val();   //总金额
			var loan_term = '';        //年限
			var month_pays = '';    // 月供
			if(total_prices == ''){
				layer.msg('请填写总金额',{time:1236});
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
