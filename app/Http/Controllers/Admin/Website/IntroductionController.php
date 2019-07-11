<?php

namespace App\Http\Controllers\Admin\Website;

use Illuminate\Http\Request;
use App\Http\Controllers\SessionController;
use Illuminate\Support\Facades\Validator;
use App\Models\admin\Intr;

class IntroductionController extends SessionController
{

	/**
	 * 户型介绍页面展示
	 *
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
    public function index($perid){
			$data = $this->session();
			$data['per_menu'] = $this->get_per();
			$data['page_name'] = trans( 'intr.page_name' );
			$data['page_detail'] = trans( 'intr.page_detail' );
			$data['page_tips'] = trans( 'index.page_tips' );
			$data['page_note'] = trans( 'index.page_note' );
			$page = config('myconfig.config.page_num');
			$data['intr'] = Intr::get_intr($page);
			$data['ids'] = $perid;
			return view( 'Admin.Website.intr.index' )->with( $data );
		}

	/**
	 * 户型介绍添加页面
	 *
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
		public function create(){
    	return view('Admin.Website.intr.create');
		}

	/**
	 *
	 * 户型介绍添加到数据库
	 *
	 * @param Request $query
	 *
	 * @return array
	 */
		public function store(Request $query){
			$validator = Validator::make( $query->all() , [
				'i_title' => "required|string|min:3|max:50" ,
			] );

			if($validator -> errors() -> get('i_title')){
				return [
					'code'   => config('myconfig.intr.i_title_code'),
					'msg'   => config('myconfig.intr.i_title_msg'),
				];
			}

			$data['i_title'] = $query -> input('i_title');
			$data['created_at'] = time();
			$data['status'] = 1;
			$img_txet = $query -> input('img_text');

			$info = Intr::store_intr($data);
			if($info){
				for($g = 0; $g < count($img_txet);$g ++){
					$data1['img_title'] = $img_txet[$g]['img'];
					$data1['img_text'] = $img_txet[$g]['text'];
					$data1['intr_id'] = $info;
					Intr::store_tintr($data1);
				}
				return [
					'code'   => config('myconfig.intr.intr_store_success_code'),
					'msg'   => config('myconfig.intr.intr_store_success_msg'),
				];
			}else{
				return [
					'code'   => config('myconfig.intr.intr_store_error_code'),
					'msg'   => config('myconfig.intr.intr_store_error_msg'),
				];
			}
		}

	/**
	 *
	 * 修改户型介绍展示
	 *
	 * @param $intr_id
	 *
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
		public function edit($intr_id){
			$data['intr'] = Intr::get_d_intr($intr_id);
			return view('Admin.Website.intr.edit') -> with($data);
		}

	/**
	 *
	 * 更新户型信息
	 *
	 * @param Request $query
	 *
	 * @return array
	 */
		public function update(Request $query){
			$validator = Validator::make( $query->all() , [
				'i_title' => "required|string|min:3|max:50" ,
			] );

			if($validator -> errors() -> get('i_title')){
				return [
					'code'   => config('myconfig.intr.i_title_code'),
					'msg'   => config('myconfig.intr.i_title_msg'),
				];
			}
			$intr_id = $query -> input('intr_id');

			$data['i_title'] = $query -> input('i_title');
			$data['created_up'] = time();

			$info = Intr::update_intr($intr_id,$data);
			$img_txet = $query -> input('img_text');

			if($info){

				Intr::get_delete($intr_id);

				for($g = 0; $g < count($img_txet);$g ++){
					$data1['img_title'] = $img_txet[$g]['img'];
					$data1['img_text'] = $img_txet[$g]['text'];
					$data1['intr_id'] = $intr_id;
					Intr::update_tintr($data1);
				}
				return [
					'code'   => config('myconfig.intr.intr_update_success_code'),
					'msg'   => config('myconfig.intr.intr_update_success_msg'),
				];
			}else{
				return [
					'code'   => config('myconfig.intr.intr_update_error_code'),
					'msg'   => config('myconfig.intr.intr_update_error_msg'),
				];
			}
		}

	/**
	 *
	 * 删除户型信息
	 *
	 * @param Request $query
	 *
	 * @return array
	 */
		public function destroy(Request $query){
			$intr_id = $query -> input('intr_id');

			$info = Intr::get_delete_intr($intr_id);
			if($info){
				Intr::get_delete($intr_id);
				return [
					'code'   => config('myconfig.intr.intr_delete_success_code'),
					'msg'   => config('myconfig.intr.intr_delete_success_msg'),
				];
			}else{
				return [
					'code'   => config('myconfig.intr.intr_delete_error_code'),
					'msg'   => config('myconfig.intr.intr_delete_error_msg'),
				];
			}
		}

	/**
	 *
	 * 多选删除户型信息
	 *
	 * @param Request $query
	 *
	 * @return array
	 */
		public function destroy_all(Request $query){
			$intr_id = $query -> input('intr');

			$info = Intr::get_delete_intr_all($intr_id);

			if($info){
				Intr::delete_all_tintr($intr_id);
				return [
					'code'   => config('myconfig.intr.intr_delete_success_code'),
					'msg'   => config('myconfig.intr.intr_delete_success_msg'),
				];
			}else{
				return [
					'code'   => config('myconfig.intr.intr_delete_error_code'),
					'msg'   => config('myconfig.intr.intr_delete_error_msg'),
				];
			}
		}

}
