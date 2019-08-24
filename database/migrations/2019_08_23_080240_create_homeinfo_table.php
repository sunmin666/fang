<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHomeinfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('homeinfo', function (Blueprint $table) {
            //户型名称，如A户型，B户型等
            $table -> string('house_name',10) -> nullable(FALSE) -> comment('户型名称，如A户型，B户型等');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('homeinfo');
    }
}
