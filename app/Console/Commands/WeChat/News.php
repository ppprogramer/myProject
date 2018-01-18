<?php

namespace App\Console\Commands\WeChat;

use App\Models\WeChat\WeChatMaterialImageText;
use App\Models\WeChat\WeChatUsers;
use Illuminate\Console\Command;

class News extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'news';

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
        $app = app('wechat.official_account');
        $materialImageText = WeChatMaterialImageText::orderBy('id', 'desc')->first();
        $weChatUser = WeChatUsers::where('subscribe', 1)->get();
        foreach ($weChatUser as $item) {
            if ($materialImageText)
                $app->broadcasting->previewNews($materialImageText->media_id, $item->openid);
        }
    }
}
