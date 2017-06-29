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
    // Weeks CRUD routes
    Route::resource('weeks', 'WeekController');

    // Task CRUD routes
    Route::resource('tasks', 'TaskController');

    // Training CRUD routes
    Route::resource('trainings', 'TrainingController');

    // Education CRUD routes
    Route::resource('educations', 'EducationController');

    // Program CRUD routes
    Route::resource('programs', 'ProgramController');

    // Rest of controllers
    Route::get('/home', 'HomeController@showSummary');
    Route::get('/', 'HomeController@showSummary');
    Route::post('/home', 'HomeController@updateGoals');

    Route::get('/week-{number}', 'ProgramController@getWeek');
    // Food diary routes
    Route::get('/food-diary',   'ProgramController@getFoodDiary');
    Route::post('/food-diary',   'ProgramController@updateFoodDiary');
    Route::get('/quiz-{number}', 'ProgramController@getQuiz');

    // TODO: This will be changed to CRUD probably
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