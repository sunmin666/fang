<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Signinfo extends Model
{


    //查询办理签约所需要的信息
    public static function get_buy_cust($buyid)
    {
        $data = DB::table('buyinfo')
            ->select('buyinfo.*', 'customer.realname', 'customer.mobile', 'customer.idcard', 'homeinfo.*', 'fieldinfob.name as buildnums', 'fieldinfou.name as unitnums', 'fieldinfor.name as roomnums')
            ->leftJoin('customer', 'customer.cust_id', '=', 'buyinfo.cust_id')
            ->leftJoin('homeinfo', 'homeinfo.homeid', '=', 'buyinfo.homeid')
            ->leftJoin('fieldinfo as fieldinfob', 'homeinfo.buildnum', '=', 'fieldinfob.field_id')
            ->leftJoin('fieldinfo as fieldinfou', 'homeinfo.unitnum', '=', 'fieldinfou.field_id')
            ->leftJoin('fieldinfo as fieldinfor', 'homeinfo.roomnum', '=', 'fieldinfor.field_id')
            ->where('buyinfo.buyid', '=', $buyid)
            ->first();
        $data->coownerinfo = DB::table('coownerinfo')->where('cust_id', '=', $data->cust_id)->get();
        return $data;
    }

    //签约信息入库
    public static function store_sig($data)
    {
        return DB::table('signinfo')->insert($data);
    }

    //更新认证信息状态
    public static function update_buy_status($buy, $data1)
    {
        return DB::table('buyinfo')->where('buyid', '=', $buy)->update($data1);
    }


    //展示签约信息
    public static function get_all_sig($name,$iphone,$page)
    {
        return DB::table('signinfo')
            ->select('signinfo.*', 'customer.realname', 'customer.sex', 'customer.mobile', 'buyinfo.buy_number')
            ->leftJoin('customer', 'customer.cust_id', '=', 'signinfo.cust_id')
            ->leftJoin('buyinfo', 'buyinfo.buyid', '=', 'signinfo.buyid')
            ->where('signinfo.sign_type', '=', '0')
						->where( function( $query ) use ( $name ) {
							if ( $name ) {

								$a = DB::table('customer')-> select('cust_id') -> where('realname','like','%'.$name.'%') -> get() -> map(function($value){return (array)$value;}) -> toArray();

								$query->whereIn( 'signinfo.cust_id', $a );
							}
						} )
						->where( function( $query ) use ( $iphone ) {
							if ( $iphone ) {
								$c = DB::table('customer')-> select('cust_id') -> where('mobile','like','%'.$iphone.'%') -> get() -> map(function($value){return (array)$value;}) -> toArray();
								$query->whereIn( 'signinfo.cust_id' , $c );
							}
						} )
            ->paginate($page);
    }

    //查询单挑信息
    public static function get_d_sig($sigid)
    {
        return DB::table('signinfo')
            ->select('signinfo.*', 'customer.realname', 'customer.sex', 'customer.mobile', 'buyinfo.buy_number')
            ->leftJoin('customer', 'customer.cust_id', '=', 'signinfo.cust_id')
            ->leftJoin('buyinfo', 'buyinfo.buyid', '=', 'signinfo.buyid')
            ->where('signinfo.signid', '=', $sigid)
            ->first();
    }

    //查看修改时信息
    public static function get_sig($sigid)
    {
        return DB::table('signinfo')
            ->select('signinfo.*', 'customer.realname', 'customer.idcard', 'customer.sex', 'homeinfo.*', 'customer.mobile', 'buyinfo.buy_number', 'fieldinfob.name as buildnums', 'fieldinfou.name as unitnums', 'fieldinfor.name as roomnums')
            ->leftJoin('customer', 'customer.cust_id', '=', 'signinfo.cust_id')
            ->leftJoin('buyinfo', 'buyinfo.buyid', '=', 'signinfo.buyid')
            ->leftJoin('homeinfo', 'homeinfo.homeid', '=', 'signinfo.homeid')
            ->leftJoin('fieldinfo as fieldinfob', 'homeinfo.buildnum', '=', 'fieldinfob.field_id')
            ->leftJoin('fieldinfo as fieldinfou', 'homeinfo.unitnum', '=', 'fieldinfou.field_id')
            ->leftJoin('fieldinfo as fieldinfor', 'homeinfo.roomnum', '=', 'fieldinfor.field_id')
            ->where('signinfo.signid', '=', $sigid)
            ->first();
    }


    //修改签约信息
    public static function update_sig($sigid, $data)
    {
        return DB::table('signinfo')->where('signid', '=', $sigid)->update($data);
    }


    //删除信息
    public static function delete_d_sig($sigid)
    {
        return DB::table('signinfo')->where('signid', '=', $sigid)->delete();
    }

    // 多选删除
    public static function delete_all_sig($sigid)
    {
        return DB::table('signinfo')->whereIn('signid', $sigid)->delete();
    }


    //更新经理审核状态
    public static function update_review($sigid, $data)
    {
        return DB::table('signinfo')->where('signid', '=', $sigid)->update($data);
    }

    //更改认购信息状态
    public static function buy_sig_status($buyid)
    {
        return DB::table('buyinfo')->where('buyid', '=', $buyid)->update(
            array('sig_status' => 1)
        );
    }


    //更改房源信息

    public static function update_home($homeid)
    {
        return DB::table('homeinfo')->where('homeid', '=', $homeid)->update(
            array('status' => 3)
        );
    }


    //延迟签约展示
    public static function get_all_delay($name,$iphone,$page)
    {
        return DB::table('signinfo')
            ->select('signinfo.*', 'customer.realname', 'customer.sex', 'customer.mobile', 'buyinfo.buy_number')
            ->leftJoin('customer', 'customer.cust_id', '=', 'signinfo.cust_id')
            ->leftJoin('buyinfo', 'buyinfo.buyid', '=', 'signinfo.buyid')
            ->where('signinfo.sign_type', '=', '1')
					->where( function( $query ) use ( $name ) {
						if ( $name ) {

							$a = DB::table('customer')-> select('cust_id') -> where('realname','like','%'.$name.'%') -> get() -> map(function($value){return (array)$value;}) -> toArray();

							$query->whereIn( 'signinfo.cust_id', $a );
						}
					} )
					->where( function( $query ) use ( $iphone ) {
						if ( $iphone ) {
							$c = DB::table('customer')-> select('cust_id') -> where('mobile','like','%'.$iphone.'%') -> get() -> map(function($value){return (array)$value;}) -> toArray();
							$query->whereIn( 'signinfo.cust_id' , $c );
						}
					} )
						->paginate($page);
    }


    //查询延迟签约信息详情
    public static function get_dan_sig($sigid)
    {
        return DB::table('signinfo')
            ->select('signinfo.*', 'customer.realname', 'customer.sex', 'customer.mobile', 'buyinfo.buy_number')
            ->leftJoin('customer', 'customer.cust_id', '=', 'signinfo.cust_id')
            ->leftJoin('buyinfo', 'buyinfo.buyid', '=', 'signinfo.buyid')
            -> where('signinfo.signid','=',$sigid)
            -> first();
    }


    //延迟签约按钮状态
    public static function update_j($signid)
    {
        return DB::table('signinfo') -> where('signid','=',$signid) -> update(
            array('judging_sig' => 1)
        );
    }

    //延迟签约修改展示
    public static function get_delay_sig($signid)
    {
        return DB::table('signinfo')
            ->select('signinfo.*', 'customer.realname', 'customer.idcard', 'customer.sex', 'homeinfo.*', 'customer.mobile', 'buyinfo.buy_number', 'fieldinfob.name as buildnums', 'fieldinfou.name as unitnums', 'fieldinfor.name as roomnums')
            ->leftJoin('customer', 'customer.cust_id', '=', 'signinfo.cust_id')
            ->leftJoin('buyinfo', 'buyinfo.buyid', '=', 'signinfo.buyid')
            ->leftJoin('homeinfo', 'homeinfo.homeid', '=', 'signinfo.homeid')
            ->leftJoin('fieldinfo as fieldinfob', 'homeinfo.buildnum', '=', 'fieldinfob.field_id')
            ->leftJoin('fieldinfo as fieldinfou', 'homeinfo.unitnum', '=', 'fieldinfou.field_id')
            ->leftJoin('fieldinfo as fieldinfor', 'homeinfo.roomnum', '=', 'fieldinfor.field_id')
            ->where('signinfo.signid', '=', $signid)
            ->first();
    }

    //延迟签约数据更新
    public static function update_d_delay($signid,$data)
    {
        return DB::table('signinfo') -> where('signid','=',$signid) -> update($data);
    }

    //详情查询单挑信息
    public static function get_d_delay($signid)
    {
        return DB::table('signinfo')
            ->select('signinfo.*', 'customer.realname', 'customer.sex', 'customer.mobile', 'buyinfo.buy_number')
            ->leftJoin('customer', 'customer.cust_id', '=', 'signinfo.cust_id')
            ->leftJoin('buyinfo', 'buyinfo.buyid', '=', 'signinfo.buyid')
            ->where('signinfo.signid', '=', $signid)
            ->first();
    }

    //延迟签约删除单条
    public static function delay_d_del($signid)
    {
        return DB::table('signinfo') -> where('signid','=',$signid) -> delete();
    }

    //延迟签约全选删除
    public static function delay_all_del($sigid)
    {
        return DB::table('signinfo') ->whereIn('signid',$sigid) ->delete();
    }


}
