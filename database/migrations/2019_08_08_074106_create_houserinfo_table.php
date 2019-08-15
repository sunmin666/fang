<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHouserinfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('houserinfo', function (Blueprint $table) {
					$table->collation = 'utf8mb4_general_ci';    //数据表的排序规则
					$table->engine = 'InnoDB';      //指定数据表的索引
					//手机号（登录账号）
					$table -> integer('mobile',false,false) -> nullable(FALSE) -> comment('手机号（登录账号）') -> change();
					//成员真实姓名
					$table -> string('name',7) -> nullable(FALSE) -> conmment('真实姓名');
					//性别
					$table -> integer('sex',false,false) -> nullable(FALSE) -> comment('成员性别') -> change();
					//邮箱
					$table -> string('email',50) -> nullable(FALSE) -> comment('成员邮箱') -> change();
					//身份证号码
					$table -> string('idcrad',18) -> nullable(FALSE) -> comment('成员身份证号') -> change();
					//项目名称
					$table -> integer('proj_id',false,false) -> nullable(FALSE) -> comment('项目id') -> change();
					//享有折扣
					$table -> string('enjoy',20) -> nullable(FALSE) -> comment('成员享有折扣');
					//是否可以登录pc
					$table -> string('is_ipad',10) -> nullable(FALSE) -> comment('是否可以登录pc1可以2不可以');
					//创建时间
					$table -> integer('created_at',false,false) -> nullable(FALSE) -> comment('创建时间') -> change();
					//修改时间
					$table -> integer('updated_at',false,false) -> nullable(TRUE) -> comment('修改时间');
        });
			DB::statement( "ALTER TABLE `houserinfo` comment '公司成员信息表'" );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('houserinfo');
    }
}
