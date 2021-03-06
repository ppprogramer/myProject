<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBrandTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('brand', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('type_id')->comment('类目ID');
            $table->string('name_zh')->comment('中文名');
            $table->string('name_en')->comment('英文名');
            $table->text('desc')->comment('描述');
            $table->string('logo')->comment('品牌logo');
            $table->tinyInteger('status')->comment('状态 1-使用 0不使用');
            $table->integer('create_time')->comment('创建时间');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('brand');
    }
}
