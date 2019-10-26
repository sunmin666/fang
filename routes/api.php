<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


//登录接口
Route::post('1.0.0/login','Api\V1_0\LoginController@login');

//派遣接口
Route::post('1.0.0/delegate','Api\V1_0\DelegateController@delegate');
//单条派遣接口
Route::post('1.0.0/deleview','Api\V1_0\DelegateController@deleview');


//客户置业计划方案查找接口
Route::post('1.0.0/purchase','Api\V1_0\PurchaseController@purchase');
//客户置业计划方案添加接口
Route::post('1.0.0/purinsert','Api\V1_0\PurchaseController@purinsert');
//客户置业计划方案详情接口
Route::post('1.0.0/purdetails','Api\V1_0\PurchaseController@purdetails');
//客户添加
Route::post('1.0.0/store','Api\V1_0\CustController@store');

//缴费记录接口
Route::post('1.0.0/paylog','Api\V1_0\PaylogController@paylog');
//缴费记录详情接口
Route::post('1.0.0/paydetails','Api\V1_0\PaylogController@paydetails');

//提醒查找接口
Route::post('1.0.0/remind','Api\V1_0\RemindinfoController@remind');
//添加提醒
Route::post('1.0.0/reminsert','Api\V1_0\RemindinfoController@reminsert');
//提醒详情
Route::post('1.0.0/remdetails','Api\V1_0\RemindinfoController@remdetails');
//提醒搜索
Route::post('1.0.0/remsearch','Api\V1_0\RemindinfoController@remsearch');


//职业顾问查询客户id
Route::post('1.0.0/get/cust','Api\V1_0\CustController@get_cust');

//房屋共有人接口
Route::post('1.0.0/coowner','Api\V1_0\CoownerController@coowner');

//客户来访接口
Route::post('1.0.0/trackinfo','Api\V1_0\TrackinfoController@trackinfo');
//获取客户来访记录
Route::post('1.0.0/trackcust','Api\V1_0\TrackinfoController@trackcust');
//编辑客户来访接口
Route::post('1.0.0/trackupdate','Api\V1_0\TrackinfoController@trackupdate');
//添加客户来访接口
Route::post('1.0.0/trackinsert','Api\V1_0\TrackinfoController@trackinsert');

//客户跟踪接口
Route::post('1.0.0/trackge','Api\V1_0\TrackgeController@trackge');
//获取客户跟踪记录
Route::post('1.0.0/trackgecust','Api\V1_0\TrackgeController@trackgecust');
//编辑客户跟踪
Route::post('1.0.0/trackgeupdate','Api\V1_0\TrackgeController@trackgeupdate');
//添加客户跟踪接口
Route::post('1.0.0/trackgeinsert','Api\V1_0\TrackgeController@trackgeinsert');


//销售排行接口
//已售金额总量排行
Route::get('1.0.0/salesampay','Api\V1_0\SalesamController@salesampay');

//客户检索
Route::get('1.0.0/search','Api\V1_0\CustController@search');
//客户手续记录

Route::post('1.0.0/rocedure','Api\V1_0\CustController@rocedure');

//客户信息详情
Route::post('1.0.0/details','Api\V1_0\CustController@details');




////营销知识库接口
//Route::get('1.0.0/konwledge','Api\V1_0\KonwledgeController@konwledge');
////企业文化接口
//Route::get('1.0.0/cultrue','Api\V1_0\CultrueController@cultrue');



//置业台账接口
//认购接口
Route::post('1.0.0/buyinfo','Api\V1_0\LedgerController@buyinfo');
//认购详情
Route::post('1.0.0/buydetails','Api\V1_0\LedgerController@buydetails');
//更名接口
Route::post('1.0.0/changname','Api\V1_0\LedgerController@changname');
//换房接口
Route::post('1.0.0/chahome','Api\V1_0\LedgerController@chahome');
//退房接口
Route::post('1.0.0/chakouthome','Api\V1_0\LedgerController@chakouthome');
//签约接口
Route::post('1.0.0/signt','Api\V1_0\LedgerController@signt');
//延迟签约接口
Route::post('1.0.0/sdelay','Api\V1_0\LedgerController@sdelay');






//小后台


//注册
Route::post('1.0.0/registr','Api\V1_0\xiao\RegistrController@registr');
//验证验证码是否正确
Route::post('1.0.0/reinsert','Api\V1_0\xiao\RegistrController@reinsert');
//邮箱注册
Route::post('1.0.0/reemail','Api\V1_0\xiao\RegistrController@reemail');
//当前用户的id
Route::post('1.0.0/reemid','Api\V1_0\xiao\RegistrController@reemid');


//登录接口
Route::post('1.0.0/login','Api\V1_0\xiao\LoginController@login');

//菜单接口
Route::post('1.0.0/menu','Api\V1_0\xiao\MenuController@menu');

//字段管理接口
Route::get('1.0.0/fieldinfo','Api\V1_0\xiao\FieldController@fieldinfo');


//角色管理接口
Route::post('1.0.0/relation','Api\V1_0\xiao\RelationController@relation');
//角色列表接口
Route::post('1.0.0/relatiget','Api\V1_0\xiao\RelationController@relatiget');
//角色详情
Route::post('1.0.0/reldetails','Api\V1_0\xiao\RelationController@reldetails');
//角色详情
Route::post('1.0.0/reledit','Api\V1_0\xiao\RelationController@reledit');
//角色删除
Route::post('1.0.0/reledel','Api\V1_0\xiao\RelationController@reledel');
//角色全选删除
Route::post('1.0.0/relalldel','Api\V1_0\xiao\RelationController@relalldel');
//查看所有角色名称
Route::get('1.0.0/relalljs','Api\V1_0\xiao\RelationController@relalljs');



//项目信息接口
//项目信息添加接口
Route::post('1.0.0/registrati','Api\V1_0\xiao\ProjectController@registrati');
//项目信息详情接口
Route::post('1.0.0/regdetails','Api\V1_0\xiao\ProjectController@regdetails');
//项目信息修改
Route::post('1.0.0/regedit','Api\V1_0\xiao\ProjectController@regedit');


//折扣接口
//添加折扣接口
Route::post('1.0.0/discount','Api\V1_0\xiao\EnjoyController@discount');
//折扣列表接口
Route::post('1.0.0/disshow','Api\V1_0\xiao\EnjoyController@disshow');
//单条折扣
Route::post('1.0.0/endetails','Api\V1_0\xiao\EnjoyController@endetails');
//修改折扣信息
Route::post('1.0.0/enjoyedit','Api\V1_0\xiao\EnjoyController@enjoyedit');
//删除折扣
Route::post('1.0.0/enjoydel','Api\V1_0\xiao\EnjoyController@enjoydel');
//全选删除折扣
Route::post('1.0.0/enjoyalldel','Api\V1_0\xiao\EnjoyController@enjoyalldel');
//查看所有折扣
Route::get('1.0.0/enjoyallnu','Api\V1_0\xiao\EnjoyController@enjoyallnu');


//成员添加
Route::post('1.0.0/member','Api\V1_0\xiao\MemberController@member');
//成员列表
Route::post('1.0.0/memshow','Api\V1_0\xiao\MemberController@memshow');
//成员详情
Route::post('1.0.0/memdetails','Api\V1_0\xiao\MemberController@memdetails');
//成员详情
Route::post('1.0.0/memedit','Api\V1_0\xiao\MemberController@memedit');
//删除成员
Route::post('1.0.0/memedel','Api\V1_0\xiao\MemberController@memedel');
//成员禁用
Route::post('1.0.0/memprohibit','Api\V1_0\xiao\MemberController@memprohibit');


//营销知识库
//营销知识库添加
Route::post('1.0.0/knowleadd','Api\V1_0\xiao\KnowleController@knowleadd');
//营销知识库列表
Route::post('1.0.0/knowleshow','Api\V1_0\xiao\KnowleController@knowleshow');
//营销知识库详情
Route::post('1.0.0/knowdetails','Api\V1_0\xiao\KnowleController@knowdetails');
//营销知识库修改
Route::post('1.0.0/knowledit','Api\V1_0\xiao\KnowleController@knowledit');
//营销知识库删除
Route::post('1.0.0/knowledel','Api\V1_0\xiao\KnowleController@knowledel');
//营销知识库分类
Route::get('1.0.0/knowclass','Api\V1_0\xiao\KnowleController@knowclass');
//营销知识库全选删除
Route::post('1.0.0/knowalldel','Api\V1_0\xiao\KnowleController@knowalldel');




//单图图片上传
Route::post('1.0.0/culturemany','Api\V1_0\xiao\CultureController@culturemany');
//添加企业文化
Route::post('1.0.0/culturadd','Api\V1_0\xiao\CultureController@culturadd');
//企业文化详情
Route::post('1.0.0/culdetails','Api\V1_0\xiao\CultureController@culdetails');
//企业文化列表
Route::post('1.0.0/cullist','Api\V1_0\xiao\CultureController@cullist');
//企业文化修改
Route::post('1.0.0/culedit','Api\V1_0\xiao\CultureController@culedit');
//企业文化删除
Route::post('1.0.0/culdel','Api\V1_0\xiao\CultureController@culdel');
//企业文化分类
Route::post('1.0.0/culallfil','Api\V1_0\xiao\CultureController@culallfil');
//多图图片上传
Route::post('1.0.0/cultureone','Api\V1_0\xiao\CultureController@cultureone');
//企业文化全选删除
Route::post('1.0.0/culalldel','Api\V1_0\xiao\CultureController@culalldel');


//楼盘相册分类
Route::get('1.0.0/picclasss','Api\V1_0\xiao\PicalbumController@picclasss');
//户型分类
Route::post('1.0.0/lingasss','Api\V1_0\xiao\PicalbumController@lingasss');
//居室分类
Route::post('1.0.0/houseroom','Api\V1_0\xiao\PicalbumController@houseroom');
//楼盘相册添加
Route::post('1.0.0/picaladd','Api\V1_0\xiao\PicalbumController@picaladd');
//效果图列表
Route::post('1.0.0/rendering','Api\V1_0\xiao\PicalbumController@rendering');
//效果图详情
Route::post('1.0.0/renddeis','Api\V1_0\xiao\PicalbumController@renddeis');
//位置交通图列表
Route::post('1.0.0/position','Api\V1_0\xiao\PicalbumController@position');
//社区实景图列表
Route::post('1.0.0/community','Api\V1_0\xiao\PicalbumController@community');
//样板间
Route::post('1.0.0/samroom','Api\V1_0\xiao\PicalbumController@samroom');
//周边配套
Route::post('1.0.0/surrounding','Api\V1_0\xiao\PicalbumController@surrounding');
//户型图列表
Route::post('1.0.0/houshome','Api\V1_0\xiao\PicalbumController@houshome');







//客户
//查询所有置业顾问
Route::get('1.0.0/custhous','Api\V1_0\xiao\CustController@custhous');
//认知渠道
Route::get('1.0.0/custcogn','Api\V1_0\xiao\CustController@custcogn');
//家庭结构
Route::get('1.0.0/custfam','Api\V1_0\xiao\CustController@custfam');
//工作类型
Route::get('1.0.0/cuwork','Api\V1_0\xiao\CustController@cuwork');
//意向面积
Route::get('1.0.0/custnten','Api\V1_0\xiao\CustController@custnten');
//楼层偏好
Route::get('1.0.0/cusfloor','Api\V1_0\xiao\CustController@cusfloor');
//家具需求
Route::get('1.0.0/cusneed','Api\V1_0\xiao\CustController@cusneed');
//置业此数
Route::get('1.0.0/cushounum','Api\V1_0\xiao\CustController@cushounum');
//首次接触方式
Route::get('1.0.0/first_contact','Api\V1_0\xiao\CustController@first_contact');
//职业关注
<<<<<<< HEAD
	Route::get('1.0.0/ownership','Api\V1_0\CustController@ownership');
	//职业目的
	Route::get('1.0.0/purpose','Api\V1_0\CustController@purpose');
	//客户区域
	Route::get('1.0.0/area','Api\V1_0\CustController@area');
	//居住类型
	Route::get('1.0.0/residence','Api\V1_0\CustController@residence');
	//意向面积
	Route::get('1.0.0/intention_area','Api\V1_0\CustController@intention_area');
	//楼层偏好
	Route::get('1.0.0/floor_like','Api\V1_0\CustController@floor_like');
	//户型结构
	Route::get('1.0.0/structure','Api\V1_0\CustController@structure');
	//关注户型
	Route::get('1.0.0/apartment','Api\V1_0\CustController@apartment');
	//家具需求
	Route::get('1.0.0/furniture_need','Api\V1_0\CustController@furniture_need');
	//职业次数
	Route::get('1.0.0/house_num','Api\V1_0\CustController@house_num');
	//等级意向
	Route::get('1.0.0/demand','Api\V1_0\CustController@demand');
	//客户状态
	Route::get('1.0.0/status_id','Api\V1_0\CustController@status_id');

	//客户添加
	Route::post('1.0.0/store','Api\V1_0\CustController@store');

	//客户检索
	Route::get('1.0.0/search','Api\V1_0\CustController@search');
	//客户手续记录

	Route::post('1.0.0/rocedure','Api\V1_0\CustController@rocedure');
	//客户信息详情
	Route::post('1.0.0/details','Api\V1_0\CustController@details');
	//查询客户认购信息
	Route::post('1.0.0/buyinfo','Api\V1_0\CustController@buyinfo');



	//房源字段信息接口
	Route::get('1.0.0/buildnum','Api\V1_0\FieldController@buildnum');
	//查询单元号
	Route::get('1.0.0/unitnum','Api\V1_0\FieldController@unitnum');
	//查询为认购的房源
	Route::get('1.0.0/roomnum','Api\V1_0\FieldController@roomnum');


	//----------------------------------------------- 认购签约---------------------//
	//认购发起
	Route::post('1.0.0/buyinfo/store','Api\V1_0\BuyinfoController@buyinfo_store');
	//认购审核详情
	Route::post('1.0.0/buyinfo/view','Api\V1_0\BuyinfoController@buyinfo_view');
	//认购列表搜索
	Route::get('1.0.0/buyinfo/search','Api\V1_0\BuyinfoController@buyinfo_search');


	//更名发起
	Route::get('1.0.0/Changecust/create','Api\V1_0\ChangecustController@changecust_create');
	//更名发起添加
	Route::post('1.0.0/Changecust/store','Api\V1_0\ChangecustController@changecust_store');
	//更名列表与检索
	Route::get('1.0.0/Changecust/search','Api\V1_0\ChangecustController@changecust_search');
	//更名详情
	Route::get('1.0.0/Changecust/view','Api\V1_0\ChangecustController@changecust_view');


	//签约发起
	Route::get('1.0.0/signing/create','Api\V1_0\SigningController@signing_create');
	//签约新增
	Route::post('1.0.0/signing/store','Api\V1_0\SigningController@signing_store');
	//签约列表与检索
	Route::get('1.0.0/signing/search','Api\V1_0\SigningController@signing_search');
//签约列表详情
	Route::get('1.0.0/signing/view','Api\V1_0\SigningController@signing_view');



	//延迟签约发起
	Route::get('1.0.0/delayed/create','Api\V1_0\DelayedController@delayed_create');
	//延迟新增
	Route::post('1.0.0/delayed/store','Api\V1_0\DelayedController@delayed_store');
	//延迟列表与检索
	Route::get('1.0.0/delayed/search','Api\V1_0\DelayedController@delayed_search');
	//延迟列表详情
	Route::get('1.0.0/delayed/view','Api\V1_0\DelayedController@delayed_view');


	//退房发起
	Route::get('1.0.0/checkout/create','Api\V1_0\CheckoutController@checkout_create');
	//退房信息增数据库
	Route::post('1.0.0/checkout/store','Api\V1_0\CheckoutController@checkout_store');
	//退房列表与检索
	Route::get('1.0.0/checkout/search','Api\V1_0\CheckoutController@checkout_search');
	//退房详情
	Route::get('1.0.0/checkout/view','Api\V1_0\CheckoutController@checkout_view');



	//-------------------------销售排行------------------------------------------------------//
//金额
 Route::get('1.0.0/small/amount','Api\V1_0\SmallController@small_amount');
//套数
Route::get('1.0.0/small/listing','Api\V1_0\SmallController@small_listing');


//---------------------------------------销控表--------------------------------------------//

Route::get('1.0.0/home/index','Api\V1_0\HomeController@home_index');
//房号总量
Route::get('1.0.0/home/count','Api\V1_0\HomeController@home_count');
//可售总量
Route::get('1.0.0/home/counts','Api\V1_0\HomeController@home_counts');
//销控状态
Route::get('1.0.0/home/countss','Api\V1_0\HomeController@home_countss');
//已售总量
Route::get('1.0.0/home/countsss','Api\V1_0\HomeController@home_countsss');
//房源信息详情
Route::get('1.0.0/home/details','Api\V1_0\HomeController@home_details');


=======
Route::get('1.0.0/ownership','Api\V1_0\xiao\CustController@ownership');
//职业目的
Route::get('1.0.0/purpose','Api\V1_0\xiao\CustController@purpose');
//客户区域
Route::get('1.0.0/area','Api\V1_0\xiao\CustController@area');
//居住类型
Route::get('1.0.0/residence','Api\V1_0\xiao\CustController@residence');
//户型结构
Route::get('1.0.0/structure','Api\V1_0\xiao\CustController@structure');
//关注户型
Route::get('1.0.0/apartment','Api\V1_0\xiao\CustController@apartment');
//等级意向
Route::get('1.0.0/demand','Api\V1_0\xiao\CustController@demand');
//客户状态
Route::get('1.0.0/status_id','Api\V1_0\xiao\CustController@status_id');
//修改首次接触方式
Route::get('1.0.0/cusfirst','Api\V1_0\xiao\CustController@cusfirst');
//添加首次接触方式
Route::get('1.0.0/cusfirstadd','Api\V1_0\xiao\CustController@cusfirstadd');
//置业关注
Route::get('1.0.0/ownership','Api\V1_0\xiao\CustController@ownership');
//置业目的
Route::get('1.0.0/purpose','Api\V1_0\xiao\CustController@purpose');
//客户区域
Route::get('1.0.0/area','Api\V1_0\xiao\CustController@area');
//居住类型
Route::get('1.0.0/residence','Api\V1_0\xiao\CustController@residence');
//户型结构
Route::get('1.0.0/structure','Api\V1_0\xiao\CustController@structure');
//意向等级
Route::get('1.0.0/demand','Api\V1_0\xiao\CustController@demand');
//关注户型
Route::get('1.0.0/apartment','Api\V1_0\xiao\CustController@apartment');
//添加客户
Route::post('1.0.0/custadd','Api\V1_0\xiao\CustController@custadd');
//客户列表
Route::post('1.0.0/custshow','Api\V1_0\xiao\CustController@custshow');
//客户详情
Route::post('1.0.0/custdesit','Api\V1_0\xiao\CustController@custdesit');
//客户修改
Route::post('1.0.0/custedit','Api\V1_0\xiao\CustController@custedit');
//客户删除
Route::post('1.0.0/custdel','Api\V1_0\xiao\CustController@custdel');
//客户全选删除
Route::post('1.0.0/custalldel','Api\V1_0\xiao\CustController@custalldel');
//客户状态
Route::get('1.0.0/custausicd','Api\V1_0\xiao\CustController@custausicd');

//共有人
//共有人添加
Route::post('1.0.0/coowneradd','Api\V1_0\xiao\CoownerController@coowneradd');
//共有人列表
Route::post('1.0.0/coowshow','Api\V1_0\xiao\CoownerController@coowshow');
//共有人详情
Route::post('1.0.0/coowdesit','Api\V1_0\xiao\CoownerController@coowdesit');
//共有人修改
Route::post('1.0.0/coowdedit','Api\V1_0\xiao\CoownerController@coowdedit');
//共有人删除
Route::post('1.0.0/coowddel','Api\V1_0\xiao\CoownerController@coowddel');
//共有人全选删除
Route::post('1.0.0/coowdalldel','Api\V1_0\xiao\CoownerController@coowdalldel');

//跟踪来访
//跟踪来访添加
Route::post('1.0.0/trackadd','Api\V1_0\xiao\TrackController@trackadd');
//跟踪来访列表
Route::post('1.0.0/trackshow','Api\V1_0\xiao\TrackController@trackshow');
//跟踪来访修改
Route::post('1.0.0/trackedit','Api\V1_0\xiao\TrackController@trackedit');
//跟踪来访详情
Route::post('1.0.0/trackdsit','Api\V1_0\xiao\TrackController@trackdsit');
//跟踪来访删除
Route::post('1.0.0/trackdel','Api\V1_0\xiao\TrackController@trackdel');
//跟踪来访全选删除
Route::post('1.0.0/trackalldel','Api\V1_0\xiao\TrackController@trackalldel');

//任务委派
//查看所有委派者
Route::get('1.0.0/delehous','Api\V1_0\xiao\DelegateController@delehous');
//添加任务委派
Route::post('1.0.0/deleadd','Api\V1_0\xiao\DelegateController@deleadd');
//任务委派列表
Route::post('1.0.0/deleshow','Api\V1_0\xiao\DelegateController@deleshow');
//任务委派详情
Route::post('1.0.0/deledsit','Api\V1_0\xiao\DelegateController@deledsit');
//任务委派修改
Route::post('1.0.0/deleedit','Api\V1_0\xiao\DelegateController@deleedit');
//任务委派删除
Route::post('1.0.0/deledel','Api\V1_0\xiao\DelegateController@deledel');
//任务委派全选删除
Route::post('1.0.0/delealldel','Api\V1_0\xiao\DelegateController@delealldel');



//房源管理
//查看户型分类
Route::get('1.0.0/linghhasss','Api\V1_0\xiao\HomeinfoController@linghhasss');
//户型结构分类
Route::post('1.0.0/housestr','Api\V1_0\xiao\HomeinfoController@housestr');
//查看户型面积 户型图
Route::post('1.0.0/homebuild','Api\V1_0\xiao\HomeinfoController@homebuild');
//查看所有楼层
Route::get('1.0.0/floorcl','Api\V1_0\xiao\HomeinfoController@floorcl');
//查看所有楼号
Route::get('1.0.0/buildnum','Api\V1_0\xiao\HomeinfoController@buildnum');
//查看楼号下的单元
Route::post('1.0.0/unitnum','Api\V1_0\xiao\HomeinfoController@unitnum');
//查看单元下的房号
Route::post('1.0.0/roomnum','Api\V1_0\xiao\HomeinfoController@roomnum');
//添加房源信息
Route::post('1.0.0/homeadd','Api\V1_0\xiao\HomeinfoController@homeadd');
//房源信息详情
Route::post('1.0.0/homedeis','Api\V1_0\xiao\HomeinfoController@homedeis');
//房源信息列表
Route::post('1.0.0/homeshow','Api\V1_0\xiao\HomeinfoController@homeshow');
//房源信息修改
Route::post('1.0.0/homeedit','Api\V1_0\xiao\HomeinfoController@homeedit');
//房源信息删除
Route::post('1.0.0/homedel','Api\V1_0\xiao\HomeinfoController@homedel');
//房源信息全选删除
Route::post('1.0.0/homealldel','Api\V1_0\xiao\HomeinfoController@homealldel');
//房源图形homepic
Route::post('1.0.0/homepic','Api\V1_0\xiao\HomeinfoController@homepic');



//置业计划方案
//通过房号查homeid
Route::post('1.0.0/homeidshow','Api\V1_0\xiao\PurchaseController@homeidshow');
//置业计划方案添加
Route::post('1.0.0/purchadd','Api\V1_0\xiao\PurchaseController@purchadd');
//置业计划方案列表
Route::post('1.0.0/purcshow','Api\V1_0\xiao\PurchaseController@purcshow');
//置业计划方案详情
Route::post('1.0.0/purdesie','Api\V1_0\xiao\PurchaseController@purdesie');
//置业计划方案修改
Route::post('1.0.0/purdedit','Api\V1_0\xiao\PurchaseController@purdedit');
//置业计划删除
Route::post('1.0.0/purdel','Api\V1_0\xiao\PurchaseController@purdel');


//预约提醒
//通过手机号获取姓名id
Route::post('1.0.0/mobilename','Api\V1_0\xiao\RemindController@mobilename');
//添加提醒
Route::post('1.0.0/reminadd','Api\V1_0\xiao\RemindController@reminadd');
//提醒列表
Route::post('1.0.0/remshow','Api\V1_0\xiao\RemindController@remshow');
//提醒详情
Route::post('1.0.0/remdeist','Api\V1_0\xiao\RemindController@remdeist');
//提醒删除
Route::post('1.0.0/remddel','Api\V1_0\xiao\RemindController@remddel');
//提醒全选删除
Route::post('1.0.0/remdalldel','Api\V1_0\xiao\RemindController@remdalldel');


//缴费管理
//查询用户下的编号
Route::post('1.0.0/paybuy','Api\V1_0\xiao\PayloController@paybuy');
//添加缴费
Route::post('1.0.0/payadd','Api\V1_0\xiao\PayloController@payadd');
//缴费列表
Route::post('1.0.0/payshow','Api\V1_0\xiao\PayloController@payshow');
//缴费详情
Route::post('1.0.0/paydesit','Api\V1_0\xiao\PayloController@paydesit');
//缴费修改
Route::post('1.0.0/payedit','Api\V1_0\xiao\PayloController@payedit');
//缴费删除
Route::post('1.0.0/paydel','Api\V1_0\xiao\PayloController@paydel');
//缴费全选删除
Route::post('1.0.0/payalldel','Api\V1_0\xiao\PayloController@payalldel');




//认购签约
//查询可以认购的房源
Route::post('1.0.0/homestaus','Api\V1_0\xiao\BuyinfoController@homestaus');
//查询房源的具体信息
Route::post('1.0.0/homeinfo','Api\V1_0\xiao\BuyinfoController@homeinfo');
//查询用户基本信息
Route::post('1.0.0/custinfo','Api\V1_0\xiao\BuyinfoController@custinfo');
//认购
Route::post('1.0.0/buyadd','Api\V1_0\xiao\BuyinfoController@buyadd');
//经理审核
Route::post('1.0.0/buymanager','Api\V1_0\xiao\BuyinfoController@buymanager');
//财务审核
Route::post('1.0.0/buyfinance','Api\V1_0\xiao\BuyinfoController@buyfinance');
//认购列表
Route::post('1.0.0/buyshow','Api\V1_0\xiao\BuyinfoController@buyshow');
//认购详情
Route::post('1.0.0/buydeist','Api\V1_0\xiao\BuyinfoController@buydeist');
//修改认购信息
Route::post('1.0.0/buyedit','Api\V1_0\xiao\BuyinfoController@buyedit');
//认购删除
Route::post('1.0.0/buydel','Api\V1_0\xiao\BuyinfoController@buydel');
//认购全选删除
Route::post('1.0.0/buyalldel','Api\V1_0\xiao\BuyinfoController@buyalldel');
>>>>>>> sun
