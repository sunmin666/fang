<?php

namespace App\Models\Api\V1_0\xiao;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class Login extends Model
{
    //查询用户手机号是否已存在
    public static function get_mobile_registr($mobile)
    {
        return DB::table('houserinfo') -> where('mobile','=',$mobile) ->first();
    }

    //查看单前用户的信息
    public static function get_d_cust($mobile)
    {
        return DB::table('houserinfo') ->where('mobile','=',$mobile) ->first();
    }

    //查看项目信息
    public static function get_d_pro($pro)
    {
        return DB::table('projectinfo') ->where('cust_id','=',$pro) ->first();
    }
}
