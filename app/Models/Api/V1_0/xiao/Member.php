<?php

namespace App\Models\Api\V1_0\xiao;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Member extends Model
{
    //添加成员信息获取id
    public static function insert_d_mem($data)
    {
        return DB::table('houserinfo') ->insertGetId($data);
    }

    //将角色添加到角色表
    public static function insert_d_ser($datac)
    {
        return DB::table('user_relationinfo') ->insert($datac);
    }


    public static function insert_d_memv($data)
    {
        return DB::table('houserinfo') ->insert($data);
    }

    //查看所有成员
    public static function get_all_men($page,$role_id,$name,$mobile)
    {
        $pages =  	$page - 1;
        return DB::table('houserinfo')
            -> offset($pages*10)->limit(10)
            -> select('houserinfo.*','hous_enjoy.enjoy','user_relationinfo.role_id','user_roleinfo.role_name')
            -> leftJoin('hous_enjoy','houserinfo.enjoy','=','hous_enjoy.enjoy_id')
            -> leftJoin('user_relationinfo','houserinfo.hous_id','=','user_relationinfo.memberid')
            -> leftJoin('user_roleinfo','user_relationinfo.role_id','=','user_roleinfo.role_id')
            -> where(function($query) use ($role_id){
                if($role_id){
                    $query -> where('user_roleinfo.role_id','like','%'.$role_id.'%');
                }
            })
            -> where(function($query) use ($name){
                if($name){
                    $query -> where('houserinfo.name','like','%'.$name.'%');
                }
            })
            -> where(function($query) use ($mobile){
                if($mobile){
                    $query -> where('houserinfo.mobile','like','%'.$mobile.'%');
                }
            })
            -> get()-> map(function($value){
                return (array)$value;
            }) -> toArray();
    }

    //查询总条数
    public static function get_all_count()
    {
        return DB::table('houserinfo') -> count();
    }

    //查看单条信息
    public static function get_d_men($hous_id)
    {
        return DB::table('houserinfo')
            -> select('houserinfo.*','hous_enjoy.enjoy','user_relationinfo.role_id','user_roleinfo.role_name')
            -> leftJoin('hous_enjoy','houserinfo.enjoy','=','hous_enjoy.enjoy_id')
            -> leftJoin('user_relationinfo','houserinfo.hous_id','=','user_relationinfo.memberid')
            -> leftJoin('user_roleinfo','user_relationinfo.role_id','=','user_roleinfo.role_id')
            -> where('houserinfo.hous_id','=',$hous_id)
            -> first();
    }

    //修改成员信息
    public static function edit_d_mem($hous_id,$data)
    {
        return DB::table('houserinfo') ->where('hous_id','=',$hous_id) -> update($data);
    }

    //修改角色信息
    public static function edit_d_ser($hous_id,$datac)
    {
        return DB::table('user_relationinfo') ->where('memberid','=',$hous_id) -> update($datac);
    }

    //删除成员
    public static function del_d_men($hous_id)
    {
        return DB::table('houserinfo') ->where('hous_id','=',$hous_id) -> delete();
    }
    //删除角色
    public static function del_d_ser($hous_id)
    {
        return DB::table('user_relationinfo') ->where('memberid','=',$hous_id) -> delete();
    }
    //修改成员状态
    public static function edit_d_status($hous_id,$data)
    {
        return DB::table('houserinfo') ->where('hous_id','=',$hous_id) -> update($data);
    }

    //全选删除
    public static function del_all_mem($pieces)
    {
        return DB::table('houserinfo') ->whereIn('hous_id','=',$pieces) -> delete();
    }
    //删除角色
    public static function del_all_ser($pieces)
    {
        return DB::table('user_relationinfo') ->whereIn('memberid','=',$pieces) -> delete();
    }
}
