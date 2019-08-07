<?php

namespace App\Http\Controllers\Admin\Settings;

use App\Models\admin\Position;
use Illuminate\Http\Request;
use App\Http\Controllers\SessionController;
use Illuminate\Support\Facades\Validator;

class PositionController extends SessionController
{

	/**
	 *
	 * 职位管理页面展示
	 *
	 * @param $perid
	 *
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
    public function index($perid){
			$data = $this -> session();
			$data['page_name'] = trans( 'position.page_name' );
			$data['page_detail'] = trans( 'position.page_detail' );
			$data['page_tips'] = trans( 'index.page_tips' );
			$data['page_note'] = trans( 'index.page_note' );
			$page = config('myconfig.config.page_num');
			$data['position'] = Position::get_all_per($page);
			$data['per_menu'] = $this -> get_per();
			$data['ids'] = $perid;
			return view('Admin.Settings.Position.index') -> with($data);
		}

	/**
	 *
	 * 职位录入
	 *
	 * @param Request $query
	 *
	 * @return array
	 */
		public function store(Request $query){
    	$validator = Validator::make($query -> all(),[
    		'posi_name'   => 'unique:positioninfo,posi_name',
			]);

    	if($validator -> errors() -> get('posi_title')){
    		return [
    			'code'          => config('myconfig.position.posi_name_code'),
					'msg'           => config('myconfig.position.posi_name_msg')
				];
			}

    	$data['posi_title']  = $query -> input('posi_title');
    	$data['posi_name']  = $query -> input('posi_name');
    	$data['description']  = $query -> input('description');
    	$data['created_at']  = time();

			$info = Position::store_d_position($data);

			if($info){
				return [
					'code'    => config('myconfig.position.success_position_store_code'),
					'msg'     => config('myconfig.position.success_position_store_msg')
				];
			}else{
				return [
					'code'     => config('myconfig.position.error_position_store_code'),
					'msg'      => config('myconfig.position.error_position_store_msg')
				];
			}
		}

	/**
	 *
	 * 查询单挑数据
	 *
	 * @param $posi_id
	 *
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
		public function edit($posi_id){
			$data['position'] = Position::get_d_position($posi_id);
			return view('Admin.Settings.Position.edit') -> with($data);
		}

	/**
	 *
	 * 更新数据库信息
	 *
	 * @param Request $query
	 *
	 * @return array
	 */
		public function update(Request $query){
			$posi_id = $query -> input('posi_id');
			$validator = Validator::make($query -> all(),[
				'posi_name'   => 'unique:positioninfo,posi_name,'.$posi_id.',posi_id',
			]);
			if($validator -> errors() -> get('posi_title')){
				return [
					'code'          => config('myconfig.position.posi_name_code'),
					'msg'           => config('myconfig.position.posi_name_msg')
				];
			}
			$data['posi_title']  = $query -> input('posi_title');
			$data['posi_name']  = $query -> input('posi_name');
			$data['description']  = $query -> input('description');
			$data['updated_at']  = time();
			$info = Position::update_d_position($posi_id,$data);
			if($info){
				return [
					'code'      => config('myconfig.position.success_position_update_code'),
					'msg'       => config('myconfig.position.success_position_update_msg')
				];
			}else{
				return [
					'code'      => config('myconfig.position.error_position_update_code'),
					'msg'       => config('myconfig.position.error_position_update_msg')
				];
			}
		}

	/**
	 *
	 * 删除数据库信息
	 *
	 * @param Request $query
	 *
	 * @return array
	 */
		public function destroy(Request $query){
			$posi_id = (int)$query -> input('posi_id');

			$delete = Position::delete_d_position($posi_id);

			if($delete){
				return [
					'code'    => config('myconfig.position.delete_success_position_code'),
					'msg'     => config('myconfig.position.delete_success_position_msg')
				];
			}else{
				return [
					'code'    => config('myconfig.position.delete_error_position_code'),
					'msg'     => config('myconfig.position.delete_error_position_msg')
				];
			}
		}


	/**
	 *
	 * 多选删除
	 *
	 * @param Request $query
	 *
	 * @return array
	 */
		public function destroy_all(Request $query){
			$posi_id = $query -> input('posi_id');               //id数组
			$delete_all = Position::delete_all_position($posi_id);

			if($delete_all){
				return [
					'code'          => config('myconfig.position.delete_success_position_code'),
					'msg'           => config('myconfig.position.delete_success_position_msg')
				];
			}else{
				return [
					'code'          => config('myconfig.position.delete_error_position_code'),
					'msg'           => config('myconfig.position.delete_error_position_msg')
				];
			}

		}


}
