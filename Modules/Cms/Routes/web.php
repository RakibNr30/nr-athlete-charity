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

// dashboard routes
Route::resource('dashboard', 'DashboardController')->only(['index']);
// banner routes
Route::resource('banner', 'BannerController')->only(['index', 'update']);
// about routes
Route::resource('about-us', 'AboutController')->only(['index', 'update']);
// news routes
Route::resource('news', 'NewsController');
// cases routes
Route::resource('cases', 'CasesController');
// testimonial routes
Route::resource('testimonial', 'TestimonialController');
// partner routes
Route::resource('partner', 'PartnerController');
// team routes
Route::resource('team', 'TeamController');
// faq routes
Route::resource('faq', 'FaqController');
// rice routes
Route::resource('rice', 'RiceController')->except(['show', 'destroy']);
// donation routes
Route::resource('donation', 'DonationController')->only(['index']);
// privacy policy routes
Route::resource('privacy-policy', 'PrivacyPolicyController')->only(['index', 'update']);
// public message routes
Route::resource('public-message', 'PublicMessageController')->only(['index', 'show', 'destroy']);
