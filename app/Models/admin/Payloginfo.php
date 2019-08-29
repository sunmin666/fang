<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Payloginfo extends Model
{
    //查询当前用户
    public static function get_customer($cust_id)
    {
        return DB::table('customer')->where('cust_id','=',$cust_id)->get();
    }

    //添加缴费记录
    public static function store_pay($data)
    {
        return DB::table('payloginfo')->insert($data);
    }

    //查询所有用户缴费记录
    public static function get_all_pay($page)
    {
        return DB::table('payloginfo')
            -> select('payloginfo.*','customer.realname')
            -> leftJoin('customer','payloginfo.cust_id','=','customer.cust_id')
            -> paginate($page);
    }

    //查询单条记录
    public static function get_d_pay($payl_id)
    {
        return DB::table('payloginfo')
            -> select('payloginfo.*','customer.realname')
            -> leftJoin('customer','payloginfo.cust_id','=','customer.cust_id')
            ->where('payloginfo.payl_id','=',$payl_id) -> first();
    }

    //更新缴费记录数据
    public static function update_d_pay($payl_id,$data)
    {
        return DB::table('payloginfo') -> where('payl_id','=',$payl_id) ->update($data);
    }

    //删除单条缴费记录
    public static function del_d_pay($payl_id)
    {
        return DB::table('payloginfo') ->where('payl_id','=',$payl_id) ->delete();
    }

    //全选删除
    public static function delete_all_pay($payl_id)
    {
        return DB::table('payloginfo') ->whereIn('payl_id',$payl_id) ->delete();
    }
}
