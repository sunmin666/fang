<?php

namespace App\Http\Controllers\Api\V1_0;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Api\V1_0\Trackinfo;

class TrackinfoController extends Controller
{
    /**
     * @apiDefine GroupName 客户跟踪管理
     */

    /**
     * @api {post} api/1.0.0/trackinfo 客户跟踪查找
     * @apiName delegate
     * @apiGroup GroupName
     *
     * @apiParam (参数) {int} hous_id 职业顾问id
     *
     * @apiSampleRequest http://192.168.1.218/fang/public/api/1.0.0/trackinfo
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
    public function trackinfo(Request $api)
    {

        $hous_id = $api->input('hous_id');

        if(!$hous_id){
            return response()->json( [
                'code' => '102' ,
                'message'  => '参数不全',
            ] );
        }

        $data = Trackinfo::get_d_hous($hous_id);

        return response()->json( [
            'code' => '101' ,
            'message'  => '请求成功',
            'result'   => $data
        ] );
    }
}
