<?php

namespace App\Http\Controllers\Admin\Signinfo;

use Illuminate\Http\Request;
use App\Http\Controllers\SessionController;
use App\Models\admin\Signinfo;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

class SigninfoController extends SessionController
{

	//展示展示签约
	public function index($perid){
		$data = $this -> session();
		$data['per_menu'] = $this -> get_per();
		$data['page_name'] = trans( 'signinfo.page_name' );
		$data['page_detail'] = trans( 'signinfo.page_detail' );
		$data['page_tips'] = trans( 'index.page_tips' );
		$data['page_note'] = trans( 'index.page_note' );
		$page = config('myconfig.config.page_num');

		$data['name'] = $name = Input::get('name');
		$data['iphone'] = $iphone = Input::get('iphone');

		$data['sig'] = Signinfo::get_all_sig($name,$iphone,$page);
//		dd($data['sig']);
		$data['ids'] = $perid;
		return view('Admin.Signinfo.Signinfo.index') -> with($data);
	}


	//查询出客户以办理的认购并且财务已经审核通过
    public function get_buy_cust($buyid){
    	$data['buy_info'] = Signinfo::get_buy_cust($buyid);
//	dd($data);
    	return view('Admin.Signinfo.Signinfo.create') -> with($data);
		}

		//新增到数据库
	public function store(Request $query){
    	$validator = Validator::make($query-> all(),[
    		'sign_remarks' => 'min:5|max:10',
			]);
    	if($validator -> errors() -> get('sign_remarks')){
    		return [
    			'code'         => config('myconfig.signinfo.sign_remarks_code'),
					'msg'          => config('myconfig.signinfo.sign_remarks_msg')
				];
			}
    $data['cust_id'] = $query -> input('cust_id');//客户id
		$data['homeid']  = $query -> input('homeid'); //房源id
		$data['buyid'] = $buy = $query -> input('buyid');//认购信息id
		$data['sign_type']  = $query -> input('sign_type');//客户选择的签约类型
		$data['sign_remarks'] =$query -> input('sign_remarks');//签约职业顾问备注
		$data['delay_time'] = strtotime($query -> input('delay_time')); //延迟签约具体时间
		$data['sign_applytime'] = time();
		$data['created_at']    = time();

//		print_r($data);die;

		$info = Signinfo::store_sig($data);

		if($info){
//			$buy_id = $query -> input('buyid');
			$data1['sig_status'] =  2;   //签约申请成功
			Signinfo::update_buy_status($buy,$data1);
			return [
				'code'         => config('myconfig.signinfo.sign_store_success_code'),
				'msg'          => config('myconfig.signinfo.sign_store_success_msg')
			];
		}else{
			return [
				'code'         => config('myconfig.signinfo.sign_store_error_code'),
				'msg'          => config('myconfig.signinfo.sign_store_error_msg')
			];
		}
	}


	//查看详情
	public function view($sigid){
		$data['sig'] = Signinfo::get_d_sig($sigid);
//		dd($data);
		return view('Admin.Signinfo.Signinfo.view') -> with($data);
	}

	//签约修改页面
	public function edit($sigid){
		$data['sig'] = Signinfo::get_sig($sigid);
//		dd($data['sig']);
		return view('Admin.Signinfo.Signinfo.edit') ->with($data);
	}


	//更新数据
	public function update(Request $query){
		$validator = Validator::make($query-> all(),[
			'sign_remarks' => 'min:5|max:10',
		]);
		if($validator -> errors() -> get('sign_remarks')){
			return [
				'code'         => config('myconfig.signinfo.sign_remarks_code'),
				'msg'          => config('myconfig.signinfo.sign_remarks_msg')
			];
		}
		$sigid = $query -> input('sigid');
		$data['sign_type'] = $query -> input('sign_type');
		$data['delay_time'] = strtotime($query -> input('delay_time')); //延迟签约具体时间
		$data['sign_remarks'] = $query -> input('sign_remarks');
		$update = Signinfo::update_sig($sigid,$data);
		if($update){
			return [
				'code'        => config('myconfig.signinfo.update_success_sig_code'),
				'msg'         => config('myconfig.signinfo.update_success_sig_msg')
			];
		}else{
			return [
				'code'           => config('myconfig.signinfo.update_error_sig_code'),
				'msg'            => config('myconfig.signinfo.update_error_sig_msg')
			];
		}
	}


	//删除数据
	public function destroy(Request $query){
		$sigid = (int)$query -> input('signid');

		$info = Signinfo::delete_d_sig($sigid);

		if($info){
			return [
				'code'    => config('myconfig.signinfo.delete_sig_success_code'),
				'msg'     => config('myconfig.signinfo.delete_sig_success_msg')
			];
		}else{
			return [
				'code'         => config('myconfig.signinfo.delete_sig_error_code'),
				'msg'           => config('myconfig.signinfo.delete_sig_error_msg')
			];
		}
	}


	//多选删除

	public function destroy_all(Request $query){
		$sigid  = $query -> input('sigid');
		$destroy_all = Signinfo::delete_all_sig($sigid);
		if($destroy_all){
			return [
				'code'    => config('myconfig.signinfo.delete_sig_success_code'),
				'msg'     => config('myconfig.signinfo.delete_sig_success_msg')
			];
		}else{
			return [
				'code'         => config('myconfig.signinfo.delete_sig_error_code'),
				'msg'           => config('myconfig.signinfo.delete_sig_error_msg')
			];
		}
	}


	//签约经理审核页面
	public function review($sigid,$buyid){
		$data['sigid'] = $sigid;
		$data['buyid'] = $buyid;
		return view('Admin.Signinfo.Signinfo.review') ->with($data);
	}


	//签约经理
	public function update_review(Request $query){
		$sigid = $query -> input('sigid');

		$data['sign_status'] = $query -> input('sign_status');
		$data['verify_remarks'] = $query -> input('verify_remarks');
		$data['sign_verifytime'] = time();
		$review = Signinfo::update_review($sigid,$data);
		if($review){
			if($data['sign_status'] == 0){
				Signinfo::buy_sig_status($query -> input('buyid'));
				return [
						'code'         => config('myconfig.signinfo.review_sigs_success_code'),
						'msg'           => config('myconfig.signinfo.review_sigs_success_msg')
				];
			}else{
				return [
					'code'         => config('myconfig.signinfo.review_sig_success_code'),
					'msg'           => config('myconfig.signinfo.review_sig_success_msg')
				];
			}
		}else{
			return [
				'code'         => config('myconfig.signinfo.review_sig_error_code'),
				'msg'           => config('myconfig.signinfo.review_sig_error_code')
			];
		}
	}

	//财务审核
	public function cwview($sigid,$buyid,$homeid){
		$data['sigid'] = $sigid;
		$data['buyid'] = $buyid;
		$data['homeid'] = $homeid;
		return view('Admin.Signinfo.Signinfo.cwview') ->with($data);
	}

//财务审核更新
	public function update_cwview(Request $query){
		$sigid = $query -> input('sigid');
		$data['finance_remarks'] = $query -> input('finance_remarks');
		$data['finance_status'] = $query -> input('finance_status');
		$data['finance_verifytime'] = time();
		$cwview = Signinfo::update_review($sigid,$data);

		if($cwview){
			if($data['finance_status'] == 0){
				Signinfo::buy_sig_status($query -> input('buyid'));
				return [
					'code'         => config('myconfig.signinfo.cwview_sigs_success_code'),
					'msg'           => config('myconfig.signinfo.cwview_sigs_success_msg')
				];
			}else{
				Signinfo::update_home($query -> input('homeid'));
				return [
					'code'         => config('myconfig.signinfo.cwview_sig_success_code'),    //成功
					'msg'           => config('myconfig.signinfo.cwview_sig_success_msg')
				];
			}
		}else{
			return [
				'code'         => config('myconfig.signinfo.cwview_sig_error_code'),    //成功
				'msg'           => config('myconfig.signinfo.cwview_sig_error_msg')
			];
		}


	}














	//延迟签约管理
	//展示延迟签约
	public function index_delay($perid){
		$data = $this -> session();
		$data['per_menu'] = $this -> get_per();
		$data['page_name'] = trans( 'signinfo.page_name' );
		$data['page_detail'] = trans( 'signinfo.page_detaill' );
		$data['page_tips'] = trans( 'index.page_tips' );
		$data['page_note'] = trans( 'index.page_note' );
		$page = config('myconfig.config.page_num');

		$data['name'] = $name = Input::get('name');
		$data['iphone'] = $iphone = Input::get('iphone');

		$data['sig'] = Signinfo::get_all_delay($name,$iphone,$page);
//		dd($data['sig']);
		$data['ids'] = $perid;
		return view('Admin.Delaysig.Delaysig.index') -> with($data);
	}

	//签约页面
	public function get_buy_custt($sigid){
		$buy = Signinfo::get_dan_sig($sigid);

		$data['buy_info'] = Signinfo::get_buy_cust($buy -> buyid);
		$data['signid'] = $sigid;
		return view('Admin.Delaysig.Delaysig.create') -> with($data);
	}

	//添加签约
	public function delay_store(Request $query)
	{
		$validator = Validator::make($query-> all(),[
			'sign_remarks' => 'min:5|max:10',
		]);
		if($validator -> errors() -> get('sign_remarks')){
			return [
				'code'         => config('myconfig.signinfo.sign_remarks_code'),
				'msg'          => config('myconfig.signinfo.sign_remarks_msg')
			];
		}
		$data['cust_id'] = $query -> input('cust_id');//客户id
		$data['homeid']  = $query -> input('homeid'); //房源id
		$data['buyid'] = $buy = $query -> input('buyid');//认购信息id
		$data['sign_type']  = $query -> input('sign_type');//客户选择的签约类型
		$data['sign_remarks'] =$query -> input('sign_remarks');//签约职业顾问备注
		$data['sign_applytime'] = time();
		$data['created_at']    = time();
		$info = Signinfo::store_sig($data);
		if($info){
//
			$signid = $query -> input('signid');

			Signinfo::update_j($signid);

			return [
				'code'         => config('myconfig.signinfo.sign_store_success_code'),
				'msg'          => config('myconfig.signinfo.sign_store_success_msg')
			];
		}else{
			return [
				'code'         => config('myconfig.signinfo.sign_store_error_code'),
				'msg'          => config('myconfig.signinfo.sign_store_error_msg')
			];
		}
	}

	//延迟签约修改页面
	public function delay_edit($signid)
	{
		$data['sig'] = Signinfo::get_delay_sig($signid);
		//dd($data['sig']);
		return view('Admin.Delaysig.Delaysig.edit') ->with($data);
	}

	//延迟签约数据更新
	public function delay_destroy(Request $query)
	{
		$signid = $query -> input('signid');
		$validator = Validator::make($query-> all(),[
			'sign_remarks' => 'min:5|max:10',
		]);
		if($validator -> errors() -> get('sign_remarks')){
			return [
				'code'         => config('myconfig.signinfo.sign_remarks_code'),
				'msg'          => config('myconfig.signinfo.sign_remarks_msg')
			];
		}
		$data['sign_remarks'] =$query -> input('sign_remarks');//签约职业顾问备注
		$data['updated_at'] = time();
		$delay_des = Signinfo::update_d_delay($signid,$data);
		if($delay_des){
			return [
				'code'        => config('myconfig.signinfo.update_success_sig_code'),
				'msg'         => config('myconfig.signinfo.update_success_sig_msg')
			];
		}else{
			return [
				'code'           => config('myconfig.signinfo.update_error_sig_code'),
				'msg'            => config('myconfig.signinfo.update_error_sig_msg')
			];
		}
	}

	//延迟签约详情
	public function delay_view($signid)
	{
		$data['sig'] = Signinfo::get_d_delay($signid);
		return view('Admin.Delaysig.Delaysig.view') -> with($data);
	}

	//延迟签约删除单条
	public function del(Request $query)
	{
		$signid = $query -> input('signid');
		$del = Signinfo::delay_d_del($signid);
		if($del){
			return [
				'code'    => config('myconfig.signinfo.delete_sig_success_code'),
				'msg'     => config('myconfig.signinfo.delete_sig_success_msg')
			];
		}else{
			return [
				'code'         => config('myconfig.signinfo.delete_sig_error_code'),
				'msg'           => config('myconfig.signinfo.delete_sig_error_msg')
			];
		}
	}

	//延迟签约全选删除
	public function delay_destroy_all(Request $query)
	{
		$sigid = $query -> input('sigid');
		$destroy_all = Signinfo::delay_all_del($sigid);
		if($destroy_all){
			return [
				'code'    => config('myconfig.signinfo.delete_sig_success_code'),
				'msg'     => config('myconfig.signinfo.delete_sig_success_msg')
			];
		}else{
			return [
				'code'         => config('myconfig.signinfo.delete_sig_error_code'),
				'msg'           => config('myconfig.signinfo.delete_sig_error_msg')
			];
		}
	}
}
