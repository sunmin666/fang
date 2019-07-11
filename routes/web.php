<?php

	/**
	 * 整个系统所有的路由
	 * 作者：李定涛
	 * 邮箱：743678969@qq.com
	 *
	 */

//登录页面展示
  Route::get('login','Login\LoginController@login');
//用户登录验证密码和账号
	Route::post('login','Login\LoginController@login_btu');
//以下路由访问需要用户登录
	Route::group(['middleware' => ['login_btn']],function(){
		//用户登录之后显示的首页
		Route::get('index','Index\IndexController@index');
		//用户退出
		Route::get('logout','Login\LoginController@logout');
		//修改密码页面展示
		Route::get('change_password','Login\LoginController@change_password');
		//用户密码更新
		Route::post('change/password','Login\LoginController@update_password');
		//图
		//片
		//上
		//传
		//summernote  编辑器图片上传
		Route::post('mupload','UploadController@mupload');
		//layur 图片上传
		Route::post('lupload','UploadController@lupload');
		//普通图片上传
		Route::post('upload','UploadController@upload');

		//系
		//统
		//设
		//置
		//--------------------------------用户管理--------------------------------------------------//
		//用户展示页面
		Route::get('memberinfo/{perid}','Admin\Settings\MenberinfoController@index');
		//用户添加展示页面
		Route::get('member/create','Admin\Settings\MenberinfoController@create');
		//添加用户信息到数据库
		Route::post('member/store','Admin\Settings\MenberinfoController@store');
		//修改用户信息页面
		Route::get('member/edit/{memberid}','Admin\Settings\MenberinfoController@edit');
		//更新数据库信息
		Route::post('member/update','Admin\Settings\MenberinfoController@update');
		//删除信息
		Route::post('member/destroy','Admin\Settings\MenberinfoController@destroy');
		//多选删除
		Route::post('member/destroy_all','Admin\Settings\MenberinfoController@destroy_all');
		//用户状态的更改
		Route::post('member/status','Admin\Settings\MenberinfoController@status');

		//-------------------------------菜单管理--------------------------------------------------------//
		//菜单展示页面
		Route::get('permission/{perid}','Admin\Settings\PermissionController@index');
		//菜单添加页面
		Route::get('per/create','Admin\Settings\PermissionController@create');
		//菜单添加
		Route::post('per/store','Admin\Settings\PermissionController@store');
		//菜单权限页面展示
		Route::get('per/edit/{perid}','Admin\Settings\PermissionController@edit');
		//菜单权限数据
		Route::post('per/update','Admin\Settings\PermissionController@update');
		//菜单数据
		Route::post('per/destroy','Admin\Settings\PermissionController@destroy');
		//更改子类菜单状态
		Route::post('per/status','Admin\Settings\PermissionController@status');
		//--------------------------------------角色管理------------------------------------------//
		//角色列表展示页面
		Route::get('character/{perid}','Admin\Settings\CharacterController@index');
		//角色加页面展示
		Route::get('cha/create','Admin\Settings\CharacterController@create');
		//添加到数据库
		Route::post('cha/store','Admin\Settings\CharacterController@store');
		//修改页面展示
		Route::get('cha/edit/{chid}','Admin\Settings\CharacterController@edit');
		//更新角色数据
		Route::post('cha/update','Admin\Settings\CharacterController@update');
		//删除角色信息管理
		Route::post('cha/destroy','Admin\Settings\CharacterController@destroy');

		//网
		//站
		//管
		//理
		//--------------------------------项目简介-----------------------------------------------//
		//项目简介展示页面
		Route::get('project/{perid}','Admin\Website\ProjectController@index');
		//项目简介添加页面展示
		Route::get('pro/create','Admin\Website\ProjectController@create');
		//项目简介添加到数据库
		Route::post('por/store','Admin\Website\ProjectController@store');
		//修改醒目简介页面展示
		Route::get('pro/edit/{nid}','Admin\Website\ProjectController@edit');
		//更新数据库数据
		Route::post('por/update','Admin\Website\ProjectController@update');
		//删除项目简介
		Route::post('pro/destroy','Admin\Website\ProjectController@destroy');

		//---------------------------------区域配套----------------------------------------//
		//区域配套页面展示
		Route::get('package/{perid}','Admin\Website\PackageController@index');
		//区域配套新增页面展示
		Route::get('pack/create','Admin\Website\PackageController@create');
		//区域配套新增
		Route::post('pack/store','Admin\Website\PackageController@store');
		//修改页面展示
		Route::get('pack/edit/{nid}','Admin\Website\PackageController@edit');
		//修改数据库信息
		Route::post('pack/update','Admin\Website\PackageController@update');
		//删除数据
		Route::post('pack/destroy','Admin\Website\PackageController@destroy');

		//----------------------------------户型介绍-------------------------------------//
		//户型介绍展示页面
		Route::get('introduction/{perid}','Admin\Website\IntroductionController@index');
		//户型介绍添加页面展示
		Route::get('intr/create','Admin\Website\IntroductionController@create');
		//户型介绍添加
		Route::post('intr/store','Admin\Website\IntroductionController@store');
		//户型介绍修改页面展示
		Route::get('intr/edit/{intr_id}','Admin\Website\IntroductionController@edit');
		//户型信息更新
		Route::post('intr/update','Admin\Website\IntroductionController@update');
		//删除户型介绍信息
		Route::post('intr/destroy','Admin\Website\IntroductionController@destroy');
		//多选删除
		Route::post('intr/destroy_all','Admin\Website\IntroductionController@destroy_all');

		//---------------------------------------------实景展示------------------------------------、、
		//实景展示展示页面
		Route::get('display/{perid}','Admin\Website\DisplayController@index');
		//实景展示添加页面
		Route::get('displays/create','Admin\Website\DisplayController@create');
//		Route::get('displays/create','');
		//实景展示添加
		Route::post('display/store','Admin\Website\DisplayController@store');
		//实景展示修改页面
		Route::get('display/edit/{intr_id}','Admin\Website\DisplayController@edit');
		//实景展示数据更新
		Route::post('display/update','Admin\Website\DisplayController@update');
		//实景展示删除
		Route::post('display/destroy','Admin\Website\DisplayController@destroy');
		//多选删除
		Route::post('display/destroy_all','Admin\Website\DisplayController@destroy_all');

		//--------------------------------联系我们------------------------------------------------//
		Route::get('contact/{perid}','Admin\Website\ContactController@index');
		//删除用户留言
		Route::post('conta/destroy','Admin\Website\ContactController@destroy');
		//多选翻译
		Route::post('conta/destroy_all','Admin\Website\ContactController@destroy_all');

	});


	//用户联系我们页面
	Route::get('we','Admin\Website\ContactController@create');
	Route::post('we/store','Admin\Website\ContactController@store');
	//查看网站管理信息(项目简介.配套设施)
	Route::get('view/{nid}','Admin\Website\ViewController@index');
	//查看户型介绍
	Route::get('view/intr/{intr_id}','Admin\Website\ViewController@intr');

Route::get('/', function () {
    return view('welcome');
});
