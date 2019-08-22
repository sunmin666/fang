<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCultureinfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cultureinfo', function (Blueprint $table) {
            $table->collation = 'utf8mb4_general_ci';    //数据表的排序规则
            $table->engine = 'InnoDB';      //指定数据表的索引
            //企业文化ID
            $table -> increments('cult_id') -> nullable(FALSE) -> comment('企业文化ID');
            //企业文化的图片分类ID
            $table -> integer('class_id') -> nullable(FALSE) -> comment('企业文化的图片分类ID');
           //企业文化的图片路径
           $table -> json('imgpath') -> nullable(FALSE) -> comment('企业文化的图片路径');
            //图片的顺序
           $table -> string('sort',5) -> nullable(FALSE) -> comment('图片的顺序');
            //创建时间
           $table -> integer('created_at',10) -> nullable(FALSE) -> comment('创建时间');
            //更新时间
            $table -> integer('updated_at',10) -> nullable(TRUE) -> comment('更新时间');
        });
        DB::statement( "ALTER TABLE `cultureinfo` comment '企业文化信息表'" );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cultureinfo');
    }
}
