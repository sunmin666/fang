<?php

namespace App\Http\Controllers\Api\V1_0;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Api\V1_0\Small;
use Illuminate\Support\Facades\Input;

class SmallController extends Controller
{
	/**
	 * @apiDefine Groupsmall 销售排行
	 */


	/**
	 * @api {get} api/1.0.0/small/amount 销售金额排行
	 * @apiName amount
	 * @apiGroup Groupsmall
	 *
	 * @apiParam (参数) {string} stime 开始时间
	 * @apiParam (参数) {string} etime 结束时间
	 *
	 * @apiSampleRequest http://192.168.1.13/fang/public/api/1.0.0/small/amount
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

	public function small_amount(){
		$data['stimes'] = $stime = Input::get('stime');   //开始时间
		$data['etimes'] = $etime = Input::get('etime');    //结束时间
		//查询所有职业顾问
		$houst  = Small::get_all_housts();
		foreach($houst as $k => $v){
			$jinqian = array();
			foreach($v['cust'] as $k1 => $v1){
				$qian = Small::get_signinfo($v1['cust_id'],$stime,$etime);
				if( count($qian) != 0 ){
					foreach($qian as $kq => $vq){
						array_push($jinqian,$qian[$kq]['total_price']);
					}
				}
			}
			$houst[$k]['qian'] = array_sum($jinqian);
		}
		$sort_arr = [];
		foreach ($houst as $key => $value) {
			$sort_arr[] = $value['qian'];
		}
		array_multisort($sort_arr, SORT_DESC, $houst);

		if($houst){
			return response()->json([
				'code' => '101',
				'message' => '请求成功',
				'result'   => $houst
			]);
		}else{
			return response()->json([
				'code' => '102',
				'message' => '请求失败',
			]);
		}
	}







	/**
	 * @api {get} api/1.0.0/small/listing 销售套数排命
	 * @apiName listing
	 * @apiGroup Groupsmall
	 *
	 * @apiParam (参数) {string} stime 开始时间
	 * @apiParam (参数) {string} etime 结束时间
	 *
	 * @apiSampleRequest http://192.168.1.13/fang/public/api/1.0.0/small/listing
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



		public function small_listing(){
			$data['stimes'] = $stime = Input::get('stime');   //开始时间
			$data['etimes'] = $etime = Input::get('etime');    //结束时间
			//查询所有职业顾问
			$houst  = Small::get_all_housts();
			foreach($houst as $k => $v){
				$jinqian = array();
				foreach($v['cust'] as $k1 => $v1){
					$qian = Small::get_signinfol($v1['cust_id'],$stime,$etime);
					array_push($jinqian,$qian);
				}
				$houst[$k]['qian'] = array_sum($jinqian);
			}

			$sort_arr = [];
			foreach ($houst as $key => $value) {
				$sort_arr[] = $value['qian'];
			}
			array_multisort($sort_arr, SORT_DESC, $houst);

			if($houst){
				return response()->json([
					'code' => '101',
					'message' => '请求成功',
					'result'   => $houst
				]);
			}else{
				return response()->json([
					'code' => '102',
					'message' => '请求失败',
				]);
			}

		}




}
