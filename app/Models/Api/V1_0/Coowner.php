<?php

namespace App\Models\Api\V1_0;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Coowner extends Model
{
    //房屋共有人管理
    public static function get_d_cust($cust_id)
    {
        return DB::table('coownerinfo') -> where('cust_id','=',$cust_id) -> get();
    }
}
