<?php

namespace App\Models\Api\V1_0\xiao;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class Enjoy extends Model
{
    //添加折扣信息
    public static function insert_d_en($data)
    {
        return DB::table('hous_enjoy') -> insert($data);
    }

    //查看所有折扣信息
    public static function get_all_en($page)
    {
        $pages =  	$page - 1;
        return DB::table('hous_enjoy')
            -> offset($pages*10)->limit(10)
            -> select('hous_enjoy.*','user_roleinfo.role_name')
            -> leftJoin('user_roleinfo','hous_enjoy.role_id','=','user_roleinfo.role_id')
            -> get()-> map(function($value){
                return (array)$value;
            }) -> toArray();
    }

    //查看总条数
    public static function get_all_count()
    {
        return DB::table('hous_enjoy') ->count();
    }

    //查看单条折扣信息
    public static function get_d_details($enjoy_id)
    {
        return DB::table('hous_enjoy')
            -> select('hous_enjoy.*','user_roleinfo.role_name')
            -> leftJoin('user_roleinfo','hous_enjoy.role_id','=','user_roleinfo.role_id')
            -> where('enjoy_id','=',$enjoy_id)
            -> first();
    }

    //修改折扣信息
    public static function edit_d_en($enjoy_id,$data)
    {
        return DB::table('hous_enjoy') -> where('enjoy_id','=',$enjoy_id) -> update($data);
    }

    //删除折扣
    public static function del_d_enjoy($enjoy_id)
    {
        return DB::table('hous_enjoy') -> where('enjoy_id','=',$enjoy_id) -> delete();
    }

    //折扣全选删除
    public static function del_all_enj($pieces)
    {
        return DB::table('hous_enjoy') -> whereIn('enjoy_id',$pieces) -> delete();
    }

    //查看所有折扣
    public static function get_all_enjnu()
    {
        return DB::table('hous_enjoy') -> select('enjoy_id','enjoy') -> get();
    }

    //查看角色是否存在
    public static function get_d_rol($role_id)
    {
        return DB::table('hous_enjoy') -> where('role_id','=',$role_id) -> first();
    }
}
