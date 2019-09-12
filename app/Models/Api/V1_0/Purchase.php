<?php

namespace App\Models\Api\V1_0;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Purchase extends Model
{
    //查询用户计划方案
    public static function get_d_cust($cust_id)
    {
        return DB::table('purchase_plan')
            -> select('purchase_plan.*','customer.realname')
            -> leftJoin('customer','purchase_plan.cust_id','=','customer.cust_id')
            -> where('purchase_plan.cust_id','=',$cust_id)
            -> get();
    }

    //查询单条计划方案
    public static function get_d_planid($planid)
    {
        return DB::table('purchase_plan')
            -> select('purchase_plan.*','customer.realname')
            -> leftJoin('customer','purchase_plan.cust_id','=','customer.cust_id')
            -> where('purchase_plan.planid','=',$planid)
            -> first();
    }

}
