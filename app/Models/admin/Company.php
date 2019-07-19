<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class Company extends Model
{

	/**
	 * 注册公司信息
	 *
	 * @param $data
	 *
	 * @return bool
	 */
	public static function store_company($data){
		return DB::table('company') -> insert($data);
	}


	/**
	 *
	 * 查询company数据表数据
	 *
	 * @param $page
	 *
	 * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
	 */
	public static function get_all_company($page,$people){
		$status = Session::get('session_member.status');

		if($status == 2){
			return DB::table('company') -> paginate($page);
		}elseif($status == 1){
			return DB::table('company') -> where('people','=',$people) -> paginate($page);
		}
	}


	/**
	 *
	 * 查询company表单挑数据
	 *
	 * @param $comp_id
	 *
	 * @return Model|\Illuminate\Database\Query\Builder|object|null
	 */
	public static function get_d_company($comp_id){
		return DB::table('company') -> where('comp_id','=',$comp_id) -> first();
	}

	/**
	 * 更新company数据表中的数据
	 *
	 * @param $comp_id
	 * @param $data
	 *
	 * @return int
	 */

	public static function update_d_company($comp_id,$data){
		return DB::table('company') -> where('comp_id','=',$comp_id) -> update($data);
	}


	/**
	 *
	 * 删除公司信息表数据
	 *
	 * @param $comp_id
	 *
	 * @return int
	 */
	public static function delete_d_company($comp_id){
		return DB::table('company') -> where('comp_id','=',$comp_id) -> delete();
	}


	/**
	 *
	 * 公司信息多选删除
	 *
	 * @param $comp_id
	 *
	 * @return int
	 */
	public static function delete_all_company($comp_id){
		return DB::table('company') -> whereIn('comp_id',$comp_id) -> delete();
	}



	/**
	 *
	 * 修改公司信息状态
	 * @param $comp_id
	 * @param $data
	 *
	 * @return int
	 */

	public static function update_d_status($comp_id,$data){
		return DB::table('company') -> where('comp_id','=',$comp_id) -> update($data);
	}

}
