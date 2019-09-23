<?php

namespace App\Models\Api\V1_0;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Remindinfo extends Model
{
    //查询职业顾问所有的提醒
    public static function get_remind_hous($hous_id,$page,$realname,$mobile,$modular,$starting_time,$end_time)
    {
        $pages =  	$page - 1;
        return  DB::table('remindinfo')
            -> select('customer.realname','customer.mobile','remindinfo.created_at','remindinfo.remind_time','remindinfo.remi_id')
            -> offset($pages)->limit(3)
            -> leftJoin('customer','remindinfo.cust_id','=','customer.cust_id')
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
            -> where(function($query) use ($modular){
                if($modular){
                    $query -> where('modular','like','%'.$modular.'%');
                }
            })
            -> where(function($query) use ($starting_time){
                if($starting_time){

                    $a = strtotime($starting_time);

                    $query -> where('remindinfo.created_at','>',$a);
                }
            })
            -> where(function($query) use ($end_time){
                if($end_time){

                    $b = strtotime($end_time);

                    $query -> where('remindinfo.created_at','<',$b);
                }
            })
            -> where('remindinfo.hous_id','=',$hous_id)
            -> get()-> map(function($value){
                return (array)$value;
            }) -> toArray();
    }

    //添加提醒
    public static function remind_insert($data)
    {
        return DB::table('remindinfo') -> insert($data);
    }

    //提醒详情
    public static function get_remind_detail($remi_id)
    {
        return  DB::table('remindinfo')
            -> select('customer.realname','customer.sex','customer.mobile','remindinfo.created_at','remindinfo.remind_time','remindinfo.content','remindinfo.modular')
            -> leftJoin('customer','remindinfo.cust_id','=','customer.cust_id')
            -> where('remindinfo.remi_id','=',$remi_id)
            -> first();
    }


}
