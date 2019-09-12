<?php

namespace App\Models\Api\V1_0;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Trackinfo extends Model
{
    //根据置业顾问查询客户跟踪
    public static function get_d_hous($hous_id)
    {
        return DB::table('trackinfo') -> where('hous_id','=',$hous_id) -> get();
    }
}
