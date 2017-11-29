<style>
    /*
            author :前端一枚  努力学习中 qq：815183231;
    */

    /*简单粗暴重置默认样式===============================*/
    * {
        margin: 0;
        padding: 0;
    }

    img {
        border: 0;
    }

    ul, li {
        list-style-type: none;
    }

    a {
        color: #00007F;
        text-decoration: none;
    }

    a:hover {
        color: #bd0a01;
        text-decoration: underline;
    }

    .treebox {
        width: 200px;
        margin: 0 auto;
        background-color: #1a6cb9;
    }

    .menu {
        overflow: hidden;
        border-color: #ddd;
        border-style: solid;
        border-width: 0 1px 1px;
    }

    /*第一层*/
    .menu li.level1 > a {
        display: block;
        height: 45px;
        line-height: 45px;
        color: #fff;
        padding-left: 50px;
        border-bottom: 1px solid #1a6cb9;
        font-size: 16px;
        position: relative;
        transition: all .5s ease 0s;
    }

    .menu li.level1 a:hover {
        text-decoration: none;
        background-color: #326ea5;
    }

    .menu li.level1 a.current {
        background: #0f4679;
    }

    /*============修饰图标*/
    .ico {
        width: 20px;
        height: 20px;
        display: block;
        position: absolute;
        left: 20px;
        top: 10px;
        background-repeat: no-repeat;
        background-image: url(/web/admin/img/ico1.png);
    }

    /*============小箭头*/
    .level1 i {
        width: 20px;
        height: 10px;
        background-image: url(/web/admin/img/arrow.png);
        background-repeat: no-repeat;
        display: block;
        position: absolute;
        right: 20px;
        top: 20px;
    }

    .level1 li div p.trilateral {
        width: 0;
        height: 0;
        border-top: 6px solid transparent;
        border-left: 6px solid #cccccc;
        border-bottom: 6px solid transparent;
        margin: 15px 10px;
    }

    .level2 div {
        height: 45px;
        float: right;
    }

    .level1 i.down {
        background-position: 0 -10px;
    }

    .ico1 {
        background-position: 0 0;
    }

    .ico2 {
        background-position: 0 -20px;
    }

    .ico3 {
        background-position: 0 -40px;
    }

    .ico4 {
        background-position: 0 -60px;
    }

    .ico5 {
        background-position: 0 -80px;
    }

    /*第二层*/
    .menu li ul {
        overflow: hidden;
    }

    .menu li ul.level2 {
        display: none;
        background: #0f4679;
    }

    .menu li ul.level2 li a {
        display: block;
        width: auto;
        height: 45px;
        line-height: 45px;
        color: #fff;
        text-indent: 20px;
        /*border-bottom: 1px solid #ddd; */
        font-size: 14px;
        transition: all 1s ease 0s;
    }

    .first {
        overflow-y: scroll;
        width: 220px;
        height: 400px;
        float: left;
    }

    .second {
        overflow-y: scroll;
        width: 220px;
        height: 400px;
        background-color: #00a7d0;
        float: left;
        margin-left: 10px;
    }

</style>
<div class="first">
    <div class="treebox">
        <ul class="menu">
            <li class="level1">
                <a href="#none" class="current"><em class="ico ico1"></em>导航一<i class="down"></i></a>
                <ul class="level2" style="display: block">
                    <li>
                        <a href="javascript:;">导航选项
                            <div><p class="trilateral"></p></div>
                        </a>

                    </li>
                    <li><a href="javascript:;">导航选项<div><p class="trilateral"></p></div></a></li>
                    <li><a href="javascript:;">导航选项</a></li>
                    <li><a href="javascript:;">导航选项</a></li>
                </ul>
            </li>
            <li class="level1">
                <a href="#none"><em class="ico ico2"></em>导航一<i></i></a>
                <ul class="level2">
                    <li><a href="javascript:;">导航选项</a></li>
                    <li><a href="javascript:;">导航选项</a></li>
                    <li><a href="javascript:;">导航选项</a></li>
                    <li><a href="javascript:;">导航选项</a></li>
                </ul>
            </li>
            <li class="level1">
                <a href="#none"><em class="ico ico3"></em>导航一<i></i></a>
                <ul class="level2">
                    <li><a href="javascript:;">导航选项</a></li>
                    <li><a href="javascript:;">导航选项</a></li>
                    <li><a href="javascript:;">导航选项</a></li>
                    <li><a href="javascript:;">导航选项</a></li>
                </ul>
            </li>
            <li class="level1">
                <a href="#none"><em class="ico ico4"></em>导航一<i></i></a>
                <ul class="level2">
                    <li><a href="javascript:;">导航选项</a></li>
                    <li><a href="javascript:;">导航选项</a></li>
                    <li><a href="javascript:;">导航选项</a></li>
                    <li><a href="javascript:;">导航选项</a></li>
                </ul>
            </li>
            <li class="level1">
                <a href="#none"><em class="ico ico5"></em>导航一<i></i></a>
                <ul class="level2">
                    <li><a href="javascript:;">导航选项</a></li>
                    <li><a href="javascript:;">导航选项</a></li>
                    <li><a href="javascript:;">导航选项</a></li>
                    <li><a href="javascript:;">导航选项</a></li>
                </ul>
            </li>
        </ul>
    </div>
</div>
<div class="second">

</div>
<script src="{{ asset('/web/admin/plug/easing.js') }}"></script>
<script>
    //等待dom元素加载完毕.
    $(function () {
        $(".treebox .level1>a").click(function () {
            $(this).addClass('current')   //给当前元素添加"current"样式
                .find('i').addClass('down')   //小箭头向下样式
                .parent().next().slideDown('slow', 'easeOutQuad')  //下一个元素显示
                .parent().siblings().children('a').removeClass('current')//父元素的兄弟元素的子元素去除"current"样式
                .find('i').removeClass('down').parent().next().slideUp('slow', 'easeOutQuad');//隐藏
            return false; //阻止默认时间
        });
    })
</script>