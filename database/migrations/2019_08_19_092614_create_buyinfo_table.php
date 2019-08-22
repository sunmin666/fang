<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBuyinfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('buyinfo', function (Blueprint $table) {
            $table->collation = 'utf8mb4_general_ci';    //数据表的排序规则
            $table->engine = 'InnoDB';      //指定数据表的索引
            //认购休息表ID
            $table -> increments('buyid') -> nullable(FALSE) -> comment('认购信息表ID','自增');
            //客户信息ID，关联customerinfo 表的 cust_id 字段
            $table -> integer('cust_id',false,false) -> nullable(FALSE) ->comment('客户信息ID，关联customerinfo 表的 cust_id 字段');
            //房源信息ID , 关联 homeinfo 表的 homeid'
            $table -> integer('homeid',false,false) -> nullable(FALSE) ->comment('房源信息ID , 关联 homeinfo 表的 homeid');
            //认购书编号，从10000开始'
            $table -> integer('buy_number',false,false) -> nullable(FALSE) ->comment('认购书编号，从10000开始');
            //缴纳认购金额 即 付款金额
            $table -> integer('pay_num',false,false) -> nullable(FALSE) ->comment('缴纳认购金额 即 付款金额');
            //付款方案，在这里选择1个，一次性付款和按揭付款。但2者都可能会有第2次和第3次缴费。按揭根据贷款年限和月供不同总金额就不同
            $table -> string('pay_type',5) -> nullable(FALSE) ->comment('付款方案，在这里选择1个，一次性付款和按揭付款。但2者都可能会有第2次和第3次缴费。按揭根据贷款年限和月供不同总金额就不同');
            //认购发起备注，认购发起时，置业顾问填写的备注
            $table -> string('remarks',255) -> nullable(FALSE) ->comment('认购发起备注，认购发起时，置业顾问填写的备注');
            //置业顾问发起认购申请的时间 UNIX 时间戳
            $table -> integer('apply_time',false,false) -> nullable(FALSE) ->comment('置业顾问发起认购申请的时间 UNIX 时间戳');
            //锁定时间，单位是秒数。而不是时间戳，比如锁定15分钟，那就是300秒，对应发起时间+300，就是解锁的UNIX时间戳
            $table -> integer('lock_time',false,false) -> nullable(FALSE) ->comment('锁定时间，单位是秒数。而不是时间戳，比如锁定15分钟，那就是300秒，对应发起时间+300，就是解锁的UNIX时间戳');
            //销售经理或销售助理认购审核申请状态。1=通过 0=未通过'
            $table -> string('manager_verify_status',5) -> nullable(FALSE) ->comment('销售经理或销售助理认购审核申请状态。1=通过 0=未通过');
            //销售经理或销售助理审核的时间，UNIX时间戳
            $table -> integer('manager_verify_time',false,false) -> nullable(FALSE) ->comment('销售经理或销售助理审核的时间，UNIX时间戳');
            //销售经理或销售助理审核备注。经理审核认购申请结果备注
            $table -> string('manager_verify_remarks',255) -> nullable(FALSE) ->comment('销售经理或销售助理审核备注。经理审核认购申请结果备注');
            //财务审核的状态，财务对认购审核的结果，通过或未通过
            $table -> string('finance_verify_status',5) -> nullable(FALSE) ->comment('财务审核的状态，财务对认购审核的结果，通过或未通过');
            //财务审核结果时间。UNIX时间戳
            $table -> integer('finance_verify_time',false,false) -> nullable(FALSE) ->comment('财务审核结果时间。UNIX时间戳');
            //财务审核备注。经理审核认购申请结果备注
            $table -> string('finance_verify_remarks',255) -> nullable(FALSE) ->comment('财务审核备注。经理审核认购申请结果备注');
            //信息创建时间，UNIX时间戳
            $table -> integer('created_at',false,false) -> nullable(FALSE) ->comment('信息创建时间，UNIX时间戳');
            //'信息更新时间，UNIX时间戳
            $table -> integer('updated_at',false,false) -> nullable(TRUE) ->comment('信息更新时间，UNIX时间戳');
        });
			DB::statement( "ALTER TABLE `buyinfo` comment '内部成员信息表'" );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('buyinfo');
    }
}
