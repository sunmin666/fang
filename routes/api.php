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
