<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRollPictureTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roll_picture', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->comment('图片名');
            $table->tinyInteger('status')->comment('状态 1 显示 0-隐藏');
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
        Schema::dropIfExists('roll_picture');
    }
}
