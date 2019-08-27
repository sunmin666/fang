<?php

namespace App\Http\Controllers\Admin\Customer;

use DemeterChain\C;
use Illuminate\Http\Request;
use App\Http\Controllers\SessionController;
use Illuminate\Support\Facades\Session;
use App\Models\admin\Consu;
use Illuminate\Support\Facades\Validator;
use App\Models\admin\Customer;


class CustomerController extends SessionController
{

	/**
	 *
	 * 客户信息资料展示
	 *
	 * @param $perid
	 *
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function index($perid){
		$data = $this -> session();
		$data['per_menu'] = $this -> get_per();
		$data['page_name'] = trans( 'customer.page_name' );
		$data['page_detail'] = trans( 'customer.page_detail' );
		$data['page_tips'] = trans( 'index.page_tips' );
		$data['page_note'] = trans( 'index.page_note' );
		$page = config('myconfig.config.page_num');
		$data['omer'] = Customer::get_all_omer($page);
		//查询所有职业顾问
		$data['hous_id'] = Customer::get_hous_id_all();
//		dd($data['omer']);
		$data['ids'] = $perid;
		return view('Admin.Customer.Customer.index') -> with($data);
	}

	/**
	 *
	 * 添加客户资料显示页面
	 *
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function create(){

		//查询属项目
		$data['project'] = Consu::get_poje();
		//查询所有客户认知渠道
		$data['cognition'] = Customer::get_cognition_all();
		//dd($data['cognition']);
		//查询所有家庭结构
		$data['family_str'] = Customer::get_family_str_all();
		//查询所有工作类型get_intention_area_all
		$data['work_type'] =Customer::get_work_type_all();
		//查询所有意向面积get_floor_like_all
		$data['intention_area'] = Customer::get_intention_area_all();
		//查询所有楼层偏好
		$data['floor_like']	= Customer::get_floor_like_all();
		//查询所有家具
		$data['furniture_need'] = Customer::get_furniture_need_all();
		//查询所有置业此数
		$data['house_num'] =Customer::get_house_num_all();
		//查询所有首次接触方式
		$data['first_contact'] = Customer::get_first_contact_all();
		//查询所有客户状态
		$data['status_id'] = Customer::get_status_id_all();
		//查询所有职业顾问
		$data['hous_id'] = Customer::get_hous_id_all();
		return view('Admin.Customer.Customer.create') -> with($data);
	}


	/**
	 *
	 * 添加客户信息
	 *
	 * @param Request $query
	 *
	 * @return array
	 */
	public function store(Request $query){
		$validator = Validator::make($query ->all(),[
			'mobile'  => 'unique:customer,mobile',
			'email'  => 'unique:customer,email',
			'idcrad'  => 'unique:customer,idcard',
		]);
		if($validator -> errors() -> get('mobile')){
			return [
				'code'      => config('myconfig.omer.mobile_code'),
				'msg'       => config('myconfig.omer.mobile_msg')
			];
		}
		if($validator -> errors() -> get('email')){
			return [
				'code'      => config('myconfig.omer.email_code'),
				'msg'       => config('myconfig.omer.email_msg')
			];
		}
		if($validator -> errors() -> get('idcrad')){
			return [
				'code'      => config('myconfig.omer.idcrad_code'),
				'msg'       => config('myconfig.omer.idcrad_msg')
			];
		}
		$data['realname'] = $query -> input('realname');
		$data['sex'] = $query -> input('sex');
		$data['mobile'] = $query -> input('mobile');
		$data['telphone'] = $query -> input('telphone');
		$data['weixin'] = $query -> input('weixin');
		$data['qq'] = $query -> input('qq');
		$data['email'] = $query -> input('email');
		$data['idcard'] = $query -> input('idcrad');
		$data['proj_id'] = $query -> input('proj_id');
		$data['comp_id'] = $query -> input('comp_id');
		$data['cognition'] = $query -> input('cognition');
		$data['family_str'] = $query -> input('family_str');
		$data['work_type'] = $query -> input('work_type');
		$data['address'] = $query -> input('address');
		$data['intention_area'] = $query -> input('intention_area');
		$data['floor_like'] = $query -> input('floor_like');
		$data['furniture_need'] = $query -> input('furniture_need');
		$data['house_num'] = $query -> input('house_num');
		$data['first_contact'] = $query -> input('first_contact');
		$data['status_id'] = $query -> input('status_id');
		$data['hous_id'] = $query -> input('hous_id');
		$data['created_at'] = time();
		$info = Customer::store_d_customer($data);
		if($info){
			return [
				'code'         => config('myconfig.omer.omer_store_success_code'),
				'msg'          => config('myconfig.omer.omer_store_success_msg')
			];
		}else{
			return [
				'code'         => config('myconfig.omer.omer_store_error_code'),
				'msg'          => config('myconfig.omer.omer_store_error_msg')
			];
		}
	}

	/**
	 *
	 * 客户信息详情
	 *
	 * @param $cust_id
	 *
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function view($cust_id){
		//查询属项目
		$data['project'] = Consu::get_poje();
		//客户单条信息
		$data['omer'] = Customer::get_d_omer($cust_id);
		//查询所有客户认知渠道
		$data['cognition'] = Customer::get_cognition_all();
		//dd($data['cognition']);
		//查询所有家庭结构
		$data['family_str'] = Customer::get_family_str_all();
		//查询所有工作类型get_intention_area_all
		$data['work_type'] =Customer::get_work_type_all();
		//查询所有意向面积get_floor_like_all
		$data['intention_area'] = Customer::get_intention_area_all();
		//查询所有楼层偏好
		$data['floor_like']	= Customer::get_floor_like_all();
		//查询所有家具
		$data['furniture_need'] = Customer::get_furniture_need_all();
		//查询所有置业此数
		$data['house_num'] =Customer::get_house_num_all();
		//查询所有首次接触方式
		$data['first_contact'] = Customer::get_first_contact_all();
		//查询所有客户状态
		$data['status_id'] = Customer::get_status_id_all();
		//查询所有职业顾问
		$data['hous_id'] = Customer::get_hous_id_all();

		return view('Admin.Customer.Customer.view') -> with($data);
	}

	/**
	 *
	 * 客户资料修改页面
	 *
	 * @param $cust_id
	 *
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function edit($cust_id){
		//查询属项目
		$data['project'] = Consu::get_poje();
		//客户单条信息
		$data['omer'] = Customer::get_d_omer($cust_id);
		//查询所有客户认知渠道
		$data['cognition'] = Customer::get_cognition_all();
		//dd($data['cognition']);
		//查询所有家庭结构
		$data['family_str'] = Customer::get_family_str_all();
		//查询所有工作类型get_intention_area_all
		$data['work_type'] =Customer::get_work_type_all();
		//查询所有意向面积get_floor_like_all
		$data['intention_area'] = Customer::get_intention_area_all();
		//查询所有楼层偏好
		$data['floor_like']	= Customer::get_floor_like_all();
		//查询所有家具
		$data['furniture_need'] = Customer::get_furniture_need_all();
		//查询所有置业此数
		$data['house_num'] =Customer::get_house_num_all();
		//查询所有首次接触方式
		$data['first_contact'] = Customer::get_first_contact_all();
		//查询所有客户状态
		$data['status_id'] = Customer::get_status_id_all();
		//查询所有职业顾问
		$data['hous_id'] = Customer::get_hous_id_all();
		//dd($data);
		//dd($data['hous_id']);
		return view('Admin.Customer.Customer.edit')  -> with($data);
	}


	/**
	 *
	 * 更新指定的客户资料
	 *
	 * @param Request $query
	 *
	 * @return array
	 */
	public function update(Request $query){
		$cust_id = $query -> input('cust_id');
		$validator = Validator::make($query ->all(),[
			'mobile'  => 'unique:customer,mobile,'.$cust_id.',cust_id',
			'email'  => 'unique:customer,email,'.$cust_id.',cust_id',
			'idcrad'  => 'unique:customer,idcard,'.$cust_id.',cust_id',
		]);
		if($validator -> errors() -> get('mobile')){
			return [
				'code'      => config('myconfig.omer.mobile_code'),
				'msg'       => config('myconfig.omer.mobile_msg')
			];
		}
		if($validator -> errors() -> get('email')){
			return [
				'code'      => config('myconfig.omer.email_code'),
				'msg'       => config('myconfig.omer.email_msg')
			];
		}
		if($validator -> errors() -> get('idcrad')){
			return [
				'code'      => config('myconfig.omer.idcrad_code'),
				'msg'       => config('myconfig.omer.idcrad_msg')
			];
		}
		$data['realname'] = $query -> input('realname');
		$data['sex'] = $query -> input('sex');
		$data['mobile'] = $query -> input('mobile');
		$data['telphone'] = $query -> input('telphone');
		$data['weixin'] = $query -> input('weixin');
		$data['qq'] = $query -> input('qq');
		$data['email'] = $query -> input('email');
		$data['idcard'] = $query -> input('idcrad');
		$data['proj_id'] = $query -> input('proj_id');
		$data['comp_id'] = $query -> input('comp_id');
		$data['cognition'] = $query -> input('cognition');
		$data['family_str'] = $query -> input('family_str');
		$data['work_type'] = $query -> input('work_type');
		$data['address'] = $query -> input('address');
		$data['intention_area'] = $query -> input('intention_area');
		$data['floor_like'] = $query -> input('floor_like');
		$data['furniture_need'] = $query -> input('furniture_need');
		$data['house_num'] = $query -> input('house_num');
		$data['first_contact'] = $query -> input('first_contact');
		$data['status_id'] = $query -> input('status_id');
		$data['hous_id'] = $query -> input('hous_id');
		$info = Customer::update_d_omer($cust_id,$data);
		if($info){
			return [
				'code'      => config('myconfig.omer.update_omer_success_code'),
				'msg'       => config('myconfig.omer.update_omer_success_msg')
			];
		}else{
			return [
				'code'      => config('myconfig.omer.update_omer_error_code'),
				'msg'       => config('myconfig.omer.update_omer_error_msg')
			];
		}
	}

	public function destroy(Request $query){
		$cust_id = (int)$query -> input('cust_id');

		$is_show = $query -> input('is_show');

		if($is_show == 1){
			$data['is_show'] = 0;
		}else{
			$data['is_show'] = 1;
		}

		$delete = Customer::delete_d_omer($cust_id,$data);

		if($delete){
			return [
				'code'      => config('myconfig.omer.delete_omer_success_code'),
				'msg'       => config('myconfig.omer.delete_omer_success_msg'),
			];
		}else{
			return [
				'code'      => config('myconfig.omer.delete_omer_error_code'),
				'msg'       => config('myconfig.omer.delete_omer_error_msg')
			];
		}


	}



}
