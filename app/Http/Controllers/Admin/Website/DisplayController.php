<?php

namespace App\Http\Controllers\Admin\Website;

use Illuminate\Http\Request;
use App\Http\Controllers\SessionController;
use App\Models\admin\Display;
use Illuminate\Support\Facades\Validator;


class DisplayController extends SessionController
{

	/**
	 *
	 * 实景展示页面
	 *
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
    public function index(){
			$data = $this->session();
			$data['per_menu'] = $this->get_per();
			$data['page_name'] = trans( 'display.page_name' );
			$data['page_detail'] = trans( 'display.page_detail' );
			$data['page_tips'] = trans( 'index.page_tips' );
			$data['page_note'] = trans( 'index.page_note' );
			$page = config('myconfig.config.page_num');
			$data['intr'] = Display::get_intr($page);
			return view('Admin.Website.Display.index') -> with($data);
		}

	/**
	 * 实景展示添加页面
	 *
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
		public function create(){
    	return view('Admin.Website.Display.create');
		}

	/**
	 *
	 * 实景展示添加
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
			$data['status'] = 2;
			$img_txet = $query -> input('img_text');

			$info = Display::store_intr($data);
			if($info){
				for($g = 0; $g < count($img_txet);$g ++){
					$data1['img_title'] = $img_txet[$g]['img'];
					$data1['img_text'] = $img_txet[$g]['text'];
					$data1['intr_id'] = $info;
					Display::store_tintr($data1);
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
	 * 实景展示修改页面展示
	 *
	 * @param $intr_id
	 *
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function edit($intr_id){
		$data['intr'] = Display::get_d_intr($intr_id);
		return view('Admin.Website.Display.edit') -> with($data);
	}


	/**
	 *
	 * 更新实景数据
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

		$info = Display::update_intr($intr_id,$data);
		$img_txet = $query -> input('img_text');

		if($info){
			Display::get_delete($intr_id);
			for($g = 0; $g < count($img_txet);$g ++){
				$data1['img_title'] = $img_txet[$g]['img'];
				$data1['img_text'] = $img_txet[$g]['text'];
				$data1['intr_id'] = $intr_id;
				Display::update_tintr($data1);
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
	 * 删除实景展示
	 *
	 * @param Request $query
	 *
	 * @return array
	 */
	public function destroy(Request $query){
		$intr_id = $query -> input('intr_id');

		$info = Display::get_delete_intr($intr_id);
		if($info){
			Display::get_delete($intr_id);
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
	 * 多选删除
	 *
	 * @param Request $query
	 *
	 * @return array
	 */
	public function destroy_all(Request $query){
		$intr_id = $query -> input('intr');

		$info = Display::get_delete_intr_all($intr_id);

		if($info){
			Display::delete_all_tintr($intr_id);
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
