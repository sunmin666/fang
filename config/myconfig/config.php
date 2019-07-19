<?php

	/**
	 * 自定义配置文件
	 *
	 * 作者： 李定涛
	 *
	 * 邮箱：743678969@qq.com
	 */

	return [

		//以下是整个系统的配置
		'zc_iHOUSER'                             => 'iHOUSER系统注册',
		'dl_iHOUSER'                             => 'iHOUSER系统登录',
		'cn_appname'                             => '房地产后台管理系统' ,
		'en_appname'                             => '<b>房地产</b>系统' ,
		'en_shortname'                           => 'OA' ,
		'system_mail'                            => 'admin@qingter.com' ,
		'web_url'                                => 'QingTer.com' ,
		'webtitle'                               => '房地产管理' ,
		'version'                                => ' v 0.1 版本' ,
		'copyright'                              => "<strong>Copyright &copy; 2009-".date( 'Y' )
			." <a href='http://QingTer.com/' target='_blank'>QingTer.com</a>.</strong> All rights reserved." ,


		'view_skin'                              => 'skin-red-light' ,
		// 复选框皮肤要与页面皮肤皮肤对应 icheckbox_square-blue、icheckbox_square-black、icheckbox_square-purple、icheckbox_square-yellow、icheckbox_square-red
		'checkbox_skin'                          => 'icheckbox_square-red' ,
		// 单选框皮肤要与页面皮肤皮肤对应 iradio_square-blue、iradio_square-black、iradio_square-purple、iradio_square-yellow、iradio_square-red
		//'radio_skin'                 => 'iradio_square-red',
		// 提交[操作]按钮皮肤要与页面皮肤皮肤对应 btn-primary(blue)、btn-danger(red)、btn-success(green)、btn-warning(yellow)
		'button_skin'                            => 'btn-danger' ,
		'button_operation_skin'                  => 'btn-warning' ,
		'button_forbidden_skin'                  => 'btn-danger' ,
		'button_start_using_skin'                => 'btn-success' ,
		// 窗体消失时间 常用的有 1000 ，1500，2000；
		'close_time'                             => 2000 ,


		//每页显示的数量
		'page_num'                               => 10 ,


		// 数字：/^[0-9]*\w{5,18}$/
		'account_pattern'                        => "/^[0-9]{5,10}$/" ,
		// 英文和数字：^[A-Za-z0-9]+$ 或 ^[A-Za-z0-9]{4,40}$
		'username_pattern'                       => "/^[A-Za-z0-9]*\w{4,18}$/" ,
		// 密码(以字母开头，长度在6~18之间，只能包含字母、数字和下划线)
		'password_pattern'                       => "/^[A-Za-z0-9]*\w{6,18}$/" ,
		// 验证码(以字母或数字组成，长度在4之间，只能包含字母、数字)
		'captcha_pattern'                        => "/^[a-zA-Z0-9]{4}$/" ,
		//中文名称验证，不包含少数名族带点的如：卡尔·马克思 这样的 这个是可以允许带点的中文姓名^[\u4e00-\u9fa5]+(·[\u4e00-\u9fa5]+)*$
		'realname_pattern'                       => "/^[\u4E00-\u9FA5\uf900-\ufa2d]{1,20}$/" ,

		//身份证正则表达式
		'idcard_pattern'                         => "/(^\d{15}$)|(^\d{18}$)|(^\d{17}(\d|X|x)$)/" ,

		// 邮箱验证
		'email_pattern'                          => "/^(([a-zA-Z0-9_\-\.]+)@([a-zA-Z0-9_\-\.]+)\.([a-zA-Z]{2,5}){1,25})$/" ,
		// 包含了 166、198、199 号段的手机号
		'mobile_pattern'                         => "/^1([38][0-9]|4[579]|5[0-3,5-9]|6[6]|7[0135678]|9[89])\d{8}$/" ,
		//金额正则
		'money_pattern'                          => "/^(([1-9][0-9]*)|(([0]\.\d{1,2}|[1-9][0-9]*\.\d{1,3})))$/" ,
		
		//正则验证座机号
		'zuoji'                                  => '/0\d{2}-\d{7,8}/',



		//出发地，目的地正则
		'place_pattern'                          => "/^[a-zA-Z0-9]+/" ,
		//正则特殊字符
		'regEn'                                  => "/[`~!@#$%^*()_+?:{},.\/;[\]]/" ,
		'regCn'                                  => "/[·！#￥（——）：；“”‘、，|《。》？、【】[\]]/" ,
		// 角色标题 只能是英文字母，可以带空格
		'role_title_pattern'                     => "/^[a-zA-Z -]*\w{1,100}$/" ,
		// 角色名称 只能是中文或者日文
		'role_name_pattern'                      => "/[\u30a1-\u30f6\u3041-\u3093\uFF00-\uFFFF\u4e00-\u9fa5]{2,100}/" ,
		// 权限标题 只能是英文字母，可以带空格
		'perm_title_pattern'                     => "/^[a-zA-Z -]*\w{1,50}$/" ,
		// 权限名称 只能是中文或者日文
		'perm_name_pattern'                      => "/[\u30a1-\u30f6\u3041-\u3093\uFF00-\uFFFF\u4e00-\u9fa5]{2,50}/" ,
		// 描述 只能是中文或者日文
		'description_pattern'                    => "/[\u30a1-\u30f6\u3041-\u3093\uFF00-\uFFFF\u4e00-\u9fa5]{2,100}/" ,
		// 请求方法 只能是英文字母 和 | 分割符
		'http_method_pattern'                    => "/^[a-zA-Z|]*\w{1,30}$/" ,
		// 请求路径 如 /memberinfo/list/
		'http_path_pattern'                      => "/^\/(\w+\/?)+$/" ,
		// 部门标题 只能是英文字母，可以带空格
		'depa_title_pattern'                     => "/^[a-zA-Z -]*\w{1,50}$/" ,
		// 部门名称 只能是中文或者日文
		'depa_name_pattern'                      => "/[\u30a1-\u30f6\u3041-\u3093\uFF00-\uFFFF\u4e00-\u9fa5]{2,50}/" ,


	];