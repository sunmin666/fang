<?php

namespace App\Http\Controllers\Admin\Consultant;

use Illuminate\Http\Request;
use App\Http\Controllers\SessionController;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Models\admin\Consu;
use Illuminate\Support\Facades\Validator;

class ConsultantController extends SessionController
{
	/**
	 *
	 * 职业顾问信息展示
	 *
	 * @param $perid
	 *
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
    public function index($perid){
			$data = $this -> session();
			$data['per_menu'] = $this -> get_per();
			$data['page_name'] = trans( 'consu.page_name' );
			$data['page_detail'] = trans( 'consu.page_detail' );
			$data['page_tips'] = trans( 'index.page_tips' );
			$data['page_note'] = trans( 'index.page_note' );
			$page = config('myconfig.config.page_num');
			$data['consu'] = Consu::get_all_consu($page);
//			dd($data['consu']);
			$data['ids'] = $perid;
			return view('Admin.Consu.Consu.index') -> with($data);
		}

	/**
	 * 职业顾问添加页面
	 *
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
		public function create(){
    	$data['company'] = Consu::get_d_company();             //查询公司

//			$data['project'] = Consu::get_all_project();           //查询项目

			return view('Admin.Consu.Consu.create') -> with($data);
		}

	/**
	 *
	 * 添加职业顾问
	 *
	 * @param Request $query
	 *
	 * @return array
	 */
		public function store(Request $query){

			$validator  = Validator::make($query -> all(),[
				'username'  => 'unique:houserinfo,username',
				'idcrad'  => 'unique:houserinfo,idcrad',
				'password'   => 'required|min:6|min:8',
				'password_confirmation'   => 'same:password',
			]);
			if($validator -> errors() -> get('username')){
				return [
					'code'    => config('myconfig.consu.username_code'),
					'msg'     => config('myconfig.consu.username_msg')
				];
			}

			if($validator -> errors() -> get('idcrad')){
				return [
					'code'    => config('myconfig.consu.idcrad_code'),
					'msg'     => config('myconfig.consu.idcrad_msg')
				];
			}

			if($validator -> errors() -> get('password')){
				return [
					'code'    => config('myconfig.consu.password_code'),
					'msg'     => config('myconfig.consu.password_msg')
				];
			}

			if($validator -> errors() -> get('password_confirmation')){
				return [
					'code'    => config('myconfig.consu.password_confirmation_code'),
					'msg'     => config('myconfig.consu.password_confirmation_msg')
				];
			}

			$data['username'] = $query -> input('username');               //职业顾问账号
			$data['realname'] = $query -> input('realname');                //职业顾问姓名
			$data['password'] = Hash::make($query -> input('password'));      //登录密码
			$data['email'] = $query -> input('email');          //邮箱
			$data['sex'] = $query -> input('sex');              //性别
			$data['mobile'] = $query -> input('mobile');          //手机号
			$data['idcrad'] = $query -> input('idcrad');           //身份证号
			$data['birthday'] = strtotime($query -> input('birthday'));          //生日
			$data['weixin'] = $query -> input('weixin');         //微信
			$data['qq'] = $query -> input('qq');                  //qq
			$data['proj_id'] = $query -> input('proj_id');         //所属项目id
			$data['comp_id'] = $query -> input('comp_id');           //所属公司id
			$data['description'] = $query -> input('description');       //自我描述
			$data['created_at']   = time();
			$data['character']     = 6;

			if(Session::get('session_member.status') == 1){
				$data['tina'] = Session::get('session_member.id');
			}elseif(Session::get('session_member.status') == 2){
				$people = Consu::get_company_people($data['comp_id']);
				$data['tina'] = (int)$people -> people;
			}

			$info = Consu::store_consu($data);

			if($info){
				return [
					'code'    => config('myconfig.consu.store_success_consu_code'),
					'msg'     => config('myconfig.consu.store_success_consu_msg')
				];
			}else{
				return [
					'code'    => config('myconfig.consu.store_error_consu_code'),
					'msg'     => config('myconfig.consu.store_error_consu_smg')
				];
			}
		}

	/**
	 *
	 * 职业顾问修改页面
	 *
	 * @param $hous_id
	 *
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
		public function edit($hous_id){
			$data['company'] = Consu::get_d_company();             //查询公司
			$data['hous'] = Consu::get_d_hous($hous_id);
			$comp_id = $data['hous']-> comp_id;
			$data['project'] = Consu::get_company($comp_id);
			return view('Admin.Consu.Consu.edit') -> with($data);
		}

	/**
	 * 修改顾问信息
	 *
	 * @param Request $query
	 *
	 * @return array
	 */
		public function update(Request $query){
			$hous_id  = $query -> input('hous_id');
			$validator  = Validator::make($query -> all(),[
				'username'  => 'unique:houserinfo,username,'.$hous_id.",hous_id",
				'idcrad'  => 'unique:houserinfo,idcrad,'.$hous_id.",hous_id",
			]);
			if($validator -> errors() -> get('username')){
				return [
					'code'    => config('myconfig.consu.username_code'),
					'msg'     => config('myconfig.consu.username_msg')
				];
			}
			if($validator -> errors() -> get('idcrad')){
				return [
					'code'    => config('myconfig.consu.idcrad_code'),
					'msg'     => config('myconfig.consu.idcrad_msg')
				];
			}
			$data['username'] = $query -> input('username');               //职业顾问账号
			$data['realname'] = $query -> input('realname');                //职业顾问姓名
			$data['password'] = Hash::make($query -> input('password'));      //登录密码
			$data['email'] = $query -> input('email');          //邮箱
			$data['sex'] = $query -> input('sex');              //性别
			$data['mobile'] = $query -> input('mobile');          //手机号
			$data['idcrad'] = $query -> input('idcrad');           //身份证号
			$data['birthday'] = strtotime($query -> input('birthday'));          //生日
			$data['weixin'] = $query -> input('weixin');         //微信
			$data['qq'] = $query -> input('qq');                  //qq
			$data['proj_id'] = $query -> input('proj_id');         //所属项目id
			$data['comp_id'] = $query -> input('comp_id');           //所属公司id
			$data['description'] = $query -> input('description');       //自我描述
			if(Session::get('session_member.status') == 1){
				$data['tina'] = Session::get('session_member.id');
			}elseif(Session::get('session_member.status') == 2){
				$people = Consu::get_company_people($data['comp_id']);
				$data['tina'] = (int)$people -> people;
			}
			$info = Consu::update_d_hous($hous_id,$data);
			if($info){
				return [
					'code'   => config('myconfig.consu.update_success_hous_code'),
					'msg'    => config('myconfig.consu.update_success_hous_msg')
				];
			}else{
				return [
					'code'   => config('myconfig.consu.update_error_hous_code'),
					'msg'     => config('myconfig.consu.update_error_hous_msg')
				];
			}
		}

	/**
	 *
	 * 修改状态
	 * @param Request $query
	 *
	 * @return array
	 */
		public function status(Request $query){
			$hous_id = $query -> input('hous_id');
			$status = $query -> input('status');

			if($status == 1){
				$data['status'] = 0;
			}else{
				$data['status'] = 1;
			}
			$info = Consu::update_d_status($hous_id,$data);

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

	/**
	 * 查看职业顾问信息详情
	 *
	 * @param $hous_id
	 *
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
		public function view($hous_id){
			$data['hous'] = Consu::get_dd_hous($hous_id);
//			dd($data['hous']);
			return view('Admin.Consu.Consu.view') -> with($data);
		}

	/**
	 * 删除职业顾问信息
	 *
	 * @param Request $query
	 *
	 * @return array
	 */
		public function destroy(Request $query){
			$hous_id = $query -> input('hous_id');
			$info = Consu::delete_d_hous($hous_id);

			if($info){
				return [
					'code'   => config('myconfig.consu.delete_hous_success_code'),
					'msg'    => config('myconfig.consu.delete_hous_success_msg')
				];
			}else{
				return [
					'code'   => config('myconfig.consu.delete_hous_error_code'),
					'msg'    => config('myconfig.consu.delete_hous_error_msg')
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
			$hous_id = $query -> input('hous_id');
			$info = Consu::delete_all_hous($hous_id);
			if($info){
				return [
					'code'   => config('myconfig.consu.delete_hous_success_code'),
					'msg'    => config('myconfig.consu.delete_hous_success_msg')
				];
			}else{
				return [
					'code'   => config('myconfig.consu.delete_hous_error_code'),
					'msg'    => config('myconfig.consu.delete_hous_error_msg')
				];
			}
		}

	/**
	 * 查询公司下的所属项目
	 *
	 * @param Request $query
	 *
	 * @return \Illuminate\Support\Collection
	 */
		public function comp_id(Request $query){
			$comp_id = $query -> input('comp_id');

			$info = Consu::get_company($comp_id);

			return $info;

		}

}
