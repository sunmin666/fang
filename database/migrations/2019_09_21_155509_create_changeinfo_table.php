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
            $table ->decimal('month_pay',12,2) -> nullable(TRUE) -> comment('月供，选择按揭每月需要的钱数');
            $table -> integer('loan_term',false,false) -> nullable(TRUE) -> comment('年限');
            $table -> decimal('total_price',12,2) -> nullable(TRUE) -> comment('应缴哪总金额');
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
