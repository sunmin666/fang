<?php

namespace App\Http\Controllers\Admin\Company;

use Illuminate\Http\Request;
use App\Http\Controllers\SessionController;
use Illuminate\Support\Facades\Validator;
use App\Models\admin\Company;
use Illuminate\Support\Facades\Session;

class CompanyController extends SessionController
{

	/**
	 *
	 * 公司信息列表页面
	 *
	 * @param $perid
	 *
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
    public function index($perid){
			$data = $this -> session();
			$data['per_menu'] = $this -> get_per();
			$data['page_name'] = trans( 'company.page_name' );
			$data['page_detail'] = trans( 'company.page_detail' );
			$data['page_tips'] = trans( 'index.page_tips' );
			$data['page_note'] = trans( 'index.page_note' );
			$page = config('myconfig.config.page_num');
			$people= Session::get('session_member.id');
			$data['company'] = Company::get_all_company($page,$people);
			$data['ids'] = $perid;
			return view('Admin.Company.Company.index') -> with($data);
		}

	/**
	 * 公司信息添加页面
	 *
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
		public function create(){
    	return view('Admin.Company.Company.create');
		}

	/**
	 *
	 * 注册公司信息
	 *
	 * @param Request $query
	 *
	 * @return array
	 */
		public function store(Request $query){
			$validator = Validator::make($query->all(),[
				'comp_cname' => 'unique:company,comp_cname',      //公司名称唯一
				'comp_ename' => 'unique:company,comp_ename',       //英文名称唯一
				'credit_code' => 'unique:company,credit_code' ,   //公司信用码唯一
				'corp_idcard' => 'unique:company,corp_idcard'      //法人身份证
			]);
			if($validator -> errors() -> get('comp_cname')){
				return [
					'code'  => config('myconfig.company.comp_cname_code'),
					'msg'   => config('myconfig.company.comp_cname_msg')
				];
			}
			if($validator -> errors() -> get('comp_ename')){
				return [
					'code'  => config('myconfig.company.comp_ename_code'),
					'msg'   => config('myconfig.company.comp_ename_msg')
				];
			}
			if($validator -> errors() -> get('corp_idcard')){
				return [
					'code'  => config('myconfig.company.corp_idcard_code'),
					'msg'   => config('myconfig.company.corp_idcard_msg')
				];
			}
			if($validator -> errors() -> get('credit_code')){
				return [
					'code'  => config('myconfig.company.credit_code_code'),
					'msg'   => config('myconfig.company.credit_code_msg')
				];
			}
			$data['comp_cname'] = $query -> input('comp_cname'); //中文名称
			$data['comp_ename'] = $query -> input('comp_ename'); //英文名称
			$data['corporation'] = $query -> input('corporation'); //公司法人代表信息
			$data['corp_idcard'] = $query -> input('corp_idcard'); //公司法人身份证号
			$data['corp_mobile'] = $query -> input('corp_mobile'); //公司法人手机号
			$data['credit_code'] = $query -> input('credit_code'); //中文名称
			$data['address'] = $query -> input('address'); //中文名称
			$data['telphone'] = $query -> input('telphone'); //中文名称
			$data['license'] = $query -> input('license'); //中文名称
			$data['comp_type'] = $query -> input('comp_type'); //中文名称
			$data['scope'] = $query -> input('scope'); //中文名称
			$data['reg_capital'] = $query -> input('reg_capital'); //中文名称
			$data['contacts'] = $query -> input('contacts'); //中文名称
			$data['cont_mobile'] = $query -> input('cont_mobile'); //中文名称
			$data['cont_idcard'] = $query -> input('cont_idcard'); //中文名称
			//时间日期格式转化时间戳
			$data['created_date'] = strtotime($query -> input('created_date')); //注册时间
			$data['business_date'] = strtotime($query -> input('business_date')); //中文名称
			$data['expire_date'] = strtotime($query -> input('expire_date')); //中文名称
			$data['created_at'] = time();
			$data['people'] = Session::get('session_member.id');

			$info = Company::store_company($data);
			if($info){
				return [
					'code' => config('myconfig.company.company_store_success_code'),
					'msg'   => config('myconfig.company.company_store_success_msg')
				];
			}else{
				return [
					'code'   => config('myconfig.company.company_store_error_code'),
					'msg'    => config('myconfig.company.company_store_error_msg')
				];
			}
		}

	/**
	 *
	 * 修改公司信息页面
	 *
	 * @param $comp_id
	 *
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
		public function edit($comp_id){
			$data['company'] = Company::get_d_company($comp_id);
			return view('Admin.Company.Company.edit') -> with($data);
		}

	/**
	 *
	 * 修改公司信息
	 *
	 * @param Request $query
	 *
	 * @return array
	 */
		public function update(Request $query){
			$comp_id = $query -> input('comp_id');        //要修改的数据自增id
			$validator = Validator::make($query->all(),[
				'comp_cname' => 'unique:company,comp_cname,'.$comp_id.',comp_id',      //公司名称唯一
				'comp_ename' => 'unique:company,comp_ename,'.$comp_id.',comp_id',       //英文名称唯一
				'credit_code' => 'unique:company,credit_code,'.$comp_id .',comp_id',   //公司信用码唯一
				'corp_idcard' => 'unique:company,corp_idcard,'.$comp_id.',comp_id'      //法人身份证
			]);

			if($validator -> errors() -> get('comp_cname')){
				return [
					'code'  => config('myconfig.company.comp_cname_code'),
					'msg'   => config('myconfig.company.comp_cname_msg')
				];
			}
			if($validator -> errors() -> get('comp_ename')){
				return [
					'code'  => config('myconfig.company.comp_ename_code'),
					'msg'   => config('myconfig.company.comp_ename_msg')
				];
			}
			if($validator -> errors() -> get('corp_idcard')){
				return [
					'code'  => config('myconfig.company.corp_idcard_code'),
					'msg'   => config('myconfig.company.corp_idcard_msg')
				];
			}
			if($validator -> errors() -> get('credit_code')){
				return [
					'code'  => config('myconfig.company.credit_code_code'),
					'msg'   => config('myconfig.company.credit_code_msg')
				];
			}
			$data['comp_cname'] = $query -> input('comp_cname'); //中文名称
			$data['comp_ename'] = $query -> input('comp_ename'); //英文名称
			$data['corporation'] = $query -> input('corporation'); //公司法人代表信息
			$data['corp_idcard'] = $query -> input('corp_idcard'); //公司法人身份证号
			$data['corp_mobile'] = $query -> input('corp_mobile'); //公司法人手机号
			$data['credit_code'] = $query -> input('credit_code'); //中文名称
			$data['address'] = $query -> input('address'); //中文名称
			$data['telphone'] = $query -> input('telphone'); //中文名称
			$data['license'] = $query -> input('license'); //中文名称
			$data['comp_type'] = $query -> input('comp_type'); //中文名称
			$data['scope'] = $query -> input('scope'); //中文名称
			$data['reg_capital'] = $query -> input('reg_capital'); //中文名称
			$data['contacts'] = $query -> input('contacts'); //中文名称
			$data['cont_mobile'] = $query -> input('cont_mobile'); //中文名称
			$data['cont_idcard'] = $query -> input('cont_idcard'); //中文名称
			//时间日期格式转化时间戳
			$data['created_date'] = strtotime($query -> input('created_date')); //注册时间
			$data['business_date'] = strtotime($query -> input('business_date')); //中文名称
			$data['expire_date'] = strtotime($query -> input('expire_date')); //中文名称
			$data['updated_at'] = time();

			$info = Company::update_d_company($comp_id,$data);

			if($info){
				return [
					'code'   => config('myconfig.company.update_company_success_code'),
					'msg'    => config('myconfig.company.update_company_success_msg')
				];
			}else{
				return [
					'code'   => config('myconfig.company.update_company_error_code'),
					'msg'    => config('myconfig.company.update_company_error_msg')
				];
			}
		}

	/**
	 *
	 * 删除公司信息（单挑）
	 *
	 *
	 * @param Request $query
	 *
	 * @return array
	 */
		public function destroy(Request $query){
			$comp_id = $query -> input('comp_id');

			$info = Company::delete_d_company($comp_id);

			if($info){
				return [
					'code'    => config('myconfig.company.delete_company_success_code'),
					'msg'     => config('myconfig.company.delete_company_success_msg')
				];
			}else{
				return [
					'code'        => config('myconfig.company.delete_company_error_code'),
					'msg'         => config('myconfig.company.delete_company_error_msg')
				];
			}
		}

	/**
	 *
	 * 查看公司信息
	 *
	 * @param $comp_id
	 *
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
		public function view($comp_id){
			$data['company'] = Company::get_d_company($comp_id);

			return  view('Admin.Company/Company/view') -> with($data);
		}


	/**
	 *
	 * 公司信息多选删除
	 *
	 * @param Request $query
	 *
	 * @return array
	 */
		public function destroy_all(Request $query){
			$comp_id = $query -> input('comp_id');

			$info = Company::delete_all_company($comp_id);

			if($info){
				return [
					'code'    => config('myconfig.company.delete_company_success_code'),
					'msg'     => config('myconfig.company.delete_company_success_msg')
				];
			}else{
				return [
					'code'        => config('myconfig.company.delete_company_error_code'),
					'msg'         => config('myconfig.company.delete_company_error_msg')
				];
			}
		}


	/**
	 *
	 * 修改公司状态
	 *
	 * @param Request $query
	 *
	 * @return array
	 */
		public function status(Request $query){
			$comp_id = $query -> input('comp_id');
			$status = $query -> input('status');

			if($status == 1){
				$data['status'] = 0;
			}else{
				$data['status'] = 1;
			}


			$info = Company::update_d_status($comp_id,$data);


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
