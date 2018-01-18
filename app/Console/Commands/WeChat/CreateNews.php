<?php

namespace App\Console\Commands\WeChat;

use App\Models\WeChat\WeChatMaterialImageText;
use EasyWeChat\Kernel\Messages\Article;
use Illuminate\Console\Command;

class CreateNews extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create_news';

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
        $article2 = new Article([
            'title' => 'title1',
            'thumb_media_id' => 'pgHx73CjDlGZxYL7eeZz5UdKRSzPysqiJxLLXdFKjTk',
            'author' => 'cw',
            'digest' => '惜纸蒙尘弃权名厚禄，案牍劳',
            'show_cover' => 1,
            'content' => '著名书画家、摄影家、鉴藏家、诗人张山 　　张山字新志，斋号涵虚堂。著名书画家、摄影家、鉴藏家、诗人。现任中国书协鉴定评估委员、理事；中国美协陕西创作中心副秘书长；陕西省书协驻会副主席；省文联委员、副秘书长；陕西省文史馆馆员；陕西长城书画院院长；华西大学教授、西安工业大学特聘教授。被文化部评为全国“德艺双馨”书画家，2007年“影响力人物”；2008年奥林匹克美术大会，国画《青山依旧在，山高水又长》、诗书《圣火点燃世人情》获特等奖。 凤翔灵秀荫沟南张氏，书香雅和承祖辈贤德；　　 绳笔泥墨书少年心志，从军修正继初心不失；　　 惜纸蒙尘弃权名厚禄，案牍劳形振书协之风；　　 无心逐誉既功名加身，习古研帖叹知路修远。 　　第一次见张山先生的字，是他在省残联书画摄影作品展上的签名，一个“山”字写得像自然里拍下的景色一样，山底敦厚踏实，山峰灵秀豪迈。不知此“山”和他引以为豪的雍山有没有一点关联。又或许，家乡的美丽质朴和祖辈的贤德智慧早就融入了他的血液，随着他的足迹和笔划不断流淌蔓延。',
            'source_url' => 'http://tmall.utaer.com',
        ]);
        $data1 = [
            'title' => 'title1',
            'thumb_media_id' => 'pgHx73CjDlGZxYL7eeZz5UwPSWuMtvxoN_MnnwmwIEg',
            'author' => 'cw',
            'digest' => '惜纸蒙尘弃权名厚禄，案牍劳',
            'show_cover' => 1,
            'content' => '著名书画家、摄影家、鉴藏家、诗人张山 　　张山字新志，斋号涵虚堂。著名书画家、摄影家、鉴藏家、诗人。现任中国书协鉴定评估委员、理事；中国美协陕西创作中心副秘书长；陕西省书协驻会副主席；省文联委员、副秘书长；陕西省文史馆馆员；陕西长城书画院院长；华西大学教授、西安工业大学特聘教授。被文化部评为全国“德艺双馨”书画家，2007年“影响力人物”；2008年奥林匹克美术大会，国画《青山依旧在，山高水又长》、诗书《圣火点燃世人情》获特等奖。 凤翔灵秀荫沟南张氏，书香雅和承祖辈贤德；　　 绳笔泥墨书少年心志，从军修正继初心不失；　　 惜纸蒙尘弃权名厚禄，案牍劳形振书协之风；　　 无心逐誉既功名加身，习古研帖叹知路修远。 　　第一次见张山先生的字，是他在省残联书画摄影作品展上的签名，一个“山”字写得像自然里拍下的景色一样，山底敦厚踏实，山峰灵秀豪迈。不知此“山”和他引以为豪的雍山有没有一点关联。又或许，家乡的美丽质朴和祖辈的贤德智慧早就融入了他的血液，随着他的足迹和笔划不断流淌蔓延。',
            'source_url' => 'http://tmall.utaer.com',
        ];
        $article1 = new Article($data1);

        $article3 = new Article([
            'title' => 'title1',
            'thumb_media_id' => 'pgHx73CjDlGZxYL7eeZz5RBB6XOh2vG31WJZNsHBfyU',
            'author' => 'cw',
            'digest' => '影家、鉴藏家、诗人张山 　　张山字',
            'show_cover' => 1,
            'content' => '微信公众平台是运营者通过公众号为微信用户提供资讯和服务的平台，而公众平台开发接口则是提供服务的基础，开发者在公众平台网站中创建公众号、获取接口权限后，可以通过阅读本接口文档来帮助开发。

为了识别用户，每个用户针对每个公众号会产生一个安全的OpenID，如果需要在多公众号、移动应用之间做用户共通，则需前往微信开放平台，将这些公众号和应用绑定到一个开放平台账号下，绑定后，一个用户虽然对多个公众号和应用有多个不同的OpenID，但他对所有这些同一开放平台账号下的公众号和应用，只有一个UnionID，可以在用户管理-获取用户基本信息（UnionID机制）文档了解详情。

请开发者注意：

1、微信公众平台开发是指为微信公众号进行业务开发，为移动应用、PC端网站、公众号第三方平台（为各行各业公众号运营者提供服务）的开发，请前往微信开放平台接入。

2、在申请到认证公众号之前，你可以先通过测试号申请系统，快速申请一个接口测试号，立即开始接口测试开发。 3、在开发过程中，可以使用接口调试工具来在线调试某些接口。

4、每个接口都有每日接口调用频次限制，可以在公众平台官网-开发者中心处查看具体频次。 5、在开发出现问题时，可以通过接口调用的返回码，以及报警排查指引（在公众平台官网-开发者中心处可以设置接口报警），来发现和解决问题。

6、公众平台以access_token为接口调用凭据，来调用接口，所有接口的调用需要先获取access_token，access_token在2小时内有效，过期需要重新获取，但1天内获取次数有限，开发者需自行存储，详见获取接口调用凭据（access_token）文档。

7、公众平台接口调用仅支持80端口。

公众号主要通过公众号消息会话和公众号内网页来为用户提供服务的，下面分',
            'source_url' => 'http://tmall.utaer.com',
        ]);
        $result = $app->material->uploadArticle([$article1, $article2, $article3]);
        $data1['show_cover_pic'] = $data1['show_cover'];
        unset($data1['show_cover']);
        $data1['content_source_url'] = $data1['source_url'];
        unset($data1['source_url']);
        $data1['media_id'] = $result['media_id'];
        WeChatMaterialImageText::create($article1);
    }


}
