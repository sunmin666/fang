<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCnewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cnews', function (Blueprint $table) {
					$table->collation = 'utf8mb4_general_ci';    //数据表的排序规则
					$table->engine = 'InnoDB';      //指定数据表的索引
					$table->increments( 'cnid' )->nullable( FALSE )
								->comment( '自增id' );
					$table -> integer('tnid',false,false) ->nullable(FALSE)
								 -> comment('新闻标题id');
					$table -> text('content') -> nullable( TRUE )
						-> comment('新闻内容');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cnews');
    }
}
