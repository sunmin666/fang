<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCultureClassifyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('culture_classify', function (Blueprint $table) {
            $table->collation = 'utf8mb4_general_ci';    //数据表的排序规则
            $table->engine = 'InnoDB';      //指定数据表的索引
            //企业文化分类表的自增id字段
            $table -> increments('class_id') -> nullable(FALSE) -> comment('企业文化分类ID');
            //企业文化的父ID
            $table -> integer('parent_class_id',false,false) -> nullable(FALSE) ->comment('企业文化的父ID');
            //字段层级路径关系
            $table -> string('pathlist',255) -> nullable(FALSE) ->comment('字段层级路径关系');
            //企业文化分类名称
            $table -> string('name',50) -> nullable(FALSE) ->comment('企业文化分类名称');
            //创建时间
            $table -> integer('created_at',false,false) -> nullable(FALSE) ->comment('创建时间');
        });
        DB::statement( "ALTER TABLE `culture_classify` fieldinfo '企业文化的分类信息表'" );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('culture_classify');
    }
}
