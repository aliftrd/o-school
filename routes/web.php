<?php

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

Route::get('/', 'LandingController@index');

Auth::routes([
    'register' => false,
    'reset' => false,
    'confirm' => false
]);

Route::group(['middleware' => ['web', 'auth'], 'prefix' => 'admin'], function() {
    Route::get('/home', 'HomeController@index')->name('home');

    Route::group(['namespace' => 'Admin'], function() {
        Route::resource('portfolio', 'ProjectController')->except('show');
        Route::resource('testimonies', 'TestimonyController')->except('show');
        Route::resource('galleries', 'GalleryController')->except('show');
        Route::name('portfolio.')->group(function() {
            Route::resource('category', 'ProjectCategoryController')->except('show');
        });
        Route::name('setting.')->group(function() {
            Route::get('settings', 'SettingController@index')->name('index');
            Route::get('settings/{id}', 'SettingController@edit')->name('edit');
            Route::put('settings', 'SettingController@update')->name('update');
        });
    });
});
