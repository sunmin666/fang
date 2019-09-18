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
            //付款方案，在这里选择1个，一次性付款和按揭付款
            $table -> string('pay_type',5) -> nullable(true) ->comment('付款方案，在这里选择1个，一次性付款和按揭付款');
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
