<?php

namespace App\Models\Api\V1_0;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Ledger extends Model
{
    //查询职业顾问下所有的客户
    public static function get_ledger_cust($hous_id)
    {
        return DB::table('customer')
            -> select('customer.realname','customer.cust_id','customer.mobile','customer.sex')
            -> leftJoin('houserinfo','customer.hous_id','=','houserinfo.hous_id')
            -> where('customer.hous_id','=',$hous_id)
            -> get() -> map(function($value){
                return (array)$value;
            }) -> toArray();
    }

    //查询认购的房子信息
    public static function get_buyinfo($cust_id)
    {
        return DB::table('buyinfo')
            -> select('buyinfo.buy_number','buyinfo.created_at','homeinfo.buildnum','homeinfo.unitnum',
                'homeinfo.roomnum','fieldinfob.name as buildnums','fieldinfou.name as unitnums',
                'fieldinfor.name as roomnums')
            -> leftJoin('homeinfo','buyinfo.homeid','=','homeinfo.homeid')
            -> leftJoin('fieldinfo as fieldinfob','homeinfo.buildnum','=','fieldinfob.field_id')
            -> leftJoin('fieldinfo as fieldinfou','homeinfo.unitnum','=','fieldinfou.field_id')
            -> leftJoin('fieldinfo as fieldinfor','homeinfo.roomnum','=','fieldinfor.field_id')
            -> where('buyinfo.cust_id','=',$cust_id)
            -> where('buyinfo.finance_verify_status','=',1)
            -> get();
    }

    //查询房子数量
    public static function get_t_count($cust_id)
    {
        return DB::table('buyinfo')
            -> select('buyinfo.cust_id')
            ->where('buyinfo.cust_id','=',$cust_id)
            -> where('buyinfo.finance_verify_status','=',1)
            ->count();
    }

    //查询已更名
    public static function get_ledger_change($hous_id)
    {
        return DB::table('customer')
            -> select('customer.realname','customer.cust_id')
            -> leftJoin('houserinfo','customer.hous_id','=','houserinfo.hous_id')
            -> where('customer.hous_id','=',$hous_id)
            -> get() -> map(function($value){
                return (array)$value;
            }) -> toArray();
    }

    //查询更名的具体信息
    public static function get_changecust($cust_id)
    {
        return DB::table('changeinfo')
            -> select('changeinfo.created_at','customer.realname as newname','homeinfo.buildnum',
                'homeinfo.unitnum','homeinfo.roomnum','fieldinfob.name as buildnums','fieldinfou.name as unitnums',
                'fieldinfor.name as roomnums','buyinfo.buy_number')
            -> leftJoin('buyinfo','changeinfo.buyid','=','buyinfo.buyid')
            -> leftJoin('customer','changeinfo.new_cust','=','customer.cust_id')
            -> leftJoin('homeinfo','changeinfo.old_homeid','=','homeinfo.homeid')
            -> leftJoin('fieldinfo as fieldinfob','homeinfo.buildnum','=','fieldinfob.field_id')
            -> leftJoin('fieldinfo as fieldinfou','homeinfo.unitnum','=','fieldinfou.field_id')
            -> leftJoin('fieldinfo as fieldinfor','homeinfo.roomnum','=','fieldinfor.field_id')
            -> where('changeinfo.cust_id','=',$cust_id)
            -> where('changeinfo.type','=',1)
            -> where('changeinfo.status','=',1)
            -> get();
    }

    //已换房
    public static function get_changehome($cust_id)
    {
        return DB::table('changeinfo')
            -> select('changeinfo.created_at','old_homeinfo.roomnum as old_roomnum','new_homeinfo.roomnum as new_roomnum',
                'fieldinfor_old.name as roomnum_old' ,'fieldinfor_new.name as roomnum_new')
            ->leftJoin( 'homeinfo as old_homeinfo' , 'changeinfo.old_homeid' , '=' , 'old_homeinfo.homeid' )
            ->leftJoin( 'homeinfo as new_homeinfo' , 'changeinfo.new_homeid' , '=' , 'new_homeinfo.homeid' )
            ->leftJoin( 'fieldinfo as fieldinfor_old' , 'old_homeinfo.roomnum' , '=' , 'fieldinfor_old.field_id' )
            ->leftJoin( 'fieldinfo as fieldinfor_new' , 'new_homeinfo.roomnum' , '=' , 'fieldinfor_new.field_id' )
            -> where('changeinfo.cust_id','=',$cust_id)
            -> where('changeinfo.type','=',2)
            -> where('changeinfo.finance_status','=',1)
            -> get();
    }

    //已延迟
    public static function get_delaysing($cust_id)
    {
        return DB::table('signinfo')
            -> select('signinfo.created_at','buyinfo.buy_number','signinfo.delay_time')
            -> leftJoin('buyinfo','signinfo.buyid','=','buyinfo.buyid')
            -> where('signinfo.cust_id','=',$cust_id)
            -> where('signinfo.sign_type','=',1)
            -> where('signinfo.sign_status','=',1)
            -> get();
    }

    //已签约
    public static function get_signinfo($cust_id)
    {
        return DB::table('signinfo')
            -> select('signinfo.created_at','buyinfo.buy_number')
            -> leftJoin('buyinfo','signinfo.buyid','=','buyinfo.buyid')
            -> where('signinfo.cust_id','=',$cust_id)
            -> where('signinfo.sign_type','=',0)
            -> where('signinfo.finance_status','=',1)
            -> get();
    }

    //已退房
    public static function get_checkout($cust_id)
    {
        return DB::table('changeinfo')
            -> select('changeinfo.created_at','buyinfo.buy_number as number','homeinfo.buildnum',
                'homeinfo.unitnum','homeinfo.roomnum','fieldinfob.name as buildnums',
                'fieldinfou.name as unitnums','fieldinfor.name as roomnums')
            -> leftJoin('buyinfo','changeinfo.buyid','=','buyinfo.buyid')
            -> leftJoin('homeinfo','changeinfo.old_homeid','=','homeinfo.homeid')
            -> leftJoin('fieldinfo as fieldinfob','homeinfo.buildnum','=','fieldinfob.field_id')
            -> leftJoin('fieldinfo as fieldinfou','homeinfo.unitnum','=','fieldinfou.field_id')
            -> leftJoin('fieldinfo as fieldinfor','homeinfo.roomnum','=','fieldinfor.field_id')
            -> where('changeinfo.cust_id','=',$cust_id)
            -> where('changeinfo.type','=',3)
            -> where('changeinfo.finance_status','=',1)
            -> get();
    }

    //认购未通过用户信息
    public static function get_ledger_buyinfopass($hous_id)
    {

        return DB::table('customer')
            -> select('customer.realname','customer.cust_id','customer.mobile')
            -> leftJoin('houserinfo','customer.hous_id','=','houserinfo.hous_id')
            -> where('customer.hous_id','=',$hous_id)
            -> get() -> map(function($value){
                return (array)$value;
            }) -> toArray();

    }

    //认购未通过详细信息
    public static function get_buyinfopass($cust_id)
    {
        return DB::table('buyinfo')
            -> select('buyinfo.buy_number','buyinfo.created_at','buyinfo.pay_num','buyinfo.manager_verify_status','buyinfo.manager_verify_status','buyinfo.manager_verify_time','buyinfo.finance_verify_status','buyinfo.finance_verify_time')
            -> where('buyinfo.cust_id','=',$cust_id)
            -> get();
    }

    //更名未通过详细信息
    public static function get_changepass($cust_id)
    {
        return DB::table('changeinfo')
            -> select('buyinfo.buy_number','changeinfo.created_at','customer.realname as newname','customer.mobile as newmobile','changeinfo.status','changeinfo.verifytime')
            -> leftJoin('customer','changeinfo.new_cust','=','customer.cust_id')
            -> leftJoin('buyinfo','changeinfo.buyid','=','buyinfo.buyid')
            -> where('changeinfo.cust_id','=',$cust_id)
            -> where('changeinfo.type','=',1)
            -> get();
    }

    //换房未通过详细信息
    public static function get_chahomepass($cust_id)
    {
        return DB::table('changeinfo')
            -> select('buyinfo.buy_number','changeinfo.created_at','customer.realname as newname','customer.mobile as newmobile','changeinfo.status','changeinfo.verifytime')
            -> leftJoin('customer','changeinfo.new_cust','=','customer.cust_id')
            -> leftJoin('buyinfo','changeinfo.buyid','=','buyinfo.buyid')
            -> where('changeinfo.cust_id','=',$cust_id)
            -> where('changeinfo.type','=',2)
            -> get();
    }
}
