<?php

namespace App\Http\Controllers\Api\V1_0;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Api\V1_0\Konwledge;

class KonwledgeController extends Controller
{

    /**
     * @apiDefine GroupNamec 营销知识库管理
     */


    /**
     * @api {get} api/1.0.0/konwledge 营销知识查找
     * @apiName konwledge
     * @apiGroup GroupNamec
     *
     *
     * @apiSampleRequest http://192.168.1.218/fang/public/api/1.0.0/konwledge
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
    public function konwledge()
    {
        $data = Konwledge::get_d_konwledge();

        return response()->json( [
            'code' => '101' ,
            'message'  => '请求成功',
            'result'   => $data
        ] );
    }
}
