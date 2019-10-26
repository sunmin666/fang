<?php

namespace App\Http\Controllers\Api\V1_0\xiao;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Api\V1_0\xiao\Member;
use Illuminate\Support\Facades\Hash;

class MemberController extends Controller
{
    /**
     * @apiDefine GroupNameloos 小后台成员列表Api
     */

    /**
     * @api {post} api/1.0.0/member 添加成员
     * @apiName member
     * @apiGroup GroupNameloos
     *
     * @apiParam (参数) {int} mobile 手机号
     * @apiParam (参数) {string} password 密码
     * @apiParam (参数) {string} passconfirm 确认密码
     * @apiParam (参数) {string} email 邮箱
     * @apiParam (参数) {int} sex 性别
     * @apiParam (参数) {int} idcrad 身份证号
     * @apiParam (参数) {sting} name 姓名
     * @apiParam (参数) {int} is_ipad 是否可以登录pc
     * @apiParam (参数) {int} role_id 角色
     * @apiParam (参数) {int} enjoy 折扣
     *
     * @apiSampleRequest http://192.168.1.220/fang/public/api/1.0.0/member
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
    public function member(Request $api)
    {
        header( 'Access-Control-Allow-Origin:*' );
        $data['mobile'] = $mobile = $api -> input('mobile');
        $data['password'] = Hash::make($api -> input('password'));;
        $passconfirm = $password=$api -> input('passconfirm');
        $data['email'] = $email = $api -> input('email');
        $data['sex'] = $sex = $api -> input('sex');
        $data['idcrad'] = $idcrad= $api -> input('idcrad');
        $data['name'] = $name= $api -> input('name');
        $data['is_ipad'] = $is_ipad= $api -> input('is_ipad');
        $data['enjoy'] = $enjoy= $api -> input('enjoy');
        $data['created_at'] =time();
        $datac['role_id'] = $role_id= $api -> input('role_id');
        $datac['created_at'] =time();
        if(!$mobile || !$password || !$passconfirm || !$email ||!$sex || !$idcrad ||
            !$name || !$is_ipad || !$role_id || !$enjoy
        ){
            return ([
                'code' => config('api.V1_0.xiao.member.member_parameter_code'),
                'msg' => config('api.V1_0.xiao.member.member_parameter_msg'),
            ]);
        }
        if($passconfirm !== $password){
            return ([
                'code' => config('api.V1_0.xiao.member.member_password_code'),
                'msg' => config('api.V1_0.xiao.member.member_password_msg'),
            ]);
        }
        $data = Member::insert_d_mem($data);

        if($data){
            $datac['memberid'] =$data;
            Member::insert_d_ser($datac);
            return ([
                'code' => config('api.V1_0.xiao.member.member_success_code'),
                'msg' => config('api.V1_0.xiao.member.member_success_msg'),
            ]);
        }else{
            return ([
                'code' =>  config('api.V1_0.xiao.member.member_error_code'),
                'msg' => config('api.V1_0.xiao.member.member_error_msg'),
            ]);
        }
    }
    /**
     * @api {post} api/1.0.0/memshow 成员列表
     * @apiName memshow
     * @apiGroup GroupNameloos
     *
     * @apiParam (参数) {string} [role_id] 角色筛选
     * @apiParam (参数) {sting} [name] 姓名筛选
     * @apiParam (参数) {int} [mobile] 手机号筛选
     * @apiParam (参数) {int} page 页码
     *
     * @apiSampleRequest http://192.168.1.220/fang/public/api/1.0.0/memshow
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
    public function memshow(Request $api)
    {
        header( 'Access-Control-Allow-Origin:*' );
        $page = $api -> input('page');
        $role_id = $api -> input('role_id');
        $name = $api -> input('name');
        $mobile = $api -> input('mobile');
        $data['memshow'] = Member::get_all_men($page,$role_id,$name,$mobile);
        $data['count'] = Member::get_all_count();
        $data['zongye'] = ceil($data['count']/10);
        $data['memshow']=array_values( $data['memshow']);
        if($data){
            return [
                'code' => config('api.V1_0.xiao.member.member_success_code'),
                'msg' => config('api.V1_0.xiao.member.member_success_msg'),
                'result'=> $data,
            ];
        }else{
            return [
                'code' =>  config('api.V1_0.xiao.member.member_error_code'),
                'msg' => config('api.V1_0.xiao.member.member_error_msg'),
            ];
        }
    }
    /**
     * @api {post} api/1.0.0/memdetails 成员详情
     * @apiName memdetails
     * @apiGroup GroupNameloos
     *
     * @apiParam (参数) {int} hous_id 成员id
     *
     * @apiSampleRequest http://192.168.1.220/fang/public/api/1.0.0/memdetails
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
    public function memdetails(Request $api)
    {
        header( 'Access-Control-Allow-Origin:*' );
        $hous_id = $api -> input('hous_id');
        if(!$hous_id){
            return ([
                'code' => config('api.V1_0.xiao.member.member_parameter_code'),
                'msg' => config('api.V1_0.xiao.member.member_parameter_msg'),
            ]);
        }
        $data = Member::get_d_men($hous_id);
        if($data){
            return [
                'code' => config('api.V1_0.xiao.member.member_success_code'),
                'msg' => config('api.V1_0.xiao.member.member_success_msg'),
                'result'=> $data,
            ];
        }else{
            return [
                'code' =>  config('api.V1_0.xiao.member.member_error_code'),
                'msg' => config('api.V1_0.xiao.member.member_error_msg'),
            ];
        }
    }
    /**
     * @api {post} api/1.0.0/memedit 成员修改
     * @apiName memedit
     * @apiGroup GroupNameloos
     *
     * @apiParam (参数) {int} hous_id 成员id
     * @apiParam (参数) {int} mobile 手机号
     * @apiParam (参数) {string} password 密码
     * @apiParam (参数) {string} email 邮箱
     * @apiParam (参数) {int} sex 性别
     * @apiParam (参数) {int} idcrad 身份证号
     * @apiParam (参数) {sting} name 姓名
     * @apiParam (参数) {int} is_ipad 是否可以登录pc
     * @apiParam (参数) {int} role_id 角色
     * @apiParam (参数) {int} enjoy 折扣
     *
     * @apiSampleRequest http://192.168.1.220/fang/public/api/1.0.0/memedit
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
    public function memedit(Request $api)
    {
        header( 'Access-Control-Allow-Origin:*' );
        $hous_id = $api -> input('hous_id');
        $data['mobile'] = $mobile = $api -> input('mobile');
        $data['password'] = Hash::make($api -> input('password'));;
        $data['email'] = $email = $api -> input('email');
        $data['sex'] = $sex = $api -> input('sex');
        $data['idcrad'] = $idcrad= $api -> input('idcrad');
        $data['name'] = $name= $api -> input('name');
        $data['is_ipad'] = $is_ipad= $api -> input('is_ipad');
        $data['enjoy'] = $enjoy= $api -> input('enjoy');
        $data['updated_at'] =time();
        $datac['role_id'] = $role_id= $api -> input('role_id');
        $datac['updated_at'] =time();
        if(!$hous_id){
            return ([
                'code' => config('api.V1_0.xiao.member.member_parameter_code'),
                'msg' => config('api.V1_0.xiao.member.member_parameter_msg'),
            ]);
        }
        $data = Member::edit_d_mem($hous_id,$data);
        if($data){
            Member::edit_d_ser($hous_id,$datac);
            return ([
                'code' => config('api.V1_0.xiao.member.member_success_code'),
                'msg' => config('api.V1_0.xiao.member.member_success_msg'),
            ]);
        }else{
            return ([
                'code' =>  config('api.V1_0.xiao.member.member_error_code'),
                'msg' => config('api.V1_0.xiao.member.member_error_msg'),
            ]);
        }
    }
    /**
     * @api {post} api/1.0.0/memedel 成员删除
     * @apiName memedel
     * @apiGroup GroupNameloos
     *
     * @apiParam (参数) {int} hous_id 成员id
     *
     * @apiSampleRequest http://192.168.1.220/fang/public/api/1.0.0/memedel
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
    public function memedel(Request $api)
    {
        header( 'Access-Control-Allow-Origin:*' );
        $hous_id = $api -> input('hous_id');
        if(!$hous_id){
            return ([
                'code' => config('api.V1_0.xiao.member.member_parameter_code'),
                'msg' => config('api.V1_0.xiao.member.member_parameter_msg'),
            ]);
        }
        $data = Member::del_d_men($hous_id);
        if($data){
            Member::del_d_ser($hous_id);
            return ([
                'code' => config('api.V1_0.xiao.member.member_success_code'),
                'msg' => config('api.V1_0.xiao.member.member_success_msg'),
            ]);
        }else{
            return ([
                'code' =>  config('api.V1_0.xiao.member.member_error_code'),
                'msg' => config('api.V1_0.xiao.member.member_error_msg'),
            ]);
        }
    }
    /**
     * @api {post} api/1.0.0/memealldel 成员全选删除
     * @apiName memealldel
     * @apiGroup GroupNameloos
     *
     * @apiParam (参数) {int} hous_id 成员id
     *
     * @apiSampleRequest http://192.168.1.220/fang/public/api/1.0.0/memealldel
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
    public function memealldel(Request $api)
    {
        $hous_id = $api -> input('hous_id');
        $pieceses=trim($hous_id,',');
        $pieces = explode(",", $pieceses);
        if(!$pieces){
            return ([
                'code' => config('api.V1_0.xiao.member.member_parameter_code'),
                'msg' => config('api.V1_0.xiao.member.member_parameter_msg'),
            ]);
        }
        $data = Member::del_all_mem($pieces);
        if($data){
            Member::del_all_ser($pieces);
            return [
                'code' => config('api.V1_0.xiao.member.member_success_code'),
                'msg' => config('api.V1_0.xiao.member.member_success_msg'),
            ];
        }else{
            return [
                'code' =>  config('api.V1_0.xiao.member.member_error_code'),
                'msg' => config('api.V1_0.xiao.member.member_error_msg'),
            ];
        }
    }
    /**
     * @api {post} api/1.0.0/memprohibit 成员禁用
     * @apiName memprohibit
     * @apiGroup GroupNameloos
     *
     * @apiParam (参数) {int} hous_id 成员id
     * @apiParam (参数) {int} status 状态
     *
     * @apiSampleRequest http://192.168.1.220/fang/public/api/1.0.0/memprohibit
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
    public function memprohibit(Request $api)
    {
        header( 'Access-Control-Allow-Origin:*' );
        $hous_id = $api -> input('hous_id');
        $status =  $api -> input('status');
        if(!$hous_id){
            return ([
                'code' => config('api.V1_0.xiao.member.member_parameter_code'),
                'msg' => config('api.V1_0.xiao.member.member_parameter_msg'),
            ]);
        }
        if($status == 1){
            $data['status'] =0;
        }else{
            $data['status'] =1;
        }

        $data = Member::edit_d_status($hous_id,$data);
        if($data){
            return ([
                'code' => config('api.V1_0.xiao.member.member_success_code'),
                'msg' => config('api.V1_0.xiao.member.member_success_msg'),
            ]);
        }else{
            return ([
                'code' =>  config('api.V1_0.xiao.member.member_error_code'),
                'msg' => config('api.V1_0.xiao.member.member_error_msg'),
            ]);
        }
    }
}
