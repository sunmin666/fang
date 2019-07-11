<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContactTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contact', function (Blueprint $table) {
					$table->collation = 'utf8mb4_general_ci';    //数据表的排序规则
					$table->engine = 'InnoDB';      //指定数据表的索引
					$table->increments( 'c_id' )->nullable( FALSE )
								->comment( '自增id' );
					$table->string( 'c_name',10 )->nullable( FALSE )
								->comment( '联系人姓名' );
					$table -> integer('c_phone',false,false) ->nullable(FALSE)
								 -> comment('联系人手机号');
					$table->string( 'c_email',50 )->nullable( FALSE )
								->comment( '联系人邮箱' );
					$table->string( 'c_content',150 )->nullable( FALSE )
								->comment( '提交的内容' );
        });
			DB::statement( "ALTER TABLE `contact` comment '联系我们表'" );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contact');
    }
}
