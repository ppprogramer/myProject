<?php

namespace App\Admin\Controllers;

use App\Models\Bale;
use App\Models\Item;
use App\Models\Shop;
use App\Models\User;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Column;
use Encore\Admin\Layout\Content;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\ModelForm;
use Encore\Admin\Layout\Row;
use Encore\Admin\Widgets\Box;

class BaleController extends Controller
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

            $content->header('最终商品');
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
            $content->header('商品');
            $content->description('添加');
            $return = trans('admin.back');
            $list = trans('admin.list');
            $route = '/admin/bale';
            $menu = <<<EOT
<div class="btn-group pull-right" style="margin-right: 10px">
    <a href="$route" class="btn btn-sm btn-default"><i class="fa fa-list"></i>&nbsp;$list</a>
</div>
<div class="btn-group pull-right" style="margin-right: 10px">
    <a class="btn btn-sm btn-default form-history-back" onclick="history.go(-1)">
    <i class="fa fa-arrow-left"></i>&nbsp;$return</a>
</div>
EOT;
            $items = (new Item())->toTree();
            $content->row($menu);
            $content->row(function (Row $row) use ($items) {
                $row->column(8, function (Column $column) use ($items) {
                    $column->append(new Box('', view('admin.view.bale', ['items' => $items])));
                });
            });
        });
    }

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Admin::grid(Bale::class, function (Grid $grid) {

            $grid->id('ID')->sortable();
            $grid->key('商品标识');
            $grid->type('SKU类型')->display(function () {
                return $this->type == 1 ? '单SKU' : '组合SKU';
            });
            $grid->column('所属账号')->display(function () {
                return User::find($this->user_id)->account;
            });
            $grid->column('店铺名')->display(function () {
                return Shop::find($this->user_id)->name;
            });
            $grid->created_at('创建时间');
            $grid->updated_at('编辑时间');
        });
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        return Admin::form(Bale::class, function (Form $form) {

            $form->display('id', 'ID');

            $form->display('created_at', 'Created At');
            $form->display('updated_at', 'Updated At');
        });
    }
}
