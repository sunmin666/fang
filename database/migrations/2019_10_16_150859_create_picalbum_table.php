<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePicalbumTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('picalbum', function (Blueprint $table) {
            $table -> integer('ling_room',false,false) -> nullable(TRUE) -> comment('居室');
            $table -> integer('area_room',false,false) -> nullable(TRUE) -> comment('面积');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('picalbum');
    }
}
