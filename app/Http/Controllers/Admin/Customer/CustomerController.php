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
		return view('Admin.Customer.Customer.create');
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
		if(Session::get('session_member.status') == 1){
			$data['hous_id'] = Session::get('session_member.id');
		}else{
			$data['hous_id']  = 0;
		}
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
		$data['omer'] = Customer::get_d_omer($cust_id);
//		dd($data);
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
		$data['company'] = Consu::get_d_company();             //查询公司
		$data['omer'] = Customer::get_d_omer($cust_id);
		$comp_id = $data['omer']-> comp_id;
		$data['project'] = Consu::get_company($comp_id);
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
