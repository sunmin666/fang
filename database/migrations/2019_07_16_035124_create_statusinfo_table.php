<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStatusinfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('statusinfo', function (Blueprint $table) {
					$table->collation = 'utf8mb4_general_ci';    //数据表的排序规则
					$table->engine = 'InnoDB';      //指定数据表的索引
					//状态自增id 唯一
					$table->increments( 'status_id' )->nullable( FALSE )
								->comment( '状态自增id 唯一' );
					//状态标题
					$table -> string('title',20) -> nullable(FALSE) -> comment('状态标题');
					//状态的描述
					$table -> string('description',255) -> nullable(FALSE) -> comment('状态的描述');
					//状态录入的时间
					$table -> integer('created_at',false,false) -> nullable(FALSE)
						-> comment('状态的录入时间');
				});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('statusinfo');
    }
}
