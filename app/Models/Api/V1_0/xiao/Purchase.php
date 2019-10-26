<?php

namespace App\Models\Api\V1_0\xiao;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Purchase extends Model
{
    //查询所属的homeid
    public static function get_d_homeid($field_id)
    {
        return DB::table('homeinfo') -> select('homeid') -> where('roomnum','=',$field_id) -> first();
    }

    //添加置业方案
    public static function add_d_purch($data)
    {
        return DB::table('purchase_plan') -> insert($data);
    }

    //查看该用户有没有这个方案
    public static function get_progrna($cust_id,$programme)
    {
        return DB::table('purchase_plan')
            -> where('cust_id','=',$cust_id)
            -> where('programme','=',$programme)
            -> first();
    }

    //置业计划列表
    public static function get_all_pur($page,$realname,$mobile)
    {
        $pages =  	$page - 1;
        return DB::table('purchase_plan')
            -> offset($pages*10)->limit(10)
            -> select('purchase_plan.*','customer.realname','customer.mobile')
            -> leftJoin('customer','purchase_plan.cust_id','=','customer.cust_id')
            -> where(function($query) use ($realname){
                if($realname){
                    $query -> where('customer.realname','like','%'.$realname.'%');
                }
            })
            -> where(function($query) use ($mobile){
                if($mobile){
                    $query -> where('customer.mobile','like','%'.$mobile.'%');
                }
            })
            -> get()-> map(function($value){
                return (array)$value;
            }) -> toArray();
    }

    //置业计划长度
    public static function get_all_count($realname,$mobile)
    {
        return DB::table('purchase_plan')
            -> select('purchase_plan.*','customer.realname','customer.mobile')
            -> leftJoin('customer','purchase_plan.cust_id','=','customer.cust_id')
            -> where(function($query) use ($realname){
                if($realname){
                    $query -> where('customer.realname','like','%'.$realname.'%');
                }
            })
            -> where(function($query) use ($mobile){
                if($mobile){
                    $query -> where('customer.mobile','like','%'.$mobile.'%');
                }
            })
            -> count();
    }

    //置业计划方案详情
    public static function get_d_pur($planid)
    {
        return DB::table('purchase_plan')
            -> select('purchase_plan.*','customer.realname','fieldinfoa.name as builname',
                'fieldinfob.name as unitname','fieldinfoc.name as roomname','fieldinfod.name as hustrname',
                'homeinfo.total','homeinfo.discount','picalbum.imgpath')
            -> leftJoin('customer','purchase_plan.cust_id','=','customer.cust_id')
            -> leftJoin('homeinfo','purchase_plan.homeid','=','homeinfo.homeid')
            -> leftJoin('fieldinfo as fieldinfoa','homeinfo.buildnum','=','fieldinfoa.field_id')
            -> leftJoin('fieldinfo as fieldinfob','homeinfo.unitnum','=','fieldinfob.field_id')
            -> leftJoin('fieldinfo as fieldinfoc','homeinfo.roomnum','=','fieldinfoc.field_id')
            -> leftJoin('fieldinfo as fieldinfod','homeinfo.house_str','=','fieldinfod.field_id')
            -> leftJoin('picalbum','homeinfo.house_str','=','picalbum.house_room')
            -> where('purchase_plan.planid','=',$planid)
            -> first();
    }

    //置业计划方案修改
    public static function edit_d_pur($planid,$data)
    {
        return DB::table('purchase_plan') -> where('planid','=',$planid) -> update($data);
    }

    //置业计划删除
    public static function del_d_pur($planid)
    {
        return DB::table('purchase_plan') -> where('planid','=',$planid) -> delete();
    }

    //置业计划方案全选删除
    public static function del_all_purall($pieces)
    {
        return DB::table('purchase_plan') -> whereIn('planid',$pieces) -> delete();
    }

}
