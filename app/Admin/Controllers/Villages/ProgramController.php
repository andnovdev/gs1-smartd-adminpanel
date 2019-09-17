<?php

namespace App\Admin\Controllers\Villages;

use App\Models\Villages\Program;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class ProgramController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'App\Models\Villages\Program';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Program);
        $grid->model()->latest();

        $grid->column('id', __('ID'));
        $grid->column('title', __('Nama Program'));
        $grid->column('desc', __('Deskripsi'));
        $grid->column('year_start', __('Tahun mulai'));
        $grid->column('year_finish', __('Tahun selesai'));
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
        $show = new Show(Program::findOrFail($id));

        $show->field('id', __('ID'));
        $show->field('title', __('Nama Program'));
        $show->field('desc', __('Deskripsi'));
        $show->field('year_start', __('Tahun mulai'));
        $show->field('year_finish', __('Tahun selesai'));
        $show->field('created_at', __('Dibuat pada'));
        $show->field('updated_at', __('Diperbarui pada'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Program);

        $form->text('title', __('Nama Program'));
        $form->ckeditor('desc', __('Deskripsi'));
        $form->date('year_start', __('Tahun mulai'))
            ->default(date('YYYY'))
            ->format('YYYY');
        $form->date('year_finish', __('Tahun Selesai'))
            ->default(date('YYYY'))
            ->format('YYYY');

        return $form;
    }
}
