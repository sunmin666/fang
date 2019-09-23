<?php

namespace App\Http\Controllers\Admin\Delegate;

use Illuminate\Http\Request;
use App\Http\Controllers\SessionController;
use Illuminate\Support\Facades\Validator;
use App\Models\admin\Delegate;
use Illuminate\Support\Facades\Session;

class DelegateController extends SessionController
{
    //派遣展示页面
    public function index($perid)
    {
        $data = $this -> session();
        $data['per_menu'] = $this -> get_per();
        $data['page_name'] = trans( 'delegate.page_name' );
        $data['page_detail'] = trans( 'delegate.page_detail' );
        $data['page_tips'] = trans( 'index.page_tips' );
        $data['page_note'] = trans( 'index.page_note' );
        $page = config('myconfig.config.page_num');
         $data['delegate'] = Delegate::get_all_delegate($page);
        //dd($data['delegate']);
        $data['ids'] = $perid;
        return view('Admin.Delegate.Delegate.index')->with($data);
    }

    //派遣添加页面
    public function create()
    {
        $data['hous'] = Delegate::get_all_hous();
//        $data['cust'] = Delegate::get_all_cust();
        return view('Admin.Delegate.Delegate.create')->with($data);
    }

    //派遣添加数据
    public function store(Request $query)
    {
        $validator = Validator::make($query->all(), [
            'remarks' => 'min:5|max:255',
        ]);
        if ($validator->errors()->get('remarks')) {
            return [
                'code' => config('myconfig.delegate.content_code'),
                'msg' => config('myconfig.delegate.content_msg'),
            ];
        }
        $data['hous_id'] = $query -> input('hous_id');
//        $data['cust_id'] = $query -> input('cust_id');
        $data['remarks'] = $query -> input('remarks');
        $data['appointees'] = Session::get('session_member.id');
        $data['created_at'] = time();
        $store = Delegate::store_d_delegate($data);
        if($store){
            return [
                'code'   => config('myconfig.delegate.delegate_store_success_code'),
                'msg'    => config('myconfig.delegate.delegate_store_success_msg')
            ];
        }else{
            return [
                'code'   => config('myconfig.delegate.delegate_store_error_code'),
                'msg'    => config('myconfig.delegate.delegate_store_error_msg')
            ];
        }
    }

    //派遣修改页面
    public function edit($gate_id)
    {
        $data['hous'] = Delegate::get_all_hous();
//        $data['cust'] = Delegate::get_all_cust();
        $data['delegate'] = Delegate::get_d_delegate($gate_id);
        return view('Admin.Delegate.Delegate.edit')->with($data);
    }

    //派遣数据更新
    public function destroy(Request $query)
    {
        $gate_id = $query -> input('gate_id');
        $validator = Validator::make($query->all(), [
            'remarks' => 'min:5|max:255',
        ]);
        if ($validator->errors()->get('remarks')) {
            return [
                'code' => config('myconfig.delegate.content_code'),
                'msg' => config('myconfig.delegate.content_msg'),
            ];
        }
        $data['hous_id'] = $query -> input('hous_id');
//        $data['cust_id'] = $query -> input('cust_id');
        $data['remarks'] = $query -> input('remarks');
        $data['updated_at'] = time();
        $destroy = Delegate::update_d_delegate($gate_id,$data);
        if($destroy){
            return [
                'code'   => config('myconfig.delegate.delegate_destroy_success_code'),
                'msg'    => config('myconfig.delegate.delegate_destroy_success_msg')
            ];
        }else{
            return [
                'code'   => config('myconfig.delegate.delegate_destroy_error_code'),
                'msg'    => config('myconfig.delegate.delegate_destroy_error_msg')
            ];
        }
    }

    //派遣详情
    public function view($gate_id){
        $data['hous'] = Delegate::get_all_hous();
        $data['cust'] = Delegate::get_all_cust();
        $data['delegate'] = Delegate::get_d_delegate($gate_id);
        return view('Admin.Delegate.Delegate.view')->with($data);
    }

    //派遣删除单条
    public function del(Request $query)
    {
        $gate_id = $query -> input('gate_id');
        $del = Delegate::del_d_delegate($gate_id);
        if($del){
            return [
                'code'   => config('myconfig.delegate.delegate_del_success_code'),
                'msg'    => config('myconfig.delegate.delegate_del_success_msg')
            ];
        }else{
            return [
                'code'   => config('myconfig.delegate.delegate_del_error_code'),
                'msg'    => config('myconfig.delegate.delegate_del_error_msg')
            ];
        }
    }

    //派遣全选删除
    public function destroy_all(Request $query)
    {
        $c_id = $query -> input('c_id');
        $delete = Delegate::del_all_deledate($c_id);
        if($delete){
            return [
                'code'   => config('myconfig.delegate.delegate_del_success_code'),
                'msg'    => config('myconfig.delegate.delegate_del_success_msg')
            ];
        }else{
            return [
                'code'   => config('myconfig.delegate.delegate_del_error_code'),
                'msg'    => config('myconfig.delegate.delegate_del_error_msg')
            ];
        }
    }
}
