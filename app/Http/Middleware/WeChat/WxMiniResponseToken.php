<?php

namespace App\Http\Middleware\WeChat;

use Closure;
use Illuminate\Http\Response;

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
            if ($response instanceof Response) {
                $content = $response->original;
            }
            if (is_null($content)) {
                $content = [];
            }
            logger('array', ['data' => $content]);
            if (!is_array($content)) $content->toArray();
            !isset($content['token']) && $content['token'] = csrf_token();
            $response = $response->setContent($content);
        }
        return $response;
    }
}
