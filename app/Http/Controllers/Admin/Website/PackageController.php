<?php

	namespace App\Http\Controllers\Admin\Website;

	use App\Models\admin\Pack;
	use Illuminate\Http\Request;
	use App\Http\Controllers\SessionController;
	use Illuminate\Support\Facades\Validator;
	use Illuminate\Support\Facades\Session;

	class PackageController extends SessionController {

		/**
		 *
		 * 区域配套页面展示
		 *
		 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
		 */
		public function index()
		{
			$data = $this->session();
			$data['per_menu'] = $this->get_per();
			$data['page_name'] = trans( 'pack.page_name' );
			$data['page_detail'] = trans( 'pack.page_detail' );
			$data['page_tips'] = trans( 'index.page_tips' );
			$data['page_note'] = trans( 'index.page_note' );
			$data['news'] = pack::get_news();
			return view( 'Admin.Website.Package.index' )->with( $data );
		}

		/**
		 * 区域配套新增页面展示
		 *
		 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
		 */
		public function create()
		{
			return view( 'Admin.Website.Package.create' );
		}

		/**
		 * 项目配套设置 添加数据
		 *
		 * @param Request $query
		 *
		 * @return array
		 */
		public function store(Request $query)
		{
			$validator = Validator::make( $query->all() , [
				'n_title' => "required|string|min:2|max:30" ,
			] );
			if($validator -> errors() -> get('n_title')){
				return [
					'code'   => config('myconfig.pack.n_title_code'),
					'msg'    => config('myconfig.pack.n_title_msg')
				];
			}

			$data['n_title'] = $query -> input('n_title');
			$data['n_img'] = $query -> input('n_img');
			$data['created_at'] = time();
			$data['n_admin_at'] = Session::get('session_member.account');
			$data['n_type'] = 2;

			$info = pack::store_tnews($data);
			if($info){
				$data1['content'] = $query -> input('content');
				$data1['tnid'] = $info;
				pack::store_cnews($data1);
				return [
					'code'   => config('myconfig.pack.tnews_store_success_code'),
					'msg'    => config('myconfig.pack.tnews_store_success_msg')
				];
			}else{
				return [
					'code'   => config('myconfig.pack.tnews_store_error_code'),
					'msg'    => config('myconfig.pack.tnews_store_error_msg')
				];
			}
		}

		/**
		 * 修改页面展示
		 *
		 * @param $nid
		 *
		 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
		 */
		public function edit($nid){
			$data['news'] = pack::get_d_news($nid);
			return view('Admin.Website.Package.edit') -> with($data);
		}

		/**
		 *
		 * 更新区域配套信息
		 *
		 * @param Request $query
		 *
		 * @return array
		 */
		public function update(Request $query){
			$validator = Validator::make( $query->all() , [
				'n_title' => "required|string|min:2|max:30" ,
			] );
			if($validator -> errors() -> get('n_title')){
				return [
					'code'   => config('myconfig.pack.n_title_code'),
					'msg'    => config('myconfig.pack.n_title_msg')
				];
			}
			$nid = $query -> input('nid');
			$data['n_title'] = $query -> input('n_title');
			$data['n_img'] = $query -> input('n_img');
			$data['created_up'] = time();
			$info = pack::update_tnews($nid,$data);
			if($info){
				$data1['content'] = $query -> input('content');
				$data1['tnid'] = $nid;
				pack::update_cnews($nid,$data1);
				return [
					'code'   => config('myconfig.pack.tnews_update_success_code'),
					'msg'    => config('myconfig.pack.tnews_update_success_msg')
				];
			}else{
				return [
					'code'   => config('myconfig.pack.tnews_update_error_code'),
					'msg'    => config('myconfig.pack.tnews_update_error_msg')
				];
			}
		}


		public function destroy(Request $query){
			$nid = $query -> input('nid');

			$info = Pack::delete_tnews($nid);

			if($info){
				Pack::delete_cnews($nid);
				return [
					'code'   => config('myconfig.pack.tnews_delete_success_code'),
					'msg'    => config('myconfig.pack.tnews_delete_success_msg')
				];
			}else{
				return [
					'code'   => config('myconfig.pack.tnews_delete_error_code'),
					'msg'    => config('myconfig.pack.tnews_delete_error_msg')
				];
			}
		}
	}
