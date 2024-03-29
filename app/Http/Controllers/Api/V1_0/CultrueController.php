<?php

namespace App\Http\Controllers\Api\V1_0;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Api\V1_0\Cultrue;

class CultrueController extends Controller
{
    /**
     * @apiDefine GroupNameh 企业文化管理
     */


    /**
     * @api {get} api/1.0.0/cultrue 企业文化查找
     * @apiName cultrue
     * @apiGroup GroupNameh
     *
     *
     * @apiSampleRequest http://192.168.1.220/fang/public/api/1.0.0/cultrue
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
    public function cultrue()
    {
        $data = Cultrue::get_d_cultrue();
        foreach ($data as $k => $v){
            if($v -> sort == null){
                $v -> sort = "";
            }
            $v -> imgpath = explode('/',$v -> imgpath);
            $v -> imgpath = array_filter($v -> imgpath);
            if($v -> updated_at == null){
                $v -> updated_at ="";
            }
        }
        return response()->json( [
            'code' => '101' ,
            'message'  => '请求成功',
            'result'   => $data
        ] );
    }
}
