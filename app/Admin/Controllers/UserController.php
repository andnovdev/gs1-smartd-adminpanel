<?php

namespace App\Admin\Controllers;

use App\User;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
Use Encore\Admin\Widgets\Table;
use Illuminate\Support\Str;

class UserController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'App/User';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new User);
        $grid->model()->latest();

        $grid->column('id', __('ID'));
        $grid->column('name', __('Name'));
        $grid->column('username', __('Username'));
        $grid->column('email', __('Email'));
        $grid->column('email_verified_at', __('Email verified at'));
        $grid->column('activityStatuses.status', __('Status'));
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
        $show = new Show(User::findOrFail($id));

        $show->field('id', __('ID'));
        $show->field('name', __('Name'));
        $show->field('username', __('Username'));
        $show->field('email', __('Email'));
        $show->field('email_verified_at', __('Email verified at'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));

        $show->profiles(__('User Profiles'), function ($show) {
            $show->field('birthday', __('Birthday'));
            $show->field('birthplace', __('Birthplace'));
            $show->field('gender', __('Gender'));
            $show->field('religion', __('Religion'));
            $show->field('address', __('Address'));
            $show->field('job', __('Job'));
            $show->field('company', __('Company'));
            $show->field('phone', __('Phone'));
            $show->field('desc', __('Description'));
            $show->field('avatar', __('Avatar'))->image();
        });

        $show->activityStatuses(__('User Activity'), function ($show)
        {
            $show->field('status', __('Status'));
            $show->field('last_active', __('Last active'));
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
        $form = new Form(new User);

        $form->text('name', __('Name'))
            ->rules('required|string|max:255');
        $form->text('username', __('Username'))
            ->rules('required|string|between:5,255')
            ->creationRules('unique:users,username')
            ->updateRules('unique:users,username,{{id}}');
        $form->password('password', __('Password'))
            ->creationRules('required|string|between:8,255')
            ->updateRules('nullable|string|between:8,255');
        $form->email('email', __('Email'))
            ->rules('required|email|string|max:255')
            ->creationRules('unique:users,email');
        $form->date('profiles.birthday', __('Birthday'));
        $form->text('profiles.birthplace', __('Birthplace'));
        $form->select('profiles.gender', __('Gender'))
            ->options(['Unknown' => 'Unknown', 'Male' => 'Male', 'Female' => 'Female']);
        $form->text('profiles.religion', __('Religion'));
        $form->textarea('profiles.address', __('Address'));
        $form->text('profiles.job', __('Job'));
        $form->text('profiles.company', __('Company'));
        $form->mobile('profiles.phone', __('Phone'));
        $form->textarea('profiles.desc', __('Description'));
        $form->image('profiles.avatar', __('Avatar'))
            ->removable()
            ->move('users/avatars');

        $form->submitted(function (Form $form)
        {
            if ($form->password = '') {
                $form->ignore('password');
            }
        });

        $form->saving(function (Form $form)
        {
            $form->username = Str::snake($form->username);
            $form->api_token = Str::random(60);
        });

        return $form;
    }
}
