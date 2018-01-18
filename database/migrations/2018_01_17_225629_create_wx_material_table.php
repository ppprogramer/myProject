<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWxMaterialTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wx_material', function (Blueprint $table) {
            $table->increments('id');
            $table->string('media_id')->nullable();
            $table->tinyInteger('type')->comment('素材类型')->nullable();
            $table->string('name')->nullable();
            $table->string('url')->nullable();
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
        Schema::dropIfExists('wx_material');
    }
}
