<?php

namespace App\Console\Commands\WeChat;

use Illuminate\Console\Command;

class Menu extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'wechat_menu{action}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $action = $this->argument('action');
        $app = app('wechat.official_account');
        if ($action == 'create') {
            $buttons = [
                [
                    "type" => "click",
                    "name" => "今日歌曲",
                    "key" => "V1001_TODAY_MUSIC"
                ],
                [
                    "name" => "菜单",
                    "sub_button" => [
                        [
                            "type" => "view",
                            "name" => "搜索",
                            "url" => "http://www.soso.com/"
                        ],
                        [
                            "type" => "view",
                            "name" => "视频",
                            "url" => "http://v.qq.com/"
                        ],
                        [
                            "type" => "click",
                            "name" => "赞一下我们",
                            "key" => "V1001_GOOD"
                        ],
                    ],
                ],
            ];
            $app->menu->create($buttons);
        } else if ($action == 'delete') {
            $app->menu->delete();
        }
    }
}
