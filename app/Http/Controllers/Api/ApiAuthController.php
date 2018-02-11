<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class ApiAuthController extends Controller
{
    use  AuthenticatesUsers;

    public function __construct()
    {
        $this->middleware('api');
    }

    //调用认证接口获取授权码
    protected function authenticateClient(Request $request)
    {
        $credentials = $this->credentials($request);
        $config = config('passport.default');
        $request->request->add(
            [
                'grant_type'    =>      $config['grant_type'],
                'client_id'     =>      $config['client_id'],
                'client_secret' =>      $config['client_secret'],
                'username'      =>      $credentials[$this->username()],
                'password'      =>      $credentials['password'],
                'scope'         =>      $config['scope'],
            ]
        );
        $proxy = Request::create('oauth/token', 'POST');
        $response = Route::dispatch($proxy);
        return $response;
    }

    //以下为重写部分
    protected function authenticated(Request $request)
    {
        return $this->authenticateClient($request);
    }

    protected function sendLoginResponse(Request $request)
    {
        $this->clearLoginAttempts($request);

        return $this->authenticated($request);
    }

    protected function sendFailedLoginResponse(Request $request)
    {
        $msg = $request['errors'];
        $code = $request['code'];
        return $this->failed($msg, $code);
    }

    public function username()
    {
        return 'email';
    }

    //登录接口，调用了ApiController中一些其他函数succeed\failed，上文未提及，用于接口格式化输出
    public function login(Request $request)
    {
        $rules = [
            $this->username() => 'required',
            'password' => 'required',
        ];
        $this->validate($request, $rules);
        $credentials = $this->credentials($request);

        if ($this->guard('api')->attempt($credentials, $request->has('remember'))) {
            return $this->sendLoginResponse($request);
        }
        return ['code' => -1, 'msg' => '失败'];
    }
}

