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
        if (!empty($result['errcode'])) {
            logger('App\Http\Controllers\WeChatMini login', ['data' => $result]);
            return ['code' => -1, 'msg' => '登陆失败！'];
        }
        $user = WeChatMiniUsers::where('openid', $result['openid'])->first();
        if (!$user) {
            WeChatMiniUsers::create([
                'openid' => $result['openid'],
                'create_timestamp' => time()
            ]);
        }
        $rd_session = $result['openid'] . "," . $result['session_key'];
        $pubKey = file_get_contents(storage_path('rsa/pub_key'));
        openssl_public_encrypt($rd_session, $encrypted, $pubKey);
        $encrypted = base64_encode($encrypted);
        session(['3rd_session' => $encrypted]);
        logger('token', ['data' => csrf_token()]);
        return ['rd_session' => $encrypted, 'code' => 0, 'msg' => '登陆成功！'];
    }
}
