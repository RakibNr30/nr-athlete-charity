<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::resource('/', 'HomeController')->only(['index']);
Route::resource('/about-us', 'AboutController')->only(['index']);
Route::resource('/contact', 'ContactController')->only(['index', 'store']);
Route::resource('/faq', 'FaqController')->only(['index']);
Route::resource('/team', 'TeamController')->only(['index']);
Route::resource('/news', 'NewsController')->only(['index', 'show']);
Route::resource('/donate', 'DonationController')->only(['index'])->middleware(['auth']);
Route::post('/donate/store', 'DonationController@store')->middleware(['auth']);
Route::resource('/cases', 'CasesController')->only(['index', 'show']);
Route::resource('/privacy-policy', 'PrivacyPolicyController')->only(['index']);

// profile routes
Route::prefix('profile')->name('profile-')->middleware(['donner'])->group(function () {
    // User account info routes...
    Route::resource('account-info', 'Profile\AccountInfoController')->only(['index', 'update']);
    // User personal info routes...
    Route::resource('personal-info', 'Profile\PersonalInfoController')->only(['index', 'update']);
    // User donation history routes...
    Route::resource('donation-history', 'Profile\DonationHistoryController')->only(['index']);
});
