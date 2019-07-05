<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cha', function (Blueprint $table) {
					$table->collation = 'utf8mb4_general_ci';    //数据表的排序规则
					$table->engine = 'InnoDB';      //指定数据表的索引
					$table->increments( 'chid' )->nullable( FALSE )
								->comment( '角色自增id' );
					$table->string( 'ch_nsme' , 10 )->nullable( FALSE )
								->comment( '角色名称' );
					$table->string( 'ch_text' , 200 )->nullable( TRUE )
								->comment( '角色描述' );
					$table->string( 'ch_per' , 200 )->nullable( FALSE )
								->comment( '角色的权限' );
					$table->unsignedTinyInteger( 'cstatus' )->nullable( FALSE )
								->default( '1' )->comment( '内部成员状态1=可用，2=禁用' );
					$table->unsignedInteger( 'created_at' )->nullable(FALSE)
								->comment( '创建的UNIX时间戳' );
        });
			DB::statement( "ALTER TABLE `cha` comment '角色信息表'" );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cha');
    }
}
