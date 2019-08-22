<?php

namespace App\Http\Controllers\Admin\Knowledge;

use Illuminate\Http\Request;
use App\Http\Controllers\SessionController;
use Illuminate\Support\Facades\Session;
use App\Models\admin\Knowledge;
use Illuminate\Support\Facades\Validator;
use Mews\Purifier\Facades\Purifier;

class KnowledgeController extends SessionController
{
	//营销知识库首页
    public function index($perid){
			$data = $this -> session();
			$data['per_menu'] = $this -> get_per();
			$data['page_name'] = trans( 'knowledge.page_name' );
			$data['page_detail'] = trans( 'knowledge.page_detail' );
			$data['page_tips'] = trans( 'index.page_tips' );
			$data['page_note'] = trans( 'index.page_note' );
			$page = config('myconfig.config.page_num');
			$data['k'] = Knowledge::get_all_k($page);
			$data['ids'] = $perid;
			return view('Admin.Knowledge.Knowledge.index') -> with($data);
		}

		//新增页面
		public function create(){
    	//查询分类
			$data['Knowledge'] = Knowledge::get_type_field();
			return view('Admin.Knowledge.Knowledge.create') -> with($data);
		}

		//新增
		public function store(Request $query){
    	$validator = Validator::make($query ->all(),[
    		'title' => 'min:3|max:30',
			]);

    	if($validator -> errors() -> get('title')){
    		return [
    			'code'        => config('myconfig.knowledge.title_code'),
					'msg'         => config('myconfig.knowledge.title_msg')
				];
			}
    	$data['title'] = $query -> input('title');
    	$data['class_id'] = $query -> input('class_id');
    	$data['video'] = $query -> input('video');
    	$data['content'] = clean($query -> input('content'));
    	$data['hous_id'] = Session::get('session_member.id');
    	$data['is_public'] = $query -> input('is_public');
			$data['created_at'] = time();

			$store = Knowledge::store_k($data);
			if($store){
				return [
					'code'        => config('myconfig.knowledge.store_k_success_code'),
					'msg'         => config('myconfig.knowledge.store_k_success_msg')
				];
			}else{
				return [
					'code'        => config('myconfig.knowledge.store_k_error_code'),
					'msg'         => config('myconfig.knowledge.store_k_error_msg')
				];
			}
		}

		//修改
		public function edit($know_id){
    	$data['data'] = Knowledge::get_d_k($know_id);
//    	dd($data['k']);
			$data['Knowledge'] = Knowledge::get_type_field();
    	return view('Admin.Knowledge.Knowledge.edit') -> with($data);
		}

		//更新
	public function update(Request $query){
		$validator = Validator::make($query ->all(),[
			'title' => 'min:3|max:30',
		]);

		if($validator -> errors() -> get('title')){
			return [
				'code'        => config('myconfig.knowledge.title_code'),
				'msg'         => config('myconfig.knowledge.title_msg')
			];
		}

		$k_id = $query -> input('k_id');
		$data['title'] = $query -> input('title');
		$data['class_id'] = $query -> input('class_id');
		$data['video'] = $query -> input('video');
		$data['content'] = $query -> input('content');
		$data['hous_id'] = Session::get('session_member.id');
		$data['is_public'] = $query -> input('is_public');
		$data['updated_at'] = time();

		$update = Knowledge::update_d_k($k_id,$data);

		if($update){
			return [
				'code'        => config('myconfig.knowledge.update_k_success_code'),
				'msg'         => config('myconfig.knowledge.update_k_success_msg')
			];
		}else{
			return [
				'code'        => config('myconfig.knowledge.update_k_error_code'),
				'msg'         => config('myconfig.knowledge.update_k_error_msg')
			];
		}
	}


	public function destroy(Request $query){
    	$k_id = (int)$query -> input('know_id');

    	$delete = Knowledge::delete_d_k($k_id);

    	if($delete){
				return [
					'code'        => config('myconfig.knowledge.delete_k_success_code'),
					'msg'         => config('myconfig.knowledge.delete_k_success_msg')
				];
			}else{
				return [
					'code'        => config('myconfig.knowledge.delete_k_error_code'),
					'msg'         => config('myconfig.knowledge.delete_k_error_msg')
				];
			}
	}

	public function destroy_all(Request $query){
		$k_id = $query -> input('know_id');
		$delete = Knowledge::delete_all_k($k_id);
		if($delete){
			return [
				'code'        => config('myconfig.knowledge.delete_k_success_code'),
				'msg'         => config('myconfig.knowledge.delete_k_success_msg')
			];
		}else{
			return [
				'code'        => config('myconfig.knowledge.delete_k_error_code'),
				'msg'         => config('myconfig.knowledge.delete_k_error_msg')
			];
		}
	}

	public function view($know_id){
    	$data['data'] = Knowledge::get_d_ks($know_id);
    	return view('Admin.Knowledge.Knowledge.view') -> with($data);
	}

}
