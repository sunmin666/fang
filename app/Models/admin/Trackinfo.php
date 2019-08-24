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

    //添加数据
    public static function store_track($data){
        return DB::table('trackinfo') -> insert($data);
    }
}
