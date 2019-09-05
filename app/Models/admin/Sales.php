<?php

	namespace App\Models\admin;


	use Illuminate\Database\Eloquent\Model;
	use Illuminate\Support\Facades\DB;


	class Sales extends Model {


		//查询所有职业顾问
		public static function get_all_hous()
		{
			return DB::table( 'houserinfo' )->where( 'is_ipad' , '=' , 2 )->get();
		}






		//客户首次接触类型统计

		//查询类型
		public static function get_field()
		{
			return DB::table( 'fieldinfo' )->where( 'parent_field_id' , '=' , 82 )
							 ->get();
		}

		//客户数据统计
		public static function get_condition_cust(
			$page ,
			$hous ,
			$type ,
			$stime ,
			$etime
		) {
			return DB::table( 'customer' )
							 ->select( 'customer.*' , 'houserinfo.name' )
							 ->leftJoin( 'houserinfo' , 'customer.hous_id' , '=' , 'houserinfo.hous_id' )
							 ->where( function( $query ) use ( $hous ) {
								 if ( $hous ) {
									 $query->where( 'customer.hous_id' , '=' , $hous );
								 }
							 } )
							 ->where( function( $query ) use ( $type ) {
								 if ( $type ) {
									 $query->where( 'customer.first_contact' , '=' , $type );
								 }
							 } )
							 ->where( function( $query ) use ( $stime ) {
								 if ( $stime ) {

									 $s = strtotime( $stime );
									 $query->where( 'customer.created_at' , '>' , $s );
								 }
							 } )
							 ->where( function( $query ) use ( $etime ) {
								 if ( $etime ) {

									 $e = strtotime( $etime );
									 $query->where( 'customer.created_at' , '<' , $e );
								 }
							 } )
							 ->paginate( $page );
		}

		//客户数据统计总数
		public static function get_total_cust( $hous , $type , $stime , $etime )
		{
			return DB::table( 'customer' )
							 ->where( function( $query ) use ( $hous ) {
								 if ( $hous ) {
									 $query->where( 'customer.hous_id' , '=' , $hous );
								 }
							 } )
							 ->where( function( $query ) use ( $type ) {
								 if ( $type ) {
									 $query->where( 'customer.first_contact' , '=' , $type );
								 }
							 } )
							 ->where( function( $query ) use ( $stime ) {
								 if ( $stime ) {
									 $s = strtotime( $stime );
									 $query->where( 'customer.created_at' , '>' , $s );
								 }
							 } )
							 ->where( function( $query ) use ( $etime ) {
								 if ( $etime ) {
									 $e = strtotime( $etime );
									 $query->where( 'customer.created_at' , '<' , $e );
								 }
							 } )
							 ->count();
		}





		//查询所有职业顾问以及下面的客户
		public static function get_all_housts($hous){
			$data = DB::table('houserinfo')
								-> where('is_ipad','=',2)
								-> where(
									function($query) use ($hous){
										if($hous){
											$query -> where('hous_id','=',$hous);
										}
									}
								)
								-> get()
								-> map(function($value){
				return (array)$value;
			}) -> toArray();

			foreach($data as $k => $v){
				$data[$k]['qian'] = '0';
				$data[$k]['cust'] = DB::table('customer') -> select('cust_id','realname') -> where('hous_id','=',$v['hous_id']) -> get()
					-> map(function($value){
						return (array)$value;
					})-> toArray();
			}
			return $data;
		}



		//查询客户以签约并且财务审核通过的房子的总价
		public static function get_signinfo($cust_id,$stime,$etime){
			return DB::table('signinfo')
				 -> select('signinfo.*','buyinfo.total_price')
				-> leftJoin('buyinfo','signinfo.buyid','=','buyinfo.buyid')
				-> where('signinfo.cust_id','=',$cust_id)
				-> where('signinfo.sign_status','=',1)
				-> where('signinfo.finance_status','=',1)
				-> where('signinfo.status','=',1)
				->where( function( $query ) use ( $stime ) {
					if ( $stime ) {
						$s = strtotime( $stime );
						$query->where( 'signinfo.created_at' , '>' , $s );
					}
				} )
				->where( function( $query ) use ( $etime ) {
					if ( $etime ) {
						$e = strtotime( $etime );
						$query->where( 'signinfo.created_at' , '<' , $e );
					}
				} )
				-> get() -> map(function($value){
					return (array)$value;
				}) -> toArray();
		}


	//查询所有职业顾问以及下面的客户
	public static function get_all_subscr($hous)
	{
		$data = DB::table('houserinfo')
					-> where('is_ipad','=',2)
					-> where(
						function($query) use ($hous){
							if($hous){
								$query -> where('hous_id','=',$hous);
							}
						}
					)
					-> get()
					-> map(function($value){
						return (array)$value;
					}) -> toArray();

				foreach($data as $k => $v){
					$data[$k]['cust'] = DB::table('customer') -> select('cust_id','realname') -> where('hous_id','=',$v['hous_id']) -> get()
						-> map(function($value){
							return (array)$value;
						})-> toArray();
				}
				return $data;

	}

	//查询客户已签约的房子
	public static function get_subscr($cust_id,$stime,$etime)
	{
		return DB::table('buyinfo')
			-> where('buyinfo.cust_id','=',$cust_id)
			-> where('buyinfo.finance_verify_status','=','1')
			-> where('buyinfo.finance_verify_status','=','1')
			->where( function( $query ) use ( $stime ) {
				if ( $stime ) {
					$s = strtotime( $stime );
					$query->where( 'buyinfo.created_at' , '>' , $s );
				}
			} )
			->where( function( $query ) use ( $etime ) {
				if ( $etime ) {
					$e = strtotime( $etime );
					$query->where( 'buyinfo.created_at' , '<' , $e );
				}
			} )
			-> get() ->count();

	}

		//查询客户已更名的房子
		public static function get_rename($cust_id,$stime,$etime)
		{
			return DB::table('changeinfo')
				-> where('changeinfo.cust_id','=',$cust_id)
				-> where('changeinfo.status','=','1')
				-> where('changeinfo.type','=','1')
				->where( function( $query ) use ( $stime ) {
					if ( $stime ) {
						$s = strtotime( $stime );
						$query->where( 'buyinfo.created_at' , '>' , $s );
					}
				} )
				->where( function( $query ) use ( $etime ) {
					if ( $etime ) {
						$e = strtotime( $etime );
						$query->where( 'buyinfo.created_at' , '<' , $e );
					}
				} )
				-> get() ->count();

		}


		//查询客户已换房的房子
		public static function get_changehome($cust_id,$stime,$etime)
		{
			return DB::table('changeinfo')
				-> where('changeinfo.cust_id','=',$cust_id)
				-> where('changeinfo.status','=','1')
				-> where('changeinfo.finance_status','=','1')
				-> where('changeinfo.type','=','2')
				->where( function( $query ) use ( $stime ) {
					if ( $stime ) {
						$s = strtotime( $stime );
						$query->where( 'buyinfo.created_at' , '>' , $s );
					}
				} )
				->where( function( $query ) use ( $etime ) {
					if ( $etime ) {
						$e = strtotime( $etime );
						$query->where( 'buyinfo.created_at' , '<' , $e );
					}
				} )
				-> get() ->count();

		}

	}
