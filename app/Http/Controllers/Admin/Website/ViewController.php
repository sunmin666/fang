<?php

namespace App\Http\Controllers\Admin\Website;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\admin\Pro;
class ViewController extends Controller
{


	/**
	 *
	 * 项目简介和区域配套的详情查看
	 *
	 * @param $nid
	 *
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function index($nid){

		$data['view'] = Pro::get_d_news($nid);
		return view('Admin.Website.View.index') -> with($data);

	}
}
