<?php

use Illuminate\Routing\Router;

Admin::routes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
], function (Router $router) {
    $router->get('/', 'HomeController@index')->name('admin.home');

    $router->resource('users', UserController::class);

    $router->resource('villages/visions', Villages\VisionController::class);
    $router->resource('villages/missions', Villages\MissionController::class);
    $router->resource('villages/programs', Villages\ProgramController::class);
    $router->resource('villages/regulations', Villages\RegulationController::class);
    $router->resource('villages/reports', Villages\ReportController::class);

    $router->resource('villagers', VillagerController::class);
    $router->resource('employees', EmployeeController::class);

    $router->resource('posts/categories', Posts\CategoryController::class);
    $router->resource('posts', PostController::class);

    $router->resource('financials/wallets', Financials\WalletController::class);
    $router->resource('financials/categories', Financials\CategoryController::class);
    $router->resource('financials/budgets', Financials\BudgetController::class);
    $router->resource('financials/incomes', Financials\IncomeController::class);
    $router->resource('financials/expenses', Financials\ExpenseController::class);

    $router->resource('letters/types', Letters\TypeController::class);
    $router->resource('letters', LetterController::class);

});
