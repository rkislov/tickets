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

Route::get('new_ticket', 'TicketController@create')->name('new_ticket');
Route::post('new_ticket', 'TicketController@store')->name('store_ticket');
Route::get('my_tickets', 'TicketController@userTickets')->name('my_tickets');
Route::get('tickets/{ticket_id}', 'TicketController@show')->name('show_ticket');
Route::post('comment', 'CommentsController@postComment')->name('comment');

Route::group(['prefix'=> 'admin', 'middleware'=>'admin'], function (){
   Route::get('tickets', 'TicketController@index');
   Route::post('close_ticket/{ticket_id}', 'TicketController@close');
   Route::get('settings', 'SettingsController@index')->name('settings');
});