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
            $table -> string('ownership',5) -> nullable(true)-> comment('职业关注');
            $table -> string('purpose',5) -> nullable(true) -> comment('职业目的');
            $table -> string('area',5)   -> nullable(true) -> comment('客户区域');
            $table -> string('residence',5) -> nullable(true) -> comment('居住类型');
            $table -> string('structure',5) -> nullable(true) -> comment('户型结构');
            $table -> string('demand',5) -> nullable(true) -> comment('车位需求');
            $table -> string('apartment',5) -> nullable(true) -> comment('关注户型');
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
