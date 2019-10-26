<?php

namespace App\Models\Api\V1_0\xiao;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Remind extends Model
{
    //通过手机号获取用户的id姓名
    public static function get_d_cust($mobile)
    {
        return DB::table('customer') ->select('cust_id','realname') -> where('mobile','=',$mobile) -> first();
    }

    //添加提醒
    public static function add_d_remind($data)
    {
        return DB::table('remindinfo') -> insert($data);
    }

    //提醒列表
    public static function get_all_rem($page,$hous_id,$modular)
    {
        $pages =  	$page - 1;
        return DB::table('remindinfo')
            -> offset($pages*10)->limit(10)
            -> select('remindinfo.*','houserinfo.name','customer.realname')
            -> leftJoin('houserinfo','remindinfo.hous_id','=','houserinfo.hous_id')
            -> leftJoin('customer','remindinfo.cust_id','=','customer.cust_id')
            -> where(function($query) use ($hous_id){
                if($hous_id){
                    $query -> where('remindinfo.hous_id','like','%'.$hous_id.'%');
                }
            })
            -> where(function($query) use ($modular){
                if($modular){
                    $query -> where('remindinfo.modular','like','%'.$modular.'%');
                }
            })
            -> get()-> map(function($value){
                return (array)$value;
            }) -> toArray();
    }

    //提醒总条数
    public static function get_all_count($hous_id,$modular)
    {
        return DB::table('remindinfo')
            -> where(function($query) use ($hous_id){
                if($hous_id){
                    $query -> where('remindinfo.hous_id','like','%'.$hous_id.'%');
                }
            })
            -> where(function($query) use ($modular){
                if($modular){
                    $query -> where('remindinfo.modular','like','%'.$modular.'%');
                }
            })
            -> count();
    }

    //提醒详情
    public static function get_d_remd($remi_id)
    {
        return DB::table('remindinfo')
            -> select('remindinfo.*','houserinfo.name','customer.realname')
            -> leftJoin('houserinfo','remindinfo.hous_id','=','houserinfo.hous_id')
            -> leftJoin('customer','remindinfo.cust_id','=','customer.cust_id')
            -> where('remindinfo.remi_id','=',$remi_id)
            -> first();
    }

    //提醒修改
    public static function edit_d_rem($remi_id,$data)
    {
        return DB::table('remindinfo') -> where('remi_id','=',$remi_id) -> update($data);
    }

    //提醒删除
    public static function del_d_rem($remi_id)
    {
        return DB::table('remindinfo') -> where('remi_id','=',$remi_id) -> delete();
    }

    //提醒全选删除
    public static function del_all_rem($pieces)
    {
        return DB::table('remindinfo') -> whereIn('remi_id',$pieces) -> delete();
    }
}
