<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWxMiniUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wx_mini_users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('openid');
            $table->string('nickname')->nullable()->comment('昵称');
            $table->tinyInteger('gender')->nullable()->comment('1-男 2-女');
            $table->string('language')->nullable();
            $table->string('city')->nullable();
            $table->string('province')->nullable();
            $table->string('country')->nullable();
            $table->string('avatarUrl')->nullable()->comment('头像图片url');
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
        Schema::dropIfExists('wx_mini_users');
    }
}
