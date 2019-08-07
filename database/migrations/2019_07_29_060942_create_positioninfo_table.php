<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePositioninfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('positioninfo', function (Blueprint $table) {
					$table->collation = 'utf8mb4_general_ci';    //数据表的排序规则
					$table->engine = 'InnoDB';      //指定数据表的索引
					//内部成员职位信息自增id
					$table -> increments('posi_id') -> nullable(FALSE) -> comment('内部成员职位信息表id唯一');
					//内部成员职位标题只限英文
					$table -> string('posi_title',100) -> nullable(FAlSE) -> comment('职位标题');
        	//内部成员职位名称
					$table -> string('posi_name',50) -> nullable(FALSE) -> comment('职位名称');
					//职位的详情描述
					$table -> string('description','100') -> nullable(FALSE) ->comment('职位描述');
					//添加时间
					$table -> string('created_at',11) -> nullable(FALSE) -> comment('添加的时间戳');
					//修改时间
					$table -> string('updated_at',11) -> nullable(TRUE) -> comment('修改时间戳');
        });
			DB::statement( "ALTER TABLE `positioninfo` comment '内部成员职位信息表'" );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('positioninfo');
    }
}
