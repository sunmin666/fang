<?php

namespace App\Http\Controllers\Api\V1_0;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Api\V1_0\Home;
use Illuminate\Support\Facades\Input;
use App\Models\Api\V1_0\Field;

class HomeController extends Controller
{

	/**
	 * @apiDefine Grouphome 销控表
	 */

	/**
	 * @api {get} api/1.0.0/home/index 销控信息
	 * @apiName amount
	 * @apiGroup Grouphome
	 *
	 * @apiParam (参数) {string} buildnum 楼号信息
	 *
	 * @apiSampleRequest http://192.168.1.13/fang/public/api/1.0.0/home/index
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
	 * @apiErrorExample {json} 失败返回:
	 *     HTTP/1.1 404 Not Found
	 *     {
	 *       "error": "请求失败"
	 *     }
	 */
	public function home_index(){
		$buildnum = Input::get('buildnum');
		if(!$buildnum){
			return response()->json( [
				'code'    => '103' ,
				'message' => '参数不全' ,
			] );
		}
		$data = Home::get_tu($buildnum);
		if($data){
			return response()->json( [
				'code'    => '101' ,
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



	/**
	 * @api {get} api/1.0.0/home/count 楼号房源总量
	 * @apiName count
	 * @apiGroup Grouphome
	 *
	 * @apiSampleRequest http://192.168.1.13/fang/public/api/1.0.0/home/count
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
	 * @apiErrorExample {json} 失败返回:
	 *     HTTP/1.1 404 Not Found
	 *     {
	 *       "error": "请求失败"
	 *     }
	 */

	public function home_count(){
		//查询所有楼号
		$data = Field::get_field();

		foreach ($data as $k => $v){
			$v->count = Home::get_all_count($v -> field_id);
		}
		if($data){
			return response()->json( [
				'code'    => '101' ,
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


	/**
	 * @api {get} api/1.0.0/home/counts 楼号房源可售总量
	 * @apiName counts
	 * @apiGroup Grouphome
	 *
	 * @apiSampleRequest http://192.168.1.13/fang/public/api/1.0.0/home/counts
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
	 * @apiErrorExample {json} 失败返回:
	 *     HTTP/1.1 404 Not Found
	 *     {
	 *       "error": "请求失败"
	 *     }
	 */

	public function home_counts(){
		//查询所有楼号
		$data = Field::get_field();

		foreach ($data as $k => $v){
			$v->count = Home::get_all_counts($v -> field_id);
		}
		if($data){
			return response()->json( [
				'code'    => '101' ,
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


	/**
	 * @api {get} api/1.0.0/home/countss 楼号房源销控总量
	 * @apiName countss
	 * @apiGroup Grouphome
	 *
	 * @apiSampleRequest http://192.168.1.13/fang/public/api/1.0.0/home/countss
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
	 * @apiErrorExample {json} 失败返回:
	 *     HTTP/1.1 404 Not Found
	 *     {
	 *       "error": "请求失败"
	 *     }
	 */

	public function home_countss(){
		//查询所有楼号
		$data = Field::get_field();

		foreach ($data as $k => $v){
			$v->count = Home::get_all_countss($v -> field_id);
		}
		if($data){
			return response()->json( [
				'code'    => '101' ,
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





	/**
	 * @api {get} api/1.0.0/home/countsss 楼号房源已售总量
	 * @apiName countsss
	 * @apiGroup Grouphome
	 *
	 * @apiSampleRequest http://192.168.1.13/fang/public/api/1.0.0/home/countsss
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
	 * @apiErrorExample {json} 失败返回:
	 *     HTTP/1.1 404 Not Found
	 *     {
	 *       "error": "请求失败"
	 *     }
	 */

	public function home_countsss(){
		//查询所有楼号
		$data = Field::get_field();

		foreach ($data as $k => $v){
			$v->count = Home::get_all_countsss($v -> field_id);
		}
		if($data){
			return response()->json( [
				'code'    => '101' ,
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


	/**
	 * @api {get} api/1.0.0/home/details 房源信息详情
	 * @apiName details
	 * @apiGroup Grouphome
	 *
	 * @apiParam (参数) {string} homeid 房号id
	 * @apiSampleRequest http://192.168.1.13/fang/public/api/1.0.0/home/details
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
	 * @apiErrorExample {json} 失败返回:
	 *     HTTP/1.1 404 Not Found
	 *     {
	 *       "error": "请求失败"
	 *     }
	 */

	public function home_details(){

		$homeid = Input::get('homeid');


		$data = Home::get_d_home($homeid);

		if($data){
			return response()->json( [
				'code'    => '101' ,
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
