<?php

namespace App\Models\Api\V1_0;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Cust extends Model
{
	//查找职业顾问下的客户
    public static function get_cust($hous_id,$page){

				$pages =  	$page - 1;
    	return DB::table('customer') -> select('customer.realname','customer.created_at','customer.cust_id','customer.mobile','customer.first_contact','fieldinfo.name as first_contact')
								-> offset($pages)->limit(10)
								-> leftJoin('fieldinfo','customer.first_contact','=','fieldinfo.field_id')
							 -> where('customer.hous_id','=',$hous_id) -> get();
		}

	//职业关注
	public static function get_ownership($a){
		return DB::table('fieldinfo') -> where('parent_field_id','=',$a) -> get();
	}


	//查看手机号 是否重复

	public static function get_mobiles($mobile){
		return DB::table('customer') -> where('mobile','=',$mobile) -> first();
	}

	//验证身份号是否存在
	public static function get_idcards($idcard){
		return DB::table('customer') -> where('idcard','=',$idcard) -> first();
	}

	//添加客户
	public static function store_cust($data){
    	return DB::table('customer') -> insert($data);
	}


	//客户搜索接口
	public static function search($realname,$mobile,$demand,$first_contact,$starting_time,$end_time,$hous_id,$page){
		$pages =  	$page - 1;
    	return DB::table('customer')
				-> offset($pages)->limit(10)
				  -> select('customer.realname','customer.created_at','customer.cust_id','customer.mobile','customer.first_contact','fieldinfo.name as first_contact')
					-> leftJoin('fieldinfo','customer.first_contact','=','fieldinfo.field_id')
				-> where(function($query) use ($realname){
					if($realname){
						$query -> where('realname','like','%'.$realname.'%');
					}
				})
				-> where(function($query) use ($mobile){
					if($mobile){
						$query -> where('mobile','like','%'.$mobile.'%');
					}
				})
				-> where(function($query) use ($demand){
					if($demand){
						$query -> where('demand','=',$demand);
					}
				})
				-> where(function($query) use ($first_contact){
					if($first_contact){

						$query -> where('first_contact','=',$first_contact);
					}
				})
				-> where(function($query) use ($starting_time){
					if($starting_time){

						$a = strtotime($starting_time);

						$query -> where('realname','>',$a);
					}
				})
				-> where(function($query) use ($end_time){
					if($end_time){

						$b = strtotime($end_time);

						$query -> where('realname','<',$b);
					}
				})
				-> where('customer.hous_id','=',$hous_id)
				-> get();
	}




	//客户详情
	public static function get_cust_d($cust_id){
		return DB::table('customer')
						 -> select('customer.*','fieldinfo.name as cognition', 'fieldinfoa.name as first_contact', 'fieldinfob.name as family_str',
							 'fieldinfoc.name as work_type', 'fieldinfod.name as ownership', 'fieldinfoe.name as purpose', 'fieldinfof.name as area', 'fieldinfog.name as residence',
							 'fieldinfoh.name as intention_area', 'fieldinfoi.name as floor_like', 'fieldinfoj.name as structure', 'fieldinfok.name as apartment', 'fieldinfol.name as furniture_need',
							 'fieldinfom.name as house_num', 'fieldinfon.name as demand', 'fieldinfoo.name as status_id'
						 )
						 -> leftJoin('fieldinfo','customer.cognition','=','fieldinfo.field_id')
						 -> leftJoin('fieldinfo as fieldinfoa','customer.first_contact','=','fieldinfoa.field_id')
						 -> leftJoin('fieldinfo as fieldinfob','customer.family_str','=','fieldinfob.field_id')
						 -> leftJoin('fieldinfo as fieldinfoc','customer.work_type','=','fieldinfoc.field_id')
						 -> leftJoin('fieldinfo as fieldinfod','customer.ownership','=','fieldinfod.field_id')
						 -> leftJoin('fieldinfo as fieldinfoe','customer.purpose','=','fieldinfoe.field_id')
						 -> leftJoin('fieldinfo as fieldinfof','customer.area','=','fieldinfof.field_id')
						 -> leftJoin('fieldinfo as fieldinfog','customer.residence','=','fieldinfog.field_id')
						 -> leftJoin('fieldinfo as fieldinfoh','customer.intention_area','=','fieldinfoh.field_id')
						 -> leftJoin('fieldinfo as fieldinfoi','customer.floor_like','=','fieldinfoi.field_id')
						 -> leftJoin('fieldinfo as fieldinfoj','customer.structure','=','fieldinfoj.field_id')
						 -> leftJoin('fieldinfo as fieldinfok','customer.apartment','=','fieldinfok.field_id')
						 -> leftJoin('fieldinfo as fieldinfol','customer.furniture_need','=','fieldinfol.field_id')
						 -> leftJoin('fieldinfo as fieldinfom','customer.house_num','=','fieldinfom.field_id')
						 -> leftJoin('fieldinfo as fieldinfon','customer.demand','=','fieldinfon.field_id')
						 -> leftJoin('fieldinfo as fieldinfoo','customer.status_id','=','fieldinfoo.field_id')
						 -> where('customer.cust_id','=',$cust_id) -> first();
	}

	//查询客户所选的房子信息
	public static function get_home($cust_id){
    	$data = DB::table('buyinfo')
								->where('cust_id','=',$cust_id)
								->get();
    	$homeid = array();
    	foreach ($data as $kay => $value){
    		if($value -> manager_verify_status == '' || $value -> manager_verify_status == 1){
    			if($value -> finance_verify_status == '' || $value -> finance_verify_status == 1){
    				if($value -> status == 1){
							$homeid[$kay] = $value -> homeid;
						}
					}
				}
			}
    	$home = DB::table('homeinfo')
								-> select('homeinfo.buildnum','homeinfo.unitnum','homeinfo.roomnum','homeinfo.status'
									,'fieldinfo.name as buildnum', 'fieldinfoa.name as unitnum', 'fieldinfob.name as roomnum'
								)
								-> leftJoin('fieldinfo','homeinfo.buildnum','=','fieldinfo.field_id')
								-> leftJoin('fieldinfo as fieldinfoa','homeinfo.unitnum','=','fieldinfoa.field_id')
								-> leftJoin('fieldinfo as fieldinfob','homeinfo.roomnum','=','fieldinfob.field_id')
				-> whereIn('homeid',$homeid) ->get();

    	return $home;

	}



	//手续记录  认购的
	public static function get_rocedure($cust_id){

    	$data = DB::table('buyinfo')
								-> select('buyinfo.buyid','buyinfo.homeid','buyinfo.buy_number','buyinfo.finance_verify_status','buyinfo.finance_verify_time','buyinfo.created_at'
									,'homeinfo.buildnum','homeinfo.unitnum','homeinfo.roomnum','homeinfo.status as hstatus',
									'fieldinfo.name as buildnum', 'fieldinfoa.name as unitnum', 'fieldinfob.name as roomnum'
									)
								-> leftJoin('homeinfo','buyinfo.homeid','=','homeinfo.homeid')
								-> leftJoin('fieldinfo','homeinfo.buildnum','=','fieldinfo.field_id')
								-> leftJoin('fieldinfo as fieldinfoa','homeinfo.unitnum','=','fieldinfoa.field_id')
								-> leftJoin('fieldinfo as fieldinfob','homeinfo.roomnum','=','fieldinfob.field_id')
								-> where('buyinfo.status','!=','0')
								-> where('cust_id','=',$cust_id) -> get()-> map(function($value){
					return (array)$value;
				}) -> toArray();

    	foreach ($data as $kay => $value){
				$data[$kay]['bstatus']  = '认购发起';
    		if($value['finance_verify_status']  == ''){
					$value['finance_verify_status']  = '';
					$value['finance_verify_time']  = '';
					$data[$kay]['sstatus']  = '未审核';
				}else if($value['finance_verify_status']  == 1){
					$data[$kay]['sstatus'] = '审核通过';
				}else if($value['finance_verify_status']  == 0){
					$data[$kay]['sstatus'] = '审核未通过';
				}
			}
			return $data;
	}

	//手续记录  换房 更名 退房
	public static function get_changeinfo($cust_id){
    	$data = DB::table('changeinfo')
				-> select('changeinfo.buyid','changeinfo.cust_id','changeinfo.old_homeid','changeinfo.finance_status','changeinfo.created_at','changeinfo.finance_time','changeinfo.type',
					'buyinfo.buy_number'
					,'homeinfo.buildnum','homeinfo.unitnum','homeinfo.roomnum','homeinfo.status as hstatus',
					'fieldinfo.name as buildnum', 'fieldinfoa.name as unitnum', 'fieldinfob.name as roomnum'
					)
				-> leftJoin('buyinfo','changeinfo.buyid','=','buyinfo.buyid')
				-> leftJoin('homeinfo','changeinfo.old_homeid','=','homeinfo.homeid')
				-> leftJoin('fieldinfo','homeinfo.buildnum','=','fieldinfo.field_id')
				-> leftJoin('fieldinfo as fieldinfoa','homeinfo.unitnum','=','fieldinfoa.field_id')
				-> leftJoin('fieldinfo as fieldinfob','homeinfo.roomnum','=','fieldinfob.field_id')
				-> where('changeinfo.cust_id','=',$cust_id) -> get()-> map(function($value){
					return (array)$value;
				}) -> toArray();

		foreach ($data as $kay => $value){
			$data[$kay]['finance_verify_time']  =  $value['finance_time'];
			if($value['type']  == 1){
				$data[$kay]['bstatus']  = '更名发起';
			}else if($value['type']  == 2){
				$data[$kay]['bstatus']  = '换房发起';
			}else if($value['type']  == 3){
				$data[$kay]['bstatus']  = '退房发起';
			}
			if($value['finance_status']  == ''){
				$value['finance_status']  = '';
				$value['finance_time']  = '';
				$data[$kay]['finance_verify_time']  = '';
				$data[$kay]['sstatus']  = '未审核';
			}else if($value['finance_status']  == 1){
				$data[$kay]['sstatus'] = '审核通过';
			}else if($value['finance_status']  == 0){
				$data[$kay]['sstatus'] = '审核未通过';
			}
		}
		return $data;
	}


		//签约
	public static function get_signinfo($cust_id){
    	$data = DB::table('signinfo')
				-> select('signinfo.buyid','signinfo.homeid','signinfo.finance_status','signinfo.created_at','signinfo.finance_verifytime'
					,'buyinfo.buy_number'
					,'homeinfo.buildnum','homeinfo.unitnum','homeinfo.roomnum','homeinfo.status as hstatus',
					'fieldinfo.name as buildnum', 'fieldinfoa.name as unitnum', 'fieldinfob.name as roomnum'
				)
				-> leftJoin('buyinfo','signinfo.buyid','=','buyinfo.buyid')
				-> leftJoin('homeinfo','signinfo.homeid','=','homeinfo.homeid')
				-> leftJoin('fieldinfo','homeinfo.buildnum','=','fieldinfo.field_id')
				-> leftJoin('fieldinfo as fieldinfoa','homeinfo.unitnum','=','fieldinfoa.field_id')
				-> leftJoin('fieldinfo as fieldinfob','homeinfo.roomnum','=','fieldinfob.field_id')
			 -> where('signinfo.cust_id','=',$cust_id)
				-> get()-> map(function($value){
					return (array)$value;
				}) -> toArray();

		foreach ($data as $kay => $value){

			$data[$kay]['finance_verify_time']  =  $value['finance_verifytime'];
			$data[$kay]['bstatus']  = '签约发起';
			if($value['finance_status']  == ''){
				$value['finance_status']  = '';
				$value['finance_verifytime'] = '';
				$data[$kay]['finance_verify_time'] = '';
				$data[$kay]['sstatus'] = '未审核';
			}else if($value['finance_status'] == 1){
				$data[$kay]['sstatus'] = '审核通过';
			}else if($value['finance_status'] == 0){
				$data[$kay]['sstatus'] = '审核未通过';
			}
		}
    	return $data;
	}


	//查询客户认购信息
	public static function get_buyinfo($cust_id){
    	return DB::table('buyinfo')
							 -> select(
							 	'buyinfo.buyid','buyinfo.status','buyinfo.sig_status','buyinfo.manager_verify_status','buyinfo.finance_verify_status',
								 'homeinfo.status as home_status',
								 'fieldinfob.name as buildnums','fieldinfou.name as unitnums','fieldinfor.name as roomnums'
				)
				-> leftJoin('homeinfo','buyinfo.homeid','=','homeinfo.homeid')
				-> leftJoin('fieldinfo as fieldinfob','homeinfo.buildnum','=','fieldinfob.field_id')
				-> leftJoin('fieldinfo as fieldinfou','homeinfo.unitnum','=','fieldinfou.field_id')
				-> leftJoin('fieldinfo as fieldinfor','homeinfo.roomnum','=','fieldinfor.field_id')
				-> where('buyinfo.cust_id','=',$cust_id)
				-> where('buyinfo.status','!=',5)
				-> get();
	}


}
