<?php

namespace App\Http\Controllers\Api\V1_0;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Api\V1_0\Paylog;

class PaylogController extends Controller
{
    /**
     * @apiDefine GroupNameb 缴费记录管理
     */

    /**
     * @api {post} api/1.0.0/paylog 缴费记录查找
     * @apiName paylog
     * @apiGroup GroupNameb
     *
     * @apiParam (参数) {int} hous_id 职业顾问id
     * @apiParam (参数) {string} search 客户姓名或手机号
     * @apiParam (参数) {int} page 页码
     *
     * @apiSampleRequest http://192.168.1.220/fang/public/api/1.0.0/paylog
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
    public function paylog(Request $api)
    {
        $hous_id = $api -> input('hous_id');
        $search = $api->input('search');
        $page = $api->input('page');
        if (!$hous_id) {
            return response()->json([
                'code' => '102',
                'message' => '参数不全',
            ]);
        }
        $data = Paylog::get_paulog_cust($hous_id,$page,$search);
        foreach($data as $k =>$v){
            if($v['homeid']  == null){
                unset($data[$k]);
            }
        }
        $data=array_values($data);
        return response()->json([
            'code' => '101',
            'message' => '请求成功',
            'result' => $data
        ]);

    }
    /**
     * @api {post} api/1.0.0/paydetails 缴费记录详情
     * @apiName paydetails
     * @apiGroup GroupNameb
     *
     * @apiParam (参数) {int} subscription_num 认购编号
     *
     * @apiSampleRequest http://192.168.1.220/fang/public/api/1.0.0/paydetails
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
    public function paydetails(Request $api)
    {
        $subscription_num = $api -> input('subscription_num');
        if (!$subscription_num) {
            return response()->json([
                'code' => '102',
                'message' => '参数不全',
            ]);
        }
        $data=Paylog::get_pay_home($subscription_num);
        if($data -> pay_type == 0){
            $data ->total_price =Paylog::get_total_price($subscription_num);
        }else{
            $data ->month_pay =Paylog::get_month_pay($subscription_num);
        }
            if ($data) {
                return response()->json([
                    'code' => '101',
                    'message' => '请求成功',
                    'result' => $data
                ]);
            } else {
                return response()->json([
                    'code' => '103',
                    'message' => '内容为空'
                ]);
            }
        }


}
