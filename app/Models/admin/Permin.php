<?php

	namespace App\Models\admin;


	use Illuminate\Database\Eloquent\Model;
	use Illuminate\Support\Facades\DB;
	use Illuminate\Support\Facades\Session;


	class Permin extends Model {

		/**
		 *
		 * 查询所有的角色信息
		 *
		 * @return \Illuminate\Support\Collection
		 */
		public static function get_role()
		{
			$status = Session::get( 'session_member.status' );

			if ( $status == 1 ) {
				return DB::table( 'user_roleinfo' )->get();
			} else {
				return DB::table( 'roleinfo' )->get();
			}

		}

		/**
		 *
		 * 查询所有路径信息
		 *
		 * @return \Illuminate\Support\Collection
		 */
		public static function get_url()
		{
			$status = Session::get( 'session_member.status' );
			if ( $status == 1 ) {
				return DB::table( 'urlinfo' )->where( 'status' , '=' , 1 )->get();
			} else {
				return DB::table( 'urlinfo' )->get();
			}

		}


		/**
		 *
		 * 添加权限
		 *
		 * @param $data
		 *
		 * @return bool
		 */
		public static function store_permin( $data )
		{

			$status = Session::get( 'session_member.status' );
			if ( $status == 1 ) {
				return DB::table( 'user_permissioninfo' )->insert( $data );
			} else {
				return DB::table( 'permission' )->insert( $data );
			}

		}


		/**
		 *
		 * 查询权限信息
		 *
		 * @param $page
		 *
		 * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
		 */
		public static function get_all_permin( $page )
		{
			$status = Session::get( 'session_member.status' );
			if ( $status == 1 ) {
				return DB::table( 'user_permissioninfo' )->orderByDesc( 'created_at' )
								 ->paginate( $page );
			} else {
				return DB::table( 'permission' )->orderByDesc( 'created_at' )
								 ->paginate( $page );
			}

		}

		/**
		 *
		 * 查询单挑信息
		 *
		 * @param $perm_id
		 *
		 * @return Model|\Illuminate\Database\Query\Builder|object|null
		 */
		public static function get_d_permin( $perm_id )
		{
			$status = Session::get( 'session_member.status' );

			if ( $status == 1 ) {
				return DB::table( 'user_permissioninfo' )->where( 'perm_id' , '=' , $perm_id )
								 ->first();
			} else {

				return DB::table( 'permission' )->where( 'perm_id' , '=' , $perm_id )
								 ->first();
			}
		}

		/**
		 *
		 * 修改数据
		 *
		 * @param $permi_id
		 * @param $data
		 *
		 * @return int
		 */
		public static function update_d_permin( $permi_id , $data )
		{
			$status = Session::get( 'session_member.status' );
			if($status == 1){
				return DB::table( 'user_permissioninfo' )->where( 'perm_id' , '=' , $permi_id )
								 ->update( $data );
			}else{
				return DB::table( 'permission' )->where( 'perm_id' , '=' , $permi_id )
								 ->update( $data );
			}

		}

		/**
		 *
		 * 删除数据
		 *
		 * @param $perm_id
		 *
		 * @return int
		 */
		public static function delete_permin( $perm_id )
		{
			$status = Session::get( 'session_member.status' );

			if($status == 1){
				return DB::table( 'user_permissioninfo' )->where( 'perm_id' , '=' , $perm_id )
								 ->delete();
			}else{
				return DB::table( 'permission' )->where( 'perm_id' , '=' , $perm_id )
								 ->delete();
			}

		}

		/**
		 * 多选删除
		 *
		 * @param $perm_id
		 *
		 * @return int
		 */
		public static function delete_all_permin( $perm_id )
		{
			$status = Session::get( 'session_member.status' );
			if($status == 1){
				return DB::table( 'user_permissioninfo' )->whereIn( 'perm_id' , $perm_id )
								 ->delete();
			}else{

			return DB::table( 'permission' )->whereIn( 'perm_id' , $perm_id )
							 ->delete();
			}
		}
	}
