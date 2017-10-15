<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGoodsInfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('goods_info', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('goods_id');
            $table->text('desc')->comment('详情描述');
            $table->integer('brand_id')->comment('品牌');
            $table->string('style')->comment('款式');
            $table->integer('create_timestamp');
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
        Schema::dropIfExists('goods_info');
    }
}
