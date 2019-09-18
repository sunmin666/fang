<?php

namespace App\Http\Controllers\Api\V1_0;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Api\V1_0\Buyinfo;

class BuyinfoController extends Controller
{
    /**
     * @apiDefine GroupNameg 认购签约
     */

    /**
     * @api {post} api/1.0.0/buyinfo 认购管理
     * @apiName buyinfo
     * @apiGroup GroupNameg
     *
     * @apiParam (参数) {int} sponsor 职业顾问id
     *
     * @apiSampleRequest http://192.168.1.13/fang/public/api/1.0.0/buyinfo
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
    public function buyinfo(Request $api)
    {

        $sponsor = $api->input('sponsor');
       // return $sponsor;
        if(!$sponsor){
            return response()->json( [
                'code' => '102' ,
                'message'  => '参数不全',
            ] );
        }

        $data = Buyinfo::get_d_sponsor($sponsor);

        return response()->json( [
            'code' => '101' ,
            'message'  => '请求成功',
            'result'   => $data
        ] );
    }


}
