<?php

namespace App\Http\Controllers\Api\V1_0\xiao;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Api\V1_0\xiao\Picalbum;

class PicalbumController extends Controller
{
    /**
     * @apiDefine GroupNamejdkc 小后台楼盘相册Api
     */

    /**
     * @api {get} api/1.0.0/picclasss 楼盘相册分类
     * @apiName picclasss
     * @apiGroup GroupNamejdkc
     *
     * @apiSampleRequest http://192.168.1.220/fang/public/api/1.0.0/picclasss
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
      public function picclasss()
      {
          $a =142;
          $data = Picalbum::get_all_class($a);
          if($data){
              return [
                  'code' => 101,
                  'msg' => '请求成功',
                  "result"=> $data,
              ];
          }else{
              return [
                  'code' => 102,
                  'msg' => '请求失败',
              ];
          }
      }
    /**
     * @api {post} api/1.0.0/lingasss 户型分类
     * @apiName lingasss
     * @apiGroup GroupNamejdkc
     *
     * @apiParam (参数) {int} field_id 户型图id
     *
     * @apiSampleRequest http://192.168.1.220/fang/public/api/1.0.0/lingasss
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
    public function lingasss(Request $api)
    {
        $field_id = $api -> input('field_id');
        $data = Picalbum::get_all_class($field_id);
        if($data){
            return [
                'code' => 101,
                'msg' => '请求成功',
                "result"=> $data,
            ];
        }else{
            return [
                'code' => 102,
                'msg' => '请求失败',
            ];
        }
    }
    /**
     * @api {post} api/1.0.0/houseroom 居室分类
     * @apiName houseroom
     * @apiGroup GroupNamejdkc
     *
     * @apiParam (参数) {int} field_id 户型id
     *
     * @apiSampleRequest http://192.168.1.220/fang/public/api/1.0.0/houseroom
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
    public function houseroom(Request $api)
    {
        $field_id = $api -> input('field_id');
        $data = Picalbum::get_all_class($field_id);
        if($data){
            return [
                'code' => 101,
                'msg' => '请求成功',
                "result"=> $data,
            ];
        }else{
            return [
                'code' => 102,
                'msg' => '请求失败',
            ];
        }
    }

    /**
     * @api {post} api/1.0.0/picaladd 楼盘相册添加
     * @apiName picaladd
     * @apiGroup GroupNamejdkc
     *
     * @apiParam (参数) {int} class_id 楼盘相册分类
     * @apiParam (参数) {string} imgpath 楼盘相册图片
     * @apiParam (参数) {string} review 点评
     * @apiParam (参数) {string} picname 图片名称
     * @apiParam (参数) {int} [ling_room] 添加户型图需要添加户型
     * @apiParam (参数) {int} [house_room] 添加户型图需要添加居室
     * @apiParam (参数) {int} [area_room] 添加户型图需要添加面积
     *
     * @apiSampleRequest http://192.168.1.220/fang/public/api/1.0.0/picaladd
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
    public function picaladd(Request $api)
    {
        $data['class_id'] = $class_id = $api -> input('class_id');
        $data['imgpath'] = $imgpath = $api -> input('imgpath');
        $data['review'] = $review = $api -> input('review');
        $data['picname'] = $picname = $api -> input('picname');
        $data['ling_room'] = $ling_room = $api -> input('ling_room');
        $data['area_room'] = $area_room = $api -> input('area_room');
        $data['house_room'] = $house_room = $api -> input('house_room');
        $data['created_at'] =time();
        if(!$class_id || !$imgpath || !$review || !$picname){
            return [
                'code' => 103,
                'msg' => '参数不全',
            ];
        }
        $data = Picalbum::add_d_pical($data);
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
 * @api {post} api/1.0.0/rendering 效果图列表
 * @apiName rendering
 * @apiGroup GroupNamejdkc
 *
 * @apiParam (参数) {int} page 页码
 *
 * @apiSampleRequest http://192.168.1.220/fang/public/api/1.0.0/rendering
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
    public function rendering(Request $api)
    {
        $a = 144;
        $page = $api -> input('page');
        $data['rendshow'] = Picalbum::get_all_rendering($a,$page);
        $data['count'] = Picalbum::get_rendering_count($a);
        $data['zongye'] = ceil($data['count']/10);
        $data['rendshow']=array_values( $data['rendshow']);
        if($data){
            return [
                'code' => 101,
                'msg' => '请求成功',
                "result" => $data,
            ];
        }else{
            return [
                'code' => 102,
                'msg' => '请求失败',
            ];
        }
    }
    /**
     * @api {post} api/1.0.0/renddeis 效果图/位置交通图/社区实景/样板间/周边配套/详情
     * @apiName renddeis
     * @apiGroup GroupNamejdkc
     *
     * @apiParam (参数) {int} pic_id 楼盘相册id
     *
     * @apiSampleRequest http://192.168.1.220/fang/public/api/1.0.0/renddeis
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
    public function renddeis(Request $api)
    {
        $pic_id = $api -> input('pic_id');
        if(!$pic_id){
            return [
                'code' => 103,
                'msg' => '参数不全',
            ];
        }
        $data = Picalbum::get_d_renddeis($pic_id);
        if($data){
            return [
                'code' => 101,
                'msg' => '请求成功',
                "result" => $data,
            ];
        }else{
            return [
                'code' => 102,
                'msg' => '请求失败',
            ];
        }
    }

    /**
     * @api {post} api/1.0.0/position 位置交通图列表
     * @apiName position
     * @apiGroup GroupNamejdkc
     *
     * @apiParam (参数) {int} page 页码
     *
     * @apiSampleRequest http://192.168.1.220/fang/public/api/1.0.0/position
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
    public function position(Request $api)
    {
        $a = 145;
        $page = $api -> input('page');
        $data['rendshow'] = Picalbum::get_all_rendering($a,$page);
        $data['count'] = Picalbum::get_rendering_count($a);
        $data['zongye'] = ceil($data['count']/10);
        $data['rendshow']=array_values( $data['rendshow']);
        if($data){
            return [
                'code' => 101,
                'msg' => '请求成功',
                "result" => $data,
            ];
        }else{
            return [
                'code' => 102,
                'msg' => '请求失败',
            ];
        }
    }
    /**
     * @api {post} api/1.0.0/community 社区实景列表
     * @apiName community
     * @apiGroup GroupNamejdkc
     *
     * @apiParam (参数) {int} page 页码
     *
     * @apiSampleRequest http://192.168.1.220/fang/public/api/1.0.0/community
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
    public function community(Request $api)
    {
        $a = 146;
        $page = $api -> input('page');
        $data['rendshow'] = Picalbum::get_all_rendering($a,$page);
        $data['count'] = Picalbum::get_rendering_count($a);
        $data['zongye'] = ceil($data['count']/10);
        $data['rendshow']=array_values( $data['rendshow']);
        if($data){
            return [
                'code' => 101,
                'msg' => '请求成功',
                "result" => $data,
            ];
        }else{
            return [
                'code' => 102,
                'msg' => '请求失败',
            ];
        }
    }
    /**
     * @api {post} api/1.0.0/samroom 样板间列表
     * @apiName samroom
     * @apiGroup GroupNamejdkc
     *
     * @apiParam (参数) {int} page 页码
     *
     * @apiSampleRequest http://192.168.1.220/fang/public/api/1.0.0/samroom
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
    public function samroom(Request $api)
    {
        $a = 147;
        $page = $api -> input('page');
        $data['rendshow'] = Picalbum::get_all_rendering($a,$page);
        $data['count'] = Picalbum::get_rendering_count($a);
        $data['zongye'] = ceil($data['count']/10);
        $data['rendshow']=array_values( $data['rendshow']);
        if($data){
            return [
                'code' => 101,
                'msg' => '请求成功',
                "result" => $data,
            ];
        }else{
            return [
                'code' => 102,
                'msg' => '请求失败',
            ];
        }
    }
    /**
     * @api {post} api/1.0.0/surrounding 周边配套列表
     * @apiName surrounding
     * @apiGroup GroupNamejdkc
     *
     * @apiParam (参数) {int} page 页码
     *
     * @apiSampleRequest http://192.168.1.220/fang/public/api/1.0.0/surrounding
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
    public function surrounding(Request $api)
    {
        $a = 148;
        $page = $api -> input('page');
        $data['rendshow'] = Picalbum::get_all_rendering($a,$page);
        $data['count'] = Picalbum::get_rendering_count($a);
        $data['zongye'] = ceil($data['count']/10);
        $data['rendshow']=array_values( $data['rendshow']);
        if($data){
            return [
                'code' => 101,
                'msg' => '请求成功',
                "result" => $data,
            ];
        }else{
            return [
                'code' => 102,
                'msg' => '请求失败',
            ];
        }
    }
    /**
     * @api {post} api/1.0.0/houshome 户型图列表
     * @apiName houshome
     * @apiGroup GroupNamejdkc
     *
     * @apiParam (参数) {int} page 页码
     *
     * @apiSampleRequest http://192.168.1.220/fang/public/api/1.0.0/houshome
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
    public function houshome(Request $api)
    {
        $a = 143;
        $page = $api -> input('page');
        $data['houshshow'] = Picalbum::get_d_houshome($a,$page);
        $data['count'] = Picalbum::get_rendering_count($a);
        $data['zongye'] = ceil($data['count']/10);
        $data['houshshow']=array_values( $data['houshshow']);
        if($data){
            return [
                'code' => 101,
                'msg' => '请求成功',
                "result" => $data,
            ];
        }else{
            return [
                'code' => 102,
                'msg' => '请求失败',
            ];
        }
    }

}
