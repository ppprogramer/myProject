<?php

namespace App\Models\WeChat;

use Illuminate\Foundation\Auth\User as Authenticatable;

class WeChatMiniUsers extends Authenticatable
{
    protected $table = 'wx_mini_users';

    protected $fillable = ['openid', 'nickname', 'gender', 'language', 'city', 'province', 'country', 'avatarUrl', 'create_timestamp'];
}
