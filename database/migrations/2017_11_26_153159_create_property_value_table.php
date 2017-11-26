<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePropertyValueTable extends Migration
{
    /**
     * Run the migrations.  属性值表
     *
     * @return void
     */
    public function up()
    {
        Schema::create('property_value', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('item_id')->comment('类目ID');
            $table->integer('property_name_id')->comment('属性名ID');
            $table->tinyInteger('status')->comment('状态 1-使用 0不使用');
            $table->string('name')->comment('属性值名称');
            //$table->integer('order')->comment('排序');
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
        Schema::dropIfExists('property_value');
    }
}
