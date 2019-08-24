<?php

namespace App\Http\Controllers\Admin\Cultrue;

use Illuminate\Http\Request;
use App\Http\Controllers\SessionController;
use App\Models\admin\Cultrue;
use Illuminate\Support\Facades\Validator;

class CultrueController extends SessionController
{
    //企业文化
    public function index($perid)
    {
        $data = $this -> session();
        $data['per_menu'] = $this -> get_per();
        $data['page_name'] = trans( 'cultrue.page_name' );
        $data['page_detail'] = trans( 'cultrue.page_detail' );
        $data['page_tips'] = trans( 'index.page_tips' );
        $data['page_note'] = trans( 'index.page_note' );
        $page = config('myconfig.config.page_num');
        $data['cultrue'] = Cultrue::get_all_cultrue($page);
        $data['ids'] = $perid;
        return view('Admin.Cultrue.Cultrue.index')->with($data);
    }

    //企业文化添加页面
    public function create()
    {
        $data['name']=Cultrue::get_fieldinfo();
        return view('Admin.Cultrue.Cultrue.create')->with($data);
    }

    //添加企业文化
    public function store(Request $query)
    {
        $data['title'] = $query -> input('title');  //标题
        $data['class_id'] = $query -> input('parent_field_id');  //企业文化分类
        $data['imgpath'] = $query -> input('img_text');  //企业文化图片
        $data['created_at'] = time(); //添加时间
        $cultrue = Cultrue::store_cultrue($data);
        if($cultrue){
            return[
                'code'   => config('myconfig.cultrue.cultrue_success_cultrue_code'),
                'msg'    => config('myconfig.cultrue.cultrue_success_cultrue_msg')
            ];
        }else{
            return [
                'code'   => config('myconfig.cultrue.cultrue_error_cultrue_code'),
                'msg'    => config('myconfig.cultrue.cultrue_error_cultrue_msg')
            ];
        }
    }

    //企业文化表数据更新展示页面
    public function edit($cult_id)
    {
        $data['name']=Cultrue::get_fieldinfo();
        //dd($data['name']);
        $data['cultrue']=Cultrue::get_d_culture($cult_id);
        $data['cultrue'] -> imgpath = array_filter(explode('/',$data['cultrue'] -> imgpath));

       return view('Admin.Cultrue.Cultrue.edit')->with($data);
    }

    //企业文化更新数据
    public function update(Request $query)
    {
        $c_id = $query ->input('c_id');
        $data['title'] = $query -> input('title');  //标题
        $data['class_id'] = $query -> input('parent_field_id');  //企业文化分类
        $data['imgpath'] = $query -> input('img_text');  //企业文化图片
        $data['updated_at'] =time();
        $update=Cultrue::update_cultrue($c_id,$data);
        if($update){
            return[
                'code'   => config('myconfig.cultrue.cultrue_success_update_code'),
                'msg'    => config('myconfig.cultrue.cultrue_success_update_msg')
            ];
        }else{
            return [
                'code'   => config('myconfig.cultrue.cultrue_error_update_code'),
                'msg'    => config('myconfig.cultrue.cultrue_error_update_msg')
            ];
        }
    }

    //文化全选删除
    public function destroy_all(Request $query)
    {
        $c_id = $query ->input('c_id');
        $delete = Cultrue::delete_all_cultrue($c_id);
        if($delete){
            return[
                'code'   => config('myconfig.cultrue.cultrue_success_delete_code'),
                'msg'    => config('myconfig.cultrue.cultrue_success_delete_msg')
            ];
        }else{
            return [
                'code'   => config('myconfig.cultrue.cultrue_error_delete_code'),
                'msg'    => config('myconfig.cultrue.cultrue_error_delete_msg')
            ];
        }
    }

    //企业文化删除单条
    public function destroy(Request $query)
    {
        $cult_id = $query ->input('cult_id');
        $destroy = Cultrue::delete_dan_cultrue($cult_id);
        if($destroy){
            return[
                'code'   => config('myconfig.cultrue.cultrue_success_delete_code'),
                'msg'    => config('myconfig.cultrue.cultrue_success_delete_msg')
            ];
        }else{
            return [
                'code'   => config('myconfig.cultrue.cultrue_error_delete_code'),
                'msg'    => config('myconfig.cultrue.cultrue_error_delete_msg')
            ];
        }
    }

    //企业文化详情
    public function view($cult_id)
    {
//        $data['name']=Cultrue::get_fieldinfo();
        $data['info']=Cultrue::view($cult_id);
        $data['info'] -> imgpath = array_filter(explode('/',$data['info'] -> imgpath));
//        dd($data);
        return view('Admin.Cultrue.Cultrue.view')->with($data);
    }
}
