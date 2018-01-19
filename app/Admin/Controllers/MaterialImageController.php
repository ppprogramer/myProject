<?php

namespace App\Admin\Controllers;

use App\Models\WeChat\WeChatMaterial;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\ModelForm;

class MaterialImageController extends Controller
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
            $grid->name('图片')->display(function () {
                if ($this->name) {
                    return "<img src='/uploads/$this->name' width='260' height='185'>";
                }
                return '';
            });
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
            $form->image('name', '图片')->move('/admin/material/image')->name(function ($file) {
                return md5(uniqid() . time()) . '.' . $file->guessExtension();
            });
            $form->hidden('url', '图片路径');
            $form->hidden('media_id', '素材ID');
            $form->hidden('create_timestamp', '更新时间');
            $form->display('created_at', 'Created At');
            $form->display('updated_at', 'Updated At');
            $form->saving(function ($form) {
                $app = app('wechat.official_account');
                $filePath = public_path("/uploads/$form->name");
                $result = $app->material->uploadImage($filePath);
                $form->media_id = $result['media_id'];
                $form->url = $result['media_id'];
                $form->create_timestamp = time();
            });
        });
    }
}
