<?php

	namespace App\Models\admin;


	use Illuminate\Database\Eloquent\Model;
	use Illuminate\Support\Facades\DB;


	class Home extends Model {

		//查询所有楼号
		public static function get_all_buildnum()
		{
			return DB::table( 'fieldinfo' )->where( 'parent_field_id' , '=' , 1 )
							 ->get();
		}

		//查询指定的单元号/房号
		public static function get_unitnum( $field_id )
		{
			return DB::table( 'fieldinfo' )
							 ->where( 'parent_field_id' , '=' , $field_id )->get();
		}

		//添加数据
		public static function store_homeinfo( $data )
		{
			return DB::table( 'homeinfo' )->insert( $data );
		}

		//查询所有数据
		public static function get_all_homeinfo( $page )
		{
			return DB::table( 'homeinfo' )
							 ->select( 'homeinfo.*' , 'fieldinfob.name as buildnums' , 'fieldinfou.name as unitnums' , 'fieldinfor.name as roomnums' )
							 ->leftJoin( 'fieldinfo as fieldinfob' , 'homeinfo.buildnum' , '=' , 'fieldinfob.field_id' )
							 ->leftJoin( 'fieldinfo as fieldinfou' , 'homeinfo.unitnum' , '=' , 'fieldinfou.field_id' )
							 ->leftJoin( 'fieldinfo as fieldinfor' , 'homeinfo.roomnum' , '=' , 'fieldinfor.field_id' )
							 ->paginate( $page );
		}



		//数据修改查询单挑数据
		public static function get_d_home( $homeid )
		{
			return DB::table( 'homeinfo' )->where( 'homeid' , '=' , $homeid )
							 ->first();
		}


		//查询单元号对应的楼号
		public static function get_roomnum( $firldid )
		{
			return DB::table( 'fieldinfo' )
							 ->where( 'parent_field_id' , '=' , $firldid )->get();
		}


		//修改信息
		public static function update_d_home( $homeid , $data )
		{
			return DB::table( 'homeinfo' )->where( 'homeid' , '=' , $homeid )
							 ->update( $data );
		}


		//	删除信息

		public static function delete_d_home( $homeid )
		{
			return DB::table( 'homeinfo' )->where( 'homeid' , '=' , $homeid )
							 ->delete();
		}

		//多选删除项目
		public static function delete_all_home( $homeid )
		{
			return DB::table( 'homeinfo' )->whereIn( 'homeid' , $homeid )->delete();
		}

		//查看房源信息详情
		public static function view_d_home( $homeid )
		{
			return DB::table( 'homeinfo' )
							 ->select( 'homeinfo.*' , 'fieldinfob.name as buildnums' , 'fieldinfou.name as unitnums' , 'fieldinfor.name as roomnums' )
							 ->leftJoin( 'fieldinfo as fieldinfob' , 'homeinfo.buildnum' , '=' , 'fieldinfob.field_id' )
							 ->leftJoin( 'fieldinfo as fieldinfou' , 'homeinfo.unitnum' , '=' , 'fieldinfou.field_id' )
							 ->leftJoin( 'fieldinfo as fieldinfor' , 'homeinfo.roomnum' , '=' , 'fieldinfor.field_id' )
							 ->where( 'homeinfo.homeid' , '=' , $homeid )
							 ->first();
		}




		//-----------------------------------房子图形管理------------------------------------------------//
		public static function get_tu( $shu )
		{
			//查询该楼层有几个单元
			$unit = DB::table( 'fieldinfo' )->where( 'parent_field_id' , '=' , $shu )
								->get()
								->map( function( $value ) {
									return (array)$value;
								} )->toArray();
			$data = array ();
			//		dd($unit);
			foreach ( $unit as $k => $v ) {
				$data[$k]['unit'] = $v['name'];
				$data[$k]['unit_id'] = $v['field_id'];
				//dd($data[$k]['unit']);
				$data[$k]['fang'] = DB::table( 'homeinfo' )
															->select( 'homeinfo.*' , 'fieldinfob.name as buildnums' , 'fieldinfou.name as unitnums' , 'fieldinfor.name as roomnums' )
															->leftJoin( 'fieldinfo as fieldinfob' , 'homeinfo.buildnum' , '=' , 'fieldinfob.field_id' )
															->leftJoin( 'fieldinfo as fieldinfou' , 'homeinfo.unitnum' , '=' , 'fieldinfou.field_id' )
															->leftJoin( 'fieldinfo as fieldinfor' , 'homeinfo.roomnum' , '=' , 'fieldinfor.field_id' )
															->where( 'homeinfo.unitnum' , '=' , $v['field_id'] )
															->get()
															->map( function( $value ) {
																return (array)$value;
															} )->toArray();
				//dd($data[$k]['fang']);
			}
			return $data;
		}



		//更新房子状态信息
		public static function update_status_d( $homeid , $data )
		{
			return DB::table( 'homeinfo' )->where( 'homeid' , '=' , $homeid )
							 ->update( $data );
		}

		//查询所有房子信息
		public static function get_all_homeinfos(){
			return DB::table('homeinfo')-> select('homeid') -> where('status','=',1) -> get();
		}


		//查询锁定条件
		public static function get_buy($homeid)
		{
			return DB::table( 'buyinfo' )
//							 -> select('buyinfo.apply_time','buyinfo.lock_time','')
				       -> orderByDesc('buyid')
							 ->where( 'homeid' , '=' , $homeid )
							 ->first();
		}

		//更改认购状态
		public static function update_buy_status($buy_id,$buy){
			return DB::table('buyinfo') -> where('buyid','=',$buy_id) -> update($buy);
		}


	}
