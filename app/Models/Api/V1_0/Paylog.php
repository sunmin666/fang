<?php

namespace App\Models\Api\V1_0;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Paylog extends Model
{
    //查看职业顾问下的客户
    public static function get_paulog_cust($hous_id,$page,$search)
    {
        $pages =  	$page - 1;
        return DB::table('customer')
            -> select('customer.realname','customer.cust_id','customer.mobile','buyinfo.buy_number','buyinfo.buy_number'
                ,'buyinfo.homeid','homeinfo.status','fieldinfob.name as buildnums',
               'fieldinfou.name as unitnums','homeinfo.status', 'fieldinfor.name as roomnums')
            -> offset($pages)->limit(7)
            -> leftJoin('buyinfo','customer.cust_id','=','buyinfo.cust_id')
            -> leftJoin('homeinfo','buyinfo.homeid','=','homeinfo.homeid')
            -> leftJoin('fieldinfo as fieldinfob','homeinfo.buildnum','=','fieldinfob.field_id')
            -> leftJoin('fieldinfo as fieldinfou','homeinfo.unitnum','=','fieldinfou.field_id')
            -> leftJoin('fieldinfo as fieldinfor','homeinfo.roomnum','=','fieldinfor.field_id')
            -> where(function($query) use ($search){
                if($search){
                    $query -> where('customer.realname','like','%'.$search.'%')->orWhere('customer.mobile','like','%'.$search.'%');
                }
            })
            -> where('customer.hous_id','=',$hous_id)
            -> get() -> map(function($value){
                return (array)$value;
            }) -> toArray();
    }

    //查看当前用户的房源
    public static function get_pay_home($subscription_num)
    {
        return DB::table('payloginfo')
            -> select('customer.cust_id','customer.realname','customer.idcard','customer.mobile',
                'payloginfo.type','payloginfo.money','payloginfo.remarks','payloginfo.created_at','payloginfo.subscription_num','buyinfo.pay_type',
                'buyinfo.homeid','homeinfo.house_name','homeinfo.build_area','homeinfo.buildnum',
                'homeinfo.price','homeinfo.total','homeinfo.discount',
                'homeinfo.floor','fieldinfob.name as buildnums',
                'fieldinfou.name as unitnums', 'fieldinfor.name as roomnums')
            -> leftJoin('customer','payloginfo.cust_id','=','customer.cust_id')
            -> leftJoin('buyinfo','payloginfo.subscription_num','=','buyinfo.buy_number')
            -> leftJoin('homeinfo','buyinfo.homeid','=','homeinfo.homeid')
            -> leftJoin('fieldinfo as fieldinfob','homeinfo.buildnum','=','fieldinfob.field_id')
            -> leftJoin('fieldinfo as fieldinfou','homeinfo.unitnum','=','fieldinfou.field_id')
            -> leftJoin('fieldinfo as fieldinfor','homeinfo.roomnum','=','fieldinfor.field_id')
            -> where('payloginfo.subscription_num','=',$subscription_num)
            -> first();
    }

    //查询付款金额
    public static function get_total_price($subscription_num)
    {
        return DB::table('buyinfo')
            -> select('buyinfo.total_price')
            -> where('buyinfo.buy_number','=',$subscription_num)
            -> first();
    }

    //查询按揭支付
    public static function get_month_pay($subscription_num)
    {
        return DB::table('buyinfo')
            -> select('buyinfo.loan_term','buyinfo.month_pay','buyinfo.total_price')
            -> where('buyinfo.buy_number','=',$subscription_num)
            -> first();
    }
}
