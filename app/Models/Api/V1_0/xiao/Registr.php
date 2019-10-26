<?php

namespace App\Models\Api\V1_0\xiao;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class Registr extends Model
{
    //查询用户手机号是否已存在
    public static function get_mobile_registr($mobile)
    {
        return DB::table('registr') -> where('mobile','=',$mobile) ->first();
    }


    //查询邮箱是否已存在
    public static function get_email_reg($email)
    {
        return DB::table('registr') -> where('email','=',$email) ->first();
    }


    //将邮箱添加到数据库
    public static function insert_email_reg($data)
    {
        return DB::table('registr') ->insertGetId($data);
    }



//    //将注册人信息添加到成员
//    public static function insert_d_menn($data)
//    {
//        return DB::table('houserinfo') -> insert($data);
//    }
//    //注册成功返回id
//    public static function get_d_cust($mobile)
//    {
//        return DB::table('registr') ->select('cust_id')->where('mobile','=',$mobile) ->first();
//    }
}
