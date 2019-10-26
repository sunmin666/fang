<?php

namespace App\Http\Controllers\Api\V1_0\xiao;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Api\V1_0\xiao\Project;

class ProjectController extends Controller
{
    /**
     * @apiDefine GroupNamejh 小后台项目信息Api
     */

    /**
     * @api {post} api/1.0.0/registrati 项目信息添加
     * @apiName registrati
     * @apiGroup GroupNamejh
     *
     * @apiParam (参数) {int} cust_id 用户id
     * @apiParam (参数) {int} mobile 用户手机号
     * @apiParam (参数) {string} pro_cname 项目名称
     * @apiParam (参数) {string} comp 所属公司
     * @apiParam (参数) {string} project_add 项目地址
     * @apiParam (参数) {string} sales_add 售楼地址
     * @apiParam (参数) {int} home_number 总户数
     * @apiParam (参数) {int} main_unit 主力户型
     * @apiParam (参数) {int} opening_time 开盘时间
     * @apiParam (参数) {string} developers 开发商
     * @apiParam (参数) {int} property_type 物业类型
     * @apiParam (参数) {int} archit_type 建筑类型
     *  @apiParam (参数) {int} situation 建筑情况
     *
     *
     * @apiSampleRequest http://192.168.1.220/fang/public/api/1.0.0/registrati
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
    public function registrati(Request $api){
        header('Access-Control-Allow-Origin:*');
        $data['cust_id'] = $cust_id = $api -> input('cust_id');
        $data['mobile'] = $mobile = $api -> input('mobile');
        $data['pro_cname'] = $pro_cname = $api -> input('pro_cname');
        $data['comp'] = $comp = $api -> input('comp');
        $data['project_add'] = $project_add = $api -> input('project_add');
        $data['sales_add'] = $sales_add = $api -> input('sales_add');
        $data['home_number'] = $home_number = $api -> input('home_number');
        $data['main_unit'] = $main_unit = $api -> input('main_unit');
        $data['opening_time'] = $opening_time = strtotime($api -> input('opening_time'));
        $data['developers'] = $developers = $api -> input('developers');
        $data['property_type'] = $property_type = $api -> input('property_type');
        $data['archit_type'] = $archit_type = $api -> input('archit_type');
        $data['situation'] = $situation = $api -> input('situation');
        $data['created_at'] = time();
        if(!$pro_cname || !$comp || !$project_add || !$sales_add || !$home_number || !$main_unit ||
            !$opening_time || !$developers || !$property_type || !$archit_type || !$situation || !$mobile || !$cust_id
        ){
            return ([
                'code' => 103,
                'message' => '参数不全',
            ]);
        }
        $info = Project::get_pro_name($pro_cname);
        if($info){
            return ([
                'code' => 104,
                'message' => '项目名称已存在',
            ]);
        }
        $iner = Project::get_d_mobile($mobile);
        if($iner){
            return ([
                'code' => 107,
                'message' => '手机号已注册过项目',
            ]);
        }
        $data = Project::insert_d_project($data);
        if($data){
            return ([
                'code' => config('api.V1_0.xiao.project.project_success_code'),
                'message' => config('api.V1_0.xiao.project.project_success_msg'),
            ]);
        } else {
            return response()->json([
                'code' => config('api.V1_0.xiao.project.project_error_code'),
                'message' => config('api.V1_0.xiao.project.project_error_msg'),
            ]);
        }
    }
    /**
     * @api {post} api/1.0.0/regdetails 项目详情
     * @apiName regdetails
     * @apiGroup GroupNamejh
     *
     * @apiParam (参数) {int} mobile 用户手机号
     *
     * @apiSampleRequest http://192.168.1.220/fang/public/api/1.0.0/regdetails
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
    public function regdetails(Request $api)
    {
        header('Access-Control-Allow-Origin:*');
        $mobile = $api -> input('mobile');
        if(!$mobile){
            return ([
                'code' => config('api.V1_0.xiao.project.project_parameter_code'),
                'message' => config('api.V1_0.xiao.project.project_parameter_msg'),
            ]);
        }
        $data = Project::get_d_pro($mobile);
        if($data){
            return [
                'code' => config('api.V1_0.xiao.project.project_success_code'),
                'msg'  => config('api.V1_0.xiao.project.project_success_msg'),
                'result' => $data,
            ];
        }else{
            return [
                'code' => config('api.V1_0.xiao.project.project_error_code') ,
                'msg'  => config('api.V1_0.xiao.project.project_error_msg'),
            ];
        }
    }
    /**
     * @api {post} api/1.0.0/regedit 项目信息修改
     * @apiName regedit
     * @apiGroup GroupNamejh
     *
     * @apiParam (参数) {int} mobile 用户手机号
     * @apiParam (参数) {string} [pro_cname] 项目名称
     * @apiParam (参数) {string} [comp] 所属公司
     * @apiParam (参数) {string} [project_add] 项目地址
     * @apiParam (参数) {string} [sales_add] 售楼地址
     * @apiParam (参数) {int} [home_number] 总户数
     * @apiParam (参数) {int} [main_unit] 主力户型
     * @apiParam (参数) {int} [opening_time] 开盘时间
     * @apiParam (参数) {string} [developers] 开发商
     * @apiParam (参数) {int} [property_type] 物业类型
     * @apiParam (参数) {int} [archit_type] 建筑类型
     * @apiParam (参数) {int} [situation] 建筑情况
     *
     *
     * @apiSampleRequest http://192.168.1.220/fang/public/api/1.0.0/regedit
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
    public function regedit(Request $api)
    {
        header('Access-Control-Allow-Origin:*');
        $mobile = $api -> input('mobile');
        $data['pro_cname'] = $pro_cname = $api -> input('pro_cname');
        $data['comp'] = $comp = $api -> input('comp');
        $data['project_add'] = $project_add = $api -> input('project_add');
        $data['sales_add'] = $sales_add = $api -> input('sales_add');
        $data['home_number'] = $home_number = $api -> input('home_number');
        $data['main_unit'] = $main_unit = $api -> input('main_unit');
        $data['opening_time'] = $opening_time = strtotime($api -> input('opening_time'));
        $data['developers'] = $developers = $api -> input('developers');
        $data['property_type'] = $property_type = $api -> input('property_type');
        $data['archit_type'] = $archit_type = $api -> input('archit_type');
        $data['situation'] = $situation = $api -> input('situation');
        $data['updated_at'] = time();
        if(!$mobile){
            return response()->json([
                'code' => config('api.V1_0.xiao.project.project_parameter_code'),
                'message' => config('api.V1_0.xiao.project.project_parameter_msg'),
            ]);
        }
        $data = Project::edit_d_pro($mobile,$data);
        if($data){
            return [
                'code' => config('api.V1_0.xiao.project.project_success_code'),
                'message'  => config('api.V1_0.xiao.project.project_success_msg'),
            ];
        }else{
            return [
                'code' => config('api.V1_0.xiao.project.project_error_code') ,
                'message'  => config('api.V1_0.xiao.project.project_error_msg'),
            ];
        }
    }
}
