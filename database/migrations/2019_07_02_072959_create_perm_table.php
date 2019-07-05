<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePermTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('perm', function (Blueprint $table) {
					$table->collation = 'utf8mb4_general_ci';    //数据表的排序规则
					$table->engine = 'InnoDB';      //指定数据表的索引
					$table->increments( 'perid' )->nullable( FALSE )
								->comment( '权限自增id' );
					$table->char( 'pername' , 10 )->nullable( FALSE )
								->comment( '权限名称' );
					$table->char( 'perurl' , 10 )->nullable( FALSE )
								->comment( '权限路径' );
					$table->unsignedInteger( 'created_at' )->nullable(FALSE)
								->comment( '创建的UNIX时间戳' );
					$table->unsignedTinyInteger( 'status' )->nullable( FALSE )
								->default( '1' )->comment( '内部成员状态1=可用，0=禁用' );
        });
			DB::statement( "ALTER TABLE `memberinfo` comment '权限信息表'" );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('perm');
    }
}
