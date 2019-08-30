<?php

	namespace App\Http\Controllers\Admin\Change;


	use Illuminate\Http\Request;
	use App\Http\Controllers\SessionController;
	use App\Models\admin\Change;
	use Illuminate\Support\Facades\Validator;


	class ChaneController extends SessionController {

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
			$data['old_homeid'] = $query -> input('old_homeid');
			$data['new_homeid'] = $query -> input('new_homeid');
			$data['remarks'] = $query -> input('remarks');
			$data['buyid'] = $query -> input('buyid');
			$data['type'] = $query -> input('type');
			$data['created_at'] = time();

			$change = Change::store_changinfo($data);

			if($change){
				return [
					'code'    => config('myconfig.changeh.store_change_success_code'),
					'msg'    => config('myconfig.changeh.store_change_success_msg')
				];
			}else{
				return [
					'code'    => config('myconfig.changeh.store_change_error_code'),
					'msg'   => config('myconfig.changeh.store_change_error_msg')
				];
			}

		}

	}
