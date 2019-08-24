<?php

namespace App\Models\admin;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Cultrue extends Model
{
    //查看企业文化分类
    public static function get_fieldinfo()
    {
        return DB::table('fieldinfo')->where('parent_field_id','=',17)->get();
    }
    //企业文化添加数据
    public static function store_cultrue($data){
        return DB::table('cultureinfo') -> insert($data);
    }

    //企业文化查询所有数据
    public static function get_all_cultrue($page)
    {
        return DB::table('cultureinfo')
            -> select('cultureinfo.*','fieldinfo.name')
            -> leftJoin('fieldinfo','cultureinfo.class_id','=','fieldinfo.field_id')
            ->paginate($page);
    }

    //企业文化数据修改查询单条数据
    public static function get_d_culture($cult_id){
        return DB::table('cultureinfo') -> where('cult_id','=',$cult_id) -> first();
    }

    //企业文化数据修改
    public static function update_cultrue($c_id,$data)
    {
        return DB::table('cultureinfo') -> where('cult_id','=',$c_id)->update($data);
    }

    //企业文化删除全部
    public static function delete_all_cultrue($c_id)
    {
        return DB::table('cultureinfo') ->whereIn('cult_id',$c_id)->delete();
    }

    //企业文化删除单条
    public static function delete_dan_cultrue($cult_id)
    {
        return DB::table('cultureinfo') ->where('cult_id','=',$cult_id)->delete();
    }

    //企业文化详情
    public static function view($cult_id)
    {
        return DB::table('cultureinfo')

					-> select('cultureinfo.*','fieldinfo.name')
					-> leftJoin('fieldinfo','cultureinfo.class_id','=','fieldinfo.field_id')
					-> where('cultureinfo.cult_id','=',$cult_id) -> first();
    }
}
