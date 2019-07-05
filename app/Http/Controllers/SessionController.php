<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Admin\Per;

class SessionController extends Controller
{

	/**
	 *
	 * 查询用户session
	 *
	 * @return mixed
	 */
    public function session(){
    	return Session::get('session_member');
		}


	/**
	 *
	 * 查询所有的菜单信息
	 *
	 * @return \Illuminate\Support\Collection
	 */
		public function get_per(){
    	return Per::get_all_pers();
		}

}
