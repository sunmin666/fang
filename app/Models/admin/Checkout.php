<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Checkout extends Model
{
    //查询客户信息
	public static function get_cust_d($cust_id){
		return DB::table('customer')-> select('customer.cust_id','customer.mobile','customer.realname','customer.idcard') -> where('cust_id','=',$cust_id) -> first();
	}

	//查询房子信息
	public static function get_home_d($homeid){
		return DB::table('homeinfo')
			->select( 'homeinfo.*' , 'fieldinfob.name as buildnums' , 'fieldinfou.name as unitnums' , 'fieldinfor.name as roomnums' )
			->leftJoin( 'fieldinfo as fieldinfob' , 'homeinfo.buildnum' , '=' , 'fieldinfob.field_id' )
			->leftJoin( 'fieldinfo as fieldinfou' , 'homeinfo.unitnum' , '=' , 'fieldinfou.field_id' )
			->leftJoin( 'fieldinfo as fieldinfor' , 'homeinfo.roomnum' , '=' , 'fieldinfor.field_id' )
			->where( 'homeinfo.homeid' , '=' , $homeid )
			->first();
	}


	//添加换房信息
	public static function store_changeinfo($data){
		return DB::table('changeinfo') -> insert($data);
	}



	//查询退房信息每次十条
	public static function get_all_change($page){
		return DB::table('changeinfo')
			-> select('changeinfo.*','customer.cust_id','customer.realname','customer.mobile','customer.idcard',
				'homeinfo.buildnum','homeinfo.unitnum','homeinfo.roomnum',
				'fieldinfob.name as buildnums' , 'fieldinfou.name as unitnums' , 'fieldinfor.name as roomnums')
			-> leftJoin('customer','changeinfo.cust_id','=','customer.cust_id')
			-> leftJoin('homeinfo','changeinfo.old_homeid','=','homeinfo.homeid')
			->leftJoin( 'fieldinfo as fieldinfob' , 'homeinfo.buildnum' , '=' , 'fieldinfob.field_id' )
			->leftJoin( 'fieldinfo as fieldinfou' , 'homeinfo.unitnum' , '=' , 'fieldinfou.field_id' )
			->leftJoin( 'fieldinfo as fieldinfor' , 'homeinfo.roomnum' , '=' , 'fieldinfor.field_id' )
			-> where('changeinfo.type','=',3)
			->paginate($page);
	}

	//修改页面信息
	public static function get_d_chengeinfo($chan_id){
		return DB::table('changeinfo')
						 -> select('changeinfo.*','customer.cust_id','customer.realname','customer.mobile','customer.idcard',
							 'homeinfo.buildnum','homeinfo.unitnum','homeinfo.roomnum',
							 'fieldinfob.name as buildnums' , 'fieldinfou.name as unitnums' , 'fieldinfor.name as roomnums')
						 -> leftJoin('customer','changeinfo.cust_id','=','customer.cust_id')
						 -> leftJoin('homeinfo','changeinfo.old_homeid','=','homeinfo.homeid')
						 ->leftJoin( 'fieldinfo as fieldinfob' , 'homeinfo.buildnum' , '=' , 'fieldinfob.field_id' )
						 ->leftJoin( 'fieldinfo as fieldinfou' , 'homeinfo.unitnum' , '=' , 'fieldinfou.field_id' )
						 ->leftJoin( 'fieldinfo as fieldinfor' , 'homeinfo.roomnum' , '=' , 'fieldinfor.field_id' )
						 -> where('changeinfo.type','=',3)
						 -> where('changeinfo.chan_id','=',$chan_id)
			-> first();
	}

	//更新退房信息
	public static function update_d_chan($chan_id,$data){
		return DB::table('changeinfo') ->where('chan_id','=',$chan_id) -> update($data);
	}


	//删除退房数据
	public static function delete_d_chan($chan_id){
		return DB::table('changeinfo') -> where('chan_id','=',$chan_id) -> delete();
	}

//多选删除数据
	public static function delete_all_chan($chan_id){
		return DB::table('changeinfo') -> whereIn('chan_id',$chan_id) -> delete();
	}


	//经理审核
	public static function update_review($chan_id,$data){
		return DB::table('changeinfo') -> where('chan_id','=',$chan_id) -> update($data);
	}

	//财务审核
	public static function update_cwview($chan_id,$data){
		return DB::table('changeinfo') -> where('chan_id','=',$chan_id) -> update($data);
	}



	//修改状态
	public static function buyinfo($buy){
		return DB::table('buyinfo') -> where('buyid','=',$buy) -> update(
			array('status'  => 5)
		);
	}


	//签约状态
	public static function sin($buy){
		return DB::table('signinfo') -> where('signid','=',$buy) -> update(
			array('status'=> 2)
		);
	}


	//查询buyinfoid
	public static function get_d_buyinfo($buy){
		return DB::table('signinfo')-> select('signinfo.buyid') -> where('signid','=',$buy) -> first();
	}


	//更换房源信息
	public static function update_home($home){
		return DB::table('homeinfo') -> where('homeid','=',$home) -> update(
			array('status' => 0)
		);
	}

}
