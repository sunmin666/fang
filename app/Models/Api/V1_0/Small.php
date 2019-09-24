<?php

namespace App\Models\Api\V1_0;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Small extends Model
{
    //查询所有职业顾问
	public static function get_all_hous(){
		return DB::table('houserinfo')
						 -> select(
						 'hous_id','name'
						 )
						 -> where('is_ipad','=',2) -> get();
	}

	public static function get_all_housts(){
		$data = DB::table('houserinfo') -> select('hous_id','name')
							-> where('is_ipad','=',2)
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





	public static function get_signinfol($cust_id,$stime,$etime){
		return DB::table('signinfo')
						 -> select('signinfo.*')
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
						 -> get() -> count();
	}



}
