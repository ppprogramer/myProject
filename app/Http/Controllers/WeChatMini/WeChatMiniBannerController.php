<?php

namespace App\Http\Controllers\WeChatMini;

use App\Http\Controllers\Controller;
use App\Models\RollPicture;

class WeChatMiniBannerController extends Controller
{
    public function bannerList()
    {
        $list = RollPicture::select(['name'])->orderBy('id', 'desc')->limit(5)->get();
        foreach ($list as $item) {
            $item->name = "/uploads/$item->name";
        }
        return ['list' => $list, 'code' => 0, 'msg' => '获取成功'];
    }
}
