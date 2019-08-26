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

}
