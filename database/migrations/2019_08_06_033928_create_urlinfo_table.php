<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUrlinfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('urlinfo', function (Blueprint $table) {
					$table->collation = 'utf8mb4_general_ci';    //数据表的排序规则
					$table->engine = 'InnoDB';      //指定数据表的索引
					//url自增id
					$table -> increments('url_id') -> nullable(FALSE) -> comment('url自增id');
        	//url名称
					$table -> string('url_name',30) -> nullable(FALSE) -> comment('url名称');
					//url路径
					$table -> string('url_path',255) -> nullable(FALSE) -> comment('url路径');
					//url描述
					$table -> string('description',255) -> nullable(TRUE) -> comment('url描述');
					//url录入时间
					$table -> string('created_at',13) -> nullable(FALSE) -> comment('url录入时间');
					//url更新时间
					$table -> string('updated_at',13) -> nullable(TRUE) -> comment('url更新时间');
        });
			DB::statement( "ALTER TABLE `urlinfo` comment '系统链接管理表'" );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('urlinfo');
    }
}
