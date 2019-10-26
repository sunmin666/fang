<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePicalbumTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('picalbum', function (Blueprint $table) {
            $table->collation = 'utf8mb4_general_ci';    //数据表的排序规则
            $table->engine = 'InnoDB';      //指定数据表的索引
            //楼盘相册ID
            $table -> increments('pic_id') -> nullable(FALSE) -> comment('楼盘相册ID');
            //楼盘相册分类ID
            $table -> integer('class_id') -> nullable(FALSE) -> comment('楼盘相册分类ID');
        });
        DB::statement( "ALTER TABLE `picalbum` comment '楼盘相册信息表'" );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('picalbum');
    }
}
