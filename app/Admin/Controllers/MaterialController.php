<?php

namespace App\Admin\Controllers;

use App\Models\WeChat\WeChatMaterial;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\ModelForm;

class MaterialController extends Controller
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
        return Admin::grid(WeChatMaterial::class, function (Grid $grid) {

            $grid->id('ID')->sortable();
            $grid->media_id('素材ID');
            $grid->type('素材类型');
            $grid->created_at('创建时间');
            $grid->updated_at('更新时间');
        });
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        return Admin::form(WeChatMaterial::class, function (Form $form) {

            $form->display('id', 'ID');
            $form->image('name', '图片')->move('/admin/image')->name(function ($file) {
                return md5(uniqid() . time()) . '.' . $file->guessExtension();
            });
            $form->hidden('create_timestamp', '更新时间');
            $form->hidden('type', '类型');
            $form->display('created_at', 'Created At');
            $form->display('updated_at', 'Updated At');
            $form->saving(function ($form) {
                $form->create_timestamp = time();
                $form->type = 1;
            });
            $form->saved(function ($form) {
                $app = app('wechat.official_account');
                $result = $app->material->uploadImage(public_path("/uploads/$form->name"));
                $media_id = $result['media_id'];
                $url = $result['url'];
                WeChatMaterial::find($form->id)->update(['media_id' => $media_id, 'url' => $url]);
            });
        });
    }
}
