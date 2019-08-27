<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSigninfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('signinfo', function (Blueprint $table) {
					$table -> integer('updated_at',false,false) -> nullable(true) -> comment('修改时间') ->  change();
				});
			DB::statement( "ALTER TABLE `signinfo` comment '签约表'" );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('signinfo');
    }
}
