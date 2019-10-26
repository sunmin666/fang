<?php

namespace App\Models\Api\V1_0\xiao;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Coowner extends Model
{
    //查看身份证是否已存在
    public static function idcard_d_coow($idcard)
    {
        return DB::table('coownerinfo') -> where('idcard','=',$idcard) -> first();
    }

    //查看手机号是否已存在
    public static function mobile_d_coow($mobile)
    {
        return DB::table('coownerinfo') -> where('mobile','=',$mobile) -> first();
    }

    //添加共有人
    public static function add_d_coow($data)
    {
        return DB::table('coownerinfo') -> insert($data);
    }

    //共有人列表
    public static function get_all_coow($page,$realname,$mobile)
    {
        $pages =  	$page - 1;
        return DB::table('coownerinfo')
            -> offset($pages*10)->limit(10)
            -> select('coownerinfo.*','customer.realname as username')
            -> leftJoin('customer','coownerinfo.cust_id','=','customer.cust_id')
            -> where(function($query) use ($realname){
                if($realname){
                    $query -> where('coownerinfo.realname','like','%'.$realname.'%');
                }
            })
            -> where(function($query) use ($mobile){
                if($mobile){
                    $query -> where('coownerinfo.mobile','like','%'.$mobile.'%');
                }
            })
            -> get()-> map(function($value){
                return (array)$value;
            }) -> toArray();
    }

    //总条数
    public static function get_all_count()
    {
        return DB::table('coownerinfo') -> count();
    }

    //共有人详情
    public static function get_d_coow($coow_id)
    {
        return DB::table('coownerinfo')
            -> select('coownerinfo.*','customer.realname as username')
            -> leftJoin('customer','coownerinfo.cust_id','=','customer.cust_id')
            -> where('coownerinfo.coow_id','=',$coow_id)
            -> first();
    }

    //共有人修改
    public static function edit_d_coow($coow_id,$data)
    {
        return DB::table('coownerinfo') -> where('coow_id','=',$coow_id) -> update($data);
    }

    //共有人删除
    public static function del_d_coow($coow_id)
    {
        return DB::table('coownerinfo') -> where('coow_id','=',$coow_id) -> delete();
    }

    //共有人全选删除
    public static function del_all_coow($pieces)
    {
        return DB::table('coownerinfo') -> whereIn('coow_id',$pieces) -> delete();
    }
}
