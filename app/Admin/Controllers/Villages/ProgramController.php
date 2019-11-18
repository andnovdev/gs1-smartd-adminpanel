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
        $grid->column('title', __('Program name'));
        $grid->column('desc', __('Description'));
        $grid->column('year_start', __('Start year'));
        $grid->column('year_finish', __('Fisish year'));
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
        $show = new Show(Program::findOrFail($id));

        $show->field('id', __('ID'));
        $show->field('title', __('Program name'));
        $show->field('desc', __('Description'));
        $show->field('year_start', __('Start year'));
        $show->field('year_finish', __('Fisish year'));
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
        $form = new Form(new Program);

        $form->text('title', __('Program name'));
        $form->ckeditor('desc', __('Description'));
        $form->date('year_start', __('Start year'))
            ->default(date('YYYY'))
            ->format('YYYY');
        $form->date('year_finish', __('Finish year'))
            ->default(date('YYYY'))
            ->format('YYYY');

        return $form;
    }
}
