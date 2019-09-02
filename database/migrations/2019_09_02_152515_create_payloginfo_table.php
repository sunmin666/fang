<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePayloginfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('payloginfo', function (Blueprint $table) {
            //认购编号
            $table -> integer('subscription_num',false,false) -> nullable(FALSE) ->comment('认购编号');
            //类型1表示定金 2表示一次性 3按揭
            $table -> string('type',5) -> nullable(false) -> comment('类型1表示定金 2表示一次性 3按揭');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('payloginfo');
    }
}
