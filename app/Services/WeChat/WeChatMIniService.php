<?php
namespace App\Services\WeChat;

use GuzzleHttp\Client;

class WeChatMIniService
{
    protected $appId;

    protected $secret;

    protected $client;

    public function __construct($appId, $secret)
    {
        $this->appId = $appId;
        $this->secret = $secret;
        $this->client = new Client();
    }

    public function getOpenId($code)
    {
        $url = "https://api.weixin.qq.com/sns/jscode2session?appid=$this->appId&secret=$this->secret&js_code=$code&grant_type=authorization_code";
        try {
            $res = $this->client->get($url);
        } catch (\Exception $e) {
            logger('App\Services\WeChat\WeChatMIniService getOpenId', ['msg' => $e->getMessage()]);
        }
        return json_decode($res->getBody(), true);
    }
}