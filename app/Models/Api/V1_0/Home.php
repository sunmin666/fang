<?php

namespace App\Models\Api\V1_0;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Home extends Model
{
    //查询房源信息
	public static function get_tu( $shu )
	{
		//查询该楼层有几个单元
		$unit = DB::table( 'fieldinfo' )->where( 'parent_field_id' , '=' , $shu )
							->get()
							->map( function( $value ) {
								return (array)$value;
							} )->toArray();
		$data = array ();
		foreach ( $unit as $k => $v ) {
			$data[$k]['unit'] = $v['name'];
			$data[$k]['unit_id'] = $v['field_id'];
			//dd($data[$k]['unit']);
			$data[$k]['fang'] = DB::table( 'homeinfo' )
														->select( 'homeinfo.status' ,'homeinfo.homeid'  , 'fieldinfob.name as buildnums' , 'fieldinfou.name as unitnums' , 'fieldinfor.name as roomnums' )
														->leftJoin( 'fieldinfo as fieldinfob' , 'homeinfo.buildnum' , '=' , 'fieldinfob.field_id' )
														->leftJoin( 'fieldinfo as fieldinfou' , 'homeinfo.unitnum' , '=' , 'fieldinfou.field_id' )
														->leftJoin( 'fieldinfo as fieldinfor' , 'homeinfo.roomnum' , '=' , 'fieldinfor.field_id' )
														->where( 'homeinfo.unitnum' , '=' , $v['field_id'] )
														->get()
														->map( function( $value ) {
															return (array)$value;
														} )->toArray();
		}
		return $data;
	}


	//查询每个楼的房数
	public static function get_all_count($field){
		return DB::table('homeinfo') -> where('buildnum','=',$field) -> count();
	}


	//查询每个楼的可售房数
	public static function get_all_counts($field){
		return DB::table('homeinfo') -> where('buildnum','=',$field) -> where('status','=',0) -> count();
  }

	//查询每个楼的可售房数
	public static function get_all_countss($field){
		return DB::table('homeinfo') -> where('buildnum','=',$field) -> where('status','=',1) -> count();
	}



	//查询每个楼的可售房数
	public static function get_all_countsss($field){
		return DB::table('homeinfo') -> where('buildnum','=',$field) -> where('status','=',3) -> count();
	}



	//查看详情
	public static function get_d_home($homeid){
		return DB::table('homeinfo')
			-> select(
				'homeinfo.status','homeinfo.floor','homeinfo.house_str','homeinfo.build_area','homeinfo.price','homeinfo.discount',
				'homeinfo.house_img',
				'fieldinfob.name as buildnums' , 'fieldinfou.name as unitnums' , 'fieldinfor.name as roomnums'
				)
			->leftJoin( 'fieldinfo as fieldinfob' , 'homeinfo.buildnum' , '=' , 'fieldinfob.field_id' )
			->leftJoin( 'fieldinfo as fieldinfou' , 'homeinfo.unitnum' , '=' , 'fieldinfou.field_id' )
			->leftJoin( 'fieldinfo as fieldinfor' , 'homeinfo.roomnum' , '=' , 'fieldinfor.field_id' )
			-> where('homeinfo.homeid','=',$homeid) -> get();
	}
}
