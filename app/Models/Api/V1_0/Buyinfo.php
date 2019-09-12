<?php

namespace App\Models\Api\V1_0;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Buyinfo extends Model
{
    //查询认购
    public static function get_d_sponsor($sponsor)
    {
        return DB::table('buyinfo') -> where('sponsor','=',$sponsor) ->get();
    }


}
