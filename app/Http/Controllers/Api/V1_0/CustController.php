<?php

namespace App\Http\Controllers\Api\V1_0;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Api\V1_0\Cust;
use Illuminate\Support\Facades\Input;

class CustController extends Controller
{


	/**
	 * @apiDefine GroupName ipad-客户管理
	 */


	/**
	 * @api {post} 1.0.0/get/cust 客户列表
	 * @apiName get_cust
	 * @apiGroup GroupName
	 * @apiParam (参数) {int} hous_id 职业顾问id
	 * @apiParam (参数) {int} page 页码
	 * @apiSampleRequest http://192.168.1.13/fang/public/api/1.0.0/get/cust
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
	public function get_cust(Request $api){

			$hous_id = $api -> input('hous_id');
			$page = $api -> input('page');

			if(!$hous_id){
				return response()->json( [
					'code' => '102' ,
					'message'  => '参数不全',
				] );
			}
		$data = Cust::get_cust($hous_id,$page);
			foreach ($data as $kay => $value){
				if($value -> first_contact == null){
					$value -> first_contact = '';
				}
			}
		return response()->json( [
			'code' => '101' ,
			'message'  => '请求成功',
			'result'   => $data
		] );
	}

	/**
	 * @api {get} 1.0.0/first_contact 首次接触方式
	 * @apiName first_contact
	 * @apiGroup GroupName
	 * @apiSampleRequest http://192.168.1.13/fang/public/api/1.0.0/first_contact
	 * @apiVersion 1.0.0
	 * @apiSuccessExample {json} 成功返回:
	 *     HTTP/1.1 200 OK
	 *     {
	 *       "code": "101",
	 *       "message": "请求成功",
	 *       "result" : $data
	 *
	 *     }
	 * @apiErrorExample {json} 失败返回:
	 *     HTTP/1.1 404 Not Found
	 *     {
	 *       "error": "请求失败"
	 *     }
	 */

	public function first_contact(){

		$a = 82;
		$data = Cust::get_ownership($a);
		foreach ($data as $kay => $value ){
			if($value -> updated_at == ''){
				$value -> updated_at = '';
			}
		}

		if($data){
			return response()->json( [
				'code' => '101' ,
				'message'  => '请求成功',
				'result'   => $data
			] );
		}else{
			return response()->json( [
				'code' => '102' ,
				'message'  => '请求失败'
			] );
		}
	}

	/**
	 * @api {get} 1.0.0/cognition 认知渠道
	 * @apiName cognition
	 * @apiGroup GroupName
	 * @apiSampleRequest http://192.168.1.13/fang/public/api/1.0.0/cognition
	 * @apiVersion 1.0.0
	 * @apiSuccessExample {json} 成功返回:
	 *     HTTP/1.1 200 OK
	 *     {
	 *       "code": "101",
	 *       "message": "请求成功",
	 *       "result" : $data
	 *
	 *     }
	 * @apiErrorExample {json} 失败返回:
	 *     HTTP/1.1 404 Not Found
	 *     {
	 *       "error": "请求失败"
	 *     }
	 */
	public function cognition(){
		$a = 28;
		$data = Cust::get_ownership($a);
		foreach ($data as $kay => $value ){
			if($value -> updated_at == ''){
				$value -> updated_at = '';
			}
		}
		if($data){
			return response()->json( [
				'code' => '101' ,
				'message'  => '请求成功',
				'result'   => $data
			] );
		}else{
			return response()->json( [
				'code' => '102' ,
				'message'  => '请求失败'
			] );
		}
	}



	/**
	 * @api {get} 1.0.0/family_str 家庭结构
	 * @apiName family_str
	 * @apiGroup GroupName
	 * @apiSampleRequest http://192.168.1.13/fang/public/api/1.0.0/family_str
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
	public function family_str(){
		$a = 51;
		$data = Cust::get_ownership($a);
		foreach ($data as $kay => $value ){
			if($value -> updated_at == ''){
				$value -> updated_at = '';
			}
		}
		if($data){
			return response()->json( [
				'code' => '101' ,
				'message'  => '请求成功',
				'result'   => $data
			] );
		}else{
			return response()->json( [
				'code' => '102' ,
				'message'  => '请求失败'
			] );
		}
	}


	/**
	 * @api {get} 1.0.0/work_type 工作类型
	 * @apiName work_type
	 * @apiGroup GroupName
	 * @apiSampleRequest http://192.168.1.13/fang/public/api/1.0.0/work_type
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

	public function work_type(){
		$a = 58;
		$data = Cust::get_ownership($a);
		foreach ($data as $kay => $value ){
			if($value -> updated_at == ''){
				$value -> updated_at = '';
			}
		}
		if($data){
			return response()->json( [
				'code' => '101' ,
				'message'  => '请求成功',
				'result'   => $data
			] );
		}else{
			return response()->json( [
				'code' => '102' ,
				'message'  => '请求失败'
			] );
		}
	}


	/**
	 * @api {get} 1.0.0/ownership 职业关注
	 * @apiName ownership
	 * @apiGroup GroupName
	 * @apiSampleRequest http://192.168.1.13/fang/public/api/1.0.0/ownership
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

	public function ownership(){

		$a = 91;
		$data = Cust::get_ownership($a);
		foreach ($data as $kay => $value ){
			if($value -> updated_at == ''){
				$value -> updated_at = '';
			}
		}
		if($data){
			return response()->json( [
				'code' => '101' ,
				'message'  => '请求成功',
				'result'   => $data
			] );
		}else{
			return response()->json( [
				'code' => '102' ,
				'message'  => '请求失败'
			] );
		}
	}



	/**
	 * @api {get} 1.0.0/purpose 职业目的
	 * @apiName purpose
	 * @apiGroup GroupName
	 * @apiSampleRequest http://192.168.1.13/fang/public/api/1.0.0/purpose
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

	public function purpose(){
		$a = 94;
		$data = Cust::get_ownership($a);
		foreach ($data as $kay => $value ){
			if($value -> updated_at == ''){
				$value -> updated_at = '';
			}
		}
		if($data){
			return response()->json( [
				'code' => '101' ,
				'message'  => '请求成功',
				'result'   => $data
			] );
		}else{
			return response()->json( [
				'code' => '102' ,
				'message'  => '请求失败'
			] );
		}
	}


	/**
	 * @api {get} 1.0.0/area 客户区域
	 * @apiName area
	 * @apiGroup GroupName
	 * @apiSampleRequest http://192.168.1.13/fang/public/api/1.0.0/area
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

	public function area(){
		$a = 96;
		$data = Cust::get_ownership($a);
		foreach ($data as $kay => $value ){
			if($value -> updated_at == ''){
				$value -> updated_at = '';
			}
		}
		if($data){
			return response()->json( [
				'code' => '101' ,
				'message'  => '请求成功',
				'result'   => $data
			] );
		}else{
			return response()->json( [
				'code' => '102' ,
				'message'  => '请求失败'
			] );
		}
	}

	/**
	 * @api {get} 1.0.0/residence 居住类型
	 * @apiName residence
	 * @apiGroup GroupName
	 * @apiSampleRequest http://192.168.1.13/fang/public/api/1.0.0/residence
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

	public function residence(){
		$a = 98;
		$data = Cust::get_ownership($a);
		foreach ($data as $kay => $value ){
			if($value -> updated_at == ''){
				$value -> updated_at = '';
			}
		}
		if($data){
			return response()->json( [
				'code' => '101' ,
				'message'  => '请求成功',
				'result'   => $data
			] );
		}else{
			return response()->json( [
				'code' => '102' ,
				'message'  => '请求失败'
			] );
		}
	}


	/**
	 * @api {get} 1.0.0/intention_area 意向面积
	 * @apiName intention_area
	 * @apiGroup GroupName
	 * @apiSampleRequest http://192.168.1.13/fang/public/api/1.0.0/intention_area
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

	public function intention_area(){
		$a = 63;
		$data = Cust::get_ownership($a);
		foreach ($data as $kay => $value ){
			if($value -> updated_at == ''){
				$value -> updated_at = '';
			}
		}
		if($data){
			return response()->json( [
				'code' => '101' ,
				'message'  => '请求成功',
				'result'   => $data
			] );
		}else{
			return response()->json( [
				'code' => '102' ,
				'message'  => '请求失败'
			] );
		}
	}




	/**
	 * @api {get} 1.0.0/floor_like 楼层偏好
	 * @apiName floor_like
	 * @apiGroup GroupName
	 * @apiSampleRequest http://192.168.1.13/fang/public/api/1.0.0/floor_like
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

	public function floor_like(){
		$a = 69;
		$data = Cust::get_ownership($a);
		foreach ($data as $kay => $value ){
			if($value -> updated_at == ''){
				$value -> updated_at = '';
			}
		}
		if($data){
			return response()->json( [
				'code' => '101' ,
				'message'  => '请求成功',
				'result'   => $data
			] );
		}else{
			return response()->json( [
				'code' => '102' ,
				'message'  => '请求失败'
			] );
		}
	}





	/**
	 * @api {get} 1.0.0/structure 户型结构
	 * @apiName structure
	 * @apiGroup GroupName
	 * @apiSampleRequest http://192.168.1.13/fang/public/api/1.0.0/structure
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

	public function structure(){
		$a = 100;
		$data = Cust::get_ownership($a);
		foreach ($data as $kay => $value ){
			if($value -> updated_at == ''){
				$value -> updated_at = '';
			}
		}
		if($data){
			return response()->json( [
				'code' => '101' ,
				'message'  => '请求成功',
				'result'   => $data
			] );
		}else{
			return response()->json( [
				'code' => '102' ,
				'message'  => '请求失败'
			] );
		}
	}



	/**
	 * @api {get} 1.0.0/apartment 关注户型
	 * @apiName apartment
	 * @apiGroup GroupName
	 * @apiSampleRequest http://192.168.1.13/fang/public/api/1.0.0/apartment
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

	public function apartment(){
		$a = 105;
		$data = Cust::get_ownership($a);
		foreach ($data as $kay => $value ){
			if($value -> updated_at == ''){
				$value -> updated_at = '';
			}
		}
		if($data){
			return response()->json( [
				'code' => '101' ,
				'message'  => '请求成功',
				'result'   => $data
			] );
		}else{
			return response()->json( [
				'code' => '102' ,
				'message'  => '请求失败'
			] );
		}
	}


	/**
	 * @api {get} 1.0.0/furniture_need 家具需求
	 * @apiName furniture_need
	 * @apiGroup GroupName
	 * @apiSampleRequest http://192.168.1.13/fang/public/api/1.0.0/furniture_need
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

	public function furniture_need(){
		$a = 73;
		$data = Cust::get_ownership($a);
		foreach ($data as $kay => $value ){
			if($value -> updated_at == ''){
				$value -> updated_at = '';
			}
		}
		if($data){
			return response()->json( [
				'code' => '101' ,
				'message'  => '请求成功',
				'result'   => $data
			] );
		}else{
			return response()->json( [
				'code' => '102' ,
				'message'  => '请求失败'
			] );
		}
	}



	/**
	 * @api {get} 1.0.0/house_num 职业次数
	 * @apiName house_num
	 * @apiGroup GroupName
	 * @apiSampleRequest http://192.168.1.13/fang/public/api/1.0.0/house_num
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

	public function house_num(){
		$a = 77;
		$data = Cust::get_ownership($a);
		foreach ($data as $kay => $value ){
			if($value -> updated_at == ''){
				$value -> updated_at = '';
			}
		}
		if($data){
			return response()->json( [
				'code' => '101' ,
				'message'  => '请求成功',
				'result'   => $data
			] );
		}else{
			return response()->json( [
				'code' => '102' ,
				'message'  => '请求失败'
			] );
		}
	}

	/**
	 * @api {get} 1.0.0/demand 客户意向等级
	 * @apiName demand
	 * @apiGroup GroupName
	 * @apiSampleRequest http://192.168.1.13/fang/public/api/1.0.0/demand
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

	public function demand(){
		$a = 109;
		$data = Cust::get_ownership($a);
		foreach ($data as $kay => $value ){
			if($value -> updated_at == ''){
				$value -> updated_at = '';
			}
		}
		if($data){
			return response()->json( [
				'code' => '101' ,
				'message'  => '请求成功',
				'result'   => $data
			] );
		}else{
			return response()->json( [
				'code' => '102' ,
				'message'  => '请求失败'
			] );
		}
	}



	/**
	 * @api {get} 1.0.0/status_id 客户状态
	 * @apiName status_id
	 * @apiGroup GroupName
	 * @apiSampleRequest http://192.168.1.13/fang/public/api/1.0.0/status_id
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

	public function status_id(){
		$a = 86;
		$data = Cust::get_ownership($a);
		foreach ($data as $kay => $value ){
			if($value -> updated_at == ''){
				$value -> updated_at = '';
			}
		}
		if($data){
			return response()->json( [
				'code' => '101' ,
				'message'  => '请求成功',
				'result'   => $data
			] );
		}else{
			return response()->json( [
				'code' => '102' ,
				'message'  => '请求失败'
			] );
		}
	}




	/**
	 * @api {post} 1.0.0/store 客户添加
	 * @apiName store
	 * @apiGroup GroupName
	 * @apiParam (参数) {string} realname 客户姓名
	 * @apiParam (参数) {string} mobile 手机号
	 * @apiParam (参数) {string} sex 性别
	 * @apiParam (参数) {string} hous_id 职业顾问id
	 * @apiParam (参数) {string} shou_time 首次接触时间
	 * @apiParam (参数) {int} first_contact 首次接触方式
	 * @apiParam (参数) {string} [idcard] 身份证
	 * @apiParam (参数) {string} [birthday] 生日
	 * @apiParam (参数) {int} [cognition] 认知渠道
	 * @apiParam (参数) {int} [family_str] 家庭结构
	 * @apiParam (参数) {int} [work_type] 工作类型
	 * @apiParam (参数) {string} [address] 联系地址
	 * @apiParam (参数) {string} [ownership] 职业关注
	 * @apiParam (参数) {string} [purpose] 职业目的
	 * @apiParam (参数) {string} [area] 客户区域
	 * @apiParam (参数) {string} [residence] 居住类型
	 * @apiParam (参数) {int} [intention_area] 意向面积
	 * @apiParam (参数) {int} [floor_like] 楼层偏好
	 * @apiParam (参数) {string} [structure] 户型结构
	 * @apiParam (参数) {string} [apartment] 户型关注
	 * @apiParam (参数) {int} [furniture_need] 家具需求
	 * @apiParam (参数) {int} [house_num] 职业次数
	 * @apiParam (参数) {string} demand 客户意向等级
	 * @apiSampleRequest http://192.168.1.13/fang/public/api/1.0.0/store
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
	public function store(Request $api){
		$data['realname'] = $realname = $api -> input('realname');
		$data['mobile'] = $mobile = $api -> input('mobile');
		$data['sex'] = $sex = $api -> input('sex');
		$data['hous_id'] = $hous_id = $api -> input('hous_id');   //职业顾问id
		$data['shou_time'] = strtotime($api -> input('shou_time'));       //首次接受时间
		$data['first_contact'] = $first_contact =  $api -> input('first_contact');   //首次接受方式
		$data['demand'] = $demand = $api -> input('demand');          //客户意向等级
		if(!$realname || !$mobile  || !$sex || !$hous_id || !$first_contact || !$demand){
			return response()->json( [
				'code' => '102' ,
				'message'  => '参数不全',
			] );
		}
		$mobiles = Cust::get_mobiles($mobile);
		if($mobiles){
			return response()->json( [
				'code' => '104' ,
				'message'  => '手机号已存在',
			] );
		}

		$data['idcard'] = $idcard = $api -> input('idcard');           //身份证
		$data['birthday'] = strtotime($api -> input('birthday'));     // 生日
		$data['cognition'] = $api -> input('cognition');   //日志渠道
		$data['family_str'] = $api -> input('family_str');  //家庭结构
		$data['work_type'] = $api -> input('work_type');        //工作类型
		$data['address'] = $api -> input('address');             //联系地址
		$data['ownership'] = $api -> input('ownership');        //职业关注
		$data['purpose'] = $api -> input('purpose');          //职业目的
		$data['area'] = $api -> input('area');                    //客户区域
		$data['residence'] = $api -> input('residence');        //居住类型
		$data['intention_area'] = $api -> input('intention_area');    //意向添加
		$data['floor_like'] = $api -> input('floor_like');          //楼层偏好
		$data['structure'] = $api -> input('structure');          //户型结构
		$data['apartment'] = $api -> input('apartment');          //户型关注
		$data['furniture_need'] = $api -> input('furniture_need');          //家具需求
		$data['house_num'] = $api -> input('house_num');          //职业次数
		$data['created_at'] = time();
		if($idcard != ''){
			$idcards = Cust::get_idcards($idcard);
			if($idcards){
				return response()->json( [
					'code' => '105' ,
					'message'  => '身份证号已存在',
				] );
			}
		}
		$store = Cust::store_cust($data);
		if($store){
			return response()->json( [
				'code' => '101' ,
				'message'  => '添加成功',
			] );
		}else{
			return response()->json( [
				'code' => '103' ,
				'message'  => '请求失败',
			] );
		}
	}



	/**
	 * @api {get} 1.0.0/search 客户检索
	 * @apiName search
	 * @apiGroup GroupName
	 * @apiParam (参数) {string} [realname] 客户姓名
	 * @apiParam (参数) {string} [mobile] 手机号
	 * @apiParam (参数) {int} page 页码
	 * @apiParam (参数) {string} [demand] 意向等级
	 * @apiParam (参数) {string} hous_id 职业顾问id
	 * @apiParam (参数) {string} [starting_time] 开始时间
	 * @apiParam (参数) {string} [end_time] 结束时间
	 * @apiParam (参数) {int} [first_contact] 首次接触方式
	 * @apiSampleRequest http://192.168.1.13/fang/public/api/1.0.0/search
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
	public function search(){

//		$data['realname'] =
		$realname = Input::get('realname');
//		$data['mobile'] =
		$mobile = Input::get('mobile');
//		$data['demand'] =
		$demand = Input::get('demand');
		$page = Input::get('page');
//		$data['first_contact'] =
		$first_contact = Input::get('first_contact');
//		$data['starting_time'] =
		$starting_time = Input::get('starting_time');
//		$data['end_time'] =
		$end_time = Input::get('end_time');
		$hous_id = Input::get('hous_id');
		$data = Cust::search($realname,$mobile,$demand,$first_contact,$starting_time,$end_time,$hous_id,$page);
//		if($realname == ''){
//			$data['realname'] = '';
//		}
//		if($realname == ''){
//			$data['mobile'] = '';
//		}
//		if($realname == ''){
//			$data['demand'] = '';
//		}
//		if($realname == ''){
//			$data['first_contact'] = '';
//		}
//		if($realname == ''){
//			$data['starting_time'] = '';
//		}
//		if($realname == ''){
//			$data['end_time'] = '';
//		}
		if($data){
			return response()->json( [
				'code' => '101' ,
				'message'  => '请求成功',
				'result'  => $data
			] );
		}else{
			return response()->json( [
				'code' => '102' ,
				'message'  => '参数不全',
			] );
		}
	}


	/**
	 * @api {post} 1.0.0/details 客户详情
	 * @apiName details
	 * @apiGroup GroupName
	 * @apiParam (参数) {string} cust_id 客户id
	 * @apiSampleRequest http://192.168.1.13/fang/public/api/1.0.0/details
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
	public function details(Request $api){
		$cust_id = $api -> input('cust_id');
		if(!$cust_id){
			return response()->json( [
				'code' => '102',
				'message'  => '参数不全',
			] );
		}

		$data = Cust::get_cust_d($cust_id);
		$data -> home = Cust::get_home($cust_id);   //查询客户所选的房子状态

		if(!$data -> telphone ){
			$data -> telphone = '';
		}

		if(!$data -> weixin ){
			$data -> weixin = '';
		}
		if(!$data -> qq ){
			$data -> qq = '';
		}
		if(!$data -> email ){
			$data -> email = '';
		}
		if(!$data -> idcard ){
			$data -> idcard = '';
		}
		if(!$data -> status_id ){
			$data -> status_id = '';
		}
		if(!$data -> cognition ){
			$data -> cognition = '';
		}
		if(!$data -> family_str ){
			$data -> family_str = '';
		}
		if(!$data -> work_type ){
			$data -> work_type = '';
		}
		if(!$data -> address ){
			$data -> address = '';
		}
		if(!$data -> intention_area ){
			$data -> intention_area = '';
		}

		if(!$data -> floor_like ){
			$data -> floor_like = '';
		}
		if(!$data -> furniture_need ){
			$data -> furniture_need = '';
		}
		if(!$data -> house_num ){
			$data -> house_num = '';
		}
		if(!$data -> coow_id ){
			$data -> coow_id = '';
		}
		if(!$data -> first_contact ){
			$data -> first_contact = '';
		}
		if(!$data -> ownership ){
			$data -> ownership = '';
		}
		if(!$data -> purpose ){
			$data -> purpose = '';
		}
		if(!$data -> area ){
			$data -> area = '';
		}
		if(!$data -> residence ){
			$data -> residence = '';
		}
		if(!$data -> structure ){
			$data -> structure = '';
		}
		if(!$data -> demand ){
			$data -> demand = '';
		}
		if(!$data -> apartment ){
			$data -> apartment = '';
		}
		if(!$data -> shou_time ){
			$data -> shou_time = '';
		}
		if(!$data -> birthday ){
			$data -> birthday = '';
		}

		if($data){
			return response()->json( [
				'code' => '101' ,
				'message'  => '请求成功',
				'result'  => $data
			] );
		}else{
			return response()->json( [
				'code' => '103' ,
				'message'  => '请求失败',
			] );
		}
	}


	/**
	 * @api {post} 1.0.0/rocedure 手续记录
	 * @apiName rocedure
	 * @apiGroup GroupName
	 * @apiParam (参数) {string} cust_id 客户id
	 * @apiSampleRequest http://192.168.1.13/fang/public/api/1.0.0/rocedure
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
	public function rocedure(Request $api){
		$cust_id = $api -> input('cust_id');
		if(!$cust_id){
			return response()->json( [
				'code' => '102',
				'message'  => '参数不全',
			] );
		}

		$data = Cust::get_rocedure($cust_id);   //认购记录
		$datas = Cust::get_changeinfo($cust_id);  //换房 更名 退房记录
		$dataq = Cust::get_signinfo($cust_id);   //签约记录

		$a = array_merge_recursive($data,$datas,$dataq);


			return response()->json( [
				'code' => '101' ,
				'message'  => '请求成功',
				'result'  => $a
			] );

	}


	/**
	 * @api {post} 1.0.0/buyinfo 查询客户的认购记录
	 * @apiName buyinfo
	 * @apiGroup GroupName
	 * @apiParam (参数) {string} cust_id 客户id
	 * @apiSampleRequest http://192.168.1.13/fang/public/api/1.0.0/buyinfo
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
	public function buyinfo(Request $api){
		$cust_id = $api -> input('cust_id');
		if(!$cust_id){
			return response()->json( [
				'code' => '103' ,
				'message'  => '参数不全',
			] );
		}
		$data = Cust::get_buyinfo($cust_id);
		if($data){
			return response()->json( [
				'code' => '101' ,
				'message'  => '请求成功',
				'result'  => $data
			] );
		}else{
			return response()->json( [
				'code' => '102' ,
				'message'  => '请求失败',
			] );
		}

	}











}
