<?php

namespace App\Http\Controllers\Api\V1_0;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Api\V1_0\Changecust;
use App\Models\Api\V1_0\Buyinfo;
use Illuminate\Support\Facades\Input;
use App\Models\Api\V1_0\Checkout;
use App\Models\Api\V1_0\Signing;

class CheckoutController extends Controller
{
	/**
	 * @apiDefine Groupcheckout 退房
	 */

	/**
	 * @api        {get} api/1.0.0/checkout/create  退房发起
	 * @apiName    create
	 * @apiGroup   Groupcheckout
	 *
	 * @apiParam (参数) {string} buyid 认购id
	 *
	 * @apiSampleRequest http://192.168.1.13/fang/public/api/1.0.0/checkout/create
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


	public function checkout_create(){
		$buyid = Input::get( 'buyid' );

		if ( !$buyid ) {
			return response()->json( [
				'code'    => '103' ,
				'message' => '参数不全' ,
			] );
		}
		$data = Changecust::get_buyid( $buyid );
		$data -> buyid = $buyid;
		$data -> dingjin =  Checkout::get_payloginfo($data -> buy_number);
		if($data -> pay_type == 0){
			$data -> month_pay  = '';
			$data -> loan_term  = '';
		}
		if($data){
			return response()->json( [
				'code'    => '101' ,
				'message' => '请求成功' ,
				'result'  => $data
			] );
		}else{
			return response()->json( [
				'code'    => '102' ,
				'message' => '请求失败' ,
			] );
		}
	}





	/**
	 * @api        {post} api/1.0.0/checkout/store  退房新增
	 * @apiName    store
	 * @apiGroup   Groupcheckout
	 *
	 * @apiParam (参数) {string} buyid 认购id
	 * @apiParam (参数) {string} old_homeid 房源id
	 * @apiParam (参数) {string} cust_id 客户id
	 * @apiParam (参数) {string} [remarks] 备注信息
	 *
	 * @apiSampleRequest http://192.168.1.13/fang/public/api/1.0.0/checkout/store
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

	public function checkout_store(Request $api){
		$data['cust_id'] = $cust_id = $api -> input('cust_id');
		$data['old_homeid'] = $old_homeid = $api -> input('old_homeid');
		$data['remarks'] = $remarks =  $api -> input('remarks');
		$data['type'] = 3;
		$data['created_at'] = time();
		$data['buyid'] = $buyid = $api -> input('buyid');

		if(!$cust_id || !$old_homeid || !$remarks || !$buyid){
			return response()->json( [
				'code'    => '103' ,
				'message' => '参数不全' ,
			] );
		}
		$store = Checkout::store_change($data);

		if($store){
			return response()->json( [
				'code'    => '101' ,
				'message' => '请求成功' ,
			] );
		}else{
			return response()->json( [
				'code'    => '102' ,
				'message' => '请求失败' ,
			] );
		}

	}

	/**
	 * @api        {get} api/1.0.0/checkout/search  退房列表与检索
	 * @apiName    search
	 * @apiGroup   Groupcheckout
	 *
	 * @apiParam (参数) {string} hous_id 职业顾问id
	 * @apiParam (参数) {int} page 分页
	 * @apiParam (参数) {string} parameter 客户手机号或姓名
	 *
	 * @apiSampleRequest http://192.168.1.13/fang/public/api/1.0.0/checkout/search
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

	public function checkout_search(){
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

		if(count($cust) == 0){
			return response()->json( [
				'code'    => '104' ,
				'message' => '内容为空' ,
			] );
		}
		foreach ( $cust as $kay => $value ) {
			$cust_id[$kay] = $value['cust_id'];
		}
		$data = Checkout::get_signing( $cust_id , $page );

		if($data){
			return response()->json( [
				'code'    => '101' ,
				'message' => '请求成功' ,
				'result'  => $data
			] );
		}else{
			return response()->json( [
				'code'    => '102' ,
				'message' => '发起失败' ,
			] );
		}
	}



	/**
	 * @api        {get} api/1.0.0/checkout/view  退房详情
	 * @apiName    view
	 * @apiGroup   Groupcheckout
	 *
	 * @apiParam (参数) {string} chan_id 退房id
	 *
	 * @apiSampleRequest http://192.168.1.13/fang/public/api/1.0.0/checkout/view
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

	public function checkout_view(){
		$chan_id = Input::get('chan_id');
		if(!$chan_id){
			return response()->json( [
				'code'    => '103' ,
				'message' => '参数不全' ,
			] );
		}

		$data = Checkout::get_d_change($chan_id);
		$data ->payloginfo = Signing::get_all_pay($data -> buy_number);
		if($data){
			return response()->json( [
				'code'    => '101' ,
				'message' => '请求成功' ,
				'result'  => $data
			] );
		}else{
			return response()->json( [
				'code'    => '102' ,
				'message' => '发起失败' ,
			] );
		}



	}




}
