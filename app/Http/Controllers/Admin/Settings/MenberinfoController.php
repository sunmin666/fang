<?php

namespace App\Http\Controllers\Admin\Settings;

use App\Models\admin\Cha;
use Illuminate\Http\Request;
use App\Http\Controllers\SessionController;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\Models\admin\Member;

class MenberinfoController extends SessionController
{


	/**
	 *
	 * 展示用户信息
	 *
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
    public function index($perid){

			$data['page_name'] = trans( 'memberinfo.page_name' );
			$data['page_detail'] = trans( 'memberinfo.page_detail' );
			$data['page_tips'] = trans( 'index.page_tips' );
			$data['page_note'] = trans( 'index.page_note' );
			$page = config('myconfig.config.page_num');
			$data['ids'] = $perid;
			$data['member'] = Member::get_all_member($page);
			$data['per_menu'] = $this -> get_per();
    	return view('Admin.Settings.Memberinfo.index') -> with($data);
		}

	/**
	 *
	 * 展示添加页面
	 *
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
		public function create(){
			//查询所有的职位信息
			$data['position'] = Member::get_all_position();
			//查询所有的角色信息
			$data['role'] = Member::get_all_role();
			//查询所有权限信息
			$data['permi'] = Member::get_all_permin();
    	return view('Admin.Settings.Memberinfo.create') -> with($data);
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
				'account' => "unique:memberinfo,account" ,
				'username' => "unique:memberinfo,username" ,
				'mobile'   => 'unique:memberinfo,mobile',
				'password' => "required|string|min:6|max:16" ,
			] );

			if($validator -> errors() -> get('account')){
				return [
					'code'   => config('myconfig.member.account_code'),
					'msg'   => config('myconfig.member.account_msg')
				];
			}

			if($validator -> errors() -> get('username')){
				return [
					'code'   => config('myconfig.member.username_code'),
					'msg'   => config('myconfig.member.username_msg')
				];
			}

			if($validator -> errors() -> get('password')){
				return [
					'code'   => config('myconfig.member.password_code'),
					'msg'   => config('myconfig.member.password_msg')
				];
			}
			if($validator -> errors() -> get('mobile')){
				return [
					'code'   => config('myconfig.member.mobile_code'),
					'msg'   => config('myconfig.member.mobile_msg')
				];
			}

			$data['account'] = $query -> input('account');
			$data['username'] = $query -> input('username');
			$data['email'] = $query -> input('email');
			$data['password'] = Hash::make( $query -> input('password') );
			$data['mobile'] = $query -> input('mobile');
			$data['sex'] = $query -> input('sex');
			$data['created_at'] = time();
			$data['status']  =  1;
			$info = Member::store_member($data);
			if($info){
				$data1['memberid'] = $info;
				$data1['role_id'] = $query -> input('character');
				$data1['posi_id'] = $query -> input('positioninfo');
				$data1['perm_id'] = $query -> input('permission');
				$data1['created_at'] = time();
				Member::store_relationinfo($data1);

				return [
					'code'   => config('myconfig.member.memberinfo_success_code'),
					'msg'   => config('myconfig.member.memberinfo_success_msg')
				];
			}else{
				return [
					'code'   => config('myconfig.member.memberinfo_error_code'),
					'msg'   => config('myconfig.member.memberinfo_error_msg')
				];
			}

		}

	/**
	 *
	 * 修改页面展示
	 *
	 * @param $memberid
	 *
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
		public function edit($memberid){

			$data['position'] = Member::get_all_position();
			//查询所有的角色信息
			$data['role'] = Member::get_all_role();
			//查询所有权限信息
			$data['permi'] = Member::get_all_permin();
			$data['member'] = Member::get_d_memberinfo($memberid);
			return view('Admin.Settings.Memberinfo.edit') -> with($data);
		}

	/**
	 * 更新数据库用户信息
	 *
	 * @param Request $query
	 *
	 * @return array
	 */
		public function update(Request $query){

			$memberid = $query -> input('memberid');
			$data['account'] = $query -> input('account');
			$data['username'] = $query -> input('username');
			$data['email'] = $query -> input('email');
			$data['mobile'] = $query -> input('mobile');
			$data['sex'] = $query -> input('sex');

			$info = Member::update_d_memberinfo($memberid,$data);

			$data1['role_id'] = $query -> input('character');
			$data1['posi_id'] = $query -> input('positioninfo');
			$data1['perm_id'] = $query -> input('permission');
			$data1['updated_at'] = time();
			$info1 = Member::update_relationinfo($memberid,$data1);

			if($info || $info1){


				return [
					'code'   => config('myconfig.member.memberinfo_update_success_code'),
					'msg'   => config('myconfig.member.memberinfo_update_success_msg')
				];
			}else{
				return [
					'code'   => config('myconfig.member.memberinfo_update_error_code'),
					'msg'   => config('myconfig.member.memberinfo_update_error_msg')
				];
			}
		}

	/**
	 * 删除指定的数据
	 *
	 * @param Request $query
	 *
	 * @return array
	 */
		public function destroy(Request $query){
			$memberid = $query -> input('memberid');

			$info = Member::delete_d_memberinfo($memberid);

			if($info){
				return [
					'code'   => config('myconfig.member.memberinfo_delete_success_code'),
					'msg'   => config('myconfig.member.memberinfo_delete_success_msg')
				];
			}else{
				return [
					'code'   => config('myconfig.member.memberinfo_delete_error_code'),
					'msg'   => config('myconfig.member.memberinfo_delete_error_msg')
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
			$member_id = $query -> input('memberid');

			$info = Member::delete_all_memberinfo($member_id);

			if($info){
				return [
					'code'   => config('myconfig.member.memberinfo_delete_success_code'),
					'msg'   => config('myconfig.member.memberinfo_delete_success_msg')
				];
			}else{
				return [
					'code'   => config('myconfig.member.memberinfo_delete_error_code'),
					'msg'   => config('myconfig.member.memberinfo_delete_error_msg')
				];
			}

		}

	/**
	 *
	 * 修改用户状态
	 *
	 * @param Request $query
	 *
	 * @return array
	 */
		public function status(Request $query){
			$memberid =  $query -> input('memberid');
			$status = $query -> input('status');

			if($status == 1){
				$data['status'] = 0;
			}else{
				$data['status'] = 1;
			}

			$info = Member::get_d_status($memberid,$data);

			if($info){
				return [
					'code'   => config('myconfig.member.memberinfo_status_success_code'),
					'msg'   => config('myconfig.member.memberinfo_status_success_msg')
				];
			}else{
				return [
					'code'   => config('myconfig.member.memberinfo_status_error_code'),
					'msg'   => config('myconfig.member.memberinfo_status_error_msg')
				];
			}
		}
}
