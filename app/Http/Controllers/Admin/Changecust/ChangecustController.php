<?php

namespace App\Http\Controllers\Admin\Changecust;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use App\Models\admin\Changecust;
use App\Http\Controllers\SessionController;
use Illuminate\Support\Facades\Session;

class ChangecustController extends SessionController
{
    //更名展示页面
    public function index($perid)
    {
        $data = $this -> session();
        $data['per_menu'] = $this -> get_per();
        $data['page_name'] = trans( 'changecust.page_name' );
        $data['page_detail'] = trans( 'changecust.page_detail' );
        $data['page_tips'] = trans( 'index.page_tips' );
        $data['page_note'] = trans( 'index.page_note' );
        $page = config('myconfig.config.page_num');
        $data['ids'] = $perid;

        $data['name'] = $name = Input::get('name');
        $data['iphone'] = $iphone = Input::get('iphone');

        $data['changecust'] = Changecust::get_all_changecust($name,$iphone,$page);

        return view('Admin/Changecust/Changecust/index')->with($data);
    }

    //添加页面
    public function get_cust($buyid,$homeid)
    {
        $data['buyid'] =$buyid;
        $data['name'] = Changecust::get_d_name($buyid); //当前用户
        $data['newname'] = Changecust::get_all_name();  //所有用户
        $data['home'] = Changecust::get_d_home($homeid); //当前用户购买的房子
        return view('Admin/Changecust/Changecust/create')->with($data);
    }

    //更名添加数据
    public function store(Request $query)
    {
        $validator = Validator::make($query -> all(),[
            'remarks'  => 'min:5|max:255',
        ]);

        if($validator -> errors() -> get('remarks')){
            return [
                'code'          => config('myconfig.changecust.remarks_code'),
                'msg'          => config('myconfig.changecust.remarks_msg'),
            ];
        }
        $data['cust_id'] = $query -> input('cust_id');
        $data['new_cust'] = $query -> input('new_cust');
        $data['old_homeid'] = $query -> input('old_homeid');
        $data['remarks'] = $query -> input('remarks');
        $data['buyid'] = $query -> input('buyid');
        $data['type'] = $query -> input('type');
        $data['created_at'] = time();
        $store = Changecust::store_changecust($data);
        if($store){
            return [
                'code'   => config('myconfig.changecust.changecust_store_success_code'),
                'msg'    => config('myconfig.changecust.changecust_store_success_msg')
            ];
        }else{
            return [
                'code'   => config('myconfig.changecust.changecust_store_error_code'),
                'msg'    => config('myconfig.changecust.changecust_store_error_msg')
            ];
        }
    }

    //修改页面
    public function edit($chan_id)
    {
        $data['changecust'] = Changecust::edit_d_show($chan_id);
        //dd($data['changecust']);
        $data['newname'] = Changecust::get_all_name();
        //dd($data['changecust'] );
        return view('Admin/Changecust/Changecust/edit')->with($data);
    }

    //数据更新
    public function destroy(Request $query)
    {
        $chan_id = $query ->input('chan_id');
        $validator = Validator::make($query -> all(),[
            'remarks'  => 'min:5|max:255',
        ]);

        if($validator -> errors() -> get('remarks')){
            return [
                'code'          => config('myconfig.changecust.remarks_code'),
                'msg'          => config('myconfig.changecust.remarks_msg'),
            ];
        }
        $data['cust_id'] = $query -> input('cust_id');
        $data['new_cust'] = $query -> input('new_cust');
        $data['old_homeid'] = $query -> input('old_homeid');
        $data['remarks'] = $query -> input('remarks');
        $data['buyid'] = $query -> input('buyid');
        $data['type'] = $query -> input('type');
        $data['updated_at'] = time();
        $destroy = Changecust::destroy_changecust($chan_id,$data);
//        dd($destroy);
        if($destroy){
            return [
                'code'   => config('myconfig.changecust.changecust_destroy_success_code'),
                'msg'    => config('myconfig.changecust.changecust_destroy_success_msg')
            ];
        }else{
            return [
                'code'   => config('myconfig.changecust.changecust_destroy_error_code'),
                'msg'    => config('myconfig.changecust.changecust_destroy_error_msg')
            ];
        }
    }

    //详情
    public function view($chan_id)
    {
        $data['changecust'] = Changecust::edit_d_show($chan_id);
        $data['newname'] = Changecust::get_all_name();
        return view('Admin/Changecust/Changecust/view')->with($data);
    }

    //删除单条
    public function del(Request $query)
    {
        $chan_id = $query ->input('chan_id');
        $del= Changecust::del_d_delete($chan_id);
        if($del){
            return [
                'code'   => config('myconfig.changecust.changecust_del_success_code'),
                'msg'    => config('myconfig.changecust.changecust_del_success_msg')
            ];
        }else{
            return [
                'code'   => config('myconfig.changecust.changecust_del_error_code'),
                'msg'    => config('myconfig.changecust.changecust_del_error_msg')
            ];
        }
    }

    //全选删除
    public function destroy_all(Request $query)
    {
        $all_id = $query -> input('all_id');
        $delete = Changecust::del_all_delete($all_id);
        if($delete){
            return [
                'code'   => config('myconfig.changecust.changecust_del_success_code'),
                'msg'    => config('myconfig.changecust.changecust_del_success_msg')
            ];
        }else{
            return [
                'code'   => config('myconfig.changecust.changecust_del_error_code'),
                'msg'    => config('myconfig.changecust.changecust_del_error_msg')
            ];
        }
    }

    //经理审核页面
    public function review($chan_id,$new_cust,$buyid)
    {
        $data['chan_id'] = $chan_id;
        $data['new_cust'] = $new_cust;
        $data['buyid'] = $buyid;
        return view('Admin/Changecust/Changecust/review')->with($data);
    }

    //经理审核
    public function update_review(Request $query)
    {
        $validator = Validator::make($query -> all(),[
            'remarks'  => 'min:5|max:255',
        ]);

        if($validator -> errors() -> get('verify_remarks')){
            return [
                'code'          => config('myconfig.changecust.remarks_code'),
                'msg'          => config('myconfig.changecust.remarks_msg'),
            ];
        }
        $chan_id = $query ->input('chan_id');
        $data['status'] = $query -> input('status');
        $data['verify_remarks'] = $query -> input('verify_remarks');
        $data['verifytime'] = time();
        $review = Changecust::update_review($chan_id,$data);
        if($review){
           if($data['status'] == 1){
               //更改用户名
               Changecust::update_buyinfo_name($query ->input('buyid'),$query ->input('new_cust'));
               return [
                   'code'          => config('myconfig.changecust.changecust_review_success_code'),
                   'msg'           => config('myconfig.changecust.changecust_review_success_msg'),
               ];
           }else{
               return [
                   'code'          => config('myconfig.changecust.changecust_review_successe_code'),
                   'msg'           => config('myconfig.changecust.changecust_review_successe_msg'),
               ];
           }
        }else{
            return [
                'code'   => config('myconfig.changecust.changecust_review_error_code'),
                'msg'    => config('myconfig.changecust.changecust_review_error_msg')
            ];
        }
   }
}
