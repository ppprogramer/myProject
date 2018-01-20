<style>
    .material {
        width: 1200px;
        max-width: 1600px;
        margin-left: auto;
        margin-right: auto;
    }

    .material_up {
        width: 1200px;
        height: 62px;
        margin-top: 20px;
        border: 1px solid #e7e7eb;
    }

    .material_up p {
        line-height: 62px;
        margin-left: 10px;
        font-size: 14px;
        min-height: 28px;
    }

    .material_down {
        margin-top: 20px;
        width: 1200px;
        height: 1200px;
        border: 1px solid #e7e7eb;
    }

    .material_left {
        width: 250px;
        height: 1200px;
        float: left;
        border-right: 1px solid #e7e7eb;
    }

    .material_center {
        width: 738px;
        height: 1200px;
        float: left;
        border-right: 1px solid #e7e7eb;
    }

    .material_left .h4_m_list {
        width: 210px;
        height: 22px;
        line-height: 1.6;
        margin: 24px auto;
        font-family: -apple-system-font, BlinkMacSystemFont, "Helvetica Neue", "PingFang SC", "Hiragino Sans GB",
        "Microsoft YaHei UI", "Microsoft YaHei", Arial, sans-serif;
        color: #353535;
        font-size: 14px;
        font-weight: 400;
    }

    .material_right {
        width: 210px;
        height: 1200px;
        float: left;
    }

    .appmsgItem {
        width: 210px;
        height: 128px;
        margin: auto;
    }

    .first_appmsg_item {
        width: 210px;
        height: 128px;
        padding: 9px 9px;
        border: 2px solid #43b548;
    }

    .cover_appmsg_item {
        width: 188px;
        height: 106px;
    }

    .appmsg_title {
        width: 188px;
        height: 28px;
        font-size: 14px;
        position: absolute;
        margin-top: 78px;
        background: rgba(0, 0, 0, 0.6) !important;
    }

    .js_appmsg_title {
        width: 172px;
        height: 28px;
        font-weight: 400;
        font-style: normal;
        font-size: 14px;
        padding: 0 8px;
        line-height: 28px;
        color: #fff;
    }

    .appmsg_thumb_wrp {
        height: 106px;
        background-size: cover;
        background-repeat: no-repeat;
        background-position: center center;
    }

    .js_appmsg_move {
        width: 210px;
        height: 40px;
        margin-top: -40px;
        background: rgba(0, 0, 0, 0.5) !important;
        z-index: 999;
    }
    .icon20_common.sort_down_white {
        margin-left: 8px;
        margin-right: 8px;
        width: 20px;
        height: 20px;
        vertical-align: middle;
        display: inline-block;
        line-height: 100px;
        overflow: hidden;
        background: url({{ asset('web/admin/img/base_z3b07a1.png') }}) 0 -4828px no-repeat;
    }


</style>
<div class="box box-default">
    <div class="box-header with-border">
        <h3 class="box-title">Available extensions</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <div class="material">
            <div class="material_up">
                <p>
                    <a href="#">素材库</a></p>
            </div>
            <div class="material_down">
                <div class="material_left">
                    <h4 class="h4_m_list">图文列表</h4>
                    <div class="appmsg_container_bd">
                        <div class="appmsg multi has_first_cover editing">
                            <div class="appmsgItem">{{--外面的大框（单个）--}}
                                <div class="first_appmsg_item">{{--第一篇图--}}
                                    <div class="cover_appmsg_item">
                                        <p class="appmsg_title">
                                            <a class="js_appmsg_title" href="javascript:void(0);"
                                               onclick="return false;">
                                            </a>
                                        </p>
                                        <div class="appmsg_thumb_wrp js_appmsg_thumb"
                                             style="background-image:url('https://mmbiz.qlogo.cn/mmbiz_jpg/DWx3ec03TduRXiaanNfJ5QzBnPKa2LEGaB7RWW5P0UarVmghIKibTx10Uyse1V7nuKticrqI3eichop1TdHdZuKoGA/0?wx_fmt=jpeg');">
                                        </div>
                                    </div>
                                </div>
                                <div class="js_appmsg_move">
                                    <a onclick="return false;" class="icon20_common sort_down_white js_down"
                                       href="javascript:;" title="下移">向下afasdfdasdf
                                    </a>
                                </div>
                            </div>
                        </div>
                        {{--添加按钮--}}
                        <div id="js_add_appmsg" title="添加一篇图文"
                             class="create_access_primary appmsg_add js_readonly">
                            <i class="icon35_common add_gray">增加一条</i>
                            <a id="js_add_polo_appmsg" onclick="return false" href="javascript:;">
                                <i class="icon_appmsg_create"></i>
                                <strong>自建图文</strong>
                            </a>
                            <a id="js_add_share_appmsg" onclick="return false" href="javascript:;">
                                <i class="icon_appmsg_share"></i>
                                <strong>分享图文</strong>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="material_center"></div>
                <div class="material_right"></div>
            </div>
        </div>
    </div>

</div>