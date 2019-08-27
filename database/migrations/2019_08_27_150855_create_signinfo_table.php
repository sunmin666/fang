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
        Schema::create('signinfo', function (Blueprint $table) {
					$table->collation = 'utf8mb4_general_ci';    //数据表的排序规则
					$table->engine = 'InnoDB';      //指定数据表的索引
					//签约表信息的自增id
					$table-> increments('signid') -> nullable(false) -> comment('签约表或延迟签约信息的自增id');
					//客户id关联客户信息表id
					$table-> integer('cust_id',false,false) -> nullable(false) -> comment('客户id');
					//房源信息id
					$table ->integer('homeid',false,false) -> nullable(false) -> comment('房源信息id');
					//签约类型
					$table -> unsignedTinyInteger('sign_type') -> nullable(false) -> comment('签约类型，0：立刻签约，1：延迟签约');
					//职业顾问发起办理签约的时间
					$table -> integer('sign_applytime',false,false) -> nullable(false)
						-> comment('职业顾问发起办理签约的时间');
					//职业顾问发起签约的备注
					$table -> string('sign_remarks',255) -> nullable(false) -> comment('职业顾问发起签约的备注');
					//销售经理审批通过时间
					$table -> integer('sign_verifytime',false,false) -> nullable(true)
						-> comment('销售经理审批通过时间');
					//销售经理审批状态
					$table -> unsignedTinyInteger('sign_status') -> nullable(true) -> comment('签约类型，0：未通过，1：通过');
					//销售经理审核备注
					$table -> string('verify_remarks',255) -> nullable(true) -> comment('销售经理审核备注');
					//财务审核时间
					$table -> integer('finance_verifytime',false,false) -> nullable(true)
						-> comment('财务审核时间');
					//财务审核状态0：未通过1：以通过
					$table -> unsignedTinyInteger('finance_status') -> nullable(true) -> comment('签约类型，0：未通过，1：通过');
					//财务审核备注
					$table -> string('finance_remarks',255) -> nullable(true) -> comment('财务审核备注');
					//创建时间
					$table -> integer('created_at',false,false) -> nullable(false) -> comment('创建时间');
					//修改时间
					$table -> integer('updated_at',false,false) -> nullable(false) -> comment('');
        });
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
