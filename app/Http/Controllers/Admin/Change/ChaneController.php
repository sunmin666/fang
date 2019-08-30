<?php

namespace App\Http\Controllers\Admin\Change;

use Illuminate\Http\Request;
use App\Http\Controllers\SessionController;
use App\Models\admin\Change;

class ChaneController extends SessionController
{
    public function create($buyid,$homeid){

			//查询客户认购的信息
			$data['cust'] = Change::get_d_buy_home($buyid);
			//查询所购买的房源信息

			$data['home'] = Change::get_home_d($homeid);
			//查询所有的楼号信息
			$data['buildnum'] = Change::get_all_buildnum();
//			dd($data);
			return view('Admin.Change.Change.create') -> with($data);
		}
}
