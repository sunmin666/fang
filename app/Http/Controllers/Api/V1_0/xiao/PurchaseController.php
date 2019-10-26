<?php

namespace App\Http\Controllers\Api\V1_0\xiao;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Api\V1_0\xiao\Purchase;

class PurchaseController extends Controller
{
    /**
     * @apiDefine GroupNamoojds 小后台置业计划方案Api
     */

    /**
     * @api {post} api/1.0.0/homeidshow 通过房号获取homeid
     * @apiName homeidshow
     * @apiGroup GroupNamoojds
     *
     * @apiParam (参数) {int} field_id 房号id
     *
     * @apiSampleRequest http://192.168.1.220/fang/public/api/1.0.0/homeidshow
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
    public function homeidshow(Request $api)
    {
        $field_id = $api -> input('field_id');
        if(!$field_id){
            return [
                'code' => 103,
                'msg' => '参数不全'
            ];
        }
        $data = Purchase::get_d_homeid($field_id);
        if($data){
            return [
                'code' => 101,
                'msg' => '请求成功',
                "result" => $data,
            ];
        }else{
            return [
                'code' => 101,
                'msg' => '请求失败',
            ];
        }
    }
    /**
     * @api {post} api/1.0.0/purchadd 添加置业方案
     * @apiName purchadd
     * @apiGroup GroupNamoojds
     *
     * @apiParam (参数) {int} cust_id 客户id
     * @apiParam (参数) {int} type 缴费方案 1表示一次性 0表示按揭
     * @apiParam (参数) {int} [once_total] 选择一次性付款需要填写总金额
     * @apiParam (参数) {int} [years] 选择按揭时需要填写年限
     * @apiParam (参数) {int} [month_price] 选择按揭时需要填写月供
     * @apiParam (参数) {int} [month_total] 选择按揭时需要填写按揭总金额
     * @apiParam (参数) {int} homeid 房源id
     * @apiParam (参数) {string} programme 方案如：方案一
     *
     * @apiSampleRequest http://192.168.1.220/fang/public/api/1.0.0/purchadd
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
    public function purchadd(Request $api)
    {
        $data['cust_id'] = $cust_id = $api -> input('cust_id');
        $data['type'] = $type = $api -> input('type');
        $data['once_total'] = $once_total = $api -> input('once_total');
        $data['years'] = $years = $api -> input('years');
        $data['month_price'] = $month_price = $api -> input('month_price');
        $data['month_total'] = $month_total = $api -> input('month_total');
        $data['homeid'] = $homeid = $api -> input('homeid');
        $data['programme'] = $programme = $api -> input('programme');
        $data['created_at'] = time();
        if($type==''){
            return [
                'code' => 103,
                'msg' => '请选择缴费方案'
            ];
        }
        if($type == 1){
            if(!$cust_id || !$once_total || !$homeid || !$programme){
                return [
                    'code' => 104,
                    'msg' => '参数不全'
                ];
            }
        }
        if($type == 0){
            if(!$cust_id || !$years || !$month_price || !$month_total || !$homeid ||!$programme){
                return [
                    'code' => 105,
                    'msg' => '参数不全'
                ];
            }
        }
        $info = Purchase::get_progrna($cust_id,$programme);
        if($info){
            return [
                'code' => 106,
                'msg' => '该用户方案已存在',
            ];
        }
        $data = Purchase::add_d_purch($data);
        if($data){
            return [
                'code' => 101,
                'msg' => '请求成功'
            ];
        }else{
            return [
                'code' => 102,
                'msg' => '请求失败'
            ];
        }
    }
    /**
     * @api {post} api/1.0.0/purcshow 置业方案列表
     * @apiName purcshow
     * @apiGroup GroupNamoojds
     *
     * @apiParam (参数) {int} page 页码
     * @apiParam (参数) {string} [realname] 客户姓名筛选
     * @apiParam (参数) {int} [mobile] 手机号筛选
     *
     * @apiSampleRequest http://192.168.1.220/fang/public/api/1.0.0/purcshow
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
    public function purcshow(Request $api)
    {
        $page = $api -> input('page');
        $realname = $api -> input('realname');
        $mobile = $api -> input('mobile');
        $data['purshow'] = Purchase::get_all_pur($page,$realname,$mobile);
        $data['count'] = Purchase::get_all_count($realname,$mobile);
        $data['zongye'] = ceil($data['count']/10);
        $data['purshow']=array_values( $data['purshow']);
        if($data){
            return [
                'code' => 101,
                'msg' => '请求成功',
                "result" => $data,
            ];
        }else{
            return [
                'code' => 102,
                'msg' => '请求失败'
            ];
        }
    }
    /**
     * @api {post} api/1.0.0/purdesie 置业方案详情
     * @apiName purdesie
     * @apiGroup GroupNamoojds
     *
     * @apiParam (参数) {int} planid 置业计划方案id
     *
     * @apiSampleRequest http://192.168.1.220/fang/public/api/1.0.0/purdesie
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
    public function purdesie(Request $api)
    {
        $planid = $api -> input('planid');
        if(!$planid){
            return [
                'code' => 103,
                'msg' => '参数不全',
            ];
        }
        $data = Purchase::get_d_pur($planid);
        if($data){
            return [
                'code' => 101,
                'msg' => '请求成功',
                "result" => $data,
            ];
        }else{
            return [
                'code' => 102,
                'msg' => '请求失败'
            ];
        }
    }
    /**
     * @api {post} api/1.0.0/purdedit置业方案修改
     * @apiName purdedit
     * @apiGroup GroupNamoojds
     *
     * @apiParam (参数) {int} cust_id 客户id
     * @apiParam (参数) {int} planid 置业计划方案id
     * @apiParam (参数) {int} type 缴费方案 1表示一次性 0表示按揭
     * @apiParam (参数) {int} [once_total] 选择一次性付款需要填写总金额
     * @apiParam (参数) {int} [years] 选择按揭时需要填写年限
     * @apiParam (参数) {int} [month_price] 选择按揭时需要填写月供
     * @apiParam (参数) {int} [month_total] 选择按揭时需要填写按揭总金额
     * @apiParam (参数) {string} programme 方案如：方案一
     *
     * @apiSampleRequest http://192.168.1.220/fang/public/api/1.0.0/purdedit
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
    public function purdedit(Request $api)
    {
        $cust_id = $api -> input('cust_id');
        $data['type'] = $type = $api -> input('type');
        $data['once_total'] = $once_total = $api -> input('once_total');
        $data['years'] = $years = $api -> input('years');
        $data['month_price'] = $month_price = $api -> input('month_price');
        $data['month_total'] = $month_total = $api -> input('month_total');
        $data['programme'] = $programme = $api -> input('programme');
        $planid = $api -> input('planid');
        if(!$planid){
            return [
                'code' => 103,
                'msg' => '参数不全',
            ];
        }
        if($type==''){
            return [
                'code' => 103,
                'msg' => '请选择缴费方案'
            ];
        }
        if($type == 1){
            if(!$cust_id || !$once_total || !$programme){
                return [
                    'code' => 104,
                    'msg' => '参数不全'
                ];
            }
        }
        if($type == 0){
            if(!$cust_id || !$years || !$month_price || !$month_total ||!$programme){
                return [
                    'code' => 105,
                    'msg' => '参数不全'
                ];
            }
        }
        $info = Purchase::get_progrna($cust_id,$programme);
        if($info){
            return [
                'code' => 106,
                'msg' => '该用户方案已存在',
            ];
        }
        $data = Purchase::edit_d_pur($planid,$data);
        if($data){
            return [
                'code' => 101,
                'msg' => '请求成功',
            ];
        }else{
            return [
                'code' => 102,
                'msg' => '请求失败',
            ];
        }
    }
    /**
     * @api {post} api/1.0.0/purdel 置业方案删除
     * @apiName purdel
     * @apiGroup GroupNamoojds
     *
     * @apiParam (参数) {int} planid 置业计划方案id
     *
     * @apiSampleRequest http://192.168.1.220/fang/public/api/1.0.0/purdel
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
    public function purdel(Request $api)
    {
        $planid = $api -> input('planid');
        if(!$planid){
            return [
                'code' => 103,
                'msg' => '参数不全',
            ];
        }
        $data = Purchase::del_d_pur($planid);
        if($data){
            return [
                'code' => 101,
                'msg' => '请求成功',
            ];
        }else{
            return [
                'code' => 102,
                'msg' => '请求失败'
            ];
        }
    }
    /**
     * @api {post} api/1.0.0/puralldel 置业方案全选删除
     * @apiName puralldel
     * @apiGroup GroupNamoojds
     *
     * @apiParam (参数) {int} planid 置业计划方案id
     *
     * @apiSampleRequest http://192.168.1.220/fang/public/api/1.0.0/puralldel
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
    public function puralldel(Request $api)
    {
        $planid = $api -> input('planid');
        $pieceses=trim($planid,',');
        $pieces = explode(",", $pieceses);
        if(!$pieces){
            return [
                'code' => 103,
                'msg' => '参数不全',
            ];
        }
        $data = Purchase::del_all_purall($pieces);
        if($data){
            return [
                'code' => 101,
                'msg' => '请求成功',
            ];
        }else{
            return [
                'code' => 102,
                'msg' => '请求失败'
            ];
        }
    }
}
