<?php

namespace App\Http\Controllers\WeChatMini;

use App\Http\Controllers\Controller;
use App\Models\Item;
use App\Models\RollPicture;

class WeChatMiniHomeController extends Controller
{
    public function banner()
    {
        $list = RollPicture::select(['name', 'id'])->orderBy('id', 'desc')->limit(5)->get();
        $domain = 'http://' . request()->server('HTTP_HOST');
        foreach ($list as $item) {
            $item->name = $domain . "/uploads/$item->name";
        }
        return ['list' => $list, 'code' => 0, 'msg' => '获取成功'];
    }

    public function categories()
    {
        $cateId = 4;            //服饰鞋包
        $list = Item::select(['id', 'name'])->where('pid', $cateId)->get();
        return ['list' => $list, 'code' => 0, 'msg' => '获取成功'];
    }
}
