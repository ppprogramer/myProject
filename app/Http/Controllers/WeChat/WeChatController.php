<?php

namespace App\Http\Controllers\WeChat;

use App\Http\Controllers\Controller;
use App\Models\WeChat\WeChatMaterial;
use App\Models\WeChat\WeChatUsers;
use GuzzleHttp\Client;

class WeChatController extends Controller
{
    public function serve()
    {
        $app = app('wechat.official_account');
        $app->server->push(function ($message) use ($app) {
            logger('ce', ['data' => $message]);
            switch ($message['MsgType']) {
                case 'event':
                    $openId = $message['FromUserName'];
                    switch ($message['Event']) {
                        case 'subscribe':           //关注事件
                            $wx_user = WeChatUsers::where('openid', $openId)->first();
                            //判断用户是否存在
                            if ($wx_user) {
                                //如果为取消关注状态，则设为关注状态
                                if ($wx_user->subscribe == 1) $wx_user->update(['subscribe' => 0]);
                            } else {
                                //否则，记录用户
                                $user = $app->user->get($message['FromUserName']);
                                $user = array_filter($user);
                                $user['create_timestamp'] = time();
                                WeChatUsers::create($user);
                                return '欢迎关注蛤蛤！';
                            }
                            break;
                        case 'unsubscribe':         //取关事件
                            WeChatUsers::where('openid', $openId)->update(['subscribe' => 0]);
                            break;
                        case 'CLICK':
                            if (!empty($message['EventKey']) && $message['EventKey'] == 'V1001_TODAY_MUSIC') {
                                return '你点击今日歌曲';
                            }
                            break;
                    }
                    return '收到事件消息';
                    break;
                case 'text':
                    if ($message['Content'] == "图片") {
                        $material = WeChatMaterial::first();
                        if ($material) $app->broadcasting->sendImage($material->media_id);
                    }
                    return '收到文字消息';
                    break;
                case 'image':
                    return '收到图片消息';
                    break;
                case 'voice':
                    return '收到语音消息';
                    break;
                case 'video':
                    return '收到视频消息';
                    break;
                case 'location':
                    return '收到坐标消息';
                    break;
                case 'link':
                    return '收到链接消息';
                    break;
                // ... 其它消息
                default:
                    return "欢迎关注 overtrue！";
                    break;
            }
        });
        return $app->server->serve();
    }

    public function valid()
    {
        $echoStr = $_GET["echostr"];
        if ($this->checkSignature()) {
            header('content-type:text');
            echo $echoStr;
            exit;
        }
    }

    private function checkSignature()
    {
        $signature = $_GET["signature"];
        $timestamp = $_GET["timestamp"];
        $nonce = $_GET["nonce"];

        $token = env('WECHAT_OFFICIAL_ACCOUNT_TOKEN');
        $tmpArr = array($token, $timestamp, $nonce);
        sort($tmpArr, SORT_STRING);
        $tmpStr = implode($tmpArr);
        $tmpStr = sha1($tmpStr);

        if ($tmpStr == $signature) {
            return true;
        } else {
            return false;
        }
    }

    public function responseMsg()
    {
        $postStr = isset($GLOBALS['HTTP_RAW_POST_DATA']) ? $GLOBALS['HTTP_RAW_POST_DATA'] : file_get_contents("php://input");

        if (!empty($postStr)) {
            $postObj = simplexml_load_string($postStr, 'SimpleXMLElement', LIBXML_NOCDATA);
            $fromUsername = $postObj->FromUserName;
            $toUsername = $postObj->ToUserName;
            $keyword = trim($postObj->Content);
            $time = time();
            $textTpl = "<xml>
                        <ToUserName><![CDATA[%s]]></ToUserName>
                        <FromUserName><![CDATA[%s]]></FromUserName>
                        <CreateTime>%s</CreateTime>
                        <MsgType><![CDATA[%s]]></MsgType>
                        <Content><![CDATA[%s]]></Content>
                        <FuncFlag>0</FuncFlag>
                        </xml>";

            if ($keyword == "?" || $keyword == "？") {
                $msgType = "text";
                $contentStr = date("Y-m-d H:i:s", time());
                $resultStr = sprintf($textTpl, $fromUsername, $toUsername, $time, $msgType, $contentStr);
                echo $resultStr;
            }
        } else {
            echo "";
            exit;
        }
    }

    public function getAccessToken()
    {
        $appId = env('WECHAT_OFFICIAL_ACCOUNT_APPID');
        $secret = env('WECHAT_OFFICIAL_ACCOUNT_SECRET');
        $url = "https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=$appId&secret=$secret";
        $client = new Client();
//        $result =
    }
}
