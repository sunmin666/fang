<?php

namespace App\Models\Api\V1_0;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Trackge extends Model
{
    //根据置业顾问查询客户跟踪
    public static function get_trackge_hous($hous_id,$page,$search)
    {
        $pages =  	$page - 1;
        return DB::table('customer')
            -> select('customer.realname','customer.cust_id','customer.mobile','customer.sex','fieldinfo.name as dedname','customer.demand','customer.created_at')
            -> offset($pages)->limit(7)
            -> leftJoin('fieldinfo','customer.demand','=','fieldinfo.field_id')
            -> leftJoin('houserinfo','customer.hous_id','=','houserinfo.hous_id')
            -> where(function($query) use ($search){
                if($search){
                    $query -> where('customer.realname','like','%'.$search.'%')->orWhere('customer.mobile','like','%'.$search.'%');
                }
            })
            -> where('customer.hous_id','=',$hous_id)
            -> get() -> map(function($value){
                return (array)$value;
            }) -> toArray();
    }

    //查询次数
    public static function get_t_count($cust_id)
    {
        return DB::table('trackinfo')
            -> select('trackinfo.cust_id')
            -> where('track_type','=',0)
            -> where('trackinfo.cust_id','=',$cust_id)
            ->count();

    }

    //查询时间
    public static function get_t_time($cust_id)
    {
        return DB::table('trackinfo')
            -> select('trackinfo.track_time')
            ->where('trackinfo.cust_id','=',$cust_id)
            -> where('track_type','=',0)
            -> orderBy('track_time','desc')
            ->first();
    }

    //查询当前客户
    public static function get_all_cust($cust_id)
    {
        return DB::table('customer')
            -> select('customer.realname','customer.cust_id','customer.sex','customer.mobile','customer.created_at')
            -> where('cust_id','=',$cust_id)
            -> first();
    }

    //查询某个客户所有的跟踪记录
    public static function get_trakge($cust_id,$page){
        $pages =  	$page - 1;
        return DB::table('trackinfo')
            -> select('trackinfo.cust_id','trackinfo.content','trackinfo.created_at','fieldinfo.name','customer.demand','trackinfo.trackid')
            -> offset($pages)->limit(2)
            -> leftJoin('customer','trackinfo.cust_id','=','customer.cust_id')
            -> leftJoin('fieldinfo','customer.demand','=','fieldinfo.field_id')
            -> where('trackinfo.cust_id','=',$cust_id)
            -> get();
    }

    //编辑来访用户
    public static function update_d_track($trackid,$dataa)
    {
        return DB::table('trackinfo') ->where('trackid','=',$trackid)->update($dataa);
    }


}
