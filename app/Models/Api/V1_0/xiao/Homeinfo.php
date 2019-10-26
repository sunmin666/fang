<?php

namespace App\Models\Api\V1_0\xiao;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Homeinfo extends Model
{
    //查看户型分类
    public static function get_all_class($a)
    {
        return DB::table('fieldinfo')
            -> select('fieldinfo.field_id','fieldinfo.name')
            -> where('fieldinfo.parent_field_id','=',$a)
            -> get();
    }

    //查看户型面积 户型图
    public static function get_d_pich($field_id)
    {
        return DB::table('picalbum')
            -> select('picalbum.imgpath','picalbum.area_room')
            -> where('picalbum.house_room','=',$field_id)
            -> first();
    }

    //查看房源是否已存在
    public static function get_d_roomn($roomnum)
    {
        return DB::table('homeinfo')-> where('roomnum','=',$roomnum)-> first();
    }

    //添加房源信息
    public static function add_d_home($data)
    {
        return DB::table('homeinfo')-> insert($data);
    }

    //房源详情
    public static function get_d_home($homeid)
    {
        return DB::table('homeinfo')
            -> select('homeinfo.*','fieldinfoa.name as builname','fieldinfob.name as unitname',
                'fieldinfoc.name as roomname','fieldinfod.name as houstrname','fieldinfoe.name as floorname',
                'picalbum.imgpath','picalbum.area_room')
            -> leftJoin('fieldinfo as fieldinfoa','homeinfo.buildnum','=','fieldinfoa.field_id')
            -> leftJoin('fieldinfo as fieldinfob','homeinfo.unitnum','=','fieldinfob.field_id')
            -> leftJoin('fieldinfo as fieldinfoc','homeinfo.roomnum','=','fieldinfoc.field_id')
            -> leftJoin('fieldinfo as fieldinfod','homeinfo.house_str','=','fieldinfod.field_id')
            -> leftJoin('fieldinfo as fieldinfoe','homeinfo.floor','=','fieldinfoe.field_id')
            -> leftJoin('picalbum','homeinfo.house_str','=','picalbum.house_room')
            -> where('homeinfo.homeid','=',$homeid)
            -> first();
    }

    //房源列表
    public static function get_all_home($page,$buildnum,$unitnum,$roomnum,$floor,$status)
    {
        $pages =  	$page - 1;
        return DB::table('homeinfo')
            -> offset($pages*10)->limit(10)
            -> select('homeinfo.*','fieldinfoa.name as builname','fieldinfob.name as unitname',
                'fieldinfoc.name as roomname','fieldinfod.name as houstrname','fieldinfoe.name as floorname',
                'picalbum.imgpath','picalbum.area_room')
            -> leftJoin('fieldinfo as fieldinfoa','homeinfo.buildnum','=','fieldinfoa.field_id')
            -> leftJoin('fieldinfo as fieldinfob','homeinfo.unitnum','=','fieldinfob.field_id')
            -> leftJoin('fieldinfo as fieldinfoc','homeinfo.roomnum','=','fieldinfoc.field_id')
            -> leftJoin('fieldinfo as fieldinfod','homeinfo.house_str','=','fieldinfod.field_id')
            -> leftJoin('fieldinfo as fieldinfoe','homeinfo.floor','=','fieldinfoe.field_id')
            -> leftJoin('picalbum','homeinfo.house_str','=','picalbum.house_room')
            -> where(function($query) use ($buildnum){
                if($buildnum){
                    $query -> where('homeinfo.buildnum','like','%'.$buildnum.'%');
                }
            })
            -> where(function($query) use ($unitnum){
                if($unitnum){
                    $query -> where('homeinfo.unitnum','like','%'.$unitnum.'%');
                }
            })
            -> where(function($query) use ($roomnum){
                if($roomnum){
                    $query -> where('homeinfo.roomnum','like','%'.$roomnum.'%');
                }
            })
            -> where(function($query) use ($floor){
                if($floor){
                    $query -> where('homeinfo.floor','like','%'.$floor.'%');
                }
            })
            -> where(function($query) use ($status){
                if($status){
                    $query -> where('homeinfo.status','like','%'.$status.'%');
                }
            })
            -> get()-> map(function($value){
                return (array)$value;
            }) -> toArray();
    }

    //房源总条数
    public static function get_all_count()
    {
        return DB::table('homeinfo') -> count();
    }

    //修改房源信息
    public static function edit_d_home($homeid,$data)
    {
        return DB::table('homeinfo') -> where('homeid','=',$homeid) -> update($data);
    }

    //删除房源信息
    public static function del_d_home($homeid)
    {
        return DB::table('homeinfo') -> where('homeid','=',$homeid) -> delete();
    }

    //房源信息全选删除
    public static function del_all_home($pieces)
    {
        return DB::table('homeinfo') -> whereIn('homeid','=',$pieces) -> delete();
    }

    //房源图形通过楼号
    public static function get_homepic($buildnum)
    {
        return DB::table('homeinfo')
            -> select('homeinfo.roomnum','homeinfo.status','homeinfo.status',
                'fieldinfoa.name as roomname','fieldinfob.name as filename','fieldinfod.name as unitname')
            -> leftJoin('fieldinfo as fieldinfoa','homeinfo.roomnum','=','fieldinfoa.field_id')
            -> leftJoin('fieldinfo as fieldinfob','homeinfo.floor','=','fieldinfob.field_id')
            -> leftJoin('fieldinfo as fieldinfod','homeinfo.unitnum','=','fieldinfod.field_id')
            -> where('homeinfo.buildnum','=',$buildnum)
            -> get();
    }

    //根据 楼号单元
    public static function get_homepic_unit($buildnum,$unitnum)
    {
        return DB::table('homeinfo')
            -> select('homeinfo.roomnum','homeinfo.status','homeinfo.status',
                'fieldinfoa.name as roomname','fieldinfob.name as filename','fieldinfod.name as unitname')
            -> leftJoin('fieldinfo as fieldinfoa','homeinfo.roomnum','=','fieldinfoa.field_id')
            -> leftJoin('fieldinfo as fieldinfob','homeinfo.floor','=','fieldinfob.field_id')
            -> leftJoin('fieldinfo as fieldinfod','homeinfo.unitnum','=','fieldinfod.field_id')
            -> where('homeinfo.buildnum','=',$buildnum)
            -> where('homeinfo.unitnum','=',$unitnum)
            -> get();
    }

    //根据楼号 楼层查
    public static function get_homepic_unfnit($buildnum,$floor)
    {
        return DB::table('homeinfo')
            -> select('homeinfo.roomnum','homeinfo.status','homeinfo.status',
                'fieldinfoa.name as roomname','fieldinfob.name as filename','fieldinfod.name as unitname')
            -> leftJoin('fieldinfo as fieldinfoa','homeinfo.roomnum','=','fieldinfoa.field_id')
            -> leftJoin('fieldinfo as fieldinfob','homeinfo.floor','=','fieldinfob.field_id')
            -> leftJoin('fieldinfo as fieldinfod','homeinfo.unitnum','=','fieldinfod.field_id')
            -> where('homeinfo.buildnum','=',$buildnum)
            -> where('homeinfo.floor','=',$floor)
            -> get();
    }
    //根据楼号单元楼层
    public static function get_homepic_floor($buildnum,$unitnum,$floor)
    {
        return DB::table('homeinfo')
            -> select('homeinfo.roomnum','homeinfo.status','homeinfo.status',
                'fieldinfoa.name as roomname','fieldinfob.name as filename','fieldinfod.name as unitname')
            -> leftJoin('fieldinfo as fieldinfoa','homeinfo.roomnum','=','fieldinfoa.field_id')
            -> leftJoin('fieldinfo as fieldinfob','homeinfo.floor','=','fieldinfob.field_id')
            -> leftJoin('fieldinfo as fieldinfod','homeinfo.unitnum','=','fieldinfod.field_id')
            -> where('homeinfo.buildnum','=',$buildnum)
            -> where('homeinfo.unitnum','=',$unitnum)
            -> where('homeinfo.floor','=',$floor)
            -> get();
    }

    //查询所有房子信息
    public static function get_all_homeinfos(){
        return DB::table('homeinfo')-> select('homeid') -> where('status','=',1) -> get();
    }

    //查询锁定条件
    public static function get_buy($homeid)
    {
        return DB::table( 'buyinfo' )
            ->where( 'homeid' , '=' , $homeid )
            ->first();
    }

    //更新房子状态信息
    public static function update_status_d( $homeid , $data )
    {
        return DB::table( 'homeinfo' )->where( 'homeid' , '=' , $homeid )
            ->update( $data );
    }

    //更改认购状态
    public static function update_buy_status($buy_id,$buy){
        return DB::table('buyinfo') -> where('buyid','=',$buy_id) -> update($buy);
    }
}
