<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Cha extends Model
{

	/**
	 *
	 * 添加角色
	 *
	 * @param $data
	 *
	 * @return bool
	 */
    public static function store_cha($data){
    	return DB::table('cha') -> insert($data);
		}

	/**
	 *
	 * 查询所有的角色信息
	 *
	 * @param $page
	 *
	 * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
	 */
		public static function get_all_cha($page){
    	return DB::table('cha') -> orderBy('created_at','desc') -> paginate($page);
		}

	/**
	 * 查看角色信息单挑数据
	 *
	 * @param $chid
	 *
	 * @return Model|\Illuminate\Database\Query\Builder|object|null
	 */
		public static function get_d_cha($chid){
			return DB::table('cha') -> where('chid','=',$chid) -> first();
		}



	/**
	 * 修改角色信息数据
	 *
	 * @param $chid
	 * @param $data
	 *
	 * @return int
	 */
		public static function update_d_cha($chid,$data){
			return DB::table('cha') -> where('chid','=',$chid) -> update($data);
		}


	/**
	 * 删除角色信息
	 *
	 * @param $chid
	 *
	 * @return int
	 */
		public static function delete_cha($chid){
			return DB::table('cha') -> where('chid','=',$chid) -> delete();
		}

	/**
	 *
	 * 查找所有角色信息   没有分页
	 *
	 * @return \Illuminate\Support\Collection
	 */
		public static function get_all_chas(){
			return DB::table('cha') -> get();
		}


}
