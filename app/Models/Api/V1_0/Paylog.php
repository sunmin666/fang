<?php

namespace App\Models\Api\V1_0;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Paylog extends Model
{
    //查看用户缴费记录
    public static function get_d_cust($cust_id)
    {
        return DB::table('payloginfo')
            -> select('payloginfo.*','customer.realname')
            -> leftJoin('customer','payloginfo.cust_id','=','customer.cust_id')
            -> where('payloginfo.cust_id','=',$cust_id)
            -> get();
    }
}
