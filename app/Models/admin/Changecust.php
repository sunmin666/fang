<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class Changecust extends Model
{
    //查询当前用户
    public static function get_d_name($buyid)
    {
        return DB::table('buyinfo')
            -> select('buyinfo.*','customer.realname','customer.mobile','customer.idcard')
            -> leftJoin('customer','buyinfo.cust_id','=','customer.cust_id')
            -> where('buyinfo.buyid','=',$buyid) -> first();
    }

    //查询所有用户
    public static function get_all_name()
    {
        return DB::table('customer')->get();
    }

    //查询单前用户购买的房子
    public static function get_d_home($homeid)
    {
        return DB::table('homeinfo')
            ->select( 'homeinfo.*' , 'fieldinfob.name as buildnums' , 'fieldinfou.name as unitnums' , 'fieldinfor.name as roomnums' )
            ->leftJoin( 'fieldinfo as fieldinfob' , 'homeinfo.buildnum' , '=' , 'fieldinfob.field_id' )
            ->leftJoin( 'fieldinfo as fieldinfou' , 'homeinfo.unitnum' , '=' , 'fieldinfou.field_id' )
            ->leftJoin( 'fieldinfo as fieldinfor' , 'homeinfo.roomnum' , '=' , 'fieldinfor.field_id' )
            -> where('homeinfo.homeid','=',$homeid)->first();
    }

    //添加更名信息
    public static function store_changecust($data)
    {
        return DB::table('changeinfo') ->insert($data);
    }

    //查询所有
    public static function get_all_changecust($page)
    {
        return DB::table('changeinfo')
            ->select('changeinfo.*','customera.realname as name','customerb.realname as newname','homeinfo.buildnum','homeinfo.unitnum','homeinfo.roomnum','fieldinfob.name as buildnums' , 'fieldinfou.name as unitnums' , 'fieldinfor.name as roomnums')
            ->leftJoin( 'customer as customera' , 'changeinfo.cust_id' , '=' , 'customera.cust_id' )
            ->leftJoin( 'customer as customerb' , 'changeinfo.new_cust' , '=' , 'customerb.cust_id' )
            ->leftJoin('homeinfo','homeinfo.homeid','=','changeinfo.old_homeid')
            ->leftJoin( 'fieldinfo as fieldinfob' , 'homeinfo.buildnum' , '=' , 'fieldinfob.field_id' )
            ->leftJoin( 'fieldinfo as fieldinfou' , 'homeinfo.unitnum' , '=' , 'fieldinfou.field_id' )
            ->leftJoin( 'fieldinfo as fieldinfor' , 'homeinfo.roomnum' , '=' , 'fieldinfor.field_id' )
            ->where('changeinfo.type','=',1)
            ->paginate($page);
    }

    //修改查询单条
    public static function edit_d_show($chan_id)
    {
        return DB::table('changeinfo')
            ->select('changeinfo.*','customera.realname as name','customerb.realname as newname','homeinfo.buildnum','homeinfo.unitnum','homeinfo.roomnum','fieldinfob.name as buildnums' , 'fieldinfou.name as unitnums' , 'fieldinfor.name as roomnums','customer.mobile','customer.idcard')
            ->leftJoin( 'customer as customera' , 'changeinfo.cust_id' , '=' , 'customera.cust_id' )
            ->leftJoin( 'customer as customerb' , 'changeinfo.new_cust' , '=' , 'customerb.cust_id' )
            ->leftJoin('homeinfo','homeinfo.homeid','=','changeinfo.old_homeid')
            ->leftJoin( 'fieldinfo as fieldinfob' , 'homeinfo.buildnum' , '=' , 'fieldinfob.field_id' )
            ->leftJoin( 'fieldinfo as fieldinfou' , 'homeinfo.unitnum' , '=' , 'fieldinfou.field_id' )
            ->leftJoin( 'fieldinfo as fieldinfor' , 'homeinfo.roomnum' , '=' , 'fieldinfor.field_id' )
            -> leftJoin('customer','changeinfo.cust_id','=','customer.cust_id')
            ->where('changeinfo.chan_id','=',$chan_id)
            ->first();

    }

    //更新数据
    public static function destroy_changecust($chan_id,$data)
    {
        return DB::table('changeinfo') -> where('changeinfo.chan_id','=',$chan_id)->update($data);
    }

    //删除单条
    public static function del_d_delete($chan_id)
    {
        return DB::table('changeinfo') -> where('changeinfo.chan_id','=',$chan_id)->delete();
    }

    //全选删除
    public static function del_all_delete($all_id)
    {
        return DB::table('changeinfo') -> whereIn('changeinfo.chan_id',$all_id) -> delete();
    }

    //经理审核
    public static function update_review($chan_id,$data)
    {
        return DB::table('changeinfo') -> where('chan_id','=',$chan_id) -> update($data);
    }

//    //通过审核修改用户
    public static function update_buyinfo_name($buyid,$new_cust)
    {
        return DB::table('buyinfo')-> where('buyid','=',$buyid) -> update(array('cust_id'=>$new_cust));

    }
}
