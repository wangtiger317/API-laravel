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

Route::get('/', function () {
    return view('welcome');
});
Route::prefix('api/v1')->group(function () {
    Route::get('players', 'monitorController@getPlayers')->name('players');
    Route::get('history', 'monitorController@getHistory');
    Route::get('player/:{id}', 'monitorController@getPlayerbyId');
    Route::get('locations', 'monitorController@getLocation');

});


