<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class Consu extends Model
{

	/**
	 * 查询当前登陆者下面的公司
	 *
	 * @return Model|\Illuminate\Database\Query\Builder|object|null
	 */
		public static function get_d_company(){
			$people = Session::get('session_member.id');

			$status = Session('session_member.status');
			if($status == 1){
				return DB::table('company') ->  where('status','=',1)  -> get();

			}elseif($status == 2){
				return DB::table('company') ->  where('status','=',1) -> get();
			}
		}


	/**
	 * 查询当前登陆者下面的项目
	 *
	 * @return \Illuminate\Support\Collection
	 */
		public static function get_company($comp_id){
			return DB::table('projectinfo') -> where('comp_id','=',$comp_id) -> get();
		}


	/**
	 * 添加职业顾问信息
	 *
	 * @param $data
	 *
	 * @return bool
	 */
		public static function store_consu($data){
			return DB::table('houserinfo') -> insert($data);
		}

	/**
	 * 查询数据
	 *
	 * @param $page
	 * @param $people
	 *
	 * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator|\Illuminate\Database\Query\Builder
	 */
		public static function get_all_consu($page){
			$status = Session::get('session_member.status');

			if($status == 1){
				return DB::table('houserinfo')
					-> select('houserinfo.*','projectinfo.pro_cname','company.comp_cname')
					-> orderByDesc('hous_id')
					-> leftJoin('projectinfo','houserinfo.proj_id','=','projectinfo.project_id')
					-> leftJoin('company','houserinfo.comp_id','=','company.comp_id')
					-> where('houserinfo.tina','=',Session::get('session_member.id'))
					-> paginate($page);
			}elseif($status == 2){
				return DB::table('houserinfo')
								 -> select('houserinfo.*','projectinfo.pro_cname','company.comp_cname')
								 -> orderByDesc('hous_id')
								 -> leftJoin('projectinfo','houserinfo.proj_id','=','projectinfo.project_id')
								 -> leftJoin('company','houserinfo.comp_id','=','company.comp_id')
								  ->paginate($page);
			}
		}


	/**
	 *
	 * 查询单挑数据
	 *
	 * @param $hous_id
	 *
	 * @return Model|\Illuminate\Database\Query\Builder|object|null
	 */
		public static function get_d_hous($hous_id){
			return DB::table('houserinfo') -> where('hous_id','=',$hous_id) -> first();
		}

	/**
	 * 修改职业顾问数据
	 *
	 * @param $hous_id
	 * @param $data
	 *
	 * @return int
	 */
		public static function update_d_hous($hous_id,$data){
			return DB::table('houserinfo') -> where('hous_id','=',$hous_id) -> update($data);
		}

	/**
	 * 修改状态
	 *
	 * @param $hous_id
	 * @param $data
	 *
	 * @return int
	 */
		public static function update_d_status($hous_id,$data){
			return DB::table('houserinfo') -> where('hous_id','=',$hous_id) -> update($data);
		}

	/**
	 * 查看职业顾问详情
	 *
	 * @param $hous_id
	 *
	 * @return Model|\Illuminate\Database\Query\Builder|object|null
	 */
		public static function get_dd_hous($hous_id){
			return DB::table('houserinfo')
							 -> select('houserinfo.*','projectinfo.pro_cname','company.comp_cname')
							 -> orderByDesc('hous_id')
							 -> leftJoin('projectinfo','houserinfo.proj_id','=','projectinfo.project_id')
							 -> leftJoin('company','houserinfo.comp_id','=','company.comp_id')
							 -> where('houserinfo.hous_id','=',$hous_id)
							 -> first();
		}

	/**
	 * 删除职业顾问信息
	 *
	 * @param $hous_id
	 *
	 * @return int
	 */
		public static function delete_d_hous($hous_id){
			return DB::table('houserinfo') -> where('hous_id','=',$hous_id) -> delete();
		}

	/**
	 * 删除多个信息
	 *
	 * @param $hous_id
	 *
	 * @return int
	 */
		public static function delete_all_hous($hous_id){
			return DB::table('houserinfo') -> whereIn('hous_id',$hous_id) -> delete();
		}

	/**
	 * 查询项目添加人
	 *
	 * @param $comp_id
	 *
	 * @return Model|\Illuminate\Database\Query\Builder|object|null
	 */
		public static function get_company_people($comp_id){
			return DB::table('company') -> select('people') -> where('comp_id','=',$comp_id) -> first();
		}
}
