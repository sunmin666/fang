<?php

namespace App\Http\Controllers\Admin\Remindinfo;

use Illuminate\Http\Request;
use App\Http\Controllers\SessionController;
use Illuminate\Support\Facades\Validator;
use App\Models\admin\Remindinfo;


class RemindinfoController extends SessionController
{
    //提醒展示页面
    public function index($perid)
    {
        $data = $this -> session();
        $data['per_menu'] = $this -> get_per();
        $data['page_name'] = trans( 'remindinfo.page_name' );
        $data['page_detail'] = trans( 'remindinfo.page_detail' );
        $data['page_tips'] = trans( 'index.page_tips' );
        $data['page_note'] = trans( 'index.page_note' );
        $page = config('myconfig.config.page_num');
        $data['remind'] = Remindinfo::get_all_remind($page);
        //dd($data['remind']);
        $data['ids'] = $perid;
        return view('Admin.Remindinfo.Remindinfo.index')->with($data);
    }

    //添加页面
    public function create()
    {
        //查询所有的职业顾问
        $data['hous'] = Remindinfo::get_all_hous();
        //dd($data['hous']);
        return view('Admin.Remindinfo.Remindinfo.create')->with($data);
    }

    //提醒信息添加
    public function store(Request $query)
    {
        $validator = Validator::make($query->all(), [
            'content' => 'min:5|max:255',
        ]);
        if ($validator->errors()->get('content')) {
            return [
                'code' => config('myconfig.remindinfo.content_code'),
                'msg' => config('myconfig.remindinfo.content_msg'),
            ];
        }
        $data['hous_id'] = $query->input('hous_id');
        $data['content'] = $query->input('content');
        $data['remind_time'] = strtotime($query->input('remind_time'));
        $data['created_at'] = time();
        $data['modular'] = $query -> input('modular');
        $store = Remindinfo::store_d_remind($data);
        if($store){
            return [
                'code'   => config('myconfig.remindinfo.remindinfo_store_success_code'),
                'msg'    => config('myconfig.remindinfo.remindinfo_store_success_msg')
            ];
        }else{
            return [
                'code'   => config('myconfig.remindinfo.remindinfo_store_error_code'),
                'msg'    => config('myconfig.remindinfo.remindinfo_store_error_msg')
            ];
        }
    }

    //修改页面
    public function edit($remi_id)
    {
        $data['remindx'] = Remindinfo::get_d_remind($remi_id);
        $data['hous'] = Remindinfo::get_all_hous();
        return  view('Admin.Remindinfo.Remindinfo.edit')->with($data);
    }

    //更新数据
    public function destroy(Request $query)
    {
        $remi_id = $query -> input('remi_id');
        $validator = Validator::make($query->all(), [
            'content' => 'min:5|max:255',
        ]);
        if ($validator->errors()->get('content')) {
            return [
                'code' => config('myconfig.remindinfo.content_code'),
                'msg' => config('myconfig.remindinfo.content_msg'),
            ];
        }
        $data['hous_id'] = $query->input('hous_id');
        $data['content'] = $query->input('content');
        $data['remind_time'] = strtotime($query->input('remind_time'));
        $data['updated_at'] = time();
        $data['modular'] = $query -> input('modular');
        $destroy = Remindinfo::update_d_remind($remi_id,$data);
        if($destroy){
            return [
                'code'   => config('myconfig.remindinfo.remindinfo_destroy_success_code'),
                'msg'    => config('myconfig.remindinfo.remindinfo_destroy_success_msg')
            ];
        }else{
            return [
                'code'   => config('myconfig.remindinfo.remindinfo_destroy_error_code'),
                'msg'    => config('myconfig.remindinfo.remindinfo_destroy_error_msg')
            ];
        }
    }

    //详情页面
    public function view($remi_id)
    {
        $data['remindx'] = Remindinfo::get_d_remind($remi_id);
        $data['hous'] = Remindinfo::get_all_hous();
        return  view('Admin.Remindinfo.Remindinfo.view')->with($data);
    }

    //删除单条
    public function del(Request $query)
    {
        $remi_id = $query -> input('remi_id');
        $del = Remindinfo::del_d_remind($remi_id);
        if($del){
            return[
                'code'   => config('myconfig.remindinfo.remindinfo_del_success_code'),
                'msg'    => config('myconfig.remindinfo.remindinfo_del_success_msg')
            ];
        }else{
            return [
                'code'   => config('myconfig.remindinfo.remindinfo_del_error_code'),
                'msg'    => config('myconfig.remindinfo.remindinfo_del_error_msg')
            ];
        }
    }

    //全选删除
    public function destroy_all(Request $query)
    {
        $c_id = $query -> input('c_id');
        $delete = Remindinfo::del_all_remind($c_id);
        if($delete){
            return[
                'code'   => config('myconfig.remindinfo.remindinfo_del_success_code'),
                'msg'    => config('myconfig.remindinfo.remindinfo_del_success_msg')
            ];
        }else{
            return [
                'code'   => config('myconfig.remindinfo.remindinfo_del_error_code'),
                'msg'    => config('myconfig.remindinfo.remindinfo_del_error_msg')
            ];
        }
    }
}
