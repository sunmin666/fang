<?php

	namespace App\Models\Api\V1_0;


	use Illuminate\Database\Eloquent\Model;
	use Illuminate\Support\Facades\DB;


	class field extends Model {

		//查询楼号
		public static function get_field()
		{
			return DB::table( 'fieldinfo' )->select( 'field_id' , 'name' )
							 ->where( 'parent_field_id' , '=' , 1 )->get();
		}

		//查询单元号
		public static function get_unitnum( $parent_field_id )
		{
			return DB::table( 'fieldinfo' )->select( 'field_id' , 'name' )
							 ->where( 'parent_field_id' , '=' , $parent_field_id )->get();
		}

		//查询为认购的房源
		public static function get_home( $unitnum )
		{
			return DB::table( 'homeinfo' )
							 ->select('homeinfo.homeid','homeinfo.floor','homeinfo.build_area','homeinfo.price','homeinfo.total',
								 'homeinfo.discount','fieldinfo.name','homeinfo.roomnum'
								 )
				->leftJoin('fieldinfo','homeinfo.roomnum','=','fieldinfo.field_id')
							 ->where( 'homeinfo.unitnum' , '=' , $unitnum )
							 ->where( 'homeinfo.status' , '=' , 0 )->get();
		}
	}
