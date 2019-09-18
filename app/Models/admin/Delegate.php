<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Delegate extends Model
{
    //查询所有的职业顾问
    public static function get_all_hous()
    {
        return DB::table('houserinfo') -> where('is_ipad','=',2) -> get();
    }

    //查询所有的用户
    public static function get_all_cust()
    {
        return DB::table('customer') -> get();
    }

    //添加派遣数据
    public static function store_d_delegate($data)
    {
        return DB::table('delegate') -> insert($data);
    }

    //查询所有派遣数据
    public static function get_all_delegate($page)
    {
        return DB::table('delegate')
            -> select('delegate.*','houserinfo.name')
            -> leftJoin('houserinfo','delegate.hous_id','=','houserinfo.hous_id')
            ->paginate($page);
    }

    //派遣查询单条数据
    public static function get_d_delegate($gate_id)
    {
        return DB::table('delegate') -> where('gate_id','=',$gate_id) -> first();
    }

    //派遣数据修改单条
    public static function update_d_delegate($gate_id,$data)
    {
        return DB::table('delegate') -> where('gate_id','=',$gate_id) -> update($data);
    }

    //派遣删除单条
    public static function del_d_delegate($gate_id)
    {
        return DB::table('delegate') -> where('gate_id','=',$gate_id) -> delete();
    }

    //派遣全选删除
    public static function del_all_deledate($c_id)
    {
        return DB::table('delegate') -> whereIn('gate_id',$c_id) -> delete();
    }
}
