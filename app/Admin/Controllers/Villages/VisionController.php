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
    protected $title = 'Visi Desa';

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
        $grid->column('content', __('Visi'));
        $grid->column('desc', __('Deskripsi'));
        $grid->column('created_at', __('Dibuat'));
        $grid->column('updated_at', __('Diperbarui'));

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
        $show->field('content', __('Visi'));
        $show->field('desc', __('Deskripsi'));
        $show->field('created_at', __('Dibuat'));
        $show->field('updated_at', __('Diperbarui'));

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

        $form->text('content', __('Visi'));
        $form->textarea('desc', __('Deskripsi'));

        return $form;
    }
}
