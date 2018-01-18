<?php

namespace App\Admin\Controllers;

use App\Http\Controllers\Controller;
use App\Models\WeChat\WeChatMaterial;
use App\Models\WeChat\WeChatMaterialImageText;
use EasyWeChat\Kernel\Messages\Article;
use Encore\Admin\Controllers\ModelForm;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;

class MaterialImageTextController extends Controller
{
    use ModelForm;

    /**
     * Index interface.
     *
     * @return Content
     */
    public function index()
    {
        return Admin::content(function (Content $content) {

            $content->header('header');
            $content->description('description');

            $content->body($this->grid());
        });
    }

    /**
     * Edit interface.
     *
     * @param $id
     * @return Content
     */
    public function edit($id)
    {
        return Admin::content(function (Content $content) use ($id) {

            $content->header('header');
            $content->description('description');

            $content->body($this->form()->edit($id));
        });
    }

    /**
     * Create interface.
     *
     * @return Content
     */
    public function create()
    {
        return Admin::content(function (Content $content) {

            $content->header('header');
            $content->description('description');

            $content->body($this->form());
        });
    }

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Admin::grid(WeChatMaterialImageText::class, function (Grid $grid) {

            $grid->id('ID')->sortable();
            $grid->media_id('素材ID');
            $grid->thumb_media_id('图片ID');
            $grid->title('标题');
            $grid->content('内容');
            $grid->author('作者');
            $grid->digest('摘要');
            $grid->show_cover_pic('封面显示');
            $grid->content_source_url('文章原地址');

            $grid->created_at('创建时间');
            $grid->updated_at('更新时间');
        });
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    //添加
    protected function form()
    {
        return Admin::form(WeChatMaterialImageText::class, function (Form $form) {

            $form->display('id', 'ID');
            $form->text('title', '文章标题')->rules('required');
            $form->textarea('content', '内容')->rules('required');
            $form->select('thumb_media_id')->options(WeChatMaterial::all()->pluck('id', 'media_id'))->rules('required');
            $form->hidden('media_id');
            $form->text('author', '作者');
            $form->text('digest', '摘要');
            $form->switch('show_cover_pic', '显示封面')->rules('required');
            $form->text('content_source_url', '文章原地址')->rules('required');
            $form->hidden('create_timestamp', '更新时间');
            $form->display('created_at', 'Created At');
            $form->display('updated_at', 'Updated At');
            $form->saving(function ($form) {
                $form->create_timestamp = time();
                $app = app('wechat.official_account');
                $article = new Article([
                    'title' => $form->title,
                    'thumb_media_id' => $form->thumb_media_id,
                    'author' => $form->author,
                    'digest' => $form->digest,
                    'show_cover' => $form->show_cover_pic,
                    'content' => $form->content,
                    'source_url' => $form->content_source_url,
                ]);
                $result = $app->material->uploadArticle($article);
                $form->media_id = $result['media_id'];
            });
        });
    }

    public function update($id)
    {
        return $this->editForm()->update($id);
    }

    //编辑
    protected function editForm()
    {
        return Admin::form(WeChatMaterialImageText::class, function (Form $form) {

            $form->display('id', 'ID');
            $form->text('title', '文章标题')->rules('required');
            $form->textarea('content', '内容')->rules('required');
            $form->select('thumb_media_id')->options(WeChatMaterial::all()->pluck('id', 'media_id'))->rules('required');
            $form->text('author', '作者');
            $form->text('digest', '摘要');
            $form->switch('show_cover_pic', '显示封面')->rules('required');
            $form->text('content_source_url', '文章原地址')->rules('required');
            $form->display('created_at', 'Created At');
            $form->display('updated_at', 'Updated At');
            $form->saved(function (Form $form) {
                $app = app('wechat.official_account');
                $imageText = WeChatMaterialImageText::find($form->model()->id);
                $app->material->updateArticle($imageText->media_id, [
                    'title' => $imageText->title,
                    'thumb_media_id' => $imageText->thumb_media_id,
                    'author' => $imageText->author,
                    'digest' => $imageText->digest,
                    'show_cover' => $imageText->show_cover_pic,
                    'content' => $imageText->content,
                    'source_url' => $imageText->content_source_url,
                ]);
            });
        });
    }
}
