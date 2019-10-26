<?php

namespace App\Http\Controllers\Api\V1_0\xiao;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Api\V1_0\xiao\Coowner;

class CoownerController extends Controller
{
    /**
     * @apiDefine GroupNamsejds 小后台共有人Api
     */

    /**
     * @api {post} api/1.0.0/coowneradd 添加共有人
     * @apiName coowneradd
     * @apiGroup GroupNamsejds
     *
     * @apiParam (参数) {int} cust_id 客户id
     * @apiParam (参数) {int} relation 共有人与客户的关系0=配偶 1=儿子 2=女儿 3=父亲 4=母亲 5=亲戚
     * @apiParam (参数) {string} realname 共有人姓名
     * @apiParam (参数) {int} sex 共有人性别
     * @apiParam (参数) {int} birthday 共有人生日
     * @apiParam (参数) {int} idcard 共有人身份证号
     * @apiParam (参数) {int} mobile 共有人手机号
     *
     * @apiSampleRequest http://192.168.1.220/fang/public/api/1.0.0/coowneradd
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
    public function coowneradd(Request $api)
    {
        header( 'Access-Control-Allow-Origin:*' );
        $data['cust_id'] = $cust_id = $api -> input('cust_id');
        $data['relation'] = $relation = $api -> input('relation');
        $data['realname'] = $realname= $api -> input('realname');
        $data['sex'] = $sex= $api -> input('sex');
        $data['birthday'] = $birthday= strtotime($api -> input('birthday'));
        $data['idcard'] = $idcard= $api -> input('idcard');
        $data['mobile'] = $mobile= $api -> input('mobile');
        $data['created_at'] = time();
        if(!$cust_id || $relation=='' || !$realname || $sex=='' || !$birthday || !$idcard || !$mobile){
            return [
                'code' => 103,
                'msg' => '参数不全',
            ];
        }
        $info = Coowner::idcard_d_coow($idcard);
        if($info){
            return [
                'code' => 104,
                'msg' => '身份证号码已存在',
            ];
        }
        $infodd = Coowner::mobile_d_coow($mobile);
        if($infodd){
            return [
                'code' => 105,
                'msg' => '手机号码已存在',
            ];
        }
        $data = Coowner::add_d_coow($data);
        if($data){
            return [
                'code' => 101,
                'msg' => '请求成功',
            ];
        }else{
            return [
                'code' => 101,
                'msg' => '请求失败',
            ];
        }
    }
    /**
     * @api {post} api/1.0.0/coowshow 共有人列表
     * @apiName coowshow
     * @apiGroup GroupNamsejds
     *
     * @apiParam (参数) {int} page 页码
     * @apiParam (参数) {string} realname 共有人分类筛选
     * @apiParam (参数) {int} mobile 共有人手机号
     *
     * @apiSampleRequest http://192.168.1.220/fang/public/api/1.0.0/coowshow
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
    public function coowshow(Request $api)
    {
        header( 'Access-Control-Allow-Origin:*' );
        $page = $api -> input('page');
        $realname = $api -> input('realname');
        $mobile = $api -> input('mobile');
        $data['coowshow'] = Coowner::get_all_coow($page,$realname,$mobile);
        $data['count'] = Coowner::get_all_count();
        $data['zongye'] = ceil($data['count']/10);
        $data['coowshow']=array_values( $data['coowshow']);
        if($data){
            return [
                'code' => 101,
                'msg' => '请求成功',
                "result"=>$data,
            ];
        }else{
            return [
                'code' => 101,
                'msg' => '请求失败',
            ];
        }
    }
    /**
     * @api {post} api/1.0.0/coowdesit 共有人详情
     * @apiName coowdesit
     * @apiGroup GroupNamsejds
     *
     * @apiParam (参数) {int} coow_id 共有人id
     *
     * @apiSampleRequest http://192.168.1.220/fang/public/api/1.0.0/coowdesit
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
    public function coowdesit(Request $api)
    {
        header( 'Access-Control-Allow-Origin:*' );
        $coow_id = $api -> input('coow_id');
        if(!$coow_id){
            return [
                'code' => 103,
                'msg' => '参数不全',
            ];
        }
        $data = Coowner::get_d_coow($coow_id);
        if($data){
            return [
                'code' => 101,
                'msg' => '请求成功',
                "result"=>$data,
            ];
        }else{
            return [
                'code' => 101,
                'msg' => '请求失败',
            ];
        }
    }
    /**
     * @api {post} api/1.0.0/coowdedit 共有人修改
     * @apiName coowdedit
     * @apiGroup GroupNamsejds
     *
     * @apiParam (参数) {int} coow_id 共有人id
     * @apiParam (参数) {int} relation 共有人与客户的关系
     * @apiParam (参数) {string} realname 共有人姓名
     * @apiParam (参数) {int} sex 共有人性别
     * @apiParam (参数) {int} birthday 共有人生日
     * @apiParam (参数) {int} idcard 共有人身份证号
     * @apiParam (参数) {int} mobile 共有人手机号
     *
     * @apiSampleRequest http://192.168.1.220/fang/public/api/1.0.0/coowdedit
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
    public function coowdedit(Request $api)
    {
        header( 'Access-Control-Allow-Origin:*' );
        $data['relation'] = $relation = $api -> input('relation');
        $data['realname'] = $realname= $api -> input('realname');
        $data['sex'] = $sex= $api -> input('sex');
        $data['birthday'] = $birthday= strtotime($api -> input('birthday'));
        $data['idcard'] = $idcard= $api -> input('idcard');
        $data['mobile'] = $mobile= $api -> input('mobile');
        $data['updated_at'] = time();
        $coow_id =$api -> input('coow_id');
        if(!$coow_id){
            return [
                'code' => 103,
                'msg' => '参数不全',
            ];
        }
        $data = Coowner::edit_d_coow($coow_id,$data);
        if($data){
            return [
                'code' => 101,
                'msg' => '请求成功',
            ];
        }else{
            return [
                'code' => 101,
                'msg' => '请求失败',
            ];
        }
    }
    /**
     * @api {post} api/1.0.0/coowddel 共有人删除
     * @apiName coowddel
     * @apiGroup GroupNamsejds
     *
     * @apiParam (参数) {int} coow_id 共有人id
     *
     * @apiSampleRequest http://192.168.1.220/fang/public/api/1.0.0/coowddel
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
    public function coowddel(Request $api)
    {
        header( 'Access-Control-Allow-Origin:*' );
        $coow_id =$api -> input('coow_id');
        if(!$coow_id){
            return [
                'code' => 103,
                'msg' => '参数不全',
            ];
        }
        $data = Coowner::del_d_coow($coow_id);
        if($data){
            return [
                'code' => 101,
                'msg' => '请求成功',
            ];
        }else{
            return [
                'code' => 101,
                'msg' => '请求失败',
            ];
        }
    }
    /**
     * @api {post} api/1.0.0/coowdalldel 共有人全选删除
     * @apiName coowdalldel
     * @apiGroup GroupNamsejds
     *
     * @apiParam (参数) {int} coow_id 共有人id
     *
     * @apiSampleRequest http://192.168.1.220/fang/public/api/1.0.0/coowdalldel
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
    public function coowdalldel(Request $api)
    {
        header( 'Access-Control-Allow-Origin:*' );
        $coow_id =$api -> input('coow_id');
        $pieceses=trim($coow_id,',');
        $pieces = explode(",", $pieceses);
        if(!$pieces){
            return [
                'code' => 103,
                'msg' => '参数不全',
            ];
        }
        $data = Coowner::del_all_coow($pieces);
        if($data){
            return [
                'code' => 101,
                'msg' => '请求成功',
            ];
        }else{
            return [
                'code' => 101,
                'msg' => '请求失败',
            ];
        }
    }
}
