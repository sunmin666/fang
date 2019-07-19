<?php

namespace App\Http\Controllers\Admin\Settings;

use Illuminate\Http\Request;
use App\Http\Controllers\SessionController;
use App\Models\admin\Cha;
use Illuminate\Support\Facades\Validator;
use App\Models\Admin\Member;
use App\Models\admin\regi;

class CharacterController extends SessionController
{

	/**
	 * 角色数据表展示
	 *
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
    public function index ($perid){


			$data = $this -> session();
			$data['per_menu'] = $this -> get_per();
			$data['page_name'] = trans( 'cha.page_name' );
			$data['page_detail'] = trans( 'cha.page_detail' );
			$data['page_tips'] = trans( 'index.page_tips' );
			$data['page_note'] = trans( 'index.page_note' );
			$page = config('myconfig.config.page_num');
			$data['cha'] = Cha::get_all_cha($page);
			$data['ids'] = $perid;
			return view('Admin.Settings.Cha.index') -> with($data);
		}

	/**
	 * 角色添加页面的展示
	 *
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
		public function create(){
    	//可选取的权限
			$data['pers'] = $this -> get_per();
			return view('Admin.Settings.Cha.create') -> with($data);
    }

	/**
	 * 添加到数据库
	 *
	 * @param Request $query
	 *
	 * @return array
	 */

    public function store(Request $query){
			$validator = Validator::make( $query->all() , [
				'ch_nsme' => "required|string|min:2|max:10" ,
				'ch_text' => "required|string|min:2|max:50" ,
			] );
			if($validator -> errors() -> get('ch_nsme')){
				return [
					'code'   => config('myconfig.cha.ch_nsme_code'),
					'msg'    => config('myconfig.cha.ch_nsme_msg')
				];
			}
			if($validator -> errors() -> get('ch_text')){
				return [
					'code'   => config('myconfig.cha.ch_text_code'),
					'msg'    => config('myconfig.cha.ch_text_msg')
				];
			}
			$data['ch_nsme'] = $query -> input('ch_nsme');
			$data['ch_text'] = $query -> input('ch_text');
			$data['ch_per'] = implode(',',$query -> input('ch_per'));
			$data['created_at'] = time();

			$info = Cha::store_cha($data);

			if($info){
				return [
					'code'   => config('myconfig.cha.ch_text_success_code'),
					'msg'    => config('myconfig.cha.ch_text_success_msg')
				];
			}else{
				return [
					'code'   => config('myconfig.cha.ch_text_error_code'),
					'msg'    => config('myconfig.cha.ch_text_error_msg')
				];
			}
		}

	/**
	 *
	 * 角色信息修改页面
	 *
	 * @param $chid
	 *
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
		public function edit($chid){
			$data['pers'] = $this -> get_per();
			$data['cha'] = Cha::get_d_cha($chid);
			$data['cha'] -> ch_per = explode(',',$data['cha'] -> ch_per);
			return view('Admin.Settings.Cha.edit') -> with($data);
		}


	/**
	 *
	 * 更新角色数据
	 *
	 * @param Request $query
	 *
	 * @return array
	 */
		public function update(Request $query){
			$validator = Validator::make( $query->all() , [
				'ch_nsme' => "required|string|min:2|max:10" ,
				'ch_text' => "required|string|min:2|max:50" ,
			] );
			if($validator -> errors() -> get('ch_nsme')){
				return [
					'code'   => config('myconfig.cha.ch_nsme_code'),
					'msg'    => config('myconfig.cha.ch_nsme_msg')
				];
			}
			if($validator -> errors() -> get('ch_text')){
				return [
					'code'   => config('myconfig.cha.ch_text_code'),
					'msg'    => config('myconfig.cha.ch_text_msg')
				];
			}

			$chid = $query -> input('chid');
			$data['ch_nsme'] = $query -> input('ch_nsme');
			$data['ch_text'] = $query -> input('ch_text');
			$data['ch_per'] = implode(',',$query -> input('ch_per'));

			$info = Cha::update_d_cha($chid,$data);

			if($info){
				return [
					'code'   => config('myconfig.cha.ch_update_success_code'),
					'msg'    => config('myconfig.cha.ch_update_success_msg')
				];
			}else{
				return [
					'code'   => config('myconfig.cha.ch_update_error_code'),
					'msg'    => config('myconfig.cha.ch_update_error_msg')
				];
			}
		}

	/**
	 *
	 * 删除角色信息
	 *
	 * @param Request $query
	 *
	 * @return array
	 */
		public function destroy(Request $query){
			$chid = $query -> input('chid');
			$member = Member::get_d_character($chid);

			$houser = regi::get_d_character($chid);

			if($member || $houser){
				return [
					'code'   => config('myconfig.member.ch_get_character_code'),
					'msg'    => config('myconfig.member.ch_get_character_msg')
				];
			}else{
				$delete = Cha::delete_cha($chid);
				if($delete){
					return [
						'code'   => config('myconfig.cha.ch_delete_success_code'),
						'msg'    => config('myconfig.cha.ch_delete_success_msg')
					];
				}else{
					return [
						'code'   => config('myconfig.cha.ch_delete_error_code'),
						'msg'    => config('myconfig.cha.ch_delete_error_msg')
					];
				}
			}
		}
}
