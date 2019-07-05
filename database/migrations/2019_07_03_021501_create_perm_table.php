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

					$table -> string('p_icon',30) -> nullable(TRUE)
						-> comment('菜单图标');
					$table -> string('p_superior',30) -> nullable(TRUE)
								 -> comment('上级菜单id');
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
