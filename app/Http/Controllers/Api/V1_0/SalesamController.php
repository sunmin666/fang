<?php

namespace App\Http\Controllers\Api\V1_0;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Api\V1_0\Salesam;

class SalesamController extends Controller
{
    /**
     * @apiDefine GroupNamehhc 销售排行管理
     */


    /**
     * @api {get} api/1.0.0/salesampay 已售金额总量排行
     * @apiName salesampay
     * @apiGroup GroupNamehhc
     *
     *
     *
     * @apiSampleRequest http://192.168.1.220/fang/public/api/1.0.0/salesampay
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
    public function salesampay()
    {
        $data = Salesam::get_salesam_hous();
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
