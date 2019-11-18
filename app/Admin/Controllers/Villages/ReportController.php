<?php

namespace App\Admin\Controllers\Villages;

use App\Models\Villages\Report;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Illuminate\Support\Str;

class ReportController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Report';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Report);
        $grid->model()->latest();

        $grid->column('id', __('ID'));
        $grid->column('name', __('Name'));
        $grid->column('users.username', __('Username'));
        $grid->column('email', __('Email'));
        $grid->column('address', __('Address'));
        $grid->column('phone', __('Phone'));
        $grid->column('content', __('Report'));
        $grid->column('attachment', __('Attachment'))->file();
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
        $show = new Show(Report::findOrFail($id));

        $show->field('id', __('ID'));
        $show->field('name', __('Name'));
        $show->field('email', __('Email'));
        $show->field('address', __('Address'));
        $show->field('phone', __('Phone'));
        $show->field('content', __('Report'));
        $show->field('attachment', __('Attachment'))->file();
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));

        $show->users(__('User Informations'), function ($show)
        {
            $show->setResource('/admin/users');
            $show->name(__('Name'));
            $show->username(__('Username'));
            $show->email(__('Email'));
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
        $form = new Form(new Report);

        $form->text('name', __('Nama'));
        $form->email('email', __('Email'));
        $form->text('address', __('Address'));
        $form->mobile('phone', __('Phone'));
        $form->textarea('content', __('Report'));
        $form->file('attachment', __('Attachment'));
        $form->hidden('remember_token', __('Remember token'));

        $form->saving(function (Form $form)
        {
            $form->remember_token = Str::random(60);
        });

        return $form;
    }
}
