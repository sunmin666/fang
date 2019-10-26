<?php

namespace App\Models\Api\V1_0\xiao;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Culture extends Model
{
    //添加企业文化
    public static function add_d_cult($data)
    {
        return DB::table('cultureinfo') -> insert($data);
    }

    //企业文化详情
    public static function get_d_cult($cult_id)
    {
        return DB::table('cultureinfo')
            -> select('cultureinfo.*','fieldinfo.name')
            -> leftJoin('fieldinfo','cultureinfo.class_id','=','fieldinfo.field_id')
            -> where('cultureinfo.cult_id','=',$cult_id)
            -> first();
    }

    //企业文化列表
    public static function get_all_cul($page,$class_id)
    {
        $pages =  	$page - 1;
        return DB::table('cultureinfo')
            -> offset($pages*10)->limit(10)
            -> select('cultureinfo.*','fieldinfo.name')
            -> leftJoin('fieldinfo','cultureinfo.class_id','=','fieldinfo.field_id')
            -> where(function($query) use ($class_id){
                if($class_id){
                    $query -> where('cultureinfo.class_id','like','%'.$class_id.'%');
                }
            })
            -> get()-> map(function($value){
                return (array)$value;
            }) -> toArray();
    }

    //总条数
    public static function get_all_count($class_id)
    {
        return DB::table('cultureinfo')
            -> where(function($query) use ($class_id){
                if($class_id){
                    $query -> where('cultureinfo.class_id','like','%'.$class_id.'%');
                }
            })
            -> count();
    }

    //修改文化
    public static function edit_d_cul($cult_id,$data)
    {
        return DB::table('cultureinfo') -> where('cult_id','=',$cult_id) -> update($data);
    }

    //企业文化删除单条
    public static function del_d_cul($cult_id)
    {
        return DB::table('cultureinfo') ->where('cult_id','=',$cult_id) -> delete();
    }

    //企业文化全选删除
    public static function del_all_cul($pieces)
    {
        return DB::table('cultureinfo') ->whereIn('cult_id',$pieces) -> delete();
    }

    //企业文化分类
    public static function get_all_class($a)
    {
        return DB::table('fieldinfo') -> where('parent_field_id','=',$a) -> get();
    }
}
