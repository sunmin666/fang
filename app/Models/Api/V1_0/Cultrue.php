<?php

namespace App\Models\Api\V1_0;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Cultrue extends Model
{
    //查询所有企业文化
    public static function get_d_cultrue()
    {
        return DB::table('cultureinfo')->get();
    }
}
