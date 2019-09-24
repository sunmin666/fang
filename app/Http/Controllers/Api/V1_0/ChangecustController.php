<?php

	namespace App\Http\Controllers\Api\V1_0;


	use Illuminate\Http\Request;
	use App\Http\Controllers\Controller;
	use Illuminate\Support\Facades\Input;
	use App\Models\Api\V1_0\Buyinfo;
	use App\Models\Api\V1_0\Changecust;


	class ChangecustController extends Controller {

		/**
		 * @apiDefine Groupchangcust 更名
		 */

		/**
		 * @api        {get} api/1.0.0/Changecust/create  更名发起
		 * @apiName    create
		 * @apiGroup   Groupchangcust
		 *
		 * @apiParam (参数) {string} buyid 职业顾问id
		 *
		 * @apiSampleRequest http://192.168.1.13/fang/public/api/1.0.0/Changecust/create
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

		public function changecust_create()
		{
			$buyid = Input::get( 'buyid' );

			if ( !$buyid ) {
				return response()->json( [
					'code'    => '103' ,
					'message' => '参数不全' ,
				] );
			}
			$data = Changecust::get_buyid( $buyid );
			$data -> buyid = $buyid;
			if($data -> pay_type == 0){
				$data -> month_pay  = '';
				$data -> loan_term  = '';
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
					'message' => '参数不全' ,
				] );
			}
		}



		/**
		 * @api        {post} api/1.0.0/Changecust/store  更名添加
		 * @apiName    store
		 * @apiGroup   Groupchangcust
		 *
		 * @apiParam (参数) {string} cust_id 客户id
		 * @apiParam (参数) {string} old_homeid 房源id
		 * @apiParam (参数) {string} new_cust 新客户id
		 * @apiParam (参数) {string} buyid 认购id
		 * @apiParam (参数) {string} [coownerinfo] 房屋共有人
		 * @apiParam (参数) {string} [pay_type] 付款方案
		 * @apiParam (参数) {string} [total_price] 总金额
		 * @apiParam (参数) {string} [month_pay] 月供
		 * @apiParam (参数) {string} [loan_term] 年限
		 * @apiParam (参数) {string} [remarks] 备注信息
		 *
		 * @apiSampleRequest http://192.168.1.13/fang/public/api/1.0.0/Changecust/store
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

		public function Changecust_store(Request $api){
			$data['cust_id'] = $cust_id  = $api  -> input('cust_id');    //客户id
			$data['old_homeid'] = $old_homeid  = $api  -> input('old_homeid');    //房源id
			$data['new_cust'] = $new_cust = $api -> input('new_cust');   //新客户id
			$data['buyid'] = $buyid = $api -> input('buyid');   //buyid
			$coownerinfo = $api->input( 'coownerinfo' );    //房屋共有人
			$data['type'] = $type = 1;
			$data['pay_type'] = $pay_type = $api->input( 'pay_type' );  //付款方案
			$data['total_price'] = $total_price = $api->input( 'total_price' );    //总金额
			$data['month_pay'] = $month_pay = $api->input( 'month_pay' );    //月供
			$data['loan_term'] = $loan_term = $api->input( 'loan_term' );    //年限
			$data['created_at'] = time();
			$data['remarks'] = $remarks = $api -> input('remarks');   //备注

			if(!$cust_id || !$old_homeid || !$new_cust || !$buyid){
				return response()->json( [
					'code'    => '103' ,
					'message' => '参数不全' ,
				] );
			}
			$data = Changecust::store_changeinfo($data);
			if ( $coownerinfo == '' ) {
				$coownerinfo = array ();
			} else {
				$coownerinfo = $api->input( 'coownerinfo' );
			}
			if($data){
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
				return response()->json( [
					'code'    => '101' ,
					'message' => '发起成功' ,
				] );
			}else{
				return response()->json( [
					'code'    => '102' ,
					'message' => '发起失败' ,
				] );
			}
		}




		/**
		 * @api        {get} api/1.0.0/Changecust/search  更名列表与检索
		 * @apiName    search
		 * @apiGroup   Groupchangcust
		 *
		 * @apiParam (参数) {string} hous_id 职业顾问id
		 * @apiParam (参数) {int} page 职业顾问id
		 * @apiParam (参数) {string} parameter 客户手机号或姓名
		 *
		 * @apiSampleRequest http://192.168.1.13/fang/public/api/1.0.0/Changecust/search
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

		public function changecust_search(){
			$hous = Input::get( 'hous_id' );
			$page = Input::get( 'page' );
			$parameter = Input::get( 'parameter' );
			if ( !$hous || !$page ) {
				return response()->json( [
					'code'    => '103' ,
					'message' => '参数不全' ,
				] );
			}
			$cust = Buyinfo::get_cust( $hous , $parameter );
			foreach ( $cust as $kay => $value ) {
				$cust_id[$kay] = $value['cust_id'];
			}
			$data = Changecust::get_change( $cust_id , $page );
			foreach($data as $k => $v){
				if($v -> pay_type === null){
					$v -> pay_type = '';
				}
				if($v -> status === null ){
					$v -> status = '';
					$v -> verifytime = '';
				}
			}
			if($data){
				return response()->json( [
					'code'    => '101' ,
					'message' => '请求成功' ,
					'result'  => $data,
				] );
			}else{
				return response()->json( [
					'code'    => '103' ,
					'message' => '参数不全' ,
				] );
			}
		}


		/**
		 * @api        {get} api/1.0.0/Changecust/view  更名审核详情
		 * @apiName    view
		 * @apiGroup   Groupchangcust
		 *
		 * @apiParam (参数) {string} chan_id 更名id
		 *
		 * @apiSampleRequest http://192.168.1.13/fang/public/api/1.0.0/Changecust/view
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
		public function changecust_view(){
			$chan_id = Input::get('chan_id');
			if(!$chan_id){
				return response()->json( [
					'code'    => '103' ,
					'message' => '参数不全' ,
				] );
			}

			$data = Changecust::get_d_change($chan_id);


			if($data-> pay_type === '0' ){
				$data -> month_pay = '';
        $data -> loan_term = '';
			}

			if( $data -> xin_pay_type === '0'){
				$data -> xin_month_pay = '';
				$data -> xin_loan_term = '';
			}

			if($data -> verify_status === null){
				$data -> verify_status = '';
				$data -> verify_remarks = '';
				$data -> name = '';

			}
			$data -> coownerinfo = Changecust::get_all_coownerinfo($data -> new_cust);
			if($data){
				return response() -> json([
					'code'   => '101',
					'message'  => '请求成功',
					'result'   => $data
				]);
			}else{
				return response() -> json([
					'code'   => '102',
					'message'  => '请求失败',
				]);
			}

		}























	}
