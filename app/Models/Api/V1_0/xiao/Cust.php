<?php

namespace App\Models\Api\V1_0\xiao;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Cust extends Model
{
    //查询所有的职业顾问
    public static function get_all_hous()
    {
        return DB::table('houserinfo') -> select('hous_id','name') -> where('is_ipad','=','2') -> get();
    }

    //查看分类
    public static function get_all_class($a)
    {
        return DB::table('fieldinfo') -> where('parent_field_id','=',$a) -> get();
    }

    //手机号是否重复
    public static function mobile_d_get($mobile)
    {
        return DB::table('customer') -> where('mobile','=',$mobile) -> first();
    }

    //验证身份号是否存在
    public static function idcard_d_get($idcard){
        return DB::table('customer') -> where('idcard','=',$idcard) -> first();
    }
    
    //验证邮箱是否存在
    public static function email_d_get($email){
        return DB::table('customer') -> where('email','=',$email) -> first();
    }

    //添加客户
    public static function add_d_cust($data)
    {
        return DB::table('customer') -> insert($data);
    }

    //客户列表
    public static function get_all_cus($page,$name,$realname,$mobile)
    {
        $pages =  	$page - 1;
        return DB::table('customer')
            -> offset($pages*10)->limit(10)
            -> select('customer.cust_id','customer.realname','customer.sex','customer.mobile','houserinfo.name','customer.created_at','customer.updated_at','customer.is_show')
            -> leftJoin('houserinfo','houserinfo.hous_id','=','customer.hous_id')
            -> where(function($query) use ($name){
                if($name){
                    $query -> where('customer.hous_id','like','%'.$name.'%');
                }
            })
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
            -> where('customer.is_show','=',1)
            -> get()-> map(function($value){
                return (array)$value;
            }) -> toArray();
    }

    //客户总条数
    public static function get_all_count()
    {
        return DB::table('customer') -> where('customer.is_show','=',1)-> count();
    }

    //客户详情
    public static function get_d_custid($cust_id)
    {
        return DB::table('customer')
            ->select('customer.*','fieldinfoa.name as cognitionid','fieldinfob.name as familyname',
                'fieldinfoc.name as worktyname','fieldinfod.name as intention_areaid','fieldinfoe.name as floorename',
                'fieldinfof.name as furniturname','fieldinfog.name as housename','fieldinfoh.name as first_name',
                'fieldinfoi.name as ownershipname','fieldinfoj.name as purposename','fieldinfok.name as areaname',
                'fieldinfol.name as residencename','fieldinfom.name as structurename','fieldinfon.name as demandname',
                'fieldinfoo.name as apartmentname','houserinfo.name','fieidinfoz.name as statusname')
            -> leftJoin('fieldinfo as fieldinfoa','customer.cognition','=','fieldinfoa.field_id')
            -> leftJoin('fieldinfo as fieldinfob','customer.family_str','=','fieldinfob.field_id')
            -> leftJoin('fieldinfo as fieldinfoc','customer.work_type','=','fieldinfoc.field_id')
            -> leftJoin('fieldinfo as fieldinfod','customer.intention_area','=','fieldinfod.field_id')
            -> leftJoin('fieldinfo as fieldinfoe','customer.floor_like','=','fieldinfoe.field_id')
            -> leftJoin('fieldinfo as fieldinfof','customer.furniture_need','=','fieldinfof.field_id')
            -> leftJoin('fieldinfo as fieldinfog','customer.house_num','=','fieldinfog.field_id')
            -> leftJoin('fieldinfo as fieldinfoh','customer.first_contact','=','fieldinfoh.field_id')
            -> leftJoin('fieldinfo as fieldinfoi','customer.ownership','=','fieldinfoi.field_id')
            -> leftJoin('fieldinfo as fieldinfoj','customer.purpose','=','fieldinfoj.field_id')
            -> leftJoin('fieldinfo as fieldinfok','customer.area','=','fieldinfok.field_id')
            -> leftJoin('fieldinfo as fieldinfol','customer.residence','=','fieldinfol.field_id')
            -> leftJoin('fieldinfo as fieldinfom','customer.structure','=','fieldinfom.field_id')
            -> leftJoin('fieldinfo as fieldinfon','customer.demand','=','fieldinfon.field_id')
            -> leftJoin('fieldinfo as fieldinfoo','customer.apartment','=','fieldinfoo.field_id')
            -> leftJoin('fieldinfo as fieidinfoz','customer.status_id','=','fieidinfoz.field_id')
            -> leftJoin('houserinfo','houserinfo.hous_id','=','customer.hous_id')
            -> where('customer.cust_id','=',$cust_id)
            -> first();
    }

    //客户修改
    public static function edit_d_cust($cust_id,$data)
    {
        return DB::table('customer') -> where('cust_id','=',$cust_id) -> update($data);
    }

    //客户删除
    public static function del_d_cust($cust_id,$data)
    {
        return DB::table('customer') -> where('cust_id','=',$cust_id) -> update($data);
    }

    //客户全选删除
    public static function del_all_cust($pieces,$data)
    {
        return DB::table('customer') -> whereIn('cust_id',$pieces) -> update($data);
    }
}
