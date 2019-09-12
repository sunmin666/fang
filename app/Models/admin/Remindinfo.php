<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Remindinfo extends Model
{
    public static function get_all_hous()
    //查询所有的职业顾问
    {
        return DB::table('houserinfo')->where('is_ipad','=',2)->get();
    }

    //添加提醒信息
    public static function store_d_remind($data)
    {
        return DB::table('remindinfo') -> insert($data);
    }

    //展示信息
    public static function get_all_remind($page)
    {
        return DB::table('remindinfo')
            -> select('remindinfo.*','houserinfo.name')
            -> leftJoin('houserinfo','remindinfo.hous_id','=','houserinfo.hous_id')
            ->paginate($page);
    }

    //查询单条信息
    public static function get_d_remind($remi_id)
    {
        return DB::table('remindinfo') -> where('remi_id','=',$remi_id) -> first();
    }

    //更新数据
    public static function update_d_remind($remi_id,$data)
    {
        return DB::table('remindinfo') -> where('remi_id','=',$remi_id)->update($data);
    }

    //删除单条信息
    public static function del_d_remind($remi_id)
    {
        return DB::table('remindinfo') -> where('remi_id','=',$remi_id)->delete();
    }

    //全选删除
    public static function del_all_remind($c_id)
    {
        return DB::table('remindinfo') -> whereIn('remi_id',$c_id)->delete();
    }
}
