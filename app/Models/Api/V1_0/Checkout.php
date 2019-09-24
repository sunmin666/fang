<?php

	namespace App\Models\Api\V1_0;


	use Illuminate\Database\Eloquent\Model;
	use Illuminate\Support\Facades\DB;


	class Checkout extends Model {

		//退房信息发起
		public static function get_payloginfo( $buy_number )
		{
			return DB::table( 'payloginfo' )
							 ->where( 'subscription_num' , '=' , $buy_number )
							 ->get();
		}


		//退房信息添加
		public static function store_change( $data )
		{
			return DB::table( 'changeinfo' )->insert( $data );
		}



		//退房信息列表与检索
		public static function get_signing( $cust_id , $page )
		{
			$pages = $page - 1;
			return DB::table( 'changeinfo' )->select(
				'changeinfo.chan_id' , 'changeinfo.status' , 'changeinfo.created_at' ,
				'changeinfo.finance_status' ,'changeinfo.finance_time' ,
				'buyinfo.buy_number' , 'customer.realname' , 'customer.mobile' ,
				'fieldinfob.name as buildnums' , 'fieldinfou.name as unitnums' , 'fieldinfor.name as roomnums'

			)
							 ->offset( $pages )->limit( 10 )
							 ->leftJoin( 'buyinfo' , 'changeinfo.buyid' , '=' , 'buyinfo.buyid' )
							 ->leftJoin( 'customer' , 'changeinfo.cust_id' , '=' , 'customer.cust_id' )
							 ->leftJoin( 'homeinfo' , 'changeinfo.old_homeid' , '=' , 'homeinfo.homeid' )
							 ->leftJoin( 'fieldinfo as fieldinfob' , 'homeinfo.buildnum' , '=' , 'fieldinfob.field_id' )
							 ->leftJoin( 'fieldinfo as fieldinfou' , 'homeinfo.unitnum' , '=' , 'fieldinfou.field_id' )
							 ->leftJoin( 'fieldinfo as fieldinfor' , 'homeinfo.roomnum' , '=' , 'fieldinfor.field_id' )
							 ->where( 'changeinfo.type' , '=' , 3 )
							 ->whereIn( 'changeinfo.cust_id' , $cust_id )
							 ->get();
		}


		public static function get_d_change($chan_id){
			return DB::table('changeinfo')
				-> select(
					'customer.realname' , 'customer.mobile' , 'customer.idcard' , 'customer.address',
				 'homeinfo.discount' , 'homeinfo.build_area' , 'homeinfo.price' , 'homeinfo.total' , 'homeinfo.status' ,'homeinfo.floor',
								 'fieldinfob.name as buildnums' , 'fieldinfou.name as unitnums' , 'fieldinfor.name as roomnums',
					'buyinfo.buy_number' , 'buyinfo.month_pay' , 'buyinfo.loan_term' , 'buyinfo.total_price' , 'buyinfo.pay_type','buyinfo.pay_num',
					'changeinfo.remarks',
					'houserinfo.name as re_admin','changeinfo.status','changeinfo.verifytime','changeinfo.verify_remarks',
					'houserinfof.name as cw_admin','changeinfo.finance_status','changeinfo.finance_time','changeinfo.finance_remarks'
				)
			 ->leftJoin( 'customer' , 'changeinfo.cust_id' , '=' , 'customer.cust_id' )
				->leftJoin( 'buyinfo' , 'changeinfo.buyid' , '=' , 'buyinfo.buyid' )
				->leftJoin( 'homeinfo' , 'changeinfo.old_homeid' , '=' , 'homeinfo.homeid' )
				->leftJoin( 'fieldinfo as fieldinfob' , 'homeinfo.buildnum' , '=' , 'fieldinfob.field_id' )
				->leftJoin( 'fieldinfo as fieldinfou' , 'homeinfo.unitnum' , '=' , 'fieldinfou.field_id' )
				->leftJoin( 'fieldinfo as fieldinfor' , 'homeinfo.roomnum' , '=' , 'fieldinfor.field_id' )
				->leftJoin( 'houserinfo' , 'changeinfo.verify_admin' , '=' , 'houserinfo.hous_id' )
				->leftJoin( 'houserinfo as houserinfof' , 'changeinfo.finance_admin' , '=' , 'houserinfof.hous_id' )
				->where('changeinfo.chan_id','=',$chan_id)
				-> first();
		}


	}
