<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBaleChildTable extends Migration
{
    /**
     * Run the migrations.  打包品子项表
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bale_child', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('bale_id')->comment('打包品ID');
            $table->integer('product_sku_id')->comment('产品SKUID');
            $table->integer('amount')->comment('数量');
            $table->float('price', 2)->comment('价格');
            $table->integer('user_id')->comment('用户ID');
            $table->integer('shop_id')->comment('店铺ID');
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
        Schema::dropIfExists('bale_child');
    }
}
