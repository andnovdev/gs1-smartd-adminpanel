<?php

namespace App\Admin\Controllers\Villages;

use App\Models\Villages\Vision;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class VisionController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Vision';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Vision);
        $grid->model()->latest();

        $grid->column('id', __('ID'));
        $grid->column('content', __('Vision'));
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
        $show = new Show(Vision::findOrFail($id));

        $show->field('id', __('ID'));
        $show->field('content', __('Vision'));
        $show->field('desc', __('Description'));
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
        $form = new Form(new Vision);

        $form->text('content', __('Vision'));
        $form->textarea('desc', __('Description'));

        return $form;
    }
}
