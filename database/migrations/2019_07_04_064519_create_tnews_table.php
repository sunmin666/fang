<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTnewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tnews', function (Blueprint $table) {
					$table->collation = 'utf8mb4_general_ci';    //数据表的排序规则
					$table->engine = 'InnoDB';      //指定数据表的索引
					$table->increments( 'nid' )->nullable( FALSE )
								->comment( '自增id' );
					$table -> string('n_title',50) -> nullable(FALSE)
						-> comment('标题');
					$table -> string('n_img',150) -> nullable(TRUE)
						-> comment('缩略图');
					$table->unsignedInteger( 'created_up' )->nullable(TRUE)
								->comment( '修改时间' );
					$table->unsignedInteger( 'created_at' )->nullable(FALSE)
								->comment( '添加时间' );
					$table -> string('n_admin_at',20) -> nullable(FALSE)
								 -> comment('添加人账号');
					$table -> integer('n_column',false,false) ->nullable(FALSE)
						 -> comment('类型id');
        });
			DB::statement( "ALTER TABLE `tnews` comment '新闻标题表'" );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tnews');
    }
}
