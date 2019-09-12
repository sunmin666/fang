<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRemindinfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('remindinfo', function (Blueprint $table) {
            $table->collation = 'utf8mb4_general_ci';    //数据表的排序规则
            $table->engine = 'InnoDB';      //指定数据表的索引
            //提醒 ID , 唯一，自增
            $table-> increments('remi_id') -> nullable(false) -> comment('提醒 ID , 唯一，自增');
            //置业顾问 ID , 关联 houserinfo 表的 hous_id
            $table -> integer('hous_id',false,false) -> nullable(false) -> comment('置业顾问 ID , 关联 houserinfo 表的 hous_id');
            //提醒的内容
            $table -> string('content',255) -> nullable(false) -> comment('提醒的内容');
            //提醒的时间，UNIX 时间戳
            $table -> integer('remind_time',false,false) -> nullable(false) -> comment('提醒的时间，UNIX 时间戳');
            //创建时间 UNIX 时间戳
            $table -> integer('created_at',false,false) -> nullable(false) -> comment('创建时间 UNIX 时间戳');
            //更新时间，UNIX时间戳
            $table -> integer('updated_at',false,false) -> nullable(true) -> comment('更新时间，UNIX时间戳');
        });
        DB::statement( "ALTER TABLE `remindinfo` comment '提醒信息表'" );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('remindinfo');
    }
}
