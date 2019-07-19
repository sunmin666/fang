<?php

namespace App\Http\Controllers\Index;

use Illuminate\Http\Request;
use App\Http\Controllers\SessionController;

class IndexController extends SessionController
{


	/**
	 *
	 * 登录成功之后 跳转的首页
	 *
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
    public function index(){

			$data = $this -> session();
			$data['page_name'] = trans( 'index.page_name' );
			$data['page_detail'] = trans( 'index.page_detail' );
			$data['page_tips'] = trans( 'index.page_tips' );
			$data['page_note'] = trans( 'index.page_note' );
			$data['per_menu'] = $this -> get_per();
			$data['ids'] = 0;
			return view('Index.index') -> with($data);

		}


}
