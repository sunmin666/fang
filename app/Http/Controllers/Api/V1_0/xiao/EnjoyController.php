<?php

namespace App\Http\Controllers\Api\V1_0\xiao;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Api\V1_0\xiao\Enjoy;

class EnjoyController extends Controller
{
    /**
     * @apiDefine GroupNamejds 小后台折扣Api
     */

    /**
     * @api {post} api/1.0.0/discount 添加折扣
     * @apiName discount
     * @apiGroup GroupNamejds
     *
     * @apiParam (参数) {string} enjoy 折扣
     * @apiParam (参数) {int} role_id 角色
     *
     * @apiSampleRequest http://192.168.1.220/fang/public/api/1.0.0/discount
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
    public function discount(Request $api)
    {
        header( 'Access-Control-Allow-Origin:*' );
        $data['enjoy'] = $enjoy = $api -> input('enjoy');
        $data['role_id'] = $role_id= $api -> input('role_id');
        $data['created_at'] = time();
        if(!$enjoy || !$role_id){
            return [
                'code' => config('api.V1_0.xiao.enjoy.enjoy_parameter_code'),
                'msg' =>  config('api.V1_0.xiao.enjoy.enjoy_parameter_msg'),
            ];
        }
        $info = Enjoy::get_d_rol($role_id);
        if($info){
            return [
                'code' => 107,
                'msg' => '角色已存在',
            ];
        }
        $data = Enjoy::insert_d_en($data);
        if($data){
            return [
                'code' =>  config('api.V1_0.xiao.enjoy.enjoy_success_code'),
                'msg' => config('api.V1_0.xiao.enjoy.enjoy_success_msg'),
            ];
        }else{
            return [
                'code' => config('api.V1_0.xiao.enjoy.enjoy_error_code'),
                'msg' => config('api.V1_0.xiao.enjoy.enjoy_error_msg'),
            ];
        }
    }
    /**
     * @api {post} api/1.0.0/disshow 折扣列表
     * @apiName disshow
     * @apiGroup GroupNamejds
     *
     * @apiParam (参数) {int} page 页码
     *
     * @apiSampleRequest http://192.168.1.220/fang/public/api/1.0.0/disshow
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
    public function disshow(Request $api)
    {
        header( 'Access-Control-Allow-Origin:*' );
        $page = $api -> input('page');
        $data['disshow'] = Enjoy::get_all_en($page);
        $data['count'] = Enjoy::get_all_count();
        $data['zongye'] = ceil($data['count']/10);
        $data['disshow']=array_values( $data['disshow']);
        if($data){
            return [
                'code' =>  config('api.V1_0.xiao.enjoy.enjoy_success_code'),
                'msg' => config('api.V1_0.xiao.enjoy.enjoy_success_msg'),
                'result'=> $data,
            ];
        }else{
            return [
                'code' => config('api.V1_0.xiao.enjoy.enjoy_error_code'),
                'msg' => config('api.V1_0.xiao.enjoy.enjoy_error_msg'),
            ];
        }
    }
    /**
     * @api {post} api/1.0.0/endetails 折扣详情
     * @apiName endetails
     * @apiGroup GroupNamejds
     *
     * @apiParam (参数) {int} enjoy_id 折扣id
     *
     * @apiSampleRequest http://192.168.1.220/fang/public/api/1.0.0/endetails
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
    public function endetails(Request $api)
    {
        header( 'Access-Control-Allow-Origin:*' );
        $enjoy_id = $api -> input('enjoy_id');
        if(!$enjoy_id){
            return [
                'code' => config('api.V1_0.xiao.enjoy.enjoy_parameter_code'),
                'msg' =>  config('api.V1_0.xiao.enjoy.enjoy_parameter_msg'),
            ];
        }
        $data = Enjoy::get_d_details($enjoy_id);
        if($data){
            return [
                'code' =>  config('api.V1_0.xiao.enjoy.enjoy_success_code'),
                'msg' => config('api.V1_0.xiao.enjoy.enjoy_success_msg'),
                'result'=> $data,
            ];
        }else{
            return [
                'code' => config('api.V1_0.xiao.enjoy.enjoy_error_code'),
                'msg' => config('api.V1_0.xiao.enjoy.enjoy_error_msg'),
            ];
        }
    }
    /**
     * @api {post} api/1.0.0/enjoyedit 折扣修改
     * @apiName enjoyedit
     * @apiGroup GroupNamejds
     *
     * @apiParam (参数) {int} enjoy_id 折扣id
     * @apiParam (参数) {int} role_id 角色
     * @apiParam (参数) {string} enjoy 折扣
     *
     *
     * @apiSampleRequest http://192.168.1.220/fang/public/api/1.0.0/enjoyedit
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
    public function enjoyedit(Request $api)
    {
        header( 'Access-Control-Allow-Origin:*' );
        $enjoy_id = $api -> input('enjoy_id');
        $data['enjoy']= $enjoy = $api -> input('enjoy');
        $data['role_id'] = $role_id= $api -> input('role_id');
        $data['updated_at']= time();
        if(!$enjoy_id){
            return [
                'code' => config('api.V1_0.xiao.enjoy.enjoy_parameter_code'),
                'message' =>  config('api.V1_0.xiao.enjoy.enjoy_parameter_msg'),
            ];
        }
        $data = Enjoy::edit_d_en($enjoy_id,$data);
        if($data){
            return [
                'code' =>  config('api.V1_0.xiao.enjoy.enjoy_success_code'),
                'msg' => config('api.xiao.enjoy.enjoy_success_msg'),
                'result'=> $data,
            ];
        }else{
            return [
                'code' => config('api.V1_0.xiao.enjoy.enjoy_error_code'),
                'msg' => config('api.V1_0.xiao.enjoy.enjoy_error_msg'),
            ];
        }
    }
    /**
     * @api {post} api/1.0.0/enjoydel 折扣删除
     * @apiName enjoydel
     * @apiGroup GroupNamejds
     *
     * @apiParam (参数) {int} enjoy_id 折扣id
     *
     *
     * @apiSampleRequest http://192.168.1.220/fang/public/api/1.0.0/enjoydel
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
    public function enjoydel(Request $api)
    {
        header( 'Access-Control-Allow-Origin:*' );
        $enjoy_id = $api -> input('enjoy_id');
        if(!$enjoy_id){
            return [
                'code' => config('api.V1_0.xiao.enjoy.enjoy_parameter_code'),
                'msg' =>  config('api.V1_0.xiao.enjoy.enjoy_parameter_msg'),
            ];
        }
        $data = Enjoy::del_d_enjoy($enjoy_id);
        if($data){
            return [
                'code' =>  config('api.V1_0.xiao.enjoy.enjoy_success_code'),
                'msg' => config('api.V1_0.xiao.enjoy.enjoy_success_msg'),
            ];
        }else{
            return [
                'code' => config('api.V1_0.xiao.enjoy.enjoy_error_code'),
                'msg' => config('api.V1_0.xiao.enjoy.enjoy_error_msg'),
            ];
        }
    }
    /**
     * @api {post} api/1.0.0/enjoyalldel 折扣全选删除
     * @apiName enjoyalldel
     * @apiGroup GroupNamejds
     *
     * @apiParam (参数) {int} enjoy_id 折扣id
     *
     *
     * @apiSampleRequest http://192.168.1.220/fang/public/api/1.0.0/enjoyalldel
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
    public function enjoyalldel(Request $api)
    {
        header( 'Access-Control-Allow-Origin:*' );
        $enjoy_id = $api -> input('enjoy_id');
        $pieceses=trim($enjoy_id,',');
        $pieces = explode(",", $pieceses);
        if(!$pieces){
            return [
                'code' => config('api.V1_0.xiao.enjoy.enjoy_parameter_code'),
                'msg' =>  config('api.V1_0.xiao.enjoy.enjoy_parameter_msg'),
            ];
        }
        $data = Enjoy::del_all_enj($pieces);
        if($data){
            return [
                'code' =>  config('api.V1_0.xiao.enjoy.enjoy_success_code'),
                'msg' => config('api.V1_0.xiao.enjoy.enjoy_success_msg'),
            ];
        }else{
            return [
                'code' => config('api.V1_0.xiao.enjoy.enjoy_error_code'),
                'msg' => config('api.V1_0.xiao.enjoy.enjoy_error_msg'),
            ];
        }
    }
    /**
     * @api {get} api/1.0.0/enjoyallnu 查看所有折扣
     * @apiName enjoyallnu
     * @apiGroup GroupNamejds
     *
     *
     *
     * @apiSampleRequest http://192.168.1.220/fang/public/api/1.0.0/enjoyallnu
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
    public function enjoyallnu()
    {
        header( 'Access-Control-Allow-Origin:*' );
        $data = Enjoy::get_all_enjnu();
        if($data){
            return [
                'code' =>  config('api.V1_0.xiao.enjoy.enjoy_success_code'),
                'msg' => config('api.xiao.enjoy.enjoy_success_msg'),
                'result'=> $data,
            ];
        }else{
            return [
                'code' => config('api.V1_0.xiao.enjoy.enjoy_error_code'),
                'msg' => config('api.V1_0.xiao.enjoy.enjoy_error_msg'),
            ];

        }
    }
}
