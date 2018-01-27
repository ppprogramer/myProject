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
        if (strstr(request()->route()->getPrefix(), 'wechatMini')) {
            logger('array', ['data' => $content]);
            if (!is_array($content)) $content->toArray();
            !isset($content['token']) && $content['token'] = csrf_token();
            $response = $response->setContent($content);
        }
        return $response;
    }
}
