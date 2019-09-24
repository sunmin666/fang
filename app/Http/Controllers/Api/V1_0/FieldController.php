<?php

	namespace App\Http\Controllers\Api\V1_0;


	use Illuminate\Http\Request;
	use App\Http\Controllers\Controller;
	use App\Models\Api\V1_0\Field;
	use Illuminate\Support\Facades\Input;


	class fieldController extends Controller {

		/**
		 * @apiDefine GroupField 房源字段信息接口
		 */


		/**
		 * @api        {get} api/1.0.0/buildnum 查询楼号
		 * @apiName    buildnum
		 * @apiGroup   GroupField
		 * @apiSampleRequest http://192.168.1.13/fang/public/api/1.0.0/buildnum
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
		public function buildnum()
		{

			$data = Field::get_field();

			if ( $data ) {
				return response()->json( [
					'code'    => '101' ,
					'message' => '请求成功' ,
					'result'  => $data,
				] );
			} else {
				return response()->json( [
					'code'    => '102' ,
					'message' => '请求失败' ,
				] );
			}
		}

		/**
		 * @api        {get} api/1.0.0/unitnum 查询单元号
		 * @apiName    unitnum
		 * @apiGroup   GroupField
		 * @apiParam (参数) {int} field_id 职业顾问id
		 * @apiSampleRequest http://192.168.1.13/fang/public/api/1.0.0/unitnum
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

		public function unitnum()
		{

			$parent_field_id = Input::get( 'field_id' );

			if ( !$parent_field_id ) {
				return response()->json( [
					'code'    => '103' ,
					'message' => '参数不全' ,
				] );
			}

			$data = Field::get_unitnum($parent_field_id);

			if ( $data ) {
				return response()->json( [
					'code'    => '101' ,
					'message' => '请求成功' ,
					'result'  => $data,
				] );
			} else {
				return response()->json( [
					'code'    => '102' ,
					'message' => '请求失败' ,
				] );
			}
		}


		/**
		 * @api        {get} api/1.0.0/roomnum 查询房号
		 * @apiName    roomnum
		 * @apiGroup   GroupField
		 * @apiParam (参数) {int} unitnum 职业顾问id
		 * @apiSampleRequest http://192.168.1.13/fang/public/api/1.0.0/roomnum
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

		public function roomnum(){
			$unitnum = Input::get( 'unitnum' );

			if ( !$unitnum ) {
				return response()->json( [
					'code'    => '103' ,
					'message' => '参数不全' ,
				] );
			}

			$data = Field::get_home($unitnum);
			if ( $data ) {
				return response()->json( [
					'code'    => '101' ,
					'message' => '请求成功' ,
					'result'  => $data,
				] );
			} else {
				return response()->json( [
					'code'    => '102' ,
					'message' => '请求失败' ,
				] );
			}
		}

	}
