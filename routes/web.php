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

Route::get('/', 'NoteController@index');
Route::get('/create', 'NoteController@create');
Route::post('/store', 'NoteController@store');
Route::get('/note/{note}/edit', 'NoteController@edit');
Route::patch('/note/{note}/update', 'NoteController@update');
Route::delete('/note/{note}/delete', 'NoteController@destroy');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
