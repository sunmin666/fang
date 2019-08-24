<?php

	namespace App\Models\admin;


	use Illuminate\Database\Eloquent\Model;
	use Illuminate\Support\Facades\DB;
	use Illuminate\Support\Facades\Session;


	class Customer extends Model {

		/**
		 * 添加客户信息
		 *
		 * @param $data
		 *
		 * @return bool
		 */
		public static function store_d_customer( $data )
		{
			return DB::table( 'customer' )->insert( $data );
		}


		public static function get_all_pro(){
			return DB::table('projectinfo')  -> where('ppeople','=',1) -> get();
		}

		/**
		 *
		 * 查询客户资料信息
		 *
		 * @param $page
		 *
		 * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
		 */
		public static function get_all_omer( $page )
		{
			$status = Session::get( 'session_member.status' );
			$id = Session::get('session_member.id');
			if ( $status == 1 ) {
				return DB::table( 'customer' )
								 ->select( 'customer.*' , 'company.comp_cname' , 'projectinfo.pro_cname' )
								 ->leftJoin( 'company' , 'customer.comp_id' , '=' , 'company.comp_id' )
								 ->leftJoin( 'projectinfo' , 'customer.proj_id' , '=' , 'projectinfo.project_id' )
//								 ->where( 'customer.hous_id' , '=' , Session::get( 'session_member.id' ) )
									-> where('is_show','=',1)
								 ->paginate( $page );
			} else if($status == 2){
				if($id == 1){
					return DB::table( 'customer' )
									 ->select( 'customer.*' , 'company.comp_cname' , 'projectinfo.pro_cname' )
									 ->leftJoin( 'company' , 'customer.comp_id' , '=' , 'company.comp_id' )
									 ->leftJoin( 'projectinfo' , 'customer.proj_id' , '=' , 'projectinfo.project_id' )
									 ->paginate( $page );
				}else{
					return DB::table( 'customer' )
									 ->select( 'customer.*' , 'company.comp_cname' , 'projectinfo.pro_cname' )
									 ->leftJoin( 'company' , 'customer.comp_id' , '=' , 'company.comp_id' )
									 ->leftJoin( 'projectinfo' , 'customer.proj_id' , '=' , 'projectinfo.project_id' )
						       -> where('is_show','=',1)
									 ->paginate( $page );
				}
			}
		}

		/**
		 *
		 * 查询单条用户资料信息
		 *
		 * @param $cust_id
		 *
		 * @return Model|\Illuminate\Database\Query\Builder|object|null
		 */
		public static function get_d_omer($cust_id){
			return DB::table('customer')
				->select( 'customer.*' , 'company.comp_cname' , 'projectinfo.pro_cname' )
				->leftJoin( 'company' , 'customer.comp_id' , '=' , 'company.comp_id' )
				->leftJoin( 'projectinfo' , 'customer.proj_id' , '=' , 'projectinfo.project_id' )
				->where( 'customer.cust_id' , '=' , $cust_id )
				->first(  );
		}

		/**
		 *
		 * 更新用户资料信息
		 *
		 * @param $cust_id
		 * @param $data
		 *
		 * @return int
		 */
		public static function update_d_omer($cust_id,$data){
			return DB::table('customer') -> where('cust_id','=',$cust_id) ->update($data);
		}


		/**
		 *
		 * 更改用户状态
		 *
		 * @param $cust_id
		 * @param $data
		 *
		 * @return int
		 */
		public static function delete_d_omer($cust_id,$data){
			return DB::table('customer') -> where('cust_id','=',$cust_id) -> update($data);
		}

	}
