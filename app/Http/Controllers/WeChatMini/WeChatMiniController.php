<?php

namespace App\Http\Controllers\WeChatMini;

use App\Http\Controllers\Controller;
use App\Models\WeChat\WeChatMiniUsers;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Auth;

class WeChatMiniController extends Controller
{
    public function cookie()
    {
        return ['code' => 0, 'msg' => '获取成功'];
    }

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
        if (!empty($result['errcode'])) {
            logger('App\Http\Controllers\WeChatMini login', ['data' => $result]);
            return ['code' => -1, 'msg' => '登陆失败！'];
        }
        $user = WeChatMiniUsers::where('openid', $result['openid'])->first();
        if (!$user) {
            $user = WeChatMiniUsers::create([
                'openid' => $result['openid'],
                'create_timestamp' => time()
            ]);
        }
        Auth::guard('wx')->login($user);
        $data = ["openid" => $result['openid'], "session_key" => $result['session_key']];
        session(['3rd_session' => $data]);
        return ['code' => 0, 'msg' => '登陆成功！'];
    }

    public function banner()
    {
        return ['code' => 0, 'msg' => '请求成功！'];
    }
}
