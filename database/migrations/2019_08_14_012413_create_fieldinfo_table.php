<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFieldinfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fieldinfo', function (Blueprint $table) {
					$table->collation = 'utf8mb4_general_ci';    //数据表的排序规则
					$table->engine = 'InnoDB';      //指定数据表的索引
					//字段自增id
					$table -> increments('field_id') -> nullable(FALSE) -> comment('数据库自增id');
					//父类id
					$table -> string('parent_field_id',10) -> nullable(FALSE) -> comment('父类id');
					//路径关系
					$table -> string('pathlist',30) -> nullable(FALSE) -> comment('路径关系');
					//名称
					$table -> string('name',30) -> nullable(FALSE) ->comment('字段名称');
					//录入时间
					$table -> string('created_at',15) -> nullable(FALSE) -> comment('录入时间');
					//修改时间
					$table -> string('updated_at',15) -> nullable(TRUE) -> comment('更新时间');
        });
			DB::statement( "ALTER TABLE `homeinfo` comment '字段信息表'" );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fieldinfo');
    }
}
