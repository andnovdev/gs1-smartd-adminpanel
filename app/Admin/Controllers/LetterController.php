<?php

namespace App\Admin\Controllers;

use App\Models\Letters\Detail;
use App\Models\Letters\Type;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class LetterController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'App\Models\Letters\Detail';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Detail);

        $states = [
            'on' => ['value' => 1, 'text' => 'Yes', 'color' => 'primary'],
            'off' => ['value' => 2, 'text' => 'No', 'color' => 'default'],
        ];

        $grid->column('id', __('ID'));
        $grid->column('users.name', __('Asker'));
        $grid->column('types.name', __('Type'));
        $grid->column('purpose', __('Purpose'));
        $grid->column('message', __('Message'));
        $grid->column('summaries.fulfillment', __('Fulfillment'))
            ->switch($states);
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
        $show = new Show(Detail::findOrFail($id));

        $show->field('id', __('ID'));
        $show->field('purpose', __('Purpose'));
        $show->field('message', __('Message'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));

        $show->users(function ($show)
        {
            $show->name(__('Name'));
            $show->username(__('Username'));
            $show->email(__('Email'));
        });

        $show->identities(function ($show)
        {
            $show->name('Name');
            $show->gender('Gender');
            $show->birthplace('Birthplace');
            $show->birthday('Birthday');
            $show->job('Job');
            $show->relationship_status('Relationship Status');
            $show->religion('Religion');
            $show->address('Address');
        });

        $show->attachments(function ($show)
        {
            $show->identity_card('Identity Card')
                ->file();
            $show->family_card('Family Card')
                ->file();
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
        $form = new Form(new Detail);

        $states = [
            'on' => ['value' => 1, 'text' => 'Yes', 'color' => 'primary'],
            'off' => ['value' => 2, 'text' => 'No', 'color' => 'default'],
        ];

        $form->select('type_id', __('Type'))
            ->options(Type::all()->pluck('name', 'id'))
            ->rules('required');
        $form->text('identities.identity_number', 'Identity Number')
            ->rules('required');
        $form->text('identities.name', 'Name')
            ->rules('required');
        $form->select('identities.gender', 'Gender')
            ->options(['Male' => 'Male', 'Female' => 'Female', 'Other' => 'Other'])
            ->rules('required');
        $form->text('identities.birthplace', 'Birthplace')
            ->rules('required');
        $form->date('identities.birthday', 'Birthday')
            ->rules('required');
        $form->text('identities.job', 'Job');
        $form->text('identities.relationship_status', 'Relationship Status')
            ->rules('required');
        $form->text('identities.religion', 'Religion')
            ->rules('required');
        $form->text('identities.address', 'Address')
            ->rules('required');
        $form->textarea('purpose', __('Purpose'))
            ->rules('required');
        $form->textarea('message', __('Message'))
            ->rules('required');
        $form->switch('summaries.fulfillment', 'Fulfillment')
            ->states($states);
        $form->file('attachments.identity_card', 'Identity Card')
            ->rules('required');
        $form->file('attachments.family_card', 'Family Card')
            ->rules('required');

        return $form;
    }
}
