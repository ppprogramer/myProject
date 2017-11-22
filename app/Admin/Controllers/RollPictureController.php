<?php

namespace App\Admin\Controllers;

use App\Models\RollPicture;

use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\ModelForm;

class RollPictureController extends Controller
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

            $content->header('轮播图管理');
            $content->description('列表');

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

            $content->header('轮播图管理');
            $content->description('编辑');

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

            $content->header('轮播图管理');
            $content->description('添加');

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
        return Admin::grid(RollPicture::class, function (Grid $grid) {
            $grid->id('ID')->sortable();
            $grid->name('图片')->display(function () {
                if ($this->name) {
                    return "<img src='/uploads/$this->name'>";
                }
                return '';
            });
            $grid->status('状态')->display(function () {
                return $this->status ? '使用' : '禁用';
            });
            $grid->created_at('创建时间');
            $grid->updated_at('修改时间');
        });
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        return Admin::form(RollPicture::class, function (Form $form) {

            $form->display('id', 'ID');
            $form->image('name', '图片')->move('/admin/image')->name(function ($file) {
                return md5(uniqid() . time()) . '.' . $file->guessExtension();
            });
            $form->switch('status', '开关');
            $form->display('created_at', '添加时间');
            $form->display('updated_at', '更新时间');
            $form->hidden('create_timestamp', '更新时间');
            $form->saving(function ($form) {
                $form->create_timestamp = time();
            });
        });
    }
}
