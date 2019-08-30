<?php

namespace App\Http\Controllers\Admin\Buy;

use App\Models\admin\Buy;
use Illuminate\Http\Request;
use App\Http\Controllers\SessionController;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Admin\Homeinfo\HomeController;

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

    	$home = new HomeController();
    	$home -> automatic();
			$data = $this -> session();
			$data['per_menu'] = $this -> get_per();
			$data['page_name'] = trans( 'buy.page_name' );
			$data['page_detail'] = trans( 'buy.page_detail' );
			$data['page_tips'] = trans( 'index.page_tips' );
			$data['page_note'] = trans( 'index.page_note' );
			$page = config('myconfig.config.page_num');
			$data['buy'] = Buy::get_all_buy($page);
			//			dd($data['buy']);
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
			$data['status'] = 2;
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
	public function store(Request $query){
		$cust_id = $query -> input('cust_id');     //客户id
		$validator = Validator::make($query -> all(),[
			'remarks'  => 'min:5|max:255',
		]);

		if($validator -> errors() -> get('remarks')){
			return [
				'code'          => config('myconfig.buy.remarks_code'),
				'msg'          => config('myconfig.buy.remarks_msg'),
			];
		}
		$buy['homeid'] = $homeid = $query -> input('roomnum');//认购房子id
		$h_status = Buy::get_d_home($homeid);
		if($h_status -> status != 0 ){
			return [
				'code'          => config('myconfig.buy.homeinfo_status_code'),
				'msg'          => config('myconfig.buy.homeinfo_status_msg'),
			];
		}
		//更新用户信息

		$cust['realname'] = $query -> input('names');  // 客户姓名
		$cust['mobile'] = $query -> input('iphones'); //客户手机号
		$cust['idcard'] = $idcard =  $query -> input('shens');  //客户身份号

		$info = Buy::get_cust_idcard($cust_id,$idcard);

		if($info != 0){
			return [
				'code'          => config('myconfig.buy.shen_code'),
				'msg'          => config('myconfig.buy.shen_msg'),
			];
		}
		Buy::update_d_customer($cust_id,$cust);
		//获取认购信息
		$buy['cust_id'] = $cust_id;    //认购客户id
		$buy['pay_num'] = $query -> input('pay_num');  //缴纳金额
		$buy['pay_type'] = $query -> input('pay_type'); //付款方式
		$buy['remarks'] = $query -> input('remarks');//备注
		$buy['apply_time'] = time();
		$buy['lock_time'] = time() + 3600;   //锁定时间默认1小时
		$buy['month_pay'] = $query -> input('month_pay');  //月供
		$buy['loan_term'] = $query -> input('loan_term');  //年限
		$buy['total_price'] = $query -> input('total_prices'); //总金额
		$buy['created_at'] = time();
		$buy['sponsor'] = Session::get('session_member.username');
		$store_buy = Buy::store_buy($buy);
		$fangwug = $query -> input('fanggmunren');

//		return $fangwug;
		if($fangwug == ''){
			$fangwug = array();
		}else{
			$fangwug = $query -> input('fanggmunren');
		}
		if($store_buy){
			$buyu['buy_number'] = 10000 + $store_buy;
			Buy::update_buy_number($store_buy,$buyu);
			//添加房屋共有人
			for($g = 0; $g < count($fangwug);$g ++){
				$coowner['cust_id'] = $fangwug[$g]['cust_id'];    //客户id
				$coowner['relation'] = $fangwug[$g]['relation'];       //关系
				$coowner['realname'] = $fangwug[$g]['realname'];                //姓名
				$coowner['sex'] = $fangwug[$g]['sex'];                    //性别
				$coowner['birthday'] = strtotime($fangwug[$g]['birthday']);               //生日
				$coowner['idcard'] = $fangwug[$g]['idcard'];               //省份正海
				$coowner['mobile'] = $fangwug[$g]['mobile'];             //手机号
				$coowner['created_at'] = time();        //手机号
				Buy::store_coowner($coowner);
			}
			$hstatus['status'] = 1;
			$hstatus['buyid'] = $store_buy;
			Buy::update_status_home($homeid,$hstatus);
			return [
				'code'          => config('myconfig.buy.buy_store_success_code'),
				'msg'           => config('myconfig.buy.buy_store_success_msg'),
			];
		}else{
			return [
				'code'          => config('myconfig.buy.buy_store_error_code'),
				'msg'           => config('myconfig.buy.buy_store_error_msg'),
			];
		}
	}


	//修改认购信息页面
	public function edit($buyid){
		$data['buy'] = Buy::get_d_buy($buyid);
//		dd($data);
		return view('Admin.Buy.Buy.edit') -> with($data);
	}

	//认购信息更新
	public function update(Request $query){
		$validator = Validator::make($query -> all(),[
			'remarks'  => 'min:5|max:255',
		]);
		if($validator -> errors() -> get('remarks')){
			return [
				'code'          => config('myconfig.buy.remarks_code'),
				'msg'          => config('myconfig.buy.remarks_msg'),
			];
		}
		$cust_id = $query -> input('cust_id');     //客户id
		$cust['realname'] = $query -> input('names');  // 客户姓名
		$cust['mobile'] = $query -> input('iphones'); //客户手机号
		$cust['idcard'] = $query -> input('shens');  //客户身份号
		Buy::update_d_customer($cust_id,$cust);

		$buyid = $query -> input('buyid');
		$buy['pay_num'] = $query -> input('pay_num');  //缴纳金额
		$buy['pay_type'] = $query -> input('pay_type'); //付款方式
		$buy['remarks'] = $query -> input('remarks');//备注
		if($query -> input('lock_time') != ''){
			$buy['lock_time'] = strtotime($query -> input('lock_time'));     //锁定时间默认1小时
		}
		$buy['month_pay'] = $query -> input('month_pays');  //月供
		$buy['loan_term'] = $query -> input('loan_term');  //年限
		$buy['total_price'] = $query -> input('total_prices'); //总金额

//		print_r($buy);die;
		$update_buy = Buy::update_buy($buyid,$buy);

		if($update_buy){
			return [
				'code'          => config('myconfig.buy.buy_update_success_code'),
				'msg'           => config('myconfig.buy.buy_update_success_msg'),
			];
		}else{
			return [
				'code'          => config('myconfig.buy.buy_update_error_code'),
				'msg'           => config('myconfig.buy.buy_update_error_msg'),
			];
		}

	}

//查看认购信息
	public function view($buyid){
		$data['buy'] = Buy::get_d_buy_cg($buyid);
//			dd($data);
		return view('Admin.Buy.Buy.view') -> with($data);
	}

	public function destroy(Request $query){
			$buyid = $query -> input('buyid');

			$delete = Buy::delete_buy($buyid);
			if($delete){
				return [
					'code'          => config('myconfig.buy.buy_delete_success_code'),
					'msg'           => config('myconfig.buy.buy_delete_success_msg'),
				];
			}else{
				return [
					'code'          => config('myconfig.buy.buy_delete_error_code'),
					'msg'           => config('myconfig.buy.buy_delete_error_msg'),
				];
			}
	}


	//换房
	public function huan(Request $query){
			$homeid = $query -> input('homeid');
			$buyid  = $query -> input('buyid');
			$update = Buy::update_status($buyid);

		if($update){
			Buy::home_huan($homeid);
			return [
				'code'          => config('myconfig.buy.buy_huan_success_code'),
				'msg'           => config('myconfig.buy.buy_huan_success_msg'),
			];
		}else{
			return [
				'code'          => config('myconfig.buy.buy_huan_error_code'),
				'msg'           => config('myconfig.buy.buy_huan_error_msg'),
			];
		}

	}



	//经理审核
	public function review($buyid,$homeid){
			$data['buyid'] = $buyid;
			$data['homeid'] = $homeid;
			return view('Admin.Buy.Buy.review') -> with($data);
	}

	//财务审核页面
	public function cwview($buyid,$homeid){
		$data['buyid'] = $buyid;
		$data['homeid'] = $homeid;
		return view('Admin.Buy.Buy.cwview') -> with($data);
	}

	//经理审核提交
	public function update_review(Request $query){
			$buyid = $query -> input('buyid');
			$data['manager_verify_status'] = $query -> input('manager_verify_status');
			$data['manager_verify_remarks'] = $query -> input('manager_verify_remarks');
			$data['manager_verify_time'] = time();
			$review = Buy::update_review($buyid,$data);

			if($review){

				if($data['manager_verify_status'] == 0){
					//更改房子状态
					Buy::update_home_status($query -> input('homeid'));
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

	//财务审核提交
	public function update_cwview(Request $query){
		$buyid = $query -> input('buyid');
		$data['finance_verify_status'] = $query -> input('manager_verify_status');
		$data['finance_verify_remarks'] = $query -> input('manager_verify_remarks');
		$data['finance_verify_time'] = time();
		$review = Buy::update_review($buyid,$data);

		if($review){

			if($data['finance_verify_status'] == 0){
				//更改房子状态
				Buy::update_home_status($query -> input('homeid'));
				return [
					'code'          => config('myconfig.buy.buy_cwview_successe_code'),
					'msg'           => config('myconfig.buy.buy_cwview_successe_msg'),
				];
			}else{
				Buy::update_home_statuss($query -> input('homeid'));
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


	//在客户信息里面发起认购
	public function initiate($cust_id){
		//查询客户信息
		$data['home'] = Buy::fieid();
		//查询所有用户
		$data['customer'] = Buy::get_d_cus($cust_id);
		$data['status'] = 1;
//		dd($data);
		return view('Admin.Buy.Buy.create') -> with($data);
	}


	//多选删除认购信息
	public function destroy_all(Request $query){
			$buy_id = $query -> input('buyid');

			$delete_buy = Buy::update_buyinfo($buy_id);

		if($delete_buy){
			return [
				'code'          => config('myconfig.buy.buy_delete_success_code'),
				'msg'           => config('myconfig.buy.buy_delete_success_msg'),
			];
		}else{
			return [
				'code'          => config('myconfig.buy.buy_delete_error_code'),
				'msg'           => config('myconfig.buy.buy_delete_error_msg'),
			];
		}

	}


}
