<?php

namespace App\Http\Controllers\Admin\Coownerinfo;

use Illuminate\Http\Request;
use App\Http\Controllers\SessionController;
use App\Models\admin\Coownerinfo;
use Illuminate\Support\Facades\Session;

class CoownerinfoController extends SessionController
{
    //房屋共有人首页展示
    public function index($perid)
    {
        $data = $this -> session();
        $data['per_menu'] = $this -> get_per();
        $data['page_name'] = trans( 'coownerinfo.page_name' );
        $data['page_detail'] = trans( 'coownerinfo.page_detail' );
        $data['page_tips'] = trans( 'index.page_tips' );
        $data['page_note'] = trans( 'index.page_note' );
        $page = config('myconfig.config.page_num');
        $data['coownerinfo'] = Coownerinfo::get_all_coowner($page);
        //dd($data['coownerinfo']);
        $data['ids'] = $perid;
        return view('Admin/Coownerinfo/Coownerinfo/index')->with($data);
    }

    //房屋共有人修改页面展示
    public function edit($coow_id)
    {
        $data['coowner'] = Coownerinfo::get_d_coowner($coow_id);
        //dd($data['coowner']);
        return view('Admin/Coownerinfo/Coownerinfo/edit')->with($data);
    }

    //房屋共有人数据更新
    public function destroy(Request $query)
    {
        $c_id = $query -> input('c_id');
        $data['cust_id'] = $query -> input('cust_id');       //客户姓名
        $data['realname'] = $query->input('realname');         //共有人姓名
        $data['mobile'] = $query->input('mobile');              //共有人手机号
        $data['idcard'] = $query->input('idcard');              //共有人身份证号
        $data['birthday'] = strtotime($query->input('birthday'));          //共有人生日
        $data['sex'] = $query->input('sex');                     //共有人性别
        $data['relation'] = $query->input('relation');          //共有人与客户之间的关系
        $data['updated_at']=time();
        $coownerinfo =  Coownerinfo::update_d_coowner($c_id,$data);
        if($coownerinfo){
            return [
                'code'   => config('myconfig.coownerinfo.coownerinfo_destroy_success_code'),
                'msg'    => config('myconfig.coownerinfo.coownerinfo_destroy_success_msg')
            ];
        }else{
            return [
                'code'   => config('myconfig.coownerinfo.coownerinfo_destroy_error_code'),
                'msg'    => config('myconfig.coownerinfo.coownerinfo_destroy_error_msg')
            ];
        }
    }

    //房屋共有人详情
    public function view($coow_id)
    {
        $data['coowner'] = Coownerinfo::get_d_coowner($coow_id);
        //dd($data['coowner']);
        return view('Admin/Coownerinfo/Coownerinfo/view')->with($data);
    }

    //房屋共有人单条删除
    public function del(Request $query)
    {
        $coow_id = $query ->input('coow_id');
        $del= Coownerinfo::del_d_coowner($coow_id);
        if($del){
            return [
                'code'   => config('myconfig.coownerinfo.coownerinfo_del_success_code'),
                'msg'    => config('myconfig.coownerinfo.coownerinfo_del_success_msg')
            ];
        }else{
            return [
                'code'   => config('myconfig.coownerinfo.coownerinfo_del_error_code'),
                'msg'    => config('myconfig.coownerinfo.coownerinfo_del_error_msg')
            ];
        }
    }

    //房屋共有人全选删除
    public function destroy_all(Request $query)
    {
        $all_id = $query -> input('all_id');
        $delete = Coownerinfo::del_all_coowner($all_id);
        if($delete){
            return [
                'code'   => config('myconfig.coownerinfo.coownerinfo_del_success_code'),
                'msg'    => config('myconfig.coownerinfo.coownerinfo_del_success_msg')
            ];
        }else{
            return [
                'code'   => config('myconfig.coownerinfo.coownerinfo_del_error_code'),
                'msg'    => config('myconfig.coownerinfo.coownerinfo_del_error_msg')
            ];
        }
    }
}
