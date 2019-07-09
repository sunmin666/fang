<?php

namespace App\Http\Controllers\Admin\Website;

use App\Models\Admin\Intr;
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


	/**
	 *
	 * 户型介绍查看
	 *
	 * @param $intr_id
	 *
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function intr($intr_id){
		$data['intr'] = Intr::get_d_intr($intr_id);
		return view('Admin.Website.View.intr') -> with($data);
	}
}
