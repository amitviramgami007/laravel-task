<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::group(['middleware' => ['auth']], function()
{
    // Dashboard Route
    Route::get('/dashboard', 'AdminController@dashboard')->name('dashboard');

    // Frontend Route
    Route::get('/frontend', 'HomeController@imageSlider')->name('frontend');
    Route::get('/frontend-products', 'HomeController@viewProducts')->name('frontend-products');
    Route::post('/frontend-products/import', 'HomeController@storeProducts')->name('frontend-products.import');

    // Users Route
    Route::resource('users', 'UserController');

    // Products Export Routes
    Route::get('/products/export', 'ProductsExportController@export')->name('products.export');

    // Products Import Routes
    Route::get('/products/import', 'ProductsImportController@show')->name('products.import.show');
    Route::post('/products/import', 'ProductsImportController@store')->name('products.import.store');

    // Products Route
    Route::resource('products', 'ProductController');

    // Banners Route
    Route::resource('banners', 'BannerController');

    // Profile Routes
    Route::get('/profile', 'AdminController@profile')->name('profile');
    Route::post('/update-profile-info', 'AdminController@updateProfileInfo')->name('updateProfileInfo');
    Route::post('/change-password', 'AdminController@changePassword')->name('changePassword');
    Route::post('/update-avatar', 'AdminController@updateAvatar')->name('updateAvatar');
});
