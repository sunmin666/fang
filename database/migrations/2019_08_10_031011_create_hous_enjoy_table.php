<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHousEnjoyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hous_enjoy', function (Blueprint $table) {
					$table->collation = 'utf8mb4_general_ci';    //数据表的排序规则
					$table->engine = 'InnoDB';      //指定数据表的索引
					$table -> increments('enjoy_id') -> nullable(FALSE) -> comment('职业顾问折扣id');
					$table -> string('enjoy',5) -> nullable(FALSE) -> comment('折扣');
					$table -> string('created_at',20) -> nullable(FALSE) -> comment('录入时间');
					$table -> string('updated_ar',20) -> nullable(TRUE) -> comment('更新时间');
        });
			DB::statement( "ALTER TABLE `hous_enjoy` comment '职业顾问折扣信息表'" );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hous_enjoy');
    }
}
