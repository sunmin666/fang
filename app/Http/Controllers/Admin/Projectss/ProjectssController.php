<?php

	namespace App\Http\Controllers\Admin\Projectss;


	use App\Models\admin\Projectss;
	use Illuminate\Http\Request;
	use App\Http\Controllers\SessionController;
	use Illuminate\Support\Facades\Validator;
	use Illuminate\Support\Facades\Session;


	class ProjectssController extends SessionController {

		/**
		 *
		 * 项目展示页面
		 *
		 * @param $perid
		 *
		 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
		 */
		public function index( $perid )
		{
			$data = $this->session();
			$data['per_menu'] = $this->get_per();
			$data['page_name'] = trans( 'project.page_name' );
			$data['page_detail'] = trans( 'project.page_detail' );
			$data['page_tips'] = trans( 'index.page_tips' );
			$data['page_note'] = trans( 'index.page_note' );
			$data['ids'] = $perid;

			$page = config( 'myconfig.config.page_num' );

			$data['project'] = Projectss::get_add_project( $page );

			return view( 'Admin.Projectss.Projectss.index' )->with( $data );

		}

		/**
		 *
		 * 项目添加
		 *
		 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
		 */
		public function create()
		{
			//查询下面公司
			$data['company'] = Projectss::get_all_company();
			return view( 'Admin.Projectss.Projectss.create' )->with( $data );
		}

		/**
		 * 添加项目
		 *
		 * @param Request $query
		 *
		 * @return array
		 */
		public function store( Request $query )
		{
			$validator = Validator::make( $query->all() , [
				'pro_cname' => 'required|max:20|min:2' ,
				'pro_ename' => 'required|max:60|min:5' ,
			] );

			if ( $validator->errors()->get( 'pro_cname' ) ) {
				return [
					'code' => config( 'myconfig.project.pro_cname_code' ) ,
					'msg'  => config( 'myconfig.project.pro_cname_msg' ) ,
				];
			}
			if ( $validator->errors()->get( 'pro_ename' ) ) {
				return [
					'code' => config( 'myconfig.project.pro_ename_code' ) ,
					'msg'  => config( 'myconfig.project.pro_ename_msg' ) ,
				];
			}

			$data['pro_cname'] = $query->input( 'pro_cname' );
			$data['pro_ename'] = $query->input( 'pro_ename' );
			$data['comp_id'] = $query->input( 'comp_id' );
			$data['created_at'] = time();
			$data['ppeople'] = Session::get( 'session_member.id' );


			$info = Projectss::store_projectinfo( $data );

			if ( $info ) {
				return [
					'code' => config( 'myconfig.project.store_project_success_code' ) ,
					'msg'  => config( 'myconfig.project.store_project_success_msg' ) ,
				];
			} else {
				return [
					'code' => config( 'myconfig.project.store_project_error_code' ) ,
					'msg'  => config( 'myconfig.project.store_project_error_msg' ) ,
				];
			}
		}

		/**
		 *
		 * 查询单挑项目信息
		 *
		 * @param $project_id
		 *
		 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
		 */
		public function edit( $project_id )
		{
			$data['company'] = Projectss::get_all_company();
			$data['project'] = Projectss::get_d_project( $project_id );
			return view( 'Admin.Projectss.Projectss.edit' )->with( $data );
		}


		/**
		 * 更新项目信息
		 *
		 * @param Request $query
		 *
		 * @return array
		 *
		 */
		public function update( Request $query )
		{
			$validator = Validator::make( $query->all() , [
				'pro_cname' => 'required|max:20|min:2' ,
				'pro_ename' => 'required|max:60|min:5' ,
			] );

			if ( $validator->errors()->get( 'pro_cname' ) ) {
				return [
					'code' => config( 'myconfig.project.pro_cname_code' ) ,
					'msg'  => config( 'myconfig.project.pro_cname_msg' ) ,
				];
			}
			if ( $validator->errors()->get( 'pro_ename' ) ) {
				return [
					'code' => config( 'myconfig.project.pro_ename_code' ) ,
					'msg'  => config( 'myconfig.project.pro_ename_msg' ) ,
				];
			}
			$data['pro_cname'] = $query->input( 'pro_cname' );
			$data['pro_ename'] = $query->input( 'pro_ename' );
			$data['comp_id'] = $query->input( 'comp_id' );
			$data['updated_at'] = time();

			$project_id = $query->input( 'project_id' );

			$info = Projectss::update_d_project( $project_id , $data );

			if ( $info ) {

				return [
					'code' => config( 'myconfig.project.update_success_project_code' ) ,
					'msg'  => config( 'myconfig.project.update_success_project_msg' ) ,
				];

			} else {

				return [
					'code' => config( 'myconfig.project.update_error_project_code' ) ,
					'msg'  => config( 'myconfig.project.update_error_project_msg' ) ,
				];
			}
		}

		/**
		 *
		 * 删除项目
		 *
		 * @param Request $query
		 *
		 * @return array
		 */
		public function destroy( Request $query )
		{
			$project_id = $query->input( 'project_id' );

			$info = Projectss::delete_d_project( $project_id );

			if ($info) {
				return [
					'code'   => config('myconfig.project.delete_success_project_code'),
					'msg'    => config('myconfig.project.delete_success_project_msg')
				];
			}else{
				return [
					'code'   => config('myconfig.project.delete_error_project_code'),
					'msg'    => config('myconfig.project.delete_error_project_msg')
				];
			}
		}

		public static function destroy_all(Request $query){
			$project_all_id = $query-> input('project_id');

			$info = Projectss::delete_all_project($project_all_id);

			if ($info) {
				return [
					'code'   => config('myconfig.project.delete_success_project_code'),
					'msg'    => config('myconfig.project.delete_success_project_msg')
				];
			}else{
				return [
					'code'   => config('myconfig.project.delete_error_project_code'),
					'msg'    => config('myconfig.project.delete_error_project_msg')
				];
			}

		}


	}
