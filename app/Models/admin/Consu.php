<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class Consu extends Model
{

//	/**
//	 * 查询当前登陆者下面的公司
//	 *
//	 * @return Model|\Illuminate\Database\Query\Builder|object|null
//	 */
//		public static function get_d_company(){
//			$people = Session::get('session_member.id');
//			$status = Session('session_member.status');
//			if($status == 1){
//				return DB::table('company') ->  where('status','=',1)  -> get();
//
//			}elseif($status == 2){
//				return DB::table('company') ->  where('status','=',1) -> get();
//			}
//		}


	/**
	 * 查询当前登陆者下面的项目
	 *
	 * @return \Illuminate\Support\Collection
	 */
		public static function get_poje(){
			return DB::table('projectinfo') -> where('comp_id','=',1) -> get();
		}

	/**
	 *
	 * 查询角色信息
	 *
	 * @return \Illuminate\Support\Collection
	 */
		public static function get_all_role(){
			return DB::table('user_roleinfo') -> get();
		}


	/**
	 * 权限
	 *
	 * @return \Illuminate\Support\Collection
	 */
		public static function get_permin(){
			return DB::table('user_permissioninfo') -> get();
		}


		//查询顾问折扣
	public static function get_enjoy(){
			return DB::table('hous_enjoy') -> get();
	}


	/**
	 * 添加职业顾问信息
	 *
	 * @param $data
	 *
	 * @return bool
	 */
		public static function store_consu($data){
			return DB::table('houserinfo') -> insertGetId($data);
		}

		//添加到关系表
		public static function store_user($data1){
			return DB::table('user_relationinfo') -> insert($data1);
		}

	/**
	 * 查询数据
	 *
	 * @param $page
	 * @param $people
	 *
	 * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator|\Illuminate\Database\Query\Builder
	 */
		public static function get_all_consu($role,$name,$iphone,$page){

				return DB::table('houserinfo')
					-> select('houserinfo.*','projectinfo.pro_cname','user_relationinfo.posi_id','user_relationinfo.role_id','user_relationinfo.perm_id','user_roleinfo.role_name','user_positioninfo.posi_name','user_permissioninfo.perm_name','hous_enjoy.enjoy as enjoys')
					-> orderByDesc('hous_id')
					-> leftJoin('user_relationinfo','houserinfo.hous_id','=','user_relationinfo.memberid')
					-> leftJoin('user_roleinfo','user_relationinfo.role_id','=','user_roleinfo.role_id')
					-> leftJoin('user_positioninfo','user_relationinfo.posi_id','=','user_positioninfo.posi_id')
					-> leftJoin('user_permissioninfo','user_relationinfo.perm_id','=','user_permissioninfo.perm_id')
					-> leftJoin('projectinfo','houserinfo.proj_id','=','projectinfo.project_id')
					-> leftJoin('hous_enjoy','houserinfo.enjoy','=','hous_enjoy.enjoy_id')
					-> where(function($query) use ($role){
						if($role){
							 $a = DB::table('user_relationinfo')-> select('memberid') -> where('role_id','=',$role) -> get() -> map(function($value){ return (array)$value; }) -> toArray();
							$query -> whereIn('hous_id',$a);
						}
					})
					-> where(function($query) use ($name){
						if($name){
							$query -> where('name','like','%'.$name.'%');
						}
					})
					-> where(function($query) use ($iphone){
						if($iphone){
							$query -> where('mobile','like','%'.$iphone.'%');
						}
					})
					-> paginate($page);
//
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
			return DB::table('houserinfo')
				->select('houserinfo.*','user_relationinfo.role_id','user_relationinfo.perm_id')
				-> leftJoin('user_relationinfo','houserinfo.hous_id','=','user_relationinfo.memberid')
				-> where('houserinfo.hous_id','=',$hous_id)
				-> first()
				;
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
		//修改关系数据库
		public static function update_d_user($hous_id,$data1){
			return DB::table('user_relationinfo') -> where('memberid','=',$hous_id) -> update($data1);
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
				-> select('houserinfo.*','projectinfo.pro_cname','user_relationinfo.posi_id','user_relationinfo.role_id','user_relationinfo.perm_id','user_roleinfo.role_name','user_positioninfo.posi_name','user_permissioninfo.perm_name','hous_enjoy.enjoy as enjoys')
				-> orderByDesc('hous_id')
				-> leftJoin('user_relationinfo','houserinfo.hous_id','=','user_relationinfo.memberid')
				-> leftJoin('user_roleinfo','user_relationinfo.role_id','=','user_roleinfo.role_id')
				-> leftJoin('user_positioninfo','user_relationinfo.posi_id','=','user_positioninfo.posi_id')
				-> leftJoin('user_permissioninfo','user_relationinfo.perm_id','=','user_permissioninfo.perm_id')
				-> leftJoin('projectinfo','houserinfo.proj_id','=','projectinfo.project_id')
				-> leftJoin('hous_enjoy','houserinfo.enjoy','=','hous_enjoy.enjoy_id')
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

		//删除关系表中的数据
	public static function delete_user($hous_id){
			return DB::table('user_relationinfo') -> where('memberid','=',$hous_id) -> delete();
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

		public static function delete_all_user($hous_id){
			return DB::table('user_relationinfo') -> whereIn('memberid',$hous_id) -> delete();
		}


//	/**
//	 * 查询项目添加人
//	 *
//	 * @param $comp_id
//	 *
//	 * @return Model|\Illuminate\Database\Query\Builder|object|null
//	 */
//		public static function get_company_people($comp_id){
//			return DB::table('company') -> select('people') -> where('comp_id','=',$comp_id) -> first();
//		}




		//------------------------------------顾问折扣信息--------------------------------------------------//

	//添加折扣信息
	public static function store_enjoy($data){
			return DB::table('hous_enjoy') -> insert($data);
	}

	//查询折扣信息
	public static function get_all_enjoy($page){
			return DB::table('hous_enjoy') -> paginate($page);
	}


	//查询单挑折扣信息
	public static function get_d_enjoy($enjoy_id){
			return DB::table('hous_enjoy') -> where('enjoy_id','=',$enjoy_id) ->first();
	}


	//修改顾问折扣
	public static function update_d_enjoy($enjoy_id,$data){
			return DB::table('hous_enjoy') -> where('enjoy_id','=',$enjoy_id) -> update($data);
	}

	//删除折扣信息
	public static function delete_d_enjoy($enjoy_id){
			return DB::table('hous_enjoy') -> where('enjoy_id','=',$enjoy_id) -> delete();
	}



}
