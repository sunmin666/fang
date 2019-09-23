<?php

	namespace App\Models\Api\V1_0;


	use Illuminate\Database\Eloquent\Model;
	use Illuminate\Support\Facades\DB;


	class Buyinfo extends Model {

		//更新客户信息
		public static function update_cust( $cust_id , $datac )
		{
			return DB::table( 'customer' )->where( 'cust_id' , '=' , $cust_id )
							 ->update( $datac );
		}

		//添加认购信息
		public static function store_buyinfo( $data )
		{
			return DB::table( 'buyinfo' )->insertGetId( $data );
		}

		//更新认购编号
		public static function update_buy_number( $store , $buy_number )
		{
			return DB::table( 'buyinfo' )->where( 'buyid' , '=' , $store )
							 ->update( $buy_number );
		}

		//添加房屋共有人
		public static function store_coowner( $coowner )
		{
			return DB::table( 'coownerinfo' )->insert( $coowner );
		}

		//修改房子状态
		public static function update_status_home( $homeid , $home )
		{
			return DB::table( 'homeinfo' )->where( 'homeid' , '=' , $homeid )
							 ->update( $home );

		}

		//查询职业顾问下的所有id
		public static function get_cust( $hous ,$parameter)
		{
			return DB::table( 'customer' )->select( 'cust_id' )
							-> where(function($query) use ($parameter){
								if($parameter){
									$query -> where('realname','like','%'.$parameter.'%') -> orWhere('mobile','like','%'.$parameter.'%');
								}
							})
							 ->where( 'hous_id' , '=' , $hous )->get()
							 ->map( function( $value ) {
								 return (array)$value;
							 } )->toArray();
		}

		//查询出所有的客户认购信息
		public static function get_buyinfo( $cust,$page )
		{
			$pages =  	$page - 1;
			return DB::table( 'buyinfo' )->select(
				'buyinfo.buyid' , 'buyinfo.buy_number' , 'buyinfo.pay_num' , 'buyinfo.created_at' , 'buyinfo.manager_verify_time' , 'buyinfo.pay_type'
								,'customer.realname','customer.mobile',
				'fieldinfob.name as buildnums','fieldinfou.name as unitnums','fieldinfor.name as roomnums'
			)
				-> offset($pages)->limit(10)
				-> leftJoin('homeinfo','buyinfo.homeid','=','homeinfo.homeid')
				-> leftJoin('fieldinfo as fieldinfob','homeinfo.buildnum','=','fieldinfob.field_id')
				-> leftJoin('fieldinfo as fieldinfou','homeinfo.unitnum','=','fieldinfou.field_id')
				-> leftJoin('fieldinfo as fieldinfor','homeinfo.roomnum','=','fieldinfor.field_id')
							 -> leftJoin('customer','buyinfo.cust_id','=','customer.cust_id')
				->whereIn( 'buyinfo.cust_id' , $cust )->get();
		}



		//认购详情
		public static function get_d_buyinfo($buyid){
			return DB::table('buyinfo') -> select(
				'buyinfo.buy_number','buyinfo.pay_type','buyinfo.remarks','buyinfo.month_pay','buyinfo.loan_term','buyinfo.total_price',
				'buyinfo.apply_time','buyinfo.lock_time','buyinfo.manager_verify_status','buyinfo.manager_verify_time','buyinfo.manager_verify_remarks'
				,'buyinfo.finance_verify_status','buyinfo.finance_verify_time','buyinfo.finance_verify_remarks',
				'customer.realname','customer.idcard','customer.mobile','customer.address',
				'homeinfo.discount','homeinfo.build_area','homeinfo.price','homeinfo.total','homeinfo.status',
				'fieldinfob.name as buildnums','fieldinfou.name as unitnums','fieldinfor.name as roomnums',
				'houserinfo.name as re_admin','houserinfof.name as cw_admin'
			)
				-> leftJoin('customer','buyinfo.cust_id','=','customer.cust_id')
				-> leftJoin('homeinfo','buyinfo.homeid','=','homeinfo.homeid')
				-> leftJoin('fieldinfo as fieldinfob','homeinfo.buildnum','=','fieldinfob.field_id')
				-> leftJoin('fieldinfo as fieldinfou','homeinfo.unitnum','=','fieldinfou.field_id')
				-> leftJoin('fieldinfo as fieldinfor','homeinfo.roomnum','=','fieldinfor.field_id')
				-> leftJoin('houserinfo','buyinfo.manage_admin','=','houserinfo.hous_id')
				-> leftJoin('houserinfo as houserinfof','buyinfo.finance_admin','=','houserinfof.hous_id')
				-> where('buyinfo.buyid','=',$buyid)
				-> first();
		}


	}
