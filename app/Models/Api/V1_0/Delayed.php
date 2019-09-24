<?php

namespace App\Models\Api\V1_0;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Delayed extends Model
{
	//签约发起页面数据
	public static function get_payloginfo( $buy_number )
	{
		return DB::table( 'payloginfo' )
						 ->where( 'subscription_num' , '=' , $buy_number )
						 ->where( 'type' , '=' , 1 )->first();
	}


	//添加到数据库
	public static function store_sig( $data )
	{
		return DB::table( 'signinfo' )->insert( $data );
	}


	//签约列表与检索
	public static function get_signing( $cust_id , $page )
	{
		return DB::table( 'signinfo' )
						 ->select(
							 'signinfo.signid' , 'signinfo.sign_applytime' ,
							 'customer.realname' , 'customer.mobile' ,
							 'buyinfo.buy_number' , 'buyinfo.pay_type' ,
							 'fieldinfob.name as buildnums' , 'fieldinfou.name as unitnums' , 'fieldinfor.name as roomnums'
						 )
						 ->leftJoin( 'customer' , 'signinfo.cust_id' , '=' , 'customer.cust_id' )
						 ->leftJoin( 'buyinfo' , 'signinfo.buyid' , '=' , 'buyinfo.buyid' )
						 ->leftJoin( 'homeinfo' , 'signinfo.homeid' , '=' , 'homeinfo.homeid' )
						 ->leftJoin( 'fieldinfo as fieldinfob' , 'homeinfo.buildnum' , '=' , 'fieldinfob.field_id' )
						 ->leftJoin( 'fieldinfo as fieldinfou' , 'homeinfo.unitnum' , '=' , 'fieldinfou.field_id' )
						 ->leftJoin( 'fieldinfo as fieldinfor' , 'homeinfo.roomnum' , '=' , 'fieldinfor.field_id' )
						 ->where( 'signinfo.sign_type' , '=' , 1 )
						 ->whereIn( 'signinfo.cust_id' , $cust_id )
						 ->get();
	}


	//详情
	public static function get_d_signing( $sig_id )
	{
		return DB::table( 'signinfo' )
						 ->select(
							 'signinfo.signid' , 'signinfo.sign_applytime' ,
							 'customer.realname' , 'customer.mobile' , 'customer.idcard' , 'customer.address' ,
							 'homeinfo.discount' , 'homeinfo.build_area' , 'homeinfo.price' , 'homeinfo.total' , 'homeinfo.status' ,
							 'fieldinfob.name as buildnums' , 'fieldinfou.name as unitnums' , 'fieldinfor.name as roomnums' ,
							 'buyinfo.buy_number' , 'buyinfo.month_pay' , 'buyinfo.loan_term' , 'buyinfo.total_price' , 'buyinfo.pay_type'
							 , 'houserinfo.name as re_admin' ,
							 'signinfo.sign_status' , 'signinfo.sign_verifytime' , 'signinfo.verify_remarks'
						 )
						 ->leftJoin( 'customer' , 'signinfo.cust_id' , '=' , 'customer.cust_id' )
						 ->leftJoin( 'buyinfo' , 'signinfo.buyid' , '=' , 'buyinfo.buyid' )
						 ->leftJoin( 'homeinfo' , 'signinfo.homeid' , '=' , 'homeinfo.homeid' )
						 ->leftJoin( 'fieldinfo as fieldinfob' , 'homeinfo.buildnum' , '=' , 'fieldinfob.field_id' )
						 ->leftJoin( 'fieldinfo as fieldinfou' , 'homeinfo.unitnum' , '=' , 'fieldinfou.field_id' )
						 ->leftJoin( 'fieldinfo as fieldinfor' , 'homeinfo.roomnum' , '=' , 'fieldinfor.field_id' )
						 ->leftJoin( 'houserinfo' , 'signinfo.sign_admin' , '=' , 'houserinfo.hous_id' )
						 ->leftJoin( 'houserinfo as houserinfof' , 'signinfo.finance_admin' , '=' , 'houserinfof.hous_id' )
						 ->where( 'signinfo.signid' , '=' , $sig_id )
						 ->first();
	}


	//查询缴费记录
	public static function get_all_pay( $buy_number )
	{
		return DB::table( 'payloginfo' )
						 ->where( 'subscription_num' , '=' , $buy_number )
						 ->get();
	}
}
