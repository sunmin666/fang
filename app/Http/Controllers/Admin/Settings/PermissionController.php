<?php

namespace App\Http\Controllers\Admin\Settings;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\SessionController;
use App\Models\Admin\Per;

class PermissionController extends SessionController
{
    public function index($perid){
			$data = $this -> session();
			$data['page_name'] = trans( 'permission.page_name' );
			$data['page_detail'] = trans( 'permission.page_detail' );
			$data['page_tips'] = trans( 'index.page_tips' );
			$data['page_note'] = trans( 'index.page_note' );
			$page = config('myconfig.config.page_num');
			$data['per'] = Per::get_all_per($page);
			$data['per_menu'] = $this -> get_per();
			$data['ids'] = $perid;
			return view('Admin.Settings.Permission.index') -> with($data);
		}

	/**
	 * 菜单添加页面展示
	 *
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
			public function create(){

    		$data['per'] = Per::get_status();
				return view('Admin.Settings.Permission.create') -> with($data);
			}


	/**
	 *
	 * 权限信息添加到数据库
	 *
	 * @param Request $query
	 *
	 * @return array
	 */
		public function store(Request $query){
			$validator = Validator::make( $query->all() , [
				'pername' => "unique:perm,pername" ,   //判断名称是否重复
			] );

			if($validator -> errors() -> get('pername')){
				return [
					'code'   => config('myconfig.perm.pername_code'),
					'msg'   => config('myconfig.perm.pername_msg')
				];
			}
			$data['pername'] = $query -> input('pername');
			$data['perurl'] = $query -> input('perurl');
			$superior = $query -> input('p_superior');

			if($superior == 0){
				$data['p_superior'] = '顶级菜单';
			}else{
				$data['p_superior'] = $query -> input('p_superior');
			}
		  $icon = $query -> input('p_icon');
			if($icon == '0'){
				$data['p_icon'] = 'fa fa-circle-o';
			}else{
				$data['p_icon'] = $query -> input('p_icon');
			}
			$data['created_at'] = time();
			$info = Per::store_per($data);
			if($info){
				return [
					'code'   => config('myconfig.perm.per_success_code'),
					'msg'   => config('myconfig.perm.per_success_msg')
				];
			}else{
				return [
					'code'   => config('myconfig.perm.per_error_code'),
					'msg'   => config('myconfig.perm.per_error_msg')
				];
			}

		}

	/**
	 *
	 * 权限信息修改页面展示
	 *
	 * @param $perid
	 *
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
		public function edit($perid){
			$data['pers'] = Per::get_status();
			$data['per'] = Per::get_d_perm($perid);

			return view('Admin.Settings.Permission.edit') -> with($data);
		}

	/**
	 *
	 * 更新数据权限信息
	 *
	 * @param Request $query
	 *
	 * @return array
	 */
		public function update(Request $query){
			$perid = $query -> input('perid');
			$data['pername'] = $query -> input('pername');
			$data['perurl'] = $query -> input('perurl');
			$superior = $query -> input('p_superior');
			if($superior == 0){
				$data['p_superior'] = '顶级菜单';
			}else{
				$data['p_superior'] = $query -> input('p_superior');
			}
			$icon = $query -> input('p_icon');
			if($icon == '0'){
				$data['p_icon'] = 'fa fa-circle-o';
			}else{
				$data['p_icon'] = $query -> input('p_icon');
			}

			$info = Per::update_d_perm($perid,$data);

			if($info){
				return [
					'code'   => config('myconfig.perm.per_update_success_code'),
					'msg'   => config('myconfig.perm.per_update_success_msg')
				];
			}else{
				return [
					'code'   => config('myconfig.perm.per_update_error_code'),
					'msg'   => config('myconfig.perm.per_update_error_msg')
				];
			}
		}

	/**
	 *
	 * 删除单挑权限信息
	 *
	 * @param Request $query
	 *
	 * @return array
	 */
		public function destroy(Request $query){
			$perid = $query -> input('perid');


			$deletes = Per::get_d_perm_z($perid);

			if($deletes){
				return [
					'code'   => config('myconfig.perm.per_delete_code'),
					'msg'   => config('myconfig.perm.per_delete_msg')
				];
			}
			$delete = Per::delete_d_perm($perid);

			if($delete){
				return [
					'code'   => config('myconfig.perm.per_delete_success_code'),
					'msg'   => config('myconfig.perm.per_delete_success_msg')
				];
			}else{
				return [
					'code'   => config('myconfig.perm.per_delete_error_code'),
					'msg'   => config('myconfig.perm.per_delete_error_msg')
				];
			}
		}


		public function status(Request $query){
			$per_id = $query -> input('perid');
			$status = $query -> input('status');

			if($status == 1){
				$data['status'] = 0;
			}elseif($status == 0){
				$data['status'] = 1;
			}

			$status_update = Per::update_status($per_id,$data);

			if($status_update){
				return [
					'code'   => config('myconfig.perm.per_status_success_code'),
					'msg'   => config('myconfig.perm.per_status_success_msg')
				];
			}else{
				return [
					'code'   => config('myconfig.perm.per_status_error_code'),
					'msg'   => config('myconfig.perm.per_status_error_msg')
				];
			}


		}


}
