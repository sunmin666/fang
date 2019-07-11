<?php

	namespace App\Models\login;


	use Illuminate\Database\Eloquent\Model;
	use Illuminate\Support\Facades\DB;


	class Login extends Model {

		/**
		 *
		 * 查询登录用户的所有信息
		 *
		 * @param $username
		 *
		 * @return Model|\Illuminate\Database\Query\Builder|object|null
		 */
		public static function get_username_memberinfo( $username )
		{
			return DB::table( 'memberinfo' )
							 -> select('memberinfo.*','cha.ch_per','cha.ch_nsme')
				       -> leftJoin('cha','cha.chid','=','memberinfo.character')
							 ->where( 'memberinfo.account' , '=' , $username )
							 ->first();
		}


		/**
		 * 查询当前用户的密码
		 *
		 * @param $memberid
		 *
		 * @return Model|\Illuminate\Database\Query\Builder|object|null
		 */
		public static function get_d_password($memberid){
			return DB::table('memberinfo') -> select('password') -> where('memberid','=',$memberid) -> first();
		}

		/**
		 * 修改当前用户密码
		 *
		 * @param $memberid
		 * @param $data
		 *
		 * @return int
		 */
		public static function update_password($memberid,$data){
			return DB::table('memberinfo') -> where('memberid','=',$memberid) -> update($data);
		}
	}
