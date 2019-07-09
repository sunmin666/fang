<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIntrTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('intr', function (Blueprint $table) {
					$table->collation = 'utf8mb4_general_ci';    //数据表的排序规则
					$table->engine = 'InnoDB';      //指定数据表的索引
					$table->increments( 'intr_id' )->nullable( FALSE )
								->comment( '自增id' );
					$table->string( 'i_title',50 )->nullable( FALSE )
								->comment( '户型标题' );
					$table->unsignedInteger( 'created_at' )->nullable(FALSE)
								->comment( '创建的UNIX时间戳' );
					$table->unsignedInteger( 'created_up' )->nullable(TRUE)
								->comment( '创建的UNIX时间戳' );
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('intr');
    }
}
