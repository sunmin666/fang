<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer', function (Blueprint $table) {
					$table->collation = 'utf8mb4_general_ci';    //数据表的排序规则
					$table->engine = 'InnoDB';      //指定数据表的索引
					//客户信息表自增id 唯一
					$table->increments( 'cust_id')->nullable( FALSE ) -> primaryKey('cust_id')
						->comment( '客户信息表id, 唯一' );
					//客户真实姓名
					$table->string('realname',12) -> nullable(FALSE) -> comment('客户真实姓名');
					//客户性别
					$table->unsignedTinyInteger('sex') -> nullable(FALSE) -> comment('客户性别');

					//客户手机号
					$table->string('mobile',11)->unique('mobile','mobile') -> nullable(FALSE) -> comment('客户手机号');

					//客户其他电话
					$table-> string('telphone',11) -> nullable(TRUE) -> comment('客户其他手机号');

					//客户微信号
					$table -> string('weixin',20) -> nullable(TRUE) -> comment('客户微信号');

					//客户扣扣
					$table -> string('qq',20) -> nullable(TRUE)-> comment('客户扣扣号');

					//客户邮箱email
					$table->string('email',50)-> nullable(TRUE) -> comment('客户的邮箱');

					//客户的身份证号
					$table -> string('idcard',20) ->unique('idcard','idcard')-> nullable(TRUE) -> comment('客户身份证号');

					//客户意向状态
					$table->unsignedTinyInteger( 'status_id' )->nullable( FALSE )
								->default( '1' )->comment( '内部成员状态1=可用，0=禁用' );
					//客户信息状态
					$table->unsignedTinyInteger( 'is_show' )->nullable( FALSE )
								->default( '1' )->comment( '内部成员状态1=显示，0=隐藏' );
					//客户所属职业顾问id
					$table->string('hous_id',20) -> nullable(FALSE) -> comment('客户所属职业顾问id');

					//该客户所属项目ID
					$table->string('proj_id',20) ->unique('proj_id','proj_id')-> nullable(FALSE) ->  comment('该客户所属项目ID');

					//客户所属公司id
					$table->string('comp_id',20) ->unique('comp_id','comp_id')-> nullable(FALSE) -> comment('客户所属公司id');

					//客户录入时间   表里存的是时间戳
					$table->string('created_at',20) -> nullable(FALSE) -> comment('客户录入时间');

				});
			DB::statement( "ALTER TABLE `customer` comment '客户信息表'" );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customer');
    }
}
