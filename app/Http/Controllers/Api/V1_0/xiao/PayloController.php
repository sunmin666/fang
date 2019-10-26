<?php

namespace App\Http\Controllers\Api\V1_0\xiao;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Api\V1_0\xiao\Paylo;

class PayloController extends Controller
{
    /**
     * @apiDefine GroupNamseopds 小后台缴费Api
     */

    /**
     * @api {post} api/1.0.0/paybuy 查看客户下的认购编号
     * @apiName paybuy
     * @apiGroup GroupNamseopds
     *
     * @apiParam (参数) {int} cust_id 客户id
     *
     * @apiSampleRequest http://192.168.1.220/fang/public/api/1.0.0/paybuy
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
    public function paybuy(Request $api)
    {
        $cust_id = $api -> input('cust_id');
        if(!$cust_id){
            return[
                'code' => 103,
                'msg' => '参数不全',
            ];
        }
        $data = Paylo::get_all_buy($cust_id);
        if($data){
            return[
                'code' => 101,
                'msg' => '请求成功',
                "result"=> $data,
            ];
        }else{
            return[
                'code' => 102,
                'msg' => '请求失败',
            ];
        }
    }
    /**
     * @api {post} api/1.0.0/payadd 缴费添加
     * @apiName payadd
     * @apiGroup GroupNamseopds
     *
     * @apiParam (参数) {int} cust_id 客户id
     * @apiParam (参数) {int} type 类型 1表示定金 2表示一次性 3按揭
     * @apiParam (参数) {int} subscription_num 认购编号
     * @apiParam (参数) {int} money 缴费金额
     * @apiParam (参数) {string} remarks 缴费备注
     *
     * @apiSampleRequest http://192.168.1.220/fang/public/api/1.0.0/payadd
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
    public function payadd(Request $api)
    {
        $data['cust_id'] = $cust_id = $api -> input('cust_id');
        $data['type'] = $type = $api -> input('type');
        $data['subscription_num'] = $subscription_num = $api -> input('subscription_num');
        $data['money'] = $money = $api -> input('money');
        $data['remarks'] = $remarks = $api -> input('remarks');
        $data['created_at'] = time();
        if(!$cust_id || !$type ||!$subscription_num || !$money ||!$remarks){
            return [
                'code' => '103',
                'msg' => '参数不全',
            ];
        }
        $data = Paylo::add_d_pay($data);
        if($data){
            return [
                'code' => '101',
                'msg' => '请求成功',
            ];
        }else{
            return [
                'code' => '101',
                'msg' => '请求失败',
            ];
        }
    }
    /**
     * @api {post} api/1.0.0/payshow 缴费列表
     * @apiName payshow
     * @apiGroup GroupNamseopds
     *
     * @apiParam (参数) {int} page 页码
     *
     * @apiSampleRequest http://192.168.1.220/fang/public/api/1.0.0/payshow
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
    public function payshow(Request $api)
    {
        $page = $api -> input('page');
        $data['payshow'] = Paylo::get_all_pay($page);
        $data['count'] = Paylo::get_all_count();
        $data['zongye'] = ceil($data['count']/10);
        $data['payshow']=array_values( $data['payshow']);
        if($data){
            return [
                'code' => '101',
                'msg' => '请求成功',
                "result"=> $data,
            ];
        }else{
            return [
                'code' => '101',
                'msg' => '请求失败',
            ];
        }
    }
    /**
     * @api {post} api/1.0.0/paydesit 缴费详情
     * @apiName paydesit
     * @apiGroup GroupNamseopds
     *
     * @apiParam (参数) {int} payl_id 缴费id
     *
     * @apiSampleRequest http://192.168.1.220/fang/public/api/1.0.0/paydesit
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
    public function paydesit(Request $api)
    {
        $payl_id = $api -> input('payl_id');
        if(!$payl_id){
            return [
                'code' => '103',
                'msg' => '参数不全',
            ];
        }
        $data = Paylo::get_d_pay($payl_id);
        if($data){
            return [
                'code' => '101',
                'msg' => '请求成功',
                "result"=> $data,
            ];
        }else{
            return [
                'code' => '101',
                'msg' => '请求失败',
            ];
        }
    }
    /**
     * @api {post} api/1.0.0/payedit 缴费修改
     * @apiName payedit
     * @apiGroup GroupNamseopds
     *
     * @apiParam (参数) {int} payl_id 缴费id
     * @apiParam (参数) {int} money 缴费金额
     * @apiParam (参数) {string} remarks 缴费备注
     *
     * @apiSampleRequest http://192.168.1.220/fang/public/api/1.0.0/payedit
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
    public function payedit(Request $api)
    {
        $data['money'] = $money = $api -> input('money');
        $data['remarks'] = $remarks = $api -> input('remarks');
        $payl_id = $api -> input('payl_id');
        if(!$payl_id){
            return [
                'code' => '103',
                'msg' => '参数不全',
            ];
        }
        $data = Paylo::edit_d_pay($payl_id,$data);
        if($data){
            return [
                'code' => '101',
                'msg' => '请求成功',
            ];
        }else{
            return [
                'code' => '101',
                'msg' => '请求失败',
            ];
        }
    }
    /**
     * @api {post} api/1.0.0/paydel 缴费删除
     * @apiName paydel
     * @apiGroup GroupNamseopds
     *
     * @apiParam (参数) {int} payl_id 缴费id
     *
     * @apiSampleRequest http://192.168.1.220/fang/public/api/1.0.0/paydel
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
    public function paydel(Request $api)
    {
        $payl_id = $api -> input('payl_id');
        if(!$payl_id){
            return [
                'code' => '103',
                'msg' => '参数不全',
            ];
        }
        $data = Paylo::del_d_pay($payl_id);
        if($data){
            return [
                'code' => '101',
                'msg' => '请求成功',
            ];
        }else{
            return [
                'code' => '101',
                'msg' => '请求失败',
            ];
        }
    }
    /**
     * @api {post} api/1.0.0/payalldel 缴费全选删除
     * @apiName payalldel
     * @apiGroup GroupNamseopds
     *
     * @apiParam (参数) {int} payl_id 缴费id
     *
     * @apiSampleRequest http://192.168.1.220/fang/public/api/1.0.0/payalldel
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
    public function payalldel(Request $api)
    {
        $payl_id = $api -> input('payl_id');
        $pieceses=trim($payl_id,',');
        $pieces = explode(",", $pieceses);
        if(!$pieces){
            return [
                'code' => '103',
                'msg' => '参数不全',
            ];
        }
        $data = Paylo::del_all_pay($pieces);
        if($data){
            return [
                'code' => '101',
                'msg' => '请求成功',
            ];
        }else{
            return [
                'code' => '101',
                'msg' => '请求失败',
            ];
        }
    }
}
