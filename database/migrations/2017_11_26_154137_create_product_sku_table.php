<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductSkuTable extends Migration
{
    /**
     * Run the migrations.      产品SKU表
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_sku', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('product_id')->comment('产品ID');
            $table->integer('amount')->comment('数量');
            $table->float('price', 2)->comment('价格');
            $table->tinyInteger('status')->comment('状态 1-使用 0不使用');
            $table->string('barcode')->comment('产品条码');
            $table->string('product_code')->comment('产品编号');
            $table->integer('create_time')->comment('创建时间');
            $table->integer('user_id')->comment('用户ID');
            $table->integer('shop_ip')->comment('店铺ID');
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
        Schema::dropIfExists('product_sku');
    }
}
