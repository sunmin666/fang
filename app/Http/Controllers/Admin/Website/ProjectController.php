<?php

namespace App\Http\Controllers\Admin\Website;

use App\Models\admin\Pro;
use Illuminate\Http\Request;
use App\Http\Controllers\SessionController;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class ProjectController extends SessionController
{

	/**
	 * 项目简介
	 *
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
    public function index($perid){
    	$data = $this -> session();
			$data['per_menu'] = $this -> get_per();
			$data['page_name'] = trans( 'pro.page_name' );
			$data['page_detail'] = trans( 'pro.page_detail' );
			$data['page_tips'] = trans( 'index.page_tips' );
			$data['page_note'] = trans( 'index.page_note' );
			$data['news'] = Pro::get_news();
			$data['ids'] = $perid;
			return view('Admin.Website.Project.index') -> with($data);
		}

	/**
	 * 项目简介添加页面展示
	 *
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
		public function create(){

    	return view('Admin.Website.Project.create');
		}

	/**
	 *
	 * 添加项目简介
	 * @param Request $query
	 *
	 * @return array
	 */
		public function store(Request $query){
			$validator = Validator::make( $query->all() , [
				'n_title' => "required|string|min:2|max:30" ,
			] );
			if($validator -> errors() -> get('n_title')){
				return [
					'code'   => config('myconfig.pro.n_title_code'),
					'msg'    => config('myconfig.pro.n_title_msg')
				];
			}
			$data['n_title'] = $query -> input('n_title');
			$data['n_img'] = $query -> input('n_img');
			$data['created_at'] = time();
			$data['n_admin_at'] = Session::get('session_member.account');
			$data['n_type'] = 1;

//			print_r($data);die;

			$info = Pro::store_tnews($data);
			if($info){
				$data1['content'] = $query -> input('content');
				$data1['tnid'] = $info;
				Pro::store_cnews($data1);
				return [
					'code'   => config('myconfig.pro.tnews_store_success_code'),
					'msg'    => config('myconfig.pro.tnews_store_success_msg')
				];
			}else{
				return [
					'code'   => config('myconfig.pro.tnews_store_error_code'),
					'msg'    => config('myconfig.pro.tnews_store_error_msg')
				];
			}

		}

	/**
	 *
	 * 修改页面展示
	 *
	 * @param $nid
	 *
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
		public function edit($nid){
			$data['news'] = Pro::get_d_news($nid);
			return view('Admin.Website.Project.edit') -> with($data);
		}

	/**
	 *
	 * 修改项目简介
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
					'code'   => config('myconfig.pro.n_title_code'),
					'msg'    => config('myconfig.pro.n_title_msg')
				];
			}
			$nid = $query -> input('nid');
			$data['n_title'] = $query -> input('n_title');
			$data['n_img'] = $query -> input('n_img');
			$data['created_up'] = time();

			$info = Pro::update_tnews($nid,$data);
			if($info){
				$data1['content'] = $query -> input('content');
				$data1['tnid'] = $nid;
				Pro::update_cnews($nid,$data1);
				return [
					'code'   => config('myconfig.pro.tnews_update_success_code'),
					'msg'    => config('myconfig.pro.tnews_update_success_msg')
				];
			}else{
				return [
					'code'   => config('myconfig.pro.tnews_update_error_code'),
					'msg'    => config('myconfig.pro.tnews_update_error_msg')
				];
			}
		}

	/**
	 *
	 * 删除项目简介信息
	 *
	 * @param Request $query
	 *
	 * @return array
	 */
		public function destroy(Request $query){
			$nid = $query -> input('nid');

			$info = Pro::delete_tnews($nid);

			if($info){
				Pro::delete_cnews($nid);
				return [
					'code'   => config('myconfig.pro.tnews_delete_success_code'),
					'msg'    => config('myconfig.pro.tnews_delete_success_msg')
				];
			}else{
				return [
					'code'   => config('myconfig.pro.tnews_delete_error_code'),
					'msg'    => config('myconfig.pro.tnews_delete_error_msg')
				];
			}
		}



}
