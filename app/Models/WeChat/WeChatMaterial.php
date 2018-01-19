<?php

namespace App\Models\WeChat;

use Illuminate\Database\Eloquent\Model;

class WeChatMaterial extends Model
{
    protected $table = 'wx_material';

    protected $fillable = ['media_id', 'type', 'create_timestamp', 'name', 'url', 'status'];
}
