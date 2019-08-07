<?php

	/**
	 * 整个系统所有的路由
	 * 作者：李定涛
	 * 邮箱：743678969@qq.com
	 *
	 */

//登录页面展示 系统管理人员登录页面
  Route::get('login','Login\LoginController@login');

//销售人员登录页面
	Route::get('sales','Login\LoginController@sales');
	//iHOUSER使用者注册页面
	Route::get('houser',function(){
		return view('Login.zhuce');
	});
	//iHOUSER使用者注册页面
	Route::post('zhuce','Regi\RegiController@index');
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
	//用户退出
	Route::get('logout/{status}','Login\LoginController@logout');
	//修改密码页面展示
	Route::get('change_password/{status}','Login\LoginController@change_password');
	//用户密码更新
	Route::post('change/password','Login\LoginController@update_password');
	//用户登录之后显示的首页
	Route::get('index','Index\IndexController@index');


//用户登录验证密码和账号
	Route::post('login','Login\LoginController@login_btu');
//以下路由访问需要用户登录
	Route::group(['middleware' => ['login_btn']],function(){
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
		//菜单修改	页面展示
		Route::get('per/edit/{perid}','Admin\Settings\PermissionController@edit');
		//菜单权限数据
		Route::post('per/update','Admin\Settings\PermissionController@update');
		//菜单数据
		Route::post('per/destroy','Admin\Settings\PermissionController@destroy');
		//更改子类菜单状态
		Route::post('per/status','Admin\Settings\PermissionController@status');

		//---------------------------------------职位管理--------------------------------------//
		//职位管理展示页面
		Route::get('position/{perid}','Admin\Settings\PositionController@index');
		//职位添加页面
		Route::get('positioninfo/create',function(){
			return view('Admin.Settings.Position.create');
		});
		//职位新增
		Route::post('positioninfo/store','Admin\Settings\PositionController@store');
		//职位信息修改
		Route::get('positioninfo/edit/{posi_id}','Admin\Settings\PositionController@edit');
		//更新数据
		Route::post('positioninfo/update','Admin\Settings\PositionController@update');
		//删除数据
		Route::post('positioninfo/destroy','Admin\Settings\PositionController@destroy');
		//多选删除
		Route::post('positioninfo/destroy_all','Admin\Settings\PositionController@destroy_all');

		//_________________________________________________新版本角色管理______________________________________________//
		//新本角色管理展示
		Route::get('roleinfo/{perid}','Admin\Settings\RoleinfoController@index');
		//添加页面
		Route::get('roleinfoss/create',function(){
			return view('Admin.Settings.Roleinfo.create');
		});
		//新增角色
		Route::post('roleinfoss/store','Admin\Settings\RoleinfoController@store');
		//修改新本角色信息页面
		Route::get('roleinfo/edit/{role_id}','Admin\Settings\RoleinfoController@edit');
		//更新新本角色信息
		Route::post('roleinfoss/update','Admin\Settings\RoleinfoController@update');
		//删除信息
		Route::post('roleinfo/destroy','Admin\Settings\RoleinfoController@destroy');
		//全选删除
		Route::post('roleinfo/destroy_all','Admin\Settings\RoleinfoController@destroy_all');
		//-----------------------------------系统url管理------------------------------------------//
		//url管理展示页面
		Route::get('url/{perid}','Admin\Settings\UrlController@index');
		//url添加页面
		Route::get('urlinfo/create','Admin\Settings\UrlController@create');
		//url信息录入
		Route::post('urlinfo/store','Admin\Settings\UrlController@store');
		//修改信息页面
		Route::get('urlinfo/edit/{url_id}','Admin\Settings\UrlController@edit');
		//更新url地址
		Route::post('urlinfo/update','Admin\Settings\UrlController@update');
		//删除
		Route::post('urlinfo/destroy','Admin\Settings\UrlController@destroy');
		//多选删除
		Route::post('urlinfo/destroy_all','Admin\Settings\UrlController@destroy_all');
		//----------------------------------权限管理-----------------------------------------//
		//权限管理
		Route::get('permi/{perid}','Admin\Settings\PerminController@index');
    //权限新增
		Route::get('permin/create','Admin\Settings\PerminController@create');
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
    //公
		//司
		//管
		//理
		//-------------------------------公司列表管理---------------------------------------------//
		//公司列表展示页面
		Route::get('company/{perid}','Admin\Company\CompanyController@index');
		//公司信息添加页面
		Route::get('companys/create','Admin\Company\CompanyController@create');
		//公司信息添加
		Route::post('company/store','Admin\Company\CompanyController@store');
		//公司信息修改页面
		Route::get('company/edit/{comp_id}','Admin\Company\CompanyController@edit');
		//更新公司信息
		Route::post('company/update','Admin\Company\CompanyController@update');
		//删除公司信息数据
		Route::post('company/destroy','Admin\Company\CompanyController@destroy');
		//查看公司信息详情
		Route::get('company/view/{comp_id}','Admin\Company\CompanyController@view');
		//多选删除公司信息
		Route::post('company/destroy_all','Admin\Company\CompanyController@destroy_all');
		//改变公司信息状态
		Route::post('company/status','Admin\Company\CompanyController@status');

		//项
		//目
		//管
		//理
		//项目展示页面
		Route::get('projectss/{perid}','Admin\Projectss\ProjectssController@index');
		//项目添加页面
		Route::get('pcreate','Admin\Projectss\ProjectssController@create');
		//项目添加
		Route::post('projectss/store','Admin\Projectss\ProjectssController@store');
		//修改页面
		Route::get('projectss/edit/{project_id}','Admin\Projectss\ProjectssController@edit');
		//更新项目信息
		Route::post('projectss/update','Admin\Projectss\ProjectssController@update');
		//删除用户信息
		Route::post('projectss/destroy','Admin\Projectss\ProjectssController@destroy');
		//多选删除
		Route::post('projectss/destroy_all','Admin\Projectss\ProjectssController@destroy_all');

		//公司成员
		//业
		//顾
		//问
		//--------------------------------------职业顾问-----------------------------------------//
		//职业顾问管理
		Route::get('consultant/{perid}','Admin\Consultant\ConsultantController@index');
		//职业顾问添加
		Route::get('consu/create','Admin\Consultant\ConsultantController@create');
		//职业顾问信息
		Route::post('consu/store','Admin\Consultant\ConsultantController@store');
		//职业顾问信息修改
		Route::get('consu/edit/{hous_id}','Admin\Consultant\ConsultantController@edit');
		//更新职业顾问信息
		Route::post('consu/update','Admin\Consultant\ConsultantController@update');
		//禁用或启用
		Route::post('consu/status','Admin\Consultant\ConsultantController@status');
		//查看信息详情
		Route::get('consu/view/{hous_id}','Admin\Consultant\ConsultantController@view');
		//删除职业顾问
		Route::post('consu/destroy','Admin\Consultant\ConsultantController@destroy');
		//多选删除信息
		Route::post('consu/destroy_all','Admin\Consultant\ConsultantController@destroy_all');

		Route::post('comp_id','Admin\Consultant\ConsultantController@comp_id');

		//客
		//户
		//管
		//理
		//-------------------------------客户列表管理----------------------------//
		//客户信息展示页面
		Route::get('	customer/{perid}','Admin\Customer\CustomerController@index');
		//客户信息新增
		Route::get('omer/create','Admin\Customer\CustomerController@create');
		//添加客户信息
		Route::post('omer/store','Admin\Customer\CustomerController@store');
		//查看客户信息
		Route::get('omer/view/{cust_id}','Admin\Customer\CustomerController@view');
		//客户信息资料修改页面
		Route::get('omer/edit/{cust_id}','Admin\Customer\CustomerController@edit');
		//更新客户资料信息
		Route::post('omer/update','Admin\Customer\CustomerController@update');
		//删除用户信息
		Route::post('omer/destroy','Admin\Customer\CustomerController@destroy');
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


