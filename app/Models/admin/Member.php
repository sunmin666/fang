<?php

	namespace App\Models\admin;


	use Illuminate\Database\Eloquent\Model;
	use Illuminate\Support\Facades\DB;


	class Member extends Model {

		/**
		 *
		 * 新增到数据库
		 *
		 * @param $data
		 *
		 * @return bool
		 */
		public static function store_member( $data )
		{
			return DB::table( 'memberinfo' )->insertGetId( $data );
		}

		/**
		 *
		 * 查询自增id不等1的所有用户信息
		 *
		 * @param $page
		 *
		 * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
		 */
		public static function get_all_member( $page )
		{
			return DB::table( 'memberinfo' )
							 ->select( 'memberinfo.*' , 'cha.ch_nsme' )
							 ->leftJoin( 'cha' , 'cha.chid' , '=' , 'memberinfo.character' )
							 ->orderBy( 'memberinfo.created_at' , 'desc' )
							 ->where( 'memberinfo.memberid' , '!=' , 1 )->paginate( $page );
		}

		/**
		 *
		 * 查询单挑用户信息
		 *
		 * @param $memberid
		 *
		 * @return Model|\Illuminate\Database\Query\Builder|object|null
		 */

		public static function get_d_memberinfo( $memberid )
		{
			return DB::table( 'memberinfo' )
							 ->select( 'memberinfo.*' , 'relationinfo.posi_id' , 'relationinfo.role_id' , 'relationinfo.perm_id' )
							 ->leftJoin( 'relationinfo' , 'memberinfo.memberid' , '=' , 'relationinfo.memberid' )
							 ->where( 'memberinfo.memberid' , '=' , $memberid )
							 ->first();
		}



		/**
		 *
		 * 更新数据库用户信息
		 *
		 * @param $memberid
		 * @param $data
		 *
		 * @return int
		 */
		public static function update_d_memberinfo( $memberid , $data )
		{
			return DB::table( 'memberinfo' )->where( 'memberid' , '=' , $memberid )
							 ->update( $data );
		}


		/**
		 *
		 * 删除用户信息
		 *
		 * @param $memberid
		 *
		 * @return int
		 */
		public static function delete_d_memberinfo( $memberid )
		{
			return DB::table( 'memberinfo' )->where( 'memberid' , '=' , $memberid )
							 ->delete();
		}

		/**
		 *
		 * 多选删除
		 *
		 * @param $member_id
		 *
		 * @return int
		 */
		public static function delete_all_memberinfo( $member_id )
		{
			return DB::table( 'memberinfo' )->whereIn( 'memberid' , $member_id )
							 ->delete();
		}

		/**
		 *
		 * 使用角色id 去查询用户表
		 *
		 * @param $chid
		 *
		 * @return Model|\Illuminate\Database\Query\Builder|object|null
		 */
		public static function get_d_character( $chid )
		{
			return DB::table( 'memberinfo' )->where( 'character' , '=' , $chid )
							 ->first();
		}

		/**
		 * 修改用户的状态
		 *
		 * @param $memberid
		 * @param $data
		 *
		 * @return int
		 */
		public static function get_d_status( $memberid , $data )
		{
			return DB::table( 'memberinfo' )->where( 'memberid' , '=' , $memberid )
							 ->update( $data );
		}

		/**
		 * 职位信息
		 *
		 * @return \Illuminate\Support\Collection
		 */
		public static function get_all_position()
		{
			return DB::table( 'positioninfo' )->get();
		}

		/**
		 * 角色信息
		 *
		 * @return \Illuminate\Support\Collection
		 */
		public static function get_all_role()
		{
			return DB::table( 'roleinfo' )->get();
		}

		/**
		 *
		 * 叫色信息
		 *
		 * @return \Illuminate\Support\Collection
		 */
		public static function get_all_permin()
		{
			return DB::table( 'permission' )->get();
		}

		public static function store_relationinfo( $data1 )
		{
			return DB::table( 'relationinfo' )->insert( $data1 );
		}


		public static function update_relationinfo($memberid,$data1){
			return DB::table( 'relationinfo' ) -> where('memberid','=',$memberid)->update( $data1 );
		}

	}
