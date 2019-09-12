<?php

namespace App\Models\Api\V1_0;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Konwledge extends Model
{
    //查询所有的营销知识库
    public static function get_d_konwledge()
    {
        return DB::table('knowledgeinfo') -> paginate(2);
    }
}
