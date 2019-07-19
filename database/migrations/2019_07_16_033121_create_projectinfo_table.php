<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectinfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projectinfo', function (Blueprint $table) {
					$table->collation = 'utf8mb4_general_ci';    //数据表的排序规则
					$table->engine = 'InnoDB';      //指定数据表的索引
					//项目自增id 唯一
					$table->increments( 'project_id' )->nullable( FALSE )
								->comment( '项目自增id 唯一' );
					//项目中文名称
					$table -> string('pro_cname',20) -> nullable(FALSE) -> comment('项目中文名称');
					//项目英文名称
					$table ->string('pro_ename',50) -> nullable(FALSE) -> comment('项目英文名称');
					//项目所属公司
					$table -> integer('comp_id',false,false) -> nullable(FALSE)
						-> comment('项目所属公司id');
					//项目录入时间
					$table -> integer('created_at',false,false) -> nullable(FALSE)
						-> comment('项目录入时间');
					//项目更新时间
					$table -> integer('updated_at',false,false) -> nunllable(TRUE)
						-> comment('项目更新时间');
				});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('projectinfo');
    }
}
