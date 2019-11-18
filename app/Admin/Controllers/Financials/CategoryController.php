<?php

namespace App\Admin\Controllers\Financials;

use App\Models\Financials\Category;
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
    protected $title = 'App\Models\Financials\Category';

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

        $show->field('id', __('Id'));
        $show->field('name', __('Name'));

        $show->sub_categories(__('Sub Categories'), function ($show)
        {
            $show->setResource('/admin/financials/categories');
            $show->id(__('ID'));
            $show->name(__('Name'));
            $show->created_at(__('Created at'));
            $show->updated_at(__('Updated at'));
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
        $form->text('name', __('Name'));
        $form->hasMany('sub_categories', __('Sub Categories'), function (Form\NestedForm $form)
        {
            $form->text('name', __('Name'));
        });


        return $form;
    }
}
