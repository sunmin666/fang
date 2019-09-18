<?php

namespace App\Http\Controllers\Api\V1_0;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Api\V1_0\login;
use Illuminate\Support\Facades\Hash;


class LoginController extends Controller
{

		/**
		 * @apiDefine GroupLogin ipad-登录
		 */


		/**
		 * @api {post} 1.0.0/login 登录
		 * @apiName login
		 * @apiGroup GroupLogin
		 * @apiParam (参数) {string} mobile 客户姓名
		 * @apiParam (参数) {string} password 手机号
		 * @apiSampleRequest http://192.168.1.13/fang/public/api/1.0.0/login
		 * @apiVersion 1.0.0
		 * @apiSuccessExample {json} 成功返回:
		 *     HTTP/1.1 200 OK
		 *     {
		 *       "code": "101",
		 *       "message": "请求成功",
		 *       "result" : $data
		 *     }
		 * @apiErrorExample {json} 失败返回:
		 *     HTTP/1.1 404 Not Found
		 *     {
		 *       "error": "请求失败"
		 *     }
		 */

		public function login( Request $api )
		{
			$iphone = $api->input( 'mobile' );
			$password = $api->input( 'password' );
			if($iphone == ''  || $password == ''){
				return response()->json( [
					'code' => '102' ,
					'message'  => '参数不全',
				] );
			}
			$username = login::get_d_hous( $iphone );
			if (!$username) {
				return response()->json( [ 'code' => '103' ,
																	 'message'  => '用户不存在',
				] );
			}
			if($username -> is_ipad == 1){
				return response()->json( [ 'code' => '104' ,
																	 'message'  => '此人不能登陆ipad',
				] );
			}
			if($username -> updated_at === null){
				$username -> updated_at = '';
			}
			$username -> hous_id = (string)$username -> hous_id;
			if(Hash::check($password,$username -> password)){
				return response()->json( [ 'code' => '101' ,
																	 'message'  => '可以登录',
																	 'result' => $username,
				] );
			}
		}


}
