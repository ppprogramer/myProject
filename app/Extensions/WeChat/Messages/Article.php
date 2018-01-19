<?php

/*
 * This file is part of the overtrue/wechat.
 *
 * (c) overtrue <i@overtrue.me>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace App\Extensions\Messages;

use EasyWeChat\Kernel\Messages\Article as EasyArticle;

/**
 * Class Article.
 */
class Article extends EasyArticle
{
    /**
     * @var string
     */
    protected $type = 'mpnews';

    /**
     * Properties.
     *
     * @var array
     */
    protected $properties = [
        'thumb_media_id',
        'author',
        'title',
        'content',
        'digest',
        'source_url',
        'show_cover',
        'open_comment',         //（新增字段）是否打开评论，0不打开，1打开
        "can_comment"           //（新增字段）是否粉丝才可评论，0所有人可评论，1粉丝才可评论
    ];

    /**
     * Aliases of attribute.
     *
     * @var array
     */
    protected $jsonAliases = [
        'content_source_url' => 'source_url',
        'show_cover_pic' => 'show_cover',
        'need_open_comment' => 'open_comment',
        'nly_fans_can_comment' => 'can_comment',
    ];
}
