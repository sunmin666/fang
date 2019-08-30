<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChangeinfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('changeinfo', function (Blueprint $table) {
					$table->collation = 'utf8mb4_general_ci';    //数据表的排序规则
					$table->engine = 'InnoDB';      //指定数据表的索引
					//换房或更名数据自增id
					$table -> increments('chan_id') -> nullable(false) -> comment('换房id');
					//客户id
					$table -> integer('cust_id',false,false) -> nullable(false) -> comment('客户id');
					//新客户id
					$table -> integer('new_cust',false,false) -> nullable(true) -> comment('新客户id');
					//老房源id
					$table -> integer('old_homeid',false,false) -> nullable(false) -> comment('老房源id');
					//新房源id
					$table -> integer('new_homeid',false,false) -> nullable(true) -> comment('新房源id');
					//换房或更名备注
					$table -> string('remarks',255) -> nullable(false) -> comment('换房或更名备注');
					//类型1更名2换房
					$table -> string('type',5) -> nullable(false) -> comment('类型：1更名2换房');
					//销售经理审核状态
					$table -> integer('status',false,false) -> nullable(true) -> comment('销售经理审核状态');
					//销售经理审核备注
					$table -> string('verify_remarks',255) -> nullable(true) -> commnet('销售经理审核备注');
					//销售经理审核时间
					$table -> integer('verifytime',false,false) ->nullable(true) -> comment('销售经理审核时间');
					//财务审核状态
					$table -> integer('finance_status',false,false) -> nullable(true) -> comment('财务审核状态');
					//财务审核备注
					$table -> string('finance_remarks',255) -> nullable(true) -> comment();
					//财务审核时间
					$table -> integer('finance_time',false,false) -> nullable(true) -> comment('财务审核时间');
					//更名获取换房发起时间
					$table -> integer('created_at',false,false) -> nullable(false) -> comment('更名或换房发起时间');
        	//更新时间
					$table -> integer('updated_at',false,false) -> nullable(true) -> comment('更新时间');
        });
			DB::statement( "ALTER TABLE `changeinfo` comment '换房更名信息表'" );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('changeinfo');
    }
}
