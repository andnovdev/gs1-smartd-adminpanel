<?php

namespace App\Admin\Controllers\Posts;

use App\Models\Posts\Category;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class CategoryController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'App\Models\Posts\Category';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Category);

        $grid->column('id', __('ID'));
        $grid->column('name', __('Name'));
        $grid->column('parents.name', __('Parent'));
        $grid->column('created_at', __('Created at'));
        $grid->column('updated_at', __('Updated at'));

        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(Category::findOrFail($id));

        $show->field('id', __('ID'));
        $show->field('name', __('Name'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));

        $show->subcategories(__('Sub Category'), function ($show)
        {
            $show->resource('admin/posts/categories');
            $show->name(__('Name'));
        });

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Category);

        $form->select('parent_id', __('Parent'))
            ->options(Category::all()->pluck('name', 'id'));
        $form->text('name', __('Nama'));
        $form->hasMany('subcategories', function (Form\NestedForm $form) {
            $form->text('name');
        });

        return $form;
    }
}
