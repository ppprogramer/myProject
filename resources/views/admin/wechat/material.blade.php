{{--<link href="{{ asset('web/wechat/css/module.css') }}" rel="stylesheet">--}}
<link href="{{ asset('web/wechat/css/weiphp.css') }}" rel="stylesheet">
<link href="{{ asset('web/wechat/css/emoji.css') }}" rel="stylesheet">
<div class="box box-default">
    <div class="box-header with-border">
        <h3 class="box-title">素材添加</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <div id="form" action="#" class="form-horizontal form-center">
            <div class="material_form">
                <div class="preview_area">
                    <form data-index='0' class="appmsg_item edit_item editing">
                        <p class="time">时间</p>
                        <div class="main_img">
                            <img src="{{ asset('web/wechat/image/no_cover_pic.png') }}" data-coverid="0"/>
                            <h6 class="title">这是标题</h6>
                        </div>
                        <p class="intro"></p>
                        <input type="hidden" name="title" placeholder="这是标题"/>
                        <input type="hidden" name="cover_id" value="0"/>
                        <input type="hidden" name="intro" placeholder="这是摘要描述"/>
                        <input type="hidden" name="author" placeholder="作者"/>
                        <input type="hidden" name="link" placeholder="外链"/>
                        <textarea style="display:none" name="content"></textarea>
                        <div class="hover_area"><a href="javascript:;" onClick="editItem(this)">编辑</a></div>
                    </form>
                    <div class="appmsg_edit_action">
                        <a href="javascript:;" onClick="addMsg();">添加</a>
                    </div>
                </div>
                <div class="edit_area">
                    <em class="area_arrow"></em>
                    <div class="">
                        <ul class="tab-pane in appmsg_edit_group">
                            <li class="form-item cf">
                                <label class="item-label"><span class="need_flag">*</span>标题<span class="check-tips">标题不能为空且长度不能超过64个字</span></label>
                                <div class="controls">
                                    <input type="text" class="text input-large" name="p_title" value="">
                                </div>
                            </li>
                            <li class="form-item cf">
                                <label class="item-label">作者<span class="check-tips">最多不能超过8个字</span></label>
                                <div class="controls">
                                    <input type="text" class="text input-large" name="p_author" value="">
                                </div>
                            </li>
                            <li class="form-item cf">
                                <label class="item-label"><span class="need_flag">*</span>封面图片<span class="check-tips">图片<span
                                                class="picSize">建议最佳尺寸：900X500</span></span></label>
                                <div class="controls uploadrow2" data-max="1" title="点击修改图片" rel="p_cover">
                                    <input type="file" id="upload_picture_p_cover">
                                    <input type="hidden" name="p_cover" id="cover_id_p_cover" data-callback="uploadImgCallback"
                                           value=""/>
                                    <div class="upload-img-box" rel="img" style="display:none">
                                        <div class="upload-pre-item2"><img width="100" height="100" src=""/></div>
                                        <em class="edit_img_icon">&nbsp;</em>
                                    </div>
                                </div>
                            </li>
                            <li class="form-item cf">
                                <label class="item-label">摘要<span class="check-tips">最多不能超过120个字</span></label>
                                <div class="controls">
                                    <label class="textarea input-large">
                                        <textarea class="text input-large" name="p_intro"></textarea>
                                    </label>
                                </div>
                            </li>
                            <li class="form-item cf">
                                <label class="item-label">正文<span class="check-tips">图片命名不能有特殊符号，正文长度限制为1w个字</span></label>
                                <div class="controls">
                                    <label class="textarea">
                                        <textarea style="width:405px; height:200px;" name="p_content"></textarea>
                                    </label>
                                    </label>
                                </div>
                            </li>
                            <li class="form-item cf">
                                <label class="item-label">外链</label>
                                <div class="controls">
                                    <input type="text" class="text input-large" name="p_link" value="">
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="form-item form_bh">
                <button class="btn submit-btn ajax-post" id="submit" type="button">确 定</button>
            </div>
        </div>
    </div>
    <!-- /.box-body -->
    <div class="box-footer text-center">
        <a href="https://github.com/laravel-admin-extensions" target="_blank" class="uppercase">View All Extensions</a>
    </div>
    <!-- /.box-footer -->
</div>
<script src="{{ asset('web/plug/uploadify/jquery.uploadify.min.js') }}"></script>
<script src="{{ asset('web/wechat/js/common.js') }}"></script>
<script type="text/javascript">
    $('#submit').click(function () {
        var postUrl = $('#form').attr('action');
        var dataJson = [];
        $('.edit_item').each(function (index, element) {
            dataJson.push($(this).serializeArray());
        });
        $(this).addClass('disabled');
        //console.log(dataJson);
        //console.log(JSON.stringify(dataJson));
        //提交数组字符串 php解析后进行保存
        $.post(postUrl, {'dataStr': JSON.stringify(dataJson)}, function (data) {
            $('#submit').removeClass('disabled');
            if (data.status == 1) {
                updateAlert(data.info, 'success');
                setTimeout(function () {
                    location.href = data.url;
                }, 1500);
            } else {
                updateAlert(data.info);
            }
        })
        return false;
    });
    $(function () {
        //初始化上传图片插件
        initUploadImg();

        showTab();

        $('.toggle-data').each(function () {
            var data = $(this).attr('toggle-data');
            if (data == '') return true;

            if ($(this).is(":selected") || $(this).is(":checked")) {
                change_event(this)
            }
        });

        $('select').change(function () {
            $('.toggle-data').each(function () {
                var data = $(this).attr('toggle-data');
                if (data == '') return true;

                if ($(this).is(":selected") || $(this).is(":checked")) {
                    change_event(this)
                }
            });
        });

        //动态预览
        $('input[name="p_title"]').keyup(function () {
            $('.editing').find('.title').text($(this).val());
            $('.editing').find('input[name="title"]').val($(this).val());
        });
        $('input[name="p_author"]').keyup(function () {
            $('.editing').find('.author').text($(this).val());
            $('.editing').find('input[name="author"]').val($(this).val());
        });
        $('input[name="p_link"]').keyup(function () {
            $('.editing').find('.link').text($(this).val());
            $('.editing').find('input[name="link"]').val($(this).val());
        });
        $('textarea[name="p_intro"]').keyup(function () {
            $('.editing').find('.intro').text($(this).val());
            $('.editing').find('input[name="intro"]').val($(this).val());
        });
        imageEditor.addListener("contentChange", function () {
            $('.editing').find('textarea[name="content"]').val(imageEditor.getContent());
        });
        imageEditor.addListener("ready", function () {
            initForm($('.edit_item').eq(0));
        });


    });
    function addMsg() {
        var curCount = $('.edit_item').size();
        if (curCount >= 8) {
            updateAlert('你最多只可以增加8条图文信息');
            return false;
        }
        $('.picSize').text('200X200');
        //console.log(curCount);
        var addHtml = $('<form data-index="' + curCount + '" class="appmsg_sub_item edit_item">' +
            '<p class="title"></p>' +
            '<div class="main_img">' +
            '<img src="/public/web/wechat/image/no_cover_pic_s.png" data-coverid="0"/>' +
            '</div>' +
            '<input type="hidden" name="title" placeholder="这是标题"/>' +
            '<input type="hidden" name="cover_id" value="0"/>' +
            '<input type="hidden" name="intro" placeholder="这是摘要描述"/>' +
            '<input type="hidden" name="author" placeholder="作者"/>' +
            '<input type="hidden" name="link" placeholder="外链"/>' +
            '<textarea style="display:none" name="content"></textarea>' +
            '<div class="hover_area"><a href="javascript:;" onClick="editItem(this)">编辑</a><a href="javascript:;" onClick="deleteItem(this)">删除</a></div>' +
            '</form>');
        addHtml.insertBefore($('.appmsg_edit_action'));
    }
    function editItem(_this) {
        $(_this).parents('.edit_item').addClass('editing');
        $(_this).parents('.edit_item').siblings().removeClass('editing');
        var index = $(_this).parents('.edit_item').data('index');
        if (index == 0) {
            $('.picSize').text('900X500');
            $('.edit_area').css('margin-top', 0);
        } else {
            $('.picSize').text('200X200');
            $('.edit_area').css('margin-top', index * 110 + 120);
        }
        initForm($(_this).parents('.edit_item'));
    }
    function deleteItem(_this) {
        if (!confirm('确认删除？')) return false;

        var item_id = $(_this).parents('.edit_item').find('input[name="id"]').val();
        if (item_id) {
            $.post("{:U('del_material_by_id')}", {id: item_id});
        }

        $(_this).parents('.edit_item').remove();
        var curCount = $('.edit_item').size();
        if (curCount == 1) {
            $('.edit_area').css('margin-top', 0);
        } else {
            $('.edit_area').css('margin-top', (curCount - 1) * 110 + 120);
        }
        initForm($('.edit_item').eq(curCount - 1));
    }
    function uploadImgCallback(name, id, src) {
        $('.editing img').attr('src', src);
        $('.editing input[name="cover_id"]').val(id);
    }
    function initForm(_item) {
        var title = $(_item).find('input[name="title"]').val();
        var author = $(_item).find('input[name="author"]').val();
        var link = $(_item).find('input[name="link"]').val();
        var intro = $(_item).find('input[name="intro"]').val();
        var content = $(_item).find('textarea[name="content"]').val();
        var src = $(_item).find('img').attr('src');
        $('input[name="p_title"]').val(title);
        $('input[name="p_author"]').val(author);
        $('input[name="p_link"]').val(link);
        $('textarea[name="p_intro"]').val(intro);
        if (!content) content = " ";
        if (content) {
            imageEditor.setContent(content);
        }
        $('.upload-img-box').show().find('img').attr('src', src);
    }
</script>