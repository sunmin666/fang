<?php

namespace App\Http\Controllers\Admin\Homestatus;

use Illuminate\Http\Request;
use App\Http\Controllers\SessionController;
use App\Models\admin\Homestatus;
use Illuminate\Support\Facades\Input;

class HomestatusController extends SessionController
{
    //房源状态统计
    public function index($perid){
        $data = $this -> session();
        $data['per_menu'] = $this -> get_per();
        $data['page_name'] = trans( 'homestatus.page_name' );
        $data['page_detail'] = trans( 'homestatus.page_detail' );
        $data['page_tips'] = trans( 'index.page_tips' );
        $data['page_note'] = trans( 'index.page_note' );
        $page = config('myconfig.config.page_num');
        $data['ids'] = $perid;
        return view('Admin.Homestatus.Homestatus.index') -> with($data);
    }
}
