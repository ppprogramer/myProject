<?php
namespace App\Services\WeChat;

use App\Models\WeChat\WeChatMaterial;
use App\Models\WeChat\WeChatUsers;
use EasyWeChat\Kernel\Messages\Image;
use EasyWeChat\Kernel\Messages\News;
use EasyWeChat\Kernel\Messages\NewsItem;

class WeChatService
{
    protected $app;

    protected $message;

    protected $openId;

    public function __construct($app, $message)
    {
        $this->app = $app;
        $this->message = $message;
    }

    public function __call($name, $arg)
    {
        return "欢迎关注 overtrue！";
    }


    protected function text()
    {
        $content = $this->message['Content'];
        if ($content == "图片") {
            $material = WeChatMaterial::first();
            if ($material) return new Image($material->media_id);
        } else if ($content == "本台消息") {
            $title = '听说lz又要艹浦勇酱小嘴';
            $material = WeChatMaterial::first();
            $image = $material->url;
            $items = [
                new NewsItem([
                    'title' => $title,
                    'description' => '抱元守一。守一是道家早期修炼方术之一，其侧重点不在炼形而是炼神，通过它排除心中杂念，保持心神清静，其主旨为守持人之精、气、神，使之不内耗，不外逸，长期...',
                    'url' => 'tmall.utaer.com',
                    'image' => "pgHx73CjDlGZxYL7eeZz5UwPSWuMtvxoN_MnnwmwIEg",
                ]),
                new NewsItem([
                    'title' => "title2",
                    'description' => '图文消息的封面图片素材id（必须是永久mediaID）
- digest 图文消息的摘要，仅有单图文消息才有摘要，多图文此处为空',
                    'url' => 'tmall.utaer.com',
                    'image' => "pgHx73CjDlGZxYL7eeZz5RBB6XOh2vG31WJZNsHBfyU",
                ]),
                new NewsItem([
                    'title' => 'title3',
                    'description' => '是否显示封面，0 为 false，即不显示，1 为 true，即显示',
                    'url' => 'tmall.utaer.com',
                    'image' => "pgHx73CjDlGZxYL7eeZz5TrS7UopIAlq_WtO6kJuQDc",
                ]),
            ];
            $news = new News($items);
            return $news;
        }
        return '收到文字消息';
    }

    protected function event()
    {
        $event = $this->message['Event'];
        switch ($event) {
            case 'subscribe':           //关注事件
                $wx_user = WeChatUsers::where('openid', $this->openId)->first();
                //判断用户是否存在
                if ($wx_user) {
                    //如果为取消关注状态，则设为关注状态
                    if ($wx_user->subscribe == 0) $wx_user->update(['subscribe' => 1]);
                } else {
                    //获取用户基础信息
                    $user = $this->app->user->get($this->openId);
                    $user = array_filter($user);
                    $user['create_timestamp'] = time();
                    WeChatUsers::create($user);
                }
                return '欢迎关注蛤蛤！';
                break;
            case 'unsubscribe':         //取关事件
                WeChatUsers::where('openid', $this->openId)->update(['subscribe' => 0]);
                break;
            case 'CLICK':
                if (!empty($event) && $this->message['EventKey'] == 'V1001_TODAY_MUSIC') {
                    return '你点击今日歌曲';
                }
                break;
            default :
                return '事件正在开发中..';
                break;
        }
    }

    protected function image()
    {
        return '收到图片消息';
    }

    protected function voice()
    {
        return '收到语音消息';
    }

    protected function video()
    {
        return '收到视频消息';
    }

    protected function location()
    {
        return '收到坐标消息';
    }

    protected function link()
    {
        return '收到链接消息';
    }

    public function entry()
    {
        $this->openId = $this->message['FromUserName'];
        $method = $this->message['MsgType'];
        return $this->$method();
    }
}