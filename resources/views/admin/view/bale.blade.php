<div class="menu_list">
    <div class="first">
        <dl class="list_dl">
            <dt class="list_dt" id="open">
                <span class="_after"></span>
            <p>选择器</p>
            <i class="list_dt_icon"></i>
            </dt>
            <dd class="list_dd" style="display: block">
                <ul>
                    <li class="list_li">#id</li>
                    <li class="list_li">element</li>
                    <li class="list_li">.class</li>
                    <li class="list_li">*</li>
                </ul>
            </dd>
            <dt class="list_dt">
                <span class="_after"></span>
            <p>属性</p>
            <i class="list_dt_icon"></i>
            </dt>
            <dd class="list_dd">
                <ul>
                    <li class="list_li">attr</li>
                    <li class="list_li">removeAttr</li>
                    <li class="list_li">prop</li>
                    <li class="list_li">removeProp</li>
                    <li class="list_li">addClass</li>
                    <li class="list_li">removeClass</li>
                </ul>
            </dd>
            <dt class="list_dt">
                <span class="_after"></span>
                <p>文档处理</p>
                <i class="list_dt_icon"></i>
            </dt>
            <dd class="list_dd">
                <ul>
                    <li class="list_li">append</li>
                    <li class="list_li">appendTo</li>
                    <li class="list_li">prepend</li>
                    <li class="list_li">prependTo</li>
                    <li class="list_li">after</li>
                    <li class="list_li">before</li>
                </ul>
            </dd>
            <dt class="list_dt">
                <span class="_after"></span>
            <p>事件</p>
            <i class="list_dt_icon"></i>
            </dt>
            <dd class="list_dd">
                <ul>
                    <li class="list_li">ready</li>
                    <li class="list_li">on</li>
                    <li class="list_li">off</li>
                    <li class="list_li">bind</li>
                    <li class="list_li">one</li>
                    <li class="list_li">trigger</li>
                    <li class="list_li">hover</li>
                    <li class="list_li">click</li>
                    <li class="list_li">focus</li>
                </ul>
            </dd>
            <dt class="list_dt">
                <span class="_after"></span>
            <p>AJAX</p>
            <i class="list_dt_icon"></i>
            </dt>
            <dd class="list_dd">
                <ul>
                    <li class="list_li">$.ajax</li>
                    <li class="list_li">$.get</li>
                    <li class="list_li">$.getJSON</li>
                    <li class="list_li">$.getScript</li>
                    <li class="list_li">$.post</li>
                </ul>
            </dd>
            <dt class="list_dt">
                <span class="_after"></span>
            <p>效果</p>
            <i class="list_dt_icon"></i>
            </dt>
            <dd class="list_dd">
                <ul>
                    <li class="list_li">show</li>
                    <li class="list_li">hide</li>
                    <li class="list_li">toggle</li>
                    <li class="list_li">slideDown</li>
                    <li class="list_li">slideUp</li>
                    <li class="list_li">slideToggle</li>
                    <li class="list_li">fadeIn</li>
                    <li class="list_li">fadeOut</li>
                    <li class="list_li">fadeTo</li>
                    <li class="list_li">fadeToggle</li>
                    <li class="list_li">stop</li>
                </ul>
            </dd>
        </dl>
    </div>

    <div class="second">
        <div></div>
    </div>
</div>

<style>
    * {
        margin: 0;
        padding: 0;
        font-size: 12px;
    }

    .list_dt {
        background: #333;
        color: white;
        width: 200px;
        padding: 0 40px 0 20px;
        height: 34px;
        line-height: 34px;
        cursor: pointer;
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
        position: relative;
        border-bottom: 1px solid #464646;
    }

    .list_dt:hover {
        background: #222;
    }

    .list_dt:hover ._after {
        display: block;
        width: 3px;
        height: 100%;
        position: absolute;
        left: 0;
        top: 0;
        background: red;
    }

    #open {
        background: #222;
    }

    #open ._after {
        display: block;
        width: 3px;
        height: 100%;
        position: absolute;
        left: 0;
        top: 0;
        background: #4285F4;
    }

    .list_dt_icon {
        position: absolute;
        right: 10px;
        top: 9px;
        display: block;
        width: 16px;
        height: 16px;
        background: url("/web/admin/img/off.png") no-repeat;
    }

    #open .list_dt_icon {
        background: url("/web/admin/img/open.png") no-repeat;
    }

    .list_dd {
        display: none;
    }

    .list_dd ul {
        margin-bottom: 0;
    }

    .list_li {
        background: #4e4e4e;
        list-style-type: none;
        color: white;
        width: 200px;
        padding: 0 30px;
        height: 34px;
        line-height: 34px;
        cursor: pointer;
        border-bottom: 1px solid #6b6b6b;
    }

    .list_li:hover {
        background: red;
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
    }
</style>

<script type="text/javascript">
    $(".list_dt").on("click", function () {
        $('.list_dd').stop();
        $(this).siblings("dt").removeAttr("id");
        if ($(this).attr("id") == "open") {
            $(this).removeAttr("id").siblings("dd").slideUp();
        } else {
            $(this).attr("id", "open").next().slideDown().siblings("dd").slideUp();
        }
    });
</script>