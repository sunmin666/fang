<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompanyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company', function (Blueprint $table) {
					$table->collation = 'utf8mb4_general_ci';    //数据表的排序规则
					$table->engine = 'InnoDB';      //指定数据表的索引

					//公司信息表里的自增id
					$table->increments( 'comp_id' )->nullable( FALSE )->comment( '公司ID, 唯一' );

					//公司中文名称
					$table->string('comp_cname',50) -> nullable(FALSE) -> comment('公司中文名称');

					//公司英文名称
					$table->string('comp_ename',100) ->nullable(FALSE) -> comment('公司英文名称');
					//法人信息代表
					$table->string('corporation',12) ->nullable(FALSE) -> comment('法人代表信息');

					//法人身份证号
					$table->string('corp_idcard',18) -> nullable(FALSE) -> comment('法人身份证号');

					//法人手机号
        	$table->string('corp_mobile',11) -> nullable(FALSE) -> comment('法人手机号');
        	//公司营业执照图片，存放的是图片路径
        	$table->string('license',255) -> nullable(FALSE) -> comment('公司营业执照图片，存放的是图片路径');
        	//企业的统一社会信用码，18位 字母和数字
					$table-> string('credit_code',18) -> nullable(FALSE) -> comment('企业的统一社会信用码');

					//公司注册地址
					$table->string('address',100) -> nullable(FALSE) -> comment('公司注册地址');

					//公司的电话号码
					$table -> string('telphone',12) -> nullable(FALSE) -> comment('公司的电话号码，不包含-');

					//公司的类型
					$table -> string('comp_type',100) -> nullable(FALSE) -> comment('公司的类型');

					//公司的营业范围
					$table->text('scope') -> nullable(FALSE) -> comment('公司的营业范围');

					//公司注册资本
					$table->bigInteger('reg_capital') -> nullable(FALSE) -> comment('公司注册资本');

					//使用ihouser系统的联系人
					$table ->string('contacts',12) -> nullable(FALSE) -> comment('使用iHOUSER系统的联系人');

					//使用ihouser系统联系人的手机号
					$table->string('cont_mobile',11) -> nullable(FALSE) -> comment('使用ihouser系统联系人的手机号');

					//使用ihouser系统联系人的身份证号
					$table->string('cont_idcard',18) -> nullable(FALSE) -> comment('使用ihouser系统联系人的身份证号');

					//公司的成立日期
					$table-> integer('created_date',false,false)-> nullable(FALSE)->comment('公司的成立日期');

					//公司营业期限开始时间
					$table->integer('business_date',false,false)-> nullable(FALSE) -> comment('公司营业期限开始时间');

					//公司营业期限结束时间
					$table-> integer('expire_date',false,false)->nullable(FALSE)-> comment('公司营业期限结束时间');

					//公司创建时间戳
					$table->integer('created_at',false,false)-> nullable(FALSE)-> comment('公司信息创建时间戳');

					//修改信息时间戳
					$table->integer('updated_at',false,false)-> nullable(FALSE) -> comment('公司信息修改时间戳');

        });

			DB::statement( "ALTER TABLE `company` comment '公司信息表'" );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('company');
    }
}
