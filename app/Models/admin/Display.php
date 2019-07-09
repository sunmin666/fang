<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Display extends Model
{
	/**
	 *
	 * 数据添加到intr表里
	 *
	 * @param $data
	 *
	 * @return bool
	 */
	public static function store_intr($data){
		return DB::table('intr') -> insertGetId($data);
	}

	/**
	 * 数据添加到tintr表里
	 *
	 * @param $data1
	 *
	 * @return bool
	 */
	public static function store_tintr($data1){
		return DB::table('tintr') -> insert($data1);
	}

	/**
	 * 查询户型标题表
	 *
	 * @param $page
	 *
	 * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
	 */
	public static function get_intr($page){
		return DB::table('intr') -> orderBy('created_at','desc') -> where('status','=',2) -> paginate($page);
	}


	/**
	 *
	 * 查询单挑信息
	 *
	 * @param $intr_id
	 *
	 * @return Model|\Illuminate\Database\Query\Builder|object|null
	 */
	public static function get_d_intr($intr_id){
		$data = DB::table('intr') -> where('intr_id','=',$intr_id) -> first();

		$data -> img = DB::table('tintr') -> where('intr_id','=',$intr_id) -> get();

		return $data;
	}

	/**
	 * 更新户型信息
	 *
	 * @param $intr_id
	 * @param $data
	 *
	 * @return int
	 */
	public static function update_intr($intr_id,$data){
		return DB::table('intr') -> where('intr_id','=',$intr_id) -> update($data);
	}


	/**
	 * 先删除户型图片信息 然后在添加
	 *
	 * @param $intr_id
	 *
	 * @return int
	 */
	public static function get_delete($intr_id){
		return DB::table('tintr') -> where('intr_id','=',$intr_id) -> delete();
	}


	/**
	 * 更新户型图片数据库信息
	 *
	 * @param $data1
	 *
	 * @return int
	 */

	public static function update_tintr($data1){
		return DB::table('tintr')  -> insert($data1);
	}

	/**
	 *
	 * 删除户型标题信息
	 *
	 * @param $intr_id
	 *
	 * @return int
	 */
	public static function get_delete_intr($intr_id){
		return DB::table('intr') -> where('intr_id','=',$intr_id) -> delete();
	}



	/**
	 *
	 * 多选删除户型标题信息
	 *
	 * @param $intr_id
	 *
	 * @return int
	 */
	public static function get_delete_intr_all($intr_id){
		return DB::table('intr') ->whereIn('intr_id',$intr_id) -> delete();
	}


	/**
	 *
	 * 多选删除户型图片信息
	 *
	 * @param $intr_id
	 *
	 * @return int
	 */
	public static function delete_all_tintr($intr_id){
		return DB::table('tintr') -> whereIn('intr_id',$intr_id) -> delete();
	}
}
