<?php

namespace App\Models\Api\V1_0\xiao;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Paylo extends Model
{
    //查询用户下的编号
    public static function get_all_buy($cust_id)
    {
        return DB::table('buyinfo') ->select('buy_number') -> where('cust_id','=',$cust_id)  -> get();
    }

    //缴费添加
    public static function add_d_pay($data)
    {
        return DB::table('payloginfo') -> insert($data);
    }

    //缴费列表
    public static function get_all_pay($page)
    {
        $pages =  	$page - 1;
        return DB::table('payloginfo')
            -> offset($pages*10)->limit(10)
            ->select('payloginfo.*','customer.realname','buyinfo.homeid',
                'fieldinfoa.name as builname','fieldinfob.name as unitname',
                'fieldinfoc.name as roomname','fieldinfoe.name as floorname')
            -> leftJoin('customer','payloginfo.cust_id','customer.cust_id')
            -> leftJoin('buyinfo','payloginfo.subscription_num','buyinfo.buy_number')
            -> leftJoin('homeinfo','buyinfo.homeid','homeinfo.homeid')
            -> leftJoin('fieldinfo as fieldinfoa','homeinfo.buildnum','=','fieldinfoa.field_id')
            -> leftJoin('fieldinfo as fieldinfob','homeinfo.unitnum','=','fieldinfob.field_id')
            -> leftJoin('fieldinfo as fieldinfoc','homeinfo.roomnum','=','fieldinfoc.field_id')
            -> leftJoin('fieldinfo as fieldinfoe','homeinfo.floor','=','fieldinfoe.field_id')
            -> get()-> map(function($value){
                return (array)$value;
            }) -> toArray();
    }

    //缴费总条数
    public static function get_all_count()
    {
        return DB::table('payloginfo') -> count();
    }

    //缴费详情
    public static function get_d_pay($payl_id)
    {
        return DB::table('payloginfo')
            ->select('payloginfo.*','customer.realname','buyinfo.homeid',
                'fieldinfoa.name as builname','fieldinfob.name as unitname',
                'fieldinfoc.name as roomname','fieldinfoe.name as floorname')
            -> leftJoin('customer','payloginfo.cust_id','customer.cust_id')
            -> leftJoin('buyinfo','payloginfo.subscription_num','buyinfo.buy_number')
            -> leftJoin('homeinfo','buyinfo.homeid','homeinfo.homeid')
            -> leftJoin('fieldinfo as fieldinfoa','homeinfo.buildnum','=','fieldinfoa.field_id')
            -> leftJoin('fieldinfo as fieldinfob','homeinfo.unitnum','=','fieldinfob.field_id')
            -> leftJoin('fieldinfo as fieldinfoc','homeinfo.roomnum','=','fieldinfoc.field_id')
            -> leftJoin('fieldinfo as fieldinfoe','homeinfo.floor','=','fieldinfoe.field_id')
            -> where('payloginfo.payl_id','=',$payl_id)
            -> first();
    }

    //缴费修改
    public static function edit_d_pay($payl_id,$data)
    {
        return DB::table('payloginfo') -> where('payl_id','=',$payl_id) -> update($data);
    }

    //缴费删除
    public static function del_d_pay($payl_id)
    {
        return DB::table('payloginfo') -> where('payl_id','=',$payl_id) -> delete();
    }

    //缴费全选删除
    public static function del_all_pay($pieces)
    {
        return DB::table('payloginfo') -> whereIn('payl_id',$pieces) -> delete();
    }
}
