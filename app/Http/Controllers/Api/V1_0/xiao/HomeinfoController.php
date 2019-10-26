<?php

namespace App\Http\Controllers\Api\V1_0\xiao;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Api\V1_0\xiao\Homeinfo;

class HomeinfoController extends Controller
{
    /**
     * @apiDefine GroupNamsoojds 小后台房源管理Api
     */

    /**
     * @api {get} api/1.0.0/linghhasss 户型分类
     * @apiName linghhasss
     * @apiGroup GroupNamsoojds
     *
     *
     * @apiSampleRequest http://192.168.1.220/fang/public/api/1.0.0/linghhasss
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
    public function linghhasss()
    {
       $a = 143;
        $data = Homeinfo::get_all_class($a);
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
     * @api {post} api/1.0.0/housestr 户型结构
     * @apiName housestr
     * @apiGroup GroupNamsoojds
     *
     * @apiParam (参数) {int} field_id 户型分类
     *
     * @apiSampleRequest http://192.168.1.220/fang/public/api/1.0.0/housestr
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
    public function housestr(Request $api)
    {
        $field_id = $api -> input('field_id');
        $data = Homeinfo::get_all_class($field_id);
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
     * @api {get} api/1.0.0/floorcl 查看所有楼层
     * @apiName floorcl
     * @apiGroup GroupNamsoojds
     *
     *
     * @apiSampleRequest http://192.168.1.220/fang/public/api/1.0.0/floorcl
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
    public function floorcl(Request $api)
    {
        $a = 157;
        $data = Homeinfo::get_all_class($a);
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
     * @api {post} api/1.0.0/homebuild 查看房屋面积/户型图
     * @apiName homebuild
     * @apiGroup GroupNamsoojds
     *
     * @apiParam (参数) {int} field_id 户型结构id
     *
     * @apiSampleRequest http://192.168.1.220/fang/public/api/1.0.0/homebuild
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
    public function homebuild(Request $api)
    {
        $field_id = $api -> input('field_id');
        $data = Homeinfo::get_d_pich($field_id);
        if($data){
            return [
                "code"=> "101",
                "msg" => "请求成功",
                "result" => $data,
            ];
        }else{
            return [
                "code"=> "102",
                "msg" => "请求失败",
            ];
        }
    }
    /**
     * @api {get} api/1.0.0/buildnum 查看所有楼号
     * @apiName buildnum
     * @apiGroup GroupNamsoojds
     *
     *
     * @apiSampleRequest http://192.168.1.220/fang/public/api/1.0.0/buildnum
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
    public function buildnum()
    {
        $a = 1;
        $data = Homeinfo::get_all_class($a);
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
     * @api {post} api/1.0.0/unitnum 查看楼号下的单元
     * @apiName unitnum
     * @apiGroup GroupNamsoojds
     *
     * @apiParam (参数) {int} field_id 楼号id
     *
     * @apiSampleRequest http://192.168.1.220/fang/public/api/1.0.0/unitnum
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
    public function unitnum(Request $api)
    {
        $field_id = $api -> input('field_id');
        $data = Homeinfo::get_all_class($field_id);
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
     * @api {post} api/1.0.0/roomnum 查看单元下的房号
     * @apiName roomnum
     * @apiGroup GroupNamsoojds
     *
     * @apiParam (参数) {int} field_id 楼号id
     *
     * @apiSampleRequest http://192.168.1.220/fang/public/api/1.0.0/roomnum
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
    public function roomnum(Request $api)
    {
        $field_id = $api -> input('field_id');
        $data = Homeinfo::get_all_class($field_id);
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
     * @api {post} api/1.0.0/homeadd 添加房源信息
     * @apiName homeadd
     * @apiGroup GroupNamsoojds
     *
     * @apiParam (参数) {int} buildnum 楼号id
     * @apiParam (参数) {int} unitnum 单元id
     * @apiParam (参数) {int} roomnum 房号id
     * @apiParam (参数) {int} floor 楼层id
     * @apiParam (参数) {int} house_str 户型结构id
     * @apiParam (参数) {int} price 房子单价
     * @apiParam (参数) {int} total 房子总价
     * @apiParam (参数) {int} discount 房子折扣
     * @apiParam (参数) {int} status 房子销售状态 0表示认购前(绿色) 1预定房源申请中(橙色) 2表示已认购 (蓝色)3表示以签约(红色)
     * @apiParam (参数) {string} buyid 房子认购编号
     * @apiParam (参数) {string} remarks 房子备注信息
     *
     * @apiSampleRequest http://192.168.1.220/fang/public/api/1.0.0/homeadd
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
    public function homeadd(Request $api)
    {
        $data['buildnum'] = $buildnum = $api -> input('buildnum');
        $data['unitnum'] = $unitnum = $api -> input('unitnum');
        $data['roomnum'] = $roomnum = $api -> input('roomnum');
        $data['floor'] = $floor = $api -> input('floor');
        $data['house_str'] = $house_str = $api -> input('house_str');
        $data['price'] = $price = $api -> input('price');
        $data['total'] = $total = $api -> input('total');
        $data['discount'] = $discount = $api -> input('discount');
        $data['status'] = $status = $api -> input('status');
        $data['buyid'] = $buyid = $api -> input('buyid');
        $data['remarks'] = $remarks = $api -> input('remarks');
        $data['created_at'] = time();
        if(!$buildnum || !$unitnum || !$roomnum || !$floor || !$house_str || !$price || !$total ||
        !$discount || $status=='' || !$buyid || !$remarks){
            return [
                'code' => 103,
                'msg' => '参数不全',
            ];
        }
        $info = Homeinfo::get_d_roomn($roomnum);
        if($info){
            return [
                'code' => 104,
                'msg' => '该房源已存在',
            ];
        }
        $data = Homeinfo::add_d_home($data);
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
     * @api {post} api/1.0.0/homedeis 房源信息详情
     * @apiName homedeis
     * @apiGroup GroupNamsoojds
     *
     * @apiParam (参数) {int} homeid 房源id
     *
     * @apiSampleRequest http://192.168.1.220/fang/public/api/1.0.0/homedeis
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
    public function homedeis(Request $api)
    {
        $homeid = $api -> input('homeid');
        if(!$homeid){
            return [
                'code' => 103,
                'msg' => '参数不全',
            ];
        }
        $data = Homeinfo::get_d_home($homeid);
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
     * @api {post} api/1.0.0/homeshow 房源信息列表
     * @apiName homeshow
     * @apiGroup GroupNamsoojds
     *
     * @apiParam (参数) {int} [buildnum] 楼号筛选(id)
     * @apiParam (参数) {int} [unitnum] 单元筛选(id)
     * @apiParam (参数) {int} [roomnum] 房号筛选(id)
     * @apiParam (参数) {int} [floor] 楼层筛选(id)
     * @apiParam (参数) {int} [status] 房源状态筛选
     * @apiParam (参数) {int} page 页码
     *
     * @apiSampleRequest http://192.168.1.220/fang/public/api/1.0.0/homeshow
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
      public function homeshow(Request $api)
      {
          $this ->automatic();
          $buildnum = $api -> input('buildnum');
          $unitnum = $api -> input('unitnum');
          $roomnum = $api -> input('roomnum');
          $floor = $api -> input('floor');
          $status = $api -> input('status');
          $page = $api -> input('page');
          $data['homesh'] = Homeinfo::get_all_home($page,$buildnum,$unitnum,$roomnum,$floor,$status);
          $data['count'] = Homeinfo::get_all_count();
          $data['zongye'] = ceil($data['count']/10);
          $data['homesh']=array_values( $data['homesh']);

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
     * @api {post} api/1.0.0/homeedit 房源信息修改
     * @apiName homeedit
     * @apiGroup GroupNamsoojds
     *
     * @apiParam (参数) {int} homeid 房源id
     * @apiParam (参数) {int} buildnum 楼号id
     * @apiParam (参数) {int} unitnum 单元id
     * @apiParam (参数) {int} roomnum 房号id
     * @apiParam (参数) {int} floor 楼层
     * @apiParam (参数) {int} house_str 户型结构id
     * @apiParam (参数) {int} price 房子单价
     * @apiParam (参数) {int} total 房子总价
     * @apiParam (参数) {int} discount 房子折扣
     * @apiParam (参数) {int} status 房子销售状态 0表示认购前(绿色) 1预定房源申请中(橙色) 2表示已认购 (蓝色)3表示以签约(红色)
     * @apiParam (参数) {string} buyid 房子认购编号
     * @apiParam (参数) {string} remarks 房子备注信息
     *
     * @apiSampleRequest http://192.168.1.220/fang/public/api/1.0.0/homeedit
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
    public function homeedit(Request $api)
    {
        $data['buildnum'] = $buildnum = $api -> input('buildnum');
        $data['unitnum'] = $unitnum = $api -> input('unitnum');
        $data['roomnum'] = $roomnum = $api -> input('roomnum');
        $data['floor'] = $floor = $api -> input('floor');
        $data['house_str'] = $house_str = $api -> input('house_str');
        $data['price'] = $price = $api -> input('price');
        $data['total'] = $total = $api -> input('total');
        $data['discount'] = $discount = $api -> input('discount');
        $data['status'] = $status = $api -> input('status');
        $data['buyid'] = $buyid = $api -> input('buyid');
        $data['remarks'] = $remarks = $api -> input('remarks');
        $data['updated_at'] = time();
        $homeid = $api -> input('homeid');
        if(!$homeid){
            return [
                'code' => 103,
                'msg' => '参数不全',
            ];
        }
        $info = Homeinfo::get_d_roomn($roomnum);
        if($info){
            return [
                'code' => 104,
                'msg' => '该房源已存在',
            ];
        }
        $data = Homeinfo::edit_d_home($homeid,$data);
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
     * @api {post} api/1.0.0/homedel 房源信息删除
     * @apiName homedel
     * @apiGroup GroupNamsoojds
     *
     * @apiParam (参数) {int} homeid 房源id
     *
     * @apiSampleRequest http://192.168.1.220/fang/public/api/1.0.0/homeedit
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
    public function homedel(Request $api)
    {
        $homeid = $api -> input('homeid');
        if(!$homeid){
            return [
                'code' => 103,
                'msg' => '参数不全',
            ];
        }
        $data = Homeinfo::del_d_home($homeid);
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
     * @api {post} api/1.0.0/homealldel 房源信息全选删除
     * @apiName homealldel
     * @apiGroup GroupNamsoojds
     *
     * @apiParam (参数) {int} homeid 房源id
     *
     * @apiSampleRequest http://192.168.1.220/fang/public/api/1.0.0/homealldel
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
    public function homealldel(Request $api)
    {
        $homeid = $api -> input('homeid');
        $pieceses=trim($homeid,',');
        $pieces = explode(",", $pieceses);
        if(!$pieces){
            return [
                'code' => 103,
                'msg' => '参数不全',
            ];
        }
        $data = Homeinfo::del_all_home($pieces);
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
     * @api {post} api/1.0.0/homepic 销控图表
     * @apiName homepic
     * @apiGroup GroupNamsoojds
     *
     * @apiParam (参数) {int} [buildnum] 楼号筛选
     * @apiParam (参数) {int} [unitnum] 单元筛选
     * @apiParam (参数) {int} [floor] 楼层筛选
     *
     * @apiSampleRequest http://192.168.1.220/fang/public/api/1.0.0/homepic
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
    public function homepic(Request $api)
    {
        $this ->automatic();
        $buildnum = $api -> input('buildnum');//楼号
        $unitnum = $api -> input('unitnum');//单元
        $floor = $api -> input('floor');//楼层
        if(!$buildnum){
            return [
                'code' => 103,
                 'msg' => '请选择楼号',
            ];
        }

        if(!$unitnum && $buildnum && $floor){
            $data = Homeinfo::get_homepic_unfnit($buildnum,$floor);
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
        }else if(!$unitnum && !$floor){
            $data = Homeinfo::get_homepic($buildnum);
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
        } else if(!$floor){
            $data = Homeinfo::get_homepic_unit($buildnum,$unitnum);
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
        }else{
            $data = Homeinfo::get_homepic_floor($buildnum,$unitnum,$floor);
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
    }

    public function automatic(){
        //查询所有房子
        $home = Homeinfo::get_all_homeinfos();
        if(count($home) != 0){
            foreach ($home as $k => $v){
                $data = Homeinfo::get_buy($v -> homeid);
                if($data != ''){
                    if($data -> finance_verify_status != 1 || $data -> finance_verify_status == null && $data -> status == 1){
                        if($data -> lock_time <= time()){
                            $update['status'] = 0;
                            Homeinfo::update_status_d($v-> homeid,$update);
                            //认购信息不能再使用
                            $buy['status'] = 4;
                            Homeinfo::update_buy_status($data -> buyid,$buy);
                        }
                    }
                }
            }
        }
    }
}
