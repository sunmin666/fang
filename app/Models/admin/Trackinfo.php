<?php

namespace App\Models\admin;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Trackinfo extends Model
{
    //查询当前用户
    public static function get_customer($cust_id)
    {
      return DB::table('customer')->where('cust_id','=',$cust_id)->get();
    }

    //查询所有的职业顾问
    public static function get_houserinfo()
    {
        return DB::table('houserinfo')->where('is_ipad','=',2)->get();
    }

    //客户跟踪添加数据
    public static function store_track($data){
        return DB::table('trackinfo') -> insert($data);
    }

    //查询所有客户跟踪信息
    public static function get_all_trackinfo($page)
    {
        return DB::table('trackinfo')
            -> select('trackinfo.*','customer.realname','houserinfo.name')
            -> leftJoin('customer','trackinfo.cust_id','=','customer.cust_id')
            -> leftJoin('houserinfo','trackinfo.hous_id','=','houserinfo.hous_id')
            -> paginate($page);
    }

    //客户跟踪修改查询单条数据
    public static function get_d_trackinfo($trackid){
        return DB::table('trackinfo')
            -> select('trackinfo.*','customer.realname','houserinfo.name')
            -> leftJoin('customer','trackinfo.cust_id','=','customer.cust_id')
            -> leftJoin('houserinfo','trackinfo.hous_id','=','houserinfo.hous_id')
            ->where('trackinfo.trackid','=',$trackid) -> first();
    }

    //客户跟踪修改信息
    public static function update_d_trackinfo($c_id,$data){
        return DB::table('trackinfo') -> where('trackid','=',$c_id) -> update($data);
    }

    //客户跟踪单条删除
    public static function del_d_trackinfo($trackid){
        return DB::table('trackinfo') -> where('trackid','=',$trackid) -> delete();
    }

    //客户跟踪删除全部
    public static function delete_all_trackinfo($all_id)
    {
        return DB::table('trackinfo') ->whereIn('trackid',$all_id)->delete();
    }
}
