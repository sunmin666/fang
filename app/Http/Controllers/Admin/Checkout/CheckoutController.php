<?php

namespace App\Http\Controllers\Admin\Checkout;

use DemeterChain\C;
use Illuminate\Http\Request;
use App\Http\Controllers\SessionController;
use App\Models\admin\Checkout;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;


class CheckoutController extends SessionController
{

	//退房信息用户展示
	public function index($perid){
		$data = $this -> session();
		$data['per_menu'] = $this -> get_per();
		$data['page_name'] = trans( 'change.page_name' );
		$data['page_detail'] = trans( 'checkout.page_detail' );
		$data['page_tips'] = trans( 'index.page_tips' );
		$data['page_note'] = trans( 'index.page_note' );
		$page = config('myconfig.config.page_num');

		$data['name'] = $name = Input::get('name');
		$data['iphone'] = $iphone = Input::get('iphone');

		$data['checkout'] = Checkout::get_all_change($name,$iphone,$page);
//								dd($data['checkout']);
		$data['ids'] = $perid;
		return view('Admin.Checkout.Checkout.index') -> with($data);
	}


    //退房信息新增页面
	public function create($buyid,$homeid,$cust_id,$status){
		//查询数据
		$data['cust'] = Checkout::get_cust_d($cust_id);
		//查询房子信息
		$data['home'] = Checkout::get_home_d($homeid);
		$data['buyid'] = $buyid;
		$data['status'] = $status;

//		dd($data);
		return view('Admin.Checkout.Checkout.create') -> with($data);
	}


	//退房信息新增
	public function store(Request $query){
		$validator = Validator::make($query -> all(),[
			'remarks'  => 'min:5|max:255',
		]);

		if($validator -> errors() -> get('remarks')){
			return [
				'code'     => config('myconfig.changeh.remarks_code'),
				'msg'      => config('myconfig.changeh.remarks_msg')
			];
		}

		$status = $query -> input('status');

		$data['cust_id'] = $query -> input('cust_id');
		$data['old_homeid'] = $query -> input('old_homeid');
		$data['remarks'] = $query -> input('remarks');
		$data['type'] = $query -> input('type');
		$data['buyid'] = $query -> input('buyid').$status;
		$data['created_at'] = time();

		$store = Checkout::store_changeinfo($data);

		if($store){
			return [
				'code'     => config('myconfig.checkout.store_success_change_code'),
				'msg'      => config('myconfig.checkout.store_success_change_msg')
			];
		}else{
			return [
				'code'     => config('myconfig.checkout.store_error_change_code'),
				'msg'      => config('myconfig.checkout.store_error_change_msg')
			];
		}
	}

	//修改退房信息页面
	public function edit($chan_id){
		$data['checkout'] = Checkout::get_d_chengeinfo($chan_id);
//		dd($data['checkout']);
		return view('Admin.Checkout.Checkout.edit') -> with($data);
	}

//修改退房记录
	public function update(Request $query){
		$validator = Validator::make($query -> all(),[
			'remarks'  => 'min:5|max:255',
		]);

		if($validator -> errors() -> get('remarks')){
			return [
				'code'     => config('myconfig.checkout.remarks_code'),
				'msg'      => config('myconfig.checkout.remarks_msg')
			];
		}

		$chan_id = $query -> input('chan_id');
		$data['remarks'] = $query -> input('remarks');

		$update_chan = Checkout::update_d_chan($chan_id,$data);

		if($update_chan){
			return [
				'code'     => config('myconfig.checkout.update_success_chang_code'),
				'msg'      => config('myconfig.checkout.update_success_chang_msg')
			];
		}else{
			return [
				'code'     => config('myconfig.checkout.update_error_chang_code'),
				'msg'      => config('myconfig.checkout.update_error_chang_msg')
			];
		}
	}

	//查看详情
	public function view($chan_id){
		$data['checkout'] = Checkout::get_d_chengeinfo($chan_id);
//		dd($data);
		return view('Admin.Checkout.Checkout.view') -> with($data);
	}

	//删除信息
	public function destroy(Request $query){
		$chan_id = $query -> input('chan_id');

		$delete = Checkout::delete_d_chan($chan_id);

		if($delete){
			return [
				'code'     => config('myconfig.checkout.delete_success_chang_code'),
				'msg'      => config('myconfig.checkout.delete_success_chang_msg')
			];
		}	else{
			return [
				'code'     => config('myconfig.checkout.delete_error_chang_code'),
				'msg'      => config('myconfig.checkout.delete_error_chang_msg')
			];
		}
	}


	//多选删除
	public function destroy_all(Request $query){
		$chan_id = $query -> input('chan_id');

		$delete_all = Checkout::delete_all_chan($chan_id);

		if($delete_all){
			return [
				'code'     => config('myconfig.checkout.delete_success_chang_code'),
				'msg'      => config('myconfig.checkout.delete_success_chang_msg')
			];
		}else{
			return [
				'code'     => config('myconfig.checkout.delete_error_chang_code'),
				'msg'      => config('myconfig.checkout.delete_error_chang_msg')
			];
		}
	}

	//经理审核
	public function review($chan_id){
		$data['chan_id'] = $chan_id;
		return view('Admin.Checkout.Checkout.review') -> with($data);
	}

	public function update_review(Request $query){

		$chan_id = $query -> input('chan_id');
		$data['status'] = $status = $query -> input('status');
		$data['verify_remarks'] = $query -> input('verify_remarks');
		$data['verifytime'] = time();

		$if = Checkout::update_review($chan_id,$data);
		if($if){
			if($status == 0){
				return [
					'code'          => config('myconfig.buy.buy_review_successe_code'),
					'msg'           => config('myconfig.buy.buy_review_successe_msg'),
				];
			}else{
				return [
					'code'          => config('myconfig.buy.buy_review_success_code'),
					'msg'           => config('myconfig.buy.buy_review_success_msg'),
				];
			}
		}else{
			return [
				'code'          => config('myconfig.buy.buy_review_error_code'),
				'msg'           => config('myconfig.buy.buy_review_error_msg'),
			];
		}
	}


	//财务审核页面
	public function cwview($chan_id,$old_homeid,$buyid){
		$data['chan_id'] = $chan_id;
		$data['old_homeid'] = $old_homeid;
		$data['buyid'] = $buyid;
		return view('Admin.Checkout.Checkout.cwview') -> with($data);
	}


	//财务审核页面
	public function update_cwview(Request $query){

		$chan_id = $query -> input('chan_id');
		$data['finance_status'] = $status = $query -> input('finance_status');
		$data['finance_remarks'] = $query -> input('finance_remarks');
		$data['finance_time'] = time();

		$updatecw = Checkout::update_cwview($chan_id,$data);
		if($updatecw){
			if($status == 0){
				return [
					'code'          => config('myconfig.buy.buy_cwview_successe_code'),
					'msg'           => config('myconfig.buy.buy_cwview_successe_msg'),
				];
			}else{
				$home = $query -> input('old_homeid');
				$buyid = $query -> input('buyid');
				$statuss = substr($buyid,1,1);
				$buy = substr($buyid,0,1);
				if($statuss == 1){
					Checkout::buyinfo($buy);
				}else{
					Checkout::sin($buy);
					//查询buyinfo id
					$buyidssss = Checkout::get_d_buyinfo($buy);
					Checkout::buyinfo($buyidssss -> buyid);
				}
				Checkout::update_home($home);
				return [
					'code'          => config('myconfig.buy.buy_cwview_success_code'),
					'msg'           => config('myconfig.buy.buy_cwview_success_msg'),
				];
			}
		}else{
			return [
				'code'          => config('myconfig.buy.buy_cwview_error_code'),
				'msg'           => config('myconfig.buy.buy_cwview_error_msg'),
			];
		}

	}

}
