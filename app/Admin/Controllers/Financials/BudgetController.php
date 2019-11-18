<?php

namespace App\Admin\Controllers\Financials;

use App\Models\Financials\Budget;
use App\Models\Financials\Category;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class BudgetController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'App\Models\Financials\Budget';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Budget);

        $grid->column('id', __('ID'));
        $grid->column('name', __('Name'));
        $grid->column('categories.name', __('Category'));
        $grid->column('goal_value', __('Goal value'));
        $grid->column('frecuency', __('Frecuency'));
        $grid->column('purpose', __('Purpose'));
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
        $show = new Show(Budget::findOrFail($id));

        $show->field('id', __('ID'));
        $show->field('name', __('Name'));
        $show->field('goal_value', __('Goal value'));
        $show->field('frecuency', __('Frecuency'));
        $show->field('purpose', __('Purpose'));
        $show->field('categories.name', __('Category'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Budget);

        $options = [
            'Daily' => 'Daily',
            'Weekly' => 'Weekly',
            'Monthly' => 'Monthly',
            'More' => 'More',
        ];

        $form->text('name', __('Name'))
            ->rules('required');
        $form->select('category_id', __('Category'))
            ->options(Category::all()->pluck('name', 'id'))
            ->rules('required');
        $form->currency('goal_value', __('Goal value'))
            ->symbol('Rp')
            ->rules('required');
        $form->select('frecuency', __('Frecuency'))
            ->options($options)
            ->rules('required');
        $form->textarea('purpose', __('Purpose'))
            ->rules('required');

        return $form;
    }
}
