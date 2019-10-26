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
            $table -> string('mobile',11) -> nullable(true)-> comment('用户手机号 关联register里mobile');
            $table -> integer('cust_id',false,false) -> nullable(true)-> comment('注册人id');
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
