<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::post('v1/login','Api\V1\AuthController@login');

// Route::group([
//   // 'middleware' => ['auth:api'],
//   'namespace' => 'Api\V1',
//   'prefix' => 'v1'
// ], function () {
//   // Route::get('user', 'AuthController@user');
//   // Route::post('logout','AuthController@logout');
//   Route::apiResources([
//     // 'users' => 'UserController',
//     // 'user_profiles' => 'UserProfileController',
//     // 'user_activity_statuses' => 'UserActivityController',
//     'village_vissions' => 'VillageVissionController',
//     'village_missions' => 'VillageMissionController',
//     'villagers' => 'VillagerController',
//     'employeers' => 'EmployeeController',
//     'post_categories' => 'PostCategoryController',
//     'posts' => 'PostController',
//     'post_comments' => 'PostCommentController',
//     'village_programs' => 'VillageProgramController',
//     'village_report' => 'VillageReportController',
//     'finantial_wallets' => 'WalletController',
//     'finantial_categories' => 'FinantialCategoryController',
//     'finantial_budgets' => 'BudgetController',
//     'finantial_incomes' => 'FinantialIncomeController',
//     'finantial_expence' => 'FinantialExpenceController',
//     'letter_identities' => 'LetterIdentityController',
//     'letter_types' => 'LetterTypeController',
//     'letter_details' => 'LetterDetailController',
//     'letter_summaries' => 'LetterSummaryController',
//     'letter_attachments' => 'AttachmentController',
//     'village_regulations' => 'VillageRegulationController'
//   ]);
// });

Route::fallback(function (){
  return response()->json([
    'message' => 'resource not found'
  ], 404);
});
