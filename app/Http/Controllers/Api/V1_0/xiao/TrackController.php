<?php

namespace App\Http\Controllers\Api\V1_0\xiao;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Api\V1_0\xiao\Track;

class TrackController extends Controller
{
    /**
     * @apiDefine GroupNamssjds 小后台跟踪来访Api
     */

    /**
     * @api {post} api/1.0.0/trackadd 跟踪来访添加
     * @apiName trackadd
     * @apiGroup GroupNamssjds
     *
     * @apiParam (参数) {int} cust_id 客户id
     * @apiParam (参数) {int} hous_id 置业顾问id
     * @apiParam (参数) {int} track_type 访问类型，1跟踪，0来访
     * @apiParam (参数) {string} content 跟踪或来访内容
     *
     * @apiSampleRequest http://192.168.1.220/fang/public/api/1.0.0/trackadd
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
    public function trackadd(Request $api)
    {
        header( 'Access-Control-Allow-Origin:*' );
        $data['cust_id'] =$cust_id = $api -> input('cust_id');
        $data['hous_id'] =$hous_id = $api -> input('hous_id');
        $data['track_type'] =$track_type = $api -> input('track_type');
        $data['content'] =$content = $api -> input('content');
        $data['track_time'] =time();
        $data['created_at'] =time();
        if(!$cust_id || !$hous_id || !$track_type || !$content){
            return [
                'code' => '103',
                'msg' => '参数不全',
            ];
        }
        $data = Track::add_d_track($data);
        if($data){
            return [
                'code' => '101',
                'msg' => '请求成功',
            ];
        }else{
            return [
                'code' => '102',
                'msg' => '请求失败',
            ];
        }
     }
    /**
     * @api {post} api/1.0.0/trackshow 跟踪来访列表
     * @apiName trackshow
     * @apiGroup GroupNamssjds
     *
     * @apiParam (参数) {int} page 页码
     * @apiParam (参数) {int} [hous_id] 置业顾问筛选
     * @apiParam (参数) {int} [track_type] 访问类型筛选，1跟踪，0来访
     *
     * @apiSampleRequest http://192.168.1.220/fang/public/api/1.0.0/trackshow
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
    public function trackshow(Request $api)
    {
        header( 'Access-Control-Allow-Origin:*' );
        $page = $api -> input('page');
        $hous_id = $api -> input('hous_id');
        $track_type = $api -> input('track_type');
        $data['trackshow'] = Track::get_all_tra($page,$hous_id,$track_type);
        $data['count'] = Track::get_all_count();
        $data['zongye'] = ceil($data['count']/10);
        $data['trackshow']=array_values( $data['trackshow']);
        if($data){
            return [
                'code' => '101',
                'msg' => '请求成功',
                "result" => $data,
            ];
        }else{
            return [
                'code' => '102',
                'msg' => '请求失败',
            ];
        }
    }
    /**
     * @api {post} api/1.0.0/trackedit 跟踪来访修改
     * @apiName trackedit
     * @apiGroup GroupNamssjds
     * @apiParam (参数) {int} trackid 跟踪来访id
     * @apiParam (参数) {int} hous_id 置业顾问idtrackid
     * @apiParam (参数) {int} track_type 访问类型，1跟踪，0来访
     * @apiParam (参数) {string} content 跟踪或来访内容
     *
     * @apiSampleRequest http://192.168.1.220/fang/public/api/1.0.0/trackedit
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
    public function trackedit(Request $api)
    {
        header( 'Access-Control-Allow-Origin:*' );
        $data['hous_id'] =$hous_id = $api -> input('hous_id');
        $data['track_type'] =$track_type = $api -> input('track_type');
        $data['content'] =$content = $api -> input('content');
        $data['updated_at'] =time();
        $trackid = $api -> input('trackid');
        if(!$trackid){
            return [
                'code' => '103',
                'msg' => '参数不全',
            ];
        }
        $data = Track::edit_d_tra($trackid,$data);
        if($data){
            return [
                'code' => '101',
                'msg' => '请求成功',
            ];
        }else{
            return [
                'code' => '102',
                'msg' => '请求失败',
            ];
        }
    }
    /**
     * @api {post} api/1.0.0/trackdsit 跟踪来访详情
     * @apiName trackdsit
     * @apiGroup GroupNamssjds
     *
     * @apiParam (参数) {int} trackid 跟踪来访id
     *
     * @apiSampleRequest http://192.168.1.220/fang/public/api/1.0.0/trackdsit
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
    public function trackdsit(Request $api)
    {
        header( 'Access-Control-Allow-Origin:*' );
        $trackid = $api -> input('trackid');
        if(!$trackid){
            return [
                'code' => '103',
                'msg' => '参数不全',
            ];
        }
        $data = Track::get_d_tra($trackid);
        if($data){
            return [
                'code' => '101',
                'msg' => '请求成功',
                "result"=> $data,
            ];
        }else{
            return [
                'code' => '102',
                'msg' => '请求失败',
            ];
        }
    }
    /**
     * @api {post} api/1.0.0/trackdel 跟踪来访删除
     * @apiName trackdel
     * @apiGroup GroupNamssjds
     *
     * @apiParam (参数) {int} trackid 跟踪来访id
     *
     * @apiSampleRequest http://192.168.1.220/fang/public/api/1.0.0/trackdel
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
    public function trackdel(Request $api)
    {
        header( 'Access-Control-Allow-Origin:*' );
        $trackid = $api -> input('trackid');
        if(!$trackid){
            return [
                'code' => '103',
                'msg' => '参数不全',
            ];
        }
        $data = Track::del_d_track($trackid);
        if($data){
            return [
                'code' => '101',
                'msg' => '请求成功',
            ];
        }else{
            return [
                'code' => '102',
                'msg' => '请求失败',
            ];
        }
    }
    /**
     * @api {post} api/1.0.0/trackalldel 跟踪来访全选删除
     * @apiName trackalldel
     * @apiGroup GroupNamssjds
     *
     * @apiParam (参数) {int} trackid 跟踪来访id
     *
     * @apiSampleRequest http://192.168.1.220/fang/public/api/1.0.0/trackalldel
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
    public function trackalldel(Request $api)
    {
        header( 'Access-Control-Allow-Origin:*' );
        $trackid =$api -> input('trackid');
        $pieceses=trim($trackid,',');
        $pieces = explode(",", $pieceses);
        if(!$pieces){
            return [
                'code' => '103',
                'msg' => '参数不全',
            ];
        }
        $data = Track::del_all_tra($pieces);
        if($data){
            return [
                'code' => '101',
                'msg' => '请求成功',
            ];
        }else{
            return [
                'code' => '102',
                'msg' => '请求失败',
            ];
        }
    }
}
