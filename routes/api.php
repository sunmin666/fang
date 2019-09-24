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
































//营销知识库接口
Route::get('1.0.0/konwledge','Api\V1_0\KonwledgeController@konwledge');
//企业文化接口
Route::get('1.0.0/cultrue','Api\V1_0\CultrueController@cultrue');




//职业顾问查询客户id
Route::post('1.0.0/get/cust','Api\V1_0\CustController@get_cust');

//首次接触方式
	Route::get('1.0.0/first_contact','Api\V1_0\CustController@first_contact');
//认知渠道
	Route::get('1.0.0/cognition','Api\V1_0\CustController@cognition');
//家庭结构
	Route::get('1.0.0/family_str','Api\V1_0\CustController@family_str');
	//工作类型
	Route::get('1.0.0/work_type','Api\V1_0\CustController@work_type');
//职业关注
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