<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Change extends Model
{
	//查询认购信息以及客户信息
    public static function get_d_buy_home($buyid){
    	return DB::table('buyinfo')
							 -> select('buyinfo.*','customer.realname','customer.mobile','customer.idcard')
							 -> leftJoin('customer','buyinfo.cust_id','=','customer.cust_id')
							 -> where('buyinfo.buyid','=',$buyid) -> first();
		}

		//查询客户所购买的房子信息
	public static function get_home_d($homeid){
    	return DB::table('homeinfo')
				->select( 'homeinfo.*' , 'fieldinfob.name as buildnums' , 'fieldinfou.name as unitnums' , 'fieldinfor.name as roomnums' )
				->leftJoin( 'fieldinfo as fieldinfob' , 'homeinfo.buildnum' , '=' , 'fieldinfob.field_id' )
				->leftJoin( 'fieldinfo as fieldinfou' , 'homeinfo.unitnum' , '=' , 'fieldinfou.field_id' )
				->leftJoin( 'fieldinfo as fieldinfor' , 'homeinfo.roomnum' , '=' , 'fieldinfor.field_id' )
				-> where('homeinfo.homeid','=',$homeid)
				-> first();
	}


	//查询所有的楼号信息

	public static function get_all_buildnum(){
		return DB::table( 'fieldinfo' )->where( 'parent_field_id' , '=' , 1 )
						 ->get();
	}
}
