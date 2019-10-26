<?php

namespace App\Models\Api\V1_0\xiao;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Knowle extends Model
{
    //添加营销知识库
    public static function insert_d_know($data)
    {
        return DB::table('knowledgeinfo') -> insert($data);
    }

    //营销知识库列表
    public static function get_all_knowel($page,$class_id)
    {
        $pages =  	$page - 1;
        return DB::table('knowledgeinfo')
            -> offset($pages*10)->limit(10)
            -> select('knowledgeinfo.*','fieldinfo.name as fielname','houserinfo.name as housname')
            -> leftJoin('fieldinfo','fieldinfo.field_id','=','knowledgeinfo.class_id')
            -> leftJoin('houserinfo','houserinfo.hous_id','=','knowledgeinfo.hous_id')
            -> where(function($query) use ($class_id){
                if($class_id){
                    $query -> where('knowledgeinfo.class_id','like','%'.$class_id.'%');
                }
            })
            -> get()-> map(function($value){
                return (array)$value;
            }) -> toArray();
    }

    //查看总条数
    public static function get_all_count()
    {
        return DB::table('knowledgeinfo') -> count();
    }

    //查看详情
    public static function get_d_knowle($know_id)
    {
        return DB::table('knowledgeinfo')
            -> select('knowledgeinfo.*','fieldinfo.name as fielname','houserinfo.name as housname')
            -> leftJoin('fieldinfo','fieldinfo.field_id','=','knowledgeinfo.class_id')
            -> leftJoin('houserinfo','houserinfo.hous_id','=','knowledgeinfo.hous_id')
            -> where('knowledgeinfo.know_id','=',$know_id)
            -> first();
    }

    //营销知识库修改
    public static function edit_d_konw($know_id,$data)
    {
        return DB::table('knowledgeinfo') ->where('know_id','=',$know_id) -> update($data);
    }

    //营销知识库删除
    public static function del_d_know($know_id)
    {
        return DB::table('knowledgeinfo') ->where('know_id','=',$know_id) -> delete();
    }

    //营销知识库全选删除
    public static function del_all_know($pieces)
    {
        return DB::table('knowledgeinfo') ->whereIn('know_id',$pieces) -> delete();
    }

    //查看营销知识库分类
    public static function get_all_kno($a)
    {
        return DB::table('fieldinfo') -> where('parent_field_id','=',$a) -> get();
    }

}
