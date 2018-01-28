<?php

namespace App\Http\Controllers\WeChatMini;

use App\Http\Controllers\Controller;
use App\Models\RollPicture;

class WeChatMiniBannerController extends Controller
{
    public function bannerList()
    {
        $list = RollPicture::select(['name', 'id'])->orderBy('id', 'desc')->limit(5)->get();
        $domain = 'http://' . request()->server('HTTP_HOST');
        foreach ($list as $item) {
            $item->name = $domain . "/uploads/$item->name";
        }
        return ['list' => $list->toArray(), 'code' => 0, 'msg' => '获取成功'];
    }
}
