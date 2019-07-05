<?php

	namespace App\Models\login;


	use Illuminate\Database\Eloquent\Model;
	use Illuminate\Support\Facades\DB;


	class Login extends Model {

		public static function get_username_memberinfo( $username )
		{
			return DB::table( 'memberinfo' )
							 -> select('memberinfo.*','cha.ch_per','cha.ch_nsme')
				       -> leftJoin('cha','cha.chid','=','memberinfo.character')
							 ->where( 'memberinfo.account' , '=' , $username )
							 ->first();
		}
	}
