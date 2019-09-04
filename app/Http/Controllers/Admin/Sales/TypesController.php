<?php

namespace App\Http\Controllers\Admin\Sales;

use Illuminate\Http\Request;
use App\Http\Controllers\SessionController;
use App\Models\admin\Sales;
use Illuminate\Support\Facades\Input;

class TypesController extends SessionController
{
	//客户类型统计
    public function index($perid){
			$data = $this -> session();
			$data['per_menu'] = $this -> get_per();
			$data['page_name'] = trans( 'sales.page_name' );
			$data['page_detail'] = trans( 'sales.page_detail' );
			$data['page_tips'] = trans( 'index.page_tips' );
			$data['page_note'] = trans( 'index.page_note' );
			$page = config('myconfig.config.page_num');
			//查询所有职业顾问
			$data['hous'] = Sales::get_all_hous();
			//查询状态 来电 来访 电转访
			$data['type'] = Sales::get_field();
			//接受参数
			$data['houss'] = $hous = Input::get('hous');    //职业顾问
			$data['types'] = $type = Input::get('type');    //接触方式
			$data['stimes'] = $stime = Input::get('stime');   //开始时间
			$data['etimes'] = $etime = Input::get('etime');    //结束时间
			$data['customer'] = Sales::get_condition_cust($page,$hous,$type,$stime,$etime);
			$data['total'] = Sales::get_total_cust($hous,$type,$stime,$etime);
			$data['ids'] = $perid;
			return view('Admin.Sales.Types.index') -> with($data);
		}


		//销售金额统计
	public function amount($perid){
		$data = $this -> session();
		$data['per_menu'] = $this -> get_per();
		$data['page_name'] = trans( 'sales.page_name' );
		$data['page_detail'] = trans( 'sales.page_detaila' );
		$data['page_tips'] = trans( 'index.page_tips' );
		$data['page_note'] = trans( 'index.page_note' );
		$page = config('myconfig.config.page_num');
		//查询所有职业顾问
		$data['hous'] = Sales::get_all_hous();
		$data['houss'] = $hous = Input::get('hous');    //职业顾问
		$data['stimes'] = $stime = Input::get('stime');   //开始时间
		$data['etimes'] = $etime = Input::get('etime');    //结束时间

//		$data['amount'] =


		$data['ids'] = $perid;
		return view('Admin.Sales.Amount.index') -> with($data);
	}




}
