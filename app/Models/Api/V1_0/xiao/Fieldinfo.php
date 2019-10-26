<?php

namespace App\Models\Api\V1_0\xiao;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class Fieldinfo extends Model
{
    //查询所有的字段信息
    public static function get_all_field()
    {
        $data = DB::table('fieldinfo') -> where('parent_field_id','=',0) -> get();

        foreach($data as $kay => $value){
            $data[$kay] -> xia = DB::table('fieldinfo') -> where('parent_field_id','=',$value -> field_id) -> get();
        }

        return $data;
    }
}
