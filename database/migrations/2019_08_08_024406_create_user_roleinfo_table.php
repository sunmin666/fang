<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserRoleinfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_roleinfo', function (Blueprint $table) {
					$table->collation = 'utf8mb4_general_ci';    //数据表的排序规则
					$table->engine = 'InnoDB';      //指定数据表的索引
					//角色id
					$table -> increments('role_id') -> nnullable(FALSE) -> comment('叫色id');
					//父类角色id
					$table -> integer('parent_role_id',false,false) -> nullable(TRUE) -> comment('父类角色id');
					//角色标题
					$table -> string('role_title',100) -> nullable(FALSE) -> comment('角色标题 只限英文');
					//角色名称
					$table -> string('role_name',50) -> nullable(FALSE) -> comment('角色名称');
					//角色描述
					$table -> string('description',255)  -> nullable(FALSE) -> comment('角色描述');
					//添加时间
					$table ->integer('created_at',false,false)-> nullable(FALSE) -> comment('添加时间');
					//修改时间
					$table -> integer('updated_at',false,false)-> nullable(TRUE) -> comment('修改时间');
        });
			DB::statement( "ALTER TABLE `user_roleinfo` comment '用户方角色信息表'" );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_roleinfo');
    }
}
