<?php

namespace App\Http\Controllers\Api\V1_0;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Api\V1_0\Coowner;

class CoownerController extends Controller
{
    /**
     * @apiDefine GroupNamef 房屋共有人管理
     */

    /**
     * @api {post} api/1.0.0/coowner 房屋共有人查找
     * @apiName coowner
     * @apiGroup GroupNamef
     *
     * @apiParam (参数) {int} cust_id 用户id
     *
     * @apiSampleRequest http://192.168.1.13/fang/public/api/1.0.0/coowner
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
    public function coowner(Request $api)
    {

        $cust_id = $api->input('cust_id');
       // return $cust_id;
        if(!$cust_id){
            return response()->json( [
                'code' => '102' ,
                'message'  => '参数不全',
            ] );
        }

        $data = Coowner::get_d_cust($cust_id);

        return response()->json( [
            'code' => '101' ,
            'message'  => '请求成功',
            'result'   => $data
        ] );
    }
}
