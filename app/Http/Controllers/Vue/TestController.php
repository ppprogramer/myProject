<?php

namespace App\Http\Controllers\Vue;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TestController extends Controller
{
    public function index()
    {
        $name = request('username');
        $pass = request('password');
        return ['token' => csrf_token(), 'code' => 0, 'msg' => '登录成功!', 'name' => $name, 'pass' => $pass];
    }
}
