<?php

namespace App\Admin\Controllers;

use App\User;
use App\Models\Financials\Wallet;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\Dashboard;
use Encore\Admin\Layout\Column;
use Encore\Admin\Layout\Content;
use Encore\Admin\Layout\Row;
use Encore\Admin\Widgets\Box;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index(Content $content)
    {
        return $content
            ->title('Dashboard')
            ->row(function (Row $row)
            {
                $row->column(4, new Box('Total User', $this->countUser()));
                $row->column(4, new Box('Total Villager', $this->countVillager()));
                $row->column(4, new Box('Total Employee', $this->countEmployees()));
            })
            ->row(function (Row $row) {

                $row->column(4, function (Column $column) {
                    $column->append(Dashboard::environment());
                });

                $row->column(4, function (Column $column) {
                    $column->append(Dashboard::extensions());
                });

                $row->column(4, function (Column $column) {
                    $column->append(Dashboard::dependencies());
                });
            });
    }

    public function countUser()
    {
        return User::all()->count();
    }

    public function countVillager()
    {
        return User::role('Penduduk')->count();
    }

    public function countEmployees()
    {
        return User::role('Karyawan')->count();
    }

    public function countGender()
    {
        $male = $this->countValue('user_profiles', 'gender', 'Laki-laki');
        $female = $this->countValue('user_profiles', 'gender', 'Perempuan');
        $other = $this->countValue('user_profiles', 'gender', 'Tidak Diketahui');

        $countGender = [$male, $female, $other];
        // return $countGender;
        return view('admin.charts.users.gender', compact('countGender'));
    }

    public function countValue($table, $column, $value)
    {
        return DB::table($table)->where($column, $value)->count();
    }
}
