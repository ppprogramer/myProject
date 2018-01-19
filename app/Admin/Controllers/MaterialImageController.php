<?php

namespace App\Admin\Controllers;

use App\Models\WeChat\WeChatMaterial;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\ModelForm;
use Illuminate\Http\Response;

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
            $grid->actions(function ($actions) {
                // append一个操作
                if ($actions->row->status == 0) {
                    $route = route('admin.weChat.material.image.upload', ['id' => $actions->row->id]);
                    $actions->append("<a href='$route'><button type='button' class='btn btn-success'>上传</button></a>");
                }
                // prepend一个操作
//                $actions->prepend('<a href=""><i class="fa fa-paper-plane"></i></a>');
            });
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
            $form->hidden('create_timestamp', '更新时间');
            $form->display('created_at', 'Created At');
            $form->display('updated_at', 'Updated At');
            $form->saving(function ($form) {
                $form->create_timestamp = time();
            });
            $form->saved(function (Form $form) {
                $app = app('wechat.official_account');
                $material = WeChatMaterial::find($form->model()->id);
                $filePath = public_path("/uploads/$material->name");
                $result = $app->material->uploadImage($filePath);
                $media_id = $result['media_id'];
                $url = $result['url'];
                $material->update(['media_id' => $media_id, 'url' => $url, 'status' => 1]);
            });
        });
    }

    public function upload($id)
    {
        if (!is_numeric($id)) return new Response('非法操作', '-1');
        $material = WeChatMaterial::find($id);
        if ($material->status == 1) return new Response('已上传，请不要重复操作', '-1');
        $filePath = public_path("/uploads/$material->name");
        if (!file_exists($filePath)) return new Response('文件不存在!', '-1');
        $app = app('wechat.official_account');
        $result = $app->material->uploadImage($filePath);
        $media_id = $result['media_id'];
        $url = $result['url'];
        $material->update(['media_id' => $media_id, 'url' => $url, 'status' => 1]);
        return new Response('上传成功', 0);
    }
}
