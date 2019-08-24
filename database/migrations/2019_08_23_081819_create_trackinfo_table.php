<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrackinfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trackinfo', function (Blueprint $table) {
            $table->collation = 'utf8mb4_general_ci';    //数据表的排序规则
            $table->engine = 'InnoDB';      //指定数据表的索引
            //客户跟踪或来访记录信息表ID ,唯一, 自增
            $table -> increments('trackid') -> nullable(FALSE) -> comment('客户跟踪或来访记录信息表ID ,唯一, 自增');
            //'客户ID 关联 customerinfo 表的 cust_id 字段
            $table -> integer('cust_id',false,false) -> nullable(FALSE) ->comment('客户ID 关联 customerinfo 表的 cust_id 字段');
            //负责的置业顾问的ID
            $table -> integer('hous_id',false,false) -> nullable(FALSE) ->comment('负责的置业顾问的ID');
            //访问类型，1=跟踪（置业顾问主动联系），0=来访（客户主动来访）
            $table -> string('track_type',5) -> nullable(FALSE) ->comment('访问类型，1=跟踪（置业顾问主动联系），0=来访（客户主动来访）');
            //跟踪或来访的内容，这个需要细化
            $table -> string('content',255) -> nullable(FALSE) ->comment('跟踪或来访的内容，这个需要细化');
            //跟踪或来访的时间 UNIX时间戳
            $table -> integer('track_time',false,false) -> nullable(FALSE) ->comment('跟踪或来访的时间 UNIX时间戳');
            //跟踪或来访的创建时间 UNIX时间戳
            $table -> integer('created_at',false,false) -> nullable(FALSE) ->comment('跟踪或来访的创建时间 UNIX时间戳');
        });
        DB::statement( "ALTER TABLE `trackinfo` comment '客户跟踪和来访记录信息表'" );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('trackinfo');
    }
}
