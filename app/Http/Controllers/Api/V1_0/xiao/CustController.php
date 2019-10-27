<?php

namespace App\Http\Controllers\Api\V1_0\xiao;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Api\V1_0\xiao\Cust;

class CustController extends Controller
{
    /**
     * @apiDefine GroupNamejfkc 小后台客户管理Api
     */

    /**
     * @api {get} api/1.0.0/custhous 查询所有置业顾问
     * @apiName custhous
     * @apiGroup GroupNamejfkc
     * @apiSampleRequest http://192.168.1.220/fang/public/api/1.0.0/custhous
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
    public function custhous()
    {
        header( 'Access-Control-Allow-Origin:*' );
        $data = Cust::get_all_hous();
        if($data){
            return [
                'code'   => 101,
                'msg'    => '请求成功',
                "result" => $data,
            ];
        }else{
            return [
                'code'   => 102,
                'msg'    => '请求失败',
            ];
        }
    }
    /**
     * @api {get} api/1.0.0/custcogn 认知渠道
     * @apiName custcogn
     * @apiGroup GroupNamejfkc
     * @apiSampleRequest http://192.168.1.220/fang/public/api/1.0.0/custcogn
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
    public function custcogn()
    {
        header( 'Access-Control-Allow-Origin:*' );
        $a= 28;
        $data = Cust::get_all_class($a);
        if($data){
            return [
                'code' => '101',
                'msg' => '请求成功',
                "result" => $data,
            ];
        }else{
            return [
                'code' => '102',
                'msg' => '请求失败',
            ];
        }
    }

    /**
     * @api {get} api/1.0.0/custfam 家庭结构
     * @apiName custfam
     * @apiGroup GroupNamejfkc
     * @apiSampleRequest http://192.168.1.220/fang/public/api/1.0.0/custfam
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
    public function custfam()
    {
        header( 'Access-Control-Allow-Origin:*' );
        $a= 51;
        $data = Cust::get_all_class($a);
        if($data){
            return [
                'code' => '101',
                'msg' => '请求成功',
                "result" => $data,
            ];
        }else{
            return [
                'code' => '102',
                'msg' => '请求失败',
            ];
        }
    }

    /**
     * @api {get} api/1.0.0/cuwork 工作类型
     * @apiName cuwork
     * @apiGroup GroupNamejfkc
     * @apiSampleRequest http://192.168.1.220/fang/public/api/1.0.0/cuwork
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
    public function cuwork()
    {
        header( 'Access-Control-Allow-Origin:*' );
        $a= 58;
        $data = Cust::get_all_class($a);
        if($data){
            return [
                'code' => '101',
                'msg' => '请求成功',
                "result" => $data,
            ];
        }else{
            return [
                'code' => '102',
                'msg' => '请求失败',
            ];
        }
    }

    /**
     * @api {get} api/1.0.0/custnten 意向面积
     * @apiName custnten
     * @apiGroup GroupNamejfkc
     * @apiSampleRequest http://192.168.1.220/fang/public/api/1.0.0/custnten
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
    public function custnten()
    {
        header( 'Access-Control-Allow-Origin:*' );
        $a= 63;
        $data = Cust::get_all_class($a);
        if($data){
            return [
                'code' => '101',
                'msg' => '请求成功',
                "result" => $data,
            ];
        }else{
            return [
                'code' => '102',
                'msg' => '请求失败',
            ];
        }
    }

    /**
     * @api {get} api/1.0.0/cusfloor 楼层偏好
     * @apiName cusfloor
     * @apiGroup GroupNamejfkc
     * @apiSampleRequest http://192.168.1.220/fang/public/api/1.0.0/cusfloor
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
    public function cusfloor()
    {
        header( 'Access-Control-Allow-Origin:*' );
        $a= 69;
        $data = Cust::get_all_class($a);
        if($data){
            return [
                'code' => '101',
                'msg' => '请求成功',
                "result" => $data,
            ];
        }else{
            return [
                'code' => '102',
                'msg' => '请求失败',
            ];
        }
    }

    /**
     * @api {get} api/1.0.0/custausicd 客户状态
     * @apiName custausicd
     * @apiGroup GroupNamejfkc
     * @apiSampleRequest http://192.168.1.220/fang/public/api/1.0.0/custausicd
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
    public function custausicd()
    {
        header( 'Access-Control-Allow-Origin:*' );
        $a= 86;
        $data = Cust::get_all_class($a);
        if($data){
            return [
                'code' => '101',
                'msg' => '请求成功',
                "result" => $data,
            ];
        }else{
            return [
                'code' => '102',
                'msg' => '请求失败',
            ];
        }
    }

    /**
     * @api {get} api/1.0.0/cusneed 家具需求
     * @apiName cusneed
     * @apiGroup GroupNamejfkc
     * @apiSampleRequest http://192.168.1.220/fang/public/api/1.0.0/cusneed
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
    public function cusneed()
    {
        header( 'Access-Control-Allow-Origin:*' );
        $a= 73;
        $data = Cust::get_all_class($a);
        if($data){
            return [
                'code' => '101',
                'msg' => '请求成功',
                "result" => $data,
            ];
        }else{
            return [
                'code' => '102',
                'msg' => '请求失败',
            ];
        }
    }

    /**
     * @api {get} api/1.0.0/cushounum 置业此数
     * @apiName cushounum
     * @apiGroup GroupNamejfkc
     * @apiSampleRequest http://192.168.1.220/fang/public/api/1.0.0/cushounum
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
    public function cushounum()
    {
        header( 'Access-Control-Allow-Origin:*' );
        $a= 77;
        $data = Cust::get_all_class($a);
        if($data){
            return [
                'code' => '101',
                'msg' => '请求成功',
                "result" => $data,
            ];
        }else{
            return [
                'code' => '102',
                'msg' => '请求失败',
            ];
        }
    }
    /**
     * @api {get} api/1.0.0/cusfirst 修改时首次接触方式
     * @apiName cusfirst
     * @apiGroup GroupNamejfkc
     * @apiSampleRequest http://192.168.1.220/fang/public/api/1.0.0/cusfirst
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
    public function cusfirst()
    {
        header( 'Access-Control-Allow-Origin:*' );
        $a= 82;
        $data = Cust::get_all_class($a);
        if($data){
            return [
                'code' => '101',
                'msg' => '请求成功',
                "result" => $data,
            ];
        }else{
            return [
                'code' => '102',
                'msg' => '请求失败',
            ];
        }
    }
    /**
     * @api {get} api/1.0.0/cusfirstadd 添加时首次接触方式
     * @apiName cusfirstadd
     * @apiGroup GroupNamejfkc
     * @apiSampleRequest http://192.168.1.220/fang/public/api/1.0.0/cusfirstadd
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
    public function cusfirstadd()
    {
        header( 'Access-Control-Allow-Origin:*' );
        $a= 168;
        $data = Cust::get_all_class($a);
        if($data){
            return [
                'code' => '101',
                'msg' => '请求成功',
                "result" => $data,
            ];
        }else{
            return [
                'code' => '102',
                'msg' => '请求失败',
            ];
        }
    }
    /**
     * @api {get} api/1.0.0/ownership 置业关注
     * @apiName ownership
     * @apiGroup GroupNamejfkc
     * @apiSampleRequest http://192.168.1.220/fang/public/api/1.0.0/ownership
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
    public function ownership()
    {
        header( 'Access-Control-Allow-Origin:*' );
        $a= 91;
        $data = Cust::get_all_class($a);
        if($data){
            return [
                'code' => '101',
                'msg' => '请求成功',
                "result" => $data,
            ];
        }else{
            return [
                'code' => '102',
                'msg' => '请求失败',
            ];
        }
    }
    /**
     * @api {get} api/1.0.0/purpose 置业目的
     * @apiName purpose
     * @apiGroup GroupNamejfkc
     * @apiSampleRequest http://192.168.1.220/fang/public/api/1.0.0/purpose
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
    public function purpose()
    {
        header( 'Access-Control-Allow-Origin:*' );
        $a= 94;
        $data = Cust::get_all_class($a);
        if($data){
            return [
                'code' => '101',
                'msg' => '请求成功',
                "result" => $data,
            ];
        }else{
            return [
                'code' => '102',
                'msg' => '请求失败',
            ];
        }
    }
    /**
     * @api {get} api/1.0.0/area 客户区域
     * @apiName area
     * @apiGroup GroupNamejfkc
     * @apiSampleRequest http://192.168.1.220/fang/public/api/1.0.0/area
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
    public function area()
    {
        header( 'Access-Control-Allow-Origin:*' );
        $a= 96;
        $data = Cust::get_all_class($a);
        if($data){
            return [
                'code' => '101',
                'msg' => '请求成功',
                "result" => $data,
            ];
        }else{
            return [
                'code' => '102',
                'msg' => '请求失败',
            ];
        }
    }
    /**
     * @api {get} api/1.0.0/residence 居住类型
     * @apiName residence
     * @apiGroup GroupNamejfkc
     * @apiSampleRequest http://192.168.1.220/fang/public/api/1.0.0/residence
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
    public function residence()
    {
        header( 'Access-Control-Allow-Origin:*' );
        $a= 98;
        $data = Cust::get_all_class($a);
        if($data){
            return [
                'code' => '101',
                'msg' => '请求成功',
                "result" => $data,
            ];
        }else{
            return [
                'code' => '102',
                'msg' => '请求失败',
            ];
        }
    }
    /**
     * @api {get} api/1.0.0/structure 户型结构
     * @apiName structure
     * @apiGroup GroupNamejfkc
     * @apiSampleRequest http://192.168.1.220/fang/public/api/1.0.0/structure
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
    public function structure()
    {
        header( 'Access-Control-Allow-Origin:*' );
        $a= 100;
        $data = Cust::get_all_class($a);
        if($data){
            return [
                'code' => '101',
                'msg' => '请求成功',
                "result" => $data,
            ];
        }else{
            return [
                'code' => '102',
                'msg' => '请求失败',
            ];
        }
    }
    /**
     * @api {get} api/1.0.0/demand 意向等级
     * @apiName demand
     * @apiGroup GroupNamejfkc
     * @apiSampleRequest http://192.168.1.220/fang/public/api/1.0.0/demand
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
    public function demand()
    {
        header( 'Access-Control-Allow-Origin:*' );
        $a= 109;
        $data = Cust::get_all_class($a);
        if($data){
            return [
                'code' => '101',
                'msg' => '请求成功',
                "result" => $data,
            ];
        }else{
            return [
                'code' => '102',
                'msg' => '请求失败',
            ];
        }
    }
    /**
     * @api {get} api/1.0.0/apartment 关注户型
     * @apiName apartment
     * @apiGroup GroupNamejfkc
     * @apiSampleRequest http://192.168.1.220/fang/public/api/1.0.0/apartment
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
    public function apartment()
    {
        header( 'Access-Control-Allow-Origin:*' );
        $a= 105;
        $data = Cust::get_all_class($a);
        if($data){
            return [
                'code' => '101',
                'msg' => '请求成功',
                "result" => $data,
            ];
        }else{
            return [
                'code' => '102',
                'msg' => '请求失败',
            ];
        }
    }

    /**
     * @api {post} api/1.0.0/custadd 客户添加
     * @apiName custadd
     * @apiGroup GroupNamejfkc
     *
     * @apiParam (参数) {string} realname 客户真实姓名
     * @apiParam (参数) {int} sex 客户性别
     * @apiParam (参数) {int} mobile 客户手机号
     * @apiParam (参数) {int} [email] 客户邮箱
     * @apiParam (参数) {int} [idcard] 身份证号码
     * @apiParam (参数) {int} [birthday] 生日
     * @apiParam (参数) {string} first_time 首次接触时间
     * @apiParam (参数) {int} [cognition] 认知渠道
     * @apiParam (参数) {int} [family_str] 家庭结构
     * @apiParam (参数) {int} [work_type] 工作类型
     * @apiParam (参数) {int} [address] 联系地址
     * @apiParam (参数) {int} [intention_area] 意向面积
     * @apiParam (参数) {int} [floor_like] 楼层偏好
     * @apiParam (参数) {int} [furniture_need] 家具需求
     * @apiParam (参数) {int} [house_num] 置业次数
     * @apiParam (参数) {int} first_contact 首次接触方式
     * @apiParam (参数) {int} [status_id] 客户状态
     * @apiParam (参数) {int} [ownership] 置业关注
     * @apiParam (参数) {int} [purpose] 置业目的
     * @apiParam (参数) {int} [area] 客户区域
     * @apiParam (参数) {int} [residence] 居住类型
     * @apiParam (参数) {int} [structure] 户型结构
     * @apiParam (参数) {int} demand 意向等级
     * @apiParam (参数) {int} [apartment] 关注户型
     * @apiParam (参数) {int} hous_id 置业顾问
     *
     * @apiSampleRequest http://192.168.1.220/fang/public/api/1.0.0/custadd
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
    public function custadd(Request $api)
    {
        header( 'Access-Control-Allow-Origin:*' );
        $data['realname'] = $realname= $api -> input('realname');
        $data['sex'] = $sex = $api -> input('sex');
        $data['mobile'] = $mobile= $api -> input('mobile');
        $data['email'] = $email= $api -> input('email');
        $data['idcard'] = $idcard= $api -> input('idcard');
        $data['cognition'] = $cognition= $api -> input('cognition');
        $data['family_str'] = $family_str= $api -> input('family_str');
        $data['work_type'] = $work_type= $api -> input('work_type');
        $data['address'] = $address= $api -> input('address');
        $data['intention_area'] = $intention_area= $api -> input('intention_area');
        $data['floor_like'] = $floor_like= $api -> input('floor_like');
        $data['furniture_need'] = $furniture_need= $api -> input('furniture_need');
        $data['house_num'] = $house_num= $api -> input('house_num');
        $data['first_contact'] = $first_contact= $api -> input('first_contact');
        $data['ownership'] = $ownership= $api -> input('ownership');
        $data['status_id'] = $status_id= $api -> input('status_id');
        $data['purpose'] = $fpurpose= $api -> input('purpose');
        $data['area'] = $area= $api -> input('area');
        $data['residence'] = $residence= $api -> input('residence');
        $data['structure'] = $structure= $api -> input('structure');
        $data['demand'] = $demand= $api -> input('demand');
        $data['apartment'] = $apartment= $api -> input('apartment');
        $data['hous_id'] = $hous_id= $api -> input('hous_id');
        $data['birthday'] = $birthday= strtotime($api -> input('birthday'));
        $data['first_time'] = $first_time= strtotime($api -> input('first_time'));
        $data['created_at'] = time();
        if(!$realname || !$sex || !$mobile || !$first_contact || !$demand || !$hous_id || !$first_time){
            return [
                'code' => 103,
                'msg' => '参数不全',
            ];
        }

        if($mobile !=''){
            $info = Cust::mobile_d_get($mobile);
            if($info){
                return [
                    'code' => 104,
                    'msg' => '手机号已存在',
                ];
            }
        }
        if($idcard !=''){
            $infoncf = Cust::idcard_d_get($idcard);
            if($infoncf){
                return [
                    'code' => 105,
                    'msg' => '身份证号已存在',
                ];
            }
        }
        if($email!= ''){
            $infoem = Cust::email_d_get($email);
            if($infoem){
                return [
                    'code' => 106,
                    'msg' => '邮箱已存在',
                ];
            }
        }

        $data = Cust::add_d_cust($data);
        if($data){
            return [
                'code' => 101,
                'msg' => '请求成功',
            ];
        }else{
            return [
                'code' => 102,
                'msg' => '请求失败',
            ];
        }
    }
    /**
     * @api {post} api/1.0.0/custshow 客户列表
     * @apiName custshow
     * @apiGroup GroupNamejfkc
     *
     * @apiParam (参数) {int} page 页码
     * @apiParam (参数) {string} [name] 置业顾问筛选
     * @apiParam (参数) {string} [realname] 客户姓名筛选
     * @apiParam (参数) {int} [mobile] 手机号筛选
     *
     * @apiSampleRequest http://192.168.1.5/fang/public/api/1.0.0/custshow
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
    public function custshow(Request $api)
    {
        header( 'Access-Control-Allow-Origin:*' );
        $page = $api -> input('page');
        $name = $api -> input('name');
        $realname = $api -> input('realname');
        $mobile = $api -> input('mobile');
        $data['custshow'] = Cust::get_all_cus($page,$name,$realname,$mobile);
        $data['count'] = Cust::get_all_count();
        $data['zongye'] = ceil($data['count']/10);
        $data['custshow']=array_values( $data['custshow']);
        if($data){
            return [
                'code' => 101,
                'msg' => '请求成功',
                "result" =>$data,
            ];
        }else{
            return [
                'code' => 102,
                'msg' => '请求失败',
            ];
        }
    }
    /**
     * @api {post} api/1.0.0/custdesit 客户详情
     * @apiName custdesit
     * @apiGroup GroupNamejfkc
     *
     * @apiParam (参数) {int} cust_id 客户id
     *
     * @apiSampleRequest http://192.168.1.220/fang/public/api/1.0.0/custdesit
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
    public function custdesit(Request $api)
    {
        header( 'Access-Control-Allow-Origin:*' );
        $cust_id = $api -> input('cust_id');
        if(!$cust_id){
            return [
                'code' => 103,
                'msg' => '参数不全',
            ];
        }
        $data = Cust::get_d_custid($cust_id);
        if($data){
            return [
                'code' => 101,
                'msg' => '请求成功',
                "result" =>$data,
            ];
        }else{
            return [
                'code' => 102,
                'msg' => '请求失败',
            ];
        }
    }
    /**
     * @api {post} api/1.0.0/custedit 客户修改
     * @apiName custedit
     * @apiGroup GroupNamejfkc
     *
     * @apiParam (参数) {int} cust_id 客户id
     * @apiParam (参数) {string} realname 客户真实姓名
     * @apiParam (参数) {int} sex 客户性别
     * @apiParam (参数) {int} mobile 客户手机号
     * @apiParam (参数) {int} email 客户邮箱
     * @apiParam (参数) {int} idcard 身份证号码
     * @apiParam (参数) {int} [birthday] 生日
     * @apiParam (参数) {string} first_time 首次接触时间
     * @apiParam (参数) {int} cognition 认知渠道
     * @apiParam (参数) {int} family_str 家庭结构
     * @apiParam (参数) {int} work_type 工作类型
     * @apiParam (参数) {int} address 联系地址
     * @apiParam (参数) {int} intention_area 意向面积
     * @apiParam (参数) {int} floor_like 楼层偏好
     * @apiParam (参数) {int} furniture_need 家具需求
     * @apiParam (参数) {int} house_num 置业次数
     * @apiParam (参数) {int} first_contact 首次接触方式
     * @apiParam (参数) {int} ownership 置业关注
     * @apiParam (参数) {int} purpose 置业目的
     * @apiParam (参数) {int} area 客户区域
     * @apiParam (参数) {int} residence 居住类型
     * @apiParam (参数) {int} structure 户型结构
     * @apiParam (参数) {int} demand 意向等级
     * @apiParam (参数) {int} apartment 关注户型
     * @apiParam (参数) {int} hous_id 置业顾问
     * @apiSampleRequest http://192.168.1.220/fang/public/api/1.0.0/custedit
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
    public function custedit(Request $api)
    {
        header( 'Access-Control-Allow-Origin:*' );
        $cust_id = $api -> input('cust_id');
        $data['realname'] = $realname= $api -> input('realname');
        $data['sex'] = $sex= $api -> input('sex');
        $data['mobile'] = $mobile= $api -> input('mobile');
        $data['email'] = $email= $api -> input('email');
        $data['idcard'] = $idcard= $api -> input('idcard');
        $data['cognition'] = $cognition= $api -> input('cognition');
        $data['family_str'] = $family_str= $api -> input('family_str');
        $data['work_type'] = $work_type= $api -> input('work_type');
        $data['address'] = $address= $api -> input('address');
        $data['intention_area'] = $intention_area= $api -> input('intention_area');
        $data['floor_like'] = $floor_like= $api -> input('floor_like');
        $data['furniture_need'] = $furniture_need= $api -> input('furniture_need');
        $data['house_num'] = $house_num= $api -> input('house_num');
        $data['first_contact'] = $first_contact= $api -> input('first_contact');
        $data['ownership'] = $ownership= $api -> input('ownership');
        $data['purpose'] = $fpurpose= $api -> input('purpose');
        $data['area'] = $area= $api -> input('area');
        $data['residence'] = $residence= $api -> input('residence');
        $data['structure'] = $structure= $api -> input('structure');
        $data['demand'] = $demand= $api -> input('demand');
        $data['apartment'] = $apartment= $api -> input('apartment');
        $data['hous_id'] = $hous_id= $api -> input('hous_id');
        $data['birthday'] = $birthday= strtotime($api -> input('birthday'));
        $data['first_time'] = $first_time= strtotime($api -> input('first_time'));
        $data['updated_at'] = time();
        if(!$cust_id){
            return [
                'code' => 103,
                'msg' => '参数不全',
            ];
        }
        $data = Cust::edit_d_cust($cust_id,$data);
        if($data){
            return [
                'code' => 101,
                'msg' => '请求成功',
            ];
        }else{
            return [
                'code' => 102,
                'msg' => '请求失败',
            ];
        }
    }
    /**
     * @api {post} api/1.0.0/custdel 客户删除
     * @apiName custdel
     * @apiGroup GroupNamejfkc
     *
     * @apiParam (参数) {int} cust_id 客户id
     *
     * @apiSampleRequest http://192.168.1.220/fang/public/api/1.0.0/custdel
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
    public function custdel(Request $api)
    {
        header( 'Access-Control-Allow-Origin:*' );
        $cust_id = $api -> input('cust_id');
        if(!$cust_id){
            return [
                'code' => 103,
                'msg' => '参数不全',
            ];
        }
        $data['is_show'] = 0;

        $data = Cust::del_d_cust($cust_id,$data);
        if($data){
            return [
                'code' => 101,
                'msg' => '请求成功',
            ];
        }else{
            return [
                'code' => 102,
                'msg' => '请求失败',
            ];
        }
    }

    /**
     * @api {post} api/1.0.0/custalldel 客户全选删除
     * @apiName custalldel
     * @apiGroup GroupNamejfkc
     *
     * @apiParam (参数) {int} cust_id 客户id
     *
     * @apiSampleRequest http://192.168.1.220/fang/public/api/1.0.0/custalldel
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
    public function custalldel(Request $api)
    {
        header( 'Access-Control-Allow-Origin:*' );
        $cust_id = $api -> input('cust_id');
        $pieceses=trim($cust_id,',');
        $pieces = explode(",", $pieceses);
        if(!$pieces){
            return [
                'code' => 103,
                'msg' => '参数不全',
            ];
        }

        $data['is_show'] = 0;

        $data = Cust::del_all_cust($pieces,$data);
        if($data){
            return [
                'code' => 101,
                'msg' => '请求成功',
            ];
        }else{
            return [
                'code' => 102,
                'msg' => '请求失败',
            ];
        }
    }

}
