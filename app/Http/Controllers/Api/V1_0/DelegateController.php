<?php

namespace App\Http\Controllers\Api\V1_0;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Api\V1_0\Delegate;

class DelegateController extends Controller
{
    /**
     * @apiDefine GroupNamed 派遣管理
     */

    /**
     * @api {post} api/1.0.0/delegate 派遣查找
     * @apiName delegate
     * @apiGroup GroupNamed
     *
     * @apiParam (参数) {int} hous_id 职业顾问id
     *
     * @apiSampleRequest http://192.168.1.13/fang/public/api/1.0.0/delegate
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
    public function delegate(Request $api)
    {

        $hous_id = $api->input('hous_id');

        if(!$hous_id){
            return response()->json( [
                'code' => '102' ,
                'message'  => '参数不全',
            ] );
        }

        $data = Delegate::get_d_hous($hous_id);
        foreach($data as $k => $v){
            $v-> hous_id = $v -> name;
            if($v ->updated_at == null){
                $v ->updated_at = "";
            }
        }
        return response()->json( [
            'code' => '101' ,
            'message'  => '请求成功',
            'result'   => $data
        ] );
    }

    /**
     * @api {post} api/1.0.0/deleview 派遣查找单条
     * @apiName deleview
     * @apiGroup GroupNamed
     *
     * @apiParam (参数) {int} gate_id 派遣id
     *
     * @apiSampleRequest http://192.168.1.13/fang/public/api/1.0.0/deleview
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
    public function deleview(Request $api)
    {

        $gate_id = $api->input('gate_id');

        if(!$gate_id){
            return response()->json( [
                'code' => '102' ,
                'message'  => '参数不全',
            ] );
        }

        $data = Delegate::get_d_gate($gate_id);
        if($data){
            $data-> hous_id = $data -> name;
            if($data ->updated_at == null){
                $data ->updated_at = "";
            }

            return response()->json( [
                'code' => '101' ,
                'message'  => '请求成功',
                'result'   => $data
            ] );
        }else{
            return response()->json( [
                'code' => '103' ,
                'message'  => '内容为空'
            ] );
        }


    }
}
