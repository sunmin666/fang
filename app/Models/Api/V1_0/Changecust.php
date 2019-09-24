<?php

namespace App\Models\Api\V1_0;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Changecust extends Model
{
    //更名发起
	public static function get_buyid( $buyid ){
		return DB::table('buyinfo') -> select(
			'buyinfo.pay_type','buyinfo.month_pay','buyinfo.loan_term','buyinfo.total_price','buyinfo.buy_number',
			'customer.realname','customer.idcard','customer.mobile','customer.address','customer.cust_id',
			'homeinfo.discount','homeinfo.build_area','homeinfo.price','homeinfo.total','homeinfo.homeid',
			'fieldinfob.name as buildnums','fieldinfou.name as unitnums','fieldinfor.name as roomnums'
			)
			-> leftJoin('customer','buyinfo.cust_id','=','customer.cust_id')
			-> leftJoin('homeinfo','buyinfo.homeid','=','homeinfo.homeid')
			-> leftJoin('fieldinfo as fieldinfob','homeinfo.buildnum','=','fieldinfob.field_id')
			-> leftJoin('fieldinfo as fieldinfou','homeinfo.unitnum','=','fieldinfou.field_id')
			-> leftJoin('fieldinfo as fieldinfor','homeinfo.roomnum','=','fieldinfor.field_id')
			-> where('buyinfo.buyid','=',$buyid)
			-> first();
	}

	//添加更名
	public static function store_changeinfo($data){
		return DB::table('changeinfo') -> insert($data);
	}


	//更名列表与检索
	public static function get_change($cust_id , $page){
		$pages = $page -1 ;
		return DB::table('changeinfo') -> select(
			'changeinfo.chan_id','changeinfo.pay_type','changeinfo.status','changeinfo.verifytime','changeinfo.created_at',
			'buyinfo.buy_number','customer.realname','customer.mobile','customers.realname as realname_xin',
			'customers.mobile as mobile_xin'
		)
			-> offset($pages)->limit(10)
			-> leftJoin('buyinfo','changeinfo.buyid','=','buyinfo.buyid')
			-> leftJoin('customer','changeinfo.cust_id','=','customer.cust_id')
			-> leftJoin('customer as customers','changeinfo.new_cust','=','customers.cust_id')
			-> where('changeinfo.type','=',1)
			-> whereIn('changeinfo.cust_id',$cust_id)
			-> get();
	}


	//更名详情
	public static function get_d_change($chan_id){
		return DB::table('changeinfo')
			-> select(
				'customer.realname','customer.mobile','customer.idcard','customer.address',
				'fieldinfob.name as buildnums','fieldinfou.name as unitnums','fieldinfor.name as roomnums',
				'homeinfo.discount','homeinfo.build_area','homeinfo.price','homeinfo.total','homeinfo.status',
				'buyinfo.buy_number','buyinfo.month_pay','buyinfo.loan_term','buyinfo.total_price','buyinfo.pay_type',
				'customers.realname as xin_realname','customers.mobile as xin_mobile','customers.idcard as xin_idcard','customers.address as xin_address'
				,'changeinfo.loan_term as xin_loan_term',  'changeinfo.new_cust',
				'changeinfo.total_price as xin_total_price','changeinfo.pay_type as xin_pay_type',
				'changeinfo.month_pay as xin_month_pay',
				'changeinfo.status as verify_status',
				'changeinfo.verify_remarks',
				'houserinfo.name'
			)
			-> leftJoin('customer','changeinfo.cust_id','=','customer.cust_id')
			-> leftJoin('buyinfo','changeinfo.buyid','=','buyinfo.buyid')
			-> leftJoin('customer as customers','changeinfo.new_cust','=','customers.cust_id')
			-> leftJoin('homeinfo','changeinfo.old_homeid','=','homeinfo.homeid')
			-> leftJoin('fieldinfo as fieldinfob','homeinfo.buildnum','=','fieldinfob.field_id')
			-> leftJoin('fieldinfo as fieldinfou','homeinfo.unitnum','=','fieldinfou.field_id')
			-> leftJoin('fieldinfo as fieldinfor','homeinfo.roomnum','=','fieldinfor.field_id')
			-> leftJoin('houserinfo','changeinfo.verify_admin','=','houserinfo.hous_id')

			-> where('changeinfo.chan_id','=',$chan_id) -> first();
	}


	//查询新客户下的房屋共有人
	public static function get_all_coownerinfo($new_cust){
		return DB::table('coownerinfo')
						 -> select('coownerinfo.relation','coownerinfo.realname','coownerinfo.sex','coownerinfo.birthday'
						 ,'coownerinfo.idcard','coownerinfo.mobile')
						 -> where('cust_id','=',$new_cust) -> get()
			;
	}




}
