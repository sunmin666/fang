<?php

namespace App\Http\Controllers\Admin\Consultant;

use Illuminate\Http\Request;
use App\Http\Controllers\SessionController;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Models\admin\Consu;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;

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
			$data['role'] = Consu::get_all_role();  //查询角色
//			dd($data);
			//接受参数
			//角色
			$data['roles'] = $role = Input::get('role');
			//职业顾问姓名
			$data['name'] = $name = Input::get('name');
			//登录者手机号
			$data['iphone'] = $iphone = Input::get('iphone');

			$data['consu'] = Consu::get_all_consu($role,$name,$iphone,$page);
//			dd($data);
			$data['ids'] = $perid;
			return view('Admin.Consu.Consu.index') -> with($data);
		}

	/**
	 * 职业顾问添加页面
	 *
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
		public function create(){

			$data['poje'] = Consu::get_poje();      //查询所属项目
			$data['role'] = Consu::get_all_role();  //查询角色
			$data['permin'] = Consu::get_permin();  //查询权限
			$data['enjoy'] = Consu::get_enjoy();   //查询顾问折扣
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
				'mobile'  => 'unique:houserinfo,mobile',
				'idcrad'  => 'unique:houserinfo,idcrad',
				'password'   => 'required|min:6|min:8',
				'password_confirmation'   => 'same:password',
			]);
			if($validator -> errors() -> get('mobile')){
				return [
					'code'    => config('myconfig.consu.mobile_code'),
					'msg'     => config('myconfig.consu.mobile_msg')
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

			$data['mobile'] = $query -> input('mobile');               //职业顾问账号
			$data['password'] = Hash::make($query -> input('password'));      //登录密码
			$data['name'] = $query -> input('name');      //登录密码
			$data['email'] = $query -> input('email');          //邮箱
			$data['sex'] = $query -> input('sex');              //性别
			$data['idcrad'] = $query -> input('idcrad');           //身份证号
			$data['enjoy'] = $query -> input('enjoy');          //生日
			$data['proj_id'] = $query -> input('proj_id');      //项目
			$data['is_ipad'] = $query -> input('is_ipad');

			$data['login_count'] = 0;             //登录次数默认0
  		$data['created_at'] = time();
			$info = Consu::store_consu($data);
			if($info){

				$data1['memberid'] = $info;
				$data1['role_id'] = $query -> input('role_id');
				$data1['perm_id'] = $query -> input('perm_id');
				$data1['posi_id'] = 5;
				$data1['created_at'] = time();
				Consu::store_user($data1);
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
			$data['poje'] = Consu::get_poje();      //查询所属项目
			$data['role'] = Consu::get_all_role();  //查询角色
			$data['permin'] = Consu::get_permin();  //查询权限
			$data['enjoy'] = Consu::get_enjoy();   //查询顾问折扣
			$data['hous'] = Consu::get_d_hous($hous_id);
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

				'mobile'  => 'unique:houserinfo,mobile,'.$hous_id.",hous_id",
				'idcrad'  => 'unique:houserinfo,idcrad,'.$hous_id.",hous_id",
			]);
			if($validator -> errors() -> get('username')){
				return [
					'code'    => config('myconfig.consu.mobile_code'),
					'msg'     => config('myconfig.consu.mobile_msg')
				];
			}
			if($validator -> errors() -> get('idcrad')){
				return [
					'code'    => config('myconfig.consu.idcrad_code'),
					'msg'     => config('myconfig.consu.idcrad_msg')
				];
			}
			$data['mobile'] = $query -> input('mobile');               //职业顾问账号
			$password = $query -> input('password');
			if($password != ''){
				$data['password'] = Hash::make($password);      //登录密码
			}
			$data['name'] = $query -> input('name');      //登录密码
			$data['email'] = $query -> input('email');          //邮箱
			$data['sex'] = $query -> input('sex');              //性别
			$data['idcrad'] = $query -> input('idcrad');           //身份证号
			$data['enjoy'] = $query -> input('enjoy');          //生日
			$data['proj_id'] = $query -> input('proj_id');      //项目
			$data['is_ipad'] = $query -> input('is_ipad');
			$data['updated_at'] = time();

			$info = Consu::update_d_hous($hous_id,$data);

			if($info){

				$data1['role_id'] = $query -> input('role_id');
				$data1['perm_id'] = $query -> input('perm_id');
				$data1['posi_id'] = 5;
				$data1['updated_at'] = time();
				Consu::update_d_user($hous_id,$data1);

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
//			dd($data);
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

				Consu::delete_user($hous_id);

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

				Consu::delete_all_user($hous_id);
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

//	/**
//	 * 查询公司下的所属项目
//	 *
//	 * @param Request $query
//	 *
//	 * @return \Illuminate\Support\Collection
//	 */
//		public function comp_id(Request $query){
//			$comp_id = $query -> input('comp_id');
//			$info = Consu::get_company($comp_id);
//			return $info;
//		}










		//-----------------------------------------职业顾问折扣信息表----------------------------------//

	public function enjoy($perid){

		$data = $this -> session();
		$data['per_menu'] = $this -> get_per();
		$data['page_name'] = trans( 'consu.page_name' );
		$data['page_detail'] = trans( 'consu.page_detail2' );
		$data['page_tips'] = trans( 'index.page_tips' );
		$data['page_note'] = trans( 'index.page_note' );
		$page = config('myconfig.config.page_num');
		$data['enjoy'] = Consu::get_all_enjoy($page);
		$data['ids'] = $perid;
		return view('Admin.Consu.Enjoy.index') -> with($data);
	}

	//添加顾问折扣信息
	public function store_enjoy(Request $query){
			$data['enjoy'] = $query -> input('enjoy');
			$data['created_at'] = time();
			$store = Consu::store_enjoy($data);

			if($store){
				return [
					'code'   => config('myconfig.consu.store_success_consu_code'),
					'msg'    => config('myconfig.consu.store_success_consu_msg')
				];
			}else{
				return [
					'code'   => config('myconfig.consu.store_error_consu_code'),
					'msg'    => config('myconfig.consu.store_error_consu_msg')
				];
			}
	}

	//修改页面
	public function edit_enjoy($enjoy_id){
			$data['enjoy'] = Consu::get_d_enjoy($enjoy_id);
			return view('Admin.Consu.Enjoy.edit') -> with($data);
	}

//修改顾问折扣信息
	public function update_enjoy(Request $query){
			$enjoy_id = $query -> input('enjoy_id');
			$data['enjoy'] = $query -> input('enjoy');

			$update = Consu::update_d_enjoy($enjoy_id,$data);
			if($update){
				return [
					'code'   => config('myconfig.consu.update_success_hous_code'),
					'msg'    => config('myconfig.consu.update_success_hous_msg')
				];
			}else{
				return [
					'code'   => config('myconfig.consu.update_success_hous_code'),
					'msg'    => config('myconfig.consu.update_success_hous_msg')
				];
			}
		}

		public function destroy_enjoy(Request $query){
			$enjoy_id = $query -> input('enjoy_id');

			$delete = Consu::delete_d_enjoy($enjoy_id);

			if($delete){
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

}
