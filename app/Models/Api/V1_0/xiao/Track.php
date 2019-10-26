<?php

namespace App\Models\Api\V1_0\xiao;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Track extends Model
{
    //跟踪来访添加
    public static function add_d_track($data)
    {
        return DB::table('trackinfo') -> insert($data);
    }

    //跟踪来访列表
    public static function get_all_tra($page,$hous_id,$track_type)
    {
        $pages =  	$page - 1;
        return DB::table('trackinfo')
            -> offset($pages*10)->limit(10)
            -> select('trackinfo.*','customer.realname','houserinfo.name')
            -> leftJoin('customer','trackinfo.cust_id','=','customer.cust_id')
            -> leftJoin('houserinfo','trackinfo.hous_id','=','houserinfo.hous_id')
            -> where(function($query) use ($hous_id){
                if($hous_id){
                    $query -> where('trackinfo.hous_id','like','%'.$hous_id.'%');
                }
            })
            -> where(function($query) use ($track_type){
                if($track_type){
                    $query -> where('trackinfo.track_type','like','%'.$track_type.'%');
                }
            })
            -> get()-> map(function($value){
                return (array)$value;
            }) -> toArray();
    }

    //跟踪来访总条数
    public static function get_all_count()
    {
        return DB::table('trackinfo') -> count();
    }

    //跟踪来访修改
    public static function edit_d_tra($trackid,$data)
    {
        return DB::table('trackinfo') -> where('trackid','=',$trackid) -> update($data);
    }

    //跟踪来访详情
    public static function get_d_tra($trackid)
    {
        return DB::table('trackinfo')
            -> select('trackinfo.*','customer.realname','houserinfo.name')
            -> leftJoin('customer','trackinfo.cust_id','=','customer.cust_id')
            -> leftJoin('houserinfo','trackinfo.hous_id','=','houserinfo.hous_id')
            -> where('trackinfo.trackid','=',$trackid)
            -> first();
    }

    //跟踪来访删除
    public static function del_d_track($trackid)
    {
        return DB::table('trackinfo') -> where('trackid','=',$trackid) -> delete();
    }

    //跟踪来访全选删除
    public static function del_all_tra($pieces)
    {
        return DB::table('trackinfo') -> whereIn('trackid',$pieces) -> delete();
    }
}
