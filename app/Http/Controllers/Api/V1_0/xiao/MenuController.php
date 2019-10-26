<?php

namespace App\Http\Controllers\Api\V1_0\xiao;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Api\V1_0\xiao\Menu;

class MenuController extends Controller
{
    /**
     * @apiDefine GroupNamelos 小后台菜单管理Api
     */

    /**
     * @api {post} api/1.0.0/menu 获取所有菜单
     * @apiName menu
     * @apiGroup GroupNamelos
     *
     *
     * @apiSampleRequest http://192.168.1.220/fang/public/api/1.0.0/menu
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
    public function menu(){
        header( 'Access-Control-Allow-Origin:*' );
        $data = Menu::get_all_menu();

        if ($data) {
            return ([
                'code' => config('api.V1_0.xiao.menu.menu_success_code'),
                'message' => config('api.V1_0.xiao.menu.menu_success_msg'),
                'result' => $data,
            ]);
        } else {
            return ([
                'code' => config('api.V1_0.xiao.menu.menu_error_code'),
                'message' => config('api.V1_0.xiao.menu.menu_error_msg')
            ]);
        }
    }
}
