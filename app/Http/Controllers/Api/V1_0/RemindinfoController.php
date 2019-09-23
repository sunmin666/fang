<?php

namespace App\Http\Controllers\Api\V1_0;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Api\V1_0\Remindinfo;


class RemindinfoController extends Controller
{
    /**
     * @apiDefine GroupNamehh 提醒管理
     */


    /**
     * @api {post} api/1.0.0/remind 提醒查找
     * @apiName remind
     * @apiGroup GroupNamehh
     *
     * @apiParam (参数) {int} hous_id 职业顾问id
     * @apiParam (参数) {string} [realname] 客户姓名
     * @apiParam (参数) {string} [mobile] 手机号
     * @apiParam (参数) {int} [status] 是否到期
     * @apiParam (参数) {int} [modular] 提醒类型
     * @apiParam (参数) {string} [starting_time] 开始时间
     * @apiParam (参数) {string} [end_time] 结束时间
     * @apiParam (参数) {int} page 页码
     *
     * @apiSampleRequest http://192.168.1.220/fang/public/api/1.0.0/remind
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
    public function remind(Request $api)
    {
        $hous_id = $api->input('hous_id');
        $page = $api->input('page');
        $realname = $api->input('realname');
        $mobile = $api->input('mobile');
        $status = $api->input('status');
        $modular = $api->input('modular');
        $starting_time = $api->input('starting_time');
        $end_time = $api->input('end_time');
        if (!$hous_id) {
            return response()->json([
                'code' => '102',
                'message' => '参数不全',
            ]);
        }
        $data = Remindinfo::get_remind_hous($hous_id,$page, $realname, $mobile, $modular, $starting_time, $end_time);
        foreach ($data as $k => $v) {
            if ($v['remind_time'] - 86400 * 3 > time()) {
                $data[$k]['status'] = 1;
            } else {
                $data[$k]['status'] = 2;
            }
        }
        if ($status != "") {
            foreach ($data as $k => $v) {
                if($status == 1){
                    if ($v['status']!= 1) {
                        unset($data[$k]);
                    }
                }
                if($status == 2){
                    if ($v['status']!= 2) {
                        unset($data[$k]);
                    }
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
     * @api {post} api/1.0.0/remdetails 提醒详情
     * @apiName remdetails
     * @apiGroup GroupNamehh
     *
     * @apiParam (参数) {int} remi_id 提醒id
     *
     * @apiSampleRequest http://192.168.1.220/fang/public/api/1.0.0/remdetails
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
    public function remdetails(Request $api)
    {
        $remi_id = $api->input('remi_id');
        if (!$remi_id) {
            return response()->json([
                'code' => '102',
                'message' => '参数不全',
            ]);
        }
        $data = Remindinfo::get_remind_detail($remi_id);
        if ($data->remind_time - 86400 * 3 > time()) {
            $data->status = 1;
        } else {
            $data->status = 2;
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
     * @api {post} api/1.0.0/reminsert  添加提醒
     * @apiName reminsert
     * @apiGroup GroupNamehh
     *
     * @apiParam (参数) {int} hous_id 职业顾问id
     * @apiParam (参数) {int} cust_id 客户id
     * @apiParam (参数) {string} content 提醒内容
     * @apiParam (参数) {int} remind_time 提醒到期时间
     * @apiParam (参数) {int} modular 提醒模块
     *
     * @apiSampleRequest http://192.168.1.220/fang/public/api/1.0.0/reminsert
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
    public function reminsert(Request $api)
    {
        $data['hous_id'] = $api->input('hous_id');
        $data['content'] = $api->input('content');
        $data['remind_time'] = strtotime($api->input('remind_time'));
        $data['modular'] = $api->input('modular');
        $data['cust_id'] = $api->input('cust_id');
        $data['created_at'] = time();
        if (!$data['hous_id'] || $data['content'] == '' || $data['remind_time'] == '' || $data['modular'] == '' || $data['cust_id'] == '') {
            return response()->json([
                'code' => '102',
                'message' => '参数不全',
            ]);
        }
        $dataa = Remindinfo::remind_insert($data);
        if ($dataa) {
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
    }
}
