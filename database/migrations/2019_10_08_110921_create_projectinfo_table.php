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
        Schema::table('projectinfo', function (Blueprint $table) {
            //所属公司
            $table -> string('comp',20) -> nullable(TRUE) -> comment('所属公司');
            //项目地址
            $table -> string('project_add',255) -> nullable(TRUE) -> comment('项目地址');
            //售楼地址
            $table -> string('sales_add',255) -> nullable(TRUE) -> comment('售楼地址');
            //总户数
            $table -> integer('home_number',false,false) -> nullable(TRUE) -> comment('总户数');
            //主力户型
            $table -> string('main_unit',20) -> nullable(TRUE) -> comment('主力户型');
            //开盘时间
            $table -> integer('opening_time',false,false) -> nullable(TRUE) -> comment('开盘时间');
            //开发商
            $table -> string('developers',20) -> nullable(TRUE) -> comment('开发商');
            //物业类型
            $table -> string('property_type',20) -> nullable(TRUE) -> comment('物业类型');
            //建筑类型
            $table -> string('archit_type',10) -> nullable(TRUE) -> comment('建筑类型');
            //装修情况
            $table -> string('situation',10) -> nullable(TRUE) -> comment('装修情况');
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
