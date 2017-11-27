<?php

namespace App\Admin\Controllers;

use App\Models\Item;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\ModelForm;
use Encore\Admin\Layout\Column;
use Encore\Admin\Layout\Row;
use Encore\Admin\Tree;
use Encore\Admin\Widgets\Box;

class ItemController extends Controller
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
            $content->header(trans('admin.goods.item'));
            $content->description(trans('admin.list'));

            $content->row(function (Row $row) {
                $row->column(6, $this->treeView()->render());

                $row->column(6, function (Column $column) {
                    $form = new \Encore\Admin\Widgets\Form();
                    $form->action(admin_base_path('item'));

                    $form->select('pid', trans('admin.parent_id'))->options(Item::selectOptions());
                    $form->text('name', '类名')->rules('required');
                    $form->icon('icon', trans('admin.icon'))->default('fa-bars')->help($this->iconHelp());
                    $column->append((new Box(trans('admin.new'), $form))->style('success'));
                });
            });
        });
    }

    protected function treeView()
    {
        return Item::tree(function (Tree $tree) {
            $tree->disableCreate();

            $tree->branch(function ($branch) {
                $payload = "<i class='fa {$branch['icon']}'></i>&nbsp;<strong>{$branch['name']}</strong>";
                return $payload;
            });
        });
    }

    /**
     * Redirect to edit page.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function show($id)
    {
        return redirect()->route('item.edit', ['id' => $id]);
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
            $content->header(trans('admin.goods.item'));
            $content->description(trans('admin.edit'));

            $content->row($this->form()->edit($id));
        });
    }

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Admin::grid(Item::class, function (Grid $grid) {

            $grid->id('ID')->sortable();

            $grid->created_at();
            $grid->updated_at();
        });
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    public function form()
    {
        return Item::form(function (Form $form) {
            $form->display('id', 'ID');

            $form->select('pid', trans('admin.parent_id'))->options(Item::selectOptions());
            $form->text('name', trans('admin.title'))->rules('required');
            $form->icon('icon', trans('admin.icon'))->default('fa-bars')->help($this->iconHelp());
//            $form->text('uri', trans('admin.uri'));
//            $form->multipleSelect('roles', trans('admin.roles'))->options(Item::all()->pluck('name', 'id'));
            $form->display('created_at', trans('admin.created_at'));
            $form->display('updated_at', trans('admin.updated_at'));
        });
    }

    /**
     * Help message for icon field.
     *
     * @return string
     */
    protected function iconHelp()
    {
        return 'For more icons please see <a href="http://fontawesome.io/icons/" target="_blank">http://fontawesome.io/icons/</a>';
    }
}
