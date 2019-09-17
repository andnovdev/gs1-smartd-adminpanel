<?php

namespace App\Admin\Controllers;

use App\Models\Post;
use App\Models\Posts\Category;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Illuminate\Support\Str;

class PostController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'App\Models\Post';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Post);
        $grid->model()->latest();

        $state = [
            'on' => [
                'value' => 'Publikasi',
                'text' => 'Publikasi',
                'color' => 'primary',
            ],
            'off' => [
                'value' => 'Draf',
                'text' => 'Draf',
                'color' => 'default'
            ],
        ];

        $grid->column('id', __('ID'));
        $grid->column('title', __('Judul'));
        $grid->column('subtitle', __('Sub Judul'));
        $grid->column('categories.name', __('Kategori'));
        $grid->column('desc', __('Deskripsi'));
        $grid->column('status', __('Status'))
            ->switch($state);
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
        $show = new Show(Post::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('category_id', __('Category id'));
        $show->field('title', __('Title'));
        $show->field('subtitle', __('Subtitle'));
        $show->field('desc', __('Desc'));
        $show->field('content', __('Content'));
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
        $form = new Form(new Post);

        $state = [
            'on' => [
                'value' => 'Publikasi',
                'text' => 'Publikasi',
                'color' => 'primary',
            ],
            'off' => [
                'value' => 'Draf',
                'text' => 'Draf',
                'color' => 'default'
            ],
        ];

        $form->text('title', __('Judul'));
        $form->text('subtitle', __('Sub Judul'));
        $form->select('category_id', __('Kategori'))
            ->options(Category::All()->pluck('name', 'id'));
        $form->textarea('desc', __('Deskripsi'));
        $form->ckeditor('content', __('Konten'));
        $form->switch('status')->states($state);

        $form->hidden('uri');
        $form->hidden('api_token');

        $form->saving(function (Form $form)
        {
            $form->uri = Str::kebab($form->title);
            $form->api_token = Str::random(60);
        });

        return $form;
    }
}
