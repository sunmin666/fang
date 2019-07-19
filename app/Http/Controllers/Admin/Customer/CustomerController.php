<?php

namespace App\Http\Controllers\Admin\Customer;

use Illuminate\Http\Request;
use App\Http\Controllers\SessionController;

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
//		$data['company'] = Company::get_all_company($page);
		$data['ids'] = $perid;
		return view('Admin.Customer.Customer.index') -> with($data);
	}
}
