<?php

namespace App\Http\Controllers\Api\V1_0\xiao;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Api\V1_0\xiao\Login;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
    /**
     * @apiDefine GroupNamelo 小后台客户登录Api
     */

    /**
     * @api {post} api/1.0.0/login 客户登录
     * @apiName login
     * @apiGroup GroupNamelo
     *
     * @apiParam (参数) {int} mobile 手机号
     * @apiParam (参数) {string} password 密码
     *
     * @apiSampleRequest http://192.168.1.220/fang/public/api/1.0.0/login
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
    public function login(Request $api)
    {
        header('Access-Control-Allow-Origin:*');
        $mobile = $api->input('mobile');
        $password = $api->input('password');
        if (!$mobile || !$password) {
            return [
                'code' => config('api.V1_0.xiao.login.login_incomplete_code'),
                'msg' => config('api.V1_0.xiao.login.login_incomplete_msg'),
            ];
        }
        $info = Login::get_mobile_registr($mobile);

        if (!$info){
            return [
                'code' => config('api.V1_0.xiao.login.login_error_code'),
                'msg' => config('api.V1_0.xiao.login.login_error_msg'),
            ];
        }else{

            if ( !Hash::check( $password , $info->password ) ) {
                return [
                    'code' =>config('api.V1_0.xiao.login.login_password_code'),
                    'msg' => config('api.V1_0.xiao.login.login_password_msg'),
                ];
            }else{

                $bb = $info -> hous_id;
                DB::table('houserinfo') -> where('hous_id','=',$bb)->increment('login_count');

                $info -> projectinfo = Login::get_d_pro($info ->project_id);

                return [
                    'code' => config('api.V1_0.xiao.login.login_success_code'),
                    'msg' => config('api.V1_0.xiao.login.login_success_msg'),
                    'result' => $info,
                ];
            }
        }

    }
}
