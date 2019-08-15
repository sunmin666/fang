<?php

	namespace App\Models\admin;


	use Illuminate\Database\Eloquent\Model;
	use Illuminate\Support\Facades\DB;
	use Illuminate\Support\Facades\Session;


	class Projectss extends Model {

		/**
		 *
		 * 查询使用者添加的公司
		 *
		 * @return \Illuminate\Support\Collection
		 */
		public static function get_all_company()
		{
			$people_id = Session::get( 'session_member.id' );
			if(Session::get( 'session_member.status' )  == 2){
				return DB::table( 'company' )->get();
			}elseif(Session::get( 'session_member.status' )  == 1){
				return DB::table( 'company' )->where( 'people' , '=' , $people_id )
								 ->get();
			}
		}

		/**
		 *
		 * 添加项目
		 *
		 * @param $data
		 *
		 * @return bool
		 */

		public static function store_projectinfo( $data )
		{
			return DB::table( 'projectinfo' )->insert( $data );
		}



		/**
		 *
		 * 查询项目信息
		 *
		 * @param $page
		 *
		 * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
		 */
		public static function get_add_project( $page )
		{
			$status = Session::get( 'session_member.status' );
			$people_id = Session::get( 'session_member.id' );

			if ( $status == 2 ) {
				return DB::table( 'projectinfo' )
								 ->select( 'projectinfo.*' , 'company.comp_cname' )
								 ->orderBy( 'updated_at' , 'desc' )
								 ->leftJoin( 'company' , 'projectinfo.comp_id' , '=' , 'company.comp_id' )
								 ->paginate( $page );
			} elseif ( $status == 1 ) {
				return DB::table( 'projectinfo' )
								 ->select( 'projectinfo.*' , 'company.comp_cname' )
								 ->orderBy( 'updated_at' , 'desc' )
								 ->leftJoin( 'company' , 'projectinfo.comp_id' , '=' , 'company.comp_id' )
					       ->where( 'projectinfo.comp_id' , '=' , 2 )
								 ->paginate( $page );
			}
		}

		/**
		 *
		 * 查询单挑数据信息
		 *
		 * @param $project_id
		 *
		 * @return Model|\Illuminate\Database\Query\Builder|object|null
		 */
		public static function get_d_project($project_id){
			return DB::table('projectinfo') -> where('project_id','=',$project_id) -> first();
		}


		/**
		 * 修改该项目id
		 *
		 * @param $project_id
		 * @param $data
		 *
		 * @return int
		 */
		public static function update_d_project($project_id ,$data){
			return DB::table('projectinfo') -> where('project_id','=',$project_id) ->update($data);
		}

		/**
		 *
		 * 删除数据项目
		 *
		 * @param $project_id
		 *
		 * @return int
		 */
		public static function delete_d_project($project_id){
			return DB::table('projectinfo') -> where('project_id','=',$project_id) -> delete();
		}


		/**
		 *
		 * 多选删除项目
		 *
		 * @param $project_all_id
		 *
		 * @return int
		 */
		public static function delete_all_project($project_all_id){
			return DB::table('projectinfo') -> whereIn('project_id',$project_all_id) -> delete();
		}

	}
