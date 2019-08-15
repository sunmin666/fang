<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;


class Per extends Model
{

	/**
	 * 添加权限到数据库
	 *
	 * @param $data
	 *
	 * @return bool
	 */
    public static function store_per($data){
    	return DB::table('perm') -> insert($data);
		}

	/**
	 *
	 * 查询权限表的数据
	 *
	 * @param $page
	 *
	 * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
	 */
		public static function get_all_per($page){
    	$data = DB::table('perm') -> orderBy('created_at','desc') -> where('p_superior','=',0) -> paginate($page);
			foreach ($data as $k => $v){
				$data[$k] -> xsuperior = DB::table('perm') -> where('p_superior','=',$v -> perid) -> get();
			}
			return $data;
		}

	/**
	 *
	 * 查询权限数据信息
	 *
	 * @param $perid
	 *
	 * @return Model|\Illuminate\Database\Query\Builder|object|null
	 */
		public static function get_d_perm($perid){
			return DB::table('perm') -> where('perid','=',$perid) -> first();
		}


	/**
	 *
	 * 更新权限数据库信息
	 *
	 * @param $perid
	 * @param $data
	 *
	 * @return int
	 */
		public static function update_d_perm($perid,$data){
			return DB::table('perm') -> where('perid','=',$perid) -> update($data);
		}

	/**
	 *
	 * 删除权限信息
	 *
	 * @param $perid
	 *
	 * @return int
	 */
		public static function delete_d_perm($perid){
			return DB::table('perm') -> where('perid','=',$perid) -> delete();
		}

	/**
	 * 删除时查询该菜单下有无子类
	 *
	 * @param $perid
	 *
	 * @return Model|\Illuminate\Database\Query\Builder|object|null
	 */
		public static function get_d_perm_z($perid){
			return DB::table('perm') -> where('p_superior','=',$perid) -> first();
		}


	/**
	 *
	 * 删除多条权限信息
	 *
	 * @param $per_id
	 *
	 * @return int
	 */
		public static function delete_all_perm($per_id){
			return DB::table('perm') -> whereIn('perid',$per_id) -> delete();
		}

	/**
	 *
	 * 查询所有的父级菜单
	 *
	 * @return \Illuminate\Support\Collection
	 */
		public static function get_status(){
			return DB::table('perm') -> where('p_superior','=',0) -> get();
		}

	/**
	 *
	 * 查询所有的菜单
	 *
	 * @return \Illuminate\Support\Collection
	 */
		public static function get_all_pers(){

			$status = Session::get('session_member.status');

			if($status == 1){
				$data = DB::table('perm') -> orderBy('created_at','desc') -> where('status','=',1) -> where('p_superior','=',0) -> get();
				foreach ($data as $k => $v){
					$data[$k] -> xsuperior = DB::table('perm') -> where('status','=',1) -> where('p_superior','=',$v -> perid) -> get();
				}
				return $data;
			}else{
				$data = DB::table('perm') -> orderBy('created_at','desc') -> where('p_superior','=',0) -> get();
				foreach ($data as $k => $v){
					$data[$k] -> xsuperior = DB::table('perm') -> where('p_superior','=',$v -> perid) -> get();
				}
				return $data;
			}


		}



	/**
	 *
	 * 更改状态
	 *
	 * @param $per_id
	 * @param $data
	 *
	 * @return int
	 */
		public static function update_status($per_id,$data){
			return DB::table('perm') -> where('perid','=',$per_id) -> update($data);
		}
}
