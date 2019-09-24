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
     * @apiParam (参数) {string} [search] 客户姓名或手机号
     * @apiParam (参数) {string} [starting_time] 开始时间
     * @apiParam (参数) {string} [end_time] 结束时间
     * @apiParam (参数) {int} page 页码
     *
     * @apiSampleRequest http://192.168.1.220/fang/public/api/1.0.0/buyinfo
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
        $search = $api->input('search');
        $starting_time = $api->input('starting_time');
        $end_time = $api->input('end_time');
        $page = $api->input('page');
        if (!$hous_id) {
            return response()->json([
                'code' => '102',
                'message' => '参数不全',
            ]);
        }

        if($status == 1){
            $data['result'] = Ledger::get_home_cust($hous_id,$page,$search,$starting_time,$end_time);

            foreach($data['result'] as $k => $v){
                if($v['buyid'] == null){
                    unset($data['result'][$k]);
                }
            }
            $data['count'] = sizeof($data['result']);
            $data['result']=array_values($data['result']);
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
            $data['result']= Ledger::get_home_buynotpass($hous_id,$page,$search,$starting_time,$end_time);

            foreach( $data['result'] as $k => $v){
               if($v['buyid'] == null){
                    unset($data['result'][$k]);
                }else{
                    if($v['manager_verify_status'] === '0'){
                        $data['result'][$k]['finance_verify_time'] = '';
                        $data['result'][$k]['finance_verify_status'] = '';
                    }else{

                        if($v['finance_verify_status'] === '0'){

                        }else{
                            unset( $data['result'][$k]);

                        }

                    }

                }

            }
            $data['count'] = sizeof($data['result']);
            $data['result']=array_values($data['result']);
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
            $data['result']= Ledger::get_home_buynotpass($hous_id,$page,$search,$starting_time,$end_time);
            foreach( $data['result'] as $k => $v){

                if($v['buyid'] == null){
                    unset( $data['result'][$k]);
                }else{
                    if($v['manager_verify_status'] ===null){
                        $data['result'][$k]['manager_verify_status'] = '';
                        $data['result'][$k]['manager_verify_time'] = '';
                        $data['result'][$k]['finance_verify_time'] = '';
                        $data['result'][$k]['finance_verify_status'] = '';
                    }else{
                        if($v['finance_verify_status'] === null){
                            $data['result'][$k]['finance_verify_time'] = '';
                            $data['result'][$k]['finance_verify_status'] = '';
                        }else{
                            unset( $data['result'][$k]);
                        }
                    }
                }

            }
            $data['count'] = sizeof($data['result']);
            $data['result']=array_values($data['result']);
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
     * @apiParam (参数) {string} [search] 客户姓名或手机号
     * @apiParam (参数) {string} [starting_time] 开始时间
     * @apiParam (参数) {string} [end_time] 结束时间
     * @apiParam (参数) {int} page 页码
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
        $search = $api->input('search');
        $starting_time = $api->input('starting_time');
        $end_time = $api->input('end_time');
        $page = $api->input('page');
        if (!$hous_id) {
            return response()->json([
                'code' => '102',
                'message' => '参数不全',
            ]);
        }
        if($status ==1 ){
            $data['result']=Ledger::get_changname($hous_id,$page,$search,$starting_time,$end_time);
            $data['count'] = sizeof($data['result']);
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
            $data['result']=Ledger::get_changnoname($hous_id,$page,$search,$starting_time,$end_time);
            $data['count'] = sizeof($data['result']);
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
            $data['result']=Ledger::get_changnu($hous_id,$page,$search,$starting_time,$end_time);
            foreach($data['result'] as $k => $v){
                if($v['status'] ===null){
                    $data['result'][$k]['status'] = '';
                    $data['result'][$k]['verifytime'] = '';
                }
            }
            $data['count'] = sizeof($data['result']);
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
     * @apiParam (参数) {string} [search] 客户姓名或手机号
     * @apiParam (参数) {string} [starting_time] 开始时间
     * @apiParam (参数) {string} [end_time] 结束时间
     * @apiParam (参数) {int} page 页码
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
        $search = $api->input('search');
        $starting_time = $api->input('starting_time');
        $end_time = $api->input('end_time');
        $page = $api->input('page');
        if (!$hous_id) {
            return response()->json([
                'code' => '102',
                'message' => '参数不全',
            ]);
        }
        if($status == 1){
            $data['result'] = Ledger::get_chahome($hous_id,$page,$search,$starting_time,$end_time);
            $data['count'] = sizeof($data['result']);
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
            $data['result'] = Ledger::get_chahome_no($hous_id,$page,$search,$starting_time,$end_time);
            foreach($data['result'] as $k => $v){
                if($v['status'] === 0){
                    $data['result'][$k]['finance_status'] = "";
                    $data['result'][$k]['finance_time'] = "";
                }else{
                    if($v['finance_status'] === 0){

                    }else{
                        unset($data['result'][$k]);
                    }
                }
            }
            $data['count'] = sizeof($data['result']);
            $data['result']=array_values($data);
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
            $data['result'] = Ledger::get_chahome_no($hous_id,$page,$search,$starting_time,$end_time);
            foreach($data['result'] as $k => $v){
                if($v['status'] === null){
                    $data['result'][$k]['status'] ="";
                    $data['result'][$k]['verifytime'] ="";
                    $data['result'][$k]['finance_status'] ="";
                    $data['result'][$k]['finance_time'] ="";
                }else{
                    if($v['finance_status'] === null){
                        $data['result'][$k]['finance_status'] = '';
                        $data['result'][$k]['finance_time'] = '';
                    }else{
                        unset($data['result'][$k]);
                    }
                }
            }
            $data['count'] = sizeof($data['result']);
            $data['result']=array_values($data['result']);
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
     * @api {post} api/1.0.0/chakouthome 退房
     * @apiName chakouthome
     * @apiGroup GroupNameji
     *
     * @apiParam (参数) {int} hous_id 职业顾问id
     * @apiParam (参数) {int} status 通过1 未通过2 未审核3
     * @apiParam (参数) {string} [search] 客户姓名或手机号
     * @apiParam (参数) {string} [starting_time] 开始时间
     * @apiParam (参数) {string} [end_time] 结束时间
     * @apiParam (参数) {int} page 页码
     *
     * @apiSampleRequest http://192.168.1.220/fang/public/api/1.0.0/chakouthome
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
    public function chakouthome(Request $api)
    {
        $hous_id = $api -> input('hous_id');
        $status = $api -> input('status');
        $search = $api->input('search');
        $starting_time = $api->input('starting_time');
        $end_time = $api->input('end_time');
        $page = $api->input('page');
        if (!$hous_id) {
            return response()->json([
                'code' => '102',
                'message' => '参数不全',
            ]);
        }

        if($status == 1){
            $data['result'] = Ledger::get_chakouthome($hous_id,$page,$search,$starting_time,$end_time);
            $data['count'] = sizeof($data['result']);
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
            $data['result'] = Ledger::get_chakouthome_no($hous_id,$page,$search,$starting_time,$end_time);
            foreach($data['result'] as $k => $v){
                if($v['status'] === 0){
                    $data['result'][$k]['finance_status'] = "";
                    $data['result'][$k]['finance_time'] = "";
                }else{
                    if($v['finance_status'] === 0){

                    }else{
                        unset( $data['result'][$k]);
                    }
                }
            }
            $data['count'] = sizeof($data['result']);
            $data['result']=array_values( $data['result']);
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
            $data['result'] = Ledger::get_chakouthome_no($hous_id,$page,$search,$starting_time,$end_time);
            foreach($data['result'] as $k => $v){
                if($v['status'] === null){
                    $data['result'][$k]['status'] ="";
                    $data['result'][$k]['verifytime'] ="";
                    $data['result'][$k]['finance_status'] ="";
                    $data['result'][$k]['finance_time'] ="";
                }else{
                    if($v['finance_status'] === null){
                        $data['result'][$k]['finance_status'] = '';
                        $data['result'][$k]['finance_time'] = '';
                    }else{
                        unset($data['result'][$k]);
                    }
                }
            }
            $data['count'] = sizeof($data['result']);
            $data['result']=array_values($data['result']);
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
     * @api {post} api/1.0.0/signt 签约
     * @apiName signt
     * @apiGroup GroupNameji
     *
     * @apiParam (参数) {int} hous_id 职业顾问id
     * @apiParam (参数) {int} status 通过1 未通过2 未审核3
     * @apiParam (参数) {string} [search] 客户姓名或手机号
     * @apiParam (参数) {string} [starting_time] 开始时间
     * @apiParam (参数) {string} [end_time] 结束时间
     * @apiParam (参数) {int} page 页码
     *
     * @apiSampleRequest http://192.168.1.220/fang/public/api/1.0.0/signt
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
    public function signt(Request $api)
    {
        $hous_id = $api -> input('hous_id');
        $status = $api -> input('status');
        $search = $api->input('search');
        $starting_time = $api->input('starting_time');
        $end_time = $api->input('end_time');
        $page = $api->input('page');
        if (!$hous_id) {
            return response()->json([
                'code' => '102',
                'message' => '参数不全',
            ]);
        }
        if($status == 1){
            $data['result'] = Ledger::get_signt($hous_id,$page,$search,$starting_time,$end_time);
            $data['count'] = sizeof($data['result']);
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
        } else if($status == 2){
            $data['result'] = Ledger::get_signt_no($hous_id,$page,$search,$starting_time,$end_time);
            if ($data) {
                foreach($data['result'] as $k => $v){
                    if($v['sign_status'] == '0'){
                        $data['result'][$k]['finance_status'] = '';
                        $data['result'][$k]['finance_verifytime'] = '';
                    }else{
                        if($v['finance_status'] === 0){

                        }else{
                            unset($data['result'][$k]);
                        }
                    }
                }
                $data['count'] = sizeof($data['result']);
                $data['result']=array_values($data['result']);
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
            $data['result'] = Ledger::get_signt_no($hous_id,$page,$search,$starting_time,$end_time);
            $data['count'] = sizeof($data['result']);
            if ($data) {
                foreach($data['result'] as $k => $v){
                    if($v['sign_status'] == null){
                        $data['result'][$k]['sign_status'] = '';
                        $data['result'][$k]['sign_verifytime'] = '';
                        $data['result'][$k]['finance_status'] = '';
                        $data['result'][$k]['finance_verifytime'] = '';
                    }else{
                        if($v['finance_status'] ==null){
                            $data['result'][$k]['finance_status'] = '';
                            $data['result'][$k]['finance_verifytime'] = '';
                        }else{
                            unset($data['result'][$k]);
                        }
                    }
                }
                $data['count'] = sizeof($data['result']);
                $data['result']=array_values($data['result']);
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
     * @api {post} api/1.0.0/sdelay 延迟签约
     * @apiName sdelay
     * @apiGroup GroupNameji
     *
     * @apiParam (参数) {int} hous_id 职业顾问id
     * @apiParam (参数) {int} status 通过1 未通过2 未审核3
     * @apiParam (参数) {string} [search] 客户姓名或手机号
     * @apiParam (参数) {string} [starting_time] 开始时间
     * @apiParam (参数) {string} [end_time] 结束时间
     * @apiParam (参数) {int} page 页码
     *
     * @apiSampleRequest http://192.168.1.220/fang/public/api/1.0.0/sdelay
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
    public function sdelay(Request $api)
    {
        $page = $api->input('page');
        $hous_id = $api->input('hous_id');
        $search = $api->input('search');
        $starting_time = $api->input('starting_time');
        $end_time = $api->input('end_time');
        $status = $api->input('status');
        if (!$hous_id) {
            return response()->json([
                'code' => '102',
                'message' => '参数不全',
            ]);
        }
       if ($status == 1) {
           $data['result'] = Ledger::get_sdelay($hous_id,$page,$search,$starting_time,$end_time);
           $data['count'] = sizeof($data['result']);
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
        }else if ($status == 2) {
           $data['result'] = Ledger::get_sdelay_no($hous_id,$page,$search,$starting_time,$end_time);
           $data['count'] = sizeof($data['result']);
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
           $data['result'] = Ledger::get_sdelay_nu($hous_id,$page,$search,$starting_time,$end_time);
           $data['count'] = sizeof($data['result']);
           foreach($data['result'] as $k => $v){
               if($v['sign_status'] == null){
                   $data['result'][$k]['sign_status'] = "";
                   $data['result'][$k]['sign_verifytime'] = "";
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