<?php

	namespace App\Models\admin;


	use Illuminate\Database\Eloquent\Model;
	use Illuminate\Support\Facades\DB;


	class Change extends Model {

		//查询认购信息以及客户信息
		public static function get_d_buy_home( $buyid )
		{
			return DB::table( 'buyinfo' )
							 ->select( 'buyinfo.*' , 'customer.realname' , 'customer.mobile' , 'customer.idcard' )
							 ->leftJoin( 'customer' , 'buyinfo.cust_id' , '=' , 'customer.cust_id' )
							 ->where( 'buyinfo.buyid' , '=' , $buyid )->first();
		}

		//查询客户所购买的房子信息
		public static function get_home_d( $homeid )
		{
			return DB::table( 'homeinfo' )
							 ->select( 'homeinfo.*' , 'fieldinfob.name as buildnums' , 'fieldinfou.name as unitnums' , 'fieldinfor.name as roomnums' )
							 ->leftJoin( 'fieldinfo as fieldinfob' , 'homeinfo.buildnum' , '=' , 'fieldinfob.field_id' )
							 ->leftJoin( 'fieldinfo as fieldinfou' , 'homeinfo.unitnum' , '=' , 'fieldinfou.field_id' )
							 ->leftJoin( 'fieldinfo as fieldinfor' , 'homeinfo.roomnum' , '=' , 'fieldinfor.field_id' )
							 ->where( 'homeinfo.homeid' , '=' , $homeid )
							 ->first();
		}


		//查询所有的楼号信息

		public static function get_all_buildnum()
		{
			return DB::table( 'fieldinfo' )->where( 'parent_field_id' , '=' , 1 )
							 ->get();
		}


		//新增到数据库
		public static function store_changinfo( $data )
		{
			return DB::table( 'changeinfo' )->insert( $data );
		}

		//更改新房子的状态
		public static function update_home($home_id){
			return DB::table('homeinfo') -> where('homeid','=',$home_id) -> update(
				array('status' => 1)
			);
		}

		//查询所有换房信息
		public static function get_all_change( $page )
		{
			return DB::table( 'changeinfo' )
							 ->select( 'changeinfo.*' ,
								 'customer.realname' , 'customer.mobile' , 'customer.idcard' ,
								 'old_homeinfo.buildnum as old_buildnum' , 'old_homeinfo.unitnum as old_unitnum' , 'old_homeinfo.roomnum as old_roomnum' ,
								 'new_homeinfo.buildnum as new_buildnum' , 'new_homeinfo.unitnum as new_unitnum' , 'new_homeinfo.roomnum as new_roomnum' ,
								 'fieldinfob_old.name as buildnum_old' , 'fieldinfou_old.name as unitnum_old' , 'fieldinfor_old.name as roomnum_old' ,
								 'fieldinfob_new.name as buildnum_new' , 'fieldinfou_new.name as unitnum_new' , 'fieldinfor_new.name as roomnum_new' )
							 ->leftJoin( 'customer' , 'changeinfo.cust_id' , '=' , 'customer.cust_id' )
							 ->leftJoin( 'homeinfo as old_homeinfo' , 'changeinfo.old_homeid' , '=' , 'old_homeinfo.homeid' )
							 ->leftJoin( 'homeinfo as new_homeinfo' , 'changeinfo.new_homeid' , '=' , 'new_homeinfo.homeid' )
							 ->leftJoin( 'fieldinfo as fieldinfob_old' , 'old_homeinfo.buildnum' , '=' , 'fieldinfob_old.field_id' )
							 ->leftJoin( 'fieldinfo as fieldinfou_old' , 'old_homeinfo.unitnum' , '=' , 'fieldinfou_old.field_id' )
							 ->leftJoin( 'fieldinfo as fieldinfor_old' , 'old_homeinfo.roomnum' , '=' , 'fieldinfor_old.field_id' )
							 ->leftJoin( 'fieldinfo as fieldinfob_new' , 'new_homeinfo.buildnum' , '=' , 'fieldinfob_new.field_id' )
							 ->leftJoin( 'fieldinfo as fieldinfou_new' , 'new_homeinfo.unitnum' , '=' , 'fieldinfou_new.field_id' )
							 ->leftJoin( 'fieldinfo as fieldinfor_new' , 'new_homeinfo.roomnum' , '=' , 'fieldinfor_new.field_id' )
							 ->where( 'changeinfo.type' , '=' , 2 )
							 ->paginate( $page );
		}


		//查看单挑详情
		public static function get_d_changeinfo( $chan_id )
		{
			return DB::table( 'changeinfo' )
							 ->select( 'changeinfo.*' ,
								 'customer.realname' , 'customer.mobile' , 'customer.idcard' ,
								 'old_homeinfo.buildnum as old_buildnum' , 'old_homeinfo.unitnum as old_unitnum' , 'old_homeinfo.roomnum as old_roomnum' ,
								 'new_homeinfo.buildnum as new_buildnum' , 'new_homeinfo.unitnum as new_unitnum' , 'new_homeinfo.roomnum as new_roomnum' ,
								 'fieldinfob_old.name as buildnum_old' , 'fieldinfou_old.name as unitnum_old' , 'fieldinfor_old.name as roomnum_old' ,
								 'fieldinfob_new.name as buildnum_new' , 'fieldinfou_new.name as unitnum_new' , 'fieldinfor_new.name as roomnum_new' )
							 ->leftJoin( 'customer' , 'changeinfo.cust_id' , '=' , 'customer.cust_id' )
							 ->leftJoin( 'homeinfo as old_homeinfo' , 'changeinfo.old_homeid' , '=' , 'old_homeinfo.homeid' )
							 ->leftJoin( 'homeinfo as new_homeinfo' , 'changeinfo.new_homeid' , '=' , 'new_homeinfo.homeid' )
							 ->leftJoin( 'fieldinfo as fieldinfob_old' , 'old_homeinfo.buildnum' , '=' , 'fieldinfob_old.field_id' )
							 ->leftJoin( 'fieldinfo as fieldinfou_old' , 'old_homeinfo.unitnum' , '=' , 'fieldinfou_old.field_id' )
							 ->leftJoin( 'fieldinfo as fieldinfor_old' , 'old_homeinfo.roomnum' , '=' , 'fieldinfor_old.field_id' )
							 ->leftJoin( 'fieldinfo as fieldinfob_new' , 'new_homeinfo.buildnum' , '=' , 'fieldinfob_new.field_id' )
							 ->leftJoin( 'fieldinfo as fieldinfou_new' , 'new_homeinfo.unitnum' , '=' , 'fieldinfou_new.field_id' )
							 ->leftJoin( 'fieldinfo as fieldinfor_new' , 'new_homeinfo.roomnum' , '=' , 'fieldinfor_new.field_id' )
							 ->where( 'changeinfo.type' , '=' , 2 )
								-> where('changeinfo.chan_id','=',$chan_id)
							 ->first();
		}


		//更新数据库信息
		public static function update_changeinfo($chan_id,$data){
			return DB::table('changeinfo') -> where('chan_id','=',$chan_id) -> update($data);
		}


		//删除信息
		public static function delete_d_change($chan_id){
			return DB::table('changeinfo') -> where('chan_id','=',$chan_id) -> delete();
		}




		//多选删除
		public static function delete_all_changeingo($chan_id){
			return DB::table('changeinfo') -> whereIn('chan_id',$chan_id) -> delete();
		}

		//经理审核信息更新
		public static function update_re_change($chan_id,$data){
			return DB::table('changeinfo') -> where('chan_id','=',$chan_id) -> update($data);
		}


		//经理不同意更改房源信息
		public static function update_homeinfo($new_homeid){
			return DB::table('homeinfo') -> where('homeid','=',$new_homeid) -> update(
				array('status' => 0)
			);
		}


	}
