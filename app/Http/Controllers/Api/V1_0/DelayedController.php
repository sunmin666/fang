<?php

namespace App\Http\Controllers\Api\V1_0;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Api\V1_0\Changecust;
//use App\Models\Api\V1_0\Signing;
use App\Models\Api\V1_0\Buyinfo;
use Illuminate\Support\Facades\Input;
use App\Models\Api\V1_0\Delayed;

class DelayedController extends Controller
{
	/**
	 * @apiDefine Groupdelayed 延迟签约
	 */

	/**
	 * @api        {get} api/1.0.0/delayed/create  签约发起
	 * @apiName    create
	 * @apiGroup   Groupdelayed
	 *
	 * @apiParam (参数) {string} buyid 认购id
	 *
	 * @apiSampleRequest http://192.168.1.13/fang/public/api/1.0.0/delayed/create
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

	public function delayed_create()
	{
		$buyid = Input::get( 'buyid' );

		if ( !$buyid ) {
			return response()->json( [
				'code'    => '103' ,
				'message' => '参数不全' ,
			] );
		}
		$data = Changecust::get_buyid( $buyid );
		//查询缴费信息
		$data -> buyid = $buyid;
		$data -> dingjin =  Delayed::get_payloginfo($data -> buy_number);
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
	 * @api        {post} api/1.0.0/delayed/store  签约新增
	 * @apiName    store
	 * @apiGroup   Groupdelayed
	 *
	 * @apiParam (参数) {string} cust_id 客户id
	 * @apiParam (参数) {string} homeid 房源id
	 * @apiParam (参数) {string} sign_remarks 职业顾问备注
	 * @apiParam (参数) {string} buyid 认购id
	 *
	 * @apiSampleRequest http://192.168.1.13/fang/public/api/1.0.0/delayed/store
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


	public function delayed_store(Request $api){
		$data['cust_id'] = $cust_id = $api -> input('cust_id');
		$data['homeid'] = $homeid = $api -> input('homeid');
		$data['sign_remarks'] = $sign_remarks =  $api -> input('sign_remarks');
		$data['buyid'] =  $buyid = $api -> input('buyid');
		$data['sign_type'] = 1;
		$data['sign_applytime'] = time();
		$data['created_at']   = time();
		if(!$cust_id || !$homeid || !$sign_remarks || !$buyid){
			return response()->json( [
				'code'    => '103' ,
				'message' => '参数不全' ,
			] );
		}
		$store = Delayed::store_sig($data);
		if($store){
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
	 * @api        {get} api/1.0.0/delayed/search  签约列表与检索
	 * @apiName    search
	 * @apiGroup   Groupdelayed
	 *
	 * @apiParam (参数) {string} hous_id 职业顾问id
	 * @apiParam (参数) {int} page 分页
	 * @apiParam (参数) {string} parameter 客户手机号或姓名
	 *
	 * @apiSampleRequest http://192.168.1.13/fang/public/api/1.0.0/delayed/search
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

	public function delayed_search(){
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
		$data = Delayed::get_signing( $cust_id , $page );
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
	 * @api        {get} api/1.0.0/delayed/view  签约详情
	 * @apiName    view
	 * @apiGroup   Groupdelayed
	 *
	 * @apiParam (参数) {string} signid 签约id
	 *
	 * @apiSampleRequest http://192.168.1.13/fang/public/api/1.0.0/delayed/view
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

	public function delayed_view(){
		$sig_id = Input::get('signid');
		if(!$sig_id){
			return response()->json( [
				'code'    => '103' ,
				'message' => '参数不全' ,
			] );
		}
		$data = Delayed::get_d_signing($sig_id);
		$data ->payloginfo = Delayed::get_all_pay($data -> buy_number);

		if($data -> pay_type == 0){
			$data -> month_pay = '';
			$data -> loan_term = '';

		}
		if($data){
			return response()->json( [
				'code'    => '103' ,
				'message' => '参数不全' ,
				'result'  => $data
			] );
		}else{
			return response()->json( [
				'code'    => '102' ,
				'message' => '请求失败' ,
			] );
		}

	}

}
