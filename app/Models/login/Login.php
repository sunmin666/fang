<?php

	namespace App\Models\login;


	use Illuminate\Database\Eloquent\Model;
	use Illuminate\Support\Facades\DB;
	use Illuminate\Support\Facades\Session;


	class Login extends Model {

		/**
		 *
		 * 查询登录用户的所有信息  memberinfo
		 *
		 * @param $username
		 *
		 * @return Model|\Illuminate\Database\Query\Builder|object|null
		 */
		public static function get_username_memberinfo( $username )
		{
			return DB::table( 'memberinfo' )
							 ->select( 'memberinfo.*' , 'cha.ch_per' , 'cha.ch_nsme' )
							 ->leftJoin( 'cha' , 'cha.chid' , '=' , 'memberinfo.character' )
							 ->where( 'memberinfo.account' , '=' , $username )
							 ->first();
		}


		/**
		 *
		 * 查询登录用户的所有信息  houserinfo
		 *
		 * @param $username
		 *
		 * @return Model|\Illuminate\Database\Query\Builder|object|null
		 */
		public static function get_username_houserinfo( $username )
		{
			return DB::table( 'houserinfo' )
							 ->select( 'houserinfo.*' , 'cha.ch_per' , 'cha.ch_nsme' )
							 ->leftJoin( 'cha' , 'cha.chid' , '=' , 'houserinfo.character' )
							 ->where( 'houserinfo.username' , '=' , $username )
							 ->first();
		}



		/**
		 * 查询当前用户的密码 memberinfo 内部成员
		 *
		 * @param $memberid
		 *
		 * @return Model|\Illuminate\Database\Query\Builder|object|null
		 */
		public static function get_d_password( $memberid )
		{
			return DB::table( 'memberinfo' )->select( 'password' )
							 ->where( 'memberid' , '=' , $memberid )->first();
		}


		/**
		 * 查询当前用户的密码   houserinfo  外部成员
		 *
		 * @param $memberid
		 *
		 * @return Model|\Illuminate\Database\Query\Builder|object|null
		 */
		public static function get_du_password( $memberid )
		{
			return DB::table( 'houserinfo' )->select( 'password' )
							 ->where( 'hous_id' , '=' , $memberid )->first();
		}


		/**
		 * 修改当前用户密码 memberinfo  内部成员
		 *
		 * @param $memberid
		 * @param $data
		 *
		 * @return int
		 */
		public static function update_password( $memberid , $data )
		{
			return DB::table( 'memberinfo' )->where( 'memberid' , '=' , $memberid )
							 ->update( $data );
		}

		/**
		 *
		 *
		 *
		 * @param $memberid
		 * @param $data
		 *
		 * @return int
		 */
		public static function updateh_password( $memberid , $data )
		{
			return DB::table( 'houserinfo' )->where( 'hous_id' , '=' , $memberid )
							 ->update( $data );
		}

		/**
		 *
		 * 外部成员成员登录 login_count字段自增加一
		 *
		 * @param $id
		 *
		 * @return int
		 */
		public static function login_count($id)
		{
			return DB::table('houserinfo') -> where('hous_id','=',$id) -> increment('login_count',1);
		}
	}
