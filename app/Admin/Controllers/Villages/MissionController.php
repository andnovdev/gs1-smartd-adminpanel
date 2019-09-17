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
    protected $title = 'Misi Desa';

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
        $grid->column('content', __('Misi'));
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
        $show = new Show(Mission::findOrFail($id));

        $show->field('id', __('ID'));
        $show->field('content', __('Misi'));
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
        $form = new Form(new Mission);

        $form->text('content', __('Misi'));
        $form->textarea('desc', __('Deskripsi'));

        return $form;
    }
}
