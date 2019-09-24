<?php

	namespace App\Http\Controllers\Api\V1_0;


	use App\Models\admin\Buy;
	use Illuminate\Http\Request;
	use App\Http\Controllers\Controller;
	use App\Models\Api\V1_0\Buyinfo;
	use Illuminate\Support\Facades\Input;


	class BuyinfoController extends Controller {

		/**
		 * @apiDefine GroupNameg 认购
		 */


		/**
		 * @api        {post} api/1.0.0/buyinfo/store  发起认购
		 * @apiName    buyinfo
		 * @apiGroup   GroupNameg
		 *
		 * @apiParam (参数) {string} realname 客户姓名
		 * @apiParam (参数) {int} mobile 客户手机号
		 * @apiParam (参数) {string} idcard 客户身份证号
		 * @apiParam (参数) {string} address 客户联系地址
		 *
		 * @apiParam (参数) {int} cust_id 客户id
		 * @apiParam (参数) {array} coownerinfo 房屋共有人
		 * @apiParam (参数) {int} homeid 房源id
		 * @apiParam (参数) {int} pay_num 定金
		 * @apiParam (参数) {int} pay_type 付款方案
		 * @apiParam (参数) {int} remarks 职业顾问发起的备注
		 * @apiParam (参数) {int} sponsor 职业顾问id
		 * @apiParam (参数) {int} [month_pay] 月供
		 * @apiParam (参数) {int} [loan_term] 年限
		 * @apiParam (参数) {int} total_price 总金额
		 *
		 * @apiSampleRequest http://192.168.1.13/fang/public/api/1.0.0/buyinfo/store
		 * @apiVersion 1.0.0
		 * @apiSuccessExample {json} 成功返回:
		 *     HTTP/1.1 200 OK
		 *     {
		 *       "code": "101",
		 *       "message": "请求成功",
		 *       "result" : $data
		 *
		 *     }
		 *
		 *
		 * @apiErrorExample {json} 失败返回:
		 *     HTTP/1.1 404 Not Found
		 *     {
		 *       "error": "请求失败"
		 *     }
		 */

		public function buyinfo_store( Request $api )
		{
			//首先接更新客户基本信息
			$datac['realname'] = $realname = $api->input( 'realname' );
			$datac['mobile'] = $mobile = $api->input( 'mobile' );
			$datac['idcard'] = $idcard = $api->input( 'idcard' );
			$datac['address'] = $address = $api->input( 'address' );
			$data['cust_id'] = $cust_id = $api->input( 'cust_id' );
			$data['homeid'] = $homeid = $api->input( 'homeid' );
			$data['pay_num'] = $pay_num = $api->input( 'pay_num' );
			$data['pay_type'] = $pay_type = $api->input( 'pay_type' );
			$data['remarks'] = $remarks = $api->input( 'remarks' );
			$data['sponsor'] = $sponsor = $api->input( 'sponsor' );
			$data['month_pay'] = $month_pay = $api->input( 'month_pay' );
			$data['loan_term'] = $loan_term = $api->input( 'loan_term' );
			$data['total_price'] = $total_price = $api->input( 'total_price' );
			$data['apply_time'] = time();
			$data['lock_time'] = time() + 3600;
			$data['created_at'] = time();
			$coownerinfo = $api->input( 'coownerinfo' );
			if ( !$cust_id || !$homeid || !$pay_num || $pay_type == '' || !$sponsor || !$total_price || !$realname || !$mobile || !$idcard || !$address ) {
				return response()->json( [
					'code'    => '104' ,
					'message' => '参数不全' ,
				] );
			}
			if ( $pay_type == 1 ) {
				if ( !$month_pay || !$loan_term ) {
					return response()->json( [
						'code'    => '103' ,
						'message' => '参数不全' ,
					] );
				}
			}
			//更新客户信息
			Buyinfo::update_cust( $cust_id , $datac );
			//添加认购信息
			$store = Buyinfo::store_buyinfo( $data );
			if ( $coownerinfo == '' ) {
				$coownerinfo = array ();
			} else {
				$coownerinfo = $api->input( 'coownerinfo' );
			}
			if ( $store ) {
				$buy_number['buy_number'] = 10000 + $store;
				Buyinfo::update_buy_number( $store , $buy_number );
				//添加房屋共有人
				for ( $g = 0; $g < count( $coownerinfo ); $g++ ) {
					$coowner['cust_id'] = $coownerinfo[$g]['cust_id'];    //客户id
					$coowner['relation'] = $coownerinfo[$g]['relation'];       //关系
					$coowner['realname'] = $coownerinfo[$g]['realname'];                //姓名
					$coowner['sex'] = $coownerinfo[$g]['sex'];                    //性别
					$coowner['birthday'] = strtotime( $coownerinfo[$g]['birthday'] );               //生日
					$coowner['idcard'] = $coownerinfo[$g]['idcard'];               //省份正海
					$coowner['mobile'] = $coownerinfo[$g]['mobile'];             //手机号
					$coowner['created_at'] = time();        //手机号
					Buyinfo::store_coowner( $coowner );
				}
				$home['status'] = 1;
				$home['buyid'] = $store;
				Buyinfo::update_status_home( $homeid , $home );
				return response()->json( [
					'code'    => '101' ,
					'message' => '发起成功' ,
				] );
			} else {
				return response()->json( [
					'code'    => '104' ,
					'message' => '请求失败' ,
				] );
			}
		}

		/**
		 * @api        {get} api/1.0.0/buyinfo/search  认购列表与检索检索
		 * @apiName    search
		 * @apiGroup   GroupNameg
		 *
		 * @apiParam (参数) {string} hous_id 职业顾问id
		 * @apiParam (参数) {int} page 职业顾问id
		 * @apiParam (参数) {string} parameter 客户手机号或姓名
		 *
		 * @apiSampleRequest http://192.168.1.13/fang/public/api/1.0.0/buyinfo/search
		 * @apiVersion 1.0.0
		 * @apiSuccessExample {json} 成功返回:
		 *     HTTP/1.1 200 OK
		 *     {
		 *       "code": "101",
		 *       "message": "请求成功",
		 *       "result" : $data
		 *
		 *     }
		 *
		 *
		 * @apiErrorExample {json} 失败返回:
		 *     HTTP/1.1 404 Not Found
		 *     {
		 *       "error": "请求失败"
		 *     }
		 */
		public function buyinfo_search()
		{
			$hous = Input::get( 'hous_id' );
			$page = Input::get( 'page' );
			$parameter = Input::get( 'parameter' );
			if ( !$hous || !$page ) {
				return response()->json( [
					'code'    => '103' ,
					'message' => '参数不全' ,
				] );
			}
			//查询出职业顾问下的所有客户
			$cust = Buyinfo::get_cust( $hous , $parameter );
			$cust_id = array ();
			foreach ( $cust as $kay => $value ) {
				$cust_id[$kay] = $value['cust_id'];
			}
			$data = Buyinfo::get_buyinfo( $cust_id , $page );

			if ( $data ) {
				return response()->json( [
					'code'    => '101' ,
					'message' => '请求成功' ,
					'result'  => $data,
				] );
			} else {
				return response()->json( [
					'code'    => '103' ,
					'message' => '参数不全' ,
				] );
			}
		}


		/**
		 * @api  {post} api/1.0.0/buyinfo/view  认购审核详情
		 * @apiName    view
		 * @apiGroup   GroupNameg
		 *
		 * @apiParam (参数) {string} buyid 认购id
		 *
		 * @apiSampleRequest http://192.168.1.13/fang/public/api/1.0.0/buyinfo/view
		 * @apiVersion 1.0.0
		 * @apiSuccessExample {json} 成功返回:
		 *     HTTP/1.1 200 OK
		 *     {
		 *       "code": "101",
		 *       "message": "请求成功",
		 *       "result" : $data
		 *
		 *     }
		 *
		 *
		 * @apiErrorExample {json} 失败返回:
		 *     HTTP/1.1 404 Not Found
		 *     {
		 *       "error": "请求失败"
		 *     }
		 */

		public function buyinfo_view( Request $api )
		{
			$buyid = $api->input( 'buyid' );

			if ( !$buyid ) {
				return response()->json( [
					'code'    => '103' ,
					'message' => '参数不全' ,
				] );
			}

			$data = Buyinfo::get_d_buyinfo($buyid);

			if($data -> month_pay == null){
				$data -> month_pay = '';
				$data -> loan_term = '';
			}
			if($data){
				return response()->json( [
					'code'    => '101' ,
					'message' => '请求成功' ,
					'result'   => $data
				] );
			}else{
				return response()->json( [
					'code'    => '102' ,
					'message' => '请求失败' ,
				] );
			}

		}

	}
