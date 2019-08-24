<?php

namespace App\Http\Controllers\Admin\Trackinfo;

use Illuminate\Http\Request;
use App\Http\Controllers\SessionController;
use App\Models\admin\Trackinfo;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;

class TrackinfoController extends SessionController
{

    //页面展示
    public function index($perid)
    {
        $data = $this -> session();
        $data['per_menu'] = $this -> get_per();
        $data['page_tips'] = trans( 'index.page_tips' );
        $data['page_note'] = trans( 'index.page_note' );
        $page = config('myconfig.config.page_num');
        $data['ids'] = $perid;
        return view('Admin/Trackinfo/index')->with($data);
    }

    //添加页面展示
    public function showtrack($cust_id)
    {
        $data['name'] = Trackinfo::get_customer($cust_id);
        //dd($data);
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
}
