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
            //项目中文名称
            $table -> string('pro_cname',20) -> nullable(TRUE) -> change();
            //项目英文名称
            $table ->string('pro_ename',50) -> nullable(TRUE) -> change();
            //项目所属公司
            $table -> integer('comp_id',false,false) -> nullable(TRUE)
                -> change();
            $table -> integer('ppeople',false,false) -> nullable(TRUE)
                -> change();
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
