<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Purchase extends Model
{
    //查询当前用户
    public static function get_customer($cust_id)
    {
        return DB::table('customer')->where('cust_id','=',$cust_id)->get();
    }

    //添加方案信息
    public static function store_purchase($data)
    {
        return DB::table('purchase_plan') -> insert($data);
    }

    //查询所有方案
    public static function get_all_purchase($page)
    {
        return DB::table('purchase_plan')
            -> select('purchase_plan.*','customer.realname')
            -> leftJoin('customer','purchase_plan.cust_id','=','customer.cust_id')
            -> paginate($page);
    }

    //查询单条方案
    public static function get_d_trackinfo($planid)
    {
        return DB::table('purchase_plan')
            -> select('purchase_plan.*','customer.realname')
            -> leftJoin('customer','purchase_plan.cust_id','=','customer.cust_id')
            -> where('purchase_plan.planid','=',$planid)
            -> first();
    }

    //方案更新数据
    public static function update_d_purchase($planid,$data)
    {
        return DB::table('purchase_plan') -> where('planid','=',$planid)->update($data);
    }

    //方案删除单条
    public static function del_d_purchase($planid)
    {
        return DB::table('purchase_plan') -> where('planid','=',$planid) -> delete();
    }

    //方案全选删除
    public static function delete_all_purchase($all_id)
    {
        return DB::table('purchase_plan') ->whereIn('planid',$all_id) ->delete();
    }
}
