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

Route::prefix('connect')->as("connect.")->middleware('auth')->group(function() {
    Route::get('/', 'ConnectController@index');
    Route::resource('identities', 'IdentityController');
    Route::resource('providers', 'ProviderController');

    Route::prefix('admin')->as("admin.")->namespace('Admin')->group(function () {
        Route::resource('providers', 'ProviderController');
    });

    Route::get('/{provider}', 'ConnectController@redirectToProvider');
    Route::get('/{provider}/callback', 'ConnectController@handleProviderCallback');
});
