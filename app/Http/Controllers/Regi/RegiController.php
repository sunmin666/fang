<?php

namespace App\Http\Controllers\Regi;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\Models\admin\regi;

class RegiController extends Controller
{

	/**
	 *
	 * 使用iHOUSER注册账号
	 *
	 * @param Request $query
	 *
	 * @return array
	 */
    public function index(Request $query){
    	$validator = Validator::make($query -> all(),[
    		'username'  => 'unique:houserinfo,username',
    		'mobile'  => 'unique:houserinfo,mobile',
    		'idcrad'  => 'unique:houserinfo,idcrad',
				'password_confirmation' => 'same:password'
			]);

    	if($validator -> errors() -> get('password_confirmation')){
    		return [
    			'code'  => config('myconfig.regi.password_confirmation_code'),
					'msg'   => config('myconfig.regi.password_confirmation_msg')
				];
			}

    	if($validator -> errors() -> get('username')){
    		return [
    			'code'   => config('myconfig.regi.username_code'),
					'msg'    => config('myconfig.regi.username_msg')
				];
			}

    	if($validator -> errors() -> get('mobile')){
    		return [
    			'code'  => config('myconfig.regi.mobile_code'),
					'msg'   => config('myconfig.regi.mobile_msg')
				];
			}

    	if($validator -> errors() -> get('idcrad')){
    		return [
    			'code'  => config('myconfig.regi.idcrad_code'),
					'msg'   => config('myconfig.regi.idcrad_msg')
				];
			}

    	$data['username'] = $query -> input('username');
    	$data['password'] = Hash::make($query -> input('password'));          //使用Hsah加密
    	$data['email'] = $query -> input('email');
    	$data['realname'] = $query -> input('realname');
    	$data['sex'] = $query -> input('sex');
    	$data['mobile'] = $query -> input('mobile');
    	$data['mobile'] = $query -> input('mobile');
    	$data['idcrad'] = $query -> input('idcrad');
			$data['created_at'] = time();
			$data['character'] = 5;
			$info = regi::store_d_houser($data);

    	if($info){
				return [
					'code'   => config('myconfig.regi.houser_add_success_code'),
					'msg'    => config('myconfig.regi.houser_add_success_msg')
				];
			}else{
    		return [
    			'code'  => config('myconfig.regi.houser_add_error_code'),
					'msg'   => config('myconfig.regi.houser_add_error_msg')
				];
			}
		}
}
