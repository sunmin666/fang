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

				$table->string( 'pername' , 15 )->nullable( FALSE )
							->change(  );
				$table->string( 'perurl' , 30 )->nullable( FALSE )
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
        Schema::dropIfExists('perm');
    }
}
