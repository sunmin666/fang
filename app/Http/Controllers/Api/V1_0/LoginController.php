<?php

namespace App\Http\Controllers\Api\V1_0;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Api\V1_0\login;
use Illuminate\Support\Facades\Hash;


class LoginController extends Controller
{


    /**
     * @api {post} 1.0.0/login 职业顾问登录
     * @apiName 登录
     * @apiGroup 登录管理
     *
     * @apiParam (参数) {int} mobile 职业顾问手机号
     * @apiParam (参数) {int} password 职业顾问密码
     *
     * @apiSampleRequest http://192.168.1.218/fang/public/api/1.0.0/login
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


        $iphone = $api->input('mobile');
        $password = $api->input('password');

        if ($iphone == '' || $password == '') {
            return response()->json([
                'code' => '0',
                'msg' => '参数不全',
            ]);
        }

        $username = login::get_d_hous($iphone);

        if (!$username) {
            return response()->json(['code' => '1',
                'msg' => '用户不存在',
            ]);
        }

        if ($username->is_ipad == 1) {
            return response()->json(['code' => '2',
                'msg' => '此人不能登陆ipad',
            ]);
        }

        if (Hash::check($password, $username->password)) {
            return response()->json(['code' => '3',
                'msg' => '可以登录',
                'result' => $username,
            ]);
        }
    }

}
