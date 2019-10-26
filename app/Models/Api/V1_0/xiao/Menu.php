<?php

namespace App\Models\Api\V1_0\xiao;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Menu extends Model
{
    //查询所有菜单
    public static function get_all_menu()
    {
        $data = DB::table('menu') -> where('p_superior','=',0) -> get();

        foreach($data as $kay => $value){
            $data[$kay] -> zi = DB::table('menu') -> where('p_superior','=',$value -> perid) -> get();
        }

        return $data;

    }
}
