<?php

namespace App\Providers;

use App\Services\WeChat\WeChatMIniService;
use Illuminate\Support\ServiceProvider;
use Laravel\Passport\Passport;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('weChatMiniService', function () {
            return new WeChatMIniService(env('WECHAT_MINI_PROGRAM_APPID'), env('WECHAT_MINI_PROGRAM_SECRET'));
        });
        Passport::ignoreMigrations();
    }
}
