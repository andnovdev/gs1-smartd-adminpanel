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
        $grid->column('name', __('Nama'));
        $grid->column('parents.name', __('Induk'));
        $grid->column('created_at', __('Dibuat pada'));
        $grid->column('updated_at', __('Diperbarui pada'));

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
        $show->field('name', __('Nama'));
        $show->field('created_at', __('Dibuat pada'));
        $show->field('updated_at', __('Diperbarui pada'));

        $show->subcategories(__('Sub Kategori'), function ($show)
        {
            $show->resource('admin/posts/categories');
            $show->name(__('Nama'));
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

        $form->select('parent_id', __('Induk Kategori'))
            ->options(Category::all()->pluck('name', 'id'));
        $form->text('name', __('Nama'));
        $form->hasMany('subcategories', function (Form\NestedForm $form) {
            $form->text('name');
        });

        return $form;
    }
}
