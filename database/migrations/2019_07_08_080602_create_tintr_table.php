<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTintrTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tintr', function (Blueprint $table) {
					$table->collation = 'utf8mb4_general_ci';    //数据表的排序规则
					$table->engine = 'InnoDB';      //指定数据表的索引
					$table->increments( 'tintr_id' )->nullable( FALSE )
								->comment( '自增id' );
					$table -> integer('intr_id',false,false) ->nullable(FALSE)
								 -> comment('户型id');
					$table->string( 'img_title',50 )->nullable( FALSE )
								->comment( '图片' );
					$table->string( 'img_text',100 )->nullable( FALSE )
								->comment( '描述文字' );
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tintr');
    }
}
