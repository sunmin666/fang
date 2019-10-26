<?php

namespace App\Http\Controllers\Api\V1_0\xiao;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Api\V1_0\xiao\Buyinfo;

class BuyinfoController extends Controller
{
    /**
     * @apiDefine GroupNamsepids 小后认购签约Api
     */
    /**
     * @api {post} api/1.0.0/homestaus 查询可以认购的房源
     * @apiName homestaus
     * @apiGroup GroupNamsepids
     *
     * @apiParam (参数) {int} field_id 单元id
     * @apiParam (参数) {int} floorid 楼层id
     *
     * @apiSampleRequest http://192.168.1.220/fang/public/api/1.0.0/homestaus
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
    public function homestaus(Request $api)
    {
        $field_id = $api -> input('field_id');
        $floorid = $api -> input('floorid');
        $data = Buyinfo::get_home_status($field_id,$floorid);
        if($data){
            return[
                'code' => 101,
                'msg' => '请求成功',
                "result" => $data,
            ];
        }else{
            return[
                'code' => 101,
                'msg' => '请求失败',
            ];
        }
    }

    /**
     * @api {post} api/1.0.0/homeinfo 查询房源的具体信息
     * @apiName homeinfo
     * @apiGroup GroupNamsepids
     *
     * @apiParam (参数) {int} homeid 房源id
     *
     * @apiSampleRequest http://192.168.1.220/fang/public/api/1.0.0/homeinfo
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
    public function homeinfo(Request $api)
    {
        $homeid = $api -> input('homeid');
        if(!$homeid){
            return [
                'code' => '103',
                'msg' => '参数不全',
            ];
        }
        $data = Buyinfo::get_home_homeinfo($homeid);
        if($data){
            return[
                'code' => 101,
                'msg' => '请求成功',
                "result" => $data,
            ];
        }else{
            return[
                'code' => 101,
                'msg' => '请求失败',
            ];
        }
    }
    /**
     * @api {post} api/1.0.0/custinfo 查询用户信息
     * @apiName custinfo
     * @apiGroup GroupNamsepids
     *
     * @apiParam (参数) {int} cust_id 客户id
     *
     * @apiSampleRequest http://192.168.1.220/fang/public/api/1.0.0/custinfo
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
    public function custinfo(Request $api)
    {
        $cust_id = $api -> input('cust_id');
        if(!$cust_id){
            return [
                'code' => '103',
                'msg' => '参数不全',
            ];
        }
        $data = Buyinfo::get_cum_cust($cust_id);
        if($data){
            return[
                'code' => 101,
                'msg' => '请求成功',
                "result" => $data,
            ];
        }else{
            return[
                'code' => 101,
                'msg' => '请求失败',
            ];
        }
    }
    /**
     * @api {post} api/1.0.0/buyadd 小后台认购添加
     * @apiName buyadd
     * @apiGroup GroupNamsepids
     *
     * @apiParam (参数) {int} cust_id 客户id
     * @apiParam (参数) {string} idcard 客户身份证
     * @apiParam (参数) {int} homeid 房源id
     * @apiParam (参数) {int} pay_num 付款金额
     * @apiParam (参数) {int} pay_type 付款方案
     * @apiParam (参数) {int} [month_pay] 月供选择按揭必填
     * @apiParam (参数) {int} [loan_term] 年限选择按揭必填
     * @apiParam (参数) {int} total_price 总金额
     *
     * @apiParam (参数) {string} remarks 认购备注
     * @apiParam (参数) {int} [relation] 共有人与客户的关系
     * @apiParam (参数) {string} [realname] 共有人姓名
     * @apiParam (参数) {int} [sex] 共有人性别
     * @apiParam (参数) {int} [birthday] 共有人生日
     * @apiParam (参数) {string} [idcard] 共有人身份证号
     * @apiParam (参数) {int} [mobile] 共有人手机号
     *
     *
     * @apiSampleRequest http://192.168.1.220/fang/public/api/1.0.0/buyadd
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
    public function buyadd(Request $api)
    {
        $data['cust_id'] = $cust_id = $api->input('cust_id');  //客户id
        $data['homeid'] = $homeid = $api->input('homeid');   //房源id
        $data['pay_num'] = $pay_num = $api->input('pay_num'); //付款金额
        $data['pay_type'] = $pay_type = $api->input('pay_type'); //付款方案
        $data['month_pay'] = $month_pay = $api->input('month_pay'); //月供
        $data['loan_term'] = $loan_term = $api->input('loan_term'); //年限
        $data['total_price'] = $total_price = $api->input('total_price'); //总金额
        $data['remarks'] = $remarks = $api->input('remarks');  //备注
        $data['apply_time'] = time(); //置业顾问发起的时间
        $data['lock_time'] = time() + 3600;   //锁定时间默认1小时
        $data['created_at'] = time();  //创建时间
        $info = Buyinfo::get_cum_cust($cust_id);
        if ($info) {
            $data['sponsor'] = $info -> name; //置业顾问id
            if ($info->idcard == null) {
                $dacard['idcard'] = $idcard = $api->input('idcard');
                $cardinfo = Buyinfo::insert_d_idcard($idcard);   //查询身份证号是否已存在
                if ($cardinfo) {
                    return [
                        'code' => 104,
                        'mag' => '身份证已存在',
                    ];
                }
                Buyinfo::update_d_idcard($cust_id, $dacard);
            }
        }
        if($pay_type!=''){
            if($pay_type == 0){
                if(!$cust_id || !$homeid || !$pay_num || !$total_price || !$remarks){
                   return [
                       'code' => 103,
                       'msg' => '参数不全'
                   ];
                }
            }
            if($pay_type == 1){
                if(!$cust_id || !$homeid || !$pay_num || !$total_price || !$remarks || !$month_pay || !$loan_term){
                    return [
                        'code' => 106,
                        'msg' => '参数不全'
                    ];
                }
            }
        }else{
            return [
                'code' => 105,
                'mag' => '请选择方案',
            ];
        }
        $buyid = Buyinfo::add_d_buy($data); //获取认购id
        if($buyid){
          $buy['buy_number'] = 10000 + $buyid;
          Buyinfo::update_buy_number($buyid,$buy);
          $gyr = $api -> input('coowyr');
            if($gyr !=''){
                for($a=0;$a<count($gyr);$a++){
                    if($gyr[$a]['cust_id']=='' || $gyr[$a]['relation']=='' || $gyr[$a]['realname']==''
                    || $gyr[$a]['birthday']=='' ||  $gyr[$a]['idcard']=='' ||  $gyr[$a]['mobile']==''){
                        return[
                            'code' => '107',
                            'mag' => '共有人参数不全'
                        ];
                    }
                    $coowgyr['cust_id'] = $gyr[$a]['cust_id'];    //客户id
                    $coowgyr['relation'] = $gyr[$a]['relation'];       //关系
                    $coowgyr['realname'] = $gyr[$a]['realname'];                //姓名
                    $coowgyr['sex'] = $gyr[$a]['sex'];                    //性别
                    $coowgyr['birthday'] = strtotime($gyr[$a]['birthday']);               //生日
                    $coowgyr['idcard'] = $gyr[$a]['idcard'];               //身份证号
                    $coowgyr['mobile'] = $gyr[$a]['mobile'];             //手机号
                    $coowgyr['created_at'] = time();        //手机号
                    Buyinfo::add_coowner($coowgyr);
                }
            }

        }
        $hstatus['status'] = 1;    //房源状态更改
        $hstatus['buyid'] = $buyid; //把buyid存入房源
        $home=Buyinfo::update_d_home($homeid,$hstatus);
        if($home){
            return [
              'code' => 101,
              'msg'  => '请求成功',
            ];
        }else{
            return [
                'code' => 102,
                'msg'  => '请求失败',
            ];
        }
    }
    /**
     * @api {post} api/1.0.0/buymanager 小后台经理审核
     * @apiName buymanager
     * @apiGroup GroupNamsepids
     *
     * @apiParam (参数) {int}  buyid 单前认购id
     * @apiParam (参数) {int}  homeid 房源id
     * @apiParam (参数) {int}  manage_admin 审核人姓名
     * @apiParam (参数) {int}  manager_verify_status 经理审核状态0=未通过 1=通过 “ ” = 未审核
     * @apiParam (参数) {string} manager_verify_remarks 经理审核备注
     *
     * @apiSampleRequest http://192.168.1.220/fang/public/api/1.0.0/buymanager
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
    public function buymanager(Request $api)
    {
        $buyid = $api -> input('buyid');
        $mana['manager_verify_status'] = $manager_verify_status = $api -> input('manager_verify_status');
        $mana['manager_verify_time'] = time();
        $mana['manage_admin'] = $manage_admin = $api -> input('manage_admin');
        $mana['manager_verify_remarks'] = $manager_verify_remarks = $api -> input('manager_verify_remarks');
        if(!$manager_verify_status || !$manager_verify_remarks || !$manage_admin){
            return [
                'code' => 103,
                'msg'  => '参数不全',
            ];
        }
        $manager = Buyinfo::update_d_mana($buyid,$mana);
        if($manager){
            if($mana['manager_verify_status'] == 0){
                $homeid = $api -> input('homeid');
                if(!$homeid){
                    return [
                        'code' => 104,
                        'msg'  => '参数不全',
                    ];
                }
                Buyinfo::update_home_mana($homeid);
            }
        }
        if($manager){
            return [
                'code' => 101,
                'msg'  => '请求成功',
            ];
        }else{
            return [
                'code' => 101,
                'msg'  => '请求失败',
            ];
        }

    }
    /**
     * @api {post} api/1.0.0/buyfinance 小后台财务审核
     * @apiName buyfinance
     * @apiGroup GroupNamsepids
     *
     * @apiParam (参数) {int}  buyid 单前认购id
     * @apiParam (参数) {int}  homeid 房源id
     * @apiParam (参数) {string}  finance_admin 财务审核人
     * @apiParam (参数) {int}  finance_verify_status 经理审核状态0=未通过 1=通过 “ ” = 未审核
     * @apiParam (参数) {string} finance_verify_remarks 经理审核备注
     *
     * @apiSampleRequest http://192.168.1.220/fang/public/api/1.0.0/buyfinance
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
    public function buyfinance(Request $api)
    {
        $buyid = $api -> input('buyid');
        $fina['finance_verify_status'] = $finance_verify_status = $api -> input('finance_verify_status');
        $fina['finance_verify_time'] = time();
        $fina['finance_admin'] = $finance_admin = $api -> input('finance_admin');
        $fina['finance_verify_remarks'] = $finance_verify_remarks = $api -> input('finance_verify_remarks');
        if(!$finance_verify_status || !$finance_verify_remarks || !$finance_admin){
            return [
                'code' => 103,
                'msg'  => '参数不全',
            ];
        }
        $finance = Buyinfo::update_d_mana($buyid,$fina);
        if($finance){
            if($fina['finance_verify_status'] == 0){
                $homeid = $api -> input('homeid');
                if(!$homeid){
                    return [
                        'code' => 104,
                        'msg'  => '参数不全',
                    ];
                }
                Buyinfo::update_home_mana($homeid);
            }else{
                $homeid = $api -> input('homeid');
                if(!$homeid){
                    return [
                        'code' => 104,
                        'msg'  => '参数不全',
                    ];
                }
                Buyinfo::update_finance_home($homeid);
            }
        }
        if($finance){
            return [
                'code' => 101,
                'msg'  => '请求成功',
            ];
        }else{
            return [
                'code' => 101,
                'msg'  => '请求失败',
            ];
        }

    }
    /**
     * @api {post} api/1.0.0/buyshow 小后台认购列表
     * @apiName buyshow
     * @apiGroup GroupNamsepids
     *
     * @apiParam (参数) {int} page 页码
     *
     * @apiSampleRequest http://192.168.1.220/fang/public/api/1.0.0/buyshow
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
    public function buyshow(Request $api)
    {
        $page = $api -> input('page');
        $data['buyshow'] = Buyinfo::get_all_buy($page);
        $data['count'] = Buyinfo::get_all_count();
        $data['zongye'] = ceil($data['count']/10);
        $data['buyshow']=array_values( $data['buyshow']);
//        $new = time();
//        foreach($data['buyshow'] as $key => $val){
//            if($val['lock_time']< $new){
//                $homeid=$val['homeid'];
//                Buyinfo::update_d_hstatus($homeid);
//            }
//            if($val['lock_time']> $new){
//                $homeid=$val['homeid'];
//                $hstatus['status'] = 1;
//                Buyinfo::update_d_home($homeid,$hstatus);
//
//            }
//        }
        if($data){
            return [
                'code' => '101',
                'msg'  => '请求成功',
                "result" => $data,
            ];
        }else{
            return [
                'code' => '102',
                'msg'  => '请求失败',
            ];
        }
    }
    /**
     * @api {post} api/1.0.0/buydeist 小后台认购详情
     * @apiName buydeist
     * @apiGroup GroupNamsepids
     *
     * @apiParam (参数) {int} buyid 认购id
     *
     * @apiSampleRequest http://192.168.1.220/fang/public/api/1.0.0/buydeist
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
    public function buydeist(Request $api)
    {
        $buyid = $api -> input('buyid');
        if(!$buyid){
            return [
                'code' => 103,
                'msg'  => '参数不全',
            ];
        }
        $data = Buyinfo::get_d_buy($buyid);
        if($data){
            return [
                'code' => 101,
                'msg'  => '请求成功',
                "result"=>$data,
            ];
        }else{
            return [
                'code' => 102,
                'msg'  => '请求失败',
            ];
        }
    }
    /**
     * @api {post} api/1.0.0/buyedit 小后台认购修改
     * @apiName buyedit
     * @apiGroup GroupNamsepids
     *
     * @apiParam (参数) {int} buyid 认购id
     * @apiParam (参数) {int} cust_id 客户id
     * @apiParam (参数) {string} realname 客户姓名
     * @apiParam (参数) {string} idcard 客户身份证
     * @apiParam (参数) {int} mobile 客户手机号
     * @apiParam (参数) {int} lock_time 房源锁定时间
     * @apiParam (参数) {int} pay_num 付款金额
     * @apiParam (参数) {int} pay_type 付款方案
     * @apiParam (参数) {int} [month_pay] 月供选择按揭必填
     * @apiParam (参数) {int} [loan_term] 年限选择按揭必填
     * @apiParam (参数) {int} total_price 总金额
     *
     * @apiParam (参数) {string} remarks 认购备注
     *
     * @apiSampleRequest http://192.168.1.220/fang/public/api/1.0.0/buyedit
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
    public function buyedit(Request $api)
    {
        $cust_id = $api -> input('cust_id');
        $cust['realname']=$realname= $api -> input('realname');
        $cust['idcard'] =$idcard= $api -> input('idcard');
        $cust['mobile'] =$mobile= $api -> input('mobile');
        if($cust_id){
            if(!$realname || !$idcard ||!$mobile){
                    return [
                        'code' => 108,
                        'msg'  => '参数不全',
                ];
            }
            Buyinfo::update_d_coms($cust_id,$cust);
        }else{
                 return [
                     'code' => 110,
                     'msg'  => '参数不全',
                 ];
        }
        $buyid = $api -> input('buyid');
        $data['lock_time'] =$lock_time= strtotime($api -> input('lock_time'));
        $data['pay_num'] = $pay_num= $api -> input('pay_num');
        $data['pay_type'] =$pay_type= $api -> input('pay_type');
        $data['total_price'] =$total_price= $api -> input('total_price');
        $data['month_pay'] =$month_pay= $api -> input('month_pay');
        $data['loan_term'] =$loan_term= $api -> input('loan_term');
        $data['remarks'] =$remarks= $api -> input('remarks');
        if(!$buyid){
            return [
                'code' => 105,
                'msg'  => '参数不全',
            ];
        }
        if($pay_type !=''){
            if($pay_type == 0){
                if(!$lock_time || !$pay_num || !$total_price || !$remarks){
                    return [
                        'code' => 103,
                        'msg' => '参数不全'
                    ];
                }
            }
            if($pay_type == 1){
                if(!$lock_time || !$pay_num || !$total_price || !$remarks || !$month_pay || !$loan_term){
                    return [
                        'code' => 106,
                        'msg' => '参数不全'
                    ];
                }
            }

        }else{
            return [
                'code' => 104,
                'msg'  => '请选择方案',
            ];
        }
        $data = Buyinfo::update_d_buyin($buyid,$data);
        if($data){
            return [
                'code' => 101,
                'msg'  => '请求成功',
            ];
        }else{
            return [
                'code' => 102,
                'msg'  => '请求失败',
            ];
        }
    }
    /**
     * @api {post} api/1.0.0/buydel 小后台认购删除
     * @apiName buydel
     * @apiGroup GroupNamsepids
     *
     * @apiParam (参数) {int} buyid 认购id
     * @apiParam (参数) {int} cust_id 客户id
     * @apiParam (参数) {int} homeid 房源id
     *
     * @apiSampleRequest http://192.168.1.220/fang/public/api/1.0.0/buydel
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
    public function buydel(Request $api)
    {
        $buyid = $api -> input('buyid');
        $cust_id = $api -> input('cust_id');
        if($buyid){
            if($cust_id){
                Buyinfo::del_all_coow($cust_id);
            }else{
                return [
                    'code' => 104,
                    'msg'  => '参数不全',
                ];
            }
        }else{
            return [
                'code' => 103,
                'msg'  => '参数不全',
            ];
        }
        $data =Buyinfo::del_d_buy($buyid);
        if($data){
            $homeid = $api -> input('homeid');
            if(!$homeid){
                return [
                    'code' => 105,
                    'msg'  => '参数不全',
                ];
            }
            $homes=Buyinfo::update_home_mana($homeid);
            if($homes){
                    return [
                        'code' => 101,
                        'msg'  => '请求成功',
                    ];
            }else{
                return [
                    'code' => 102,
                    'msg'  => '请求失败',
                ];
            }
        }
    }
    /**
     * @api {post} api/1.0.0/buyalldel 小后台认购全选删除
     * @apiName buyalldel
     * @apiGroup GroupNamsepids
     *
     * @apiParam (参数) {int} buyid 认购id
     * @apiParam (参数) {int} cust_id 客户id
     * @apiParam (参数) {int} homeid 房源id
     *
     * @apiSampleRequest http://192.168.1.220/fang/public/api/1.0.0/buyalldel
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
    public function buyalldel(Request $api)
    {
        $buyid = $api -> input('buyid');
        $pieceses=trim($buyid,',');
        $buy = explode(",", $pieceses);
        $cust_id = $api -> input('cust_id');
        $pieceses=trim($cust_id,',');
        $cust = explode(",", $pieceses);
        if($buy){
            if($cust){
                Buyinfo::del_cust_coow($cust);
            }else{
                return [
                    'code' => 104,
                    'msg'  => '参数不全',
                ];
            }
        }else{
            return [
                'code' => 103,
                'msg'  => '参数不全',
            ];
        }
        $data =Buyinfo::del_all_buy($buy);
        if($data){
            $homeid = $api -> input('homeid');
            $pieceses=trim($homeid,',');
            $homesas = explode(",", $pieceses);
            if(!$homesas){
                return [
                    'code' => 105,
                    'msg'  => '参数不全',
                ];
            }
            $homes=Buyinfo::update_allhome_mana($homesas);
            if($homes){
                return [
                    'code' => 101,
                    'msg'  => '请求成功',
                ];
            }else{
                return [
                    'code' => 102,
                    'msg'  => '请求失败',
                ];
            }
        }
    }

}
