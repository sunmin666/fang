<?php

namespace App\Http\Controllers\Api\V1_0;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Api\V1_0\Purchase;

class PurchaseController extends Controller
{
    /**
     * @apiDefine GroupNamea 置业计划方案管理
     */

    /**
     * @api {post} api/1.0.0/purchase 客户置业计划方案查找
     * @apiName purchase
     * @apiGroup GroupNamea
     *
     * @apiParam (参数) {int} hous_id 职业顾问id
     * @apiParam (参数) {int} page 页码
     *
     * @apiSampleRequest http://192.168.1.220/fang/public/api/1.0.0/purchase
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
        $hous_id = $api->input('hous_id');
        $page = $api->input('page');
        if (!$hous_id) {
            return response()->json([
                'code' => '102',
                'message' => '参数不全',
            ]);
        }
        $data = Purchase::get_purch_hous($hous_id, $page);

        foreach ($data as $key => $value) {
            $value->home = Purchase::get_purch_home($value->cust_id);
            if ($value->sex == 1) {
                $value->sex = '男';
            } else {
                $value->sex = '女';
            }
            if ($value->type == 0) {
                $value->type = '一次性付款';
            } else {
                $value->type = '按揭付款';
            }
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

    /**
     * @api {post} api/1.0.0/purinsert 客户置业计划方案添加
     * @apiName purinsertv
     * @apiGroup GroupNamea
     *
     * @apiParam (参数) {int} cust_id 客户id
     * @apiParam (参数) {string} type 付款方案
     * @apiParam (参数) {int} homeid 房源id
     * @apiParam (参数) {string} programme 方案
     * @apiParam (参数) {string} once_total 一次性付款总价
     * @apiParam (参数) {string} years 按揭时年限
     * @apiParam (参数) {string} month_price 按揭月供
     * @apiParam (参数) {string} month_total 按揭总价
     * @apiSampleRequest http://192.168.1.220/fang/public/api/1.0.0/purinsert
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
    public function purinsert(Request $api)
    {

        $data['type'] = $api->input('type');
        if ($data['type'] == 0) {
            $data['cust_id'] = $api->input('cust_id');
            $data['once_total'] = $api->input('once_total');
            $data['homeid'] = $api->input('homeid');
            $data['programme'] = $api->input('programme');
            $data['created_at'] = time();
            if (!$data['cust_id'] || $data['type'] == '' || $data['once_total'] == '') {
                return response()->json([
                    'code' => '102',
                    'message' => '参数不全',
                ]);
            }
            $datas = Purchase::inset_d_pur($data);
            if ($datas) {
                return response()->json([
                    'code' => '101',
                    'message' => '请求成功',
                ]);
            } else {
                return response()->json([
                    'code' => '103',
                    'message' => '请求失败'
                ]);
            }
        }
        if ($data['type'] == 1) {
            $data['cust_id'] = $api->input('cust_id');
            $data['years'] = $api->input('years');
            $data['month_price'] = $api->input('month_price');
            $data['month_total'] = $api->input('month_total');
            $data['homeid'] = $api->input('homeid');
            $data['programme'] = $api->input('programme');
            $data['created_at'] = time();
            if (!$data['cust_id'] || $data['type'] == ''  || $data['years'] == '' || $data['month_price'] == '' || $data['month_total'] == '') {
                return response()->json([
                    'code' => '102',
                    'message' => '参数不全',
                ]);
            }
            $datac = Purchase::inset_d_pur($data);
            if ($datac) {
                return response()->json([
                    'code' => '101',
                    'message' => '请求成功',
                ]);
            } else {
                return response()->json([
                    'code' => '103',
                    'message' => '请求失败'
                ]);
            }
        }
    }

    /**
     * @api {post} api/1.0.0/purdetails 客户置业计划方案详情
     * @apiName purdetails
     * @apiGroup GroupNamea
     *
     * @apiParam (参数) {int} cust_id 客户id
     * @apiSampleRequest http://192.168.1.220/fang/public/api/1.0.0/purdetails
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
    public function purdetails(Request $api)
    {
        $cust_id = $api -> input('cust_id');
        if (!$cust_id) {
            return response()->json([
                'code' => '102',
                'message' => '参数不全',
            ]);
        }
        $data = Purchase::get_purch_cust($cust_id);
        if ($data->sex == 1) {
            $data->sex = '男';
        } else {
            $data->sex = '女';
        }
        $data -> home = Purchase::get_pur_home($cust_id);
        return response()->json([
            'code' => '101',
            'message' => '请求成功',
            'result' => $data
        ]);
    }
}
