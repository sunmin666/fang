<?php

namespace App\Http\Controllers\Admin\Settings;

use Illuminate\Http\Request;
use App\Http\Controllers\SessionController;
use App\Models\admin\Role;
use Illuminate\Support\Facades\Validator;

class RoleinfoController extends SessionController
{

	/**
	 *
	 * 新版本角色管理
	 *
	 * @param $perid
	 *
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
		public function index($perid){
			$data = $this -> session();
			$data['page_name'] = trans( 'permission.page_name' );
			$data['page_detail'] = trans( 'role.page_detail' );
			$data['page_tips'] = trans( 'index.page_tips' );
			$data['page_note'] = trans( 'index.page_note' );
			$page = config('myconfig.config.page_num');
			$data['role'] = Role::get_all_role($page);
			$data['per_menu'] = $this -> get_per();
			$data['ids'] = $perid;

			return view('Admin.Settings.Roleinfo.index') -> with($data);
		}

	/**
	 *
	 * 新增数据角色
	 *
	 * @param Request $query
	 *
	 * @return array
	 */
		public function store(Request $query){
			$validator = Validator::make($query -> all(),[
				'role_name'   => 'unique:roleinfo,role_name',
			]);

			if($validator -> errors() -> get('role_name')){
				return [
					'code'          => config('myconfig.role.role_name_code'),
					'msg'           => config('myconfig.role.role_name_msg')
				];
			}
			$data['role_title'] = $query -> input('role_title');
			$data['role_name'] = $query -> input('role_name');
			$data['description']  = $query -> input('description');
			$data['created_at'] = time();
			$role = Role::store_d_role($data);
			if($role){
				return [
					'code'           => config('myconfig.role.role_store_success_code'),
					'msg'            => config('myconfig.role.role_store_success_msg')
				];
			}else{
				return [
					'code'           => config('myconfig.role.role_store_error_code'),
					'msg'            => config('myconfig.role.role_store_error_msg')
				];
			}
		}

	/**
	 *
	 * 修改新本数据页面展示
	 *
	 * @param $role_id
	 *
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function edit($role_id){
			$data['role'] = Role::get_d_roleinfo($role_id);
			return view('Admin.Settings.Roleinfo.edit') -> with($data);
	}

	/**
	 *
	 * 更新新版本角色信息
	 *
	 * @param Request $query
	 *
	 * @return array
	 */
	public function update(Request $query){
		$role_id = $query -> input('role_id');
		$validator = Validator::make($query -> all(),[
			'role_name'   => 'unique:roleinfo,role_name,'.$role_id.',role_id',
		]);
		if($validator -> errors() -> get('role_name')){
			return [
				'code'          => config('myconfig.role.role_name_code'),
				'msg'           => config('myconfig.role.role_name_msg')
			];
		}
		$data['role_title'] = $query -> input('role_title');
		$data['role_name'] = $query -> input('role_name');
		$data['description']  = $query -> input('description');
		$update_role = Role::update_d_role($role_id,$data);
		if($update_role){
			return [
				'code'         => config('myconfig.role.update_role_success_code'),
				'msg'          => config('myconfig.role.update_role_success_msg')
			];
		}else{
			return [
				'code'         => config('myconfig.role.update_role_error_code'),
				'msg'          => config('myconfig.role.update_role_error_msg')
			];
		}
	}

	/**
	 *
	 * 删除信息
	 *
	 * @param Request $query
	 *
	 * @return array
	 */
	public function destroy(Request $query){
		$role_id = (int)$query -> input('role_id');

		$delete = Role::delete_d_role($role_id);

		if($delete){
			return [
				'code'          => config('myconfig.role.delete_role_success_code'),
				'msg'           => config('myconfig.role.delete_role_success_msg')
			];
		}else{
			return [
				'code'          => config('myconfig.role.delete_role_error_code'),
				'msg'           => config('myconfig.role.delete_role_error_msg')
			];
		}
	}

	public function destroy_all(Request $query){
		$role_id = $query -> input('role_id');

		$delete_all = Role::delete_all_role($role_id);

		if($delete_all){
			return [
				'code'          => config('myconfig.role.delete_role_success_code'),
				'msg'           => config('myconfig.role.delete_role_success_msg')
			];
		}else{
			return [
				'code'          => config('myconfig.role.delete_role_error_code'),
				'msg'           => config('myconfig.role.delete_role_error_msg')
			];
		}
	}


}
