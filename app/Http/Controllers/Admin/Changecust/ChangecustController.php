<?php

namespace App\Http\Controllers\Admin\Changecust;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\admin\Changecust;
use App\Http\Controllers\SessionController;
use Illuminate\Support\Facades\Session;

class ChangecustController extends SessionController
{
    //更名展示页面
    public function index($perid)
    {
        $data = $this -> session();
        $data['per_menu'] = $this -> get_per();
        $data['page_name'] = trans( 'payloginfo.page_name' );
        $data['page_detail'] = trans( 'payloginfo.page_detail' );
        $data['page_tips'] = trans( 'index.page_tips' );
        $data['page_note'] = trans( 'index.page_note' );
        $page = config('myconfig.config.page_num');
        $data['ids'] = $perid;
        $data['changecust'] = Changecust::get_all_changecust($page);

        //dd($data['changecust']);
        return view('Admin/Changecust/Changecust/index')->with($data);
    }

    //添加页面
    public function get_cust($buyid,$homeid)
    {
        $data['buyid'] =$buyid;
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
        $data['old_homeid'] = $query -> input('old_homeid');
        $data['remarks'] = $query -> input('remarks');
        $data['buyid'] = $query -> input('buyid');
        $data['type'] = $query -> input('type');
        $data['created_at'] = time();
        $store = Changecust::store_changecust($data);
        if($store){
            return [
                'code'   => config('myconfig.changecust.changecust_destroy_success_code'),
                'msg'    => config('myconfig.changecust.changecust_destroy_success_msg')
            ];
        }else{
            return [
                'code'   => config('myconfig.changecust.changecust_destroy_error_code'),
                'msg'    => config('myconfig.changecust.changecust_destroy_error_msg')
            ];
        }
    }

    //修改页面
    public function edit($chan_id)
    {
        $data['changecust'] = Changecust::edit_d_show($chan_id);
        $data['newname'] = Changecust::get_all_name();
        //dd($data['changecust'] );
        return view('Admin/Changecust/Changecust/edit')->with($data);
    }

    //数据更新
    public function destroy(Request $query)
    {
        $chan_id = $query ->input('chan_id');
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
        $data['old_homeid'] = $query -> input('old_homeid');
        $data['remarks'] = $query -> input('remarks');
        $data['buyid'] = $query -> input('buyid');
        $data['type'] = $query -> input('type');
        $data['updated_at'] = time();
        $destroy = Changecust::destroy_changecust($chan_id,$data);
//        dd($destroy);
        if($destroy){
            return [
                'code'   => config('myconfig.changecust.changecust_destroy_success_code'),
                'msg'    => config('myconfig.changecust.changecust_destroy_success_msg')
            ];
        }else{
            return [
                'code'   => config('myconfig.changecust.changecust_destroy_error_code'),
                'msg'    => config('myconfig.changecust.changecust_destroy_error_msg')
            ];
        }
    }
}
