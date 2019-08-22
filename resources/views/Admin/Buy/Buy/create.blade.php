<!doctype html>
<html lang="en">
<head>
	@include('Public.weekly_css')
	<style>
		.none {
			display : none;
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

					<label>{{ trans('buy.cust_id') }}：</label>
					<select name="cust_id" id="cust_id" class="form-control">
						<option value="0">--请选择客户--</option>
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
					       name="name" placeholder="请输入缴费金额" id="names"
					       maxlength="12">
				</div>
				<div class="form-group none" id="iphone">
					{{--<label>{{ trans('buy.pay_num')}}：</label>--}}
					<label>手机号：</label>
					<input type="text" class="form-control"
					       {{--onkeyup="value=value.replace(/[^\d.]/g,'')"--}}
					       name="iphone" placeholder="请输入缴费金额" id="iphones"
					       maxlength="12">
				</div>
				<div class="form-group none" id="shen">
					{{--<label>{{ trans('buy.pay_num')}}：</label>--}}
					<label>身份证号：</label>
					<input type="text" class="form-control"
					       {{--onkeyup="value=value.replace(/[^\d.]/g,'')"--}}
					       name="shen" placeholder="请输入缴费金额" id="shens"
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

				<div class="form-group">
					<label>{{ trans('buy.homeid') }}：</label><br>
					<select name="buildnum" id="buildnum" class="form-control" style="width: 30%;float: left">
						<option value="0">--请选房源--</option>
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
					<input type="text" class="form-control"
					       {{--onkeyup="value=value.replace(/[^\d.]/g,'')"--}}
					       name="buildnums" placeholder="请输入缴费金额" id="buildnums"
					       maxlength="12">
				</div>
				<div class="form-group none" id="unitnumss">
					{{--<label>{{ trans('buy.pay_num')}}：</label>--}}
					<label>单元号：</label>
					<input type="text" class="form-control"
					       {{--onkeyup="value=value.replace(/[^\d.]/g,'')"--}}
					       name="unitnums" placeholder="请输入缴费金额" id="unitnums"
					       maxlength="12">
				</div>
				<div class="form-group none" id="roomnumss">
					{{--<label>{{ trans('buy.pay_num')}}：</label>--}}
					<label>房号：</label>
					<input type="text" class="form-control"
					       {{--onkeyup="value=value.replace(/[^\d.]/g,'')"--}}
					       name="roomnums" placeholder="请输入缴费金额" id="roomnums"
					       maxlength="12">
				</div>
				<div class="form-group none" id="build_area">
					{{--<label>{{ trans('buy.pay_num')}}：</label>--}}
					<label>建筑面积：</label>
					<input type="text" class="form-control"
					       {{--onkeyup="value=value.replace(/[^\d.]/g,'')"--}}
					       name="build_areas" placeholder="请输入缴费金额" id="build_areas"
					       maxlength="12">
				</div>
				<div class="form-group none" id="price">
					{{--<label>{{ trans('buy.pay_num')}}：</label>--}}
					<label>单价：</label>
					<input type="text" class="form-control"
					       {{--onkeyup="value=value.replace(/[^\d.]/g,'')"--}}
					       name="prices" placeholder="请输入缴费金额" id="prices"
					       maxlength="12">
				</div>
				<div class="form-group none" id="total">
					{{--<label>{{ trans('buy.pay_num')}}：</label>--}}
					<label>总价：</label>
					<input type="text" class="form-control"
					       {{--onkeyup="value=value.replace(/[^\d.]/g,'')"--}}
					       name="totals" placeholder="请输入缴费金额" id="totals"
					       maxlength="12">
				</div>
				<div class="form-group none" id="discount">
					{{--<label>{{ trans('buy.pay_num')}}：</label>--}}
					<label>折扣：</label>
					<input type="text" class="form-control"
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

				<div class="form-group">
					<label>{{ trans('buy.lock_time')}}：</label>
					<input type="text" class="layui-input" id="lock_time" placeholder="请选择时间如果不选择默认为一小时">
				</div>


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
			}
		} )
	} );

	//下拉联动 单元号去homeinfo表里查询数据status=1
	$( "#unitnum" ).change( function () {
		var unitnum = $( this ).val();
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

	$('#store_fg').click(function(){
		var mun = $('#fanggmun').val();
		var str = '<div style="display:inline-block" >\n' +
			'\t\t\t\t\t\t\t<input type="text" class="form-control" style="width: 15%;float: left"\n' +
			'\t\t\t\t\t\t\t       {{--onkeyup="value=value.replace(/[^\\d.]/g,\'\')"--}}\n' +
			'\t\t\t\t\t\t\t       name="discounts" placeholder="关系" id="discounts'+ mun+'"\n' +
			'\t\t\t\t\t\t\t       maxlength="12">\n' +
			'\t\t\t\t\t\t\t<input type="text" class="form-control" style="width: 15%;float: left"\n' +
			'\t\t\t\t\t\t\t       {{--onkeyup="value=value.replace(/[^\\d.]/g,\'\')"--}}\n' +
			'\t\t\t\t\t\t\t       name="discounts" placeholder="姓名" id="discounts"\n' +
			'\t\t\t\t\t\t\t       maxlength="12">\n' +
			'\t\t\t\t\t\t\t<select name="unitnum" id="unitnum" class="form-control" style="width: 15%;float: left">\n' +
			'\t\t\t\t\t\t\t\t<option value="0">先生</option>\n' +
			'\t\t\t\t\t\t\t\t<option value="1">女士</option>\n' +
			'\t\t\t\t\t\t\t</select>\n' +
			'\t\t\t\t\t\t\t<input type="text" class="form-control" style="width: 15%;float: left"\n' +
			'\t\t\t\t\t\t\t       {{--onkeyup="value=value.replace(/[^\\d.]/g,\'\')"--}}\n' +
			'\t\t\t\t\t\t\t       name="discounts" placeholder="生日" id="discounts"\n' +
			'\t\t\t\t\t\t\t       maxlength="12">\n' +
			'\t\t\t\t\t\t\t<input type="text" class="form-control" style="width: 15%;float: left"\n' +
			'\t\t\t\t\t\t\t       {{--onkeyup="value=value.replace(/[^\\d.]/g,\'\')"--}}\n' +
			'\t\t\t\t\t\t\t       name="discounts" placeholder="证件号码" id="discounts"\n' +
			'\t\t\t\t\t\t\t       maxlength="12">\n' +
			'\t\t\t\t\t\t\t<input type="text" class="form-control" style="width: 15%;float: left"\n' +
			'\t\t\t\t\t\t\t       {{--onkeyup="value=value.replace(/[^\\d.]/g,\'\')"--}}\n' +
			'\t\t\t\t\t\t\t       name="discounts" placeholder="手机号" id="discounts"\n' +
			'\t\t\t\t\t\t\t       maxlength="12">\n' +
			'\t\t\t\t\t\t</div>'

		$('#fangwug').html($('#fangwug').html( ) + str );

		return false;

	});


</script>
<script>

	//添加到数据库

	$( '#store1' ).click( function () {


		// $( "#store1" ).attr( 'disabled' , true );

		var cust_id = $( '#cust_id' ).val();   //公司中文名称
		var homeid = $( '#homeid' ).val();   //公司英文名称
		var lock_time = $( '#lock_time' ).val();  //公司法人代表信息
		var pay_num = $( '#pay_num' ).val();   //公司法人身份证号码
		var pay_type = $( '#pay_type' ).val();   //公司法人手机号码
		var remarks = $( '#remarks' ).val();    //公司营业执照照片

		if ( cust_id == '' || homeid == '' || pay_num == '' || pay_type == '' || remarks == '' ) {
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
				cust_id : cust_id ,
				homeid : homeid ,
				lock_time : lock_time ,
				pay_num : pay_num ,
				pay_type : pay_type ,
				remarks : remarks ,
				_token : "{{csrf_token()}}"
			} ,
			success : function ( data ) {
				console.log( data );

				{{--if ( data.code == {{config('myconfig.company.company_store_success_code')}}) {--}}
				{{--layer.msg( data.msg , { time : 2000 } , function () {--}}
				{{--window.parent.location.reload();--}}
				{{--} );--}}
				{{--}--}}

				{{--if ( data.code == {{config('myconfig.company.company_store_error_code')}}) {--}}
				{{--layer.msg( data.msg , { time : 2000 } );--}}
				{{--$( "#store1" ).attr( 'disabled' , false );--}}
				{{--}--}}

				{{--if ( data.code == {{config('myconfig.company.credit_code_code')}}) {--}}
				{{--layer.msg( data.msg , { time : 2000 } );--}}
				{{--$( "#store1" ).attr( 'disabled' , false );--}}
				{{--}--}}

				{{--if ( data.code == {{config('myconfig.company.corp_idcard_code')}}) {--}}
				{{--layer.msg( data.msg , { time : 2000 } );--}}
				{{--$( "#store1" ).attr( 'disabled' , false );--}}
				{{--}--}}

				{{--if ( data.code == {{config('myconfig.company.comp_ename_code')}}) {--}}
				{{--layer.msg( data.msg , { time : 2000 } );--}}
				{{--$( "#store1" ).attr( 'disabled' , false );--}}
				{{--}--}}

				{{--if ( data.code == {{config('myconfig.company.comp_cname_code')}}) {--}}
				{{--layer.msg( data.msg , { time : 2000 } );--}}
				{{--$( "#store1" ).attr( 'disabled' , false );--}}
				{{--}--}}
			}
		} )
	} )
</script>
</html>
