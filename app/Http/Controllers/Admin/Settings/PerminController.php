<?php

namespace App\Http\Controllers\Admin\Settings;

use App\Http\Controllers\SessionController;
use App\Models\admin\Permin;
use Illuminate\Http\Request;


class PerminController extends SessionController
{

	/**
	 *
	 *
	 *
	 * @param $perid
	 *
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
    public function index($perid){
			$data = $this->session();
			$data['page_name'] = trans( 'permission.page_name' );
			$data['page_detail'] = trans( 'permin.page_detail' );
			$data['page_tips'] = trans( 'index.page_tips' );
			$data['page_note'] = trans( 'index.page_note' );
			$page = config( 'myconfig.config.page_num' );
//			$data['url'] = url::get_all_role($page);
			$data['per_menu'] = $this->get_per();
			$data['ids'] = $perid;
			return view( 'Admin.Settings.Permin.index' )->with( $data );
		}

	/**
	 *
	 * 添加权限信息
	 * 
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
		public function create(){
			//角色信息
    	$data['role'] = Permin::get_role();
    	$data['url'] = Permin::get_url();
    	return view('Admin.Settings.Permin.create') -> with($data);
		}
}
