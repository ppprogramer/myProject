<?php

namespace App\Http\Controllers\WeChatMini;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class WeChatMiniController extends Controller
{
    public function login()
    {
        logger('wechat mini login');
        return 'yes';
    }

}
