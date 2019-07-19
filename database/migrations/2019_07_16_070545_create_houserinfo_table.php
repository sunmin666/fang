<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHouserinfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('houserinfo', function (Blueprint $table) {

					$table->integer( 'birthday' , FALSE , FALSE )->TRUE( FALSE )
								->change(  );

					$table->string( 'weixin' , 20 )->nullable( TRUE )->change(  );

					$table->string( 'proj_id' , 10 )->nullable( TRUE )
								->change(  );

					$table->string( 'comp_id' , 10 )->nullable( TRUE )
								->change(  );

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('houserinfo');
    }
}
