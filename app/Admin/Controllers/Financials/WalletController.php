<?php

namespace App\Admin\Controllers\Financials;

use App\Models\Financials\Wallet;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class WalletController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'App\Models\Financials\Wallet';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Wallet);

        $grid->column('id', __('ID'));
        $grid->column('name', __('Name'));
        $grid->column('value', __('Value'));
        $grid->column('desc', __('Desc'));
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
        $show = new Show(Wallet::findOrFail($id));

        $show->field('id', __('ID'));
        $show->field('name', __('Name'));
        $show->field('value', __('Value'));
        $show->field('desc', __('Desc'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));

        $show->incomes(__('Income'), function ($show)
        {
            $show->resource('/admin/financials/incomes');
            $show->id(__('ID'));
            $show->value(_('Value'));
            $show->purpose(__('Purpose'));
            $show->source(__('Source'));
            $show->datetime_trx(__('Datetime Trx'));
            $show->attachment(__('Attacment'));
            $show->created_at(__('Created at'));
            $show->updated_at(__('Updated at'));
        });

        $show->expenses(__('Expense'), function ($show)
        {
            $show->resource('/admin/financials/expenses');
            $show->id(__('ID'));
            $show->value(_('Value'));
            $show->purpose(__('Purpose'));
            $show->receiver(__('Receiver'));
            $show->datetime_trx(__('Datetime Trx'));
            $show->attachment(__('Attacment'));
            $show->created_at(__('Created at'));
            $show->updated_at(__('Updated at'));
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
        $form = new Form(new Wallet);

        $form->text('name', __('Name'))
            ->rules('required|string|max:255')
            ->creationRules('unique:financial_wallets,name')
            ->updateRules('unique:financial_wallets,name,{{id}}');
        $form->currency('value', __('Value'))
            ->symbol('Rp')
            ->rules('required');
        $form->textarea('desc', __('Desc'));

        return $form;
    }
}
