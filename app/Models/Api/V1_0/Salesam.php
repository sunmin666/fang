<?php

namespace App\Models\Api\V1_0;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Salesam extends Model
{
    //查询所有的职业顾问
    public static function get_salesam_hous()
    {
        return DB::table('houserinfo')
        -> select('houserinfo.name','houserinfo.hous_id')
        -> where('houserinfo.is_ipad','=',2)
        -> get();

    }
}
