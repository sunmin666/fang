<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Pack extends Model
{

	/**
	 *
	 * 数据添加到tnews
	 * @param $data
	 *
	 * @return int
	 */
	public static function store_tnews($data){
		return DB::table('tnews') -> insertGetId($data);
	}

	/**
	 * 数据新增到内容表
	 *
	 * @param $data1
	 *
	 * @return bool
	 */
	public static function store_cnews($data1){
		return DB::table('cnews') -> insert($data1);
	}

	/**
	 * 查询项目简介信息
	 *
	 * @return \Illuminate\Support\Collection
	 */
	public static function get_news(){
		return DB::table('tnews')
						 -> select('tnews.*','cnews.content')
						 -> leftJoin('cnews','cnews.tnid','=','tnews.nid')
						 -> where('tnews.n_type','=',2)
						 -> get();
	}


	/**
	 * 查询项目简介
	 *
	 * @param $nid
	 *
	 * @return Model|\Illuminate\Database\Query\Builder|object|null
	 */
	public static function get_d_news($nid){
		return DB::table('tnews')
						 -> select('tnews.*','cnews.content')
						 -> leftJoin('cnews','cnews.tnid','=','tnews.nid')
						 -> where('tnews.nid','=',$nid)
						 -> first();
	}

	/**
	 * 修改tnews数据信息
	 *
	 * @param $nid
	 * @param $data
	 *
	 * @return int
	 */
	public static function update_tnews($nid,$data){
		return DB::table('tnews') -> where('nid','=',$nid) -> update($data);
	}

	/**
	 *
	 * 修改cnews数据信息
	 *
	 * @param $nid
	 * @param $data1
	 *
	 * @return int
	 */
	public static function update_cnews($nid,$data1){
		return DB::table('cnews') -> where('tnid','=',$nid) -> update($data1);
	}


	/**
	 *
	 * 删除tnews表里的信息
	 *
	 * @param $nid
	 *
	 * @return int
	 */
	public static function delete_tnews($nid){
		return DB::table('tnews') -> where('nid','=',$nid) -> delete();
	}


	/**
	 * 删除cnews表里的信息
	 *
	 * @param $nid
	 *
	 * @return int
	 */
	public static function delete_cnews($nid){
		return DB::table('cnews') -> where('tnid','=',$nid) -> delete();
	}

}
