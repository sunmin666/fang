<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePurchasePlanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('purchase_plan', function (Blueprint $table) {
        //房源信息ID , 关联 homeinfo  表的 homeid
            $table -> integer('homeid',false,false) -> nullable(FALSE) ->comment('房源信息ID , 关联 homeinfo  表的 homeid');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('purchase_plan');
    }
}
