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


			if(!captcha_check($query -> input('captcha'))){
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

	/**
	 * 用户退出
	 *
	 * @return \Illuminate\Http\RedirectResponse
	 */
		public function logout(){
			Session::forget( 'session_member' );
			return redirect()->action( 'Login\LoginController@login' );
		}

	/**
	 * 修改密码展示页面
	 *
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
		public function change_password(){

			return view('Login.change');
		}

	/**
	 *
	 * 更改当前用户密码
	 *
	 * @param Request $query
	 *
	 * @return array|int
	 */
		public function update_password(Request $query){

			$memberid = Session::get('session_member.id');


			$password = Login::get_d_password($memberid);

			$old_password = $query -> input('old_password');

			if(!Hash::check( $old_password , $password->password )){
				return [
					'code'  => config('myconfig.login.old_password_code'),
					'msg'   => config('myconfig.login.old_password_msg')
				];
			}

			$validator = Validator::make($query->all(),[
				'old_password' => "max:16" ,
				'password' => "max:16" ,
				'password_confirmation' => 'min:3|max:16|same:password'
			]);

			if($validator -> errors('same') ->get('password_confirmation')){
				return [
					'code'   => config('myconfig.login.password_confirmation_same_code'),
					'msg'    => config('myconfig.login.password_confirmation_same_msg')
				];
			}
			$data['password'] = Hash::make($query -> input('password'));

			$info = Login::update_password($memberid,$data);

			if($info){
				return [
					'code'   => config('myconfig.login.update_password_success_code'),
					'msg'    => config('myconfig.login.update_password_success_msg')
				];
			}else{
				return [
					'code'   => config('myconfig.login.update_password_error_code'),
					'msg'    => config('myconfig.login.update_password_error_msg')
				];
			}

		}
}
