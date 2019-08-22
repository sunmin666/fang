<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKnowledgeinfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('knowledgeinfo', function (Blueprint $table) {
					$table->collation = 'utf8mb4_general_ci';    //数据表的排序规则
					$table->engine = 'InnoDB';      //指定数据表的索引
					$table -> increments('know_id') -> nullable(FALSE) -> comment('营销知识库id，自增');
					$table -> integer('class_id',false,false) -> nullable(FALSE) -> comment('营销知识库分类id');
        	$table -> string('title',90) -> nullable(FALSE) -> comment('知识库标题');
        	$table -> string('video',50) -> nullable(FALSE) -> comment('视频');
        	$table -> text('content') -> nullable(FALSE) -> comment('营销知识库的内容');
        	$table -> string('hous_id',10) -> nullable(FALSE) -> comment('添加人');
        	$table -> string('is_public',5) -> nullable(FALSE) -> comment('是否公开');
        	$table -> string('created_at',15) -> nullable(FALSE) -> comment('录入时间');
        	$table -> string('updated_at',15) -> nullable(TRUE) ->comment('更新时间');
        });
			DB::statement( "ALTER TABLE `knowledgeinfo` comment '营销知识库数据表'" );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('knowledgeinfo');
    }
}
