<?php

namespace App\Admin\Controllers\Villages;

use App\Models\Villages\Mission;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class MissionController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Mission';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Mission);
        $grid->model()->latest();

        $grid->column('id', __('ID'));
        $grid->column('content', __('Mission'));
        $grid->column('desc', __('Description'));
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
        $show = new Show(Mission::findOrFail($id));

        $show->field('id', __('ID'));
        $show->field('content', __('Mission'));
        $show->field('desc', __('Desciption'));
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
        $form = new Form(new Mission);

        $form->text('content', __('Mission'));
        $form->textarea('desc', __('Description'));

        return $form;
    }
}
