<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDelegateTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('delegate', function (Blueprint $table) {
            $table->collation = 'utf8mb4_general_ci';    //数据表的排序规则
            $table->engine = 'InnoDB';      //指定数据表的索引
            //派遣ID , 唯一，自增
            $table-> increments('gate_id') -> nullable(false) -> comment('派遣 ID , 唯一，自增');
            //用户ID 关联customer的cust_id
            $table -> integer('cust_id',false,false) -> nullable(false) -> comment('用户ID 关联customer的cust_id');
            //置业顾问 ID , 关联 houserinfo 表的 hous_id
            $table -> integer('hous_id',false,false) -> nullable(false) -> comment('置业顾问 ID , 关联 houserinfo 表的 hous_id');
            //派遣备注
            $table -> string('remarks',255) -> nullable(false) -> comment('派遣备注');
            //创建时间 UNIX 时间戳
            $table -> integer('created_at',false,false) -> nullable(false) -> comment('创建时间 UNIX 时间戳');
            //更新时间，UNIX时间戳
            $table -> integer('updated_at',false,false) -> nullable(true) -> comment('更新时间，UNIX时间戳');
        });
        DB::statement( "ALTER TABLE `delegate` comment '派遣信息表'" );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('delegate');
    }
}
