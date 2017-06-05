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

Route::get('/home', 'HomeController@index');

// Weeks CRUD routes
Route::get('/weeks', 'WeekController@index');
Route::get('/weeks/create', 'WeekController@create');
Route::post('/weeks', 'WeekController@store');
Route::get('/weeks/{id}', 'WeekController@show');
Route::get('/weeks/{id}/edit', 'WeekController@edit');
Route::patch('/weeks/{id}', 'WeekController@update');
Route::delete('/weeks/{id}', 'WeekController@destroy');

// Task CRUD routes
Route::get('/tasks', 'TaskController@index');
Route::get('/tasks/create', 'TaskController@create');
Route::post('/tasks', 'TaskController@store');
Route::get('/tasks/{id}', 'TaskController@show');
Route::get('/tasks/{id}/edit', 'TaskController@edit');
Route::patch('/tasks/{id}', 'TaskController@update');
Route::delete('/tasks/{id}', 'TaskController@destroy');
