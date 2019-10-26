<?php

namespace App\Http\Controllers\Api\V1_0\xiao;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Api\V1_0\xiao\Relation;

class RelationController extends Controller
{
    /**
     * @apiDefine GroupNameljs 角色api
     */

    /**
     * @api {post} api/1.0.0/relation 小后台角色添加
     * @apiName relation
     * @apiGroup GroupNameljs
     *
     * @apiParam (参数) {string} role_title 角色标题 只限英文
     * @apiParam (参数) {string} role_name 角色名称
     * @apiParam (参数) {string} description 角色描述
     *
     * @apiSampleRequest http://192.168.1.220/fang/public/api/1.0.0/relation
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
    public function relation(Request $api)
    {
        header( 'Access-Control-Allow-Origin:*' );
        $data['role_title'] = $role_title= $api -> input('role_title');
        $data['role_name'] = $role_name= $api -> input('role_name');
        $data['description'] = $description= $api -> input('description');
        $data['created_at'] =time();
        if(!$role_title || !$role_name || !$description){
            return ([
                'code' => config('api.V1_0.xiao.relation.relation_parameter_code'),
                'msg' => config('api.V1_0.xiao.relation.relation_parameter_msg'),
            ]);
        }
        $data = Relation::insert_d_rela($data);
        if ($data) {
            return ([
                'code' => config('api.V1_0.xiao.relation.relation_success_code'),
                'msg' => config('api.V1_0.xiao.relation.relation_success_msg'),
            ]);
        } else {
            return ([
                'code' => config('api.V1_0.xiao.relation.relation_error_code'),
                'msg' => config('api.V1_0.xiao.relation.relation_error_msg'),
            ]);
        }
    }
    /**
     * @api {post} api/1.0.0/relatiget 角色列表
     * @apiName relatiget
     * @apiGroup GroupNameljs
     *
     * @apiParam (参数) {int} page 页码
     *
     * @apiSampleRequest http://192.168.1.220/fang/public/api/1.0.0/relatiget
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
    public function relatiget(Request $api)
    {
        header( 'Access-Control-Allow-Origin:*' );
        $page = $api -> input('page');
        $data['relat'] = Relation::get_all_rela($page);
        $data['count'] =  Relation::get_d_count();
        $data['zongye'] = ceil($data['count']/10);
        $data['relat']=array_values( $data['relat']);
        if ($data) {
            return ([
                'code' => config('api.V1_0.xiao.relation.relation_success_code'),
                'msg' => config('api.V1_0.xiao.relation.relation_success_msg'),
                'result'=>$data,
            ]);
        } else {
            return ([
                'code' => config('api.V1_0.xiao.relation.relation_error_code'),
                'msg' => config('api.V1_0.xiao.relation.relation_error_msg'),
            ]);
        }
    }
    /**
     * @api {post} api/1.0.0/reldetails 角色详情
     * @apiName reldetails
     * @apiGroup GroupNameljs
     *
     * @apiParam (参数) {int} role_id 角色id
     *
     * @apiSampleRequest http://192.168.1.220/fang/public/api/1.0.0/reldetails
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
    public function reldetails(Request $api)
    {
        header( 'Access-Control-Allow-Origin:*' );
        $role_id = $api -> input('role_id');
        if(!$role_id){
            return ([
                'code' => config('api.V1_0.xiao.relation.relation_parameter_code'),
                'msg' => config('api.V1_0.xiao.relation.relation_parameter_msg'),
            ]);
        }
        $data = Relation::get_d_rel($role_id);
        if ($data) {
            return ([
                'code' => config('api.V1_0.xiao.relation.relation_success_code'),
                'msg' => config('api.V1_0.xiao.relation.relation_success_msg'),
                'result'=>$data,
            ]);
        } else {
            return ([
                'code' => config('api.V1_0.xiao.relation.relation_error_code'),
                'msg' => config('api.V1_0.xiao.relation.relation_error_msg'),
            ]);
        }
    }
    /**
     * @api {post} api/1.0.0/reledit/ 角色修改
     * @apiName reledit
     * @apiGroup GroupNameljs
     *
     * @apiParam (参数) {int} role_id 角色id
     * @apiParam (参数) {string} role_title 角色标题 只限英文
     * @apiParam (参数) {string} role_name 角色名称
     * @apiParam (参数) {string} description 角色描述
     *
     * @apiSampleRequest http://192.168.1.220/fang/public/api/1.0.0/reledit
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
    public function reledit(Request $api)
    {
        header( 'Access-Control-Allow-Origin:*' );
        $role_id = $api -> input('role_id');
        $data['role_title'] = $role_title= $api -> input('role_title');
        $data['role_name'] = $role_name= $api -> input('role_name');
        $data['description'] = $description= $api -> input('description');
        $data['updated_at'] =time();
        if(!$role_id){
            return ([
                'code' => config('api.V1_0.xiao.relation.relation_parameter_code'),
                'msg' => config('api.V1_0.xiao.relation.relation_parameter_msg'),
            ]);
        }
        $data = Relation::edit_d_rel($role_id,$data);
        if ($data) {
            return ([
                'code' => config('api.V1_0.xiao.relation.relation_success_code'),
                'msg' => config('api.V1_0.xiao.relation.relation_success_msg'),
            ]);
        } else {
            return ([
                'code' => config('api.V1_0.xiao.relation.relation_error_code'),
                'msg' => config('api.V1_0.xiao.relation.relation_error_msg'),
            ]);
        }
    }
    /**
     * @api {post} api/1.0.0/reledel/ 角色删除
     * @apiName reledel
     * @apiGroup GroupNameljs
     *
     * @apiParam (参数) {int} role_id 角色id
     *
     *
     * @apiSampleRequest http://192.168.1.220/fang/public/api/1.0.0/reledel
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
    public function reledel(Request $api)
    {
        header( 'Access-Control-Allow-Origin:*' );
        $role_id = $api -> input('role_id');
        if(!$role_id){
            return ([
                'code' => config('api.V1_0.xiao.relation.relation_parameter_code'),
                'msg' => config('api.V1_0.xiao.relation.relation_parameter_msg'),
            ]);
        }
        $data = Relation::del_d_rel($role_id);
        if ($data) {
            return ([
                'code' => config('api.V1_0.xiao.relation.relation_success_code'),
                'msg' => config('api.V1_0.xiao.relation.relation_success_msg'),
            ]);
        } else {
            return ([
                'code' => config('api.V1_0.xiao.relation.relation_error_code'),
                'msg' => config('api.V1_0.xiao.relation.relation_error_msg'),
            ]);
        }
    }
    /**
     * @api {post} api/1.0.0/relalldel/ 角色全选删除
     * @apiName relalldel
     * @apiGroup GroupNameljs
     *
     * @apiParam (参数) {int} role_id 角色id
     *
     *
     * @apiSampleRequest http://192.168.1.220/fang/public/api/1.0.0/relalldel
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
    public function relalldel(Request $api)
    {
        header( 'Access-Control-Allow-Origin:*' );
        $role_id= $api -> input('role_id');
        $pieceses=trim($role_id,',');
        $pieces = explode(",", $pieceses);
        if(!$pieces){
            return ([
                'code' => config('api.V1_0.xiao.relation.relation_parameter_code'),
                'msg' => config('api.V1_0.xiao.relation.relation_parameter_msg'),
            ]);
        }
        $data = Relation::del_all_rel($pieces);
        if ($data) {
            return ([
                'code' => config('api.V1_0.xiao.relation.relation_success_code'),
                'msg' => config('api.V1_0.xiao.relation.relation_success_msg'),
            ]);
        } else {
            return ([
                'code' => config('api.V1_0.xiao.relation.relation_error_code'),
                'msg' => config('api.V1_0.xiao.relation.relation_error_msg'),
            ]);
        }
    }
    /**
     * @api {get} api/1.0.0/relalljs/ 查看所有角色名称
     * @apiName relalljs
     * @apiGroup GroupNameljs
     *
     *
     * @apiSampleRequest http://192.168.1.220/fang/public/api/1.0.0/relalljs
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
    public function relalljs()
    {
        header( 'Access-Control-Allow-Origin:*' );
        $data = Relation::get_all_relaname();
        if($data){
            return [
                'code' => config('api.V1_0.xiao.relation.relation_success_code'),
                'msg' => config('api.V1_0.xiao.relation.relation_success_msg'),
                'result'=>$data,
            ];
        }else{
            return [
                'code' => config('api.V1_0.xiao.relation.relation_error_code'),
                'msg' => config('api.V1_0.xiao.relation.relation_error_msg'),
            ];
        }
    }
}
