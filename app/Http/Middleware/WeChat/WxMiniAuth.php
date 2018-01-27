<?php

namespace App\Http\Middleware\WeChat;

use Closure;
use Illuminate\Support\Facades\Auth;

class WxMiniAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (!Auth::check()) {
            return ['code' => 10010, 'msg' => '用户未认证'];
        }
        return $next($request);
    }
}
