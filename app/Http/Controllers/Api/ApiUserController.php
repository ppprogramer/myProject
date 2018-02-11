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
}
