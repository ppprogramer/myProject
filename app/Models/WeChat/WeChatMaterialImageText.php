<?php

namespace App\Models\WeChat;

use Illuminate\Database\Eloquent\Model;

class WeChatMaterialImageText extends Model
{
    protected $table = 'wx_material_image_text';

    protected $fillable = ['media_id', 'title', 'thumb_media_id', 'author', 'digest', 'show_cover_pic', 'content',
        'content_source_url', 'create_timestamp'];
}
