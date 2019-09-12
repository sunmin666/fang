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
//计划方案接口
Route::post('1.0.0/purchase','Api\V1_0\PurchaseController@purchase');
//单条计划方案接口
Route::post('1.0.0/purcview','Api\V1_0\PurchaseController@purcview');
//缴费记录接口
Route::post('1.0.0/paylog','Api\V1_0\PaylogController@paylog');
//房屋共有人接口
Route::post('1.0.0/coowner','Api\V1_0\CoownerController@coowner');
//认购接口
Route::post('1.0.0/buyinfo','Api\V1_0\BuyinfoController@buyinfo');
//客户跟踪接口
Route::post('1.0.0/trackinfo','Api\V1_0\TrackinfoController@trackinfo');
//营销知识库接口
Route::get('1.0.0/konwledge','Api\V1_0\KonwledgeController@konwledge');
//企业文化接口
Route::get('1.0.0/cultrue','Api\V1_0\CultrueController@cultrue');
