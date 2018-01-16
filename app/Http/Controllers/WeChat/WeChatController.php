<?php

namespace App\Http\Controllers\WeChat;

use App\Http\Controllers\Controller;
use GuzzleHttp\Client;

class WeChatController extends Controller
{
    protected $access_token;

    public function serve()
    {
        $app = app('wechat.official_account');
        $app->server->push(function($message){
            return "欢迎关注 overtrue！";
        });

        return $app->server->serve();
//        if (session()->has('access_token')) {
//            $this->access_token = session()->get('access_token');
//        } else {
//
//        }
//        header('Content-type:text');
//        if (isset($_GET['echostr'])) {
//            $this->valid();
//        } else {
//            $this->responseMsg();
//        }
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
