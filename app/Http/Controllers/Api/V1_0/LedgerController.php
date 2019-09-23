<?php

namespace App\Http\Controllers\Api\V1_0;

use App\Models\Api\V1_0\Buyinfo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Api\V1_0\Ledger;

class LedgerController extends Controller
{
    /**
     * @apiDefine GroupNameji 置业台账
     */

    /**
     * @api {post} api/1.0.0/buyinfo 已认购
     * @apiName buyinfo
     * @apiGroup GroupNameji
     *
     * @apiParam (参数) {int} hous_id 职业顾问id
     * @apiParam (参数) {int} status 通过1 未通过2 未审核3
     * @apiParam (参数) {int} page 页码
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
        $hous_id = $api->input('hous_id');
        $status = $api ->input('status');
        $page = $api->input('page');
        if (!$hous_id) {
            return response()->json([
                'code' => '102',
                'message' => '参数不全',
            ]);
        }
        if($status == 1){
            $data= Ledger::get_home_cust($hous_id,$page);
            foreach($data as $k => $v){
                if($v['buyid'] == null){
                    unset($data[$k]);
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

        }else if($status == 2){
            $data= Ledger::get_home_buynotpass($hous_id,$page);
            foreach($data as $k => $v){
                if($v['buyid'] == null){
                    unset($data[$k]);
                }else{
                    if($v['manager_verify_status'] === '0'){
                        $data[$k]['finance_verify_time'] = '';
                        $data[$k]['finance_verify_status'] = '';
                    }else{
                        if($v['finance_verify_status'] === '0'){
                        }else{
                            unset($data[$k]);
                        }
                    }
                }
            }

            $data=array_values($data);
//            print_r($data);die;

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
        }else if($status == 3){
            $data= Ledger::get_home_buynotpass($hous_id,$page);
            foreach($data as $k => $v){

                if($v['buyid'] == null){
                    unset($data[$k]);
                }else{
                    if($v['manager_verify_status'] ===null){
                        $data[$k]['manager_verify_status'] = '';
                        $data[$k]['manager_verify_time'] = '';
                        $data[$k]['finance_verify_time'] = '';
                        $data[$k]['finance_verify_status'] = '';
                    }else{
                        if($v['finance_verify_status'] === null){
                            $data[$k]['finance_verify_time'] = '';
                            $data[$k]['finance_verify_status'] = '';
                        }else{
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


    }
    /**
     * @api {post} api/1.0.0/buydetails 认购详情
     * @apiName buydetails
     * @apiGroup GroupNameji
     *
     * @apiParam (参数) {int} buyid 认购id
     *
     * @apiSampleRequest http://192.168.1.220/fang/public/api/1.0.0/buydetails
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
    public function buydetails(Request $api)
    {
        $buyid = $api -> input('buyid');
        if (!$buyid) {
            return response()->json([
                'code' => '102',
                'message' => '参数不全',
            ]);
        }
        $data = Ledger::get_d_buy($buyid);
        if($data ->pay_type ==0){
            $data -> loan_term ="";
            $data -> month_pay ="";
        }
        if($data->manager_verify_status === null){
            $data -> manager_verify_status = "";
            $data -> manager_verify_time ="";
            $data -> manager_verify_remarks ="";
            $data -> finance_verify_status ="";
            $data -> finance_verify_remarks ="";
            $data -> finance_verify_time = "";
        }else{
            $data -> finance_verify_status ="";
            $data -> finance_verify_remarks ="";
            $data -> finance_verify_time = "";
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
     * @api {post} api/1.0.0/changname 更名
     * @apiName changname
     * @apiGroup GroupNameji
     *
     * @apiParam (参数) {int} hous_id 职业顾问id
     * @apiParam (参数) {int} status 通过1 未通过2 未审核3
     *
     * @apiSampleRequest http://192.168.1.220/fang/public/api/1.0.0/changname
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
    public function changname(Request $api)
    {
        $hous_id = $api->input('hous_id');
        $status = $api ->input('status');
        if (!$hous_id) {
            return response()->json([
                'code' => '102',
                'message' => '参数不全',
            ]);
        }
        //$data=Ledger::get_changname($hous_id);
        if($status ==1 ){
            $data=Ledger::get_changname($hous_id);
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
        } else if($status ==2){
            $data=Ledger::get_changnoname($hous_id);
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
        } else if($status ==3){
            $data=Ledger::get_changnu($hous_id);
            foreach($data as $k => $v){
                if($v['status'] ===null){
                    $data[$k]['status'] = '';
                    $data[$k]['verifytime'] = '';
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

    }
    /**
     * @api {post} api/1.0.0/chahome 换房
     * @apiName chahome
     * @apiGroup GroupNameji
     *
     * @apiParam (参数) {int} hous_id 职业顾问id
     * @apiParam (参数) {int} status 通过1 未通过2 未审核3
     *
     * @apiSampleRequest http://192.168.1.220/fang/public/api/1.0.0/chahome
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
    public function chahome(Request $api)
    {
        $hous_id = $api -> input('hous_id');
        $status = $api -> input('status');
        if (!$hous_id) {
            return response()->json([
                'code' => '102',
                'message' => '参数不全',
            ]);
        }
        if($status == 1){
            $data = Ledger::get_chahome($hous_id);
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
        }else if($status == 2){
            $data = Ledger::get_chahome_no($hous_id);
            foreach($data as $k => $v){
                if($v['status'] === 0){
                    $data[$k]['finance_status'] = "";
                    $data[$k]['finance_time'] = "";
                }else{
                    if($v['finance_status'] === 0){

                    }else{
                        unset($data[$k]);
                    }
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
        }else if($status ==3){
            $data = Ledger::get_chahome_no($hous_id);
            foreach($data as $k => $v){
                if($v['status'] === null){
                    $data[$k]['status'] ="";
                    $data[$k]['verifytime'] ="";
                    $data[$k]['finance_status'] ="";
                    $data[$k]['finance_time'] ="";
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
    }
}