<?php

namespace App\Http\Controllers\Api\V1_0\xiao;

use Illuminate\Http\Request;
use AlibabaCloud\Client\AlibabaCloud;
use AlibabaCloud\Client\Exception\ClientException;
use AlibabaCloud\Client\Exception\ServerException;
use Illuminate\Support\Facades\Cache;
use App\Http\Controllers\Controller;
use App\Models\Api\V1_0\xiao\Registr;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\Api\V1_0\xiao\Member;


class RegistrController extends Controller
{
    /**
     * @apiDefine GroupNamejs 小后台客户注册Api
     */

    /**
     * @api {post} api/1.0.0/registr 注册手机验证码
     * @apiName registr
     * @apiGroup GroupNamejs
     *
     * @apiParam (参数) {int} mobile 手机号
     *
     * @apiSampleRequest http://192.168.1.220/fang/public/api/1.0.0/registr
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
    public function registr(Request $api)
    {
        header( 'Access-Control-Allow-Origin:*' );
        $mobile = $api -> input('mobile');
        if(!$mobile){
            return [
                'code' => config('api.V1_0.xiao.registr.registr_incomplete_code') ,
                'msg'  => config('api.V1_0.xiao.registr.registr_incomplete_msg') ,
            ];
        }
        $info = Registr::get_mobile_registr($mobile);
        if($info){
            return [
                'code' => config('api.V1_0.xiao.registr.registr_mobile_code') ,
                'msg'  => config('api.V1_0.xiao.registr.registr_mobile_msg') ,
            ];
        }
        $count = rand( 000000 , 999999 );  //生成六位随机数

        Cache::set( 'users' , $count , 1 );  //使用cache 缓存六位随机数 时间为一分钟

        $param = [
            'code' => $count
            //随机数放在数组里
        ];
        $accessKeyId = config( 'ali.accessKeyId' );
        $accessSecret = config( 'ali.accessSecret' );
        $SignName = config( 'ali.SignName' );
        $TemplateCode = config( 'ali.TemplateCode' );
        $regionId = config( 'ali.regionId' );
        AlibabaCloud::accessKeyClient( $accessKeyId , $accessSecret )
            ->regionId( $regionId )
            ->asDefaultClient();
        try {
            $result = AlibabaCloud::rpc()
                ->product( 'Dysmsapi' )
                ->version( '2017-05-25' )
                ->action( 'SendSms' )
                ->method( 'POST' )
                ->options( [
                    'query' => [
                        'RegionId'      => "$regionId" ,
                        'PhoneNumbers'  => $mobile ,
                        'SignName'      => $SignName ,
                        'TemplateCode'  => $TemplateCode ,
                        'TemplateParam' => json_encode( $param ) ,
                    ] ,
                ] )
                ->request();
            $ig = $result->toArray();
            return [
                'code'      => $ig['Code'] ,
                'message'   => $param ,
                'requestid' => $ig['RequestId'] ,
                'bizid'     => $ig['BizId'] ,
            ];
        } catch ( ClientException $e ) {
            return $e->getErrorMessage().PHP_EOL;
        } catch ( ServerException $e ) {
            return $e->getErrorMessage().PHP_EOL;
        }
    }
    /**
     * @api {post} api/1.0.0/reinsert 验证验证码
     * @apiName reinsert
     * @apiGroup GroupNamejs
     *
     * @apiParam (参数) {int} rcode 验证码
     *
     * @apiSampleRequest http://192.168.1.220/fang/public/api/1.0.0/reinsert
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
    public function reinsert(Request $api)
    {
        header( 'Access-Control-Allow-Origin:*' );
        $code =  Cache::get( 'users' );
        $rcode = $api -> input('rcode');
        if($code == ""){
            return [
                'code' => config('api.V1_0.xiao.registr.registr_overdue_code') ,
                'msg'  => config('api.V1_0.xiao.registr.registr_overdue_msg') ,
            ];
        }
        if($rcode!=$code){
            return [
                'code' => config('api.V1_0.xiao.registr.registr_error_code') ,
                'msg'  => config('api.V1_0.xiao.registr.registr_error_msg') ,
            ];
        }else{
            return [
                'code' => config('api.V1_0.xiao.registr.registr_success_code') ,
                'msg'  => config('api.V1_0.xiao.registr.registr_success_msg') ,
            ];
        }
    }
    /**
     * @api {post} api/1.0.0/reemail 邮箱注册
     * @apiName reemail
     * @apiGroup GroupNamejs
     *
     * @apiParam (参数) {int} mobile 手机号
     * @apiParam (参数) {string} email 邮箱
     * @apiParam (参数) {string} password 密码
     *
     * @apiSampleRequest http://192.168.1.220/fang/public/api/1.0.0/reemail
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
    public function reemail(Request $api)
    {
        header( 'Access-Control-Allow-Origin:*' );
        $data['mobile'] = $mobile= $api -> input('mobile');
        $data['email']=$email = $api -> input('email');
        $data['password']=$password = Hash::make($api -> input('password'));
        $info = Registr::get_email_reg($email);
        if($info){
            return [
                'code' => config('api.V1_0.xiao.registr.registr_email_code') ,
                'msg'  => config('api.V1_0.xiao.registr.registr_email_msg') ,
            ];
        }
        if(!$email || !$password || !$mobile){
            return [
                'code' => config('api.V1_0.xiao.registr.registr_incomplete_code') ,
                'msg'  => config('api.V1_0.xiao.registr.registr_incomplete_msg') ,
            ];
        }
        $datac = Registr::insert_email_reg($data);
        if($datac){
            $datada['project_id'] = $datac;
            $datada['mobile'] = $mobile= $api -> input('mobile');
            $datada['email']=$email = $api -> input('email');
            $datada['created_at']=time();
            $datada['is_ipad'] = 1;
            $datada['password']=$password = Hash::make($api -> input('password'));
            Member::insert_d_memv($datada);
            return [
                'code' => config('api.V1_0.xiao.registr.registr_success_code') ,
                'msg'  => config('api.V1_0.xiao.registr.registr_success_msg') ,
                "result" => $datac,
            ];
        }
    }
}
