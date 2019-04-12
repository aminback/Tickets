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


Route::get('/tickets' , 'TicketsController@index')->name('tickets.index');

Route::get('/tickets/create' , 'TicketsController@create')->name('tickets.create');

Route::post('/tickets/create' , 'TicketsController@store')->name('tickets.store');

Route::post('/tickets/{ticket}' , 'TicketsController@update')->name('tickets.update');

Route::get('/tickets/delete/{ticket}' , 'TicketsController@delete')->name('tickets.delete');

Route::post('/tickets/delete/{ticket}' , 'TicketsController@destroy')->name('tickets.destroy');


Route::get('/tickets/{ticket}' , 'TicketsController@show')->name('tickets.show');



