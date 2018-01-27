<?php

namespace App\Http\Middleware\WeChat;

use Closure;

class WxMiniResponseToken
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
        $content = $response = $next($request);
        !isset($content['token']) && $content['token'] = csrf_token();
        $response = $response->setContent($content);
        return $response;
    }
}
