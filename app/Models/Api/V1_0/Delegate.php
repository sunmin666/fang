<?php

namespace App\Models\Api\V1_0;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Delegate extends Model
{
    //查询职业顾问
    public static function get_d_hous($hous_id)
    {
        return DB::table('delegate')
            -> select('delegate.remarks','delegate.created_at','houserinfo.name','houserinfos.name as rename')
            -> leftJoin('houserinfo','delegate.hous_id','=','houserinfo.hous_id')
            -> leftJoin('houserinfo as houserinfos','delegate.appointees','=','houserinfos.hous_id')
            -> where('delegate.hous_id','=',$hous_id)
            -> get();
    }

//    //查询单条
//    public static function get_d_gate($gate_id)
//    {
//        return DB::table('delegate')
//            -> select('delegate.*','houserinfo.name')
//            -> leftJoin('houserinfo','delegate.hous_id','=','houserinfo.hous_id')
//            -> where('delegate.gate_id','=',$gate_id)
//            -> first();
//    }
}
