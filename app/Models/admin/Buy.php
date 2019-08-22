<?php

	namespace App\Models\admin;


	use Illuminate\Database\Eloquent\Model;
	use Illuminate\Support\Facades\DB;


	class Buy extends Model {

		//查询所有客户信息
		public static function get_cus()
		{
			return DB::table( 'customer' )->get();
		}


		//根据id查询客户信息
		public static function get_cust_d( $cust_id )
		{
			return DB::table( 'customer' )
							 ->select( 'realname' , 'idcard' , 'mobile' )
							 ->where( 'cust_id' , '=' , $cust_id )
							 ->get();
		}


		//查询所有楼号
		public static function fieid()
		{
			return DB::table( 'fieldinfo' )->where( 'parent_field_id' , '=' , 1 )
							 ->get();
		}

		//根据单元号查询去homeinfo查询status=1的房子
		public static function get_homeinfo( $unitnum )
		{
			return DB::table( 'homeinfo' )
							 ->select( 'homeinfo.*' , 'fieldinfob.name as buildnums' , 'fieldinfou.name as unitnums' , 'fieldinfor.name as roomnums' )
							 ->leftJoin( 'fieldinfo as fieldinfob' , 'homeinfo.buildnum' , '=' , 'fieldinfob.field_id' )
							 ->leftJoin( 'fieldinfo as fieldinfou' , 'homeinfo.unitnum' , '=' , 'fieldinfou.field_id' )
							 ->leftJoin( 'fieldinfo as fieldinfor' , 'homeinfo.roomnum' , '=' , 'fieldinfor.field_id' )
							 ->where( 'homeinfo.status' , '=' , 0 )
							 ->where( 'homeinfo.unitnum' , '=' , $unitnum )
							 ->get();
		}

		//根据房子id查询房子信息详情
		public static function get_homeinfo_view($field_id){
			return DB::table( 'homeinfo' )
							 ->select( 'homeinfo.*' , 'fieldinfob.name as buildnums' , 'fieldinfou.name as unitnums' , 'fieldinfor.name as roomnums' )
							 ->leftJoin( 'fieldinfo as fieldinfob' , 'homeinfo.buildnum' , '=' , 'fieldinfob.field_id' )
							 ->leftJoin( 'fieldinfo as fieldinfou' , 'homeinfo.unitnum' , '=' , 'fieldinfou.field_id' )
							 ->leftJoin( 'fieldinfo as fieldinfor' , 'homeinfo.roomnum' , '=' , 'fieldinfor.field_id' )
							 ->where( 'homeinfo.status' , '=' , 0 )
							 ->where( 'homeinfo.homeid' , '=' , $field_id )
							 ->get();
		}


		//	//查询房子状态是否符合要求
		//	public static function get_home_d($homeid){
		//		return DB::table('homeinfo') ->select('status') -> where('homeid','=',$homeid) -> first();
		//	}

	}
