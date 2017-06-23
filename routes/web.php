<?php

// Authentication routs
Auth::routes();

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

Route::middleware(['auth', 'fullprofile'])->group(function() {
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

    Route::get('/week-{number}', 'ProgramController@getWeek');
    Route::get('/food-diary',   'ProgramController@getFoodDiary');

    Route::get('/challenges', 'ChallengesController@index');
    Route::post('/challenges', 'ChallengesController@setUpChallenges');
});

Route::middleware('auth')->group(function() {
    Route::get('/profile-setup', 'ProfileController@index');
    Route::get('/dashboard', 'AdminController@getDashboard');
    Route::get('/archive', 'AdminController@getArchive');
    Route::post('/profile-setup', 'ProfileController@updateProfile');
    Route::get('/screening-test', 'ProfileController@screeningTest');
    Route::post('/screening-test', 'ProfileController@handleScreeningTest');
    Route::get('/logout', function() {
        Auth::logout();
        return redirect('/home');
    });
});
Route::any('/profile-setup', function() {
    if(auth()->user()->finished_profile) {
        return redirect('/home');
    }
});
Route::any('/screening-test', function() {
    if(auth()->user()->finished_profile) {
        return redirect('/home');
    }
});