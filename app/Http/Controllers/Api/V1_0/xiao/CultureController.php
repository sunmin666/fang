<?php

namespace App\Http\Controllers\Api\V1_0\xiao;

use App\Models\admin\Cultrue;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Api\V1_0\xiao\Culture;

class CultureController extends Controller
{
    /**
     * @apiDefine GroupNamejdgc 小后台企业文化管理
     */

    /**
     * @api {post} api/1.0.0/culturemany 单文件上传图片
     * @apiName culturemany
     * @apiGroup GroupNamejdgc
     *
     * @apiParam (参数) {file} image 图片
     *
     * @apiSampleRequest http://192.168.1.220/fang/public/api/1.0.0/culturemany
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
    public function culturemany(Request $api)
    {
        header( 'Access-Control-Allow-Origin:*' );
        if($_FILES){
            $file = $_FILES;
            $file_size = $file['image']['size'];              //文件大小(数组)
            $file_name = $file['image']['name'];              //文件新名称
            $file_type = $file['image']['type'];
            $file_tmp_name = $file['image']['tmp_name'];
            $allow_file_type = array('image/jpeg', 'image/jpg', 'image/png');  //允许上传的类型
                if($file_size < 2*1024*1024)
                {
                    if(in_array($file_type, $allow_file_type))
                    {
                        $file_name_arr = explode(".",$file_name);
                        $ext = end($file_name_arr);
                        $new_name = date("Ymds").rand(10000,99999).'.'.$ext;
                        $str = URL('').'/uploads/'.$new_name;
                        move_uploaded_file($file_tmp_name, './uploads/' . iconv('UTF-8', 'UTF-8', $new_name));
                    }else
                    {
                        return [
                            'code'  => 123,
                            'msg'   => '图片类型不允许上传'
                        ];
                    }
                }else
                {
                    return [
                        'code'   => 465,
                        'msg'    => '图片大小超出范围',
                    ];
                }
            return [
                'code'   => 101,
                'msg'    => '上传成功',
                'result'    => $str,
            ];
        }

    }


    //企业文化添加
    /**
     * @api {post} api/1.0.0/culturadd 企业文化添加
     * @apiName culturadd
     * @apiGroup GroupNamejdgc
     *
     * @apiParam (参数) {int} class_id 企业文化分类
     * @apiParam (参数) {string} imgpath 企业文化图片
     * @apiParam (参数) {string} title 企业文化标题
     *
     * @apiSampleRequest http://192.168.1.220/fang/public/api/1.0.0/culturadd
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
    public function culturadd(Request $api)
    {

        header( 'Access-Control-Allow-Origin:*' );
        $data['class_id'] = $class_id =$api ->input('class_id');
        $data['imgpath'] = $imgpath =$api ->input('imgpath');
        $data['title'] = $title =$api ->input('title');
        $data['created_at'] =time();
        if(!$class_id || !$imgpath || !$title){
            return [
                'code'   => 103,
                'msg'    => '参数不全',
            ];
        }
        $data = Culture::add_d_cult($data);
        if($data){
            return [
                'code'   => 101,
                'msg'    => '请求成功',
            ];
        }else{
            return [
                'code'   => 102,
                'msg'    => '请求失败',
            ];
        }
    }
    /**
     * @api {post} api/1.0.0/culdetails 企业文化详情
     * @apiName culdetails
     * @apiGroup GroupNamejdgc
     *
     * @apiParam (参数) {int} cult_id 企业文化id
     *
     * @apiSampleRequest http://192.168.1.220/fang/public/api/1.0.0/culdetails
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
    public function culdetails(Request $api)
    {
        header( 'Access-Control-Allow-Origin:*' );
        $cult_id = $api -> input('cult_id');
        if(!$cult_id){
            return [
                'code'   => 103,
                'msg'    => '参数不全',
            ];
        }
        $data=Culture::get_d_cult($cult_id);
        if($data){
            return[
                'code'   => 101,
                'msg'    => '请求成功',
                "result" => $data,
            ];
        }else{
            return[
                'code'   => 102,
                'msg'    => '请求失败',
            ];
        }

    }
    /**
     * @api {post} api/1.0.0/cullist 企业文化列表
     * @apiName cullist
     * @apiGroup GroupNamejdgc
     *
     * @apiParam (参数) {int} page 页码
     * @apiParam (参数) {int} class_id 分类筛选
     *
     * @apiSampleRequest http://192.168.1.220/fang/public/api/1.0.0/cullist
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
    public function cullist(Request $api)
    {
        header( 'Access-Control-Allow-Origin:*' );
        $page = $api -> input('page');
        $class_id = $api -> input('class_id');
        $data['culshow'] = Culture::get_all_cul($page,$class_id);
        $data['count'] = Culture::get_all_count($class_id);
        $data['zongye'] = ceil($data['count']/10);
        $data['culshow']=array_values( $data['culshow']);
        if($data){
            return[
                'code'   => 101,
                'msg'    => '请求成功',
                "result" => $data,
            ];
        }else{
            return[
                'code'   => 102,
                'msg'    => '请求失败',
            ];
        }
    }
    /**
     * @api {post} api/1.0.0/culedit 企业文化修改
     * @apiName culedit
     * @apiGroup GroupNamejdgc
     *
     * @apiParam (参数) {int} cult_id 企业文化id
     * @apiParam (参数) {int} class_id 企业文化图片分类
     * @apiParam (参数) {string} imgpath 企业文化图片
     * @apiParam (参数) {string} title 企业文化标题
     *
     * @apiSampleRequest http://192.168.1.220/fang/public/api/1.0.0/culedit
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
    public function culedit(Request $api)
    {
        header( 'Access-Control-Allow-Origin:*' );
        $cult_id = $api -> input('cult_id');
        if(!$cult_id){
            return [
                'code'   => 103,
                'msg'    => '参数不全',
            ];
        }
        $data['class_id'] = $api -> input('class_id');
        $data['imgpath'] = $api -> input('imgpath');
        $data['title'] = $api -> input('title');
        $data['updated_at'] = time();
        $data = Culture::edit_d_cul($cult_id,$data);
        if($data){
            return[
                'code'   => 101,
                'msg'    => '请求成功',
            ];
        }else{
            return[
                'code'   => 102,
                'msg'    => '请求失败',
            ];
        }
    }
    /**
     * @api {post} api/1.0.0/culdel 企业文化删除
     * @apiName culdel
     * @apiGroup GroupNamejdgc
     *
     * @apiParam (参数) {int} cult_id 企业文化id
     *
     * @apiSampleRequest http://192.168.1.220/fang/public/api/1.0.0/culdel
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
    public function culdel(Request $api)
    {
        header( 'Access-Control-Allow-Origin:*' );
        $cult_id = $api -> input('cult_id');
        if(!$cult_id){
            return[
                'code'   => 103,
                'msg'    => '参数不全',
            ];
        }
        $data = Culture::del_d_cul($cult_id);
        if($data){
            return[
                'code'   => 101,
                'msg'    => '请求成功',
            ];
        }else{
            return[
                'code'   => 102,
                'msg'    => '请求失败',
            ];
        }
    }
    /**
     * @api {post} api/1.0.0/culalldel 企业全选删除
     * @apiName culalldel
     * @apiGroup GroupNamejdgc
     *
     * @apiParam (参数) {int} cult_id 企业文化id
     *
     * @apiSampleRequest http://192.168.1.220/fang/public/api/1.0.0/culalldel
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
    public function culalldel(Request $api)
    {
        header( 'Access-Control-Allow-Origin:*' );
        $cult_id = $api -> input('cult_id');
        $pieceses=trim($cult_id,',');
        $pieces = explode(",", $pieceses);
        if(!$pieces){
            return [
                'code' => '103',
                'msg' => '参数不全',
            ];
        }
        $data = Culture::del_all_cul($pieces);
        if($data){
            return[
                'code'   => 101,
                'msg'    => '请求成功',
            ];
        }else{
            return[
                'code'   => 102,
                'msg'    => '请求失败',
            ];
        }
    }
    /**
     * @api {post} api/1.0.0/culallfil 企业分类
     * @apiName culallfil
     * @apiGroup GroupNamejdgc
     *
     *
     * @apiSampleRequest http://192.168.1.220/fang/public/api/1.0.0/culallfil
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
    public function culallfil()
    {
        header( 'Access-Control-Allow-Origin:*' );
        $a= 17;
        $data = Culture::get_all_class($a);
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
     * @api {post} api/1.0.0/cultureone 多文件上传图片
     * @apiName cultureone
     * @apiGroup GroupNamejdgc
     *
     * @apiParam (参数) {file} image 图片
     *
     * @apiSampleRequest http://192.168.1.220/fang/public/api/1.0.0/cultureone
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
    public function cultureone()
    {
        header( 'Access-Control-Allow-Origin:*' );
        if($_FILES){
            $file = $_FILES;
            $str = "";
            $file_size = $file['image']['size'];              //文件大小(数组)
            $file_name = $file['image']['name'];              //文件新名称
            $file_type = $file['image']['type'];
            $file_tmp_name = $file['image']['tmp_name'];

            $allow_file_type = array('image/jpeg', 'image/jpg', 'image/png');  //允许上传的类型
            for($a = 0; $a < count($file_size);$a ++){

            if($file_size[$a] < 2*1024*1024)
            {
                if(in_array($file_type[$a], $allow_file_type))
                {
                    $file_name_arr = explode(".",$file_name[$a]);
                    $ext = end($file_name_arr);
                    $new_name = date("Ymds").rand(10000,99999).'.'.$ext;
                    $str = URL('').'/uploads/'.$new_name.'+'.$str;
                    move_uploaded_file($file_tmp_name[$a], './uploads/' . iconv('UTF-8', 'UTF-8', $new_name));
                }else
                {
                    return [
                        'code'  => 123,
                        'msg'   => '图片类型不允许上传'
                    ];
                }
            }else
            {
                return [
                    'code'   => 465,
                    'msg'    => '图片大小超出范围',
                ];
            }

           }
            return [
                'code'   => 101,
                'msg'    => '上传成功',
                'result'    => $str,
            ];
        }
    }
}
