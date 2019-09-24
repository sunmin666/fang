<?php

namespace App\Http\Controllers\Api\V1_0;

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
        $hous_id = $api -> input('hous_id');
        if (!$hous_id) {
            return response()->json([
                'code' => '102',
                'message' => '参数不全',
            ]);
        }
        $data = Ledger::get_ledger_cust($hous_id);
        foreach($data as $k => $v){
            $data[$k]['home'] = Ledger::get_buyinfo($v['cust_id']);
            $data[$k]['count'] = $c = Ledger::get_t_count($v['cust_id']);
            if($c == 0){
                unset($data[$k]);
            }else{
                if ($v['sex'] == 1) {
                    $data[$k]['sex'] = "男";
                } else {
                    $data[$k]['sex'] = "女";
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
     * @api {post} api/1.0.0/changecust 已更名
     * @apiName changecust
     * @apiGroup GroupNameji
     *
     * @apiParam (参数) {int} hous_id 职业顾问id
     *
     * @apiSampleRequest http://192.168.1.13/fang/public/api/1.0.0/changecust
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
    public function changecust(Request $api)
    {
        $hous_id = $api -> input('hous_id');
        if (!$hous_id) {
            return response()->json([
                'code' => '102',
                'message' => '参数不全',
            ]);
        }
        $data = Ledger::get_ledger_change($hous_id);

        foreach($data as $k => $v){
            $data[$k]['home'] =$c= Ledger::get_changecust($v['cust_id']);
            if($c ->count()  == 0) {
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
    }
    /**
     * @api {post} api/1.0.0/changehome 已换房
     * @apiName changehome
     * @apiGroup GroupNameji
     *
     * @apiParam (参数) {int} hous_id 职业顾问id
     *
     * @apiSampleRequest http://192.168.1.13/fang/public/api/1.0.0/changehome
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
    public function changehome(Request $api)
    {
        $hous_id = $api -> input('hous_id');
        if (!$hous_id) {
            return response()->json([
                'code' => '102',
                'message' => '参数不全',
            ]);
        }
        $data = Ledger::get_ledger_cust($hous_id);

        foreach($data as $k => $v){
            $data[$k]['home'] = $c = Ledger::get_changehome($v['cust_id']);
            if($c ->count()  == 0){
                unset($data[$k]);
            }else{
                if ($v['sex'] == 1) {
                    $data[$k]['sex'] = "男";
                } else {
                    $data[$k]['sex'] = "女";
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
     * @api {post} api/1.0.0/delaysing 已延迟
     * @apiName delaysing
     * @apiGroup GroupNameji
     *
     * @apiParam (参数) {int} hous_id 职业顾问id
     *
     * @apiSampleRequest http://192.168.1.13/fang/public/api/1.0.0/delaysing
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
    public function delaysing(Request $api)
    {
        $hous_id = $api -> input('hous_id');
        if (!$hous_id) {
            return response()->json([
                'code' => '102',
                'message' => '参数不全',
            ]);
        }
        $data = Ledger::get_ledger_cust($hous_id);
        foreach ($data as $k => $v){
            $data[$k]['delay'] =$c= Ledger::get_delaysing($v['cust_id']);
            if($c ->count()  == 0){
                unset($data[$k]);
            }else{
                if ($v['sex'] == 1) {
                    $data[$k]['sex'] = "男";
                } else {
                    $data[$k]['sex'] = "女";
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
     * @api {post} api/1.0.0/signinfo 已签约
     * @apiName signinfo
     * @apiGroup GroupNameji
     *
     * @apiParam (参数) {int} hous_id 职业顾问id
     *
     * @apiSampleRequest http://192.168.1.13/fang/public/api/1.0.0/signinfo
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
    public function signinfo(Request $api)
    {
        $hous_id = $api -> input('hous_id');
        if (!$hous_id) {
            return response()->json([
                'code' => '102',
                'message' => '参数不全',
            ]);
        }
        $data = Ledger::get_ledger_cust($hous_id);
        foreach ($data as $k => $v){
            $data[$k]['signinfo'] = $c = Ledger::get_signinfo($v['cust_id']);

            if($c ->count()  == 0){
                unset($data[$k]);
            }else{
                if ($v['sex'] == 1) {
                    $data[$k]['sex'] = "男";
                } else {
                    $data[$k]['sex'] = "女";
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
     * @api {post} api/1.0.0/checkout 已退房
     * @apiName checkout
     * @apiGroup GroupNameji
     *
     * @apiParam (参数) {int} hous_id 职业顾问id
     *
     * @apiSampleRequest http://192.168.1.13/fang/public/api/1.0.0/checkout
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
    public function checkout(Request $api)
    {
        $hous_id = $api -> input('hous_id');
        if (!$hous_id) {
            return response()->json([
                'code' => '102',
                'message' => '参数不全',
            ]);
        }
        $data = Ledger::get_ledger_cust($hous_id);
        foreach($data as $k => $v){
            $data[$k]['checkout'] = $c = Ledger::get_checkout($v['cust_id']);
            if($c ->count()  == 0){
                unset($data[$k]);
            }else{
                if ($v['sex'] == 1) {
                    $data[$k]['sex'] = "男";
                } else {
                    $data[$k]['sex'] = "女";
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
     * @api {post} api/1.0.0/buyinfopass 认购未通过
     * @apiName buyinfopass
     * @apiGroup GroupNameji
     *
     * @apiParam (参数) {int} hous_id 职业顾问id
     *
     * @apiSampleRequest http://192.168.1.13/fang/public/api/1.0.0/buyinfopass
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
    public function buyinfopass(Request $api)
    {
        $hous_id = $api -> input('hous_id');
        if (!$hous_id) {
            return response()->json([
                'code' => '102',
                'message' => '参数不全',
            ]);
        }
        $data = Ledger::get_ledger_buyinfopass($hous_id);
        foreach($data as $k =>$v){
            $data[$k]['buyinfo'] = $c = Ledger::get_buyinfopass($v['cust_id']);
            if($c ->count()  == 0){
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
    }
    /**
     * @api {post} api/1.0.0/changepass 更名未通过
     * @apiName changepass
     * @apiGroup GroupNameji
     *
     * @apiParam (参数) {int} hous_id 职业顾问id
     *
     * @apiSampleRequest http://192.168.1.13/fang/public/api/1.0.0/changepass
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
    public function changepass(Request $api)
    {
        $hous_id = $api -> input('hous_id');
        if (!$hous_id) {
            return response()->json([
                'code' => '102',
                'message' => '参数不全',
            ]);
        }
        $data = Ledger::get_ledger_buyinfopass($hous_id);
        foreach($data as $k =>$v){
            $data[$k]['buyinfo'] = $c = Ledger::get_changepass($v['cust_id']);
            if($c ->count()  == 0){
                unset($data[$k]);
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
     * @api {post} api/1.0.0/chahomepass 换房未通过
     * @apiName chahomepass
     * @apiGroup GroupNameji
     *
     * @apiParam (参数) {int} hous_id 职业顾问id
     *
     * @apiSampleRequest http://192.168.1.13/fang/public/api/1.0.0/chahomepass
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
    public function chahomepass(Request $api)
    {
        $hous_id = $api -> input('hous_id');
        if (!$hous_id) {
            return response()->json([
                'code' => '102',
                'message' => '参数不全',
            ]);
        }
        $data = Ledger::get_ledger_buyinfopass($hous_id);
        foreach($data as $k =>$v){
            $data[$k]['buyinfo'] = $c = Ledger::get_chahomepass($v['cust_id']);
//            if($c ->count()  == 0){
//                unset($data[$k]);
//            }
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
