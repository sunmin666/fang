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
			return DB::table('customer')->where( 'customer.cust_id' , '=' , $cust_id )->first(  );
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

		//查询所有客户认知渠道
		public static function get_cognition_all()
		{
			return DB::table('fieldinfo')  -> where('parent_field_id','=','28') -> get();
		}

		//查询所有家庭结构
		public static function get_family_str_all()
		{
			return DB::table('fieldinfo')  -> where('parent_field_id','=','51') -> get();
		}

		//查询所有工作类型
		public static function get_work_type_all()
		{
			return DB::table('fieldinfo')  -> where('parent_field_id','=','58') -> get();
		}

		//查询所有意向面积
		public static function get_intention_area_all()
		{
			return DB::table('fieldinfo')  -> where('parent_field_id','=','63') -> get();
		}

		//查询所有楼层偏好
		public static function get_floor_like_all()
		{
			return DB::table('fieldinfo')  -> where('parent_field_id','=','69') -> get();
		}

		//查询所有家具
		public static function get_furniture_need_all()
		{
			return DB::table('fieldinfo')  -> where('parent_field_id','=','73') -> get();
		}

		//查询所有置业此数
		public static function get_house_num_all()
		{
			return DB::table('fieldinfo')  -> where('parent_field_id','=','77') -> get();
		}

		//查询所有首次接触方式
		public static function get_first_contact_all()
		{
			return DB::table('fieldinfo')  -> where('parent_field_id','=','82') -> get();
		}

		//查询所有客户状态
		public static function get_status_id_all()
		{
			return DB::table('fieldinfo')  -> where('parent_field_id','=','86') -> get();
		}

		//查询所有的职业顾问
		public static function get_hous_id_all()
		{
			return DB::table('houserinfo')  -> where('is_ipad','=','2') -> get();
		}
	}
