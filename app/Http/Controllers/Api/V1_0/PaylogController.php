<?php

namespace App\Http\Controllers\Api\V1_0;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Api\V1_0\Paylog;

class PaylogController extends Controller
{
    /**
     * @apiDefine GroupNameb 缴费记录管理
     */

    /**
     * @api {post} api/1.0.0/paylog 缴费记录查找
     * @apiName paylog
     * @apiGroup GroupNameb
     *
     * @apiParam (参数) {int} cust_id 用户id
     *
     * @apiSampleRequest http://192.168.1.218/fang/public/api/1.0.0/paylog
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
    public function paylog(Request $api)
    {

        $cust_id = $api->input('cust_id');

        if(!$cust_id){
            return response()->json( [
                'code' => '102' ,
                'message'  => '参数不全',
            ] );
        }

        $data = Paylog::get_d_cust($cust_id);
        if($data){
            foreach($data as $k =>$v){
                $v -> cust_id = $v ->realname;
                if($v -> type == 1){
                    $v ->type='定金';
                }elseif($v -> type == 2){
                    $v ->type='一次性';
                }else{
                    $v ->type='按揭';
                }
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
    /**
     * @apiDefine GroupNameb 缴费记录管理
     */

    /**
     * @api {post} api/1.0.0/payview 缴费记录查找
     * @apiName payview
     * @apiGroup GroupNameb
     *
     * @apiParam (参数) {int} payl_id 缴费记录id
     *
     * @apiSampleRequest http://192.168.1.218/fang/public/api/1.0.0/payview
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
    public function payview(Request $api)
    {
        $payl_id = $api -> input('payl_id');
        if(!$payl_id){
            return response()->json( [
                'code' => '102' ,
                'message'  => '参数不全',
            ] );
        }
        $data = Paylog::get_d_payl($payl_id);
    }
}
