<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('customer', function (Blueprint $table) {
            //认知渠道
            $table -> integer('cognition',false,false) -> nullable(false) -> comment('认知渠道');
            //家庭结构
            $table -> integer('family_str',false,false) -> nullable(false) -> comment('家庭结构');
            //工作类型
            $table -> integer('work_type',false,false) -> nullable(false) -> comment('工作类型');
            //联系地址
            $table -> string('address',255) -> nullable(false) -> comment('联系地址');
            //意向面积
            $table -> integer('intention_area',false,false) -> nullable(false) -> comment('意向面积');
            //楼层偏好
            $table -> integer('floor_like',false,false) -> nullable(false) -> comment('楼层偏好');
            //家具需求
            $table -> integer('furniture_need',false,false) -> nullable(false) -> comment('家具需求');
            //置业此数
            $table -> integer('house_num',false,false) -> nullable(false) -> comment('置业此数');
            //共有人信息ID
            $table -> integer('coow_id',false,false) -> nullable(false) -> comment('共有人信息ID');
            //首次接触方式
            $table -> integer('first_contact',false,false) -> nullable(false) -> comment('首次接触方式');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customer');
    }
}
