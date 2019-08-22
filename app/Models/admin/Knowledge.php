<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Knowledge extends Model
{
	//查询分类
    public static function get_type_field(){
    	return DB::table('fieldinfo') -> where('parent_field_id','=',18) -> get();
		}

		//添加入库
		public static function store_k($data){
    	return DB::table('knowledgeinfo') -> insert($data);
		}

		//查询数据
		public static function get_all_k($page){
    	return DB::table('knowledgeinfo') -> select('knowledgeinfo.*','fieldinfo.name')
				-> leftJoin('fieldinfo','knowledgeinfo.class_id','=','fieldinfo.field_id')
    	-> paginate($page);
		}

		//查询单挑数据
		public static function get_d_k($know_id){
    	return DB::table('knowledgeinfo') -> where('know_id','=',$know_id) -> first();
		}

		//修改
		public static function update_d_k($k_id,$data){
    	return DB::table('knowledgeinfo') -> where('know_id','=',$k_id) -> update($data);
		}

		//删除
		public static function delete_d_k($k_id){
    	return DB::table('knowledgeinfo') -> where('know_id','=',$k_id) -> delete();
		}

		//多选删除
		public static function delete_all_k($k_id){
    	return DB::table('knowledgeinfo') ->whereIn('know_id',$k_id) ->delete();
		}

		//详情
		public static function get_d_ks($know_id){
			return DB::table('knowledgeinfo') -> select('knowledgeinfo.*','fieldinfo.name')
							 -> leftJoin('fieldinfo','knowledgeinfo.class_id','=','fieldinfo.field_id')
							 -> where('knowledgeinfo.know_id','=',$know_id)
							 -> first();
		}
}
