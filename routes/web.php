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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => 'auth'], function () {
//    Route::resource('/rooms', 'Chat\RoomsController', ['names' => [
//        'create' => 'chat.rooms.create'
//    ]]);

    Route::get('/rooms', 'Chat\RoomsController@index')->name('chat.rooms.index');

    Route::get('/rooms/index_ajax', 'Chat\RoomsController@indexAjax')->name('chat.rooms.index_ajax');

    Route::get('/rooms/join/{id}', 'Chat\RoomsController@join')->name('chat.rooms.join');

    Route::post('/rooms/unjoin/{id}', 'Chat\RoomsController@unjoin')->name('chat.rooms.unjoin');

    Route::post('/rooms', 'Chat\RoomsController@store')->name('chat.rooms.store');
});
