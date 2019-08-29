<?php

namespace App\Models\Api\V1_0;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class login extends Model
{
    public static function get_d_hous($iphone){
    	return DB::table('houserinfo') -> where('mobile','=',$iphone) -> first();
		}
}
