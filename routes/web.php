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

Route::prefix('connect')->group(function() {
    Route::get('/', 'ConnectController@index');
    Route::get('/{provider}', 'ConnectController@redirectToProvider');
    Route::get('/{provider}/callback', 'ConnectController@handleProviderCallback');
});
