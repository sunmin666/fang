<?php

	namespace App\Models\admin;


	use Illuminate\Database\Eloquent\Model;
	use Illuminate\Support\Facades\DB;


	class Field extends Model {

		/**
		 * 查询所有的field数据并且以数组的形式输出
		 *
		 * @return array
		 */
		public static function get_all_field()
		{
			return DB::table( 'fieldinfo' )
				-> select('fieldinfo.*','field.name as names')
				-> leftJoin('fieldinfo as field','fieldinfo.parent_field_id','=','field.field_id')
							 ->get()->map(
				function( $value ) {
					return (array)$value;
				}
			)->toArray();
		}


		/**
		 *
		 * 添加数据
		 *
		 * @param $data
		 *
		 * @return bool
		 */
		public static function store_field( $data )
		{
			return DB::table( 'fieldinfo' )->insert( $data );
		}


		//查询单挑信息
		public static function get_d_field($field_id){

			return DB::table('fieldinfo')

				-> select('fieldinfo.*','field.name as names')
				-> leftJoin('fieldinfo as field','fieldinfo.parent_field_id','=','field.field_id')

				-> where('fieldinfo.field_id','=',$field_id) -> first();
		}


		/**
		 *
		 * 更新字段数据
		 *
		 * @param $field_id
		 * @param $data
		 *
		 * @return int
		 */
		public static function update_field($field_id,$data){
			return DB::table('fieldinfo') -> where('field_id','=',$field_id) -> update($data);
		}

		//查询要删除数据下有无子类
		public static function get_all_sub($field_id){
			return DB::table('fieldinfo') -> where('parent_field_id','=',$field_id) -> count();
		}

		//删除数据
		public static function delete_field($field_id){
			return DB::table('fieldinfo') -> where('field_id','=',$field_id) -> delete();
		}
	}
