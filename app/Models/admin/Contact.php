<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Contact extends Model
{

	/**
	 * @param $data
	 *
	 * @return bool
	 */
	public static function store_contact($data){
		return DB::table('contact') -> insert($data);
	}

	/**
	 * 查询用户留言信息 每页十条显示
	 *
	 * @param $page
	 *
	 * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
	 */
	public static function get_all_contact($page){
		return DB::table('contact') -> paginate($page);
	}

	/**
	 * 删除用户留言信息
	 *
	 * @param $c_id
	 *
	 * @return int
	 */
	public static function delete_d_contact($c_id){
		return DB::table('contact') -> where('c_id','=',$c_id) -> delete();
	}

	/**
	 *
	 * 多选删除用户留言信息
	 *
	 * @param $c_id
	 *
	 * @return int
	 */
	public static function delete_all_contact($c_id){
		return DB::table('contact') -> whereIn('c_id',$c_id) -> delete();
	}

}
