<?php

namespace App\Http\Controllers\Api\V1_0\xiao;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Api\V1_0\xiao\Remind;

class RemindController extends Controller
{
    /**
     * @apiDefine GroupNamsejuei 小后台预约提醒Api
     */
    /**
     * @api {post} api/1.0.0/mobilename 通过手机号查客户
     * @apiName mobilename
     * @apiGroup GroupNamsejuei
     *
     * @apiParam (参数) {int} mobile 客户手机号
     *
     * @apiSampleRequest http://192.168.1.220/fang/public/api/1.0.0/mobilename
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
    public function mobilename(Request $api)
    {
        $mobile = $api -> input('mobile');
        if(!$mobile){
            return [
                'code' => '103',
                'msg' => '参数不全',
            ];
        }
        $data = Remind::get_d_cust($mobile);
        if($data){
            return [
                'code' => 101,
                'msg' => '请求成功',
                "result"=>$data,
            ];
        }else{
            return [
                'code' => 101,
                'msg' => '请求失败',
            ];
        }
    }
    /**
     * @api {post} api/1.0.0/reminadd 提醒添加
     * @apiName reminadd
     * @apiGroup GroupNamsejuei
     *
     * @apiParam (参数) {int} hous_id 置业顾问id
     * @apiParam (参数) {int} modular 相关业务
     * @apiParam (参数) {string} content 提醒内容
     * @apiParam (参数) {string} remind_time 提醒到期时间
     * @apiParam (参数) {int} cust_id 用户id
     *
     * @apiSampleRequest http://192.168.1.220/fang/public/api/1.0.0/reminadd
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
    public function reminadd(Request $api)
    {
        $data['hous_id'] = $hous_id = $api -> input('hous_id');
        $data['modular'] = $modular = $api -> input('modular');
        $data['content'] = $content = $api -> input('content');
        $data['remind_time'] = $remind_time = strtotime($api -> input('remind_time'));
        $data['cust_id'] = $cust_id = $api -> input('cust_id');
        $data['created_at'] = time();
        if(!$hous_id || !$modular || !$content || !$remind_time || !$cust_id){
            return [
                'code' => '103',
                'msg' => '参数不全',
            ];
        }
        $data = Remind::add_d_remind($data);
        if($data){
            return [
                'code' => '101',
                'msg' => '请求成功',
            ];
        }else{
            return [
                'code' => '102',
                'msg' => '请求失败',
            ];
        }
    }
    /**
     * @api {post} api/1.0.0/remshow 提醒列表
     * @apiName remshow
     * @apiGroup GroupNamsejuei
     *
     * @apiParam (参数) {int} page 页码
     * @apiParam (参数) {int} [hous_id] 置业顾问筛选
     * @apiParam (参数) {int} [modular] 业务筛选
     *
     * @apiSampleRequest http://192.168.1.220/fang/public/api/1.0.0/remshow
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
    public function remshow(Request $api)
    {
        $page = $api -> input('page');
        $hous_id = $api -> input('hous_id');
        $modular = $api -> input('modular');
        $data['remshow'] = Remind::get_all_rem($page,$hous_id,$modular);
        $data['count'] = Remind::get_all_count($hous_id,$modular);
        $data['zongye'] = ceil($data['count']/10);
        $data['remshow']=array_values( $data['remshow']);
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
     * @api {post} api/1.0.0/remdeist 提醒详情
     * @apiName remdeist
     * @apiGroup GroupNamsejuei
     *
     * @apiParam (参数) {int} remi_id 提醒id
     *
     * @apiSampleRequest http://192.168.1.220/fang/public/api/1.0.0/remdeist
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
    public function remdeist(Request $api)
    {
        $remi_id = $api -> input('remi_id');
        if(!$remi_id){
            return [
                'code' => '103',
                'msg' => '参数不全',
            ];
        }
        $data = Remind::get_d_remd($remi_id);
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
     * @api {post} api/1.0.0/remdedit 提醒修改
     * @apiName remdedit
     * @apiGroup GroupNamsejuei
     *
     * @apiParam (参数) {int} remi_id 提醒id
     * @apiParam (参数) {int} modular 相关业务
     * @apiParam (参数) {string} content 提醒内容
     * @apiParam (参数) {string} remind_time 提醒到期时间
     *
     * @apiSampleRequest http://192.168.1.220/fang/public/api/1.0.0/remdedit
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
    public function remdedit(Request $api)
    {
        $data['modular'] = $modular = $api -> input('modular');
        $data['content'] = $content = $api -> input('content');
        $data['remind_time'] = $remind_time = strtotime($api -> input('remind_time'));
        $data['updated_at'] = time();
        $remi_id = $api -> input('remi_id');
        if(!$remi_id){
            return [
                'code' => '103',
                'msg' => '参数不全',
            ];
        }
        $data = Remind::edit_d_rem($remi_id,$data);
        if($data){
            return [
                'code' => '101',
                'msg' => '请求成功',
            ];
        }else{
            return [
                'code' => '102',
                'msg' => '请求失败',
            ];
        }
    }
    /**
     * @api {post} api/1.0.0/remddel 提醒删除
     * @apiName remddel
     * @apiGroup GroupNamsejuei
     *
     * @apiParam (参数) {int} remi_id 提醒id
     *
     * @apiSampleRequest http://192.168.1.220/fang/public/api/1.0.0/remddel
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
    public function remddel(Request $api)
    {
        $remi_id = $api -> input('remi_id');
        if(!$remi_id){
            return [
                'code' => '103',
                'msg' => '参数不全',
            ];
        }
        $data = Remind::del_d_rem($remi_id);
        if($data){
            return [
                'code' => '101',
                'msg' => '请求成功',
            ];
        }else{
            return [
                'code' => '102',
                'msg' => '请求失败',
            ];
        }
    }
    /**
     * @api {post} api/1.0.0/remdalldel 提醒全选删除
     * @apiName remdalldel
     * @apiGroup GroupNamsejuei
     *
     * @apiParam (参数) {int} remi_id 提醒id
     *
     * @apiSampleRequest http://192.168.1.220/fang/public/api/1.0.0/remdalldel
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
    public function remdalldel(Request $api)
    {
        $remi_id = $api -> input('remi_id');
        $pieceses=trim($remi_id,',');
        $pieces = explode(",", $pieceses);
        if(!$pieces){
            return [
                'code' => '103',
                'msg' => '参数不全',
            ];
        }
        $data = Remind::del_all_rem($pieces);
        if($data){
            return [
                'code' => '101',
                'msg' => '请求成功',
            ];
        }else{
            return [
                'code' => '102',
                'msg' => '请求失败',
            ];
        }
    }
}
