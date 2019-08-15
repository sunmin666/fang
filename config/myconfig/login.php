<?php

	/**
	 * 登录控制器的配置文件
	 * 作者：李定涛
	 * 邮箱：743678969@qq.com
	 *
	 */
	return [
		'username_code'   => 1,
		'username_msg'    => '用户名不合法',

		'password_code'   => 2,
		'password_msg'    => '密码不合法',

		'input_right_username_code'              => 3 ,
		'input_right_username_msg'               => '请输入正确的用户名！' ,

		'input_right_password_code'              => 4 ,
		'input_right_password_msg'               => '请输入正确的密码！' ,

		'captcha_fail_msgs'   => '验证码不合法',

		'captcha_fail_code'                      => 5 ,
		'captcha_fail_msg'                       => '验证码错误！' ,

		'account_number_code'    => 6,
		'account_number_msg'     => '您的账号不存在',

		'status_code'   => 7,
		'status_msg'    => '您的账号被禁止，请自行联系管理员处理。',

		'login_success_code'  => 8,
		'login_success_msg'   => '恭喜您，登录成功',

		'login_error_code' => 9,
		'login_error_msg' => '您输入的密码错误',


		'password_confirmation_same_code'   => 10,
		'password_confirmation_same_msg'    => '新密码与确认密码不相同',

		'old_password_code'   => 11,
		'old_password_msg'     => '旧密码与之前的不相同',

		'update_password_success_code'   => 12,
		'update_password_success_msg'    => '修改密码成功',

		'update_password_error_code'  => 13,
		'update_password_error_msg'   => '修改密码失败',

		'is_ipad_no_code'    => 14,
		'is_ipad_no_msg'     => '此账号只在ipad上登录',

	];