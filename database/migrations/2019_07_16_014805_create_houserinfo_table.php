<?php

	use Illuminate\Support\Facades\Schema;
	use Illuminate\Database\Schema\Blueprint;
	use Illuminate\Database\Migrations\Migration;


	class CreateHouserinfoTable extends Migration {

		/**
		 * Run the migrations.
		 *
		 * @return void
		 */
		public function up()
		{
			Schema::create( 'houserinfo' , function( Blueprint $table ) {
				$table->collation = 'utf8mb4_general_ci';    //数据表的排序规则
				$table->engine = 'InnoDB';      //指定数据表的索引
				//职业顾问id 唯一自增

				$table->increments( 'hous_id' )->nullable( FALSE )
							->comment( '职业顾问ID 唯一' );

				//职业顾问账号
				$table->string( 'username' , 20 )->nullable( FALSE )
							->comment( '职业顾问登录账号' );
//				//职业顾问登录密码
				$table->string( 'password' , 255 )->nullable( FALSE )
							->comment( '职业顾问登录密码' );

				$table->string( 'email' , 50 )->nullable( FALSE )->comment( '邮箱' );

				$table->string( 'realname' , 12 )->nullable( FALSE )
							->comment( '职业顾问真实姓名' );
//
//				$table->tinyInteger( 'sex' , 1 )->nullable( FALSE )
//							->comment( '性别1男2女' );
				$table->unsignedTinyInteger( 'sex' )->nullable( FALSE )
							->comment( '性别1男2女' );


				$table->string( 'mobile' , 11 )->nullable( FALSE )
							->unique( 'mobile' , 'mobile' )->comment( '手机号' );

				$table->string( 'idcrad' , 18 )->nullable( FALSE )
							->unique( 'idcrad' , 'idcrad' )->comment( '身份证号码' );

				$table->string( 'avatars' , 255 )->nullable( TRUE )
							->comment( '职业顾问头像信息' );
//
				$table->integer( 'birthday' , FALSE , FALSE )->nullable( FALSE )
							->comment( '职业顾问生日' );

				$table->string( 'weixin' , 20 )->nullable( FALSE )->comment( '微信' );

				$table->string( 'qq' , 12 )->nullable( TRUE )->comment( '置业顾问扣扣' );

				$table->string( 'description' , 255 )->nullable( TRUE )
							->comment( '自我简介' );

				$table->string( 'proj_id' , 10 )->nullable( FALSE )
							->comment( '所属项目id' );

				$table->string( 'comp_id' , 10 )->nullable( FALSE )
							->comment( '所属公司id' );
//
				$table->unsignedTinyInteger( 'status' )->nullable( FALSE )
							->default( '1' )->comment( '内部成员状态1=可用，2=禁用' );
//
				$table->integer( 'created_at' , false,false )->nullable( FALSE )
							->comment( '注册时间' );
//
				$table->integer( 'login_count' , false,false )->nullable( TRUE )
							->comment( '登录次数' );
			} );
			DB::statement( "ALTER TABLE `houserinfo` comment '职业顾问基本信息表'" );
		}

		/**
		 * Reverse the migrations.
		 *
		 * @return void
		 */
		public function down()
		{
			Schema::dropIfExists( 'houserinfo' );
		}
	}
