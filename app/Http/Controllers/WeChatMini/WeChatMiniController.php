<?php

namespace App\Http\Controllers\WeChatMini;

use App\Http\Controllers\Controller;
use App\Models\WeChat\WeChatMiniUsers;
use GuzzleHttp\Client;

class WeChatMiniController extends Controller
{
    public function login()
    {
        $rules = [
            'code' => 'required'
        ];
        $this->validate(request(), $rules);
        $code = request('code');
        $appId = env('WECHAT_MINI_PROGRAM_APPID');
        $secret = env('WECHAT_MINI_PROGRAM_SECRET');
        $url = "https://api.weixin.qq.com/sns/jscode2session?appid=$appId&secret=$secret&js_code=$code&grant_type=authorization_code";
        $client = new Client();
        try {
            $res = $client->get($url);
        } catch (\Exception $e) {
            logger('App\Http\Controllers\WeChatMini login', ['msg' => $e->getTrace()]);
        }
        $result = json_decode($res->getBody(), true);
        logger('result', ['data' => $result]);
        if($result[''])
        $user = WeChatMiniUsers::where('openid', $result['openid'])->first();
        if (!$user) {
            WeChatMiniUsers::create([
                'openid' => $result['openid'],
                'create_timestamp' => time()
            ]);
        }
        $rd_session = $result['openid'] . "," . $result['session_key'];
        session(['3rd_session' => $rd_session]);
        return ['3rd_session' => $rd_session, 'code' => 0, 'msg' => '登陆成功！'];
    }
}
