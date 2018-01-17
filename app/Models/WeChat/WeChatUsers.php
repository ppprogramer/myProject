<?php

namespace App\Models\WeChat;

use Illuminate\Database\Eloquent\Model;

class WeChatUsers extends Model
{
    protected $table = 'wx_users';

    protected $fillable = ['openid', 'nickname', 'sex', 'language', 'city', 'province', 'country', 'headimgurl',
        'remark,', 'groupid', 'tagid_list', 'create_timestamp', 'subscribe'];
}
