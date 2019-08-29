<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePayloginfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payloginfo', function (Blueprint $table) {
            $table->collation = 'utf8mb4_general_ci';    //数据表的排序规则
            $table->engine = 'InnoDB';      //指定数据表的索引
            //缴费记录信息ID , 唯一，自增
            $table-> increments('payl_id') -> nullable(false) -> comment('缴费记录信息ID , 唯一，自增');
            //客户ID 关联 customerinfo 表的 cust_id 字段
            $table -> integer('cust_id',false,false) -> nullable(false) -> comment('客户ID 关联 customerinfo 表的 cust_id 字段');
            //缴费金额
            $table -> decimal('money',12,2) -> nullable(false) -> comment('缴费金额');
            //缴费备注
            $table -> string('remarks',255) -> nullable(false) -> comment('缴费备注');
            //创建时间即缴费时间，UNIX时间戳
            $table -> integer('created_at',false,false) -> nullable(false) -> comment('创建时间即缴费时间，UNIX时间戳');
        });
        DB::statement( "ALTER TABLE `payloginfo` comment '缴费记录信息表'" );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('payloginfo');
    }
}
