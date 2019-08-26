<?php

namespace App\Models\admin;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Coownerinfo extends Model
{
    //查询所有房屋共有人
    public static function get_all_coowner($page)
    {
        return DB::table('coownerinfo')
            -> select('coownerinfo.*','customer.realname as name')
            -> leftJoin('customer','coownerinfo.cust_id','=','customer.cust_id')
            -> paginate($page);
    }

    //房屋共有人修改查询单条数据
    public static function get_d_coowner($coow_id){
        return DB::table('coownerinfo')
            -> select('coownerinfo.*','customer.realname as name')
            -> leftJoin('customer','coownerinfo.cust_id','=','customer.cust_id')
            ->where('coownerinfo.coow_id','=',$coow_id)
            -> first();
    }

}
