<?php

	namespace App\Http\Controllers\Admin\Settings;


	use App\Http\Controllers\SessionController;
	use App\Models\admin\url;
	use Illuminate\Http\Request;
	use Illuminate\Support\Facades\Validator;

	class UrlController extends SessionController {

		/**
		 *
		 * 链接管理展示页面
		 *
		 * @param $perid
		 *
		 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
		 */
		public function index( $perid )
		{
			$data = $this->session();
			$data['page_name'] = trans( 'permission.page_name' );
			$data['page_detail'] = trans( 'url.page_detail' );
			$data['page_tips'] = trans( 'index.page_tips' );
			$data['page_note'] = trans( 'index.page_note' );
			$page = config( 'myconfig.config.page_num' );
			$data['url'] = url::get_all_role($page);
			$data['per_menu'] = $this->get_per();
			$data['ids'] = $perid;
			return view( 'Admin.Settings.Url.index' )->with( $data );
		}


		/**
		 * url添加页面展示
		 *
		 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
		 */
		public function create()
		{
			return view( 'Admin.Settings.Url.create' );
		}

		/**
		 *
		 * 链接信息录入
		 *
		 * @param Request $query
		 *
		 * @return array
		 */
		public function store(Request $query)
		{
			$validator = Validator::make($query -> all(),[
				'url_name'   => 'unique:urlinfo,url_name',
				'url_path'   => 'unique:urlinfo,url_path',
			]);
			if($validator -> errors() -> get('url_name')){
				return [
					'code'        => config('myconfig.url.url_name_code'),
					'msg'         => config('myconfig.url.url_name_msg')
				];
			}
			if($validator -> errors() -> get('url_path')){
				return [
					'code'           => config('myconfig.url.url_path_code'),
					'msg'            => config('myconfig.url.url_path_msg')
				];
			}
			$data['url_name'] = $query -> input('url_name');
			$data['url_path'] = $query -> input('url_path');
			$data['description'] = $query -> input('description');
			$data['created_at'] = time();
			$store = url::store_url($data);
			if($store){
				return [
					'code'      => config('myconfig.url.url_store_success_code'),
					'msg'       => config('myconfig.url.url_store_success_msg')
				];
			}else{
				return [
					'code'          => config('myconfig.url.url_store_error_code'),
					'msg'           => config('myconfig.url.url_store_error_msg')
				];
			}
		}

		/**
		 * 查询单挑信息
		 *
		 * @param $url_id
		 *
		 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
		 */
		public function edit($url_id){
			$data['url'] = url::get_d_url($url_id);
			return view('Admin.Settings.Url.edit') -> with($data);
		}

		/**
		 *
		 * 更新数据
		 *
		 * @param Request $query
		 *
		 * @return array
		 */
		public function update(Request $query){
			$url_id = (int)$query -> input('url_id');
			$validator = Validator::make($query -> all(),[
				'url_name'   => 'unique:urlinfo,url_name,'.$url_id.',url_id',
				'url_path'   => 'unique:urlinfo,url_path,'.$url_id.',url_id',
			]);
			if($validator -> errors() -> get('url_name')){
				return [
					'code'        => config('myconfig.url.url_name_code'),
					'msg'         => config('myconfig.url.url_name_msg')
				];
			}
			if($validator -> errors() -> get('url_path')){
				return [
					'code'           => config('myconfig.url.url_path_code'),
					'msg'            => config('myconfig.url.url_path_msg')
				];
			}
			$data['url_name'] = $query -> input('url_name');
			$data['url_path'] = $query -> input('url_path');
			$data['description'] = $query -> input('description');
			$data['updated_at'] = time();

			$update_url = url::update_d_url($url_id,$data);

			if($update_url){
				return [
					'code'           => config('myconfig.url.url_update_success_code'),
					'msg'            => config('myconfig.url.url_update_success_msg')
				];
			}else{
				return [
					'code'           => config('myconfig.url.url_update_error_code'),
					'msg'            => config('myconfig.url.url_update_error_msg')
				];
			}
		}


		public function destroy(Request $query){
			$url_id = (int)$query -> input('url_id');

			$delete = url::delete_url($url_id);


			if($delete){
				return [
					'code'           => config('myconfig.url.url_delete_success_code'),
					'msg'            => config('myconfig.url.url_delete_success_msg')
				];
			}else{
				return [
					'code'           => config('myconfig.url.url_delete_error_code'),
					'msg'            => config('myconfig.url.url_delete_error_msg')
				];
			}
		}



		public function destroy_all(Request $query){
			$url_id = $query  -> input('url_id');

			$delete_all = url::delete_all($url_id);
			if($delete_all){
				return [
					'code'           => config('myconfig.url.url_delete_success_code'),
					'msg'            => config('myconfig.url.url_delete_success_msg')
				];
			}else{
				return [
					'code'           => config('myconfig.url.url_delete_error_code'),
					'msg'            => config('myconfig.url.url_delete_error_msg')
				];
			}

		}



	}
