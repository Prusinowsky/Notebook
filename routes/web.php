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
Route::get('/note/{note}/edit', 'NoteController@edit')->name('note-edit');
Route::patch('/note/{note}/update', 'NoteController@update');
Route::delete('/note/{note}/delete', 'NoteController@destroy');
Route::get('/note/{note}/photo', 'NotesImageController@upload')->name('note-photo');
Route::post('/note/{note}/upload', 'NotesImageController@store');
Route::post('/note/{note}/download', 'NotesImageController@download');
Route::delete('/delete/{notes_image}', 'NotesImageController@destroy')->name('note-img-delete');
Route::get('images/{filename}', function ($filename)
{
    $path = storage_path() . '/app/images/' . $filename;
    if(!File::exists($path)) abort(404);

    $file = File::get($path);
    $type = File::mimeType($path);

    $response = Response::make($file, 200);
    $response->header("Content-Type", $type);

    return $response;
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
