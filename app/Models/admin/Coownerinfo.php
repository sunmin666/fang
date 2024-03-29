<?php

namespace App\Models\admin;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Coownerinfo extends Model
{
    //查询所有房屋共有人
    public static function get_all_coowner($name,$iphone,$page)
    {
        return DB::table('coownerinfo')
            -> select('coownerinfo.*','customer.realname as name')
            -> leftJoin('customer','coownerinfo.cust_id','=','customer.cust_id')

					->where( function( $query ) use ( $name ) {
						if ( $name ) {

							$a = DB::table('customer')-> select('cust_id') -> where('realname','like','%'.$name.'%') -> get() -> map(function($value){return (array)$value;}) -> toArray();

							$query->whereIn( 'coownerinfo.cust_id', $a );
						}
					} )
					->where( function( $query ) use ( $iphone ) {
						if ( $iphone ) {
							$c = DB::table('customer')-> select('cust_id') -> where('mobile','like','%'.$iphone.'%') -> get() -> map(function($value){return (array)$value;}) -> toArray();
							$query->whereIn( 'coownerinfo.cust_id' , $c );
						}
					} )

            -> paginate($page);
    }

    //添加房屋共有人
    public static function store_coowner($data)
    {
        return DB::table('coownerinfo')->insert($data);
    }

    //房屋共有人修改查询单条数据
    public static function get_d_coowner($coow_id){
        return DB::table('coownerinfo')
            -> select('coownerinfo.*','customer.realname as name')
            -> leftJoin('customer','coownerinfo.cust_id','=','customer.cust_id')
            ->where('coownerinfo.coow_id','=',$coow_id)
            -> first();
    }

    //查询当前用户
    public static function get_customer($cust_id)
    {
        return DB::table('customer')->where('cust_id','=',$cust_id)->get();
    }

    //房屋共有人数据修改
    public static function update_d_coowner($c_id,$data)
    {
        return DB::table('coownerinfo') ->where('coow_id','=',$c_id)->update($data);
    }

    //房屋共有人删除单条
    public static function del_d_coowner($coow_id)
    {
        return DB::table('coownerinfo') ->where('coow_id','=',$coow_id)->delete();
    }

    //房屋共有人全选删除
    public static function del_all_coowner($all_id)
    {
        return DB::table('coownerinfo') ->whereIn('coow_id',$all_id) ->delete();
    }

}
