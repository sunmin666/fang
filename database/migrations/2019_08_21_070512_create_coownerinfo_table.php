<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCoownerinfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coownerinfo', function (Blueprint $table) {
            $table->collation = 'utf8mb4_general_ci';    //数据表的排序规则
            $table->engine = 'InnoDB';      //指定数据表的索引
            //房屋共有人ID,唯一,自增
            $table -> increments('coow_id') -> nullable(FALSE) -> comment('房屋共有人ID,唯一,自增');
            //客户ID, 关,M联 customerinfo 表的 cust_id'
            $table -> integer('cust_id',FALSE,FALSE) -> nullable(FALSE) -> comment('客户ID, 关联 customerinfo 表的 cust_id');
            //共有人与客户之间的关系，如：配偶，儿子，女儿，父亲，母亲，亲戚
            $table -> string('relation',10) -> nullable(FALSE) -> comment('共有人与客户之间的关系，如：配偶，儿子，女儿，父亲，母亲，亲戚');
            //共有人姓名
            $table -> string('realname',20) -> nullable(FALSE) -> comment('共有人姓名');
            //共有人性别 1=男，0=女
            $table -> string('sex',5) -> nullable(FALSE) -> comment('共有人性别 1=男，0=女');
            //共有人生日,UNIX时间戳
            $table -> integer('birthday',false,false) -> nullable(FALSE) -> comment('共有人生日,UNIX时间戳');
            //共有人的身份证号，包括护照，驾照等
            $table -> string('idcard',25) -> nullable(FALSE) -> comment('共有人的身份证号，包括护照，驾照等');
            //共有人手机号码
            $table -> string('mobile',11) -> nullable(FALSE) -> comment('共有人手机号码');
            //共有人信息创建时间 UNIX时间戳
            $table -> integer('created_at',false,false) -> nullable(FALSE) -> comment('共有人信息创建时间 UNIX时间戳');
            //共有人信息更新时间 UNIX时间戳
            $table -> integer('updated_at',false,false) -> nullable(TRUE) -> comment('共有人信息更新时间 UNIX时间戳');
        });
        DB::statement( "ALTER TABLE `coownerinfo` comment '共有人基本信息表'" );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('coownerinfo');
    }
}
