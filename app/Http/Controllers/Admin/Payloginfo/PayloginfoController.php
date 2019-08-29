<?php

namespace App\Http\Controllers\Admin\Payloginfo;

use Illuminate\Http\Request;
use App\Models\admin\Payloginfo;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\SessionController;
use Illuminate\Support\Facades\Session;

class PayloginfoController extends SessionController
{
    //缴费记录展示页面
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
        $data['payloginfo'] = Payloginfo::get_all_pay($page);
        //sdd($data['payloginfo']);
        return view('Admin/Payloginfo/index')->with($data);
    }

    //缴费添加页面
    public function show_cowner($cust_id)
    {
        $data['name'] = Payloginfo::get_customer($cust_id);
        return view('Admin/Payloginfo/create') ->with($data);
    }

    //添加缴费记录
    public function store(Request $query)
    {
        $validator = Validator::make($query -> all(),[
            'remarks'  => 'min:5|max:255',
        ]);

        if($validator -> errors() -> get('remarks')){
            return [
                'code'          => config('myconfig.payloginfo.remarks_code'),
                'msg'          => config('myconfig.payloginfo.remarks_msg'),
            ];
        }
        $data['cust_id'] = $query -> input('cust_id');
        $data['money']  = $query -> input('money');
        $data['remarks']  = $query -> input('remarks');
        $data['created_at'] = time();
        $pay=Payloginfo::store_pay($data);
        if($pay){
            return [
                'code'   => config('myconfig.payloginfo.payloginfo_store_success_code'),
                'msg'    => config('myconfig.payloginfo.payloginfo_store_success_msg')
            ];
        }else{
            return [
                'code'   => config('myconfig.payloginfo.payloginfo_store_error_code'),
                'msg'    => config('myconfig.payloginfo.payloginfo_store_error_msg')
            ];
        }
    }

    //缴费记录修改页面
    public function edit($payl_id)
    {
        $data['payedit'] = Payloginfo::get_d_pay($payl_id);
        return view('Admin/Payloginfo/edit') ->with($data);
    }

    //缴费记录更新数据
    public function destroy(Request $query)
    {
        $payl_id = $query ->input('payl_id');
        $validator = Validator::make($query -> all(),[
            'remarks'  => 'min:5|max:255',
        ]);

        if($validator -> errors() -> get('remarks')){
            return [
                'code'          => config('myconfig.payloginfo.remarks_code'),
                'msg'          => config('myconfig.payloginfo.remarks_msg'),
            ];
        }
        $data['cust_id'] = $query -> input('cust_id');
        $data['money']  = $query -> input('money');
        $data['remarks']  = $query -> input('remarks');
        $payup=Payloginfo::update_d_pay($payl_id,$data);
        if($payup){
            return [
                'code'   => config('myconfig.payloginfo.payloginfo_destroy_success_code'),
                'msg'    => config('myconfig.payloginfo.payloginfo_destroy_success_msg')
            ];
        }else{
            return [
                'code'   => config('myconfig.payloginfo.payloginfo_destroy_error_code'),
                'msg'    => config('myconfig.payloginfo.payloginfo_destroy_error_msg')
            ];
        }
    }

    //缴费记录详情
    public function view($payl_id)
    {
        $data['payedit'] = Payloginfo::get_d_pay($payl_id);
        return view('Admin/Payloginfo/view') ->with($data);
    }

    //缴费记录删除单条
    public function del(Request $query)
    {
        $payl_id = $query ->input('payl_id');
        $del = Payloginfo::del_d_pay($payl_id);
        if($del){
            return [
                'code'   => config('myconfig.payloginfo.payloginfo_del_success_code'),
                'msg'    => config('myconfig.payloginfo.payloginfo_del_success_msg')
            ];
        }else{
            return [
                'code'   => config('myconfig.payloginfo.payloginfo_del_error_code'),
                'msg'    => config('myconfig.payloginfo.payloginfo_del_error_msg')
            ];
        }
    }

    //缴费记录全选删除
    public function destroy_all(Request $query)
    {
        $all_id = $query -> input('all_id');
        $delete = Payloginfo::delete_all_pay($all_id);
        if($delete){
            return [
                'code'   => config('myconfig.payloginfo.payloginfo_del_success_code'),
                'msg'    => config('myconfig.payloginfo.payloginfo_del_success_msg')
            ];
        }else{
            return [
                'code'   => config('myconfig.payloginfo.payloginfo_del_error_code'),
                'msg'    => config('myconfig.payloginfo.payloginfo_del_error_msg')
            ];
        }
    }
}
