<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductPropertyTable extends Migration
{
    /**
     * Run the migrations.      产品属性表表
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_property', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('product_id')->comment('产品ID');
            $table->integer('property_name_id')->comment('属性名ID');
            $table->integer('property_value_id')->comment('属性值ID');
            $table->integer('product_sku_id')->comment('属性值ID');
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
        Schema::dropIfExists('product_property');
    }
}
