<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBaleTable extends Migration
{
    /**
     * Run the migrations.  打包品表
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bale', function (Blueprint $table) {
            $table->increments('id');
            $table->tinyInteger('status')->comment('状态:1-使用;2不使用');
            $table->tinyInteger('type')->comment('类型:1-单个sku;2多个sku');
            $table->string('key')->comment('打包品key')->unique();
            $table->integer('user_id')->comment('用户ID');
            $table->integer('shop_ip')->comment('店铺ID');
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
        Schema::dropIfExists('bale');
    }
}
