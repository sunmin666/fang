<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePermTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('perm', function (Blueprint $table) {
            $table -> string('project',30) -> nullable(true)->default('1')-> comment('1为初始页面，2为第二个页面');
            $table -> boolean('show') -> nullable(true)->default(false)-> comment();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('perm');
    }
}
