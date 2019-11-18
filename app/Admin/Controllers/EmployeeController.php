<?php

namespace App\Admin\Controllers;

use App\User;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Role;

class EmployeeController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Employee';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new User);
        $grid->model()->role('Employee');
        $grid->model()->latest();

        $grid->column('id', __('ID'));
        $grid->column('employees.identity_number', __('Identity Number'));
        $grid->column('name', __('Name'));
        $grid->column('username', __('Username'));
        $grid->column('employees.position', __('Position'));
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

        $show->empoyees(__('Information', function ($show)
        {
            $show->field('identity_number', __('Identity Number'));
            $show->field('position', __('Position'));
            $show->field('tenure_start', __('Tenure start'));
            $show->field('tenure_finish', __('Tenure finish'));
        }));

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

        $form->text('employees.identity_number', __('Identity number'))
            ->rules('required|integer')
            ->creationRules('unique:employees,identity_number');
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
            ->options(['Unknown' => 'Unknown', 'Male' => 'Male', 'Female' => 'Female',]);
        $form->text('profiles.religion', __('Religion'));
        $form->textarea('profiles.address', __('Address'));
        $form->mobile('profiles.phone', __('Phone'))
            ->creationRules('unique:user_profiles,phone');
        $form->image('profiles.avatar', __('Avatar'))
            ->removable()
            ->move('users/avatars');
        $form->text('employees.position', __('Position'))
            ->rules('required|string|max:255');
        $form->date('employees.tenure_start', __('Tenure start'))
            ->format('YYYY')
            ->default(date('YYYY'))
            ->rules('required');
        $form->date('employees.tenure_finish', __('Tenure finish'))
            ->format('YYYY')
            ->rules('required');

        $form->submitted(function (Form $form)
        {
            if ($form->password = '') {
                $form->ignore('password');
            }
        });

        $form->saving(function (Form $form)
        {
            $role = Role::firstOrCreate(['name' => 'Employee']);
            $form->username = Str::snake($form->username);
            $form->api_token = Str::random(60);

            $form->model()->assignRole('Employee');
        });

        return $form;
    }
}
