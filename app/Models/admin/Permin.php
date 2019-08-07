<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Permin extends Model
{

	/**
	 *
	 * 查询所有的角色信息
	 *
	 * @return \Illuminate\Support\Collection
	 */
    public static function get_role(){
  		return DB::table('roleinfo') -> get();
		}

	/**
	 *
	 * 查询所有路径信息
	 * @return \Illuminate\Support\Collection
	 */
		public static function get_url(){
    	return DB::table('urlinfo') -> get();
		}

}
