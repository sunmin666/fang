<?php

namespace App\Http\Controllers\Admin\Changecust;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Models\admin\Changecust;

class ChangecustController extends Controller
{
    //添加页面
    public function get_cust($buyid,$homeid)
    {
        $data['name'] = Changecust::get_d_name($buyid); //当前用户
        $data['newname'] = Changecust::get_all_name();  //所有用户
        $data['home'] = Changecust::get_d_home($homeid); //当前用户购买的房子
        return view('Admin/Changecust/Changecust/create')->with($data);
    }

    //更名添加数据
    public function store(Request $query)
    {
        $validator = Validator::make($query -> all(),[
            'remarks'  => 'min:5|max:255',
        ]);

        if($validator -> errors() -> get('remarks')){
            return [
                'code'          => config('myconfig.changecust.remarks_code'),
                'msg'          => config('myconfig.changecust.remarks_msg'),
            ];
        }
        $data['cust_id'] = $query -> input('cust_id');
        $data['new_cust'] = $query -> input('new_cust');
        $data['homeid'] = $query -> input('homeid');
        $data['remarks'] = $query -> input('remarks');
        $data['created_at'] = time();
        $store = Changecust::store_changecust($data);
        if($store){
            return [
                'code'   => config('myconfig.changecust.changecust_store_success_code'),
                'msg'    => config('myconfig.changecust.changecust_store_success_msg')
            ];
        }else{
            return [
                'code'   => config('myconfig.changecust.changecust_store_error_code'),
                'msg'    => config('myconfig.changecust.changecust_store_error_msg')
            ];
        }
    }
}
