<?php

namespace App\Http\Controllers\Admin\Website;

use App\Models\admin\Contact;
use Illuminate\Http\Request;
use App\Http\Controllers\SessionController;

class ContactController extends SessionController
{

	/**
	 *
	 * 用户联系我们展示页面
	 *
	 * @param $perid
	 *
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
    public function index($perid){
			$data = $this -> session();
			$data['per_menu'] = $this -> get_per();
			$data['page_name'] = trans( 'contact.page_name' );
			$data['page_detail'] = trans( 'contact.page_detail' );
			$data['page_tips'] = trans( 'index.page_tips' );
			$data['page_note'] = trans( 'index.page_note' );
			$page = config('myconfig.config.page_num');
			$data['contact'] = Contact::get_all_contact($page);
			$data['ids'] = $perid;
			return view('Admin.Website.Contact.index') -> with($data);
		}


	/**
	 *
	 * 删除用户留言
	 *
	 * @param Request $query
	 *
	 * @return array
	 */
		public function destroy(Request $query){
    	$c_id = (int)$query -> input('c_id');
    	$info = Contact::delete_d_contact($c_id);
    	if($info){
    		return [
    			'code'   => config('myconfig.contact.delete_contact_success_code'),
					'msg'    => config('myconfig.contact.delete_contact_success_msg')
				];
			}else{
    		return [
    			'code'   => config('myconfig.contact.delete_contact_error_code'),
					'msg'    => config('myconfig.contact.delete_contact_error_msg')
				];
			}
		}

		public function destroy_all(Request $query){
			$c_id = $query -> input('c_id');

			$info = Contact::delete_all_contact($c_id);

			if($info){
				return [
					'code'   => config('myconfig.contact.delete_contact_success_code'),
					'msg'    => config('myconfig.contact.delete_contact_success_msg')
				];
			}else{
				return [
					'code'   => config('myconfig.contact.delete_contact_error_code'),
					'msg'    => config('myconfig.contact.delete_contact_error_msg')
				];
			}

		}


	/**
	 *
	 * 联系我们页面展示
	 *
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
		public function create(){
    	return view('Admin.Website.Contact.create');
		}

	/**
	 *
	 * 用户留言联系我们
	 *
	 * @param Request $query
	 *
	 * @return array
	 */
		public function store(Request $query){
			$data['c_name'] = $query -> input('c_name');
			$data['c_phone'] = $query -> input('c_phone');
			$data['c_email'] = $query -> input('c_email');
			$data['c_content'] = $query -> input('c_content');
			$data['created_at'] = time();

			$info = Contact::store_contact($data);

			if($info){
				return [
					'code'   => config('myconfig.contact.store_con_success_code'),
					'msg'    => config('myconfig.contact.store_con_success_msg')
				];
			}else{
				return [
					'code'   => config('myconfig.contact.store_con_error_code'),
					'msg'    => config('myconfig.contact.store_con_error_msg')
				];
			}
		}
}
