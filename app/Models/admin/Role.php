<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;


class Role extends Model
{

	/**
	 *
	 * 添加新本角色数据
	 *
	 * @param $data
	 *
	 * @return bool
	 */
    public static function store_d_role($data){
    	$status = Session::get('session_member.status');

    	if($status == 1){
				return DB::table('user_roleinfo') -> insert($data);
			}else{
				return DB::table('roleinfo') -> insert($data);
			}


		}


	/**
	 *
	 * 查询新本角色数据
	 *
	 * @param $page
	 *
	 * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
	 */
		public static function get_all_role($page){
			$status = Session::get('session_member.status');
			if($status == 1){
				return DB::table('user_roleinfo') -> orderByDesc('created_at') -> paginate($page);
			}else{
				return DB::table('roleinfo') -> orderByDesc('created_at')-> paginate($page);
			}


		}


	/**
	 *
	 * 根据数据id查询指定的数据
	 *
	 * @param $role_id
	 *
	 * @return Model|\Illuminate\Database\Query\Builder|object|null
	 */
		public static function get_d_roleinfo($role_id){
			$status = Session::get('session_member.status');
			if($status == 1){
				return DB::table('user_roleinfo') -> where('role_id','=',$role_id) -> first();
			}else{
				return DB::table('roleinfo') -> where('role_id','=',$role_id) -> first();
			}

		}

	/**
	 *
	 * 更新指定的数据
	 *
	 * @param $role_id
	 * @param $data
	 *
	 * @return int
	 */
		public static function update_d_role($role_id,$data){
			$status = Session::get('session_member.status');
			if($status == 1){
				return DB::table('user_roleinfo') -> where('role_id','=',$role_id) -> update($data);
			}else{
				return DB::table('roleinfo') -> where('role_id','=',$role_id) -> update($data);
			}

		}

	/**
	 *
	 * 删除角色信息
	 *
	 * @param $role_id
	 *
	 * @return int
	 */
		public static function delete_d_role($role_id){
			$status = Session::get('session_member.status');
			if($status == 1){
				return DB::table('user_roleinfo') -> where('role_id','=',$role_id) -> delete();
			}else{
				return DB::table('roleinfo') -> where('role_id','=',$role_id) -> delete();
			}


		}


		public static function delete_all_role($role_id){
			$status = Session::get('session_member.status');
			if($status == 1){
				return DB::table('user_roleinfo') -> whereIn('role_id',$role_id) -> delete();
			}else{
				return DB::table('roleinfo') -> whereIn('role_id',$role_id) -> delete();
			}

		}

}
