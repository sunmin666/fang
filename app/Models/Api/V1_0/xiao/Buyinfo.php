<?php

namespace App\Models\Api\V1_0\xiao;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Buyinfo extends Model
{
    //通过单元查房子状态为0的
    public static function get_home_status($field_id,$floorid)
    {
        return DB::table('homeinfo')
            -> select('homeid','fieldinfo.name')
            -> leftJoin('fieldinfo','homeinfo.roomnum','=','fieldinfo.field_id')
            -> where('homeinfo.unitnum','=',$field_id)
            -> where('homeinfo.floor','=',$floorid)
            -> where('homeinfo.status','=',0)
            -> get();
    }

    //查询该房源的具体信息
    public static function get_home_homeinfo($homeid)
    {
        return DB::table('homeinfo')
            -> select('homeid','fieldinfoa.name as buildname','fieldinfob.name as unitname',
                'fieldinfoc.name as floorname','fieldinfod.name as roomname',
                'picalbum.area_room','price','total','discount')
            -> leftJoin('fieldinfo as fieldinfoa','homeinfo.buildnum','=','fieldinfoa.field_id')
            -> leftJoin('fieldinfo as fieldinfob','homeinfo.unitnum','=','fieldinfob.field_id')
            -> leftJoin('fieldinfo as fieldinfoc','homeinfo.floor','=','fieldinfoc.field_id')
            -> leftJoin('fieldinfo as fieldinfod','homeinfo.roomnum','=','fieldinfod.field_id')
            -> leftJoin('picalbum','homeinfo.house_str','=','picalbum.house_room')
            -> where('homeinfo.homeid',$homeid)
            -> first();
    }

    //查询该用户的基本信息
    public static function get_cum_cust($cust_id)
    {
        return DB::table('customer')
            -> select('customer.realname','customer.mobile','customer.idcard','customer.hous_id','houserinfo.name')
            -> leftJoin('houserinfo','customer.hous_id','=','houserinfo.hous_id')
            -> where('customer.cust_id','=',$cust_id)
            -> first();
    }

    //添加用户身份证号
    public static function update_d_idcard($cust_id,$dacard)
    {
        return DB::table('customer')-> where('cust_id','=',$cust_id) -> update($dacard);

    }

    //查询身份证号是否已存在
    public static function insert_d_idcard($idcard)
    {
        return DB::table('customer')-> where('idcard','=',$idcard) -> first();
    }

    //添加认购信息
    public static function add_d_buy($data)
    {
        return DB::table('buyinfo') -> insertGetId($data);
    }

    //认购编号
    public static function update_buy_number($buyid,$buy)
    {
        return DB::table('buyinfo') -> where('buyid','=',$buyid) -> update($buy);
    }

    //添加共有人
    public static function add_coowner($coowgyr)
    {
        return DB::table('coownerinfo') -> insert($coowgyr);
    }

    //修改房源状态
    public static function update_d_home($homeid,$hstatus)
    {
        return DB::table('homeinfo') -> where('homeid','=',$homeid) -> update($hstatus);
    }

    //经理审核
    public static function update_d_mana($buyid,$mana)
    {
        return DB::table('buyinfo') -> where('buyid','=',$buyid) -> update($mana);
    }

    //经理审核不通过修改房源状态
    public static function update_home_mana($homeid)
    {
        return DB::table('homeinfo') -> where('homeid','=',$homeid) -> update(
            array('status' => 0)
        );
    }

    //财务审核通过修改房子状态
    public static function update_finance_home($homeid)
    {
        return DB::table('homeinfo') -> where('homeid','=',$homeid) -> update(array('status' => 2));
    }

    //认购列表
    public static function get_all_buy($page)
    {
        $pages =  	$page - 1;
        return DB::table('buyinfo')
            -> offset($pages*10)->limit(10)
            -> select('buyinfo.*','customer.realname','fieldinfo.name as room')
            -> leftJoin('customer','buyinfo.cust_id','customer.cust_id')
            -> leftJoin('homeinfo','buyinfo.homeid','homeinfo.homeid')
            -> leftJoin('fieldinfo','homeinfo.roomnum','fieldinfo.field_id')
            -> where('buyinfo.status','=',1)
            -> get()-> map(function($value){
                return (array)$value;
            }) -> toArray();
    }

    //认购总条数
    public static function get_all_count()
    {
        return DB::table('buyinfo') -> count();
    }

    //认购详情
    public static function get_d_buy($buyid)
    {
        return DB::table('buyinfo')
            -> select('buyinfo.*','customer.realname', 'fieldinfoa.name as builname',
                'fieldinfob.name as unitname','fieldinfoc.name as roomname',
                'fieldinfoe.name as floorname','coownerinfo.relation','coownerinfo.realname as gyrname',
                'coownerinfo.birthday','coownerinfo.idcard','coownerinfo.mobile','coownerinfo.created_at as gyrcreated')
            -> leftJoin('customer','buyinfo.cust_id','customer.cust_id')
            -> leftJoin('homeinfo','buyinfo.homeid','=','homeinfo.homeid')
            -> leftJoin('fieldinfo as fieldinfoa','homeinfo.buildnum','=','fieldinfoa.field_id')
            -> leftJoin('fieldinfo as fieldinfob','homeinfo.unitnum','=','fieldinfob.field_id')
            -> leftJoin('fieldinfo as fieldinfoc','homeinfo.roomnum','=','fieldinfoc.field_id')
            -> leftJoin('fieldinfo as fieldinfoe','homeinfo.floor','=','fieldinfoe.field_id')
            -> leftJoin('coownerinfo','buyinfo.cust_id','coownerinfo.cust_id')
            -> where('buyinfo.status','=',1)
            -> where('buyinfo.buyid','=',$buyid)
            -> first();
    }

    //修改客户信息
    public static function update_d_coms($cust_id,$cust)
    {
        return DB::table('customer')-> where('cust_id','=',$cust_id) -> update($cust);
    }

    //修改认购信息
    public static function update_d_buyin($buyid,$data)
    {
        return DB::table('buyinfo') -> where('buyid','=',$buyid) -> update($data);
    }

    //删除共有人
    public static function del_all_coow($cust_id)
    {
        return DB::table('coownerinfo') -> where('cust_id','=',$cust_id) -> delete();
    }

    //删除认购信息
    public static function del_d_buy($buyid)
    {
        return DB::table('buyinfo') -> where('buyid','=',$buyid) -> delete();
    }

    //全选删除先删除共有人
    public static function del_cust_coow($cust)
    {
        return DB::table('coownerinfo') -> whereIn('cust_id',$cust) -> delete();
    }

    //全选删除认购信息
    public static function del_all_buy($buy)
    {
        return DB::table('buyinfo') -> whereIn('buyid',$buy) -> delete();
    }

    //全选删除修改房源状态
    public static function update_allhome_mana($homesas)
    {
        return DB::table('homeinfo') -> whereIn('homeid',$homesas) -> update(
            array('status' => 0)
        );
    }

    //修改房源状态
    public static function update_d_hstatus($homeid)
    {
        return DB::table('homeinfo') -> where('homeid','=',$homeid) -> update(
            array('status' => 0)
        );
    }
}
