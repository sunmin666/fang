<?php

namespace App\Http\Controllers\Admin\Trackinfo;

use Illuminate\Http\Request;
use App\Http\Controllers\SessionController;
use App\Models\admin\Trackinfo;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use App\Models\admin\Customer;


class TrackinfoController extends SessionController
{

    //页面展示
    public function index($perid)
    {
        $data = $this -> session();
        $data['per_menu'] = $this -> get_per();
        $data['page_name'] = trans( 'trackinfo.page_name' );
        $data['page_detail'] = trans( 'trackinfo.page_detail' );
        $data['page_tips'] = trans( 'index.page_tips' );
        $data['page_note'] = trans( 'index.page_note' );
        $page = config('myconfig.config.page_num');
			  $data['hous_id'] = Customer::get_hous_id_all();
			  $data['hous_ids'] = $hous_id = Input::get('hous_id');
        $data['ids'] = $perid;
        $data['trackinfo'] = Trackinfo::get_all_trackinfo($hous_id,$page);
        return view('Admin/Trackinfo/index')->with($data);
    }

    //添加页面展示
    public function showtrack($cust_id)
    {
        $data['name'] = Trackinfo::get_customer($cust_id);
        $data['adviser'] =Trackinfo::get_houserinfo();
        return view('Admin/Trackinfo/create')->with($data);

    }
    //添加数据
    public function store(Request $query)
    {

        $data['cust_id'] = $query -> input('cust_id');  //客户姓名
        $data['hous_id'] = $query -> input('hous_id');  //职业顾问
        $data['track_type'] = $query -> input('track_type');    //访问类型
        $data['content'] = $query -> input('content');  //来访内容
        $data['track_time'] = time();           //跟踪来访时间
        $data['created_at'] = time();           //跟踪来访创建时间
        $track = Trackinfo::store_track($data);
        //dd($track);
        if($track){
                return [
                    'code'   => config('myconfig.trackinfo.trackinfo_store_success_code'),
                    'msg'    => config('myconfig.trackinfo.trackinfo_store_success_msg')
                ];
            }else{
                return [
                    'code'   => config('myconfig.trackinfo.trackinfo_store_error_code'),
                    'msg'    => config('myconfig.trackinfo.trackinfo_store_error_msg')
                ];
            }
    }

    //修改页面
    public function edit($trackid){
        $data['single']=Trackinfo::get_d_trackinfo($trackid);
        //dd($data['single']);
        $data['adviser'] =Trackinfo::get_houserinfo();
        return view('Admin/Trackinfo/edit')->with($data);
    }

    //更新数据
    public function destroy(Request $query)
    {
        $c_id = $query -> input('c_id');  //客户姓名
        $data['cust_id'] = $query -> input('cust_id');  //客户姓名
        $data['hous_id'] = $query -> input('hous_id');  //职业顾问
        $data['track_type'] = $query -> input('track_type');    //访问类型
        $data['content'] = $query -> input('content');  //来访内容
        $trackinfo = Trackinfo::update_d_trackinfo($c_id,$data);
        if($trackinfo){
            return [
                'code'   => config('myconfig.trackinfo.trackinfo_destroy_success_code'),
                'msg'    => config('myconfig.trackinfo.trackinfo_destroy_success_msg')
            ];
        }else{
            return [
                'code'   => config('myconfig.trackinfo.trackinfo_destroy_error_code'),
                'msg'    => config('myconfig.trackinfo.trackinfo_destroy_error_msg')
            ];
        }
    }

    //详情
    public function view($trackid)
    {
        $data['single'] = Trackinfo::get_d_trackinfo($trackid);
        return view('Admin/Trackinfo/view')->with($data);
    }

    //删除单条
    public function del(Request $query)
    {
        $trackid = $query->input('trackid');
        $del =  Trackinfo::del_d_trackinfo($trackid);
        if($del){
            return [
                'code'   => config('myconfig.trackinfo.trackinfo_del_success_code'),
                'msg'    => config('myconfig.trackinfo.trackinfo_del_success_msg')
            ];
        }else{
            return [
                'code'   => config('myconfig.trackinfo.trackinfo_del_error_code'),
                'msg'    => config('myconfig.trackinfo.trackinfo_del_error_msg')
            ];
        }
    }

    //全选删除
    public function destroy_all(Request $query)
    {
        $all_id = $query -> input('all_id');
        $delete = Trackinfo::delete_all_trackinfo($all_id);
        if($delete){
            return [
                'code'   => config('myconfig.trackinfo.trackinfo_del_success_code'),
                'msg'    => config('myconfig.trackinfo.trackinfo_del_success_msg')
            ];
        }else{
            return [
                'code'   => config('myconfig.trackinfo.trackinfo_del_error_code'),
                'msg'    => config('myconfig.trackinfo.trackinfo_del_error_msg')
            ];
        }
    }
}
