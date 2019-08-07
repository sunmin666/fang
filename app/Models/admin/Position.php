<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Position extends Model
{

	/**
	 *
	 * 职位信息添加
	 *
	 * @param $data
	 *
	 * @return bool
	 */
    public static function store_d_position($data){
    	return DB::table('positioninfo') -> insert($data);
		}

	/**
	 * 每次查询十条数据
	 *
	 * @param $page
	 *
	 * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
	 */
		public static function get_all_per($page){
    	return DB::table('positioninfo') -> paginate($page);
		}

	/**
	 *
	 * 查看指定信息
	 *
	 * @param $posi_id
	 *
	 * @return Model|\Illuminate\Database\Query\Builder|object|null
	 */
		public static function get_d_position($posi_id){
			return DB::table('positioninfo') -> where('posi_id','=',$posi_id) -> first();
		}

	/**
	 *
	 * 更新数据
	 *
	 * @param $posi_id
	 * @param $data
	 *
	 * @return int
	 */
		public static function update_d_position($posi_id,$data){
			return DB::table('positioninfo') -> where('posi_id','=',$posi_id) -> update($data);
		}

	/**
	 *
	 * 删除数据库信息
	 *
	 * @param $posi_id
	 *
	 * @return int
	 */
		public static function delete_d_position($posi_id){
			return DB::table('positioninfo') -> where('posi_id','=',$posi_id) -> delete();
		}


	/**
	 *
	 * 多选删除
	 *
	 * @param $posi_id
	 *
	 * @return int
	 */
		public static function delete_all_position($posi_id){
			return DB::table('positioninfo') -> whereIn('posi_id',$posi_id) -> delete();
		}

}
