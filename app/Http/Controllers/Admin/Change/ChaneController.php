<?php

namespace App\Http\Controllers\Admin\Change;

use Illuminate\Http\Request;
use App\Http\Controllers\SessionController;
use App\Models\admin\Change;

class ChaneController extends SessionController
{
    public function create($buyid,$homeid){
    	//查询客户信息以及老房子数据



			$data['data'] = Change::get_d_buy_home($buyid);
			$data['home'] = Change::get_home_d($homeid);




			print_r($data);
		}
}
