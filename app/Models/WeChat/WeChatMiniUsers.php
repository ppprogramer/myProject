<?php

namespace App\Models\WeChat;

use Illuminate\Database\Eloquent\Model;

class WeChatMiniUsers extends Model
{
    protected $table = 'wx_mini_users';

    protected $fillable = ['openid', 'nickname', 'gender', 'language', 'city', 'province', 'country', 'avatarUrl', 'create_timestamp'];
}
