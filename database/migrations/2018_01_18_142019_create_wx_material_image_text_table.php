<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWxMaterialImageTextTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wx_material_image_text', function (Blueprint $table) {
            $table->increments('id');
            $table->string('media_id')->nullable();
            $table->string('title');
            $table->string('thumb_media_id')->comment('图文消息的封面图片素材id（必须是永久mediaID）');
            $table->string('author')->nullable();
            $table->string('digest')->nullable()->comment('图文消息的摘要，仅有单图文消息才有摘要，多图文此处为空。如果本字段为没有填写，则默认抓取正文前64个字。');
            $table->tinyInteger('show_cover_pic')->default(1)->comment('是否显示封面，0为false，即不显示，1为true，即显示');
            $table->text('content');
            $table->string('content_source_url')->comment('图文消息的原文地址，即点击“阅读原文”后的URL');
            $table->integer('create_timestamp')->nullable();
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
        Schema::dropIfExists('wx_material_image_text');
    }
}
