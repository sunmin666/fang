<?php

namespace App\Http\Controllers\Admin\Homeinfo;

use Illuminate\Http\Request;
use App\Http\Controllers\SessionController;
use Illuminate\Support\Facades\Validator;

use App\Models\admin\Home;

class HomeController extends SessionController
{
	//房子信息展示页面
    public function index($perid){
			$data = $this -> session();
			$data['per_menu'] = $this -> get_per();
			$data['page_name'] = trans( 'home.page_name' );
			$data['page_detail'] = trans( 'home.page_detail' );
			$data['page_tips'] = trans( 'index.page_tips' );
			$data['page_note'] = trans( 'index.page_note' );
			$page = config('myconfig.config.page_num');
			$data['home'] = Home::get_all_homeinfo($page);
//			dd($data);
			$data['ids'] = $perid;
			return view('Admin.Home.Home.index') -> with($data);
		}

		//添加页面展示
	  public function create(){
    	//查询所有楼号
			$data['buildnum'] = Home::get_all_buildnum();
    	return view('Admin.Home.Home.create') -> with($data);
		}

		//下拉框楼号联动单元号
		public function buildnum(Request $query){
    	$field_id = $query -> input('field_id');
    	$data = Home::get_unitnum($field_id);
    	return $data;
 		}

 		//添加房源信息
    public function store(Request $query){
    	$validator = Validator::make($query -> all(),[
    		'roomnum' => 'unique:homeinfo,roomnum',
			]);

    	if($validator -> errors() -> get('roomnum')){
    		return [
    			'code'   => config('myconfig.home.roomnum_code'),
					'msg'    => config('myconfig.home.roomnum_msg')
				];
			}
    	$data['buildnum'] = $query -> input('buildnum');  //楼号
    	$data['unitnum'] = $query -> input('unitnum');  //单元号
    	$data['roomnum'] = $query -> input('roomnum');  //房号
    	$data['floor'] = $query -> input('floor');  //楼层
    	$data['build_area'] = $query -> input('build_area');  //面积
    	$data['house_img'] = $query -> input('n_img');  //户型图
    	$data['house_str'] = $query -> input('house_str');  //户型结构
    	$data['price'] = $query -> input('price');  //单价
			$data['total'] =  $data['build_area'] * $data['price'];      //总价
    	$data['discount'] = $query -> input('discount');  //折扣
    	$data['status'] = $query -> input('status');  //状态
    	$data['buyid'] = $query -> input('buyid');  //认购编号
    	$data['remarks'] = $query -> input('remarks');  //状态备注
			$data['created_at'] = time();

			$home = Home::store_homeinfo($data);
			if($home){
				return [
					'code'   => config('myconfig.home.home_success_home_code'),
					'msg'    => config('myconfig.home.home_success_home_msg')
				];
			}else{
				return [
					'code'   => config('myconfig.home.home_error_home_code'),
					'msg'    => config('myconfig.home.home_error_home_msg')
				];
			}
		}

		//房子表数据更新展示页面
		public function edit($homeid){
			$data['buildnum'] = Home::get_all_buildnum();         //所有的楼号

			$data['home'] = Home::get_d_home($homeid);            //要修改得数据详情
			$field_id = $data['home'] -> buildnum;

			$data['unitnum'] = Home::get_unitnum($field_id);         //查询楼号下所对应的单元号
			$firldid = $data['home'] -> unitnum;
      $data['roomnum'] = Home::get_roomnum($firldid);             //查询单元号下所对应的房号

			return view('Admin.Home.Home.edit') -> with($data);

		}

		//房子表数据更新
		public function update(Request $query){

    	$homeid = $query -> input('homeid');

			$validator = Validator::make($query -> all(),[
				'roomnum' => 'unique:homeinfo,roomnum,'.$homeid.',homeid',
			]);

			if($validator -> errors() -> get('roomnum')){
				return [
					'code'   => config('myconfig.home.roomnum_code'),
					'msg'    => config('myconfig.home.roomnum_msg')
				];
			}

			$data['buildnum'] = $query -> input('buildnum');  //楼号
			$data['unitnum'] = $query -> input('unitnum');  //单元号
			$data['roomnum'] = $query -> input('roomnum');  //房号
			$data['floor'] = $query -> input('floor');  //楼层
			$data['build_area'] = $query -> input('build_area');  //面积
			$data['house_img'] = $query -> input('n_img');  //户型图
			$data['house_str'] = $query -> input('house_str');  //户型结构
			$data['price'] = $query -> input('price');  //单价
			$data['total'] =  $data['build_area'] * $data['price'];      //总价
			$data['discount'] = $query -> input('discount');  //折扣
			$data['status'] = $query -> input('status');  //状态
			$data['buyid'] = $query -> input('buyid');  //认购编号
			$data['remarks'] = $query -> input('remarks');  //状态备注
			$data['updated_at'] = time();

			$update_home = Home::update_d_home($homeid,$data);

			if($update_home){
				return [
					'code'        => config('myconfig.home.home_update_success_code'),
					'msg'         => config('myconfig.home.home_update_success_msg')
				];
			}else{
				return [
					'code'        => config('myconfig.home.home_update_error_code'),
					'msg'         => config('myconfig.home.home_update_error_msg')
				];
			}
		}


		//删除房源信息
	public function destroy(Request $query){
    	$homeid = (int)$query -> input('homeid');

    	$delete_home = Home::delete_d_home($homeid);

    	if($delete_home){
				return [
					'code'        => config('myconfig.home.home_delete_success_code'),
					'msg'         => config('myconfig.home.home_delete_success_msg')
				];
			}else{
				return [
					'code'        => config('myconfig.home.home_delete_error_code'),
					'msg'         => config('myconfig.home.home_delete_error_msg')
				];
			}
	}


	//全选删除
	public function destroy_all(Request $query){
    	$homeid = $query -> input('homeid');

    	$delete_home = Home::delete_all_home($homeid);

			if($delete_home){
				return [
					'code'        => config('myconfig.home.home_delete_success_code'),
					'msg'         => config('myconfig.home.home_delete_success_msg')
				];
			}else{
				return [
					'code'        => config('myconfig.home.home_delete_error_code'),
					'msg'         => config('myconfig.home.home_delete_error_msg')
				];
			}
	}

	//查看详情
	public function view($homeid){
    	$data['home'] = Home::view_d_home($homeid);
//    	dd($data['home']);
    	return view('Admin.Home.Home.view') -> with($data);
	}

}
