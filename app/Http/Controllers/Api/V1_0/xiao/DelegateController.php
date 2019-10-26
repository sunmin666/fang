<?php

namespace App\Http\Controllers\Api\V1_0\xiao;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Api\V1_0\xiao\Delegate;

class DelegateController extends Controller
{
    /**
     * @apiDefine GroupNamcsjds 小后台任务委派Api
     */

    /**
     * @api {get} api/1.0.0/delehous 查看所有委派者
     * @apiName delehous
     * @apiGroup GroupNamcsjds
     *
     *
     * @apiSampleRequest http://192.168.1.220/fang/public/api/1.0.0/delehous
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
    public function delehous()
    {
        header( 'Access-Control-Allow-Origin:*' );
        $data = Delegate::get_all_hous();
        if($data){
            return [
                "code" => "101",
                "mag"=> "请求成功",
                "result" => $data,
            ];
        }else{
            return [
                "code" => "102",
                "mag"=> "请求失败",
            ];
        }
    }
    /**
     * @api {post} api/1.0.0/deleadd 添加委派者
     * @apiName deleadd
     * @apiGroup GroupNamcsjds
     *
     * @apiParam (参数) {int} hous_id 置业顾问id
     * @apiParam (参数) {string} remarks 派遣内容
     * @apiParam (参数) {int} appointees 派遣者id
     *
     * @apiSampleRequest http://192.168.1.220/fang/public/api/1.0.0/deleadd
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
    public function deleadd(Request $api)
    {
        header( 'Access-Control-Allow-Origin:*' );
        $data['hous_id'] = $hous_id = $api -> input('hous_id');
        $data['remarks'] = $remarks = $api -> input('remarks');
        $data['appointees'] = $appointees = $api -> input('appointees');
        $data['created_at'] = time();
        if(!$hous_id || !$remarks || !$appointees){
             return [
                    "code" => "103",
                    "msg"=> "参数不全",
             ];
        }
        $data = Delegate::add_d_dele($data);
        if($data){
            return [
                "code" => "101",
                "msg"=> "请求成功",
            ];
        }else{
            return [
                "code" => "102",
                "msg"=> "请求失败",
            ];
        }
    }
    /**
     * @api {post} api/1.0.0/deleshow 任务委派列表
     * @apiName deleshow
     * @apiGroup GroupNamcsjds
     *
     * @apiParam (参数) {int} page 页码
     *
     * @apiSampleRequest http://192.168.1.220/fang/public/api/1.0.0/deleshow
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
    public function deleshow(Request $api)
    {
        header( 'Access-Control-Allow-Origin:*' );
        $page = $api -> input('page');
        $data['deleshow'] = Delegate::get_all_dele($page);
        $data['count'] = Delegate::get_all_count();
        $data['zongye'] = ceil($data['count']/10);
        $data['deleshow']=array_values( $data['deleshow']);
        if($data){
            return [
                "code" => "101",
                "msg"=> "请求成功",
                "result" => $data,
            ];
        }else{
            return [
                "code" => "102",
                "msg"=> "请求失败",
            ];
        }
    }
    /**
     * @api {post} api/1.0.0/deledsit 任务委派详情
     * @apiName deledsit
     * @apiGroup GroupNamcsjds
     *
     * @apiParam (参数) {int} gate_id 委派id
     *
     * @apiSampleRequest http://192.168.1.220/fang/public/api/1.0.0/deledsit
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
    public function deledsit(Request $api)
    {
        header( 'Access-Control-Allow-Origin:*' );
        $gate_id = $api ->input('gate_id');
        if(!$gate_id){
            return [
                "code" => "103",
                "msg"=> "参数不全",
            ];
        }
        $data = Delegate::get_d_dele($gate_id);
        if($data){
            return [
                "code" => "101",
                "msg"=> "请求成功",
                "result" => $data,
            ];
        }else{
            return [
                "code" => "102",
                "msg"=> "请求失败",
            ];
        }
    }
    /**
     * @api {post} api/1.0.0/deleedit 任务委派修改
     * @apiName deleedit
     * @apiGroup GroupNamcsjds
     *
     * @apiParam (参数) {int} gate_id 委派id
     * @apiParam (参数) {int} hous_id 置业顾问id
     * @apiParam (参数) {string} remarks 派遣内容
     * @apiParam (参数) {int} appointees 派遣者id
     *
     * @apiSampleRequest http://192.168.1.220/fang/public/api/1.0.0/deleedit
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
    public function deleedit(Request $api)
    {
        header( 'Access-Control-Allow-Origin:*' );
        $data['hous_id'] = $hous_id = $api -> input('hous_id');
        $data['remarks'] = $remarks = $api -> input('remarks');
        $data['appointees'] = $appointees = $api -> input('appointees');
        $data['updated_at'] = time();
        $gate_id = $api ->input('gate_id');
        if(!$gate_id){
            return [
                "code" => "103",
                "msg"=> "参数不全",
            ];
        }
        $data = Delegate::edit_d_dele($gate_id,$data);
        if($data){
            return [
                "code" => "101",
                "msg"=> "请求成功",
            ];
        }else{
            return [
                "code" => "102",
                "msg"=> "请求失败",
            ];
        }
    }
    /**
     * @api {post} api/1.0.0/deledel 任务委派删除
     * @apiName deledel
     * @apiGroup GroupNamcsjds
     *
     * @apiParam (参数) {int} gate_id 委派id
     *
     * @apiSampleRequest http://192.168.1.220/fang/public/api/1.0.0/deledel
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
    public function deledel(Request $api)
    {
        header( 'Access-Control-Allow-Origin:*' );
        $gate_id = $api ->input('gate_id');
        if(!$gate_id){
            return [
                "code" => "103",
                "msg"=> "参数不全",
            ];
        }
        $data = Delegate::del_d_dele($gate_id);
        if($data){
            return [
                "code" => "101",
                "msg"=> "请求成功",
            ];
        }else{
            return [
                "code" => "102",
                "msg"=> "请求失败",
            ];
        }
    }
    /**
     * @api {post} api/1.0.0/delealldel 任务委派全选删除
     * @apiName delealldel
     * @apiGroup GroupNamcsjds
     *
     * @apiParam (参数) {int} gate_id 委派id
     *
     * @apiSampleRequest http://192.168.1.220/fang/public/api/1.0.0/delealldel
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
    public function delealldel(Request $api)
    {
        header( 'Access-Control-Allow-Origin:*' );
        $gate_id =$api -> input('gate_id');
        $pieceses=trim($gate_id,',');
        $pieces = explode(",", $pieceses);
        if(!$pieces){
            return [
                "code" => "103",
                "msg"=> "参数不全",
            ];
        }
        $data = Delegate::del_all_dele($pieces);
        if($data){
            return [
                "code" => "101",
                "msg"=> "请求成功",
            ];
        }else{
            return [
                "code" => "102",
                "msg"=> "请求失败",
            ];
        }
    }
}
