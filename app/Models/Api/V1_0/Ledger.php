<?php

namespace App\Models\Api\V1_0;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Ledger extends Model
{
    //查询已认购的用户
    public static function get_home_cust($hous_id,$page,$search,$starting_time,$end_time)
    {
        $pages =  	$page - 1;
        return DB::table('customer')
            -> select('customer.realname','customer.cust_id','customer.mobile',
                'buyinfo.buyid','buyinfo.created_at','buyinfo.buy_number','buyinfo.finance_verify_time',
                'buyinfo.finance_verify_status','fieldinfor.name as roomnums'
            )
            -> offset($pages)->limit(7)
            -> leftJoin('buyinfo','customer.cust_id','=','buyinfo.cust_id')
            -> leftJoin('homeinfo','buyinfo.homeid','=','homeinfo.homeid')
            -> leftJoin('fieldinfo as fieldinfor','homeinfo.roomnum','=','fieldinfor.field_id')
            -> where(function($query) use ($search){
                if($search){
                    $query -> where('customer.realname','like','%'.$search.'%')->orWhere('customer.mobile','like','%'.$search.'%');
                }
            })
            -> where(function($query) use ($starting_time){
                if($starting_time){

                    $a = strtotime($starting_time);

                    $query -> where('buyinfo.created_at','>',$a);
                }
            })
            -> where(function($query) use ($end_time){
                if($end_time){

                    $b = strtotime($end_time);

                    $query -> where('buyinfo.created_at','<',$b);
                }
            })
            -> where('buyinfo.finance_verify_status','=',1)
            -> where('customer.hous_id','=',$hous_id)
            -> get() -> map(function($value){
                return (array)$value;
            }) -> toArray();
    }

    //查询认购未通过
    public static function get_home_buynotpass($hous_id,$page,$search,$starting_time,$end_time)
    {
        $pages =  	$page - 1;
        return DB::table('customer')
            -> select('customer.realname','customer.cust_id','customer.mobile',
                'buyinfo.buyid','buyinfo.created_at','buyinfo.buy_number','buyinfo.manager_verify_status',
                'buyinfo.manager_verify_time','buyinfo.finance_verify_time',
                'buyinfo.finance_verify_status','fieldinfor.name as roomnums'
            )
            -> offset($pages)->limit(7)
            -> leftJoin('buyinfo','customer.cust_id','=','buyinfo.cust_id')
            -> leftJoin('homeinfo','buyinfo.homeid','=','homeinfo.homeid')
            -> leftJoin('fieldinfo as fieldinfor','homeinfo.roomnum','=','fieldinfor.field_id')
            -> where(function($query) use ($search){
                if($search){
                    $query -> where('customer.realname','like','%'.$search.'%')->orWhere('customer.mobile','like','%'.$search.'%');
                }
            })
            -> where(function($query) use ($starting_time){
                if($starting_time){

                    $a = strtotime($starting_time);

                    $query -> where('buyinfo.created_at','>',$a);
                }
            })
            -> where(function($query) use ($end_time){
                if($end_time){

                    $b = strtotime($end_time);

                    $query -> where('buyinfo.created_at','<',$b);
                }
            })
            -> where('customer.hous_id','=',$hous_id)
            -> get() -> map(function($value){
                return (array)$value;
            }) -> toArray();
    }

    //查询认购详情
    public static function get_d_buy($buyid)
    {
        return DB::table('buyinfo')
            -> select('customer.realname','customer.idcard','customer.mobile','customer.address',
                'fieldinfob.name as buildnums','fieldinfou.name as unitnums','fieldinfor.name as roomnums',
                'homeinfo.discount','homeinfo.build_area','homeinfo.price','homeinfo.total','buyinfo.pay_num',
                'buyinfo.buy_number','buyinfo.pay_type','buyinfo.total_price','buyinfo.loan_term','buyinfo.month_pay',
                'buyinfo.remar','homeinfo.status','buyinfo.created_at','houserinfos.name as maname','houserinfof.name as finame',
                'buyinfo.lock_time','buyinfo.manager_verify_status','buyinfo.manager_verify_time','buyinfo.manager_verify_remarks',
                'buyinfo.finance_verify_status','buyinfo.finance_verify_time','buyinfo.finance_verify_remarks'
                )
            -> leftJoin('houserinfo as houserinfos','buyinfo.manage_admin','=','houserinfos.hous_id')
            -> leftJoin('houserinfo as houserinfof','buyinfo.finance_admin','=','houserinfof.hous_id')
            -> leftJoin('customer','buyinfo.cust_id','=','customer.cust_id')
            -> leftJoin('homeinfo','buyinfo.homeid','=','homeinfo.homeid')
            -> leftJoin('fieldinfo as fieldinfob','homeinfo.buildnum','=','fieldinfob.field_id')
            -> leftJoin('fieldinfo as fieldinfou','homeinfo.unitnum','=','fieldinfou.field_id')
            -> leftJoin('fieldinfo as fieldinfor','homeinfo.roomnum','=','fieldinfor.field_id')
            -> where('buyinfo.buyid','=',$buyid)
            -> first();
    }

//更名通过
    public static function get_changname($hous_id,$page,$search,$starting_time,$end_time)
    {
        $pages =  	$page - 1;
        return DB::table('customer')
           -> select('customera.realname as oldrealname',
               'customera.mobile as oldmobile','customerb.realname as newrealname','customerb.mobile as newmobile',
               'buyinfo.buy_number','changeinfo.created_at','changeinfo.pay_type','changeinfo.status',
               'changeinfo.verifytime','changeinfo.chan_id'
               )
            -> offset($pages)->limit(7)
           -> leftJoin('changeinfo','changeinfo.cust_id','=','customer.cust_id')
           -> leftJoin('customer as customera','changeinfo.cust_id','=','customera.cust_id')
           -> leftJoin('customer as customerb','changeinfo.new_cust','=','customerb.cust_id')
           -> leftJoin('buyinfo','changeinfo.buyid','=','buyinfo.buyid')
            -> where(function($query) use ($search){
                if($search){
                    $query -> where('customer.realname','like','%'.$search.'%')->orWhere('customer.mobile','like','%'.$search.'%');
                }
            })
            -> where(function($query) use ($starting_time){
                if($starting_time){

                    $a = strtotime($starting_time);

                    $query -> where('changeinfo.created_at','>',$a);
                }
            })
            -> where(function($query) use ($end_time){
                if($end_time){

                    $b = strtotime($end_time);

                    $query -> where('changeinfo.created_at','<',$b);
                }
            })
           -> where('changeinfo.type','=',1)
           -> where('changeinfo.status','=',1)
           -> where('customer.hous_id','=',$hous_id)
            -> get() -> map(function($value){
                return (array)$value;
            }) -> toArray();
    }

    //更名未通过
    public static function get_changnoname($hous_id,$page,$search,$starting_time,$end_time)
    {
        $pages =  	$page - 1;
        return DB::table('customer')
            -> select('customera.realname as oldrealname',
                'customera.mobile as oldmobile','customerb.realname as newrealname','customerb.mobile as newmobile',
                'buyinfo.buy_number','changeinfo.created_at','changeinfo.pay_type','changeinfo.status',
                'changeinfo.verifytime','changeinfo.chan_id'
            )
            -> offset($pages)->limit(7)
            -> leftJoin('changeinfo','changeinfo.cust_id','=','customer.cust_id')
            -> leftJoin('customer as customera','changeinfo.cust_id','=','customera.cust_id')
            -> leftJoin('customer as customerb','changeinfo.new_cust','=','customerb.cust_id')
            -> leftJoin('buyinfo','changeinfo.buyid','=','buyinfo.buyid')
            -> where(function($query) use ($search){
                if($search){
                    $query -> where('customer.realname','like','%'.$search.'%')->orWhere('customer.mobile','like','%'.$search.'%');
                }
            })
            -> where(function($query) use ($starting_time){
                if($starting_time){

                    $a = strtotime($starting_time);

                    $query -> where('changeinfo.created_at','>',$a);
                }
            })
            -> where(function($query) use ($end_time){
                if($end_time){

                    $b = strtotime($end_time);

                    $query -> where('changeinfo.created_at','<',$b);
                }
            })
            -> where('changeinfo.type','=',1)
            -> where('changeinfo.status','=',0)
            -> where('customer.hous_id','=',$hous_id)
            -> get() -> map(function($value){
                return (array)$value;
            }) -> toArray();
    }

    //更名未审核
    public static function get_changnu($hous_id,$page,$search,$starting_time,$end_time)
    {
        $pages =  	$page - 1;
        return DB::table('customer')
            -> select('customera.realname as oldrealname',
                'customera.mobile as oldmobile','customerb.realname as newrealname','customerb.mobile as newmobile',
                'buyinfo.buy_number','changeinfo.created_at','changeinfo.pay_type','changeinfo.status',
                'changeinfo.verifytime','changeinfo.chan_id'
            )
            -> offset($pages)->limit(7)
            -> leftJoin('changeinfo','changeinfo.cust_id','=','customer.cust_id')
            -> leftJoin('customer as customera','changeinfo.cust_id','=','customera.cust_id')
            -> leftJoin('customer as customerb','changeinfo.new_cust','=','customerb.cust_id')
            -> leftJoin('buyinfo','changeinfo.buyid','=','buyinfo.buyid')
            -> where(function($query) use ($search){
                if($search){
                    $query -> where('customer.realname','like','%'.$search.'%')->orWhere('customer.mobile','like','%'.$search.'%');
                }
            })
            -> where(function($query) use ($starting_time){
                if($starting_time){

                    $a = strtotime($starting_time);

                    $query -> where('changeinfo.created_at','>',$a);
                }
            })
            -> where(function($query) use ($end_time){
                if($end_time){

                    $b = strtotime($end_time);

                    $query -> where('changeinfo.created_at','<',$b);
                }
            })
            -> where('changeinfo.type','=',1)
            -> where('changeinfo.status','=',null)
            -> where('customer.hous_id','=',$hous_id)
            -> get() -> map(function($value){
                return (array)$value;
            }) -> toArray();
    }

    //换房通过
    public static function get_chahome($hous_id,$page,$search,$starting_time,$end_time)
    {
        $pages =  	$page - 1;
        return DB::table('customer')
            -> select('customer.realname','customer.mobile',
                'buyinfob.buy_number as new_buy_number', 'old_homeinfo.roomnum as old_roomnum' ,
                'new_homeinfo.roomnum as new_roomnum' ,'fieldinfor_old.name as roomnum_old' ,
                'fieldinfor_new.name as roomnum_new','changeinfo.created_at','changeinfo.finance_time',
                'changeinfo.finance_status','changeinfo.chan_id','changeinfo.cha_ number'
                )
            -> offset($pages)->limit(7)
            -> leftJoin('changeinfo','changeinfo.cust_id','=','customer.cust_id')
            -> leftJoin('buyinfo as buyinfob','changeinfo.new_homeid','=','buyinfob.homeid')
            -> leftJoin( 'homeinfo as old_homeinfo' , 'changeinfo.old_homeid' , '=' , 'old_homeinfo.homeid' )
            -> leftJoin( 'homeinfo as new_homeinfo' , 'changeinfo.new_homeid' , '=' , 'new_homeinfo.homeid' )
            -> leftJoin( 'fieldinfo as fieldinfor_old' , 'old_homeinfo.roomnum' , '=' , 'fieldinfor_old.field_id' )
            -> leftJoin( 'fieldinfo as fieldinfor_new' , 'new_homeinfo.roomnum' , '=' , 'fieldinfor_new.field_id' )
            -> where(function($query) use ($search){
                if($search){
                    $query -> where('customer.realname','like','%'.$search.'%')->orWhere('customer.mobile','like','%'.$search.'%');
                }
            })
            -> where(function($query) use ($starting_time){
                if($starting_time){

                    $a = strtotime($starting_time);

                    $query -> where('changeinfo.created_at','>',$a);
                }
            })
            -> where(function($query) use ($end_time){
                if($end_time){

                    $b = strtotime($end_time);

                    $query -> where('changeinfo.created_at','<',$b);
                }
            })
            -> where('changeinfo.finance_status','=','1')
            -> where('changeinfo.type','=',2)
            -> where('customer.hous_id','=',$hous_id)
            -> get() -> map(function($value){
                return (array)$value;
            }) -> toArray();
    }

    //换房未通过或未审核
    public static function get_chahome_no($hous_id,$page,$search,$starting_time,$end_time)
    {
        $pages =  	$page - 1;
        return DB::table('customer')
            -> select('customer.realname','customer.mobile',
                'buyinfob.buy_number as new_buy_number', 'fieldinfor_old.name as roomnum_old' ,
                'fieldinfor_new.name as roomnum_new','changeinfo.created_at','changeinfo.finance_time',
                'changeinfo.finance_status','changeinfo.status','changeinfo.verifytime','changeinfo.chan_id',
                'changeinfo.cha_ number'
            )
            -> offset($pages)->limit(7)
            -> leftJoin('changeinfo','changeinfo.cust_id','=','customer.cust_id')
            -> leftJoin('homeinfo as homeinfoa','changeinfo.old_homeid','=','homeinfoa.homeid')
            -> leftJoin('homeinfo as homeinfob','changeinfo.new_homeid','=','homeinfob.homeid')
            -> leftJoin('buyinfo as buyinfob','homeinfob.buyid','=','buyinfob.buyid')
            -> leftJoin( 'homeinfo as old_homeinfo' , 'changeinfo.old_homeid' , '=' , 'old_homeinfo.homeid' )
            -> leftJoin( 'homeinfo as new_homeinfo' , 'changeinfo.new_homeid' , '=' , 'new_homeinfo.homeid' )
            -> leftJoin( 'fieldinfo as fieldinfor_old' , 'old_homeinfo.roomnum' , '=' , 'fieldinfor_old.field_id' )
            -> leftJoin( 'fieldinfo as fieldinfor_new' , 'new_homeinfo.roomnum' , '=' , 'fieldinfor_new.field_id' )
            -> where(function($query) use ($search){
                if($search){
                    $query -> where('customer.realname','like','%'.$search.'%')->orWhere('customer.mobile','like','%'.$search.'%');
                }
            })
            -> where(function($query) use ($starting_time){
                if($starting_time){

                    $a = strtotime($starting_time);

                    $query -> where('changeinfo.created_at','>',$a);
                }
            })
            -> where(function($query) use ($end_time){
                if($end_time){

                    $b = strtotime($end_time);

                    $query -> where('changeinfo.created_at','<',$b);
                }
            })
            -> where('changeinfo.type','=',2)
            -> where('customer.hous_id','=',$hous_id)
            -> get() -> map(function($value){
                return (array)$value;
            }) -> toArray();
    }

    //退房通过
    public static function get_chakouthome($hous_id,$page,$search,$starting_time,$end_time)
    {
        $pages =  	$page - 1;
        return DB::table('customer')
            -> select('customer.realname','customer.mobile',
                'buyinfo.buy_number','changeinfo.created_at','changeinfo.finance_status',
                'changeinfo.finance_time','changeinfo.chan_id','fieldinfor.name as roomnums'
            )
            -> offset($pages)->limit(7)
            -> leftJoin('changeinfo','changeinfo.cust_id','=','customer.cust_id')
            -> leftJoin('buyinfo','changeinfo.buyid','=','buyinfo.buyid')
            -> leftJoin('homeinfo','buyinfo.homeid','=','homeinfo.homeid')
            -> leftJoin('fieldinfo as fieldinfor','homeinfo.roomnum','=','fieldinfor.field_id')
            -> where(function($query) use ($search){
                if($search){
                    $query -> where('customer.realname','like','%'.$search.'%')->orWhere('customer.mobile','like','%'.$search.'%');
                }
            })
            -> where(function($query) use ($starting_time){
                if($starting_time){

                    $a = strtotime($starting_time);

                    $query -> where('changeinfo.created_at','>',$a);
                }
            })
            -> where(function($query) use ($end_time){
                if($end_time){

                    $b = strtotime($end_time);

                    $query -> where('changeinfo.created_at','<',$b);
                }
            })
            -> where('changeinfo.type','=',3)
            -> where('changeinfo.finance_status','=',1)
            -> where('customer.hous_id','=',$hous_id)
            -> get() -> map(function($value){
                return (array)$value;
            }) -> toArray();
    }

    //退房未通过
    public static function get_chakouthome_no($hous_id,$page,$search,$starting_time,$end_time)
    {
        $pages =  	$page - 1;
        return DB::table('customer')
        -> select('customer.realname','customer.mobile',
        'buyinfo.buy_number','changeinfo.created_at','changeinfo.finance_status',
        'changeinfo.finance_time','changeinfo.chan_id','fieldinfor.name as roomnums',
        'changeinfo.status','changeinfo.verifytime'
    )
        -> offset($pages)->limit(7)
        -> leftJoin('changeinfo','changeinfo.cust_id','=','customer.cust_id')
        -> leftJoin('buyinfo','changeinfo.buyid','=','buyinfo.buyid')
        -> leftJoin('homeinfo','buyinfo.homeid','=','homeinfo.homeid')
        -> leftJoin('fieldinfo as fieldinfor','homeinfo.roomnum','=','fieldinfor.field_id')
        -> where(function($query) use ($search){
                 if($search){
                      $query -> where('customer.realname','like','%'.$search.'%')->orWhere('customer.mobile','like','%'.$search.'%');
                 }
         })
            -> where(function($query) use ($starting_time){
                if($starting_time){

                    $a = strtotime($starting_time);

                    $query -> where('changeinfo.created_at','>',$a);
                }
            })
            -> where(function($query) use ($end_time){
                if($end_time){

                    $b = strtotime($end_time);

                    $query -> where('changeinfo.created_at','<',$b);
                }
            })
        -> where('changeinfo.type','=',3)
        -> where('customer.hous_id','=',$hous_id)
        -> get() -> map(function($value){
            return (array)$value;
        }) -> toArray();
    }

    //立即签约通过
    public static function get_signt($hous_id,$page,$search,$starting_time,$end_time)
    {
        $pages =  	$page - 1;
        return DB::table('customer')
            -> select('customer.realname','customer.mobile',
                'buyinfo.buy_number','signinfo.created_at','signinfo.finance_status',
                'signinfo.finance_verifytime','signinfo.signid','fieldinfor.name as roomnums'
            )
            -> offset($pages)->limit(7)
            -> leftJoin('signinfo','signinfo.cust_id','=','customer.cust_id')
            -> leftJoin('buyinfo','signinfo.buyid','=','buyinfo.buyid')
            -> leftJoin('homeinfo','buyinfo.homeid','=','homeinfo.homeid')
            -> leftJoin('fieldinfo as fieldinfor','homeinfo.roomnum','=','fieldinfor.field_id')
            -> where(function($query) use ($search){
                if($search){
                    $query -> where('customer.realname','like','%'.$search.'%')->orWhere('customer.mobile','like','%'.$search.'%');
                }
            })
            -> where(function($query) use ($starting_time){
                if($starting_time){

                    $a = strtotime($starting_time);

                    $query -> where('signinfo.created_at','>',$a);
                }
            })
            -> where(function($query) use ($end_time){
                if($end_time){

                    $b = strtotime($end_time);

                    $query -> where('signinfo.created_at','<',$b);
                }
            })
            -> where('signinfo.sign_type','=',0)
            -> where('signinfo.finance_status','=',1)
            -> where('customer.hous_id','=',$hous_id)
            -> get() -> map(function($value){
                return (array)$value;
            }) -> toArray();
    }

    //签约未通过
    public static function get_signt_no($hous_id,$page,$search,$starting_time,$end_time)
    {
        $pages =  	$page - 1;
        return DB::table('customer')
            -> select('customer.realname','customer.mobile',
                'buyinfo.buy_number','signinfo.created_at','signinfo.finance_status',
                'signinfo.finance_verifytime','signinfo.signid','fieldinfor.name as roomnums',
                'signinfo.sign_status','signinfo.sign_verifytime'
            )
            -> offset($pages)->limit(7)
            -> leftJoin('signinfo','signinfo.cust_id','=','customer.cust_id')
            -> leftJoin('buyinfo','signinfo.buyid','=','buyinfo.buyid')
            -> leftJoin('homeinfo','buyinfo.homeid','=','homeinfo.homeid')
            -> leftJoin('fieldinfo as fieldinfor','homeinfo.roomnum','=','fieldinfor.field_id')
            -> where(function($query) use ($search){
                if($search){
                    $query -> where('customer.realname','like','%'.$search.'%')->orWhere('customer.mobile','like','%'.$search.'%');
                }
            })
            -> where(function($query) use ($starting_time){
                if($starting_time){

                    $a = strtotime($starting_time);

                    $query -> where('signinfo.created_at','>',$a);
                }
            })
            -> where(function($query) use ($end_time){
                if($end_time){

                    $b = strtotime($end_time);

                    $query -> where('signinfo.created_at','<',$b);
                }
            })
            -> where('signinfo.sign_type','=',0)
            -> where('customer.hous_id','=',$hous_id)
            -> get() -> map(function($value){
                return (array)$value;
            }) -> toArray();
    }

    //延迟签约通过
    public static function get_sdelay($hous_id,$page,$search,$starting_time,$end_time)
    {
        $pages =  	$page - 1;
        return DB::table('customer')
            -> select('customer.realname','customer.mobile',
                'buyinfo.buy_number','signinfo.created_at','signinfo.sign_status',
                'signinfo.sign_verifytime','signinfo.signid','fieldinfor.name as roomnums',
                'signinfo.delay_time'
            )
            -> offset($pages)->limit(7)
            -> leftJoin('signinfo','signinfo.cust_id','=','customer.cust_id')
            -> leftJoin('buyinfo','signinfo.buyid','=','buyinfo.buyid')
            -> leftJoin('homeinfo','buyinfo.homeid','=','homeinfo.homeid')
            -> leftJoin('fieldinfo as fieldinfor','homeinfo.roomnum','=','fieldinfor.field_id')
            -> where(function($query) use ($search){
                if($search){
                    $query -> where('customer.realname','like','%'.$search.'%')->orWhere('customer.mobile','like','%'.$search.'%');
                }
            })
            -> where(function($query) use ($starting_time){
                if($starting_time){

                    $a = strtotime($starting_time);

                    $query -> where('signinfo.created_at','>',$a);
                }
            })
            -> where(function($query) use ($end_time){
                if($end_time){

                    $b = strtotime($end_time);

                    $query -> where('signinfo.created_at','<',$b);
                }
            })
            -> where('signinfo.sign_type','=',1)
            -> where('signinfo.sign_status','=',1)
            -> where('customer.hous_id','=',$hous_id)
            -> get() -> map(function($value){
                return (array)$value;
            }) -> toArray();
    }

    //延迟签约未通过
    public static function get_sdelay_no($hous_id,$page,$search,$starting_time,$end_time)
    {
        $pages =  	$page - 1;
        return DB::table('customer')
            -> select('customer.realname','customer.mobile',
                'buyinfo.buy_number','signinfo.created_at','signinfo.sign_status',
                'signinfo.sign_verifytime','signinfo.signid','fieldinfor.name as roomnums',
                'signinfo.delay_time'
            )
            -> offset($pages)->limit(7)
            -> leftJoin('signinfo','signinfo.cust_id','=','customer.cust_id')
            -> leftJoin('buyinfo','signinfo.buyid','=','buyinfo.buyid')
            -> leftJoin('homeinfo','buyinfo.homeid','=','homeinfo.homeid')
            -> leftJoin('fieldinfo as fieldinfor','homeinfo.roomnum','=','fieldinfor.field_id')
            -> where(function($query) use ($search){
                if($search){
                    $query -> where('customer.realname','like','%'.$search.'%')->orWhere('customer.mobile','like','%'.$search.'%');
                }
            })
            -> where(function($query) use ($starting_time){
                if($starting_time){

                    $a = strtotime($starting_time);

                    $query -> where('signinfo.created_at','>',$a);
                }
            })
            -> where(function($query) use ($end_time){
                if($end_time){

                    $b = strtotime($end_time);

                    $query -> where('signinfo.created_at','<',$b);
                }
            })
            -> where('signinfo.sign_type','=',1)
            -> where('signinfo.sign_status','=',0)
            -> where('customer.hous_id','=',$hous_id)
            -> get() -> map(function($value){
                return (array)$value;
            }) -> toArray();
    }

    //延迟签约未审核
    public static function get_sdelay_nu($hous_id,$page,$search,$starting_time,$end_time)
    {
        $pages =  	$page - 1;
        return DB::table('customer')
            -> select('customer.realname','customer.mobile',
                'buyinfo.buy_number','signinfo.created_at','signinfo.sign_status',
                'signinfo.sign_verifytime','signinfo.signid','fieldinfor.name as roomnums',
                'signinfo.delay_time'
            )
            -> offset($pages)->limit(7)
            -> leftJoin('signinfo','signinfo.cust_id','=','customer.cust_id')
            -> leftJoin('buyinfo','signinfo.buyid','=','buyinfo.buyid')
            -> leftJoin('homeinfo','buyinfo.homeid','=','homeinfo.homeid')
            -> leftJoin('fieldinfo as fieldinfor','homeinfo.roomnum','=','fieldinfor.field_id')
            -> where(function($query) use ($search){
                if($search){
                    $query -> where('customer.realname','like','%'.$search.'%')->orWhere('customer.mobile','like','%'.$search.'%');
                }
            })
            -> where(function($query) use ($starting_time){
                if($starting_time){

                    $a = strtotime($starting_time);

                    $query -> where('signinfo.created_at','>',$a);
                }
            })
            -> where(function($query) use ($end_time){
                if($end_time){

                    $b = strtotime($end_time);

                    $query -> where('signinfo.created_at','<',$b);
                }
            })
            -> where('signinfo.sign_type','=',1)
            -> where('signinfo.sign_status','=',null)
            -> where('customer.hous_id','=',$hous_id)
            -> get() -> map(function($value){
                return (array)$value;
            }) -> toArray();
    }
}
