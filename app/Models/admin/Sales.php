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

	}
