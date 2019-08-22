<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHomeinfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('homeinfo', function (Blueprint $table) {
					$table->collation = 'utf8mb4_general_ci';    //数据表的排序规则
					$table->engine = 'InnoDB';      //指定数据表的索引
					//房源id自增
					$table -> increments('homeid') -> nullable(FALSE) -> comment('房源id自增');
					//楼号信息
					$table -> string('buildnum',10) -> nullable(FALSE) -> comment('楼号');
					//单元号
					$table -> string('unitnum',10) -> nullable(FALSE) -> comment('单元信息');
					//房号信息
					$table -> string('roomnum',15) -> nullable(FALSE) -> comment('房号信息');
					//楼层
					$table -> string('floor',10) -> nullable(FALSE) -> comment('楼层');
					//建筑面积
					$table -> string('build_area',20) -> nullable(FALSE) -> comment('建筑面积');
					//房间面积
					$table -> string('home_area',20) -> nullable(FALSE) -> comment('房间面积');
					//户型图
					$table -> string('house_img',100) -> nullable(FALSE) -> comment('户型图');
					//户型结构
					$table -> string('house_str',30) -> nullable(FALSE) -> comment('户型结构');
					//房子单价
					$table -> string('price',20) -> nullable(FALSE) -> comment('房子单价');
					//房子总价
					$table -> string('total',30) -> nullable(FALSE) -> comment('房子总价');
					//房子折扣
					$table -> string('discount',10) -> nullable(FALSE) -> comment('房子折扣');
					//房源销售状态
					$table -> string('status',10) -> nullable(FALSE) -> comment('房子销售状态');
					//认购编号
					$table -> string('buyid',10) -> nullable(FALSE) -> comment('认购编号');

					//房源状态备注信息
					$table -> string('remarks',255) -> nullable(TRUE) -> comment('房子状态备注信息');
					//录入时间
					$table -> string('created_at',15) -> nullable(FALSE) -> comment('房子信息录入时间');
					//更新时间
					$table -> string('updated_at',15) -> nullable(TRUE) -> comment('房子信息更新时间');
        });
			DB::statement( "ALTER TABLE `homeinfo` comment '房子信息表'" );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('homeinfo');
    }
}
