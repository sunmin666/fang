<?php

namespace App\Models\Api\V1_0;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Purchase extends Model
{
    //查询置业顾问下所有用户计划方案
    public static function get_purch_hous($hous_id,$page)
    {
        $pages =  	$page - 1;
        return DB::table('customer')
            -> select('customer.realname','customer.mobile','customer.sex','customer.cust_id','purchase_plan.type','purchase_plan.created_at','purchase_plan.programme')
            -> offset($pages)->limit(7)
            -> leftJoin('purchase_plan','customer.cust_id','=','purchase_plan.cust_id')
            -> where('customer.hous_id','=',$hous_id)
            -> get();
    }

    //查询客户下的房源
    public static function get_purch_home($cust_id)
    {
        return DB::table('purchase_plan')
            -> select('homeinfo.buildnum','homeinfo.unitnum','homeinfo.roomnum','fieldinfob.name as buildnums','fieldinfou.name as unitnums','fieldinfor.name as roomnums')
            -> leftJoin('homeinfo','purchase_plan.homeid','=','homeinfo.homeid')
            -> leftJoin('fieldinfo as fieldinfob','homeinfo.buildnum','=','fieldinfob.field_id')
            -> leftJoin('fieldinfo as fieldinfou','homeinfo.unitnum','=','fieldinfou.field_id')
            -> leftJoin('fieldinfo as fieldinfor','homeinfo.roomnum','=','fieldinfor.field_id')
            -> where('purchase_plan.cust_id','=',$cust_id)
            -> first();
    }

    //添加客户计划方案
    public static function inset_d_pur($data)
    {
        return DB::table('purchase_plan') -> insert($data);
    }

    //查询单前客户
    public static function get_purch_cust($cust_id)
    {
        return DB::table('customer')
            -> select('customer.cust_id','customer.realname','customer.mobile','customer.sex','houserinfo.name','houserinfo.mobile as houmobile')
            -> leftJoin('houserinfo','customer.hous_id','=','houserinfo.hous_id')
            -> where('customer.cust_id','=',$cust_id)
            -> first();
    }

    //查询客户具体置业方案
    public static function get_pur_home($cust_id)
    {
        return DB::table('purchase_plan')
            -> select('purchase_plan.type','purchase_plan.once_total','purchase_plan.years','purchase_plan.month_price','purchase_plan.month_total','homeinfo.buildnum','homeinfo.unitnum','homeinfo.roomnum','homeinfo.floor','homeinfo.house_name','homeinfo.build_area','homeinfo.price','homeinfo.total','homeinfo.discount','fieldinfob.name as buildnums','fieldinfou.name as unitnums','fieldinfor.name as roomnums')
            -> leftJoin('homeinfo','purchase_plan.homeid','=','homeinfo.homeid')
            -> leftJoin('fieldinfo as fieldinfob','homeinfo.buildnum','=','fieldinfob.field_id')
            -> leftJoin('fieldinfo as fieldinfou','homeinfo.unitnum','=','fieldinfou.field_id')
            -> leftJoin('fieldinfo as fieldinfor','homeinfo.roomnum','=','fieldinfor.field_id')
            -> where('purchase_plan.cust_id','=',$cust_id)
            -> get();
    }




}
