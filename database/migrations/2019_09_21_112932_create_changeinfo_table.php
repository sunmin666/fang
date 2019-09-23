<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChangeinfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('changeinfo', function (Blueprint $table) {
            //销售经理
            $table-> string('verify_admin',255) -> nullable(true) -> comment('销售经理认购申请审核人');
            //财务
            $table-> string('finance_admin',255) -> nullable(true) -> comment('财务认购申请审核人');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('changeinfo');
    }
}
