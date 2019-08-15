<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserRelationinfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_relationinfo', function (Blueprint $table) {
					$table->collation = 'utf8mb4_general_ci';    //数据表的排序规则
					$table->engine = 'InnoDB';      //指定数据表的索引
					//内部成员关系表 id
					$table -> increments('rela_id') -> nullable(FALSE) -> comment('内部成员关系表id 唯一');
					//用户id
					$table  -> integer('memberid',false,false) -> nullable(FALSE) -> comment('用户id');
					//公司id
					$table -> integer('comp_id',false,false) -> nullable(TRUE) -> comment('公司id');
					//部门id
					$table -> integer('depa_id',false,false) -> nullable(TRUE) -> comment('部门id');
					//职位id
					$table -> integer('posi_id',false,false) -> nullable(FALSE) -> comment('职位id');
					//角色id
					$table -> integer('role_id',false,false) -> nullable(FALSE) -> comment('角色id');
					//权限id
					$table -> integer('perm_id',false,false) -> nullable(FALSE) -> comment('权限id');
					//添加时间
					$table -> integer('created_at',false,false) -> nullable(FALSE) -> comment('添加时间');
					//修改时间
					$table -> integer('updated_at',false,false) -> nullable(TRUE) -> comment('修改时间');
        });

			DB::statement( "ALTER TABLE `user_relationinfo` comment '用户权限关系表'" );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_relationinfo');
    }
}
