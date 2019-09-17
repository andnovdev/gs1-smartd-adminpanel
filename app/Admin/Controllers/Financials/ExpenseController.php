<?php

namespace App\Admin\Controllers\Financials;

use App\Models\Financials\Category;
use App\Models\Financials\Expense;
use App\Models\Financials\Wallet;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Illuminate\Support\MessageBag;

class ExpenseController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'App\Models\Financials\Expense';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Expense);

        $grid->column('id', __('ID'));
        $grid->column('wallets.name', __('Wallet'));
        $grid->column('value', __('Value'));
        $grid->column('categories.name', __('Category'));
        $grid->column('purpose', __('Purpose'));
        $grid->column('receiver', __('Receiver'));
        $grid->column('datetime_trx', __('Datetime trx'));
        $grid->column('attachment', __('Attachment'))
            ->file();
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
        $show = new Show(Expense::findOrFail($id));

        $show->field('id', __('ID'));
        $show->field('value', __('Value'));
        $show->field('purpose', __('Purpose'));
        $show->field('receiver', __('Receiver'));
        $show->field('datetime_trx', __('Datetime trx'));
        $show->field('attachment', __('Attachment'))
            ->file();
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));

        $show->wallets(__('Wallet Information'), function ($show)
        {
            $show->name(__('Name'));
            $show->value(__('Value'));
            $show->desc(__('Description'));
            $show->created_at('Created at');
            $show->updated_at('Updated at');
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
        $form = new Form(new Expense);

        $form->select('wallet_id', __('Walet'))
            ->options(Wallet::all()->pluck('name', 'id'))
            ->rules('required');
            $form->currency('value', __('Value'))
                ->symbol('- Rp')
                ->rules('required');
        $form->select('category_id', __('Category'))
            ->options(Category::all()->pluck('name', 'id'))
            ->rules('required');
        $form->text('purpose', __('Purpose'))
            ->rules('required');
        $form->text('receiver', __('Receiver'));
        $form->datetime('datetime_trx', __('Datetime trx'))
            ->default(date('Y-m-d H:i:s'))
            ->rules('required');
        $form->file('attachment', __('Attachment'));

        $form->saving(function (Form $form)
        {
            $wallet = Wallet::find($form->wallet_id);
            if ($form->value <= $wallet->value) {
                $wallet->value = $wallet->value - $form->value;
                $wallet->save();
            }
            else {
                $error = new MessageBag([
                    'title' => 'Failed!',
                    'message' => 'Your wallet is not enough money.'
                ]);

                return back()->with(compact('error'));
            }
        });

        return $form;
    }
}
