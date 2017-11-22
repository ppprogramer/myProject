@extends('layouts.app')
@section('header')
    @include('layouts.header')
@endsection

@section('content')
    <div id="content">
        <div class="top_menu">
            <div class="top_menu_con">
                <div class="category-type">
                    <i class="iconfont icon-saoyisao"></i>
                    <div>商品分类</div>
                </div>
                <div class="top_menu_right">
                    <a href="#"><img src="{{ asset('web/img/tm_cs.png') }}"></a>
                    <a href="#"><img src="{{ asset('web/img/tm_gj.png') }}"></a>
                    <a href="#">天猫会员</a>
                    <a href="#">电器城</a>
                    <a href="#">喵鲜生</a>
                    <a href="#">医药馆</a>
                    <a href="#">营业厅</a>
                    <a href="#">魅力惠</a>
                    <a href="#">飞猪旅行</a>
                </div>
            </div>
        </div>
        <div class="pc_banner_wrapper">
            {{--导航--}}
            <div class="nav_menu">
                <div class="menu_list">
                    <ul class="normal-nav">
                        <li><i class="iconfont icon-yifu4"></i><a href="#">女装 /</a><a href="#">内衣</a></li>
                        <li><i class="iconfont icon-yifu6"></i><a href="#">男装 /</a><a href="#">户外运动</a></li>
                        <li><i class="iconfont icon-wode"></i><a href="#">女鞋 /</a><a href="#">男鞋 /</a><a href="#">女鞋</a>
                        </li>
                        <li><i class="iconfont icon-jiaju1"></i><a href="#">美妆 /</a><a href="#">个人护理</a></li>
                        <li><i class="iconfont icon-shouji5" aria-hidden="true"></i><a href="#">手机 /</a><a
                                    href="#">电脑</a></li>
                    </ul>
                </div>
                <div class="menu_child" id="menu_child">
                    <div class="panel_content">
                        <div class="panel_content_left">
                            <dl>
                                <dt><a href="#">电子书</a></dt>
                                <dd>
                                    <a href="#">免费</a> <a href="#">小说</a> <a href="#">励志与成功</a> <a href="#">婚恋/两性</a>
                                    <a href="#">文学</a> <a href="#">经管</a> <a href="#">畅读VIP</a>
                                    <a href="#">免费</a> <a href="#">小说</a> <a href="#">励志与成功</a> <a href="#">婚恋/两性</a>
                                    <a href="#">文学</a> <a href="#">经管</a> <a href="#">畅读VIP</a>
                                    <a href="#">免费</a> <a href="#">小说</a> <a href="#">励志与成功</a> <a href="#">婚恋/两性</a>
                                    <a href="#">文学</a> <a href="#">经管</a> <a href="#">畅读VIP</a>
                                </dd>
                            </dl>
                            <dl>
                                <dt><a href="#">数字音乐</a></dt>
                                <dd>
                                    <a href="#">通俗流行</a> <a href="#">古典音乐</a> <a href="#">摇滚说唱</a> <a href="#">爵士蓝调</a>
                                    <a href="#">乡村民谣</a> <a href="#">有声读物</a>
                                </dd>
                            </dl>
                            <dl>
                                <dt><a href="#">音像</a></dt>
                                <dd>
                                    <a href="#">音乐</a> <a href="#">影视</a> <a href="#">教育音像</a> <a href="#">游戏</a>
                                </dd>
                            </dl>
                            <dl>
                                <dt><a href="#">文艺</a></dt>
                                <dd>
                                    <a href="#">小说</a> <a href="#">文学</a> <a href="#">青春文学</a> <a href="#">传记</a> <a
                                            href="#">艺术</a>
                                </dd>
                            </dl>
                            <dl>
                                <dt><a href="#">人文社科</a></dt>
                                <dd>
                                    <a href="#">历史</a> <a href="#">心理学</a> <a href="#">政治/军事</a> <a href="#">国学/古籍</a>
                                    <a href="#">哲学/宗教</a> <a href="#">社会科学</a>
                                </dd>
                            </dl>
                            <dl>
                                <dt><a href="#">经管励志</a></dt>
                                <dd>
                                    <a href="#">经济</a> <a href="#">金融与投资</a> <a href="#">管理</a> <a href="#">励志与成功</a>
                                </dd>
                            </dl>
                            <dl class="fore7">
                                <dt><a href="#">生活</a></dt>
                                <dd>
                                    <a href="#">家教与育儿</a> <a href="#">旅游/地图</a> <a href="#">烹饪/美食</a> <a
                                            href="#">时尚/美妆</a>
                                    <a href="#">家居</a> <a href="#">婚恋与两性</a> <a href="#">娱乐/休闲</a> <a href="#">健身与保健</a>
                                    <a href="#">动漫/幽默</a> <a href="#">体育/运动</a>
                                </dd>
                            </dl>
                            <dl>
                                <dt><a href="#">科技</a></dt>
                                <dd>
                                    <a href="#">科普</a> <a href="#">IT</a> <a href="#">建筑</a> <a href="#">医学</a> <a
                                            href="#">
                                        工业技术</a> <a href="#">电子/通信</a> <a href="#">农林</a> <a href="#">科学与自然</a>
                                </dd>
                            </dl>
                            <dl>
                                <dt><a href="#">少儿</a></dt>
                                <dd>
                                    <a href="#">少儿</a> <a href="#">0-2岁</a> <a href="#">3-6岁</a> <a href="#">7-10岁</a>
                                    <a href="#">11-14岁</a>
                                </dd>
                            </dl>
                            <dl>
                                <dt><a href="#">教育</a></dt>
                                <dd>
                                    <a href="#">教材</a> <a href="#">中小学教辅</a> <a href="#">考试</a> <a href="#">外语学习</a>
                                </dd>
                            </dl>
                            <dl>
                                <dt><a href="#">其它</a></dt>
                                <dd>
                                    <a href="#">英文原版书</a> <a href="#">港台图书</a> <a href="#">工具书</a> <a href="#">套装书</a>
                                    <a href="#">杂志/期刊</a>
                                </dd>
                            </dl>
                        </div>
                        <div class="panel_content_right">
                            <div class="ad_con">

                            </div>
                        </div>
                    </div>
                    <div class="panel_content">2</div>
                    <div class="panel_content">3</div>
                    <div class="panel_content">4</div>
                    <div class="panel_content">5</div>
                </div>
            </div>
            {{--轮播--}}
            <div id="ad-carousel" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#ad-carousel" data-slide-to="0" class="active"></li>
                    <li data-target="#ad-carousel" data-slide-to="1"></li>
                    <li data-target="#ad-carousel" data-slide-to="2"></li>
                    <li data-target="#ad-carousel" data-slide-to="3"></li>
                    <li data-target="#ad-carousel" data-slide-to="4"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="item active">
                        @if(!empty($img[0]))
                            <img src="{{asset('/uploads/'.$img[0])}}" alt="1 slide">
                        @else
                            <img src="{{asset('web/img/chrome-big.jpg')}}" alt="1 slide">
                        @endif
                        <div class="container">
                            <div class="carousel-caption">
                                <h1>Chrome</h1>

                                <p>Google Chrome，又称Google浏览器，是一个由Google（谷歌）公司开发的网页浏览器。</p>

                                <p><a class="btn btn-lg btn-primary"
                                      href="http://www.google.cn/intl/zh-CN/chrome/browser/"
                                      role="button" target="_blank">点我下载</a></p>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        @if(!empty($img[1]))
                            <img src="{{asset('/uploads/'.$img[1])}}" alt="1 slide">
                        @else
                            <img src="{{asset('web/img/firefox-big.jpg')}}" alt="2 slide">
                        @endif
                        <div class="container">
                            <div class="carousel-caption">
                                <h1>Firefox</h1>

                                <p>Mozilla Firefox，中文名通常称为“火狐”或“火狐浏览器”，是一个开源网页浏览器。</p>

                                <p><a class="btn btn-lg btn-primary" href="http://www.firefox.com.cn/download/"
                                      target="_blank"
                                      role="button">点我下载</a></p>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        @if(!empty($img[2]))
                            <img src="{{asset('/uploads/'.$img[2])}}" alt="1 slide">
                        @else
                            <img src="{{asset('web/img/safari-big.jpg')}}" alt="3 slide">
                        @endif
                        <div class="container">
                            <div class="carousel-caption">
                                <h1>Safari</h1>

                                <p>Safari，是苹果计算机的最新操作系统Mac OS X中的浏览器。</p>

                                <p><a class="btn btn-lg btn-primary" href="http://www.apple.com/cn/safari/"
                                      target="_blank"
                                      role="button">点我下载</a></p>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        @if(!empty($img[3]))
                            <img src="{{asset('/uploads/'.$img[3])}}" alt="1 slide">
                        @else
                            <img src="{{asset('web/img/opera-big.jpg')}}" alt="4 slide">
                        @endif
                        <div class="container">
                            <div class="carousel-caption">
                                <h1>Opera</h1>

                                <p>Opera浏览器，是一款挪威Opera Software ASA公司制作的支持多页面标签式浏览的网络浏览器。</p>

                                <p><a class="btn btn-lg btn-primary" href="http://www.opera.com/zh-cn" target="_blank"
                                      role="button">点我下载</a></p>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        @if(!empty($img[4]))
                            <img src="{{asset('/uploads/'.$img[4])}}" alt="1 slide">
                        @else
                            <img src="{{asset('web/img/ie-big.jpg')}}" alt="5 slide">
                        @endif
                        <div class="container">
                            <div class="carousel-caption">
                                <h1>IE</h1>

                                <p>Internet Explorer，简称 IE，是微软公司推出的一款网页浏览器。</p>

                                <p><a class="btn btn-lg btn-primary" href="http://ie.microsoft.com/" target="_blank"
                                      role="button">点我下载</a></p>
                            </div>
                        </div>
                    </div>
                </div>
                <a class="left carousel-control" href="#ad-carousel" data-slide="prev"><span
                            class="glyphicon glyphicon-chevron-left"></span></a>
                <a class="right carousel-control" href="#ad-carousel" data-slide="next"><span
                            class="glyphicon glyphicon-chevron-right"></span></a>
            </div>
        </div>
        {{--section--}}
        <div id="section_a_title">
            <div class="section_a_title_left">
                <img src="{{ asset('web/img/section_a.png') }}">
            </div>
            <div class="section_a_title_right">
                <a href="#">进口食品</a>
                <a href="#">食品饮料</a>
                <a href="#">粮油副食</a>
                <a href="#">美容洗护</a>
                <a href="#">家居家电</a>
                <a href="#">家庭清洁</a>
                <a href="#">母婴用品</a>
                <a href="#">生鲜水果</a>
            </div>
        </div>
        <div id="section_a_con">
            <div class="section_a_con_1">
                <img src="{{ asset('web/img/ad/ad_sec_1.png') }}">
            </div>
            <div class="section_a_con_2">
                <div class="floor-item-content-wrap">1</div>
                <div class="floor-item-content-wrap">2</div>
                <div class="floor-item-content-wrap">3</div>
                <div class="floor-item-content-wrap">4</div>
                <div class="floor-item-content-wrap">5</div>
                <div class="floor-item-content-wrap">6</div>
                <div class="floor-item-content-wrap">7</div>
                <div class="floor-item-content-wrap">8</div>
            </div>
        </div>

        {{--section b--}}
        <div id="section_b_title">
            <div class="section_b_title_left">
                <img src="{{ asset('web/img/section_b.png') }}">
            </div>
            <div class="section_b_title_right">
                <a href="#">进口食品</a>
                <a href="#">食品饮料</a>
                <a href="#">粮油副食</a>
                <a href="#">美容洗护</a>
                <a href="#">家居家电</a>
                <a href="#">家庭清洁</a>
                <a href="#">母婴用品</a>
                <a href="#">生鲜水果</a>
            </div>
        </div>
        <div id="section_b_con">
            <div class="floor-item-content-wrap">1</div>
            <div class="floor-item-content-wrap">2</div>
            <div class="floor-item-content-wrap">3</div>
            <div class="floor-item-content-wrap">4</div>
            <div class="floor-item-content-wrap">5</div>
            <div class="floor-item-content-wrap">6</div>
            <div class="floor-item-content-wrap">7</div>
            <div class="floor-item-content-wrap">8</div>
            <div class="floor-item-content-wrap">9</div>
            <div class="floor-item-content-wrap">10</div>
        </div>
    </div>
    </div>{{--content结束div--}}

@endsection

@section('footer')
    {{--@include('layouts.footer')--}}
@endsection
@section('script')
    <script>
        var t = null;
        $(".menu_list ul li").each(function () {
            $(this).hover(function () {
                clearTimeout(t);
                var _this = $(this);
                var i = $(this).index();
                $(".menu_list ul li").css('background-color', "rgba(0, 0, 0, 0.27)");
                $(".menu_list ul li").find('a').css('color', "#ffffff");
                _this.css('background-color', '#ffffff');
                $(_this).find('a').css('color', 'red').css('font-weight', 'bold');
                $('.menu_child .panel_content').css('display', 'none');
                $('.menu_child .panel_content:eq(' + i + ')').css('display', 'block');
                $('.menu_child .panel_content:eq(' + i + ')').hover(function () {
                    clearTimeout(t);
                    _this.css('background-color', '#ffffff');
                    $(_this).find('a').css('color', 'red').css('font-weight', 'bold');
                    $('.menu_child .panel_content:eq(' + i + ')').css('display', 'block');
                }, function () {
                    clearTimeout(t);
                    t = setTimeout(function () {
                        $(_this).css('background-color', "rgba(0, 0, 0, 0.27)");
                        $(_this).find('a').css('color', '#ffffff').css('font-weight', 'bold');
                        $('.menu_child .panel_content:eq(' + i + ')').css('display', 'none');
                    }, 100);
                });
            }, function () {
                var _this = $(this);
                var i = $(this).index();
                t = setTimeout(function () {
                    _this.css('background-color', "rgba(0, 0, 0, 0.27)");
                    _this.find('a').css('color', "#ffffff");
                    $('.menu_child .panel_content:eq(' + i + ')').css('display', 'none');
                }, 100);
            });
        });
    </script>
@endsection