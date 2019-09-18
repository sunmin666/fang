<?php

namespace App\Http\Controllers\Api\V1_0;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Api\V1_0\Purchase;

class PurchaseController extends Controller
{
    /**
     * @apiDefine GroupNamea 计划方案管理
     */

    /**
     * @api {post} api/1.0.0/purchase 计划方案查找
     * @apiName purchase
     * @apiGroup GroupNamea
     *
     * @apiParam (参数) {int} cust_id 用户id
     *
     * @apiSampleRequest http://192.168.1.13/fang/public/api/1.0.0/purchase
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
    public function purchase(Request $api)
    {

        $cust_id = $api->input('cust_id');

        if(!$cust_id){
            return response()->json( [
                'code' => '102' ,
                'message'  => '参数不全',
            ] );
        }

        $data = Purchase::get_d_cust($cust_id);
        foreach($data as $k =>$v){
            $v->cust_id = $v->realname;
            if($v -> type == 0){
                $v -> type = '一次性付款';
                $v ->years =" ";
                $v ->month_price =" ";
                $v ->month_total =" ";
            }else{
                $v -> type = '按揭付款';
                $v -> once_total = " ";
            }
        }
        if($data) {
            return response()->json([
                'code' => '101',
                'message' => '请求成功',
                'result' => $data
            ]);
        }else{
            return response()->json( [
                'code' => '103' ,
                'message'  => '内容为空'
            ] );
        }

    }

    /**
     * @api {post} api/1.0.0/purcview 计划方案查找单条
     * @apiName purcview
     * @apiGroup GroupNamea
     *
     * @apiParam (参数) {int} planid 计划方案id
     *
     * @apiSampleRequest http://192.168.1.13/fang/public/api/1.0.0/purcview
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
    public function purcview(Request $api)
    {

        $planid = $api->input('planid');

        if(!$planid){
            return response()->json( [
                'code' => '102' ,
                'message'  => '参数不全',
            ] );
        }

        $data = Purchase::get_d_planid($planid);
        if($data) {
            $data->cust_id = $data->realname;
            if($data -> type == 0){
                $data -> type = '一次性付款';
                $data ->years =" ";
                $data ->month_price =" ";
                $data ->month_total =" ";
            }else{
                $data -> type = '按揭付款';
                $data -> once_total = " ";
            }
            return response()->json([
                'code' => '101',
                'message' => '请求成功',
                'result' => $data
            ]);
        }else{
            return response()->json( [
                'code' => '103' ,
                'message'  => '内容为空'
            ] );
        }


    }
}
