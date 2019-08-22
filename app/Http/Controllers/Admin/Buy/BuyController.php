<?php

namespace App\Http\Controllers\Admin\Buy;

use App\Models\admin\Buy;
use Illuminate\Http\Request;
use App\Http\Controllers\SessionController;
use Illuminate\Support\Facades\Validator;

class BuyController extends SessionController
{

	/**
	 * 认购展示信息
	 *
	 * @param $perid
	 *
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
    public function index($perid){
			$data = $this -> session();
			$data['per_menu'] = $this -> get_per();
			$data['page_name'] = trans( 'buy.page_name' );
			$data['page_detail'] = trans( 'buy.page_detail' );
			$data['page_tips'] = trans( 'index.page_tips' );
			$data['page_note'] = trans( 'index.page_note' );
			$page = config('myconfig.config.page_num');
//			$data['consu'] = Consu::get_all_consu($page);
			//			dd($data['consu']);
			$data['ids'] = $perid;
			return view('Admin.Buy.Buy.index') -> with($data);
		}

		//根据单元号查去homeinfo该单元下的房子status=1
	public function unitnum(Request $query){
    	$unitnum = $query -> input('unitnum');
			$home = Buy::get_homeinfo($unitnum);
			return $home;
	}



	/**
	 * 认购添加页面
	 *
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
		public function create(){
    	//查询所有的楼号
			$data['home'] = Buy::fieid();
			//查询所有用户
			$data['customer'] = Buy::get_cus();
			return view('Admin.Buy.Buy.create') -> with($data);
 		}

 		//根据客户（买房子的人）id查询出用户的信息
 		public function customer_change(Request $query){
			$cust_id = $query -> input('cust_id');
			 $data = Buy::get_cust_d($cust_id);
			 return $data;
		}

		//根据房子id查出房子详情
	public function homeinfo_view(Request $query){
			$field_id = $query -> input('field_id');
			$data = Buy::get_homeinfo_view($field_id);
			return $data;
	}




 		//添加认购信息
//	public function store(Request $query){
//		$validator = Validator::make($query -> all(),[
//			'remarks'  => 'min:5|max:255',
//		]);
//
//		if($validator -> errors() -> get('remarks')){
//			return [
//				'code'          => config('myconfig.buy.remarks_code'),
//				'msg'          => config('myconfig.buy.remarks_msg'),
//			];
//		}
//		$data['homeid'] = $query ->input('homeid');
//		$status = Buy::get_home_d($data['homeid']);
//		if($status -> status != 0){
//			return [
//				'code'          => config('myconfig.buy.homeinfo_code'),
//				'msg'          => config('myconfig.buy.homeinfo_msg'),
//			];
//		}
//		$data['cust_id'] = $query -> input('cust_id');
//		$data['lock_time'] = $query -> input('lock_time');
//		if($data['lock_time'] == ''){
//			$data['lock_time'] = time() + 3600;
//		}else{
//			$data['lock_time'] = $query -> input('lock_time');
//		}
//
//		$data['pay_num'] = $query -> input('pay_num');
//		$data['pay_type'] = $query -> input('pay_type');
//		$data['remarks'] = $query ->input('remarks');
//
//
//
//	}

}
