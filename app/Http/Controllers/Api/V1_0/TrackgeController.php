<?php

namespace App\Http\Controllers\Api\V1_0;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Api\V1_0\Trackge;

class TrackgeController extends Controller
{
    /**
     * @apiDefine GroupNamejl 客户跟踪管理
     */

    /**
     * @api {post} api/1.0.0/trackge 客户跟踪查找
     * @apiName trackge
     * @apiGroup GroupNamejl
     *
     * @apiParam (参数) {int} hous_id 职业顾问id
     * @apiParam (参数) {int} page 页码
     *
     * @apiSampleRequest http://192.168.1.220/fang/public/api/1.0.0/trackge
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
    public function trackge(Request $api)
    {
        $hous_id = $api->input('hous_id');
        $page = $api->input('page');

        if (!$hous_id) {
            return response()->json([
                'code' => '102',
                'message' => '参数不全',
            ]);
        }
        $data = Trackge::get_trackge_hous($hous_id, $page);

        foreach($data as $key => $value){
            $data[$key]['count'] = $c = Trackge::get_t_count($value['cust_id']);
            if ($c == 0) {
                unset($data[$key]);
            } else {
                $a = Trackge::get_t_time($value['cust_id']);
                $data[$key]['time'] = $a->track_time;
                if ($value['sex'] == 1) {
                    $data[$key]['sex'] = "男";
                } else {
                    $data[$key]['sex'] = "女";
                }
           }
        }
        $data=array_values($data);
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
     * @api {post} api/1.0.0/trackgecust 获取客户跟踪记录
     * @apiName trackgecust
     * @apiGroup GroupNamejl
     *
     * @apiParam (参数) {int} cust_id 客户id
     * @apiParam (参数) {int} page 页码
     *
     * @apiSampleRequest http://192.168.1.220/fang/public/api/1.0.0/trackgecust
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
    public function trackgecust(Request $api)
    {
        $cust_id = $api->input('cust_id');
        $page = $api->input('page');
        if (!$cust_id) {
            return response()->json([
                'code' => '102',
                'message' => '参数不全',
            ]);
        }
        $data = Trackge::get_all_cust($cust_id);

        $data->count = $c = Trackge::get_t_count($data->cust_id);
        $e=Trackge::get_t_time($data->cust_id);
        $data->time = $e->track_time;

        $data->trackinfo = Trackge::get_trakge($cust_id, $page);

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
     * @api {post} api/1.0.0/trackgeupdate 编辑客户跟踪
     * @apiName trackgeupdate
     * @apiGroup GroupNamejl
     *
     * @apiParam (参数) {int} trackid 跟踪id
     * @apiParam (参数) {string} content 跟踪内容
     *
     * @apiSampleRequest http://192.168.1.220/fang/public/api/1.0.0/trackgeupdate
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
    public function trackgeupdate(Request $api)
    {
        $trackid = $api->input('trackid');
        $dataa['content'] = $api->input('content');
        if (!$trackid || $dataa['content'] == '') {
            return response()->json([
                'code' => '102',
                'message' => '参数不全',
            ]);
        }
        $data = Trackge::update_d_track($trackid, $dataa);
        if ($data) {
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
    /**
     * @api {post} api/1.0.0/trackgeinsert 添加客户跟踪
     * @apiName trackgeinsert
     * @apiGroup GroupNamejl
     *
     * @apiParam (参数) {int} cust_id 客户id
     * @apiParam (参数) {int} hous_id 职业顾问id
     * @apiParam (参数) {string} demand 意向等级
     * @apiParam (参数) {string} content 跟踪内容
     *
     * @apiSampleRequest http://192.168.1.220/fang/public/api/1.0.0/trackgeinsert
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
    public function trackgeinsert(Request $api)
    {
        $cust_id = $api->input('cust_id');
        $dataa['demand'] = $api->input('demand');
        if (!$cust_id || $dataa['demand'] == '') {
            return response()->json([
                'code' => '102',
                'message' => '参数不全',
            ]);
        }
        $data = Trackge::update_d_trackin($cust_id, $dataa);
        if ($data) {
            $datac['cust_id'] = $api->input('cust_id');
            $datac['hous_id'] = $api->input('hous_id');
            $datac['content'] = $api->input('content');
            $datac['track_type'] = 0;
            $datac['track_time'] = time();
            $datac['created_at'] = time();
            if (!$datac['cust_id'] || $datac['hous_id'] == '' || $datac['content'] == '') {
                return response()->json([
                    'code' => '102',
                    'message' => '参数不全',
                ]);
            }
            $datat = Trackge::insert_track($datac);

            if ($datat) {
                return response()->json([
                    'code' => '101',
                    'message' => '请求成功',
                ]);
            } else {
                return response()->json([
                    'code' => '104',
                    'message' => '请求失败'
                ]);
            }
        }else{
            return response()->json( [
                'code' => '103' ,
                'message'  => '请求失败'
            ] );
        }
    }

}
