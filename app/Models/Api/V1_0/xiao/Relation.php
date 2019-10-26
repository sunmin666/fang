<?php

namespace App\Models\Api\V1_0\xiao;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Relation extends Model
{

    //添加角色的角色
    public static function insert_d_rela($data)
    {
        return DB::table('user_roleinfo') -> insert($data);
    }

    //查看所有角色
    public static function get_all_rela($page)
    {
        $pages = $page - 1;
        return DB::table('user_roleinfo')
            -> offset($pages*10)->limit(10)
            -> get()-> map(function($value){
                return (array)$value;
            }) -> toArray();
    }

    //查看总条数
    public static function get_d_count()
    {
        return DB::table('user_roleinfo') -> count();
    }

    //查看单条角色
    public static function get_d_rel($role_id)
    {
        return DB::table('user_roleinfo') -> where('role_id','=',$role_id)->first();
    }

    //修改角色
    public static function edit_d_rel($role_id,$data)
    {
        return DB::table('user_roleinfo') -> where('role_id','=',$role_id)->update($data);
    }

    //删除角色
    public static function del_d_rel($role_id)
    {
        return DB::table('user_roleinfo') -> where('role_id','=',$role_id)->delete();
    }

    //全选删除
    public static function del_all_rel($pieces)
    {
        return DB::table('user_roleinfo') -> whereIn('role_id',$pieces)-> delete();
    }

    //查看所有角色名称
    public static function get_all_relaname()
    {
        return DB::table('user_roleinfo') ->select('role_id','role_name') -> get();
    }
}
