<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class Changecust extends Model
{
    //查询当前用户
    public static function get_d_name($buyid)
    {
        return DB::table('buyinfo')
            -> select('buyinfo.*','customer.realname','customer.mobile','customer.idcard')
            -> leftJoin('customer','buyinfo.cust_id','=','customer.cust_id')
            -> where('buyinfo.buyid','=',$buyid) -> first();
    }

    //查询所有用户
    public static function get_all_name()
    {
        return DB::table('customer')->get();
    }

    //查询单前用户购买的房子
    public static function get_d_home($homeid)
    {
        return DB::table('homeinfo')
            ->select( 'homeinfo.*' , 'fieldinfob.name as buildnums' , 'fieldinfou.name as unitnums' , 'fieldinfor.name as roomnums' )
            ->leftJoin( 'fieldinfo as fieldinfob' , 'homeinfo.buildnum' , '=' , 'fieldinfob.field_id' )
            ->leftJoin( 'fieldinfo as fieldinfou' , 'homeinfo.unitnum' , '=' , 'fieldinfou.field_id' )
            ->leftJoin( 'fieldinfo as fieldinfor' , 'homeinfo.roomnum' , '=' , 'fieldinfor.field_id' )
            -> where('homeinfo.homeid','=',$homeid)->first();
    }

    //添加更名信息
    public static function store_changecust($data)
    {
        return DB::table('changeinfo') ->insert($data);
    }
}
