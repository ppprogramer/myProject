<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePropertyNameTable extends Migration
{
    /**
     * Run the migrations. 属性名表
     *
     * @return void
     */
    public function up()
    {
        Schema::create('property_name', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->comment('属性名');
            $table->integer('item_id')->comment('所属类目ID');
            $table->tinyInteger('is_sku')->comment('1-是;0不是');
            //$table->integer('order')->comment('排序');
            $table->tinyInteger('status')->comment('状态:1-使用;0不使用');
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
        Schema::dropIfExists('property_name');
    }
}
