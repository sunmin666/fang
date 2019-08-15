<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserPermissioninfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_permissioninfo', function (Blueprint $table) {
					$table->collation = 'utf8mb4_general_ci';    //数据表的排序规则
					$table->engine = 'InnoDB';      //指定数据表的索引
					//用户权限表id信息
					$table -> increments('perm_id') -> nullable(FALSE) -> comment('perm_id自增id');
					//父类id
					$table -> integer('parent_perm_id',false,false) -> nullable(TRUE) -> comment('父类id');
					//角色
					$table -> integer('role_id',false,false) -> nullable(FALSE) -> comment('角色id');
					$table -> unsignedTinyInteger('perm_type') -> nullable( FALSE )
								 ->default( '1' ) -> comment('权限状态 0：可访问，1：可授权');
					//权限标题
					$table -> string('perm_title',100) -> nullable(FALSE) -> comment('权限标题 限英文');
					//权限名称
					$table -> string('perm_name',20) -> nullable(FALSE) ->  comment('权限名称');
					//权限描述
					$table -> string('description',150) -> nullable(FALSE) -> comment('权限描述');
					//请求方法
					$table -> string('http_method',255) -> nullable(FALSE) -> comment('请求方法');
					//请求路径
					$table -> string('http_path',255) -> nullable(FALSE)  -> comment('请求路径');
					//天加时间
					$table -> integer('created_at',false,false) -> nullable(FALSE) -> comment('添加时间');
					//修改时间
					$table -> integer('updated_at',false,false) -> nullable(TRUE) -> comment('修改时间');
        });
			DB::statement( "ALTER TABLE `user_permissioninfo` comment '用户权限信息表'" );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_permissioninfo');
    }
}
