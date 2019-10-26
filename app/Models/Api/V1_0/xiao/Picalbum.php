<?php

namespace App\Models\Api\V1_0\xiao;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Picalbum extends Model
{
    //楼盘相册添加
    public static function add_d_pical($data)
    {
        return DB::table('picalbum') -> insert($data);
    }

    //所有图片列表
    public static function get_all_rendering($a,$page)
    {
        $pages =  	$page - 1;
        return DB::table('picalbum')
            -> offset($pages*10)->limit(10)
            -> select('picalbum.*','fieldinfo.name')
            -> leftJoin('fieldinfo','picalbum.class_id','=','fieldinfo.field_id')
            -> where('class_id','=',$a)
            -> get()-> map(function($value){
                return (array)$value;
            }) -> toArray();
    }

    //总条数
    public static function get_rendering_count($a)
    {
        return DB::table('picalbum') -> where('class_id','=',$a) -> count();
    }

    //详情
    public static function get_d_renddeis($pic_id)
    {
        return DB::table('picalbum')
            -> select('picalbum.*','fieldinfoa.name as classname','fieldinfob.name as lroomname','fieldinfoc.name as housename')
            -> leftJoin('fieldinfo as fieldinfoa','picalbum.class_id','=','fieldinfoa.field_id')
            -> leftJoin('fieldinfo as fieldinfob','picalbum.ling_room','=','fieldinfob.field_id')
            -> leftJoin('fieldinfo as fieldinfoc','picalbum.house_room','=','fieldinfoc.field_id')
            -> where('picalbum.pic_id','=',$pic_id)
            -> first();
    }
    //楼盘相册分类
    public static function get_all_class($a)
    {
        return DB::table('fieldinfo')
            -> select('fieldinfo.field_id','fieldinfo.name')
            -> where('fieldinfo.parent_field_id','=',$a)
            -> get();
    }

    //户型图列表
    public static function get_d_houshome($a,$page)
    {
        $pages =  	$page - 1;
        return DB::table('picalbum')
            -> offset($pages*10)->limit(10)
            -> select('picalbum.*','fieldinfoa.name as classname','fieldinfob.name as lroomname','fieldinfoc.name as housename')
            -> leftJoin('fieldinfo as fieldinfoa','picalbum.class_id','=','fieldinfoa.field_id')
            -> leftJoin('fieldinfo as fieldinfob','picalbum.ling_room','=','fieldinfob.field_id')
            -> leftJoin('fieldinfo as fieldinfoc','picalbum.house_room','=','fieldinfoc.field_id')
            -> where('picalbum.class_id','=',$a)
            -> get()-> map(function($value){
                return (array)$value;
            }) -> toArray();
    }
}
