<?php

namespace App\Http\Controllers\Admin\Purchase;

use Illuminate\Http\Request;
use App\Models\admin\Purchase;
use App\Http\Controllers\SessionController;
use Illuminate\Support\Facades\Session;

class PurchaseController extends SessionController
{
    //计划方案
    public function index($perid)
    {
        $data = $this -> session();
        $data['per_menu'] = $this -> get_per();
        $data['page_name'] = trans( 'purchase.page_name' );
        $data['page_detail'] = trans( 'purchase.page_detail' );
        $data['page_tips'] = trans( 'index.page_tips' );
        $data['page_note'] = trans( 'index.page_note' );
        $page = config('myconfig.config.page_num');
        $data['ids'] = $perid;
        $data['purchase'] = Purchase::get_all_purchase($page);
        return view('Admin/Purchase/Purchase/index')->with($data);
    }

    //方案添加页面展示
    public function show_cowner($cust_id)
    {
        $data['name'] = Purchase::get_customer($cust_id);
        return view('Admin/Purchase/Purchase/create') ->with($data);
    }

    //添加方案信息
    public function store(Request $query)
    {
        $data['cust_id'] = $query -> input('cust_id');
        $data['type'] = $query -> input('type');
        $data['once_total'] = $query -> input('once_total');
        $data['years'] = $query -> input('years');
        $data['month_price'] = $query -> input('month_price');
        $data['month_total'] = $query -> input('month_total');
        $data['created_at'] = time();
        $add_pur = Purchase::store_purchase($data);
        if($add_pur){
            return [
                'code'   => config('myconfig.purchase.purchase_store_success_code'),
                'msg'    => config('myconfig.purchase.purchase_store_success_msg')
            ];
        }else{
            return [
                'code'   => config('myconfig.purchase.purchase_store_error_code'),
                'msg'    => config('myconfig.purchase.purchase_store_error_msg')
            ];
        }
    }

    //修改页面
    public function edit($planid)
    {
        $data['purchase']=Purchase::get_d_trackinfo($planid);
        return view('Admin/Purchase/Purchase/edit')->with($data);
    }

    //方案更新数据
    public function destroy(Request $query)
    {
        $planid = $query -> input('planid');
        $data['cust_id'] = $query -> input('cust_id');
        $data['type'] = $query -> input('type');
        $data['once_total'] = $query -> input('once_total');
        $data['years'] = $query -> input('years');
        $data['month_price'] = $query -> input('month_price');
        $data['month_total'] = $query -> input('month_total');
        $purchase = Purchase::update_d_purchase($planid,$data);
        if($purchase){
            return [
                'code'   => config('myconfig.purchase.purchase_destroy_success_code'),
                'msg'    => config('myconfig.purchase.purchase_destroy_success_msg')
            ];
        }else{
            return [
                'code'   => config('myconfig.purchase.purchase_destroy_error_code'),
                'msg'    => config('myconfig.purchase.purchase_destroy_error_msg')
            ];
        }
    }

    //方案详情
    public function view($planid)
    {
        $data['purchase']=Purchase::get_d_trackinfo($planid);
        return view('Admin/Purchase/Purchase/view')->with($data);
    }

    //方案删除单条
    public function del(Request $query)
    {
        $planid = $query -> input('planid');
        $del = Purchase::del_d_purchase($planid);
        if($del){
            return [
                'code'   => config('myconfig.purchase.purchase_del_success_code'),
                'msg'    => config('myconfig.purchase.purchase_del_success_msg')
            ];
        }else{
            return [
                'code'   => config('myconfig.purchase.purchase_del_error_code'),
                'msg'    => config('myconfig.purchase.purchase_del_error_msg')
            ];
        }
    }

    //方案全选删除
    public function destroy_all(Request $query)
    {
        $all_id = $query -> input('all_id');
        $delete = Purchase::delete_all_purchase($all_id);
        if($delete){
            return [
                'code'   => config('myconfig.purchase.purchase_del_success_code'),
                'msg'    => config('myconfig.purchase.purchase_del_success_msg')
            ];
        }else{
            return [
                'code'   => config('myconfig.purchase.purchase_del_error_code'),
                'msg'    => config('myconfig.purchase.purchase_del_error_msg')
            ];
        }
    }
}
