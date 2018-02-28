<?php

namespace App\Http\Controllers\Api;

use Illuminate\Support\Facades\Auth;

class ApiUserController extends ApiBaseController
{
    public function info()
    {
        $user = Auth::guard('api')->user();
        $output = ['roles' => ['admin'], 'name' => $user->email, 'code' => 0, 'msg' => '获取成功'];
        return $this->output($output);
    }

    public function test()
    {
        $config = config('passport.default');
        $query = http_build_query([
            'client_id' => $config['client_id'],
//            'redirect_uri' => 'http://www.project.cc/callback',
            'response_type' => 'code',
//            'scope' => '',
        ]);
        return redirect('/oauth/authorize?' . $query);
    }
}
