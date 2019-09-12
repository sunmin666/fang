<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Purchase extends Model
{
    //查询当前用户
    public static function get_customer($cust_id)
    {
        return DB::table('customer')->where('cust_id','=',$cust_id)->get();
    }

    //添加方案信息
    public static function store_purchase($data)
    {
        return DB::table('purchase_plan') -> insert($data);
    }

    //查询所有方案
    public static function get_all_purchase($name,$iphone,$page)
    {
        return DB::table('purchase_plan')
            -> select('purchase_plan.*','customer.realname')
            -> leftJoin('customer','purchase_plan.cust_id','=','customer.cust_id')

					->where( function( $query ) use ( $name ) {
						if ( $name ) {

							$a = DB::table('customer')-> select('cust_id') -> where('realname','like','%'.$name.'%') -> get() -> map(function($value){return (array)$value;}) -> toArray();

							$query->whereIn( 'purchase_plan.cust_id', $a );
						}
					} )
					->where( function( $query ) use ( $iphone ) {
						if ( $iphone ) {
							$c = DB::table('customer')-> select('cust_id') -> where('mobile','like','%'.$iphone.'%') -> get() -> map(function($value){return (array)$value;}) -> toArray();
							$query->whereIn( 'purchase_plan.cust_id' , $c );
						}
					} )
						-> paginate($page);
    }

    //查询单条方案
    public static function get_d_trackinfo($planid)
    {
        return DB::table('purchase_plan')
            -> select('purchase_plan.*','customer.realname','homeinfo.buildnum','homeinfo.unitnum','homeinfo.roomnum','homeinfo.total','homeinfo.discount','fieldinfob.name as buildnums','fieldinfou.name as unitnums','fieldinfor.name as roomnums')
            -> leftJoin('customer','purchase_plan.cust_id','=','customer.cust_id')
            -> leftJoin('homeinfo','purchase_plan.homeid','=','homeinfo.homeid')
            -> leftJoin('fieldinfo as fieldinfob','homeinfo.buildnum','=','fieldinfob.field_id')
            -> leftJoin('fieldinfo as fieldinfou','homeinfo.unitnum','=','fieldinfou.field_id')
            -> leftJoin('fieldinfo as fieldinfor','homeinfo.roomnum','=','fieldinfor.field_id')
            -> where('purchase_plan.planid','=',$planid)
            -> first();
    }

    //方案更新数据
    public static function update_d_purchase($planid,$data)
    {
        return DB::table('purchase_plan') -> where('planid','=',$planid)->update($data);
    }

    //方案删除单条
    public static function del_d_purchase($planid)
    {
        return DB::table('purchase_plan') -> where('planid','=',$planid) -> delete();
    }

    //方案全选删除
    public static function delete_all_purchase($all_id)
    {
        return DB::table('purchase_plan') ->whereIn('planid',$all_id) ->delete();
    }

    //查询所有楼号
    public static function fieid()
    {
        return DB::table( 'fieldinfo' )->where( 'parent_field_id' , '=' , 1 )
            ->get();
    }

}
