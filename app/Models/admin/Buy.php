<?php

	namespace App\Models\admin;


	use Illuminate\Database\Eloquent\Model;
	use Illuminate\Support\Facades\DB;


	class Buy extends Model {

		//查询所有客户信息
		public static function get_cus()
		{
			return DB::table( 'customer' ) -> where('is_show','=',1)->get();
		}


		//根据id查询客户信息
		public static function get_cust_d( $cust_id )
		{
			return DB::table( 'customer' )
							 ->select( 'realname' , 'idcard' , 'mobile' )
							 ->where( 'cust_id' , '=' , $cust_id )
							 ->get();
		}


		//查询所有楼号
		public static function fieid()
		{
			return DB::table( 'fieldinfo' )->where( 'parent_field_id' , '=' , 1 )
							 ->get();
		}

		//根据单元号查询去homeinfo查询status=1的房子
		public static function get_homeinfo( $unitnum )
		{
			return DB::table( 'homeinfo' )
							 ->select( 'homeinfo.*' , 'fieldinfob.name as buildnums' , 'fieldinfou.name as unitnums' , 'fieldinfor.name as roomnums' )
							 ->leftJoin( 'fieldinfo as fieldinfob' , 'homeinfo.buildnum' , '=' , 'fieldinfob.field_id' )
							 ->leftJoin( 'fieldinfo as fieldinfou' , 'homeinfo.unitnum' , '=' , 'fieldinfou.field_id' )
							 ->leftJoin( 'fieldinfo as fieldinfor' , 'homeinfo.roomnum' , '=' , 'fieldinfor.field_id' )
							 ->where( 'homeinfo.status' , '=' , 0 )
							 ->where( 'homeinfo.unitnum' , '=' , $unitnum )
							 ->get();
		}

		//根据房子id查询房子信息详情
		public static function get_homeinfo_view($field_id){
			return DB::table( 'homeinfo' )
							 ->select( 'homeinfo.*' , 'fieldinfob.name as buildnums' , 'fieldinfou.name as unitnums' , 'fieldinfor.name as roomnums' )
							 ->leftJoin( 'fieldinfo as fieldinfob' , 'homeinfo.buildnum' , '=' , 'fieldinfob.field_id' )
							 ->leftJoin( 'fieldinfo as fieldinfou' , 'homeinfo.unitnum' , '=' , 'fieldinfou.field_id' )
							 ->leftJoin( 'fieldinfo as fieldinfor' , 'homeinfo.roomnum' , '=' , 'fieldinfor.field_id' )
							 ->where( 'homeinfo.status' , '=' , 0 )
							 ->where( 'homeinfo.homeid' , '=' , $field_id )
							 ->get();
		}

		//修改用户信息
		public static function update_d_customer($cust_id,$cust){
			return DB::table('customer') -> where('cust_id','=',$cust_id) -> update($cust);
		}

		//添加认购信息
		public static function store_buy($buy){
			return DB::table('buyinfo') -> insertGetId($buy);
		}

		//更新认购编号
		public static function update_buy_number($store_buy,$buyu){
			return DB::table('buyinfo') -> where('buyid','=',$store_buy) -> update($buyu);
		}


		//添加房屋共有人
		public static function store_coowner($coowner){
			return DB::table('coownerinfo') -> insert($coowner);
		}

		//查看房子状态是否合法
		public static function get_d_home($homeid){
			return DB::table('homeinfo') -> select('status') -> where('homeid','=',$homeid) -> first();
		}

		//更改房子状态
		public static function update_status_home($homeid,$hstatus){
			return DB::table('homeinfo') -> where('homeid','=',$homeid) -> update($hstatus);
		}


		//查询认购信息
		public static function get_all_buy($name,$iphone,$page){
			return DB::table('buyinfo')
							 ->select('buyinfo.*','customer.realname','homeinfo.buildnum','homeinfo.unitnum','homeinfo.status as home_status','homeinfo.roomnum','fieldinfob.name as buildnums','fieldinfou.name as unitnums','fieldinfor.name as roomnums')
							 -> leftJoin('customer','buyinfo.cust_id','=','customer.cust_id')
								-> leftJoin('homeinfo','buyinfo.homeid','=','homeinfo.homeid')
				-> leftJoin('fieldinfo as fieldinfob','homeinfo.buildnum','=','fieldinfob.field_id')
				-> leftJoin('fieldinfo as fieldinfou','homeinfo.unitnum','=','fieldinfou.field_id')
				-> leftJoin('fieldinfo as fieldinfor','homeinfo.roomnum','=','fieldinfor.field_id')
				-> where('buyinfo.status','!=',0)
				->where( function( $query ) use ( $name ) {
					if ( $name ) {

						$a = DB::table('customer')-> select('cust_id') -> where('realname','like','%'.$name.'%') -> get() -> map(function($value){return (array)$value;}) -> toArray();

						$query->whereIn( 'buyinfo.cust_id', $a );
					}
				} )
				->where( function( $query ) use ( $iphone ) {
					if ( $iphone ) {
						$c = DB::table('customer')-> select('cust_id') -> where('mobile','like','%'.$iphone.'%') -> get() -> map(function($value){return (array)$value;}) -> toArray();
						$query->whereIn( 'buyinfo.cust_id' , $c );
					}
				} )

				-> paginate($page);
		}

		//查询楼号下所对应的单元号
		public static function get_all_filed($buildnum){
			return DB::table('fieldinfo') -> where('parent_field_id','=',$buildnum) -> first();
		}



		//查询单挑认购信息
		public static function get_d_buy($buyid){
			return DB::table('buyinfo')
							 ->select('buyinfo.*','customer.realname','customer.mobile','customer.idcard','homeinfo.buildnum','homeinfo.unitnum','homeinfo.roomnum','homeinfo.total','homeinfo.discount','fieldinfob.name as buildnums','fieldinfou.name as unitnums','fieldinfor.name as roomnums')
							 -> leftJoin('customer','buyinfo.cust_id','=','customer.cust_id')
							 -> leftJoin('homeinfo','buyinfo.homeid','=','homeinfo.homeid')
							 -> leftJoin('fieldinfo as fieldinfob','homeinfo.buildnum','=','fieldinfob.field_id')
							 -> leftJoin('fieldinfo as fieldinfou','homeinfo.unitnum','=','fieldinfou.field_id')
							 -> leftJoin('fieldinfo as fieldinfor','homeinfo.roomnum','=','fieldinfor.field_id')
								-> where('buyinfo.buyid','=',$buyid)
							 -> first();
		}

		//更新认购信息
		public static function update_buy($buyid,$buy){
			return DB::table('buyinfo') -> where('buyid','=',$buyid) -> update($buy);
		}


		//查询认购信息详情
		public static function get_d_buy_cg($buyid){
			$data =DB::table('buyinfo')
											 ->select('buyinfo.*','customer.realname','customer.mobile','customer.idcard','homeinfo.buildnum','homeinfo.unitnum','homeinfo.floor','homeinfo.roomnum','homeinfo.total','homeinfo.discount','fieldinfob.name as buildnums','fieldinfou.name as unitnums','fieldinfor.name as roomnums')
											 -> leftJoin('customer','buyinfo.cust_id','=','customer.cust_id')
											 -> leftJoin('homeinfo','buyinfo.homeid','=','homeinfo.homeid')
											 -> leftJoin('fieldinfo as fieldinfob','homeinfo.buildnum','=','fieldinfob.field_id')
											 -> leftJoin('fieldinfo as fieldinfou','homeinfo.unitnum','=','fieldinfou.field_id')
											 -> leftJoin('fieldinfo as fieldinfor','homeinfo.roomnum','=','fieldinfor.field_id')
											 -> where('buyinfo.buyid','=',$buyid)
											 -> first();

			$data -> coownerinfo = DB::table('coownerinfo') -> where('cust_id','=',$data -> cust_id) -> get();
			return $data;
		}


		//删除认购信息
		public static function delete_buy($buyid){
			return DB::table('buyinfo') -> where('buyid','=',$buyid) -> update(
				array('status' => 0)
			);
		}

		//更改状态
		public static function update_status($buyid){
			return DB::table('buyinfo') -> where('buyid','=',$buyid) -> update(array('status' => 3));
		}

		//换房
		public static function home_huan($homeid){
			return DB::table('homeinfo') -> where('homeid','=',$homeid) -> update(array('status' => 0));
		}

		//更新房子状态
		public static function update_home_statuss($homeid){
			return DB::table('homeinfo') -> where('homeid','=',$homeid) -> update(array('status' => 2));

		}

		//经理审核
		public static function update_review($buyid,$data){
			return DB::table('buyinfo') -> where('buyid','=',$buyid) -> update($data);
		}

		//经理不通过审核时更改房子状态
		public static function update_home_status($home){
			return DB::table('homeinfo') -> where('homeid','=',$home) -> update(
				array('status' => 0)
			);
		}

		//查询客户信息
		public static function get_d_cus($cust_id){
			return DB::table('customer')
							 -> select('customer.cust_id','customer.realname','customer.mobile','customer.idcard')
								-> where('cust_id','=',$cust_id)
							-> first();
		}



		//查询客户身份证是否重复
		public static function get_cust_idcard($cust_id,$idcard){
			return DB::table('customer')
							 -> where('cust_id','!=',$cust_id)
							 ->where('idcard','=',$idcard) -> count();
		}

		//多选删除认购信息
		public static function update_buyinfo($buy_id){
			return DB::table('buyinfo') -> whereIn('buyid',$buy_id) -> update(
				array('status' => 0)
			);
		}



	}
