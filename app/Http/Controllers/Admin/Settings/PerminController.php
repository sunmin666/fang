<?php

	namespace App\Http\Controllers\Admin\Settings;


	use App\Http\Controllers\SessionController;
	use App\Models\admin\Permin;
	use Illuminate\Http\Request;
	use Illuminate\Support\Facades\Validator;

	class PerminController extends SessionController {

		/**
		 *
		 *
		 *
		 * @param $perid
		 *
		 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
		 */
		public function index( $perid )
		{

			$data = $this->session();
			$data['page_name'] = trans( 'permission.page_name' );
			$data['page_detail'] = trans( 'permin.page_detail' );
			$data['page_tips'] = trans( 'index.page_tips' );
			$data['page_note'] = trans( 'index.page_note' );
			$page = config( 'myconfig.config.page_num' );
			$data['permin'] = Permin::get_all_permin($page);
			$data['per_menu'] = $this->get_per();
			$data['ids'] = $perid;
			return view( 'Admin.Settings.Permin.index' )->with( $data );
		}

		/**
		 *
		 * 添加权限信息
		 *
		 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
		 */
		public function create()
		{
			//角色信息
			$data['role'] = Permin::get_role();
			$data['url'] = Permin::get_url();
			return view( 'Admin.Settings.Permin.create' )->with( $data );
		}

		/**
		 *
		 * 新增入库
		 * @param Request $query
		 *
		 * @return array
		 */
		public function store(Request $query)
		{
				$validator = Validator::make($query ->all(),[
					'perm_title'    => 'max:100',
				]);

				if($validator -> errors() -> get('perm_title')){
					return [
						'code'    => config('myconfig.permin.perm_title_code'),
						'msg'     => config('myconfig.permin.perm_title_msg')
					];
				}

				$data['perm_title'] = $query -> input('perm_title');
				$data['role_id'] = $query -> input('role_id');
				$data['perm_name'] = $query -> input('perm_name');
				$data['http_method'] = $query -> input('http_method');
				$data['description'] = $query -> input('description');
				$data['http_path'] = implode('|',$query -> input('http_path'));
				$data['created_at'] = time();


				$store_perm = Permin::store_permin($data);

				if($store_perm){
					return [
						'code'    => config('myconfig.permin.permin_store_success_code'),
						'msg'     => config('myconfig.permin.permin_store_success_msg')
					];
				}else{
					return [
						'code'    => config('myconfig.permin.permin_store_error_code'),
						'msg'     => config('myconfig.permin.permin_store_error_msg')
					];
				}
		}

		/**
		 *
		 * 修改页面
		 *
		 * @param $perm_id
		 *
		 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
		 */
		public function edit($perm_id){
			$data['role'] = Permin::get_role();
			$data['url'] = Permin::get_url();
			$data['permin'] = Permin::get_d_permin($perm_id);
			$data['permin'] -> http_path = explode('|',$data['permin'] -> http_path);

			return view( 'Admin.Settings.Permin.edit' )->with( $data );
		}

		public function update(Request $query){
			$permi_id = $query -> input('permin_id');
			$validator = Validator::make($query ->all(),[
				'perm_title'    => 'max:100',
			]);

			if($validator -> errors() -> get('perm_title')){
				return [
					'code'    => config('myconfig.permin.perm_title_code'),
					'msg'     => config('myconfig.permin.perm_title_msg')
				];
			}

			$data['perm_title'] = $query -> input('perm_title');
			$data['role_id'] = $query -> input('role_id');
			$data['perm_name'] = $query -> input('perm_name');
			$data['http_method'] = $query -> input('http_method');
			$data['description'] = $query -> input('description');
			$data['http_path'] = implode('|',$query -> input('http_path'));
			$data['updated_at'] = time();

			$update_permin = Permin::update_d_permin($permi_id,$data);

			if($update_permin){
				return [
					'code'    => config('myconfig.permin.permin_update_success_code'),
					'msg'     => config('myconfig.permin.permin_update_success_msg')
				];
			}else{
				return [
					'code'    => config('myconfig.permin.permin_update_error_code'),
					'msg'     => config('myconfig.permin.permin_update_error_msg')
				];
			}

		}


		public function destroy(Request $query){
			$perm_id = $query -> input('perm_id');

			$delete_pemin = Permin::delete_permin($perm_id);

			if($delete_pemin){
				return [
					'code'    => config('myconfig.permin.permin_delete_success_code'),
					'msg'     => config('myconfig.permin.permin_delete_success_msg')
				];
			}else{
				return [
					'code'    => config('myconfig.permin.permin_delete_error_code'),
					'msg'     => config('myconfig.permin.permin_delete_error_msg')
				];
			}
		}

		public static function destroy_all(Request $query){
			$perm_id = $query -> input('perm_id');

			$delete_pemin = Permin::delete_all_permin($perm_id);

			if($delete_pemin){
				return [
					'code'    => config('myconfig.permin.permin_delete_success_code'),
					'msg'     => config('myconfig.permin.permin_delete_success_msg')
				];
			}else{
				return [
					'code'    => config('myconfig.permin.permin_delete_error_code'),
					'msg'     => config('myconfig.permin.permin_delete_error_msg')
				];
			}
		}

	}
