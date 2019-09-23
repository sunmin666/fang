<?php

namespace App\Http\Controllers\Api\V1_0;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Api\V1_0\Trackinfo;

class TrackinfoController extends Controller
{
    /**
     * @apiDefine GroupNamejj 客户跟踪管理
     */

    /**
     * @api {post} api/1.0.0/trackinfo 客户来访查找
     * @apiName delegate
     * @apiGroup GroupNamejj
     *
     * @apiParam (参数) {int} hous_id 职业顾问id
     * @apiParam (参数) {int} page 页码
     *
     * @apiSampleRequest http://192.168.1.13/fang/public/api/1.0.0/trackinfo
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
        $page = $api->input('page');

        if (!$hous_id) {
            return response()->json([
                'code' => '102',
                'message' => '参数不全',
            ]);
        }

        $data = Trackinfo::get_d_hous($hous_id, $page);

        foreach ($data as $k => $v) {
            $data[$k]['count'] = $c = Trackinfo::get_t_count($v['cust_id']);


            if ($c == 0) {
                unset($data[$k]);
            } else {
                $a = Trackinfo::get_t_time($v['cust_id']);
                $data[$k]['time'] = $a->track_time;
                if ($v['sex'] == 1) {
                    $data[$k]['sex'] = "男";
                } else {
                    $data[$k]['sex'] = "女";
                }
                $data=array_values($data);
            }
        }
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
     * @api {post} api/1.0.0/trackcust 获取客户来访记录
     * @apiName trackcust
     * @apiGroup GroupNamejj
     *
     * @apiParam (参数) {int} cust_id 客户id
     * @apiParam (参数) {int} page 页码
     *
     * @apiSampleRequest http://192.168.1.13/fang/public/api/1.0.0/trackcust
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
    public function trackcust(Request $api)
    {
        $cust_id = $api->input('cust_id');
        $page = $api->input('page');
        if (!$cust_id) {
            return response()->json([
                'code' => '102',
                'message' => '参数不全',
            ]);
        }
        $data = Trackinfo::get_all_cust($cust_id);
        $data->count = $c = Trackinfo::get_t_count($data->cust_id);
        $e = Trackinfo::get_t_time($data->cust_id);
        $data->time = $e->track_time;

        $data->trackinfo = Trackinfo::get_trak($cust_id, $page);

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
     * @api {post} api/1.0.0/trackupdate 编辑客户来访
     * @apiName trackupdate
     * @apiGroup GroupNamejj
     *
     * @apiParam (参数) {int} trackid 来访id
     * @apiParam (参数) {string} content 来访内容
     *
     * @apiSampleRequest http://192.168.1.13/fang/public/api/1.0.0/trackupdate
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
    public function trackupdate(Request $api)
    {
        $trackid = $api->input('trackid');
        $dataa['content'] = $api->input('content');
        if (!$trackid || $dataa['content'] == '') {
            return response()->json([
                'code' => '102',
                'message' => '参数不全',
            ]);
        }
        $data = Trackinfo::update_d_track($trackid, $dataa);
        if ($data) {
            return response()->json([
                'code' => '101',
                'message' => '请求成功',
                'result' => $data
            ]);
        } else {
            return response()->json([
                'code' => '103',
                'message' => '请求失败'
            ]);
        }
    }

    /**
     * @api {post} api/1.0.0/trackinsert 添加客户来访
     * @apiName trackinsert
     * @apiGroup GroupNamejj
     *
     * @apiParam (参数) {int} cust_id 客户id
     * @apiParam (参数) {int} hous_id 职业顾问id
     * @apiParam (参数) {string} demand 意向等级
     * @apiParam (参数) {string} content 来访内容
     *
     * @apiSampleRequest http://192.168.1.13/fang/public/api/1.0.0/trackinsert
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
    public function trackinsert(Request $api)
    {
        $cust_id = $api->input('cust_id');
        $dataa['demand'] = $api->input('demand');
        if (!$cust_id || $dataa['demand'] == '') {
            return response()->json([
                'code' => '102',
                'message' => '参数不全',
            ]);
        }
        $data = Trackinfo::update_d_trackin($cust_id, $dataa);
        if ($data) {
            $datac['cust_id'] = $api->input('cust_id');
            $datac['hous_id'] = $api->input('hous_id');
            $datac['content'] = $api->input('content');
            $datac['track_type'] = 1;
            $datac['track_time'] = time();
            $datac['created_at'] = time();
            if (!$datac['cust_id'] || $datac['hous_id'] == '' || $datac['content'] == '') {
                return response()->json([
                    'code' => '102',
                    'message' => '参数不全',
                ]);
            }
            $datat = Trackinfo::insert_track($datac);

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
