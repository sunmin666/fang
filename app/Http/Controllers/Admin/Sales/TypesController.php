<?php

namespace App\Http\Controllers\Admin\Sales;

use Illuminate\Http\Request;
use App\Http\Controllers\SessionController;
use App\Models\admin\Sales;
use Illuminate\Support\Facades\Input;

class TypesController extends SessionController
{
	//客户类型统计
	public function index($perid){
			$data = $this -> session();
			$data['per_menu'] = $this -> get_per();
			$data['page_name'] = trans( 'sales.page_name' );
			$data['page_detail'] = trans( 'sales.page_detail' );
			$data['page_tips'] = trans( 'index.page_tips' );
			$data['page_note'] = trans( 'index.page_note' );
			$page = config('myconfig.config.page_num');
			//查询所有职业顾问
			$data['hous'] = Sales::get_all_hous();
			//查询状态 来电 来访 电转访
			$data['type'] = Sales::get_field();
			//接受参数
			$data['houss'] = $hous = Input::get('hous');    //职业顾问
			$data['type_all'] = $type_all = Input::get('type_all');   //客户关注
			$data['types'] = $type = Input::get('type');    //接触方式
			$data['stimes'] = $stime = Input::get('stime');   //开始时间
			$data['etimes'] = $etime = Input::get('etime');    //结束时间
			$data['customer'] = Sales::get_condition_cust($page,$hous,$type,$stime,$etime,$type_all);
			$data['total'] = Sales::get_total_cust($hous,$type,$stime,$etime,$type_all);
			$data['ids'] = $perid;
			return view('Admin.Sales.Types.index') -> with($data);
		}

		//销售金额统计
	public function amount($perid){
		$data = $this -> session();
		$data['per_menu'] = $this -> get_per();
		$data['page_name'] = trans( 'sales.page_name' );
		$data['page_detail'] = trans( 'sales.page_detaila' );
		$data['page_tips'] = trans( 'index.page_tips' );
		$data['page_note'] = trans( 'index.page_note' );
		//查询所有职业顾问
		$data['hous'] = Sales::get_all_hous();
		//dd($data['hous']);
		$data['houss'] = $hous = Input::get('hous');    //职业顾问
		$data['stimes'] = $stime = Input::get('stime');   //开始时间
		$data['etimes'] = $etime = Input::get('etime');    //结束时间
		$ig = $this ->amount_jin($hous,$stime,$etime);
		//dd($ig);
		$sort_arr = [];
		foreach ($ig as $key => $value) {
			$sort_arr[] = $value['qian'];
		}
		array_multisort($sort_arr, SORT_DESC, $ig);
		$data['amount'] = $ig;
//		dd($data['amount']);
		$data['total'] =  array_sum($sort_arr);
//		dd($data);
		$data['ids'] = $perid;
		return view('Admin.Sales.Amount.index') -> with($data);
	}

	//销售房源统计
	public function listing($perid){
		$data = $this -> session();
		$data['per_menu'] = $this -> get_per();
		$data['page_name'] = trans( 'sales.page_name' );
		$data['page_detail'] = trans( 'sales.page_detaill' );
		$data['page_tips'] = trans( 'index.page_tips' );
		$data['page_note'] = trans( 'index.page_note' );
		$data['hous'] = Sales::get_all_hous();
		$data['houss'] = $hous = Input::get('hous');    //职业顾问
		$data['stimes'] = $stime = Input::get('stime');   //开始时间
		$data['etimes'] = $etime = Input::get('etime');    //结束时间

		$ig = $this ->listing_jin($hous,$stime,$etime);
		$sort_arr = [];
		foreach ($ig as $key => $value) {
			$sort_arr[] = $value['qian'];
		}
		array_multisort($sort_arr, SORT_DESC, $ig);
		$data['amount'] = $ig;
		$data['total'] =  array_sum($sort_arr);
//		dd($ig);
		$data['ids'] = $perid;
		return view('Admin.Sales.Listing.index') -> with($data);
	}

	//延迟数量统计
	public function delay($perid){
		$data = $this -> session();
		$data['per_menu'] = $this -> get_per();
		$data['page_name'] = trans( 'sales.page_name' );
		$data['page_detail'] = trans( 'sales.page_detaild' );
		$data['page_tips'] = trans( 'index.page_tips' );
		$data['page_note'] = trans( 'index.page_note' );
		$data['hous'] = Sales::get_all_hous();
		$data['houss'] = $hous = Input::get('hous');    //职业顾问
		$data['stimes'] = $stime = Input::get('stime');   //开始时间
		$data['etimes'] = $etime = Input::get('etime');    //结束时间
		$ig = $this ->delay_jin($hous,$stime,$etime);
		$sort_arr = [];
		foreach ($ig as $key => $value) {
			$sort_arr[] = $value['qian'];
		}
		array_multisort($sort_arr, SORT_DESC, $ig);
		$data['amount'] = $ig;
		$data['total'] =  array_sum($sort_arr);
		$data['ids'] = $perid;
		return view('Admin.Sales.Delay.index') -> with($data);
	}



	//房源认购统计
	public function subscr($perid){
		$data = $this -> session();
		$data['per_menu'] = $this -> get_per();
		$data['page_name'] = trans( 'sales.page_name' );
		$data['page_detail'] = trans( 'sales.rng' );
		$data['page_tips'] = trans( 'index.page_tips' );
		$data['page_note'] = trans( 'index.page_note' );
		$page = config('myconfig.config.page_num');
		//查询所有的职业顾问
		$data['hous'] = Sales::get_all_hous();
		//dd($data['hous']);
		$data['houss'] = $hous = Input::get('hous');  //接受职业顾问
		$data['stime'] = $stime = Input::get('stime');  //接受开始时间
		$data['etime'] = $etime = Input::get('etime');  //接受结束时间

		$igg = $this ->amount_jinn($hous,$stime,$etime);


		$sort_arr = [];
		foreach ($igg as $key => $value) {
			$sort_arr[] = $value ['num'];
		}
		array_multisort($sort_arr, SORT_DESC, $igg);  //排序
		//dd($sort_arr);
		$data['amount'] = $igg;
		//dd($data['amount']);
		$data['total'] =  array_sum($sort_arr);		//签约总数量
		//dd($data['total']);
		$data['ids'] = $perid;
		return view('Admin.Sales.Subscription.index') -> with($data);
	}


	//房源更名统计
	public function renameho($perid){
		$data = $this -> session();
		$data['per_menu'] = $this -> get_per();
		$data['page_name'] = trans( 'sales.page_name' );
		$data['page_detail'] = trans( 'sales.page_detailc' );
		$data['page_tips'] = trans( 'index.page_tips' );
		$data['page_note'] = trans( 'index.page_note' );
		$page = config('myconfig.config.page_num');
		//查询所有的职业顾问
		$data['hous'] = Sales::get_all_hous();
		//dd($data['hous']);
		$data['houss'] = $hous = Input::get('hous');  //接受职业顾问
		$data['stime'] = $stime = Input::get('stime');  //接受开始时间
		$data['etime'] = $etime = Input::get('etime');  //接受结束时间
		$igg = $this ->amount_jiuinng($hous,$stime,$etime);
//		dd($igg);
		$sort_arr = [];
		foreach ($igg as $key => $value) {
			$sort_arr[] = $value ['num'];
		}
		array_multisort($sort_arr, SORT_DESC, $igg);  //排序
		//dd($sort_arr);
		$data['amount'] = $igg;
		//dd($data['amount']);
		$data['total'] =  array_sum($sort_arr);		//更名总数量
		//dd($data['total']);
		$data['ids'] = $perid;
		return view('Admin.Sales.Rename.index') -> with($data);
	}

	//房源换房统计
	public function changehome($perid){
		$data = $this -> session();
		$data['per_menu'] = $this -> get_per();
		$data['page_name'] = trans( 'sales.page_name' );
		$data['page_detail'] = trans( 'sales.page_detailb' );
		$data['page_tips'] = trans( 'index.page_tips' );
		$data['page_note'] = trans( 'index.page_note' );
		$page = config('myconfig.config.page_num');
		//查询所有的职业顾问
		$data['hous'] = Sales::get_all_hous();
		//dd($data['hous']);
		$data['houss'] = $hous = Input::get('hous');  //接受职业顾问
		$data['stime'] = $stime = Input::get('stime');  //接受开始时间
		$data['etime'] = $etime = Input::get('etime');  //接受结束时间
		$igg = $this ->amount_changehome($hous,$stime,$etime);
//		dd($igg);
		$sort_arr = [];
		foreach ($igg as $key => $value) {
			$sort_arr[] = $value ['num'];
		}
		array_multisort($sort_arr, SORT_DESC, $igg);  //排序
		//dd($sort_arr);
		$data['amount'] = $igg;
		//dd($data['amount']);
		$data['total'] =  array_sum($sort_arr);		//换房总数量
		//dd($data['total']);
		$data['ids'] = $perid;
		return view('Admin.Sales.Changehome.index') -> with($data);
	}

	//签约数量统计
	public function statistics($perid){

		$data = $this -> session();
		$data['per_menu'] = $this -> get_per();
		$data['page_name'] = trans( 'sales.page_name' );
		$data['page_detail'] = trans( 'sales.page_detaild' );
		$data['page_tips'] = trans( 'index.page_tips' );
		$data['page_note'] = trans( 'index.page_note' );

		$data['hous'] = Sales::get_all_hous();
		$data['houss'] = $hous = Input::get('hous');    //职业顾问
		$data['stimes'] = $stime = Input::get('stime');   //开始时间
		$data['etimes'] = $etime = Input::get('etime');    //结束时间
		$ig = $this ->listing_jin($hous,$stime,$etime);
		$sort_arr = [];
		foreach ($ig as $key => $value) {
			$sort_arr[] = $value['qian'];
		}
		array_multisort($sort_arr, SORT_DESC, $ig);
		$data['amount'] = $ig;
		$data['total'] =  array_sum($sort_arr);
		$data['ids'] = $perid;
		return view('Admin.Sales.Statistics.index') -> with($data);
	}



	//退房统计
	public function theshy($perid){
		$data = $this -> session();
		$data['per_menu'] = $this -> get_per();
		$data['page_name'] = trans( 'sales.page_name' );
		$data['page_detail'] = trans( 'sales.page_detaild' );
		$data['page_tips'] = trans( 'index.page_tips' );
		$data['page_note'] = trans( 'index.page_note' );
		$data['hous'] = Sales::get_all_hous();
		$data['houss'] = $hous = Input::get('hous');    //职业顾问
		$data['stimes'] = $stime = Input::get('stime');   //开始时间
		$data['etimes'] = $etime = Input::get('etime');    //结束时间
		$ig = $this ->theshy_jin($hous,$stime,$etime);
		$sort_arr = [];
		foreach ($ig as $key => $value) {
			$sort_arr[] = $value['qian'];
		}
		array_multisort($sort_arr, SORT_DESC, $ig);
		$data['amount'] = $ig;
		$data['total'] =  array_sum($sort_arr);
		$data['ids'] = $perid;
		return view('Admin.Sales.Theshy.index') -> with($data);
	}

































	//销售金额统计
	public function amount_jin($hous,$stime,$etime){
    	//查询出所有的职业顾问以及下面的用户
		$houss = Sales::get_all_housts($hous);

		foreach($houss as $k => $v){
			$jinqian = array();
			foreach($v['cust'] as $k1 => $v1){
				$qian = Sales::get_signinfo($v1['cust_id'],$stime,$etime);
				if( count($qian) != 0 ){
					foreach($qian as $kq => $vq){
						array_push($jinqian,$qian[$kq]['total_price']);
					}
				}
			}
			$houss[$k]['qian'] = array_sum($jinqian);
		}
		return $houss;
	}


	//查询客户已认购的房子
	public function amount_jinn($hous,$stime,$etime)
	{

		$houss = Sales::get_all_subscr( $hous );

		foreach ( $houss as $key => $value ) {
			$num = array ();
			foreach ( $value['cust'] as $k1 => $v1 ) {
				$subscr = Sales::get_subscr( $v1['cust_id'] , $stime , $etime );
				array_push( $num , $subscr );
			}
			$houss[$key]['num'] = array_sum( $num );
		}

		return $houss;
	}

	//销售房源统计
	public function listing_jin($hous,$stime,$etime){
		$houss = Sales::get_all_housts($hous);
		foreach($houss as $k => $v){
			$jinqian = array();
			foreach($v['cust'] as $k1 => $v1){
				$qian = Sales::get_signinfol($v1['cust_id'],$stime,$etime);
						array_push($jinqian,$qian);
			}
			$houss[$k]['qian'] = array_sum($jinqian);
		}
		return $houss;
	}

	//延迟签约数量统计
	public function delay_jin($hous,$stime,$etime){
		$houss = Sales::get_all_housts($hous);
		foreach($houss as $k => $v){
			$jinqian = array();
			foreach($v['cust'] as $k1 => $v1){
				$qian = Sales::get_signinfod($v1['cust_id'],$stime,$etime);
				array_push($jinqian,$qian);
			}
			$houss[$k]['qian'] = array_sum($jinqian);
		}
		return $houss;
	}

	//退房统计管理
	public function theshy_jin($hous,$stime,$etime){
		$houss = Sales::get_all_housts($hous);
		foreach($houss as $k => $v){
			$jinqian = array();
			foreach($v['cust'] as $k1 => $v1){
				$qian = Sales::get_theshy($v1['cust_id'],$stime,$etime);
				array_push($jinqian,$qian);
			}
			$houss[$k]['qian'] = array_sum($jinqian);
		}
		return $houss;
	}

	//查询客户已更名的房子
	public function amount_jiuinng($hous,$stime,$etime)
	{
		$rehous = Sales::get_all_subscr($hous);

		foreach ($rehous as $keyy => $valuee){
			$num = array();
			foreach($valuee['cust'] as $k1 => $v1){
				$rename = Sales::get_rename($v1['cust_id'],$stime,$etime);
				array_push($num,$rename);
			}
			$rehous[$keyy]['num'] = array_sum($num);
		}
		return $rehous;
	}

	//查询客户已更名的房子
	public function amount_changehome($hous,$stime,$etime)
	{

		$rehous = Sales::get_all_subscr($hous);

		foreach ($rehous as $keyy => $valuee){
			$num = array();
			foreach($valuee['cust'] as $k1 => $v1){
				$rename = Sales::get_changehome($v1['cust_id'],$stime,$etime);
				array_push($num,$rename);
			}
			$rehous[$keyy]['num'] = array_sum($num);
		}

		return $rehous;
	}



//	//认购签约统计
//	public function amount_rengou($hous,$stime,$etime){
//		$houss = Sales::get_all_subscr( $hous );
//
//		foreach ( $houss as $key => $value ) {
//			$num = array ();
//			foreach ( $value['cust'] as $k1 => $v1 ) {
//				$subscr = Sales::get_subscr( $v1['cust_id'] , $stime , $etime );
//				array_push( $num , $subscr );
//			}
//			$houss[$key]['num'] = array_sum( $num );
//		}
//	}


}
