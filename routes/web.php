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

	//跳转到提示页面
	Route::get('/permi','Login\LoginController@permi');

	//iHOUSER使用者注册页面
	Route::post('zhuce','Regi\RegiController@index');



//用户登录验证密码和账号
	Route::post('login','Login\LoginController@login_btu');

	//以下路由访问需要登录
	Route::group(['middleware' => ['login_btn']],function(){

		//上传视频
		Route::post('video','UploadController@videos');

		//房源信息楼号下拉联动单元号
		Route::post('buildnum','Admin\Homeinfo\HomeController@buildnum');
		//房源信息单元号联动房号
		Route::post('unitnum','Admin\Homeinfo\HomeController@buildnum');

		//根据单元号去homeinfo表里查询单元下的房子并且status只等与1
		Route::post('homeinfo/unitnum','Admin\Buy\BuyController@unitnum');

		//根据用户id查询用户信息
		Route::post('customer/change','Admin\Buy\BuyController@customer_change');
		//根据房子id查询房子信息
		Route::post('homeinfo/view','Admin\Buy\BuyController@homeinfo_view');

		//用户登录之后显示的首页
		Route::get('index','Index\IndexController@index');
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

		//--------------------------用户信息------------------------------------------//
		//添加用户信息到数据库
		Route::post('member/store','Admin\Settings\MenberinfoController@store');
		//更新数据库信息
		Route::post('member/update','Admin\Settings\MenberinfoController@update');
		//---------------------------菜单管理-----------------------------------------//
		//菜单添加
		Route::post('per/store','Admin\Settings\PermissionController@store');
		//菜单权限数据
		Route::post('per/update','Admin\Settings\PermissionController@update');

		//-------------------------------职位管理-------------------------------------、、
		//职位新增
		Route::post('positioninfo/store','Admin\Settings\PositionController@store');
		//更新数据
		Route::post('positioninfo/update','Admin\Settings\PositionController@update');
		//-------------------------------角色管理-------------------------------------//
		//新增角色
		Route::post('roleinfoss/store','Admin\Settings\RoleinfoController@store');
		//更新新本角色信息
		Route::post('roleinfoss/update','Admin\Settings\RoleinfoController@update');
		//-------------------------------------url管理------------------------------------//
		//url信息录入
		Route::post('urlinfo/store','Admin\Settings\UrlController@store');
		//更新url地址
		Route::post('urlinfo/update','Admin\Settings\UrlController@update');
		//权限新增数据库
		Route::post('permin/store','Admin\Settings\PerminController@store');
		//数据更改
		Route::post('permin/update','Admin\Settings\PerminController@update');
		//项目简介添加到数据库
		Route::post('por/store','Admin\Website\ProjectController@store');
		//更新数据库数据
		Route::post('por/update','Admin\Website\ProjectController@update');
		//区域配套新增
		Route::post('pack/store','Admin\Website\PackageController@store');
		//修改数据库信息
		Route::post('pack/update','Admin\Website\PackageController@update');
		//户型介绍添加
		Route::post('intr/store','Admin\Website\IntroductionController@store');
		//户型信息更新
		Route::post('intr/update','Admin\Website\IntroductionController@update');
		//实景展示添加
		Route::post('display/store','Admin\Website\DisplayController@store');
		//实景展示数据更新
		Route::post('display/update','Admin\Website\DisplayController@update');
		//更新公司信息
		Route::post('company/update','Admin\Company\CompanyController@update');
		//公司信息添加
		Route::post('company/store','Admin\Company\CompanyController@store');
		//项目添加
		Route::post('projectss/store','Admin\Projectss\ProjectssController@store');
		//更新项目信息
		Route::post('projectss/update','Admin\Projectss\ProjectssController@update');
		//职业顾问信息
		Route::post('consu/store','Admin\Consultant\ConsultantController@store');
		//更新职业顾问信息
		Route::post('consu/update','Admin\Consultant\ConsultantController@update');

		//顾问折扣信息添加
		Route::post('enjoyss/store','Admin\Consultant\ConsultantController@store_enjoy');
		//顾问折扣信息更新
		Route::post('enjoyss/update','Admin\Consultant\ConsultantController@update_enjoy');

		//添加客户信息
		Route::post('omer/store','Admin\Customer\CustomerController@store');
		//更新客户资料信息
		Route::post('omer/update','Admin\Customer\CustomerController@update');

		//字段信息新增
		Route::post('field/store','Admin\Field\FieldController@store');
		//字段信息更新
		Route::post('field/update','Admin\Field\FieldController@update');

		//房子表（销控表）录入
		Route::post('home/store','Admin\Homeinfo\HomeController@store');
		//房子表（销控表）更新
		Route::post('home/update','Admin\Homeinfo\HomeController@update');

		//营销知识库添加
		Route::post('knowledgeinfo/store','Admin\Knowledge\KnowledgeController@store');
		//更新
		Route::post('knowledgeinfo/update','Admin\Knowledge\KnowledgeController@update');

		//企业文化
		//添加企业文化页面
		Route::post('cultrue/store','Admin\Cultrue\CultrueController@store');
		//企业文化数据修改
		Route::post('cultrue/update','Admin\Cultrue\CultrueController@update');

		//认购信息新增
		Route::post('buyinfoss/store','Admin\Buy\BuyController@store');
		//认购信息更新
		Route::post('buyinfoss/update','Admin\Buy\BuyController@update');
		//认购信息详情
		Route::get('buyinfoss/view/{buyid}','Admin\Buy\BuyController@view');

		//经理审核提交
		Route::post('buyinfoss/update_review','Admin\Buy\BuyController@update_review');
		//财务审核提交
		Route::post('buyinfoss/update_cwview','Admin\Buy\BuyController@update_cwview');

		//签约新增数据库
		Route::post('signinfo/store','Admin\Signinfo\SigninfoController@store');
		//更新修改
		Route::post('signinfo/update','Admin\Signinfo\SigninfoController@update');

		//签约经理审核
		Route::post('signinfo/update_review','Admin\Signinfo\SigninfoController@update_review');
		//签约财务审核
		Route::post('signinfo/update_cwview','Admin\Signinfo\SigninfoController@update_cwview');


		//换房信息
		//换房新增
		Route::post('change_home/store','Admin\Change\ChaneController@store');
		//换房修改页面
		Route::post('change_home/update','Admin\Change\ChaneController@update');
		//换房经理审核
		Route::post('change_home/update_review','Admin\Change\ChaneController@update_review');
		//换房时财务审核
		Route::post('change_home/update_cwview','Admin\Change\ChaneController@update_cwview');


		//退房信息添加
		Route::post('checkout/store','Admin\Checkout\CheckoutController@store');
		//退房信息修改
		Route::post('checkout/update','Admin\Checkout\CheckoutController@update');
		//退房经理审核
		Route::post('checkout/update_review','Admin\Checkout\CheckoutController@update_review');
		//退房财务审核
		Route::post('checkout/update_cwview','Admin\Checkout\CheckoutController@update_cwview');


	});





//以下路由访问需要用户登录以需要有权限
	Route::group(['middleware' => ['login_btn','check_permi']],function(){
		//系
		//统
		//设
		//置
		//--------------------------------用户管理--------------------------------------------------//
		//用户展示页面
		Route::get('memberinfo/{perid}','Admin\Settings\MenberinfoController@index');
		//用户添加展示页面
		Route::get('member/create','Admin\Settings\MenberinfoController@create');
		//修改用户信息页面
		Route::get('member/edit/{memberid}','Admin\Settings\MenberinfoController@edit');
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
		//菜单修改	页面展示
		Route::get('per/edit/{perid}','Admin\Settings\PermissionController@edit');
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
		//职位信息修改
		Route::get('positioninfo/edit/{posi_id}','Admin\Settings\PositionController@edit');

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
		//修改新本角色信息页面
		Route::get('roleinfo/edit/{role_id}','Admin\Settings\RoleinfoController@edit');
		//删除信息
		Route::post('roleinfo/destroy','Admin\Settings\RoleinfoController@destroy');
		//全选删除
		Route::post('roleinfo/destroy_all','Admin\Settings\RoleinfoController@destroy_all');

		//-----------------------------------系统url管理------------------------------------------//
		//url管理展示页面
		Route::get('url/{perid}','Admin\Settings\UrlController@index');
		//url添加页面
		Route::get('urlinfo/create','Admin\Settings\UrlController@create');

		//修改信息页面
		Route::get('urlinfo/edit/{url_id}','Admin\Settings\UrlController@edit');

		//删除
		Route::post('urlinfo/destroy','Admin\Settings\UrlController@destroy');
		//多选删除
		Route::post('urlinfo/destroy_all','Admin\Settings\UrlController@destroy_all');
		//url禁止或启用
		Route::post('urlinfo/status','Admin\Settings\UrlController@status');
		//----------------------------------权限管理-----------------------------------------//
		//权限管理
		Route::get('permi/{perid}','Admin\Settings\PerminController@index');
    //权限新增
		Route::get('permin/create','Admin\Settings\PerminController@create');

		//修改信息
		Route::get('permin/edit/{perm_id}','Admin\Settings\PerminController@edit');

		//删除
		Route::post('permin/destroy','Admin\Settings\PerminController@destroy');
		//多选删除
		Route::post('permin/destroy_all','Admin\Settings\PerminController@destroy_all');

		//网
		//站
		//管
		//理
		//--------------------------------项目简介-----------------------------------------------//
		//项目简介展示页面
		Route::get('project/{perid}','Admin\Website\ProjectController@index');
		//项目简介添加页面展示
		Route::get('pro/create','Admin\Website\ProjectController@create');

		//修改醒目简介页面展示
		Route::get('pro/edit/{nid}','Admin\Website\ProjectController@edit');

		//删除项目简介
		Route::post('pro/destroy','Admin\Website\ProjectController@destroy');

		//---------------------------------区域配套----------------------------------------//
		//区域配套页面展示
		Route::get('package/{perid}','Admin\Website\PackageController@index');
		//区域配套新增页面展示
		Route::get('pack/create','Admin\Website\PackageController@create');

		//修改页面展示
		Route::get('pack/edit/{nid}','Admin\Website\PackageController@edit');

		//删除数据
		Route::post('pack/destroy','Admin\Website\PackageController@destroy');

		//----------------------------------户型介绍-------------------------------------//
		//户型介绍展示页面
		Route::get('introduction/{perid}','Admin\Website\IntroductionController@index');
		//户型介绍添加页面展示
		Route::get('intr/create','Admin\Website\IntroductionController@create');

		//户型介绍修改页面展示
		Route::get('intr/edit/{intr_id}','Admin\Website\IntroductionController@edit');

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

		//实景展示修改页面
		Route::get('display/edit/{intr_id}','Admin\Website\DisplayController@edit');
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

		//公司信息修改页面
		Route::get('company/edit/{comp_id}','Admin\Company\CompanyController@edit');

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

		//修改页面
		Route::get('projectss/edit/{project_id}','Admin\Projectss\ProjectssController@edit');

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

		//职业顾问信息修改
		Route::get('consu/edit/{hous_id}','Admin\Consultant\ConsultantController@edit');

		//禁用或启用
		Route::post('consu/status','Admin\Consultant\ConsultantController@status');
		//查看信息详情
		Route::get('consu/view/{hous_id}','Admin\Consultant\ConsultantController@view');
		//删除职业顾问
		Route::post('consu/destroy','Admin\Consultant\ConsultantController@destroy');
		//多选删除信息
		Route::post('consu/destroy_all','Admin\Consultant\ConsultantController@destroy_all');

		//顾问折扣信息
		Route::get('enjoy/{perid}','Admin\Consultant\ConsultantController@enjoy');
		//添加页面
		Route::get('enjoyss/create',function(){
			return view('Admin.Consu.Enjoy.create');
		});
		//修改折扣信息
		Route::get('enjoyss/edit/{enjoy_id}','Admin\Consultant\ConsultantController@edit_enjoy');
		//删除折扣信息
		Route::post('enjoyss/destroy','Admin\Consultant\ConsultantController@destroy_enjoy');

		//客
		//户
		//管
		//理
		//-------------------------------客户列表管理----------------------------//
		//客户信息展示页面
		Route::get('	customer/{perid}','Admin\Customer\CustomerController@index');
		//客户信息新增
		Route::get('omer/create','Admin\Customer\CustomerController@create');

		//查看客户信息
		Route::get('omer/view/{cust_id}','Admin\Customer\CustomerController@view');
		//客户信息资料修改页面
		Route::get('omer/edit/{cust_id}','Admin\Customer\CustomerController@edit');
		//删除用户信息
		Route::post('omer/destroy','Admin\Customer\CustomerController@destroy');

		//字
		//段
		//信
		//息
		//字段信息展示页面
		Route::get('fieldinfo/{perid}','Admin\Field\FieldController@index');
		//字段信息添加页面
		Route::get('field/create','Admin\Field\FieldController@create');
		//字段修改
		Route::get('field/edit/{field_id}','Admin\Field\FieldController@edit');
		//字段删除
		Route::post('field/destroy','Admin\Field\FieldController@destroy');

		//房
		//源
		//信
		//息
		//（销控表）
		Route::get('homeinfo/{perid}','Admin\Homeinfo\HomeController@index');
		//房子信息添加页面
		Route::get('home/create','Admin\Homeinfo\HomeController@create');
		//房子表数据修改页面
		Route::get('home/edit/{homeid}','Admin\Homeinfo\HomeController@edit');
		//房子信息表删除
		Route::post('home/destroy','Admin\Homeinfo\HomeController@destroy');
		//全选删除
		Route::post('home/destroy_all','Admin\Homeinfo\HomeController@destroy_all');
		//查看详情
		Route::get('home/view/{homeid}','Admin\Homeinfo\HomeController@view');
		//----------------------------------房子图形信息查看-------------------------------------------//
		Route::get('homegrp/{perid}','Admin\Homeinfo\HomeController@homegrp');
		//房子状态修改
		Route::get('homegrp/update_s/{homeid}','Admin\Homeinfo\HomeController@update_s');
		//更新房子状态信息表
		Route::post('homegrp/update_ss','Admin\Homeinfo\HomeController@update_ss');

		//营销知识库
		//营销知识库展示页面
		Route::get('knowledge/{perid}','Admin\Knowledge\KnowledgeController@index');
		//营销知识库新增页面
		Route::get('knowledgeinfo/create','Admin\Knowledge\KnowledgeController@create');
		//修改页面
		Route::get('knowledgeinfo/edit/{know_id}','Admin\Knowledge\KnowledgeController@edit');
		//修改
		Route::post('knowledgeinfo/destroy','Admin\Knowledge\KnowledgeController@destroy');
		//权限删除
		Route::post('knowledge/destroy_all','Admin\Knowledge\KnowledgeController@destroy_all');
		//查看
		Route::get('knowledgeinfo/view/{know_id}','Admin\Knowledge\KnowledgeController@view');


		//企业文化
		Route::get('culture/{perid}','Admin\Cultrue\CultrueController@index');
		//添加企业文化页面
		Route::get('cultrue/create','Admin\Cultrue\CultrueController@create');
		//企业文化数据修改页面
		Route::get('cultrue/edit/{cult_id}','Admin\Cultrue\CultrueController@edit');
		//企业文化全选删除
		Route::post('cultrue/destroy_all','Admin\Cultrue\CultrueController@destroy_all');
		//单条删除企业文化
		Route::post('cultrue/destroy','Admin\Cultrue\CultrueController@destroy');
		//企业详情
		Route::get('cultrue/view/{cult_id}','Admin\Cultrue\CultrueController@view');


		//客户跟踪
		Route::get('trackinfo/{perid}','Admin\Trackinfo\TrackinfoController@index');
		//客户跟踪添加页面展示
		Route::get('trackinfo/showtrack/{cust_id}','Admin\Trackinfo\TrackinfoController@showtrack');
		//添加客户跟踪信息
		Route::post('trackinfo/store','Admin\Trackinfo\TrackinfoController@store');
		//客户跟踪修改页面
		Route::get('trackinfo/edit/{trackid}','Admin\Trackinfo\TrackinfoController@edit');
		//更新数据
		Route::post('trackinfo/destroy','Admin\Trackinfo\TrackinfoController@destroy');
		//客户跟踪详情
		Route::get('trackinfo/view/{trackid}','Admin\Trackinfo\TrackinfoController@view');
		//单条删除客户跟踪
		Route::post('trackinfo/del','Admin\Trackinfo\TrackinfoController@del');
		//全选删除客户跟踪
		Route::post('trackinfo/destroy_all','Admin\Trackinfo\TrackinfoController@destroy_all');


		//房屋共有人
		Route::get('coownerinfo/{perid}','Admin\Coownerinfo\CoownerinfoController@index');
		//房屋共有人修改页面
		Route::get('coownerinfo/edit/{coow_id}','Admin\Coownerinfo\CoownerinfoController@edit');
		//房屋共有人更新数据
		Route::post('coownerinfo/destroy','Admin\Coownerinfo\CoownerinfoController@destroy');
		//房屋共有人详情
		Route::get('coownerinfo/view/{coow_id}','Admin\Coownerinfo\CoownerinfoController@view');
		//房屋共有人单条删除
		Route::post('coownerinfo/del','Admin\Coownerinfo\CoownerinfoController@del');
		//房屋共有人全选删除
		Route::post('coownerinfo/destroy_all','Admin\Coownerinfo\CoownerinfoController@destroy_all');
		//房屋共有人添加页面
		Route::get('coownerinfo/get_coowner/{cust_id}','Admin\Coownerinfo\CoownerinfoController@show_cowner');
		//房屋共有人添加
		Route::post('coownerinfo/store','Admin\Coownerinfo\CoownerinfoController@store');


		//缴费记录
		Route::get('payloginfo/{perid}','Admin\Payloginfo\PayloginfoController@index');
		//缴费添加记录页面
		Route::get('payloginfo/get_coowner/{cust_id}','Admin\Payloginfo\PayloginfoController@show_cowner');
		//添加缴费记录
		Route::post('payloginfo/store','Admin\Payloginfo\PayloginfoController@store');
		//修改页面展示
		Route::get('payloginfo/edit/{payl_id}','Admin\Payloginfo\PayloginfoController@edit');
		//缴费记录更新数据
		Route::post('payloginfo/destroy','Admin\Payloginfo\PayloginfoController@destroy');
		//查看详情
		Route::get('payloginfo/view/{payl_id}/{subscription_num}','Admin\Payloginfo\PayloginfoController@view');
		//缴费记录删除单条
		Route::post('payloginfo/del','Admin\Payloginfo\PayloginfoController@del');
		//缴费记录删除多条
		Route::post('payloginfo/destroy_all','Admin\Payloginfo\PayloginfoController@destroy_all');



		//缴费方案
		Route::get('purchase/{perid}','Admin\Purchase\PurchaseController@index');
		//添加方案页面
		Route::get('purchase/get_coowner/{cust_id}','Admin\Purchase\PurchaseController@show_cowner');
		//添加方案信息
		Route::post('purchase/store','Admin\Purchase\PurchaseController@store');
		//修改页面展示
		Route::get('purchase/edit/{planid}','Admin\Purchase\PurchaseController@edit');
		//方案更新数据
		Route::post('purchase/destroy','Admin\Purchase\PurchaseController@destroy');
		//方案详情
		Route::get('purchase/view/{planid}','Admin\Purchase\PurchaseController@view');
		//方案删除单条
		Route::post('purchase/del','Admin\Purchase\PurchaseController@del');
		//方案全选删除
		Route::post('purchase/destroy_all','Admin\Purchase\PurchaseController@destroy_all');


		//认
		//购
		//管
		//理
		//---------------------------------------认购信息---------------------------------//
		//认购信息列表展示
		Route::get('buyinfo/{perid}','Admin\Buy\BuyController@index');
		//认购添加页面
		Route::get('buyinfoss/create','Admin\Buy\BuyController@create');
		//认购修改页面
		Route::get('buyinfoss/edit/{buyid}','Admin\Buy\BuyController@edit');
		//经理审核
		Route::get('buyinfoss/review/{buyid}/{homeid}','Admin\Buy\BuyController@review');
		//删除认购信息
		Route::post('buyinfoss/destroy','Admin\Buy\BuyController@destroy');
		//换房
		Route::post('buyinfoss/huan','Admin\Buy\BuyController@huan');
		//财务审核
		Route::get('buyinfoss/cwview/{buyid}/{homeid}','Admin\Buy\BuyController@cwview');
		//在客户信息里面发起认购
		Route::get('buyinfo/initiate/{cust_id}','Admin\Buy\BuyController@initiate');
		//多选删除认购信息
		Route::post('buyinfoss/destroy_all','Admin\Buy\BuyController@destroy_all');

		//签约管理
		//签约展示
		Route::get('signinfo/{perid}','Admin\Signinfo\SigninfoController@index');
		//办理签约
		Route::get('buyinfo/signinfo/{buyid}','Admin\Signinfo\SigninfoController@get_buy_cust');
		//查看签约详情
		Route::get('signinfo/view/{sigid}','Admin\Signinfo\SigninfoController@view');
		//修改签约信息
		Route::get('signinfo/edit/{sigid}','Admin\Signinfo\SigninfoController@edit');
		//删除
		Route::post('signinfo/destroy','Admin\Signinfo\SigninfoController@destroy');
		//多选删除
		Route::post('siginfo/destroy_all','Admin\Signinfo\SigninfoController@destroy_all');
		//签约经理审核
		Route::get('signinfo/review/{sigid}/{buyid}','Admin\Signinfo\SigninfoController@review');
		//财务审核
		Route::get('signinfo/cwview/{sigid}/{buyid}/{homeid}','Admin\Signinfo\SigninfoController@cwview');


		//延迟签约管理
		//延迟签约展示
		Route::get('delaysig/{perid}','Admin\Signinfo\SigninfoController@index_delay');
		//签约页面
		Route::get('delaysig/signinfo/{sigid}','Admin\Signinfo\SigninfoController@get_buy_custt');
		//添加签约
		Route::post('delaysig/store','Admin\Signinfo\SigninfoController@delay_store');
		//修改延迟签约
		Route::get('delaysig/edit/{signid}','Admin\Signinfo\SigninfoController@delay_edit');
		//更新延迟签约信息
		Route::post('delaysig/destroy','Admin\Signinfo\SigninfoController@delay_destroy');
		//延迟签约详情
		Route::get('delaysig/view/{signid}','Admin\Signinfo\SigninfoController@delay_view');
		//延迟签约删除单条
		Route::post('delaysig/del','Admin\Signinfo\SigninfoController@del');
		//延迟签约全选删除
		Route::post('delaysig/destroy_all','Admin\Signinfo\SigninfoController@delay_destroy_all');




		//换房信息展示页面
		Route::get('changeh/{perid}','Admin\Change\ChaneController@index');

		//换房页面
		Route::get('chang/home/{buyid}/{homeid}','Admin\Change\ChaneController@create');

		//换房详情页面
		Route::get('chang_home/view/{chan_id}','Admin\Change\ChaneController@view');
		//换房页面修改信息
		Route::get('chang_home/edit/{chan_id}','Admin\Change\ChaneController@edit');
		//删除信息
		Route::post('chang_home/destroy','Admin\Change\ChaneController@destroy');
		//多选删除
		Route::post('change_home/destroy_all','Admin\Change\ChaneController@destroy_all');
		//经理审核页面
		Route::get('change_home/review/{chan_id}/{new_homeid}','Admin\Change\ChaneController@review');
		//换房时财务审核
		Route::get('change_home/cwview/{chan_id}/{old_homeid}/{new_homeid}','Admin\Change\ChaneController@cwview');



		//更名管理
		Route::get('changecust/{perid}','Admin\Changecust\ChangecustController@index');
		//更名添加页面
		Route::get('changecust/get_cust/{buyid}/{homeid}','Admin\Changecust\ChangecustController@get_cust');
		//更名添加数据
		Route::post('changecust/store','Admin\Changecust\ChangecustController@store');
		//更名修改页面
		Route::get('changecust/edit/{chan_id}','Admin\Changecust\ChangecustController@edit');
		//更名更新数据
		Route::post('changecust/destroy','Admin\Changecust\ChangecustController@destroy');
		//更名详情
		Route::get('changecust/view/{chan_id}','Admin\Changecust\ChangecustController@view');
		//删除单条
		Route::post('changecust/del','Admin\Changecust\ChangecustController@del');
		//更名全选删除
		Route::post('changecust/destroy_all','Admin\Changecust\ChangecustController@destroy_all');
		//经理审核页面
		Route::get('changecust/review/{chan_id}/{new_cust}/{buyid}','Admin\Changecust\ChangecustController@review');
		//经理审核
		Route::post('changecust/update_review','Admin\Changecust\ChangecustController@update_review');


		//退房信息展示页面
		Route::get('checkout/{perid}','Admin\Checkout\CheckoutController@index');
		//退房信息新增
		Route::get('checkout/create/{buyid}/{homeid}/{cust_id}/{status}','Admin\Checkout\CheckoutController@create');
		//退房信息修改
		Route::get('checkout/edit/{chan_id}','Admin\Checkout\CheckoutController@edit');
		//查看信息
		Route::get('checkout/view/{chan_id}','Admin\Checkout\CheckoutController@view');
		//删除
		Route::post('checkout/destroy','Admin\Checkout\CheckoutController@destroy');
		//退房多选删除
		Route::post('checkout/destroy_all','Admin\Checkout\CheckoutController@destroy_all');
		//经理审核
		Route::get('checkout/review/{chan_id}','Admin\Checkout\CheckoutController@review');
		//财务审核
		Route::get('checkout/cwview/{chan_id}/{old_homeid}/{buyid}','Admin\Checkout\CheckoutController@cwview');




		//销售统计路由管理
		//客户类型统计
		Route::get('types/{perid}','Admin\Sales\TypesController@index');
		//销售金额统计
		Route::get('amount/{perid}','Admin\Sales\TypesController@amount');
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


