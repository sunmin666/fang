<?php

namespace App\Http\Controllers\Api\V1_0\xiao;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Api\V1_0\xiao\Fieldinfo;

class FieldController extends Controller
{
    /**
     * @apiDefine GroupNamelfj 小后台字段管理Api
     */

    /**
     * @api {get} api/1.0.0/fieldinfo 获取所有字段信息
     * @apiName fieldinfo
     * @apiGroup GroupNamelfj
     *
     *
     * @apiSampleRequest http://192.168.1.220/fang/public/api/1.0.0/fieldinfo
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
    public function fieldinfo()
    {
        header( 'Access-Control-Allow-Origin:*' );
        $data = Fieldinfo::get_all_field();

        if ($data) {
            return response()->json([
                'code' => config('api.V1_0.xiao.fieldinfo.field_success_code'),
                'message' => config('api.V1_0.xiao.fieldinfo.field_success_msg'),
                'result' => $data,
            ]);
        } else {
            return response()->json([
                'code' => config('api.V1_0.xiao.fieldinfo.field_error_code'),
                'message' => config('api.V1_0.xiao.fieldinfo.field_error_code')
            ]);
        }
    }

}
