<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBuyinfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('buyinfo', function (Blueprint $table) {
        	//认购发起人
					$table -> string('sponsor',10) -> nullable(FALSE) -> comment('认购发起人');
					//销售经理或销售助理认购审核申请状态。1=通过 0=未通过'
					$table -> string('manager_verify_status',5) -> nullable(TRUE) ->change();
					//销售经理或销售助理审核的时间，UNIX时间戳
					$table -> integer('manager_verify_time',false,false) -> nullable(TRUE) ->change();
					//销售经理或销售助理审核备注。经理审核认购申请结果备注
					$table -> string('manager_verify_remarks',255) -> nullable(TRUE) ->change();
					//财务审核的状态，财务对认购审核的结果，通过或未通过
					$table -> string('finance_verify_status',5) -> nullable(TRUE) ->change();
					//财务审核结果时间。UNIX时间戳
					$table -> integer('finance_verify_time',false,false) -> nullable(TRUE) ->change();
					//财务审核备注。经理审核认购申请结果备注
					$table -> string('finance_verify_remarks',255) -> nullable(TRUE) ->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('buyinfo');
    }
}
