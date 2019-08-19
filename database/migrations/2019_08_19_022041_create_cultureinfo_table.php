<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCultureinfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cultureinfo', function (Blueprint $table) {
					//企业文化的图片分类ID
					$table -> integer('class_id',false,false) -> nullable(FALSE) -> comment('企业文化的图片分类ID');
					//企业文化的图片路径
					$table -> string('imgpath',255) -> nullable(FALSE) -> comment('企业文化的图片路径');
					//图片的顺序
					$table -> string('sort',5) -> nullable(FALSE) -> comment('图片的顺序');
					//创建时间
					$table -> integer('created_at',false,false) -> nullable(FALSE) -> comment('创建时间');
					//更新时间
					$table -> integer('updated_at',false,false) -> nullable(TRUE) -> comment('更新时间');
        });
			DB::statement( "ALTER TABLE `cultureinfo` fieldinfo '企业文化信息表'" );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cultureinfo');
    }
}
