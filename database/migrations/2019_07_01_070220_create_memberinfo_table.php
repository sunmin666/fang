<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMemberinfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
			Schema::create('memberinfo', function (Blueprint $table) {
				$table->collation = 'utf8mb4_general_ci';    //数据表的排序规则
				$table->engine = 'InnoDB';      //指定数据表的索引
				// `memberid` int( 10 ) UNSIGNED NOT NULL COMMENT '内部管理成员ID 唯一',
				// 选择 $table->increments( 'memberid' ) 就自动为该字段设置为 PRIMARY ；
				$table->increments( 'memberid' )->nullable( FALSE )
							->comment( '内部管理成员ID 唯一' );                  //内部成员id唯一的
				// `account` char( 10 ) NOT NULL COMMENT '内部成员数字帐号，唯一',
				// ->unique() 是添加唯一索引，这里面有两个参数，第一个是当前字段的名字，第二个参数是自己定义的名称，如果不定义laravel会自己起一个名字
				$table->char( 'account' , 10 )->nullable( FALSE )->unique('account', 'account')
							->comment( '内部成员数字帐号，唯一' );
				$table->char( 'username' , 20 )->nullable( FALSE )->unique('username', 'username')
							->comment( '内部成员帐号，唯一' );
				$table->char( 'email' , 100 )->nullable( FALSE )->comment( '内部成员邮箱地址' );
				// `password` char( 255 ) NOT NULL COMMENT 'password_hash方式生成的密码(password_hash("123456", PASSWORD_BCRYPT, $options))',
				$table->char( 'password' , 255 )->nullable( FALSE )
							->comment( 'password_hash方式生成的密码(password_hash("123456", PASSWORD_BCRYPT, $options)' );
				// `realname` char( 10 ) NOT NULL COMMENT '内部成员真是姓名',
				$table->unsignedTinyInteger( 'sex' )->nullable( FALSE )
							->comment( '内部成员性别，1=男，0=女' );
				// `mobile` char( 11 ) NOT NULL COMMENT '内部成员的联系电话',
				// ->unique() 是添加唯一索引，这里面有两个参数，第一个是当前字段的名字，第二个参数是自己定义的名称，如果不定义laravel会自己起一个名字
				$table->char( 'mobile' , 11 )->nullable( FALSE )->unique('mobile', 'mobile')
							->comment( '内部成员的联系电话' );
				// `avatars` varchar( 255 ) DEFAULT NULL COMMENT '用户头像的路径',
				$table->string( 'avatars' , 255 )->nullable()
							->comment( '用户头像的路径' );
				$table->unsignedInteger( 'created_at' )->nullable(FALSE)
							->comment( '创建的UNIX时间戳' );
				$table->unsignedTinyInteger( 'status' )->nullable( FALSE )
							->default( '1' )->comment( '内部成员状态1=可用，0=禁用' );
				$table ->string('character') -> nullable(FALSE) -> comment('角色id');
			});
			DB::statement( "ALTER TABLE `memberinfo` comment '内部成员信息表'" );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('memberinfo');
    }
}
