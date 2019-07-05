<?php

namespace App\Http\Controllers\Login;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use App\Models\login\Login;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{

	/**
	 * 展示登录页面
	 *
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
    public function login(){
    	return view('Login.login');
		}


	/**
	 *
	 * 用户登录
	 *
	 * @param Request $query
	 *
	 * @return array
	 */
		public function login_btu(Request $query){

			$validator = Validator::make( $query->all() , [
				'username' => "required|string|min:1|max:8" ,
				'password' => "required|string|min:3|max:16" ,
			] );

			if($validator -> errors() -> get('username')){
				return [
					'code'   => config('myconfig.login.username_code'),
					'msg'    => config('myconfig.login.username_msg')
				];
			}

			if($validator -> errors() -> get('password')){
				return [
					'code'   => config('myconfig.login.password_code'),
					'msg'    => config('myconfig.login.password_msg')
				];
			}

			$chptcha = $query -> input('captcha');

			if(!captcha_check($chptcha)){
				return [
					'code'  => config('myconfig.login.captcha_fail_code'),
					'msg'   => config('myconfig.login.captcha_fail_msg')
				];
			}
			$username = $query -> input('username');
			$info = Login::get_username_memberinfo($username);
			if(!$info){
				return [
					'code'   => config('myconfig.login.account_number_code'),
					'msg'    => config('myconfig.login.account_number_msg')
				];
			}

			if($info -> status == 0){
				return [
					'code'   => config('myconfig.login.status_code'),
					'msg'    => config('myconfig.login.status_msg')
				];
			}
			$password = $query -> input('password');

			if(Hash::check( $password , $info->password )){
				Session::put('session_member.id',$info-> memberid);   //自增id
				Session::put('session_member.account',$info-> account);  //账号
				Session::put('session_member.username',$info-> username);  //真是姓名
				Session::put('session_member.mobile',$info-> mobile);  //手机号
				Session::put('session_member.avatars',$info-> avatars);  //头像路径
				Session::put('session_member.email',$info-> email);   //邮箱
				Session::put('session_member.character',$info-> ch_per);   //邮箱
				Session::put('session_member.cha_name',$info-> ch_nsme);   //

				return [
					'code'   => config('myconfig.login.login_success_code'),
					'msg'    => config('myconfig.login.login_success_msg')
				];
			}else{
				return [
					'code'   => config('myconfig.login.login_error_code'),
					'msg'    => config('myconfig.login.login_error_msg')
				];
			}
		}


		public function logout(){
			Session::forget( 'session_member' );
			return redirect()->action( 'Login\LoginController@login' );
		}

}
