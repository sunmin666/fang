<?php

namespace App\Http\Controllers\Api\V1_0\xiao;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Api\V1_0\xiao\Knowle;

class KnowleController extends Controller
{
    /**
     * @apiDefine GroupNamejdsd 小后台营销知识库Api
     */

    /**
     * @api {post} api/1.0.0/knowleadd 添加营销知识库
     * @apiName knowleadd
     * @apiGroup GroupNamejdsd
     *
     * @apiParam (参数) {int} class_id 营销知识库分类
     * @apiParam (参数) {string} title 知识库标题
     * @apiParam (参数) {string} content 知识库内容
     * @apiParam (参数) {int} hous_id 添加人
     *
     * @apiSampleRequest http://192.168.1.220/fang/public/api/1.0.0/knowleadd
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
    public function knowleadd(Request $api)
    {
        header( 'Access-Control-Allow-Origin:*' );
        $data['class_id'] = $class_id = $api -> input('class_id');
        $data['title'] = $title = $api -> input('title');
        $data['content'] = $content = $api -> input('content');
        $data['hous_id'] = $hous_id = $api -> input('hous_id');
        $data['created_at'] =time();
        if(!$class_id ||!$title || !$content || !$hous_id ){
            return [
                'code' => '103',
                'msg' => '参数不全',
            ];
        }
        $data = Knowle::insert_d_know($data);
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
     * @api {post} api/1.0.0/knowleshow 营销知识库列表
     * @apiName knowleshow
     * @apiGroup GroupNamejdsd
     *
     * @apiParam (参数) {string} [class_id] 分类筛选
     * @apiParam (参数) {int} page 页码
     *
     * @apiSampleRequest http://192.168.1.220/fang/public/api/1.0.0/knowleshow
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
    public function knowleshow(Request $api)
    {
        header( 'Access-Control-Allow-Origin:*' );
        $page = $api -> input('page');
        $class_id = $api -> input('class_id');
        $data['know'] = Knowle::get_all_knowel($page,$class_id);
        $data['count'] = Knowle::get_all_count();
        $data['zongye'] = ceil($data['count']/10);
        $data['know']=array_values( $data['know']);
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
     * @api {post} api/1.0.0/knowdetails 营销知识库详情
     * @apiName knowdetails
     * @apiGroup GroupNamejdsd
     *
     * @apiParam (参数) {int} know_id 营销知识库id
     *
     * @apiSampleRequest http://192.168.1.220/fang/public/api/1.0.0/knowdetails
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
    public function knowdetails(Request $api)
    {
        header( 'Access-Control-Allow-Origin:*' );
        $know_id = $api -> input('know_id');
        if(!$know_id){
            return [
                'code' => '103',
                'msg' => '参数不全',
            ];
        }
        $data = Knowle::get_d_knowle($know_id);
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
     * @api {post} api/1.0.0/knowledit 营销知识库修改
     * @apiName knowledit
     * @apiGroup GroupNamejdsd
     *
     * @apiParam (参数) {int} know_id 营销知识库id
     * @apiParam (参数) {int} class_id 营销知识库分类
     * @apiParam (参数) {string} title 知识库标题
     * @apiParam (参数) {string} content 知识库内容
     *
     * @apiSampleRequest http://192.168.1.220/fang/public/api/1.0.0/knowledit
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
    public function knowledit(Request $api)
    {
        header( 'Access-Control-Allow-Origin:*' );
        $know_id = $api -> input('know_id');
        $data['class_id'] = $api -> input('class_id');
        $data['title'] = $api -> input('title');
        $data['content'] = $api -> input('content');
        if(!$know_id){
            return [
                'code' => '103',
                'msg' => '参数不全',
            ];
        }
        $data= Knowle::edit_d_konw($know_id,$data);
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
     * @api {post} api/1.0.0/knowledel 营销知识库删除
     * @apiName knowledel
     * @apiGroup GroupNamejdsd
     *
     * @apiParam (参数) {int} know_id 营销知识库id
     *
     * @apiSampleRequest http://192.168.1.220/fang/public/api/1.0.0/knowledel
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
    public function knowledel(Request $api)
    {
        header( 'Access-Control-Allow-Origin:*' );
        $know_id = $api -> input('know_id');
        if(!$know_id){
            return [
                'code' => '103',
                'msg' => '参数不全',
            ];
        }
        $data = Knowle::del_d_know($know_id);
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
     * @api {post} api/1.0.0/knowalldel 营销知识库全选删除
     * @apiName knowalldel
     * @apiGroup GroupNamejdsd
     *
     * @apiParam (参数) {int} know_id 营销知识库id
     *
     * @apiSampleRequest http://192.168.1.220/fang/public/api/1.0.0/knowalldel
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
    public function knowalldel(Request $api)
    {
        header( 'Access-Control-Allow-Origin:*' );
        $know_id = $api -> input('know_id');
        $pieceses=trim($know_id,',');
        $pieces = explode(",", $pieceses);
        if(!$pieces){
            return [
                'code' => '103',
                'msg' => '参数不全',
            ];
        }
        $data = Knowle::del_all_know($pieces);
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
     * @api {get} api/1.0.0/knowclass 营销知识库分类
     * @apiName knowclass
     * @apiGroup GroupNamejdsd
     *
     *
     * @apiSampleRequest http://192.168.1.220/fang/public/api/1.0.0/knowclass
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
    public function knowclass()
    {
        header( 'Access-Control-Allow-Origin:*' );
        $a=19;
        $data = Knowle::get_all_kno($a);
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
}
