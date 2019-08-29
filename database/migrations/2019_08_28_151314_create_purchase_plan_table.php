<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePurchasePlanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchase_plan', function (Blueprint $table) {
            $table->collation = 'utf8mb4_general_ci';    //数据表的排序规则
            $table->engine = 'InnoDB';      //指定数据表的索引
            //置业计划ID , 唯一，自增
            $table -> increments('planid') -> nullable(FALSE) -> comment('置业计划ID , 唯一，自增');
            //客户ID 关联 customerinfo 表的 cust_id 字段
            $table -> integer('cust_id',false,false) -> nullable(FALSE) ->comment('客户ID 关联 customerinfo 表的 cust_id 字段');
            //在这里选择1个，一次性付款和按揭付款。但2者都可能会有第2次和第3次缴费。按揭根据贷款年限和月供不同总金额就不同。 1=一次性付款。0=按揭
            $table ->string('type',5) -> nullable(FALSE) -> comment('在这里选择1个，一次性付款和按揭付款。但2者都可能会有第2次和第3次缴费。按揭根据贷款年限和月供不同总金额就不同。 1=一次性付款。0=按揭');
            //如果在type里选择0（按揭），则需要填写按揭多少年
            $table -> string('years',5) -> nullable(TRUE) ->default('0') -> comment('如果在type里选择0（按揭），则需要填写按揭多少年');
            //如果在type里选择1（一次性）,一次性付款的金额数
            $table -> decimal('once_total',12,2) -> nullable(TRUE) -> comment('如果在type里选择1（一次性）,一次性付款的金额数');
            //如果在type里选择0（按揭）,按揭付款的金额数。月供的金额
            $table -> decimal('month_price',12,2) -> nullable(TRUE) -> comment('如果在type里选择0（按揭）,按揭付款的金额数。月供的金额');
            //如果在type里选择0（按揭）,按揭付款的总金额数。月供总共多少年的金额
            $table -> decimal('month_total',12,2) -> nullable(TRUE) -> comment('如果在type里选择0（按揭）,按揭付款的总金额数。月供总共多少年的金额');
            //创建时间 UNIX 时间戳
            $table -> integer('created_at',false,false) -> nullable(FALSE) ->comment('创建时间 UNIX 时间戳');
        });
        DB::statement( "ALTER TABLE `purchase_plan` comment '客户置业计划方案信息表'" );
    }

    /**
     * Reverse the migrations.

     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('purchase_plan');
    }
}
