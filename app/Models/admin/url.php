<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class url extends Model
{

	/**
	 *
	 * url 链接新增
	 *
	 * @param $data
	 *
	 * @return bool
	 */
	public static function store_url($data){
		return DB::table('urlinfo') -> insert($data);
	}


	/**
	 *
	 * 查看信息
	 *
	 * @param $page
	 *
	 * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
	 */
	public static function get_all_role($page){
		return DB::table('urlinfo') -> orderByDesc('url_id') -> paginate($page);
	}

	/**
	 *
	 * 查询单挑信息
	 *
	 * @param $url_id
	 *
	 * @return Model|\Illuminate\Database\Query\Builder|object|null
	 */
	public static function get_d_url($url_id){
		return DB::table('urlinfo') -> where('url_id','=',$url_id) -> first();
	}

	/**
	 *
	 * 更新数据
	 *
	 * @param $url_id
	 * @param $data
	 *
	 * @return int
	 */
	public static function update_d_url($url_id,$data){
		return DB::table('urlinfo') -> where('url_id','=',$url_id) -> update($data);
	}

	/**
	 *
	 * 删除信息
	 *
	 * @param $url_id
	 *
	 * @return int
	 */
	public static function delete_url($url_id){
		return DB::table('urlinfo') -> where('url_id','=',$url_id) ->delete();
	}


	/**
	 *
	 * 多选删除
	 * @param $url_id
	 *
	 * @return int
	 */
	public static function delete_all($url_id){
		return DB::table('urlinfo') -> whereIn('url_id',$url_id) -> delete();
	}
}
