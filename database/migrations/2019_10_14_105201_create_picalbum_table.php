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
            //创建时间
            $table -> integer('created_at',false,false) -> nullable(FALSE) -> comment('创建时间');
            //更新时间
            $table -> integer('updated_at',false,false) -> nullable(TRUE) -> comment('更新时间');
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
