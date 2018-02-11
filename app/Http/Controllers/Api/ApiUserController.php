<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ApiUserController extends Controller
{
    public function index()
    {
        $user = Auth::guard('api')->user();
        return ['data' => $user, 'code' => 0, 'msg' => '获取成功'];
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
