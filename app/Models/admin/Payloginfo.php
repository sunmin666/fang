<?php

	namespace App\Models\admin;


	use Illuminate\Database\Eloquent\Model;
	use Illuminate\Support\Facades\DB;


	class Payloginfo extends Model {

		//查询当前用户
		public static function get_customer( $cust_id )
		{
			return DB::table( 'customer' )->where( 'cust_id' , '=' , $cust_id )
							 ->get();
		}

		//添加缴费记录
		public static function store_pay( $data )
		{
			return DB::table( 'payloginfo' )->insert( $data );
		}

		//查询所有用户缴费记录
		public static function get_all_pay( $type , $name , $iphone , $page )
		{
			return DB::table( 'payloginfo' )
							 ->select( 'payloginfo.*' , 'customer.realname' )
							 ->leftJoin( 'customer' , 'payloginfo.cust_id' , '=' , 'customer.cust_id' )
							 ->where( function( $query ) use ( $type ) {
								 if ( $type ) {
									 $query->where( 'payloginfo.type' , '=' , $type );
								 }
							 } )
							 ->where( function( $query ) use ( $name ) {
								 if ( $name ) {

								 	$a = DB::table('customer')-> select('cust_id') -> where('realname','like','%'.$name.'%') -> get() -> map(function($value){return (array)$value;}) -> toArray();

									 $query->whereIn( 'payloginfo.cust_id', $a );
								 }
							 } )
							 ->where( function( $query ) use ( $iphone ) {
								 if ( $iphone ) {
									 $c = DB::table('customer')-> select('cust_id') -> where('mobile','like','%'.$iphone.'%') -> get() -> map(function($value){return (array)$value;}) -> toArray();
									 $query->whereIn( 'payloginfo.cust_id' , $c );
								 }
							 } )
							 ->paginate( $page );
		}

		//查询单条记录
		public static function get_d_pay( $payl_id )
		{
			return DB::table( 'payloginfo' )
							 ->select( 'payloginfo.*' , 'customer.realname' )
							 ->leftJoin( 'customer' , 'payloginfo.cust_id' , '=' , 'customer.cust_id' )
							 ->where( 'payloginfo.payl_id' , '=' , $payl_id )->first();
		}

		//更新缴费记录数据
		public static function update_d_pay( $payl_id , $data )
		{
			return DB::table( 'payloginfo' )->where( 'payl_id' , '=' , $payl_id )
							 ->update( $data );
		}

		//删除单条缴费记录
		public static function del_d_pay( $payl_id )
		{
			return DB::table( 'payloginfo' )->where( 'payl_id' , '=' , $payl_id )
							 ->delete();
		}

		//全选删除
		public static function delete_all_pay( $payl_id )
		{
			return DB::table( 'payloginfo' )->whereIn( 'payl_id' , $payl_id )
							 ->delete();
		}

		//查询每个用户下房子的编号
		public static function get_buyinfo( $cust_id )
		{
			return DB::table( 'buyinfo' )->where( 'cust_id' , '=' , $cust_id )->get();
		}


		//查找房源id
		public static function get_home( $buy_number )
		{
			return DB::table( 'buyinfo' )->select( 'homeid' )
							 ->where( 'buy_number' , '=' , $buy_number )->first();
		}


		//查看房源信息详情
		public static function get_d_homrinfo( $homeid )
		{
			return DB::table( 'homeinfo' )
							 ->select( 'homeinfo.*' , 'fieldinfob.name as buildnums' , 'fieldinfou.name as unitnums' , 'fieldinfor.name as roomnums' )
							 ->leftJoin( 'fieldinfo as fieldinfob' , 'homeinfo.buildnum' , '=' , 'fieldinfob.field_id' )
							 ->leftJoin( 'fieldinfo as fieldinfou' , 'homeinfo.unitnum' , '=' , 'fieldinfou.field_id' )
							 ->leftJoin( 'fieldinfo as fieldinfor' , 'homeinfo.roomnum' , '=' , 'fieldinfor.field_id' )
							 ->where( 'homeinfo.homeid' , '=' , $homeid )
							 ->first();
		}

	}
