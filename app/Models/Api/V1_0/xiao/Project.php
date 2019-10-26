<?php

namespace App\Models\Api\V1_0\xiao;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Project extends Model
{
    //项目添加
    public static function insert_d_project($data)
    {
        return DB::table('projectinfo') -> insert($data);
    }

    //项目查看详情
    public static function get_d_pro($mobile)
    {
        return DB::table('projectinfo')
            -> select('projectinfo.*','fieldinfoa.name as main_id','fieldinfob.name as property_id',
                'fieldinfoc.name as archit_id','fieldinfod.name as situation_id'
            )
            -> leftJoin('fieldinfo as fieldinfoa','projectinfo.main_unit','=','fieldinfoa.field_id')
            -> leftJoin('fieldinfo as fieldinfob','projectinfo.property_type','=','fieldinfob.field_id')
            -> leftJoin('fieldinfo as fieldinfoc','projectinfo.archit_type','=','fieldinfoc.field_id')
            -> leftJoin('fieldinfo as fieldinfod','projectinfo.situation','=','fieldinfod.field_id')
            -> where('mobile','=',$mobile)
            -> first();
    }

    //查询项目名称是否已存在
    public static function get_pro_name($pro_cname)
    {
        return DB::table('projectinfo') -> where('pro_cname','=',$pro_cname)->first();
    }

    //项目信息修改
    public static function edit_d_pro($mobile,$data)
    {
        return DB::table('projectinfo') -> where('mobile','=',$mobile)->update($data);
    }

    //查看用户只能添加一次
    public static function get_d_mobile($mobile)
    {
        return DB::table('projectinfo') -> where('mobile','=',$mobile)->first();
    }
}
