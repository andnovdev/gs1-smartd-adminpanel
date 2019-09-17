<?php

namespace App\Admin\Controllers;

use App\User;
use App\Models\Villager;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Illuminate\Support\Str;

class VillagerController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Manajemen Penduduk';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new User);
        $grid->model()->role('Penduduk');

        $grid->column('id', __('ID'));
        $grid->column('villagers.identity_number', __('No. KK'));
        $grid->column('name', __('Nama'));
        $grid->column('villagers.mother_name', __('Nama Ibu'));
        $grid->column('username', __('Username'));
        $grid->column('villagers.token', __('Token'));
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
        $show = new Show(User::findOrFail($id));

        $show->field('id', __('ID'));
        $show->field('name', __('Nama'));
        $show->field('username', __('Username'));
        $show->field('email', __('Email'));
        $show->field('email_verified_at', __('Verifikasi Email Pada'));
        $show->field('created_at', __('Dibuat Pada'));
        $show->field('updated_at', __('Diperbarui Pada'));

        $show->profiles(__('Profil Pengguna'), function ($show) {
            $show->field('birthday', __('Tanggal Lahir'));
            $show->field('birthplace', __('Tempat Lahir'));
            $show->field('gender', __('Jenis Kelamin'));
            $show->field('religion', __('Agama'));
            $show->field('address', __('Alamat'));
            $show->field('job', __('Pekerjaan'));
            $show->field('company', __('Tempat Kerja'));
            $show->field('phone', __('Telepon'));
            $show->field('desc', __('Deskripsi'));
            $show->field('avatar', __('Avatar'))->image();
        });

        $show->villagers(__('Informasi Penduduk'), function ($show) {
            $show->field('token', __('Kode'));
            $show->field('identity_number', __('No. KK'));
            $show->field('mother_name', __('Nama Ibu'));
            $show->field('relationship_status', __('Status Kawin'));
            $show->field('average_income', __('Penghasilan Rata-Rata'));
        });

        $show->activityStatuses(__('Aktivitas Pengguna'), function ($show)
        {
            $show->field('status', __('Status'));
            $show->field('last_active', __('Terakhir Aktif'));
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

        $form->text('villagers.identity_number', __('No. Kartu Keluarga'))
            ->rules('required|integer')
            ->creationRules('unique:villagers,identity_number');
        $form->text('name', __('Nama'))
            ->rules('required|string|max:255');
        $form->text('villagers.mother_name', __('Nama Ibu'))
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
        $form->date('profiles.birthday', __('Tanggal Lahir'));
        $form->text('profiles.birthplace', __('Tempat Lahir'));
        $form->select('profiles.gender', __('Jenis Kelamin'))
            ->options(['Tidak Diketahui' => 'Tidak Diketahui', 'Laki-Laki' => 'Laki-Laki', 'Perempuan' => 'Perempuan',]);
        $form->text('profiles.religion', __('Agama'));
        $form->select('villagers.relationship_status', __('Status'))
            ->options(['Belum Kawin' => 'Belum Kawin', 'Kawin' => 'Kawin']);
        $form->textarea('profiles.address', __('Alamat'));
        $form->text('profiles.job', __('Pekerjaan'));
        $form->text('profiles.company', __('Tempat Kerja'));
        $form->number('villagers.average_income', __('Penghasilan rata-rata'));
        $form->mobile('profiles.phone', __('Telepon'))
            ->creationRules('unique:user_profiles,phone');
        $form->textarea('profiles.desc', __('Deskripsi'));
        $form->image('profiles.avatar', __('Foto Profil'))
            ->removable()
            ->move('users/avatars');

        $form->hidden('villagers.token')
            ->default(Str::random(6));

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

            $form->model()->assignRole('Penduduk');
        });

        return $form;
    }
}
