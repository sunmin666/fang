<?php

	namespace App\Http\Controllers\Admin\Change;


	use Illuminate\Http\Request;
	use App\Http\Controllers\SessionController;
	use App\Models\admin\Change;
	use Illuminate\Support\Facades\Validator;


	class ChaneController extends SessionController {

		//换房展示页面
		public function index($perid){
			$data = $this -> session();
			$data['per_menu'] = $this -> get_per();
			$data['page_name'] = trans( 'change.page_name' );
			$data['page_detail'] = trans( 'change.page_detail' );
			$data['page_tips'] = trans( 'index.page_tips' );
			$data['page_note'] = trans( 'index.page_note' );
			$page = config('myconfig.config.page_num');
			$data['change'] = Change::get_all_change($page);
//						dd($data['change']);
			$data['ids'] = $perid;

			return view('Admin.Change.Change.index') -> with($data);

		}


		//换房新增页面
		public function create( $buyid , $homeid )
		{

			//查询客户认购的信息
			$data['cust'] = Change::get_d_buy_home( $buyid );
			//查询所购买的房源信息

			$data['home'] = Change::get_home_d( $homeid );
			//查询所有的楼号信息
			$data['buildnum'] = Change::get_all_buildnum();
			//			dd($data);
			return view( 'Admin.Change.Change.create' )->with( $data );
		}

		//换房新增信息
		public function store( Request $query )
		{
			$validator = Validator::make($query -> all(),[
				'remarks'  => 'min:5|max:255',
			]);

			if($validator -> errors() -> get('remarks')){
				return [
					'code'     => config('myconfig.changeh.remarks_code'),
					'msg'      => config('myconfig.changeh.remarks_msg')
				];
			}

			$data['cust_id'] = $query -> input('cust_id');
			$data['old_homeid'] = $query -> input('old_homeid');   //老房源id
			$data['new_homeid'] = $home_id = $query -> input('new_homeid');   //新房源id
			$data['remarks'] = $query -> input('remarks');
			$data['buyid'] = $query -> input('buyid');
			$data['type'] = $query -> input('type');
			$data['created_at'] = time();

			$change = Change::store_changinfo($data);

			if($change){
				//更改新房源状态信息
				Change::update_home($home_id);
				return [
					'code'    => config('myconfig.changeh.store_change_success_code'),
					'msg'    => config('myconfig.changeh.store_change_success_msg'),
				];
			}else{
				return [
					'code'    => config('myconfig.changeh.store_change_error_code'),
					'msg'   => config('myconfig.changeh.store_change_error_msg')
				];
			}
		}

		//查看详情
		public function view($chan_id){
			$data['chang_home'] = Change::get_d_changeinfo($chan_id);
//			dd($data);
			return view('Admin.change.change.view') -> with($data);
		}

		//修改信息详情
		public function edit($chan_id){
			$data['chang_home'] = Change::get_d_changeinfo($chan_id);
//			dd($data);
			return view('Admin.change.change.edit') -> with($data);
		}



		//更新换房信息
		public function update(Request $query){
			$chan_id = $query -> input('chan_id');
			$data['remarks'] = $query -> input('remarks');

			$update = Change::update_changeinfo($chan_id,$data);

			if($update){
				return [
					'code'    => config('myconfig.changeh.update_success_change_code'),
					'msg'     => config('myconfig.changeh.update_success_change_msg')
				];
			}else{
				return [
					'code'    => config('myconfig.changeh.update_error_change_code'),
					'msg'     => config('myconfig.changeh.update_error_change_msg')
				];
			}
		}

		//删除信息
		public function destroy(Request $query){
			$chan_id = (int)$query -> input('chan_id');

			$delete = Change::delete_d_change($chan_id);

			if($delete){
				return [
					'code'    => config('myconfig.changeh.delete_success_change_code'),
					'msg'     => config('myconfig.changeh.delete_success_change_msg')
				];
			}else{
				return [
					'code'    => config('myconfig.changeh.delete_error_change_code'),
					'msg'     => config('myconfig.changeh.delete_error_change_msg')
				];
			}

		}

		//多选删除
		public function destroy_all(Request $query){
			$chan_id = $query -> input('chan_id');

			$delete = Change::delete_all_changeingo($chan_id);

			if($delete){
				return [
					'code'    => config('myconfig.changeh.delete_success_change_code'),
					'msg'     => config('myconfig.changeh.delete_success_change_msg')
				];
			}else{
				return [
					'code'    => config('myconfig.changeh.delete_error_change_code'),
					'msg'     => config('myconfig.changeh.delete_error_change_msg')
				];
			}

		}


		//经理审核页面
		public function review($chan_id,$new_homeid){
			$data['chan_id'] = $chan_id;
			$data['new_homeid'] = $new_homeid;
			return view('Admin.Change.Change.review') -> with($data);

		}

		//经理审核
		public function update_review(Request $query){
			$chan_id = $query -> input('chan_id');
			$data['status'] = $status = $query -> input('status');
			$data['verify_remarks'] = $query -> input('verify_remarks');
			$data['verifytime'] = time();

			$update_re = Change::update_re_change($chan_id,$data);

			if($update_re){
					if($status == 0){
						$new_homeid = $query ->input('new_homeid');
						Change::update_homeinfo($new_homeid);
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


		//财务审核
		public function cwview($chan_id,$old_homeid,$new_homeid){
			$data['chan_id'] = $chan_id;
			$data['old_homeid'] = $old_homeid;
			$data['new_homeid'] = $new_homeid;
//			dd($data);
			return view('Admin.Change.Change.cwview') -> with($data);
		}

//财务审核
		public function update_cwview(Request $query){
			$chan_id = $query -> input('chan_id');
			//查询buyid 更改buyid房源信息

			$buyid = Change::get_d_buyid($chan_id);

			$data['finance_status'] = $status = $query -> input('finance_status');
			$data['finance_remarks'] = $query -> input('finance_remarks');
			$data['finance_time'] = time();
			$update_cw = Change::update_re_change($chan_id,$data);
			if($update_cw){
				if($status == 0){
					$new_homeid = $query ->input('new_homeid');
					Change::update_homeinfo($new_homeid);
					return [
						'code'          => config('myconfig.buy.buy_cwview_successe_code'),
						'msg'           => config('myconfig.buy.buy_cwview_successe_msg'),
					];
				}else{
					$new_homeid = $query ->input('new_homeid');   //新房子id
					$old_homeid = $query -> input('old_homeid');   //老房子

					Change::update_homeinfo($old_homeid);
					Change::get_new_homeid_buyid($new_homeid,$buyid-> buyid);
					Change::get_d_buy_homeid($buyid-> buyid,$new_homeid);
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
