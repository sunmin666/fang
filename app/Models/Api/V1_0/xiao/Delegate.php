<?php

namespace App\Models\Api\V1_0\xiao;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Delegate extends Model
{
    //查看所有委派者
    public static function get_all_hous()
    {
        return DB::table('houserinfo') ->select('houserinfo.hous_id','houserinfo.name')->where('is_ipad','=',1) -> get();
    }

    //添加任务委派
    public static function add_d_dele($data)
    {
        return DB::table('delegate') -> insert($data);
    }

    //任务委派列表
    public static function get_all_dele($page)
    {
        $pages =  	$page - 1;
        return DB::table('delegate')
            -> offset($pages*10)->limit(10)
            -> select('delegate.*','houserinfo.name as housname','houserinfoa.name as apponame')
            -> leftJoin('houserinfo','delegate.hous_id','=','houserinfo.hous_id')
            -> leftJoin('houserinfo as houserinfoa','delegate.appointees','=','houserinfoa.hous_id')
            -> get()-> map(function($value){
                return (array)$value;
            }) -> toArray();
    }

    //任务委派总条数
    public static function get_all_count()
    {
        return DB::table('delegate') -> count();
    }

    //任务委派详情
    public static function get_d_dele($gate_id)
    {
        return DB::table('delegate')
            -> select('delegate.*','houserinfo.name as housname','houserinfoa.name as apponame')
            -> leftJoin('houserinfo','delegate.hous_id','=','houserinfo.hous_id')
            -> leftJoin('houserinfo as houserinfoa','delegate.appointees','=','houserinfoa.hous_id')
            -> where('delegate.gate_id','=',$gate_id)
            -> first();
    }

    //任务委派修改
    public static function edit_d_dele($gate_id,$data)
    {
        return DB::table('delegate') -> where('gate_id','=',$gate_id) -> update($data);
    }

    //任务委派删除
    public static function del_d_dele($gate_id)
    {
        return DB::table('delegate') -> where('gate_id','=',$gate_id) -> delete();
    }

    //任务委派全选删除
    public static function del_all_dele($pieces)
    {
        return DB::table('delegate') -> whereIn('gate_id',$pieces) -> delete();
    }
}
