<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWxUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wx_users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('openid');
            $table->string('nickname')->nullable()->comment('昵称');
            $table->tinyInteger('sex')->nullable()->comment('1-男 2-女');
            $table->string('language')->nullable();
            $table->string('city')->nullable();
            $table->string('province')->nullable();
            $table->string('country')->nullable();
            $table->string('headimgurl')->nullable()->comment('头像图片url');
            $table->string('remark')->nullable()->comment('备注');
            $table->integer('groupid')->default(0);
            $table->string('tagid_list')->nullable();
            $table->integer('create_timestamp');
            $table->tinyInteger('subscribe')->comment('订阅状态  1-订阅，0-取消');
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
        Schema::dropIfExists('wx_users');
    }
}
