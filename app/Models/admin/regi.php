<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class regi extends Model
{

	/**
	 *
	 * iHOUSER使用者注册
	 *
	 * @param $data
	 *
	 * @return bool
	 */

		public static function store_d_houser($data){
			return DB::table('houserinfo') -> insert($data);
		}

	/**
	 * 查询该表里有无人 使用此权限
	 *
	 * @param $chid
	 *
	 * @return Model|\Illuminate\Database\Query\Builder|object|null
	 */
		public static function get_d_character($chid){
			return DB::table('houserinfo') -> where('character','=',$chid) -> first();
		}

}
